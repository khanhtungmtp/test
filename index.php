<?php 
	/**
	 * TAKA+ v1.0
	 * @package takaplus
	 * @date 12.1.2016
	 * @version 0.0.1
	 * @website taka.com.vn
	 *
	 * FILE HỆ THỐNG
	 * TUYỆT ĐỐI KHÔNG CHỈNH SỬA
	 * 
	*/
	
	/**
	 * Load route, shape và plugin
	*/
	require_once( 'autoload.php' );
	require_once( 'shape.php' );
	require_once( 'route.php' );
	require_once( 'plugin.php' );
	
	/**
	 * Render DOM
	*/
	$html = $route -> load( $dom );
	
	/**
	 * Render plugin
	*/
	$plugin -> load_plugin( $html );
	
	
	/**
	 * ALL DONE !
	 *
	 * LOAD MORE? NO, JUST LOAD SOMETHING NEW...
	*/
?>