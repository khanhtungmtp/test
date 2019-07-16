<?php 
	if( isset( $_POST['page_id'] ) ) {
		$exec = new Exec( HOST, USER, PASS, DBNAME );
		$sql = new Sql();
		
		$r = $exec -> exec( $sql -> get( 134 ), array(
			':page_id' => (int)$_POST['page_id']
		) );
		
		$r ? print( '1|Xóa trang thành công' ) : print(	'0|Có lỗi khi cố xóa trang' ); 
	}
?>