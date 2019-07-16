{@style}
<section class="module-wrapper">
	<section class="module-toolbar">
		<h3 class="module-heading">Nội dung / Bình luận <small>Cpanel</small></h3>
	</section>
	<section class="module-content">
		<div class="comment-list-wrapper">
			<table class="tables module comment-table">
				<tr class="title-rows">
					<td>URL</td>
					<td>Nội dung</td>
					<td>Thời gian</td>
					<td>Biên tập</td>
				</tr>
				{@list}
			</table>
		</div>
		{@pager}
	</section>
</section>
{@script}