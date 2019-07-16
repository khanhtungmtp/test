<?php 
	$db = unserialize( TP_DB_PARAMS );
	$exec = new Exec( $db['DB_HOST'], $db['DB_USERNAME'], $db['DB_PASSWORD'], $db['DB_SCHEMA_NAME'] );
	$hasher = new Password( 8, false );
	
	if( isset( $_POST['pass'] ) ) {
		
		//Get variables
		$pass = strip_tags( $_POST['pass'] );
		$captcha = strip_tags( $_POST['captcha'] );
		$email = strip_tags( $_POST['email'] );
		$string = strip_tags( $_POST['string'] );

		//Check captcha
		$captchaResponse = file_get_contents( 'https://www.google.com/recaptcha/api/siteverify?secret=6LdEPAkUAAAAAC5YEiTenhV9NDaKbDULQ3GoAKRw&response=' . $captcha . '&remoteip=' . $_SERVER['REMOTE_ADDR'] );
		if( !$captchaResponse ) {
			echo 'Vui lòng xác nhận captcha...';
			exit;
		}
		
		//Remove special characters
		$email = preg_replace( '/[^a-zA-Z0-9\.@]/', '', $email );
		$string = preg_replace( '/[^a-zA-Z0-9]/', '', $string );
		
		//Check admin_resetpass_string
		$getData = array (
			':admin_email' => $email,
			':admin_resetpass_string' => $string
		);
		
		$prefix = $db['DB_TABLE_PREFIX'];
		$sql = "SELECT admin_id FROM " . $prefix . "admins WHERE admin_resetpass_string = :admin_resetpass_string AND admin_email = :admin_email;";
		$get = $exec -> get( $sql, $getData );
		if( empty( $get ) ) {
			echo 'Không tồn tại email hoặc link đổi mật khẩu hết hạn!';
			exit;
		}

		//Update password
		$execData = array(
			':admin_password' => $hasher -> HashPassword( $pass ),
			':admin_id' => $get[0]['admin_id']
		);
		
		$sql2 = "UPDATE " . $prefix . "admins SET admin_password = :admin_password WHERE admin_id = :admin_id;";
		$r = $exec -> exec( $sql2, $execData );
		$r ? print( 'success' ) : false;
	}
?>