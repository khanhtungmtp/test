<?php 
	if( isset( $_POST['post_id'] ) ) {
		$exec = new Exec( HOST, USER, PASS, DBNAME );
		$sql = new Sql();
		
		$r = $exec -> exec( $sql -> get( 169 ), array(
			':post_id' => (int)$_POST['post_id']
		) );
		
		$r ? print( '1|Xóa bài viết thành công' ) : print( '0|Có lỗi khi cố xóa bài viết' );
	}
?>