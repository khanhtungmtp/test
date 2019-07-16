<?php
	$userData = unserialize( $_SESSION['tk_user_data'] );
	$html = '
		<span class="profile-fullname">Xin chào ' . $userData['admin_username'] . '<i class="fa fa-caret-down" aria-hidden="true"></i></span>
		<ul class="profile-panel">
			<li class="profile-item profile-option"><i class="fa fa-cog" aria-hidden="true"></i><a href="' . TP_REL_ROOT . 'admin/canhan">Tùy chọn</a></li>
			<li class="profile-item profile-logout"><i class="fa fa-sign-out" aria-hidden="true"></i><a href="' . TP_REL_ROOT . 'admin/dangxuat">Đăng xuất</a></li>
		</ul>
	';
	echo $html;
?>
