<?php 
	if( isset( $_POST['post_title'] ) ) {
		//Init OOP
		$exec = new Exec( HOST, USER, PASS, DBNAME );
		$sql = new Sql();
		
		//Get data
		foreach( $_POST as $key => $value ) {
			$$key = $value;
		}
		
		//Get admin id
		$userData = unserialize( $_SESSION['tk_user_data'] );
		
		$data = array(
			':admin_id' => $userData['admin_id'],
			':blog_cate_id' => $post_cate,
			':post_title' => $post_title,
			':post_page_title' => $post_page_title,
			':post_contents' => $post_content,
			':post_compact' => $post_compact,
			':post_meta_description' => $post_meta_description,
			':post_meta_keywords' => $post_meta_keywords,
			':post_seo_url' => preg_replace( '/[^0-9a-zA-Z- ]/', '', $post_url ),
			':post_allow_comment' => isset( $post_allow_comment ) ? 1 : 0,
			':post_as_draff' => isset( $post_as_draff ) ? 1 : 0,
			':post_thumbnail' => $post_avatar,
			':post_time' => time()
		);
		
		if( isset( $action ) && $action == 'edit' ) {
			$data[':post_id'] = (int)$id;
			$r = $exec -> exec( $sql -> get( 168 ), $data );
		}
		else {
			$r = $exec -> add( $sql -> get( 160 ), $data );
		}
		$r ? print( '1|Lưu bài viết thành công' ) : print( '0|Trùng URL' );
	}
?>