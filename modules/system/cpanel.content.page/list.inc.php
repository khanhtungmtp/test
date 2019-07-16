<?php
	$exec = new Exec( HOST, USER, PASS, DBNAME );
	$sql = new Sql();

	$html = '';
	$pages = $exec -> get( $sql -> get( 121 ) );
	if( count( $pages ) === 0 ) {
		echo '
			<tr>
				<td colspan="2">Chưa có trang tĩnh nào</td>
			</tr>
		';
	} else {
		foreach( $pages as $key => $page ) {
			$html .= '
				<tr>
					<td>' . $page['page_name'] . '</td>
					<td>
						<button data-href="' . TP_REL_ROOT . '/admin/noidung/trang?action=edit&id=' . $page['page_id'] . '"class="mini-buttons normal-buttons edit-page-btn" title="Sửa"><i class="fa fa-pencil" aria-hidden="true"></i></button>
						<button class="mini-buttons cancel-buttons delete-page" title="Xóa" data-id="' . $page['page_id'] . '"><i class="fa fa-trash" aria-hidden="true"></i></button>
					</td>
				</tr>
			';
		}
	}

	echo $html;
?>
