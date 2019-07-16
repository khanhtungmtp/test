<?php
	$exec = new Exec( HOST, USER, PASS, DBNAME );
	$sql = new Sql();

	$settings = $exec -> get( $sql -> get( 187 ) );
	foreach( $settings as $key => $value ) {

		if( $value['setting_name'] == 'default_avatar' ) {
			$default_avatar = $value['setting_value'];
		}
		if( $value['setting_name'] == 'company_information' ) {
			$company_information = $value['setting_value'];
		}

	}

	$company_information = json_decode( $company_information, true );
	$avatar = json_decode( $default_avatar, true );

    foreach($company_information as $key => $value) {
        if(is_array(json_decode($value, true))) {
            $url = json_decode($value, 0);
            $company_information[$key] = $url[0];
        }
    }

	$html = '
		<span class="tab-title">Giao diện</span>
		<div class="module-addnew-btn">
			<span class="buttons disabled-buttons general-save-new save-btn"><i class="fa fa-floppy-o" aria-hidden="true"></i> Lưu</span>
		</div>
		<input type="radio" name="tab" id="tab1" class="tab-radio" checked />
		<label for="tab1" class="tab-label">Logo</label>
		<div class="tab-content">
			<table class="form-tables tab1-tbl">
				<tr>
					<td>Logo chính:</td>
					<td>
                        <button class="upload-image hidden">Upload</button>
                        <input name="company_main_logo" type="text" class="company-information-input inputs hidden general-textbox" readonly />
                        <input type="file" data-image-name="logo_main" class="file-inputs general-textbox picture" id="picture_1" accept="image/*" />
                        <label for="picture_1">
                            <span>Chọn hình ảnh</span>
                            <span>Chưa chọn file...</span>
                        </label>
					</td>
				</tr>
                <tr>
					<td colspan="2">
						<div class="picture-preview">
							<img width="200" height="200" src="' . TP_REL_ROOT . 'uploads/public/' . $company_information['company_main_logo'] . '" />
						</div>
					</td>
				</tr>
				<tr>
					<td>Logo chân trang:</td>
                    <td>
                        <button class="upload-image hidden">Upload</button>
                        <input name="company_footer_logo" type="text" class="company-information-input inputs hidden general-textbox" readonly />
                        <input type="file" data-image-name="logo_footer" class="file-inputs general-textbox picture" id="picture_2" accept="image/*" />
                        <label for="picture_2">
                            <span>Chọn hình ảnh</span>
                            <span>Chưa chọn file...</span>
                        </label>
					</td>
				</tr>
                <tr>
					<td colspan="2">
						<div class="picture-preview">
							<img width="200" height="200" src="' . TP_REL_ROOT . 'uploads/public/' . $company_information['company_footer_logo'] . '" />
						</div>
					</td>
				</tr>
			</table>
		</div>
		<input type="radio" name="tab" id="tab2" class="tab-radio" />
		<label for="tab2" class="tab-label">Tổ chức</label>
		<div class="tab-content">
			<table class="form-tables tab2-tbl">
				<tr>
					<td>Tên tổ chức:</td>
					<td>
						<input name="company_name" type="text" class="inputs general-textbox" placeholder="Tên tổ chức" value="' . $company_information['company_name'] . '"/>
					</td>
				</tr>
				<tr>
					<td>Địa chỉ:</td>
					<td>
						<input name="company_address" type="text" class="inputs general-textbox" placeholder="Địa chỉ" value="' . $company_information['company_address'] . '"/>
					</td>
				</tr>
				<tr>
					<td>Số điện thoại:</td>
					<td>
						<input name="company_phone" type="tel" class="inputs general-textbox" placeholder="Số điện thoại" value="' . $company_information['company_phone'] . '"/>
					</td>
				</tr>
			</table>
		</div>
		<input type="radio" name="tab" id="tab3" class="tab-radio" />
		<label for="tab3" class="tab-label">Hình ảnh</label>
		<div class="tab-content">
			<table class="form-tables tab3-tbl full-width">
                <tr>
                    <td>Banner (Size XL):</td>
                    <td>
                        <button class="upload-image hidden">Upload</button>
                        <input name="company_banner_xl" type="text" class="company-information-input inputs hidden general-textbox" readonly />
                        <input type="file" data-image-name="banner_xl" class="file-inputs general-textbox picture" id="picture_3" accept="image/*" />
                        <label for="picture_3">
                            <span>Chọn hình ảnh</span>
                            <span>Chưa chọn file...</span>
                        </label>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <div class="picture-preview">
                            <img width="200" height="200" src="' . TP_REL_ROOT . 'uploads/public/' . $company_information['company_banner_xl'] . '" />
                        </div>
                    </td>
                </tr>
                <tr>
					<td>Banner (Size L):</td>
                    <td>
                        <button class="upload-image hidden">Upload</button>
                        <input name="company_banner_l" type="text" class="company-information-input inputs hidden general-textbox" readonly />
                        <input type="file" data-image-name="banner_l" class="file-inputs general-textbox picture" id="picture_8" accept="image/*" />
                        <label for="picture_8">
                            <span>Chọn hình ảnh</span>
                            <span>Chưa chọn file...</span>
                        </label>
					</td>
				</tr>
                <tr>
					<td colspan="2">
						<div class="picture-preview">
							<img width="200" height="200" src="' . TP_REL_ROOT . 'uploads/public/' . $company_information['company_banner_l'] . '" />
						</div>
					</td>
				</tr>
                <tr>
					<td>Banner (Size M):</td>
                    <td>
                        <button class="upload-image hidden">Upload</button>
                        <input name="company_banner_m" type="text" class="company-information-input inputs hidden general-textbox" readonly />
                        <input type="file" data-image-name="banner_m" class="file-inputs general-textbox picture" id="picture_5" accept="image/*" />
                        <label for="picture_5">
                            <span>Chọn hình ảnh</span>
                            <span>Chưa chọn file...</span>
                        </label>
					</td>
				</tr>
                <tr>
					<td colspan="2">
						<div class="picture-preview">
							<img width="200" height="200" src="' . TP_REL_ROOT . 'uploads/public/' . $company_information['company_banner_m'] . '" />
						</div>
					</td>
				</tr>
                <tr>
					<td>Banner (Size S):</td>
                    <td>
                        <button class="upload-image hidden">Upload</button>
                        <input name="company_banner_s" type="text" class="company-information-input inputs hidden general-textbox" readonly />
                        <input type="file" data-image-name="banner_s" class="file-inputs general-textbox picture" id="picture_6" accept="image/*" />
                        <label for="picture_6">
                            <span>Chọn hình ảnh</span>
                            <span>Chưa chọn file...</span>
                        </label>
					</td>
				</tr>
                <tr>
					<td colspan="2">
						<div class="picture-preview">
							<img width="200" height="200" src="' . TP_REL_ROOT . 'uploads/public/' . $company_information['company_banner_s'] . '" />
						</div>
					</td>
				</tr>
                <tr>
					<td>Hình đại diện mặc định:</td>
                    <td>
                        <button class="upload-image hidden">Upload</button>
                        <input name="default_avatar" type="text" class="company-information-input inputs hidden general-textbox" readonly />
                        <input type="file" data-image-name="default_avatar" class="file-inputs general-textbox picture" id="picture_7" accept="image/*" />
                        <label for="picture_7">
                            <span>Chọn hình ảnh</span>
                            <span>Chưa chọn file...</span>
                        </label>
					</td>
				</tr>
                <tr>
					<td colspan="2">
						<div class="picture-preview">
							<img width="200" height="200" src="' . TP_REL_ROOT . 'uploads/public/' . $avatar[0] . '" />
						</div>
					</td>
				</tr>
			</table>
		</div>
	';
	echo $html;
?>
