<?php
	/**
	 * TAKA+ v1.0
	 * @package takaplus
	 * @date 12.1.2016
	 * @version 0.0.1
	 * @website taka.com.vn
	 *
	 * THÊM CÁC ROUTE CỦA BẠN BÊN DƯỚI
	 *
	*/

	$route -> add( '', 'public/home.home/index', 'public/home'); //Homepage
	$route -> add( 'tin-tuc', 'public/home.news/index', 'public/home'); //Homepage
	$route -> add( 'bai-viet', 'public/home.single/index', 'public/home'); //Homepage
	$route -> add( 'tour', 'public/home.tour/index', 'public/home'); //Homepage
	$route -> add( 'nhom-tour', 'public/home.tourgroup/index', 'public/home'); //Homepage


    //$route -> add_dynamic('SELECT page_seo_url FROM hhvt_pages;', 'public/home.page/index', 'public/home'); // News

    /**
	 * Kết thúc phần custom route
	 *
	 * CODING OR DOING AN EXCEPTION ...
	*/
?>
