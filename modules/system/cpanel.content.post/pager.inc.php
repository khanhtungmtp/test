<?php 
	$exec = new Exec( HOST, USER, PASS, DBNAME );
	$sql = new Sql();
	
	if( !isset( $_GET['s'] ) ) {
		$number = $exec -> get( $sql -> get( 170 ) );
		$number = $number[0]['number'];
		$viewing = $number < 5 ? $number : 5;
		$html = '
			<div class="total-row">
				<span class="loadmore-btn" data-offset="0">Tải thêm</span>
				<p class="showing-info">Đang hiển thị <b class="viewing">' . $viewing . '</b> trong số <b>' . $number . '</b> bài viết</p>
			</div>
		';
		echo $html;
	}
?>