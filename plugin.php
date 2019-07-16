<?php
	/**
	 * TAKA+ v1.0
	 * @package plugin
	 * @date 12.1.2016
	 * @version 0.0.1
	 * @website taka.com.vn
	 *
	 * TẠO MỘT PLUGIN THÌ VIỆC ĐẦU TIÊN LÀ ...
	 * ĐĂNG KÝ TÊN TUỔI CỦA NÓ BÊN DƯỚI
	 *
	*/
	$plugin = new Plugin();


	/**
	 * Khai báo tên các plugin bên dưới
	*/

	//Comment
	$plugin -> register_plugin( 'Comment plugin', 'comment', array(
		'plu_comment',
	) );

	//Ads
	$plugin -> register_plugin( 'Ads plugin', 'ads', array(
		'plu_ads',
	) );

	//Search
	$plugin -> register_plugin( 'Search plugin', 'search', array(
		'plu_search',
	) );

	//Sidebar
	$plugin -> register_plugin( 'Sidebar plugin', 'sidebar', array(
		'plu_sidebar',
	) );

	//Member
	$plugin -> register_plugin( 'Member plugin', 'member', array(
		'plu_member',
	) );

	//Visitor
	$plugin -> register_plugin( 'Visitor plugin', 'visitors', array(
		'plu_visitors',
	) );


	/**
	 * Kết thúc phần plugin
	 *
	 * THINK LESS. CODE MORE.
	*/
?>
