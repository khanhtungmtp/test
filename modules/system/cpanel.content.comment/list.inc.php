<?php
	$exec = new Exec( HOST, USER, PASS, DBNAME );
	$sql = new Sql();
	
	if( isset( $_POST['offset'] ) ) {
		$offset = (int)$_POST['offset'];
	}
	else $offset = 0;
	
	$html = '';
	//Get comment
	$comments = $exec -> get( $sql -> get( 171 ), array( 
		':offset' => $offset
	), true );

	if( count( $comments ) !== 0 ) {
		foreach( $comments as $key => $comment ) {
			$url = $comment['comment_url'];
			$contents = $comment['comment_contents'];
			$time = date( 'H:i:s d/m/Y', $comment['comment_time'] );
			$block = $show = '';
			if( !$comment['comment_publish'] ) {
				$show = 'fa-eye-slash';
				$block = 'class="block"';
			}
			$html .= '
				<tr ' . $block . ' >
					<td><a href="/' . $url . '" target="blank">' . $url . '</a></td>
					<td>' . $contents . '</td>
					<td>' . $time . '</td>
					<td>
						<button class="mini-buttons normal-buttons block-comment" data-id="' . $comment['comment_id'] . '"><i class="fa fa-eye ' . $show . '" aria-hidden="true"></i></button>
					</td>
				</tr>
			';
		}
	} else {
		$html .= '
			<tr>
				<td colspan="4">Chưa có bình luận nào</td>
			</tr>
		';
	}
	
	echo $html;
?>