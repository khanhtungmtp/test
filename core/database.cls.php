<?php 
	class Database {
		
		private $_host;
		private $_user;
		private $_pass;
		private $_dbname;
		
		public function __construct( $host, $user, $pass, $dbname ) {
			$this -> _host = $host;
			$this -> _user = $user;
			$this -> _pass = $pass;
			$this -> _dbname = $dbname;
		}
		
		public function get_connection() {
			$conn = new PDO( "mysql:host={$this -> _host};dbname={$this -> _dbname};charset=utf8", $this -> _user, $this -> _pass );
			$mode = TP_DEBUG_MYSQL ? PDO::ERRMODE_EXCEPTION : PDO::ERRMODE_SILENT;
			$conn -> setAttribute( PDO::ATTR_ERRMODE, $mode );
			$conn->setAttribute( PDO::MYSQL_ATTR_INIT_COMMAND, 'SET NAMES utf8' );
			return $conn;
		}
	}
?>