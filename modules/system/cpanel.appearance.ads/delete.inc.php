<?php
	if( isset( $_POST['id'] ) ) {
		$exec = new Exec( HOST, USER, PASS, DBNAME );
		$sql = new Sql();

		//add new slide into db
		$oldSlider = $exec -> get( $sql -> get( 180 ) , array(
			':setting_name' => 'ads'
		) );

		$oldSlider = json_decode( $oldSlider[0]['setting_value'], true );

		//Delete
		$oldSlider1 = array_values( $oldSlider );
		for( $i = 0; $i < count( $oldSlider1 ); $i++ ) {
			if( $oldSlider1[$i]['item_id'] == $_POST['id'] ) {
				unset( $oldSlider1[$i] );
				break;
			}
		}

		//Update database
		$r = $exec -> exec( $sql -> get( 158 ), array(
			':setting_value' => json_encode( $oldSlider1 ),
			':setting_name' => 'ads'
		) );
	}
?>
