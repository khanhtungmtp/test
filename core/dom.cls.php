<?php
	class Dom {

		/**
		 * DOM CLASS
		 * Deal with DOM string
		 * @version: v1.0
		 * @date: Oct 18th, 2016
		*/

		private $route = array();
		private $shape = array();
		private $plugin = array();
		private $tpl = '';


		/**
		 * Get template and return html
		 * @param string $tpl
		*/
		public function get_tpl( $tpl ) {
			if( !file_exists( $tpl ) ) {
				return false;
			}
			$html = file_get_contents( $tpl );
			return $html;
		}

		/**
		 * Get static file and return snippet
		 * @param string $static
		*/
		public function get_static( $static, $type = 'style' ) {
			if( !file_exists( $static ) ) {
				return false;
			}
			$snippets = file_get_contents( $static );

			return '<' . $type . ' class="takaplus-' . $type . '">' . $snippets . '</' . $type . '>';
		}

		/**
		 * Implement php and return html
		*/
		public function get_inc( $inc1, $inc2 ) {
			ob_start();

			//.inc file is exists, case magic keyword in module
			if( file_exists( $inc1 ) ) {
				include $inc1;
			}

			//.inc file is exists, case magic keyword in shape
			else if ( file_exists( $inc2 ) ) {
				include $inc2;
			}
			$html = ob_get_contents();
			ob_end_clean();
			return $html;
		}

		/**
		 * Add a route into DOM Obj
		*/
		public function register_route( $route ) {
			return $this -> route = $route;
		}

		/**
		 * Add a shape into DOM Obj
		*/
		public function register_shape( $shape ) {
			return $this -> shape = $shape;
		}

		/**
		 * Add a tpl into DOM Obj
		*/
		public function register_tpl( $tpl ) {
			return $this -> tpl = $tpl;
		}

		/**
		 * Parse all magic keyword excludes
		 * {@style}, {@www}, {@script}, {@route_contents}, {@base}
		 *
		*/
		public function parse_magic( $html ) {
			$magic = preg_match_all( "/\{@(.*?)}/", $html, $m, PREG_SET_ORDER );
			return empty( $m ) ? false : $m;
		}

		/**
		 * Clean html:
		 * - Remove comments
		 * - Remove tab and break line
		*/
		public function clean_html( $html ) {

			//Remove html comment tags
			$html = preg_replace( '/<!--([\s\S][^--><!--]+)-->/', '', $html );

			//Substring to get script string from $html
			$search = '<script class="takaplus-script">';
			$start = strpos( $html, $search );
			$pad = strlen( $search );
			$end = strpos( $html, '</script>', $start );
			$script = substr( $html, $start + $pad, $end - $start );

			//Remove javascript and css /*comment*/
			//Incase <img accept="images/*" />
			$cleanScript = preg_replace( "/\/\*([\s\S][^\*]*?)\*\//", "", $script );

			//Remove javascript single line comment
			$cleanScript = preg_replace( "/^\/\/(.+)$/", "", $cleanScript );

			//Join replace $script in $html
			$html = str_replace( $script, $cleanScript, $html );

			//Remove all line breaks
			//$html = preg_replace( "/\s{2,}/", "", $html );

			//Remove all tabs
			$html = preg_replace( "/\t/", "", $html );

			return $html;
		}

		/**
		 * Render DOM based on route
		*/
		public function render() {
			$route = $this -> route;
			$shape = $this -> shape;
			$tpl = $this -> tpl;

			//Return 404 template when $route is empty
			if( empty( $route ) ) {
				$notFound = $this -> get_tpl( TP_REL_MODULES . $tpl );
				$style =  $this -> get_static( TP_REL_MODULES . 'error/404.css', 'style' );
				$script =  $this -> get_static( TP_REL_MODULES . 'error/404.js', 'script' );

				$searches = array( '{@style}', '{@script}' );
				$replaces = array( $style, $script );
				$notFound = str_replace( $searches, $replaces, $notFound );
				return $this -> clean_html( $notFound );
			}

			//Build shape and replace route_contents
			$shapeName = isset( $route[1] ) ? $route[1] : false;
			$html = $shape -> build( $shapeName );
			$routeContents = $this -> get_tpl( TP_REL_MODULES . $tpl );

			//Load css and js
			$style =  $this -> get_static( TP_REL_MODULES . $route[0] . '.css' );
			$script =  $this -> get_static( TP_REL_MODULES . $route[0] . '.js', 'script' );

			//Inject <base> tag
			$shapeFolder = $shape -> shapes[$route[1]][0];
			$base = is_string( $route[0] ) ? $route[0] : '' ;
			$moduleFolder = substr( $base, 0, strpos( $base, '/', 8 ) ); //This is module folder name
			$base = empty( $route[1] ) ? $moduleFolder : $shapeFolder;
			$base = '<base href="' . TP_REL_ROOT . 'modules/' . $base . '/" />';

			//Inject TP_REL_ROOT variable use for javascript
			$wwwCode = '<head><script>var _WWW = "' . TP_REL_ROOT . '";</script>';

			//Replace string
			$searches = array( '<head>', '{@base}', '{@route_contents}', '{@style}', '{@www}', '{@script}' );
            $replaces = array( $wwwCode, $base, $routeContents, $style, trim( TP_REL_ROOT, '/' ), $script );
			$html = str_replace( $searches, $replaces, $html );

			//Parse and replace all magic keyword
			parse:
			$magics = $this -> parse_magic( $html );
			$mSearches = array();
			$mReplaces = array();

			//Return html if not found any magic
			if( !$magics ) {
				return $this -> clean_html ( $html );
			}

			foreach( $magics as $key => $magic ) {
				$inc1 = TP_REL_MODULES . $moduleFolder . '/' . $magic[1] . '.inc.php';
				$inc2 = TP_REL_MODULES . $shapeFolder . '/' . $magic[1] . '.inc.php';
				$mHTML = $this -> get_inc( $inc1, $inc2 );
				array_push( $mSearches, $magic[0] );
				array_push( $mReplaces, $mHTML );
			}
			$html = str_replace( $mSearches, $mReplaces, $html );
			goto parse;


			return $this -> clean_html ( $html );
		}
	}
?>
