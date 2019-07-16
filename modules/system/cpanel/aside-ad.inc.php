<?php
	$html = '
		<ul class="aside-list">
			<li class="aside-item aside-homepage">
				<i class="fa fa-home" aria-hidden="true"></i>
				<span>Trang chủ</span>
				<a href="' . TP_REL_ROOT . '" target="_blank">Xem trang chủ</a>
			</li>
			<li class="aside-item">
				<i class="fa fa-pencil" aria-hidden="true"></i>
				<span>Nội dung</span>
				<a href="">Nội dung</a>
				<span class="aside-child-button">
					<i class="fa fa-caret-down" aria-hidden="true"></i>
				</span>
			</li>
			<li class="aside-child-row">
				<ul class="aside-child-list">
					<li class="aside-child-item main">
						<i class="fa fa-files-o" aria-hidden="true"></i>
						<span>Bài viết</span>
						<a href="' . TP_REL_ROOT . 'admin/noidung/baiviet">Bài viết</a>
					</li>
					<li class="aside-child-item realtime-item" data-type="comment">
						<i class="fa fa-comments-o" aria-hidden="true"></i>
						<span>Bình luận</span>
						<a href="' . TP_REL_ROOT . 'admin/noidung/binhluan">Bình luận</a>
					</li>
					<li class="aside-child-item">
						<i class="fa fa-file-code-o" aria-hidden="true"></i>
						<span>Trang tĩnh</span>
						<a href="' . TP_REL_ROOT . 'admin/noidung/trang">Trang tĩnh</a>
					</li>
				</ul>
			</li>

			<li class="aside-item">
				<i class="fa fa-cogs" aria-hidden="true"></i>
				<span >Hệ thống</span>
				<a href="">Hệ thống</a>
				<span class="aside-child-button">
					<i class="fa fa-caret-down" aria-hidden="true"></i>
				</span>
			</li>
			<li class="aside-child-row">
				<ul class="aside-child-list">
                    <li class="aside-child-item main">
                        <i class="fa fa-key" aria-hidden="true"></i>
                        <span>Đổi mật khẩu</span>
                        <a href="' . TP_REL_ROOT . 'admin/canhan">Đổi mật khẩu</a>
                    </li>
                    <li class="aside-child-item">
						<i class="fa fa-paint-brush" aria-hidden="true"></i>
						<span>Giao diện</span>
						<a href="' . TP_REL_ROOT . 'admin/caidat/giaodien">Giao diện</a>
					</li>
					<li class="aside-child-item">
						<i class="fa fa-lock" aria-hidden="true"></i>
						<span>Tài khoản</span>
						<a href="' . TP_REL_ROOT . 'admin/caidat/taikhoan">Tài khoản</a>
					</li>
					<li class="aside-child-item">
						<i class="fa fa-mouse-pointer" aria-hidden="true"></i>
						<span>Quảng cáo</span>
						<a href="' . TP_REL_ROOT . 'admin/giaodien/ads">Quảng cáo</a>
					</li>
				</ul>
			</li>
		</ul>
	';
	echo $html;
?>
