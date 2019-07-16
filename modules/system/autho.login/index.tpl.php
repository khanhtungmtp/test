<section class="login-container">
	<div class="login-logo-wrapper">
		<h3 class="login-logo">Kigiweb Cpanel</h3>
	</div>
	<div class="login-wrapper">
		<h3 class="login-title">Đăng nhập</h3>
		<p id="login-status"><i class="fa fa-exclamation-circle" aria-hidden="true"></i></p>
		<form class="login-form" action="" method="post">
			<input class="login-input" id="login-email" type="text" placeholder="Nhập email hoặc tên người dùng" name="info" />
			<input class="login-input" id="login-password" type="password" placeholder="Mật khẩu" name="password" />
			<button id="login-button" data-loading-text="<i class='fa fa-circle-o-notch fa-spin fa-3x fa-fw'></i>Đang xử lý..." disabled>Đăng nhập</button>
		</form>
		<a href="{@www}/nguoidung/quenmatkhau" class="forget-pass">Quên mật khẩu?</a>
	</div>
</section>
{@script}
