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
	 * FILE NÀY GIÚP TỰ ĐỘNG INCLUDE CÁC CLASS
	 * CẦN THIẾT KHI MỘT OBJECT ĐƯỢC TẠO
	 *
	*/
	
	/**
	 * Load các thiết đặt
	*/
	require_once( 'settings.php' );
	
	/**
	 * Tự động nhúng các class cần thiết
	 *
	*/
	spl_autoload_register( function( $className ) {
		$core = TP_REL_CORE . strtolower( $className ) . '.cls.php';
		include_once $core;
	} );
	
	/**
	 * Khởi tạo session bảo mật cao
	 *
	 * SESSION NÀY ĐƯỢC DÙNG CHUNG CHO 
	 * TẤT CẢ CÁC SUBDOMAIN LIÊN QUAN
	*/
	$security = new Security();
	$security -> sec_session_start( 'fbtwss' );
?>