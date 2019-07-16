<?php
	if( isset( $_POST['comment_id'] ) ) {
		$exec = new Exec( HOST, USER, PASS, DBNAME );
		$sql = new Sql();
		
		$data = array(
			'comment_id' => $_POST['comment_id']
		);
		$block = $exec -> get( $sql -> get( 173 ), $data );
		$block = $block[0]['comment_publish'];
		$block = $block ? 0 : 1;
		$save = array(
			'comment_id' => $_POST['comment_id'],
			'comment_publish' => $block
		);
		$r = $exec -> exec( $sql -> get( 174 ), $save );
		if( $r ) {
			echo 'Thành công';
		} else {
			echo "Thất bại";
		}
	}
?>