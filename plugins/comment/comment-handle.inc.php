<?php
	//Handling error
	
	if( isset( $_POST['submit'] ) ) {
		$exec = new Exec( HOST, USER, PASS, DBNAME );
		$sql = new Sql();

		if( isset( $_SESSION['tk_home_user_data'] ) ) {
			$user_id = $user['user_id'];
		} else {
			$user_id = 0;
		}

		//Get data
		$comment_url = $_POST['comment_url'];
		$comment_parent = $_POST['comment_parent'];
		$comment_author_name = $_POST['comment_author_name'];
		$comment_author_email = $_POST['comment_author_email'];
		$comment_contents = $_POST['comment_contents'];

		//Clean data
		$comment_url = htmlspecialchars( $comment_url, ENT_QUOTES );
		$user_id = htmlspecialchars( $user_id, ENT_QUOTES );
		$comment_parent = htmlspecialchars( $comment_parent, ENT_QUOTES );
		$comment_author_name = htmlspecialchars( $comment_author_name, ENT_QUOTES );
		$comment_author_email = htmlspecialchars( $comment_author_email, ENT_QUOTES );
		$comment_contents = htmlspecialchars( $comment_contents, ENT_QUOTES );

		//Save into db
		$data = array(
			':comment_url' => $comment_url,
			':user_id' => $user_id,
			':comment_parent' => $comment_parent,
			':comment_contents' => $comment_contents,
			':comment_time' => time(),
			':comment_author_name' => $comment_author_name,
			':comment_author_email' => $comment_author_email
		);

		$r = $exec -> add( $sql -> get( 1003 ), $data );

		$r ? $_SESSION['success'] = 'Thành công' : $_SESSION['error'] = 'Có lỗi khi cố bình luận';

		header( "Location:" . $_SERVER['REQUEST_URI'] );
	}
?>
