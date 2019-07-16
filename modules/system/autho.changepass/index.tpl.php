<script src="https://www.google.com/recaptcha/api.js"></script>
<section class="changepass-container">
	<div class="changepass-logo-wrapper">
		<h3 class="changepass-logo">Kigiweb Cpanel</h3>
	</div>
	<div class="changepass-wrapper">
		<h3 class="changepass-title">ĐỔI MẬT KHẨU</h3>
		<p id="changepass-status"><i class="fa fa-exclamation-circle" aria-hidden="true"></i></p>
		<ul id="changepass-tips">
			<p>Mật khẩu phải:</p>
			<li>Từ 8 đến 20 ký tự</li>
			<li>Chứa ít nhất 1 số</li>
			<li>Chứa ít nhất 1 ký tự đặc biệt</li>
			<li>Vừa có chữ in hoa, vừa in thường</li>
		</ul>
		<form class="changepass-form" action="" method="post">
			<input class="changepass-input" id="changepass-pass1" type="password" placeholder="Mật khẩu mới" name="pass1" />
			<input class="changepass-input" id="changepass-pass2" type="password" placeholder="Nhập lại mật khẩu" name="pass2" />
			<div class="g-recaptcha" data-callback="captchaCallback" data-sitekey="6LdEPAkUAAAAADM9Mn3wtT2kTn5V461h2OqDMPJM"></div>
			<button id="changepass-button" data-loading-text="<i class='fa fa-circle-o-notch fa-spin fa-3x fa-fw'></i>Đang xử lý..." disabled>LƯU MẬT KHẨU</button>
		</form>
	</div>
</section>
{@script}
