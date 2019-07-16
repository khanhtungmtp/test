<?php
	if( isset( $_POST['data'] ) ) {
		$exec = new Exec( HOST, USER, PASS, DBNAME );
		$sql = new Sql();

		$data = json_decode( $_POST['data'], true );

		//Replace new slide
		$newSlider = json_decode( $_POST['data'], true );

		$r = $exec -> exec( $sql -> get( 158 ), array(
			':setting_value' => json_encode( $newSlider ),
			':setting_name' => 'ads'
		) );

		$r ? print( '1|Lưu thành công' ) : print( '0|Có lỗi xảy ra' );

	}
?>
