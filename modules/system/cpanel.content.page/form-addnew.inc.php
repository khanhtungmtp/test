<?php
	if( isset( $_GET['action'], $_GET['id'] ) && $_GET['action'] == 'edit' ) {
		//Get page
		$exec = new Exec( HOST, USER, PASS, DBNAME );
		$sql = new Sql();
		$data = array(
			'page_id' => (int)$_GET['id']
		);
		$pages = $exec -> get( $sql -> get( 122 ), $data );
		$page = $pages[0];
		$selected = $page['page_publish'] == 1 ? 'checked' : '';
		$html = '
			<div class="tabs module-addnew">
				<span class="tab-title">Thêm trang tĩnh</span>
				<div class="module-addnew-btn">
					<span class="buttons save-btn disabled-buttons page-save-new"><i class="fa fa-floppy-o" aria-hidden="true"></i> Lưu</span>
				</div>
				<input type="radio" name="tab" id="tab1" class="tab-radio" checked />
				<label for="tab1" class="tab-label">Tổng quát</label>
				<div class="tab-content">
					<table class="form-tables tab1-tbl">
						<tr>
							<td>Tên trang (*)</td>
							<td>
								<input type="text" name="page_name" value="' . $page['page_name'] . '" class="inputs page-textboxes page-name required-inputs" placeholder="Tên trang" />
							</td>
						</tr>
						<tr>
							<td>Nội dung (*)</td>
							<td>
								<textarea name="page_contents" class="inputs wysiwyg page-textboxes required-inputs" placeholder="Nội dung">' . $page['page_contents'] . '</textarea>
							</td>
						</tr>
						<tr>
							<td>Xuất bản trang này</td>
							<td>
								<input id="draft" name="draf" value="1" class="checkboxes page-textboxes" type="checkbox" ' . $selected . ' />
								<label for="draft"></label>
							</td>
						</tr>
					</table>
				</div>
				<input type="radio" name="tab" id="tab2" class="tab-radio" />
				<label for="tab2" class="tab-label">SEO</label>
				<div class="tab-content">
					<table class="form-tables tab2-tbl">
						<tr>
							<td>Page title (*)</td>
							<td>
								<input type="text" name="page_page_title" value="' . $page['page_page_title'] . '" class="inputs page-textboxes required-inputs" placeholder="Page title" />
							</td>
						</tr>
						<tr>
							<td>Meta description</td>
							<td>
								<textarea name="page_meta_description" class="inputs page-textboxes required-inputs" placeholder="Meta description">' . $page['page_meta_description'] . '</textarea>
							</td>
						</tr>
						<tr>
							<td>Meta keywords</td>
							<td>
								<input type="text" name="page_meta_keywords" value="' . $page['page_meta_keywords'] . '" class="inputs page-textboxes required-inputs" placeholder="Meta keywords" />
							</td>
						</tr>
						<tr>
							<td>URL (*)</td>
							<td>
								<input type="text" name="page_seo_url" value="' . $page['page_seo_url'] . '" class="inputs page-textboxes page-url required-inputs" placeholder="URL" />
							</td>
						</tr>
					</table>
				</div>
			</div>
		';
	} else {
		$html = '
			<div class="tabs module-addnew">
				<span class="tab-title">Thêm trang tĩnh</span>
				<div class="module-addnew-btn">
					<span class="buttons save-btn disabled-buttons page-save-new"><i class="fa fa-floppy-o" aria-hidden="true"></i> Lưu</span>
				</div>
				<input type="radio" name="tab" id="tab1" class="tab-radio" checked />
				<label for="tab1" class="tab-label">Tổng quát</label>
				<div class="tab-content">
					<table class="form-tables tab1-tbl">
						<tr>
							<td>Tên trang (*)</td>
							<td>
								<input type="text" name="page_name" class="inputs page-textboxes page-name required-inputs" placeholder="Tên trang" />
							</td>
						</tr>
						<tr>
							<td>Nội dung (*)</td>
							<td>
								<textarea name="page_contents" class="inputs wysiwyg page-textboxes required-inputs" placeholder="Nội dung"></textarea>
							</td>
						</tr>
						<tr>
							<td>Xuất bản trang này</td>
							<td>
								<input id="draft" name="draf" value="1" class="checkboxes page-textboxes" type="checkbox" class="inputs" />
								<label for="draft"></label>
							</td>
						</tr>
					</table>
				</div>
				<input type="radio" name="tab" id="tab2" class="tab-radio" />
				<label for="tab2" class="tab-label">SEO</label>
				<div class="tab-content">
					<table class="form-tables tab2-tbl">
						<tr>
							<td>Page title (*)</td>
							<td>
								<input type="text" name="page_page_title" class="inputs page-textboxes required-inputs" placeholder="Page title" />
							</td>
						</tr>
						<tr>
							<td>Meta description</td>
							<td>
								<textarea name="page_meta_description" class="inputs page-textboxes required-inputs" placeholder="Meta description"></textarea>
							</td>
						</tr>
						<tr>
							<td>Meta keywords</td>
							<td>
								<input type="text" name="page_meta_keywords" class="inputs page-textboxes required-inputs" placeholder="Meta keywords" />
							</td>
						</tr>
						<tr>
							<td>URL (*)</td>
							<td>
								<input type="text" name="page_seo_url" class="inputs page-textboxes page-url required-inputs" placeholder="URL" />
							</td>
						</tr>
					</table>
				</div>
			</div>
		';
	}
	echo $html;
?>