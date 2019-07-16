<?php
	$exec = new Exec( HOST, USER, PASS, DBNAME );
	$sql = new Sql();

	$html = '
		<div class="tabs module-addnew">
			<span class="tab-title">Thêm tài khoản</span>
			<div class="module-addnew-btn">
				<span class="buttons disabled-buttons account-save-new save-btn"><i class="fa fa-floppy-o" aria-hidden="true"></i> Lưu</span>
			</div>
			<table class="form-tables tbl">
				<tr>
					<td>Họ và tên</td>
					<td>
						<input name="account_fullname" type="text" class="inputs account-textbox" placeholder="Tên tài khoản"/>
					</td>
				</tr>
				<tr>
					<td>Tên đăng nhập (*)</td>
					<td>
						<input name="account_username" type="text" class="inputs required-inputs account-textbox" placeholder="Tên đăng nhập"/>
					</td>
				</tr>
				<tr>
					<td>Mật khẩu (*)</td>
					<td>
						<input name="account_password" type="text" class="inputs required-inputs account-textbox" placeholder="Mật khẩu"/>
					</td>
				</tr>
				<tr>
					<td>Loại(*)</td>
					<td>
                    <input type="hidden" class="account-textbox" name="account_group" value="1" />
                    <input class="inputs" type="text" value="Quản trị viên" readonly />
					</td>
				</tr>
				<tr>
					<td>Email(*)</td>
					<td>
						<input name="account_email" type="email" class="inputs required-inputs account-textbox" placeholder="Email"/>
					</td>
				</tr>
				<tr>
					<td>Số điện thoại (*)</td>
					<td>
						<input name="account_mobile" type="tel" class="inputs required-inputs account-textbox" placeholder="Số điện thoại"/>
					</td>
				</tr>
			</table>
		</div>
	';

	if( isset( $_GET['action'], $_GET['id'] ) && $_GET['action'] == 'edit' ) {
		//Get account
		$data = array(
			':admin_id' => (int)$_GET['id']
		);
		$account = $exec -> get( $sql -> get( 181 ), $data );
		$account = $account[0];

		$admin_fullname = $account['admin_fullname'];
		$admin_username = $account['admin_username'];
		$admin_email = $account['admin_email'];
		$admin_mobile = $account['admin_mobile'];

		$html = '
			<div class="tabs module-addnew">
				<span class="tab-title">Thêm tài khoản</span>
				<div class="module-addnew-btn">
					<span class="buttons disabled-buttons account-save-new save-btn"><i class="fa fa-floppy-o" aria-hidden="true"></i> Lưu</span>
				</div>
				<table class="form-tables tbl">
					<tr>
						<td>Họ và tên</td>
						<td>
							<input name="account_fullname" type="text" class="inputs account-textbox" placeholder="Tên tài khoản" value="' . $admin_fullname . '"/>
						</td>
					</tr>
					<tr>
						<td>Tên đăng nhập (*)</td>
						<td>
							<input name="account_username" type="text" class="inputs required-inputs account-textbox" placeholder="Tên đăng nhập" value="' . $admin_username . '"/>
						</td>
					</tr>
					<tr>
						<td>Email(*)</td>
						<td>
							<input name="account_email" type="email" class="inputs required-inputs account-textbox" placeholder="Email" value="' . $admin_email . '"/>
						</td>
					</tr>
					<tr>
						<td>Loại(*)</td>
						<td>
							<input type="hidden" class="account-textbox" name="account_group" value="1" />
							<input class="inputs" type="text" value="Quản trị viên" readonly />
						</td>
					<tr>
						<td>Số điện thoại (*)</td>
						<td>
							<input name="account_mobile" type="tel" class="inputs required-inputs account-textbox" placeholder="Số điện thoại" value="' . $admin_mobile . '"/>
						</td>
					</tr>
				</table>
			</div>
		';
	}

	echo $html;
?>
