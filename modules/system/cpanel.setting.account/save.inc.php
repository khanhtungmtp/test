<?php
	if( isset( $_POST['account_username'] ) ) {
		$exec = new Exec( HOST, USER, PASS, DBNAME );
		$sql = new Sql();
		$hasher = new Password( 8, false );

		//Get data
		foreach( $_POST as $key => $value ) {
			$$key = $value;
		}

		if( isset( $action ) && $action == 'edit' ) {
            $data = array(
    			':group_id' => $account_group,
    			':admin_fullname' => $account_fullname,
    			':admin_username' => $account_username,
                ':admin_id' => (int)$id,
    			':admin_email' => $account_email,
    			':admin_mobile' => $account_mobile
    		);

			$r = $exec -> exec( $sql -> get( 182 ), $data );
			if( $r ) {
				echo '1|Lưu thành công';
			} else {
				echo '0|Thất bại';
			}
		}
		else {

            $data = array(
    			':group_id' => $account_group,
    			':admin_fullname' => $account_fullname,
    			':admin_username' => $account_username,
    			':admin_password' => $hasher -> HashPassword( $account_password ),
    			':admin_email' => $account_email,
    			':admin_mobile' => $account_mobile
    		);

			$r = $exec -> add( $sql -> get( 183 ), $data );
			if( $r ) {
				echo '1|Đăng ký thành công';
			}
			else {
				echo '0|Trùng email, tên đăng nhập hoặc số điện thoại';
			}
		}
	}
?>
