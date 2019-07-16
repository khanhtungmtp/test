<?php 
	if( isset( $_POST['page_name'] ) ) {
		$exec = new Exec( HOST, USER, PASS, DBNAME );
		$sql = new Sql();
		
		//Get data
		foreach( $_POST as $key => $value ) {
			$$key = $value;
		}
		
		$page_publish = isset( $draf ) ? $draf : 0;
		
		$data = array(
			':page_name' => trim( $page_name ),
			':page_page_title' => trim( $page_page_title ),
			':page_seo_url' => trim( $page_seo_url ),
			':page_meta_keywords' => $page_meta_keywords,
			':page_meta_description' => $page_meta_description,
			':page_contents' => $page_contents,
			':page_publish' => $page_publish
		);
		
		if( isset( $action ) && $action == 'edit' ) {
			$data[':page_id'] = (int)$id;
			$r = $exec -> exec( $sql -> get( 123 ), $data );
		}
		else {
			$r = $exec -> add( $sql -> get( 128 ), $data );
		}
		
		$r ? print( '1|Lưu trang thành công' ) : print( '0|Trùng URL' );
	}
?>