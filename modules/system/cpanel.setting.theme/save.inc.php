<?php
	$exec = new Exec( HOST, USER, PASS, DBNAME );
	$sql = new Sql();

	//Get data
	foreach( $_POST as $key => $value ) {
		$$key = $value;
	}
	$settings = $exec -> get( $sql -> get( 187 ) );
	foreach( $settings as $key => $value ) {
		if( $value['setting_name'] == 'default_avatar' ) {
			$default_avatar_tbl = $value['setting_value'];
		}
		if( $value['setting_name'] == 'company_information' ) {
			$company_information_tbl = $value['setting_value'];
		}
	}

	$company_information_arr = json_decode( $company_information_tbl, true );
	$company_information_arr['company_name'] = $company_name;
	$company_information_arr['company_address'] = $company_address;
	$company_information_arr['company_phone'] = $company_phone;
	$company_information_arr['company_main_logo'] = $company_main_logo == '' ? $company_information_arr['company_main_logo'] : $company_main_logo;
	$company_information_arr['company_footer_logo'] = $company_footer_logo == '' ? $company_information_arr['company_footer_logo'] : $company_footer_logo;
	$company_information_arr['company_banner_xl'] = $company_banner_xl == '' ? $company_information_arr['company_banner_xl'] : $company_banner_xl;
	$company_information_arr['company_banner_l'] = $company_banner_l == '' ? $company_information_arr['company_banner_l'] : $company_banner_l;
	$company_information_arr['company_banner_m'] = $company_banner_m == '' ? $company_information_arr['company_banner_m'] : $company_banner_m;
	$company_information_arr['company_banner_s'] = $company_banner_s == '' ? $company_information_arr['company_banner_s'] : $company_banner_s;

	$data_default_avatar = array(
		'setting_value' => $default_avatar == '' ? $default_avatar_tbl : $default_avatar,
		'setting_name' => 'default_avatar'
	);

	$data_company_information = array(
		'setting_value' => json_encode( $company_information_arr ),
		'setting_name' => 'company_information'
	);

	$r = $exec -> exec( $sql -> get( 188 ), $data_default_avatar );
	$r = $exec -> exec( $sql -> get( 188 ), $data_company_information );

	$r ? print( '1|Lưu thành công' ) : print( '0|Có lỗi xảy ra' );
?>
