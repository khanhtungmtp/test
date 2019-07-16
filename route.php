<?php
	/**
	 * TAKA+ v1.0
	 * @package takaplus
	 * @date 12.1.2016
	 * @version 0.0.1
	 * @website taka.com.vn
	 *
	 * FILE CỦA HỆ THỐNG
	 * TUYỆT ĐỐI KHÔNG CHỈNH SỬA
	 *
	*/

	$route = new Route();

	/**
	 * Load các custom route
	*/
	require_once( 'custom-route.php' );

    $route -> scan();

    /**
	 * Route of autho
	*/
	 $route -> add( 'nguoidung/dangnhap', 'system/autho.login/index', 'system/autho' ); //Login page
	 $route -> add( 'nguoidung/quenmatkhau', 'system/autho.resetpass/index', 'system/autho' );
	 $route -> add( 'nguoidung/doimatkhau', 'system/autho.changepass/index', 'system/autho' );
	 $route -> add( 'admin/dangxuat', 'system/autho.login/logout', 'system/autho' );

	/**
	 * Route of cpanel
	*/
	//Overview
	 $route -> add( 'admin', 'system/cpanel.overview/index', 'system/cpanel' );

	//Post
	 $route -> add( 'admin/noidung/baiviet', 'system/cpanel.content.post/index', 'system/cpanel' );
	 $route -> add( 'admin/noidung/binhluan', 'system/cpanel.content.comment/index', 'system/cpanel' );
	 $route -> add( 'admin/noidung/trang', 'system/cpanel.content.page/index', 'system/cpanel' );
	 $route -> add( 'admin/noidung/cauhoi', 'system/cpanel.content.question/index', 'system/cpanel' );

	//Appearance
	 $route -> add( 'admin/giaodien/ads', 'system/cpanel.appearance.ads/index', 'system/cpanel' );
	 $route -> add( 'admin/giaodien/ads/detail', 'system/cpanel.appearance.ads/detail', 'system/cpanel' );

	//System
	 $route -> add( 'admin/caidat/giaodien', 'system/cpanel.setting.theme/index', 'system/cpanel' );
	 $route -> add( 'admin/caidat/taikhoan', 'system/cpanel.setting.account/index', 'system/cpanel' );

	//Personal
	 $route -> add( 'admin/canhan', 'system/cpanel.personal/index', 'system/cpanel' );

	/**
	 * Route of *.inc.php
	 */
	 $route -> add( 'include/3', 'system/autho.login/index.inc.php' );
	 $route -> add( 'include/4', 'system/autho.resetpass/index.inc.php' );
	 $route -> add( 'include/5', 'system/autho.changepass/index.inc.php' );
	 $route -> add( 'include/6', 'system/uploader/uploader.inc.php' );
	 $route -> add( 'include/14', 'system/cpanel.content.page/save.inc.php' );
	 $route -> add( 'include/17', 'system/cpanel.content.page/delete.inc.php' );
	 $route -> add( 'include/26', 'system/cpanel.content.post/save.inc.php' );
	 $route -> add( 'include/29', 'system/cpanel.content.post/delete.inc.php' );
	 $route -> add( 'include/30', 'system/cpanel.content.post/list.inc.php' );
	 $route -> add( 'include/31', 'system/cpanel.content.comment/list.inc.php' );
	 $route -> add( 'include/32', 'system/cpanel.content.comment/block.inc.php' );
	 $route -> add( 'include/37', 'system/cpanel.setting.account/save.inc.php' );
	 $route -> add( 'include/38', 'system/cpanel.setting.account/block.inc.php' );
	 $route -> add( 'include/39', 'system/cpanel.appearance.ads/delete.inc.php' );
	 $route -> add( 'include/40', 'system/cpanel.appearance.ads/save.inc.php' );
	 $route -> add( 'include/41', 'system/cpanel.appearance.ads/update.inc.php' );
	 $route -> add( 'include/42', 'system/cpanel.content.question/save.inc.php' );
	 $route -> add( 'include/43', 'system/cpanel.content.question/delete.inc.php' );
	 $route -> add( 'include/44', 'system/cpanel.setting.theme/save.inc.php' );
	 $route -> add( 'include/45', 'system/cpanel.setting.account/delete.inc.php' );
	 $route -> add( 'include/46', 'system/cpanel.personal/save.inc.php' );
?>
