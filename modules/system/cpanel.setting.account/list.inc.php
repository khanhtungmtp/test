<?php
	$exec = new Exec( HOST, USER, PASS, DBNAME );
	$sql = new Sql();

	$html = '';
	$account = $exec -> get( $sql -> get( 184 ) );

	if( count( $account ) !== 0 ) {
		foreach( $account as $key => $account ) {
			$name = $account['admin_username'];
			$type = '';
			switch( $account['group_id'] ) {
				case 1:
					$type = 'Admin';
					break;
				case 2:
					$type = 'CS';
					break;
				case 3:
					$type = 'Writer';
					break;
			}

			$email = $account['admin_email'];
			$mobile = $account['admin_mobile'];

			$block = $account['admin_blocked'] ? 'class="block"' : '';
			$button = $account['admin_blocked'] ? 'fa-unlock' : '';
			$html .= '
				<tr ' . $block . '>
					<td>' . $name . '</td>
					<td>' . $type . '</td>
					<td>' . $email . '</td>
					<td>' . $mobile . '</td>
					<td>
						<button data-href="' . TP_REL_ROOT . '/admin/caidat/taikhoan?action=edit&id=' . $account['admin_id'] . '"class="mini-buttons normal-buttons edit-account-btn" title="Sửa"><i class="fa fa-pencil" aria-hidden="true"></i></button>
						<button class="mini-buttons normal-buttons block-account-btn" title="Khóa" data-id="' . $account['admin_id'] . '"><i class="fa fa-lock ' . $button . '" aria-hidden="true"></i></button>
						<button class="mini-buttons cancel-buttons delete-account-btn" title="Xóa" data-id="' . $account['admin_id'] . '"><i class="fa fa-trash" aria-hidden="true"></i></button>
					</td>
				</tr>
			';
		}
	} else {
		$html .= '
			<tr>
				<td colspan="5">Chưa có tài khoản nào nào</td>
			</tr>
		';
	}

	echo $html;
?>
