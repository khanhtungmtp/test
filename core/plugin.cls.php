<?php 

	/**
	 * PLUGIN CLASS
	 * 
	 * Provide some ways to play with Pluggable
	*/
	class Plugin {
		
		public $locations = array();
		public $plugins = array();
		
		/**
		 * Register new plugin
		 * @param string $pluginName
		 * @param array $locators
		 * @param string $folder
		*/
		public function register_plugin( $pluginName, $folder, $locators ) {
			array_push( $this -> plugins, array( 
				'name' => $pluginName,
				'folder' => $folder,
				'locators' => $locators
			) );
		}
		
		/**
		 * Parse locator
		*/
		public function parse_locator( $html ) {
			$magic = preg_match_all( "/\{#plu_(.*?)}/", $html, $m, PREG_SET_ORDER );
			return empty( $m ) ? false : $m;
		}
		
		/**
		 * Load all plugin 
		*/
		public function load_plugin( $html ) {
			//Parse locator
			$locators = $this -> parse_locator( $html );
			$locators = !$locators ? array() : $locators;
			
			//Get plugin with this locator
			$plugins = array();
			foreach( $locators as $key => $locator ) {
				foreach( $this -> plugins as $key => $plugin ) {
					$crrLocators = $plugin['locators'];
					foreach( $crrLocators as $crrLocator ) {
						$crrLocator = '{#' . $crrLocator . '}';
						if( $locator[0] == $crrLocator ) {
							array_push( $plugins, $plugin );
						}
					}
				}
			}
			
			//Load plugin
			$dom = new Dom();
			foreach( $plugins as $key => $plugin ) {
				$pluginHTML = $dom -> get_tpl( TP_REL_PLUGINS . $plugin['folder'] . '/' . $plugin['folder'] . '.tpl.php' );
				
				//Get static file
				$style =  $dom -> get_static( TP_REL_PLUGINS . $plugin['folder'] . '/' . $plugin['folder'] . '.css', 'style' );
				$script =  $dom -> get_static( TP_REL_PLUGINS . $plugin['folder'] . '/' . $plugin['folder'] . '.js', 'script' );
				
				//Replace system magic of plugin
				$searches = array( '{@style}', '{@www}', '{@script}' );
				$replaces = array( $style, TP_REL_ROOT, $script );
				$pluginHTML = str_replace( $searches, $replaces, $pluginHTML );
				
				//Parse and replace all magic keyword of plugin
				$magic = $dom -> parse_magic( $pluginHTML );
				if( $magic !== false ) {
					$mSearches = array();
					$mReplaces = array();
					foreach( $magic as $key => $m ) {
						$inc = TP_REL_PLUGINS . $plugin['folder'] . '/' . $m[1] . '.inc.php';
						$mHTML = $dom -> get_inc( $inc, '' );
						array_push( $mSearches, $m[0] );
						array_push( $mReplaces, $mHTML );
					}
					$pluginHTML = str_replace( $mSearches, $mReplaces, $pluginHTML );
				}
				
				//Replace locator
				foreach( $plugin['locators'] as $key => $locator ) {
					$magic = '{#' . $locator . '}';
					$html = str_replace( $magic, $pluginHTML, $html );
				}
			}
			
			//Clean html
			$html = $dom -> clean_html( $html );
			
			//Print html
			print( $html );
		}
	}
?>