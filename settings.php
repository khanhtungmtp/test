<?php
	/**
	 * TAKA+ v1.0
	 * @package takaplus
	 * @date 5.1.2016
	 * @version 0.0.1
	 * @website taka.com.vn
	 *
	 *
	 *
	 * FILE NÀY LƯU CÁC THIẾT LẬP CAO CẤP, CHỈ CHỈNH SỬA KHI BẠN THẬT SỰ
	 * HIỂU ĐƯỢC Ý NGHĨA CỦA NÓ
	 *
	*/

	/**
	 * Thiết lập đường dẫn tương đối (TP_REL_)
	 * Dùng trong các hàm php
	 *
	 * ĐÂY LÀ CÁC HẰNG SỐ CỦA HỆ THỐNG,
	 * TUYỆT ĐỐI KHÔNG CHỈNH SỬA !!!
	*/

	require_once( 'config.php' );

	//Thư mục core
	if( !defined( 'TP_REL_CORE' ) )
		define( 'TP_REL_CORE', TP_ROOT . '/core/' );

	//Thư mục modules
	if( !defined( 'TP_REL_MODULES' ) )
		define( 'TP_REL_MODULES', TP_ROOT . '/modules/' );

	//Thư mục uploads
	if( !defined( 'TP_REL_UPLOADS' ) )
		define( 'TP_REL_UPLOADS', TP_ROOT . '/uploads/' );

	//Thư mục vendors
	if( !defined( 'TP_REL_VENDORS' ) )
		define( 'TP_REL_VENDORS', TP_ROOT . '/vendors/' );

	//Thư mục plugins
	if( !defined( 'TP_REL_PLUGINS' ) )
		define( 'TP_REL_PLUGINS', TP_ROOT . '/plugins/' );

	//Thư mục languages
	if( !defined( 'TP_REL_LANG' ) )
		define( 'TP_REL_LANG', TP_ROOT . '/languages/' );

	//Thư mục chứa code theo kiểu tương đối
	if( !defined( 'TP_REL_ROOT' ) )
		define( 'TP_REL_ROOT', 'http://localhost/namthangtourist/' );

	/**
	 * Thiết lập báo lỗi và debugging (TP_DEBUG_)
	 *
	 * BẠN CÓ THỂ BẬT TẮT BÁO LỖI TRONG QUÁ TRÌNH
	 * PHÁT TRIỂN, TUY NHIÊN HÃY NHỚ ĐẶT VỀ MẶC ĐỊNH
	 * KHI PUBLIC SẢN PHẨM
	*/

	/**
	 * Báo lỗi mysql
	 *
	 * define( 'TP_DEBUG_MYSQL', true ) -> hiện lỗi
	 * define( 'TP_DEBUG_MYSQL', false ) -> ẩn lỗi (mặc định)
	*/
	if( !defined( 'TP_DEBUG_MYSQL' ) )
		define( 'TP_DEBUG_MYSQL', true );

	/**
	 * Báo lỗi php
	 *
	 * define( 'TP_DEBUG_PHP', true ) -> hiện lỗi
	 * define( 'TP_DEBUG_PHP', false ) -> ẩn lỗi (mặc định)
	 *
	*/
	if( !defined( 'TP_DEBUG_PHP' ) )
		define( 'TP_DEBUG_PHP', true );

	/**
	 * Báo lỗi từ taka+ (khi sử dụng class hoặc function có sẵn)
	 *
	 * define( 'TP_DEBUG_EXCEPTION', true ) -> hiện lỗi
	 * define( 'TP_DEBUG_EXCEPTION', false ) -> ẩn lỗi (mặc định)
	*/
	if( !defined( 'TP_DEBUG_EXCEPTION' ) )
		define( 'TP_DEBUG_EXCEPTION', true );

	/**
	 * Thiết lập múi giờ
	 *
	 * BẠN HÃY CHỈNH SỬA PHÙ HỢP VỚI
	 * MÚI GIỜ Ở ĐỊA PHƯƠNG CỦA BẠN
	 *
	 * define( 'TP_TIMEZONE', 'Asia/Ho_Chi_Minh' ) -> (mặc định)
	*/
	if( !defined( 'TP_TIMEZONE' ) )
		define( 'TP_TIMEZONE', 'Asia/Ho_Chi_Minh' );
    date_default_timezone_set(TP_TIMEZONE);
	/**
	 * Thiết lập sử dụng mail server (TP_MAIL_)
	*/

	/**
	 * Bật tắt smtp
	 *
	 * ĐÔI KHI, MỘT SỐ TRƯỜNG HỢP KHÁCH HÀNG
	 * KHÔNG CHỊU SỬ DỤNG SMTP SERVER
	 * KHI ĐÓ HÃY ĐẶT GIÁ TRỊ CHO CẤU HÌNH NÀY THÀNH
	 * TRUE ĐỂ SỬ DỤNG MAIL SERVER CỦA HOSTING
	 *
	 * define( 'TP_DISABLE_SMTP', true ) -> sử dụng mail server của hosting
	 * define( 'TP_DISABLE_SMTP', true ) -> sử dụng smtp server (mặc định)
	*/
	if( !defined( 'TP_DISABLE_SMTP' ) )
		define( 'TP_DISABLE_SMTP', true );

	/**
	 * Thiết lập smtp
	 *
	 * BAO GỒM THIẾT LẬP HOST, USERNAME, PASSWORD, PORT,
	 * MAIL FROM, MAIL REPLY TO.
	 * TUYỆT ĐỐI KHÔNG SỬA NHỮNG DÒNG NÀY !!!
	*/
	if( !defined( 'TP_MAIL_SMTP_PARAMS' ) )
		define( 'TP_MAIL_SMTP_PARAMS', serialize( array(
			'SMTP_HOST' => '',
			'SMTP_USERNAME' => '',
			'SMTP_PASSWORD' => '',
			'SMTP_PORT' => '',
			'SMTP_MAIL_FROM' => '',
			'SMTP_MAIL_REPLY_TO' => ''
		) ) );

	/**
	 * Thiết lập cơ sở dữ liệu (TP_DB_)
	 *
	 * BAO GỒM NHỮNG THIẾT LẬP DB HOST, DB USERNAME,
	 * DB PASSWORD, SCHEMA NAME.
	 * TUYỆT ĐỐI KHÔNG SỬA NHỮNG DÒNG NÀY !!!
	*/
	if( !defined( 'TP_DB_PARAMS' ) )
		define( 'TP_DB_PARAMS', serialize( array(
			'DB_HOST' => 'localhost',
			'DB_USERNAME' => 'root',
			'DB_PASSWORD' => '',
			'DB_SCHEMA_NAME' => 'namthangtourist',
			'DB_TABLE_PREFIX' => 'nt_',
			'DB_CHARSET' => 'utf8',
			'DB_COLLATE' => 'utf8_unicode_ci',
			'DB_ENGINE' => 'innodb'
		) ) );

	/**
	 * Phần này chỉ dùng để xài đỡ khi chưa sửa xong phần SQL
	*/
	$db = unserialize( TP_DB_PARAMS );
	define( 'HOST', $db['DB_HOST'] );
	define( 'USER', $db['DB_USERNAME'] );
	define( 'PASS', $db['DB_PASSWORD'] );
	define( 'DBNAME', $db['DB_SCHEMA_NAME'] );

	/**
	 * Quản lý phiên bản (TP_VERSION_)
	 *
	 * CÁC HẰNG SỐ NÀY LÀ KHÔNG THỂ GHI ĐÈ
	 *
	 * NHỮNG HẰNG SỐ NÀY LÀ CỰC KỲ CỰC KỲ QUAN TRỌNG
	 * BẰNG MỌI GIÁ KHÔNG ĐƯỢC SỬA CHỮA HOẶC XÓA BỎ !!!
	*/

	//Phiên bản của takaplus
	define( 'TP_VERSION_MAIN', '1.0' );

	//Phiên bản của cơ sở dữ liệu
	define( 'TP_VERSION_DB', '1.0' );

	//Phiên bản của quy định bản quyền
	define( 'TP_VERSION_LICENSE', '1.0' );

	/**
	 * Hằng số điều khiển quá trình cài đặt
	 *
	 * TUYỆT ĐỐI KHÔNG CHỈNH SỬA HOẶC XÓA BỎ
	*/
	define( 'TP_INSTALLED', true );

	/**
	 * Bật tắt chế độ DEV_MODE
	 *
	 * CHẾ ĐỘ DEV_MODE = TRUE SẼ XÓA BỎ COOKIE Ở FILE INSTALL.PHP#45
	*/
	define( 'TP_DEV_MODE', true );

	/**
	 * KẾT THÚC CẤU HÌNH TAKA+
	 *
	 * CODING OR DOING AN EXCEPTION ...
	*/
?>
