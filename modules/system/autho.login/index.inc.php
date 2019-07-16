<?php
	$db = unserialize( TP_DB_PARAMS );
	$exec = new Exec( $db['DB_HOST'], $db['DB_USERNAME'], $db['DB_PASSWORD'], $db['DB_SCHEMA_NAME'] );
	$hasher = new Password( 8, false );

	if( isset( $_POST['info'] ) ) {
		$info = strip_tags( $_POST['info'] );
		$password = strip_tags( $_POST['password'] );

		//Remove special characters
		$info = preg_replace( '/[^a-zA-Z0-9@\.]+/', '', $info );

		$data = array(
			':admin_username' => $info,
			':admin_email' => $info
		);

		$prefix = $db['DB_TABLE_PREFIX'];
		$sql = "SELECT * FROM " . $prefix . "admins WHERE (admin_username = :admin_username OR admin_email = :admin_email) AND admin_blocked = 0 LIMIT 1;";
		$r = $exec -> get( $sql, $data );
		if( count( $r ) == 1 ) {
			$hash = $r[0]['admin_password'];
			$isRight = $hasher -> CheckPassword( $password, $hash );

			if( $isRight ) {
				$_SESSION['tk_logged'] = true;
				$_SESSION['tk_user_data'] = serialize( $r[0] );
				echo 'success';
			}
			else
				echo 'Sai thông tin đăng nhập!';
		}
		else
			echo 'Sai thông tin đăng nhập!';
	}
?>
