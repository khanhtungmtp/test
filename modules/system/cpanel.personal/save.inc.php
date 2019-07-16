<?php
	$exec = new Exec( HOST, USER, PASS, DBNAME );
	$sql = new Sql();
	$hasher = new Password( 8, false );
	$arr = unserialize( $_SESSION['tk_user_data'] );
	
	//Get data
	foreach( $_POST as $key => $value ) {
		//$$key = htmlspecialchars( strip_tags( $value ), ENT_QUOTES );
		$$key = $value;
	}
	
	$data = array(
		':admin_id' => $arr['admin_id'],
		':admin_fullname' => $admin_fullname,
		':admin_email' => $admin_email,
		':admin_mobile' => $admin_mobile
	);
	
	if( $admin_current_password != '' ) {
		if( $admin_new_password == $admin_confirm_password ) {
			$right = $hasher -> CheckPassword( $admin_current_password, $arr['admin_password'] );
			if( $right ) {
				//Clean data
				$admin_new_password = htmlspecialchars( $admin_new_password, ENT_QUOTES );
				
				//Hash pass
				$hash = $hasher -> HashPassword( $admin_new_password );
				$data[':admin_password'] = $hash;		
				
				//Generate string
				$string = str_shuffle( md5( microtime() ) );
				$data[':admin_resetpass_string'] = $string;
				$r = $exec -> exec( $sql -> get( 197 ), $data );
			} else {
				echo '0|Sai mật khẩu';
				exit();
			}
		} else {
			echo '0|Mật khẩu không khớp';
			exit();
		}
	} else {
		$r = $exec -> exec( $sql -> get( 198 ), $data );
	}
	
	if( $r ) {
		echo '1|Lưu thành công';
	} else {
		echo '0|Lưu thất bại';
	}
?>