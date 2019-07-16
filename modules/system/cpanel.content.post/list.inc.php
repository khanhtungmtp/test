<?php
	$exec = new Exec( HOST, USER, PASS, DBNAME );
	$sql = new Sql();

	if( isset( $_POST['offset'] ) ) {
		$offset = (int)$_POST['offset'];
	}
	else $offset = 0;

    $html = '';

    if(isset($_POST['cate'])) {
        $posts = $exec -> get( $sql -> get( 1611 ), array(
            ':cate_id' => '%' . $_POST['cate'] . '%',
            ':offset' => $offset
    	), true );

    } else {
        $posts = $exec -> get( $sql -> get( 161 ), array(
    		':offset' => $offset
    	), true );
    }

	if( count( $posts ) == 0 ) {
		$html = '
			<tr>
				<td colspan="5" style="text-align: center;">Hiện chưa có bài viết</td>
			</tr>
		';
	}

	foreach( $posts as $key => $value ) {
		$comment = $exec -> get( $sql -> get( 162 ), array(
			':comment_url' => $value['post_seo_url']
		) );

		$cate = '';
		$cateArr = array_filter( explode( ',', $value['blog_cate_id'] ), 'strlen' );
		foreach( $cateArr as $value2 ) {
			$cate2 = $exec -> get( $sql -> get( 1631 ), array(
				':id' => $value2
			) );

			$cate .= $cate2[0]['blog_cate_name'] . ',';
		}
		$cate = trim( $cate, ',' );

		$html .= '
			<tr>
				<td>' . ucfirst( mb_convert_case( $value['post_title'], MB_CASE_LOWER, 'UTF-8' ) ) . '</td>
				<td>' . date( 'H:i:s d/m/Y', $value['post_time'] ) . '</td>
				<td>
					' . $cate . '
				</td>
				<td>
					<a href="" target="blank">' . $comment[0]['amount'] . '</a>
				</td>
				<td>
					<button data-id="' . $value['post_id'] . '" class="mini-buttons normal-buttons edit-post" title="Sửa"><i class="fa fa-pencil" aria-hidden="true"></i></button>
					<button data-id="' . $value['post_id'] . '" class="mini-buttons cancel-buttons delete-post" title="Xóa"><i class="fa fa-trash" aria-hidden="true"></i></button>
				</td>
			</tr>
		';
	}
	echo $html;
?>
