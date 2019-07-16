<?php 
	class Smtp {
		private $host,
			$user,
			$pass,
			$port,
			$from,
			$replyTo;
		
		public function __construct( $host, $user, $pass, $port, $from, $replyTo ) {
			$this -> host = $host;
			$this -> user = $user;
			$this -> pass = $pass;
			$this -> port = $port;
			$this -> from = $from;
			$this -> replyTo = $replyTo;
		}
		
		public function send( $to, $obj, $msg ) {
			if( TP_DISABLE_SMTP ) {
				return mail( $to, $obj, $msg );
			}
			
			$socket = fsockopen( $this -> host, $this -> port, $errno, $errstr, 15 );
			
			//Headers
			$headers  = 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
			$headers .= 'From: ' . $this -> from . "\r\n";
			$headers .= 'Reply-To: ' . $this -> replyTo . "\r\n";
			
			//Object with utf8
			$obj = '=?utf-8?B?'.base64_encode( $obj ).'?=';
			
			if( !$socket ) {
				return false;
			}
			
			$this -> server_parse($socket, '220');
			
			//Error array
			$errors = array();
			
			$errors[] = fwrite($socket, 'HELO '.$this -> host."\r\n");
			$this -> server_parse($socket, '250');
		 
			$errors[] = fwrite($socket, 'AUTH LOGIN'."\r\n");
			$this -> server_parse($socket, '334');
		 
			$errors[] = fwrite($socket, base64_encode($this -> user)."\r\n");
			$this -> server_parse($socket, '334');
		 
			$errors[] = fwrite($socket, base64_encode($this -> pass)."\r\n");
			$this -> server_parse($socket, '235');
		 
			$errors[] = fwrite($socket, 'MAIL FROM: <'.$this -> user.'>'."\r\n");
			$this -> server_parse($socket, '250');
			
			$recipients = array( $to );
			foreach ($recipients as $email) {
				$errors[] = fwrite($socket, 'RCPT TO: <'.$email.'>'."\r\n");
				$this -> server_parse($socket, '250');
			}
		 
			$errors[] = fwrite($socket, 'DATA'."\r\n");
			$this -> server_parse($socket, '354');
		 
			$errors[] = fwrite($socket, 'Subject: '
			  .$obj."\r\n".'To: <'.implode('>, <', $recipients).'>'
			  ."\r\n".$headers."\r\n\r\n".$msg."\r\n");
		 
			$errors[] = fwrite($socket, '.'."\r\n");
			$this -> server_parse($socket, '250');
		 
			$errors[] = fwrite($socket, 'QUIT'."\r\n");
			fclose($socket);
		 
			return array_search( false, $errors ) === false;
		}
		
		public function server_parse($socket, $expected_response) {
			$server_response = '';
			while( substr( $server_response, 3, 1 ) != ' ' ) {
				if ( !( $server_response = fgets( $socket, 256 ) ) ) {
					return 'Lỗi khi lấy phản hồi';
				}            
			}

			if ( !( substr( $server_response, 0, 3 ) == $expected_response ) ) {
				return 'Không thể gửi mail"' . $server_response;
			}
		}
		
	}
?>