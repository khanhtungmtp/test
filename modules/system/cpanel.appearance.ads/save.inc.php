<?php
	if( isset( $_POST ) ) {
		$exec = new Exec( HOST, USER, PASS, DBNAME );
		$sql = new Sql();

		//Get data
		foreach( $_POST as $key => $value ) {
			$$key = $value;
		}

		//add new slide into db
		$oldSlider = $exec -> get( $sql -> get( 180 ) , array(
			':setting_name' => 'ads'
		) );

        if(isset($oldSlider[0])) {
            $oldSlider =  json_decode( $oldSlider[0]['setting_value'], true );

            $newSlider = array(
    			'item_id' => time(),
    			'item_image' => $slider_image,
    			'item_title' => $slider_title,
    			'item_alt' => $slider_alt,
    			'item_link' => $slider_url
    		);

    		if(count($oldSlider) == 0) {
                $oldSlider = array();
            }
            array_push( $oldSlider, $newSlider );
        } else {
            $oldSlider = array(
    			'item_id' => time(),
    			'item_image' => $slider_image,
    			'item_title' => $slider_title,
    			'item_alt' => $slider_alt,
    			'item_link' => $slider_url
    		);
        }

		$r = $exec -> exec( $sql -> get( 158 ), array(
			':setting_value' => json_encode( $oldSlider ),
			':setting_name' => 'ads'
		) );

		$r ? print( '1|Lưu thành công' ) : print( '0|Có lỗi xảy ra' );
	}
?>
