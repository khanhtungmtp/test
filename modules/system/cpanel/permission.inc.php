<?php 
	$userData = unserialize( $_SESSION['tk_user_data'] );
	
	//Display aside
	switch( $userData['group_id'] ) {
		//Admin
		case 1:
			$aside = 'aside-ad';
			break;
		//CS	
		case 2:
			$aside = 'aside-cs';
			break;
		//Writer
		case 3:
			$aside = 'aside-writer';
			break;
	}
	
	/*Check permission */
	//Get all url in each aside
	$asideHTML = file_get_contents( TP_REL_MODULES . 'system/cpanel/' . $aside . '.inc.php' );
	
	preg_match_all( '/TP_REL_ROOT\s\.\s\'([\w\/]+)\"/', $asideHTML, $links );
	$links = $links[1];
	$newLinks = array();
	foreach( $links as $key => $link ) {
		array_push( $newLinks, str_replace( '/', '', $link ) );
	}
	if( $aside == 'aside-ad' || $aside == 'aside-cs' ) {
		array_push( $newLinks, 'adminbanhangdondathangchitiet' );
	}
	$newLinks = json_encode( $newLinks );
	$accessLink = explode( '?', $_GET['params'] );
	$accessLink =  str_replace( '/', '', $accessLink[0] );
	if( strpos( $newLinks, $accessLink ) === false ) {
		if( $_GET['params'] !== 'admin' ) {
			header( "Location: " . TP_REL_ROOT . "admin" );
			exit;
		}
	}
	//Echo aside
	echo '{@' . $aside . '}';
?>