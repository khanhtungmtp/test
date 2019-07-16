<?php 
	if( isset( $_POST['id'] ) ) {
		$exec = new Exec( HOST, USER, PASS, DBNAME );
		$sql = new Sql();
		
		$exec -> exec( $sql -> get( 195 ), array(
			':admin_id' => (int)$_POST['id']
		) );
	}
?>