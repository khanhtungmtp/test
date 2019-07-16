<?php
	if( isset( $_POST['admin_id'] ) ) {
		$exec = new Exec( HOST, USER, PASS, DBNAME );
		$sql = new Sql();
		
		$data = array(
			'admin_id' => $_POST['admin_id']
		);
		$block = $exec -> get( $sql -> get( 185 ), $data );
		$block = $block[0]['admin_blocked'];
		$block = $block ? 0 : 1;
		$save = array(
			'admin_id' => $_POST['admin_id'],
			'admin_blocked' => $block
		);
		$r = $exec -> exec( $sql -> get( 186 ), $save );
		if( $r ) {
			echo 'Thành công';
		}
	}
?>