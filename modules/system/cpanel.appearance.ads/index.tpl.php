{@style}
<section class="module-wrapper">
	<section class="module-toolbar">
		<h3 class="module-heading">Hệ thống / Quảng cáo <small>Cpanel</small></h3>
		<div class="module-button-area">
			<span class="buttons normal-buttons slider-addnew-btn"><i class="fa fa-plus" aria-hidden="true"></i> Thêm</span>
			<span class="buttons disabled-buttons slider-cancel-btn"><i class="fa fa-undo" aria-hidden="true"></i> Hủy</span>
		</div>
	</section>
	<section class="module-content">
		<div class="slider-editor module-addnew">
			<div class="tabs">
				<span class="tab-title">Sửa quảng cáo</span>
				<span class="buttons disabled-buttons insert-new-btn save-btn"><i class="fa fa-floppy-o" aria-hidden="true"></i> Lưu</span>
				<table class="form-tables addnew-slide">
					<tr>
						<td>URL (*)</td>
						<td>
							<input type="hidden" class="inputs slider-image-url-addnew" name="slider_image" readonly />
							<input type="text" class="inputs required-inputs" name="slider_url" />
						</td>
					</tr>
					<tr>
						<td>Title (*)</td>
						<td>
							<input type="text" class="inputs slider-title required-inputs" name="slider_title" />
						</td>
					</tr>
					<tr>
						<td>Alt (*)</td>
						<td>
							<input type="text" class="inputs required-inputs" name="slider_alt" />
						</td>
					</tr>
					<tr>
						<td>Hình ảnh (*)</td>
						<td>
							<input type="file" class="file-inputs required-inputs" id="slider-image" accept="image/*" />
							<label for="slider-image">
								<span>Chọn hình ảnh</span>
								<span>Chưa chọn file...</span>
							</label>
						</td>
					</tr>
				</table>
			</div>
		</div>
		<div class="slider-list-wrapper">
			<span class="buttons disabled-buttons update-list-btn save-btn"><i class="fa fa-floppy-o" aria-hidden="true"></i> Lưu</span>
			<ol class="sortable slide-list">
				{@list}
			</ol>
		</div>
	</section>
</section>
{@script}
