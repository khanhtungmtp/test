<?php 
	/**
	 * Component class
	 * Helper for UI component
	 * @version: v1.0
	 * @date: Nov 1st, 2016
	*/
	class Component extends Exec {
		
		private $sql;			
		
		public function __construct( $host, $user, $pass, $dbname ) {
			parent::__construct( $host, $user, $pass, $dbname );
			
			$this -> sql = new Sql();
		}
		
		/**
		 * Get all slider
		 * @param string $sliderName
		*/
		public function get_slider( $sliderName ) {
			//Get menu_id
			$positionData = array( ':setting_name' => 'slider_position' );
			$position = parent::get( $this -> sql -> get( 502 ), $positionData );
			$position = json_decode( $position[0]['setting_value'], true );
			$id = isset( $position[$sliderName] ) ? $position[$sliderName] : 0;
			
			if( $id == 0 ) return false;
			
			//Get menu based on menu_id
			$data = array( ':setting_name' => 'sliders' );
			$sliders = parent::get( $this -> sql -> get( 502 ), $data );
			$sliders = json_decode( $sliders[0]['setting_value'], true );
			foreach( $sliders as $key => $slider ) {
				if( (int)$slider['slider_id'] === $id ) {
					return $slider;
				}
			}
			return false;
		}
	}
?>