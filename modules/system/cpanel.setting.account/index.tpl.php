{@style}
<section class="module-wrapper">
	<section class="module-toolbar">
		<h3 class="module-heading">Hệ thống / Tài khoản <small>Cpanel</small></h3>
		<div class="module-button-area">
			<span class="buttons normal-buttons account-addnew-btn"><i class="fa fa-plus" aria-hidden="true"></i> Thêm</span>
			<span class="buttons disabled-buttons account-cancel-btn"><i class="fa fa-undo" aria-hidden="true"></i> Hủy</span>
		</div>
	</section>
	<section class="module-content">
		{@form-addnew}
		<div class="account-list-wrapper">
			<table class="tables module account-table">
				<colgroup>
					<col width="20%"></col>
					<col width="20%"></col>
					<col width="25%"></col>
					<col width="20%"></col>
					<col width="15%"></col>
				</colgroup>
				<tr class="title-rows">
					<td>Tên đăng nhập</td>
					<td>Loại</td>
					<td>Email</td>
					<td>Số điện thoại</td>
					<td>Biên tập</td>
				</tr>
				{@list}
			</table>
		</div>
	</section>
</section>
{@script}
