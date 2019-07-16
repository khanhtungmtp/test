window.onload = function() {
	var formInputs = document.getElementsByClassName( 'changepass-input' ),
		passInput1 = document.getElementById( 'changepass-pass1' ),
		passInput2 = document.getElementById( 'changepass-pass2' ),
		captchaInput = document.getElementById( 'g-recaptcha-response' ),
		status = document.getElementById( 'changepass-status' ),
		changeBtn = document.getElementById( 'changepass-button' ),
		tips = document.getElementById( 'changepass-tips' );
	
	
	/*Focus input email*/
	passInput1.focus();
	
	/*Login button click*/
	changeBtn.addEventListener( 'click', function( e ) {
		e.preventDefault();
		this.innerHTML = this.getAttribute( 'data-loading-text' );
		
		//Ajax
		var pass1 = passInput1.value;
		var pass2 = passInput2.value;
		var captcha = captchaInput.innerHTML;
		var email = getParameterByName( 'email' );
		var string = getParameterByName( 'string' );
		var exclamationSymbol = '<i class="fa fa-exclamation-circle" aria-hidden="true"></i>';
		
		//Validate password
		if( pass1 != pass2 ) {
			status.innerHTML = exclamationSymbol + 'Mật khẩu không khớp!';
			showBtn();
			return;
		}
		
		var pattern = /^\S*(?=\S{8,20})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])(?=\S*[\W])\S*$/;
		if( !pattern.test( pass1 ) ) {
			status.innerHTML = exclamationSymbol + 'Mật khẩu chưa đạt yêu cầu' ;
			tips.style.display = 'block';
			showBtn();
			return;
		}
		else {
			tips.style.display = 'none';
			status.style.display = 'none';
		}
		
		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function() {
			if ( xhttp.readyState == 4 && xhttp.status == 200 ) {
				if( xhttp.responseText == 'success' ) {
					status.innerHTML = '<i class="fa fa-check" aria-hidden="true"></i>Lưu thành công. <a href="' + _WWW + 'nguoidung/dangnhap">Đăng nhập</a>';
					status.classList.add( 'success' );
				}
				else {
					status.innerHTML = exclamationSymbol + xhttp.responseText;
				}
				showBtn();
			}
		};
		xhttp.open( 'POST', 'include/5', true );
		xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xhttp.send( 'pass=' + pass1 + '&captcha=' + captcha + '&email=' + email + '&string=' + string );
	}, false );
	
	/*Enable login button*/
	for( var i = 0; i < 2; i++ ) {
		addListenerMulti( formInputs[i], 'keyup change', function() {
			captchaCallback();
		} );
	}
	
	
	function showBtn() {
		changeBtn.innerHTML = 'Lưu mật khẩu';
		status.style.display = 'block';
	};
};

function addListenerMulti(el, s, fn) {
	var evts = s.split(' ');
	for (var i=0, iLen=evts.length; i<iLen; i++) {
		el.addEventListener(evts[i], fn, false);
	}
};

function captchaCallback() {
	var infoInput = document.getElementById( 'changepass-info' );
	var changeBtn = document.getElementById( 'changepass-button' );
	var passInput1 = document.getElementById( 'changepass-pass1' );
	var passInput2 = document.getElementById( 'changepass-pass2' );
	var pass1 = passInput1.value;
	var pass2 = passInput2.value;
	var captchaLen = grecaptcha.getResponse().length;
	if( pass1 != '' && pass2 != '' && captchaLen > 0 )
		changeBtn.disabled = false;
	else changeBtn.disabled = true;
};

function getParameterByName(name, url) {
    if (!url) url = window.location.href;
    name = name.replace(/[\[\]]/g, "\\$&");
    var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
        results = regex.exec(url);
    if (!results) return null;
    if (!results[2]) return '';
    return decodeURIComponent(results[2].replace(/\+/g, " "));
};