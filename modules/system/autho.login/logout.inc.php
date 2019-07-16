<?php
	unset( $_SESSION['tk_logged'], $_SESSION['tk_user_data'] );
	header( "Location: nguoidung/dangnhap" );
?>
