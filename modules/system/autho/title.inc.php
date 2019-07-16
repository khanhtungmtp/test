<?php 
	switch( $_GET['params'] ) {
		case 'nguoidung/dangnhap':
			echo 'Đăng nhập';
			break;
		case 'nguoidung/quenmatkhau':
			echo 'Phục hồi mật khẩu';
			break;
		case 'nguoidung/doimatkhau':
			echo 'Đổi mật khẩu';
			break;
	}
?>