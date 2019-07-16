{@style}
<section class="module-wrapper">
	<section class="module-toolbar">
		<h3 class="module-heading">Nội dung / Bài viết <small>Cpanel</small></h3>
		<div class="module-button-area">
			<span class="buttons normal-buttons post-addnew-btn"><i class="fa fa-plus" aria-hidden="true"></i> Thêm</span>
			<span class="buttons disabled-buttons post-cancel-btn"><i class="fa fa-undo" aria-hidden="true"></i> Hủy</span>
		</div>
	</section>
	<section class="module-content">
		<div class="tabs module-addnew">
			<span class="tab-title">Thêm bài viết</span>
			<div class="module-addnew-btn">
				<span class="buttons disabled-buttons save-btn post-save-new"><i class="fa fa-floppy-o" aria-hidden="true"></i> Lưu</span>
			</div>
			<input type="radio" name="tab" id="tab1" class="tab-radio" checked />
			<label for="tab1" class="tab-label">Tổng quát</label>
			<div class="tab-content">
				{@addnew-form}
			</div>
		</div>
		<div class="post-list-wrapper">
            {@filter}
			<table class="tables post-table">
				<tr class="title-rows">
					<td>Tên bài viết</td>
					<td>Ngày đăng</td>
					<td>Loại</td>
					<td>Số bình luận</td>
					<td>Biên tập</td>
				</tr>
				{@list}
			</table>
		</div>
		{@pager}
	</section>
</section>
{@script}
