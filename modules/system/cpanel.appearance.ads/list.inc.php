<?php
	$exec = new Exec( HOST, USER, PASS, DBNAME );
	$sql = new Sql();

	$data = array(
		':setting_name' => 'ads'
	);

	$slider = $exec -> get( $sql -> get( 157 ), $data );

    if(!$slider) {
        echo '<p>Hiện chưa có quảng cáo nào.</p>';
        return;
    }

    $slider = $slider[0]['setting_value'];
	$items = json_decode( $slider, true );
	$html = '';
	$i = 0;

	foreach( $items as $item ) {

		$i++;
		$image = json_decode( $item['item_image'], true );
		$html .= '
			<li class="slide-li" id="slide_' . $i . '">
				<div>
					<span class="slide-caret"><i class="fa fa-caret-right" aria-hidden="true"></i></span>
					<span class="slide-name none-selection">' . $item['item_title'] . '</span>
					<span class="slide-delete" data-id="' . $item['item_id'] . '"><i class="fa fa-times" aria-hidden="true"></i></span>
					<div>
						<table class="form-tables">
							<tr>
								<td>Title</td>
								<td>
									<input type="hidden" class="inputs hidden slider-image-src" name="slider_image[]" value="' . htmlspecialchars( $item['item_image'], ENT_QUOTES ) . '" readonly />
									<input class="inputs required-inputs slider-title" type="text" name="slider_title[]" value="' . $item['item_title'] . '" />
								</td>
							</tr>
							<tr>
								<td>Alt</td>
								<td><input class="inputs required-inputs" type="text" name="slider_alt[]" value="' . $item['item_alt'] . '" /></td>
							</tr>
							<tr>
								<td>Link</td>
								<td><input class="inputs required-inputs" type="text" name="slider_link[]" value="' . $item['item_link'] . '" /></td>
							</tr>
							<tr>
								<td>Hình ảnh</td>
								<td><img src="' . TP_REL_ROOT . '/uploads/public/' . $image[0] . '" /></td>
							</tr>
							<tr>
								<td>
									<input type="file" class="file-inputs slider-image" id="slider-image' . $i . '" accept="image/*" />
									<label for="slider-image' . $i . '">
										<span>Đổi hình ảnh</span>
										<span>Chưa chọn file...</span>
									</label>
								</td>
							</tr>
						</table>
					</div>
				</div>
			</li>
		';
	}
	echo $html;
?>
