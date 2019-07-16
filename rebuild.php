<!doctype html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>TOOL FOR CRAZY GUYS...</title>
	</head>
	<body style="background-color: #000;">
		<?php 
			/**
			 * TAKA+ v1.0
			 * @package helper
			 * @date 12.1.2016
			 * @version 0.0.1
			 * @website taka.com.vn
			 *
			 * FILE HỆ THỐNG
			 * TUYỆT ĐỐI KHÔNG CHỈNH SỬA
			 * 
			 * CHẠY FILE NÀY KHI BẠN CHUYỂN HOST
			 * HOẶC PUBLIC WEB MÀ CÓ LỖI XẢY RA
			*/
			
			require_once( 'settings.php' );
			
			/**
			 * Tắt báo lỗi
			*/
			error_reporting( 0 );
			
			/**
			 * Hàm new_step();
			*/
			function new_step( $string ) {
				echo '<b>' . $string . '</b>';
				sleep( 1 ); //Ngủ 1s trước khi sang bước kế tiếp
			}
			
			/**
			 * Hàm lấy tất cả file php vô mảng (trừ thư mục PHPExcel và các file tpl)
			*/
			function get_all_php_file( $dir ) {
				$ffs = glob( "$dir/*" );
				$phpFiles = array();
				foreach($ffs as $ff){
					$ext = pathinfo($ff, PATHINFO_EXTENSION);
					if( $ext == 'php' && strpos( $ff, '.tpl.php' ) === false ){
						$phpFiles[] = $ff;
					}
					if(is_dir($ff) && basename($ff) != 'PHPExcel') {
						$phpFileInSub = get_all_php_file($ff);
						foreach( $phpFileInSub as $file ) {
							$phpFiles[] = $file;
						}
					} 
				}
				return $phpFiles;
			}
			
			/**
			 * In ra câu hướng dẫn
			*/
			new_step( '<p style="color:#ffffff;">"Đôi khi làm đen mọi thứ lại làm hiện ra tất cả..." <code>#dp0613</code></p>' );
			
			/**
			 * Kiểm tra thông tin kết nối db
			*/
			new_step( 'Thử kết nối database: ' );
			$db = unserialize( TP_DB_PARAMS );
			$conn = mysqli_connect( $db['DB_HOST'], $db['DB_USERNAME'], $db['DB_PASSWORD'], $db['DB_SCHEMA_NAME'] );
			$conn ? print( 'PASSED' ) : print( 'FAILED: <code>' . mysqli_connect_error() . '</code>' );
			echo '<br /><br />';
			
			/**
			 * Lấy thông tin máy chủ
			*/
			new_step( 'Cấu hình máy chủ:' );
			$sqlVersion = mysqli_query( $conn, "select @@version as v;" );
			$sqlVersion = mysqli_fetch_assoc( $sqlVersion );
			$serverInfo = '
				<table border="1" cellpadding="10" cellspacing="0" style="border-color: #000000;">
					<tr>
						<td>Phiên bản MySQL:</td>
						<td>' . $sqlVersion['v'] . '</td>
					</tr>
					<tr>
						<td>Phiên bản PHP:</td>
						<td>' . phpversion() . '</td>
					</tr>
					<tr>
						<td>Hệ điều hành:</td>
						<td>' . php_uname() . '</td>
					</tr>
				</table>
			';
			echo $serverInfo;
			echo '<br /><br />';
			
			/**
			 * Sửa file .htaccess
			*/
			new_step( 'Cố gắng sửa file .htaccess...' );
			$arrRootStrings = array(
				'www',
				'htdocs',
				'public_html',
				'httpdocs',
				'httpsdocs'
			);
			$baseFolder = in_array( basename( __DIR__ ), $arrRootStrings ) ? '' : basename( __DIR__ ) . '/';
			$oldFile = file( __DIR__ . '/.htaccess' );
			$oldFile[8] = 'RewriteBase /' . $baseFolder . "\r\n" ;
			file_put_contents( __DIR__ . '/.htaccess', "" );
			foreach( $oldFile as $line ) {
				file_put_contents( __DIR__ . '/.htaccess', $line, FILE_APPEND );
			}
			echo 'DONE';
			echo '<br /><br />';
			
			/**
			 * Quét lỗi code ẩu
			*/
			new_step( 'Quét lỗi code ẩu...' );
			$dir = __DIR__;
			$allPhpFiles = get_all_php_file( $dir );
			$error = false;
			foreach( $allPhpFiles as $file ) {
				$contents = file( $file );
				$errorLines = preg_grep( '/(.+)\(\)\[(.+)\]/', $contents );
				if( count( $errorLines ) > 0 ) {
					$error = true;
					foreach( $errorLines as $line => $text ) {
						echo '<br /> Lỗi: <code>' . str_replace( '\\', '/', $file ) . '#<b>' . $line . '</b></code>';
					}
				}
			}
			!$error ? print( 'NICE JOB' ) : print( 'YOU ARE SO STUPID :(' );
			echo '<br /><br />';
			
			/**
			 * Về trang chủ
			*/
			new_step( 'Tất cả lỗi đã sửa xong, bạn có thể vào trang chủ <u><a href="http://funnypetty.com" target="_blank" style="color:#000000;">tại đây</a></u> hoặc <u><a href="http://fb.me/0613.dp" target="_blank" style="color:#000000;">tại đây</a></u>' );
			
			echo '<br /><br />';
			
			echo '<h1 style="color: #ffffff;">TAKA+<h1>';
		?>
	</body>
</html>