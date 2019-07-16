<?php 
	class Sms {
		
		public function __construct( $user, $pass, $sender ) {
			$this -> user = $user;
			$this -> pass = $pass;
			$this -> sender = $sender;
		}
		
		public function send( $number, $text ) {
			$curl = curl_init();
			$url = 'http://center.fibosms.com/service.asmx/SendMaskedSMS?';
			$url = $url . http_build_query(  
				array(
					'clientNo' => $this -> user,
					'clientPass' => $this -> pass,
					'senderName' => $this -> sender,
					'phoneNumber' => $number,
					'smsMessage' => $text,
					'smsGUID' => 0,
					'serviceType' => 0
				)
			);
			
			curl_setopt( $curl, CURLOPT_URL, $url );
			curl_setopt( $curl, CURLOPT_RETURNTRANSFER, true );
			
			$r = curl_exec( $curl );
			if( !$r ) {
				return false;
			}
			return $r;
		}
	}
?>