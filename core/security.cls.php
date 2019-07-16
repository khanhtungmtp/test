<?php 
	class Security {
		
		public function sec_session_start( $session = 'dp' ) {
			$secure = false; //Set thành true nếu dùng https
			$httponly = true; //Không cho javascript access vô session
			
			//Session chỉ dùng cookie không dùng biến $_GET
			ini_set( 'session.use_only_cookies', 1 ); 
			
			//Lấy giá trị của session hiện tại
			$cookieParams = session_get_cookie_params();
			
			//Làm mới session
			session_set_cookie_params( 
				$cookieParams["lifetime"], 
				$cookieParams["path"], 
				$cookieParams["domain"],
				$secure, 
				$httponly
			);
			
			//Gán tên cho session
			session_name( $session );
			
			//Khởi động session
			session_start();
			
			//Làm mới id
			//session_regenerate_id( true );   
		}
		
		public function sec_session_destroy( $ssName ) {
			if ( isset( $_SESSION[$ssName] ) ) {

				$_SESSION = array();

				if ( ini_get( 'session.use_cookies' ) ) {
					$params = session_get_cookie_params();
					setcookie( session_name(), '', time() - 42000,
						$params["path"], $params["domain"],
						$params["secure"], $params["httponly"]
					);
				}

				session_destroy();
			}
		}
	}
?>