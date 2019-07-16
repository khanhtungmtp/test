<?php 
	/**
	 * TAKA+ v1.0
	 * @package takaplus
	 * @date 12.1.2016
	 * @version 0.0.1
	 * @website taka.com.vn
	 *
	 * FILE NÀY LÀ FILE HỆ THỐNG
	 * TUYỆT ĐỐI KHÔNG CHỈNH SỬA
	 * 
	*/

	$shape = new Shape();
	$dom = new Dom();
	
	/**
	 * Load các custom shape
	*/
	require_once( 'custom-shape.php' );
	
	/**
	 * Khai báo shape của hệ thống
	*/
	
	//Cpanel
	$shape -> add( 'system/cpanel', array(
		'head', 
		'header',
		'aside',
		'article',
		'foot'
	) );
	
	//Author admin
	$shape -> add( 'system/autho', array(
		'head',
		'article',
		'foot'
	) );
	
	/**
	 * Móc shape vào DOMObject
	*/
	$dom -> register_shape( $shape );
?>