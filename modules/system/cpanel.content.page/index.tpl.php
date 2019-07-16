{@style}
<section class="module-wrapper">
	<section class="module-toolbar">
		<h3 class="module-heading">Nội dung / Trang tĩnh <small>Cpanel</small></h3>
		<div class="module-button-area">
			<span class="buttons normal-buttons page-addnew-btn"><i class="fa fa-plus" aria-hidden="true"></i> Thêm</span>
			<span class="buttons disabled-buttons page-cancel-btn"><i class="fa fa-undo" aria-hidden="true"></i> Hủy</span>
		</div>
	</section>
	<section class="module-content">
		{@form-addnew}
		<div class="page-list-wrapper">
			<table class="tables module">
				<tr class="title-rows">
					<td>Tên trang</td>
					<td>Biên tập</td>
				</tr>
				{@list}
			</table>
		</div>
	</section>
</section>
{@script}