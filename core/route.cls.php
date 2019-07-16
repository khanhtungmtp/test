<?php
	class Route {


		/**
		 * ROUTE CLASS
		 * @version: v1.0
		 * @date: Oct 18th, 2016
		 * - Routing management, impliment
		 * - Rendering templates based on current route
		*/

		private $param = '';
		private $routes = array();
		private $dynamicSql = array();

		/**
		 * Get and process route from url
		*/
		public function __construct() {

			//Get route from $_GET and remove all special characters
            $get = isset( $_GET['params'] ) ? $_GET['params'] : '';
            $get = strip_tags( $get );
			$get = preg_replace( '/[^-a-zA-Z0-9_\/\.]/', '', $get ); //The dot is allowed
			$param = rtrim( $get, '/' );
			$this -> param = $param;
			return;
		}

		/**
		 * Load route
		*/
		public function load( $dom ) {
			$param = $this -> param;
			$routes = $this -> routes;
			$route = array();
			$tpl = '';

			//Check session
			$paramArr = explode( '/', $param );
			if( $paramArr[0] == 'admin' ) {
				if( !isset( $_SESSION['tk_logged'] ) || !$_SESSION['tk_logged'] ) {
					header( "Location: " . TP_REL_ROOT . "nguoidung/dangnhap" );
					return;
				}
			}

			//When load *.inc.php files
			if( strpos( $param, 'include/' ) !== false ) {
				$param = substr( $param, strpos( $param, '/include/' ) + 1 );
				if( array_key_exists( $param, $routes ) ) {
					$incFile = TP_REL_MODULES . $routes[$param][0];
					if( file_exists( $incFile ) ) {
						require_once( $incFile );
						return;
					}
				}
				else {
					return print( 'Include file not found !' );
				}
			}

			//Find and impliment route
			if( array_key_exists( $param, $routes ) ) {
				$route = $routes[$param];
				if( is_callable( $route[0] ) ) {
					$route[0](); //Call fn of this route
					return;
				}
				else if ( is_string( $route[0] ) ) {
					$tpl .= $route[0] . '/';
				}
			}
			//If not thing was found, return 404
			else {
				$tpl .= 'error/404';
			}

			//Concat extension
			$tpl = rtrim( $tpl, '/' );

			//Only bind .tpl.php when it isn't an including file
			$tpl .= '.tpl.php'; //This is template path

			//Render DOM
			$dom -> register_route( $route );
			$dom -> register_tpl( $tpl );

			return $dom -> render();
		}

		/**
		 * Add route
		 * @param string $route
		 * @param mixed $mixed
		 * @param [ string | boolean $shape ]
		*/
		public function add( $route, $mixed, $shape = false ) {
			$this -> routes[$route] = array( $mixed, $shape );
		}

		/**
		 * Add dynamic route sql
		 * @param string $sql
		 * @param string $shape
		 * @param string $mixed
		*/
		public function add_dynamic( $sql, $mixed,$shape ) {
			array_push ( $this -> dynamicSql, array( $sql, $mixed, $shape ) );
		}

		/**
		 * Scan and add route for product
		*/
		public function scan() {
			$exec = new Exec( HOST, USER, PASS, DBNAME );

			$sqls = $this -> dynamicSql;
			foreach( $sqls as $arr ) {
				$routeUrls = $exec -> get( $arr[0] );
				foreach( $routeUrls as $key => $route ) {
					$routeKeys = array_keys( $route );
					$route = $route[$routeKeys[0]];
					$this -> add( $route, $arr[1], $arr[2] );
				}
			}
		}
	}
?>
