<?php
	$exec = new Exec( HOST, USER, PASS, DBNAME );
	$sql = new Sql();
	$arr = unserialize( $_SESSION['tk_user_data'] );
	$admin = $exec -> get( $sql -> get( 196 ), array(
		':admin_id' => $arr['admin_id']
	) );
	switch( $admin[0]['group_id'] ) {
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
	$html = '
		<tr>
			<td>Tên đăng nhập</td>
			<td>
				<input type="text" class="inputs" value="' . $admin[0]['admin_username'] . '" readonly />
			</td>
		</tr>
		<tr>
			<td>Nhóm</td>
			<td>
				<input type="text" class="inputs" value="' . $type . '" readonly />
			</td>
		</tr>
		<tr>
			<td>Họ tên</td>
			<td>
				<input type="text" name="admin_fullname" class="inputs personal-textbox" value="' . $admin[0]['admin_fullname'] . '" />
			</td>
		</tr>
		<tr>
			<td>Email</td>
			<td>
				<input type="text" name="admin_email" class="inputs personal-textbox" value="' . $admin[0]['admin_email'] . '" />
			</td>
		</tr>
		<tr>
			<td>Di động</td>
			<td>
				<input type="text" name="admin_mobile" class="inputs personal-textbox" value="' . $admin[0]['admin_mobile'] . '" />
			</td>
		</tr>
		<tr>
			<td colspan="2"><span class="buttons normal-buttons change-pass">Đổi mật khẩu</span></td>
		</tr>
		<tr class="pass hide">
			<td>Mật khẩu hiện tại</td>
			<td>
				<input type="password" name="admin_current_password" class="inputs required-inputs personal-textbox" placeholder="Nhập mật khẩu hiện tại" />
			</td>
		</tr>
		<tr class="pass2 hide">
			<td>Mật khẩu mới</td>
			<td>
				<input type="password" name="admin_new_password" class="inputs required-inputs personal-textbox" placeholder="Nhập mật khẩu mới" />
			</td>
		</tr>
		<tr class="pass3 hide">
			<td>Xác nhận mật khẩu</td>
			<td>
				<input type="password" name="admin_confirm_password" class="inputs required-inputs personal-textbox" placeholder="Nhập lại mật khẩu" />
			</td>
		</tr>
		<tr class="noti hide">
			<td><i>Chú ý (*)</i></td>
			<td><i>Mật khẩu gồm 8-20 kí tự, chứa ít nhất: 1 số, 1 ký tự đặc biệt, 1 ký tự in hoa</i></td>
		</tr>
		
		
	';
	echo $html;
?>