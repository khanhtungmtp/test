<?php 
	class Exec extends Database {
		
		private $_conn;
		
		public function __construct( $host, $user, $pass, $dbname ) {
			parent::__construct( $host, $user, $pass, $dbname );
			
			$this -> _conn = parent::get_connection();
		}
		
		public function add( $sql, $data ) {
			$conn = $this -> _conn;
			$query = $conn -> prepare( $sql );
			$r = $query -> execute( $data );
			if( $r )
				return $conn -> lastInsertId();
			else
				return false;
		}
		
		public function get( $sql, $data = array(), $paramType = false ) {
			$conn = $this -> _conn;
			$query = $conn -> prepare( $sql );
			if( !$paramType ) {
				$query -> execute( $data );
			}
			else {
				foreach( $data as $key => &$param ) {
					if( gettype( $param ) != 'string' )
						$type = PDO::PARAM_INT;
					else
						$type = PDO::PARAM_STR;
					$query -> bindParam( $key, $param, $type );
				}
				$query -> execute();
			}
			return $query -> fetchAll( PDO::FETCH_ASSOC );
		}
		
		public function exec( $sql, $data = array() ) {
			$conn = $this -> _conn;
			$query = $conn -> prepare( $sql );
			return $query -> execute( $data );
		}
	}
?>