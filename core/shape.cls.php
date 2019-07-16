<?php 
	class Shape {
		
		/**
		 * SHAPE CLASS
		 * @version: v1.0
		 * @date: Oct 18th, 2016
		 * - Shape management
		 * - Build DOM and return HTML
		*/
		
		public $shapes = array();
		
		/**
		 * Add shape
		 * @param string $folder: The folder of shape
		 * @param array $components: All template has ordered
		*/
		public function add( $folder, $components ) {
			$this -> shapes[$folder] = array( $folder, $components );
		}
		
		/**
		 * Extend shape
		 * @param string $shape
		 * @param string $newShape
		 * @param array $component
		*/
		public function extend( $shape, $newShape, $components ) {
			$folder = $this -> shapes[$shape][0];
			$this -> shapes[$newShape] = array( $folder, $components );
		}
		
		/**
		 * Build shape becomes DOM and return HTML
		 * @param [string|boolean $name = false]: Name of shape
		*/
		public function build( $name = false ) {
			
			//When don't need to build shape
			if( !$name ) {
				return '{@route_contents}';
			}
			
			//Not found shape
			if( !isset( $this -> shapes[$name] ) ) {
				return 'Shape not found: "' . $name . '"<br />';
			}
			
			$shape = $this -> shapes[$name];
			
			//Render shape
			$folder = TP_REL_MODULES . $shape[0] . '/';
			$html = '';
			$dom = new Dom();
			foreach( $shape[1] as $key => $tpl ) {
				$html .= $dom -> get_tpl( $folder . $tpl . '.tpl.php' );
			}
			return $html;
		}
	}
?>