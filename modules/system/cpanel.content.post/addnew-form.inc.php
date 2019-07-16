<?php
	if( isset( $_GET['action'] ) && $_GET['action'] == 'edit' ) {
		$exec = new Exec( HOST, USER, PASS, DBNAME );
		$sql = new Sql();
		$id = (int)$_GET['id'];

		$post = $exec -> get( $sql -> get( 167 ), array(
			':id' => $id
		) );
		$post = $post[0];

		$images = json_decode( $post['post_thumbnail'], true );
		$images = $images[0];

		$checked = $post['post_allow_comment'] == '1' ? 'checked' : '';
		$checked2 = $post['post_as_draff'] == '1' ? 'checked' : '';

		$cates = '';
		$cateIds = array_filter( explode( ',', $post['blog_cate_id'] ), 'strlen' );
		foreach( $cateIds as $id ) {
            $cateName = $exec -> get( $sql -> get( 1631 ), array(
				':id' => $id
			) );
			$cates .= '
				<span data-id="' . $id . '">' . $cateName[0]['blog_cate_name'] . ' <i class="fa fa-times" aria-hidden="true"></i></span>
			';
		}

        $cateList = $exec -> get($sql -> get(1632));
        $cateListHtml = '';
        foreach($cateList as $key => $cate) {
            $cateListHtml .= '<span data-id="' . $cate['blog_cate_id'] . '">' . $cate['blog_cate_name'] . '</span>';
        }

		$html = '
			<table class="form-tables tab1-tbl">
				<tr>
					<td>Tiêu đề (*)</td>
					<td>
						<input value="' . $post['post_title'] . '" type="text" name="post_title" class="inputs post-textbox required-inputs post-title" placeholder="Tiêu đề" />
					</td>
				</tr>
				<tr>
					<td>Mô tả ngắn (*)</td>
					<td>
						<textarea name="post_compact" class="inputs post-textbox required-inputs" placeholder="Mô tả ngắn">' . $post['post_compact'] . '</textarea>
					</td>
				</tr>
				<tr>
					<td>Danh mục (*)</td>
					<td>
						<div class="suggest-lists">
							<input type="text" class="inputs suggest-list-textbox" placeholder="Chọn danh mục" />
							<div class="suggest-list-panel">
                                ' . $cateListHtml . '
							</div>
						</div>
						<div class="post-selected suggest-list-result">
							<input value="' . $post['blog_cate_id'] . '" name="post_cate" type="text" class="inputs post-textbox required-inputs hidden" readonly />
							' . $cates . '
						</div>
					</td>
				</tr>
				<tr>
					<td>Nội dung (*)</td>
					<td>
						<textarea name="post_content" class="inputs wysiwyg post-textbox required-inputs" placeholder="Nội dung">' . $post['post_contents'] . '</textarea>
					</td>
				</tr>
			</table>
		</div>
		<input type="radio" name="tab" id="tab2" class="tab-radio" />
		<label for="tab2" class="tab-label">SEO</label>
		<div class="tab-content">
			<table class="form-tables">
				<tr>
					<td>SEO url (*)</td>
					<td>
						<input value="' . $post['post_seo_url'] . '" name="post_url" type="text" class="inputs post-textbox required-inputs post-url" placeholder="Seo url" />
					</td>
				</tr>
				<tr>
					<td>Page title (*)</td>
					<td>
						<input value="' . $post['post_page_title'] . '" name="post_page_title" type="text" class="inputs post-textbox required-inputs" placeholder="Meta title" />
					</td>
				</tr>
				<tr>
					<td>Meta description (*)</td>
					<td>
						<textarea name="post_meta_description" class="inputs post-textbox required-inputs" placeholder="Meta description">' . $post['post_meta_description'] . '</textarea>
					</td>
				</tr>
				<tr>
					<td>Meta keywords (*)</td>
					<td>
						<textarea name="post_meta_keywords" class="inputs post-textbox required-inputs" placeholder="Meta keywords">' . $post['post_meta_keywords'] . '</textarea>
					</td>
				</tr>
			</table>
		</div>
		<input type="radio" name="tab" id="tab3" class="tab-radio" />
		<label for="tab3" class="tab-label">Dữ liệu</label>
		<div class="tab-content">
			<table class="form-tables tab2-tbl">
				<tr>
					<td>Hình đại diện (*)</td>
					<td>
						<button class="upload-btn buttons hidden">Upload</button>
						<input value="' . htmlspecialchars( $post['post_thumbnail'] , ENT_QUOTES ) . '" name="post_avatar" type="text" class="inputs post-textbox hidden post-image" readonly />
						<input type="file" class="file-inputs post-textbox" id="post-image" />
						<label for="post-image">
							<span>Đổi hình ảnh</span>
							<span>Chưa chọn file...</span>
						</label>
					</td>
				</tr>
				<tr>
					<td colspan="2">
						<img class="old-img" src="' . TP_REL_ROOT . '/uploads/public/' . $images . '" />
					</td>
				</tr>
				<tr>
					<td>Cho phép bình luận</td>
					<td>
						<input name="post_allow_comment" id="allow-cmt" type="checkbox" class="checkboxes post-textbox" ' . $checked . ' />
						<label for="allow-cmt"></label>
					</td>
				</tr>
				<tr>
					<td>Lưu dạng nháp</td>
					<td>
						<input name="post_as_draff" id="enable" type="checkbox" class="checkboxes post-textbox"  ' . $checked2 . ' />
						<label for="enable"></label>
					</td>
				</tr>
			</table>
		';
	}
	else {
        $exec = new Exec( HOST, USER, PASS, DBNAME );
		$sql = new Sql();

        $cateList = $exec -> get($sql -> get(1632));
        $cateListHtml = '';
        foreach($cateList as $key => $cate) {
            $cateListHtml .= '<span data-id="' . $cate['blog_cate_id'] . '">' . $cate['blog_cate_name'] . '</span>';
        }


		$html = '
			<table class="form-tables tab1-tbl">
				<tr>
					<td>Tiêu đề (*)</td>
					<td>
						<input type="text" name="post_title" class="inputs post-textbox required-inputs post-title" placeholder="Tiêu đề" />
					</td>
				</tr>
				<tr>
					<td>Mô tả ngắn (*)</td>
					<td>
						<textarea name="post_compact" class="inputs post-textbox required-inputs" placeholder="Mô tả ngắn"></textarea>
					</td>
				</tr>
				<tr>
					<td>Danh mục (*)</td>
					<td>
						<div class="suggest-lists">
							<input type="text" class="inputs suggest-list-textbox" placeholder="Chọn danh mục" />
							<div class="suggest-list-panel">
								' . $cateListHtml . '
							</div>
						</div>
						<div class="post-selected suggest-list-result">
							<input name="post_cate" type="text" class="inputs post-textbox required-inputs hidden" readonly />
						</div>
					</td>
				</tr>
				<tr>
					<td>Nội dung (*)</td>
					<td>
						<textarea name="post_content" class="inputs wysiwyg post-textbox required-inputs" placeholder="Nội dung"></textarea>
					</td>
				</tr>
			</table>
		</div>
		<input type="radio" name="tab" id="tab2" class="tab-radio" />
		<label for="tab2" class="tab-label">SEO</label>
		<div class="tab-content">
			<table class="form-tables">
				<tr>
					<td>SEO url (*)</td>
					<td>
						<input name="post_url" type="text" class="inputs post-textbox required-inputs post-url" placeholder="Seo url" />
					</td>
				</tr>
				<tr>
					<td>Page title (*)</td>
					<td>
						<input name="post_page_title" type="text" class="inputs post-textbox required-inputs" placeholder="Meta title" />
					</td>
				</tr>
				<tr>
					<td>Meta description (*)</td>
					<td>
						<textarea name="post_meta_description" class="inputs post-textbox required-inputs" placeholder="Meta description"></textarea>
					</td>
				</tr>
				<tr>
					<td>Meta keywords (*)</td>
					<td>
						<textarea name="post_meta_keywords" class="inputs post-textbox required-inputs" placeholder="Meta keywords"></textarea>
					</td>
				</tr>
			</table>
		</div>
		<input type="radio" name="tab" id="tab3" class="tab-radio" />
		<label for="tab3" class="tab-label">Dữ liệu</label>
		<div class="tab-content">
			<table class="form-tables tab2-tbl">
				<tr>
					<td>Hình đại diện (*)</td>
					<td>
						<button class="upload-btn buttons hidden">Upload</button>
						<input name="post_avatar" type="text" class="inputs post-textbox hidden post-image" readonly />
						<input type="file" class="file-inputs post-textbox required-inputs" id="post-image" />
						<label for="post-image">
							<span>Chọn hình ảnh</span>
							<span>Chưa chọn file...</span>
						</label>
					</td>
				</tr>
				<tr>
					<td>Cho phép bình luận</td>
					<td>
						<input name="post_allow_comment" id="allow-cmt" type="checkbox" class="checkboxes post-textbox" checked />
						<label for="allow-cmt"></label>
					</td>
				</tr>
				<tr>
					<td>Lưu dạng nháp</td>
					<td>
						<input name="post_as_draff" id="enable" type="checkbox" class="checkboxes post-textbox" />
						<label for="enable"></label>
					</td>
				</tr>
			</table>
		';
	}
	echo $html;
?>
