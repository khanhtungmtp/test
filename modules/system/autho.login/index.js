window.onload = function() {
	var loginBtn = document.getElementById( 'login-button' );
	var infoInput = document.getElementById( 'login-email' );
	var passwordInput = document.getElementById( 'login-password' );
	var loginInput = document.getElementsByClassName( 'login-input' );
	var status = document.getElementById( 'login-status' );
	
	
	/*Focus input email*/
	infoInput.focus();
	
	/*Login button click*/
	loginBtn.addEventListener( 'click', function( e ) {
		e.preventDefault();
		this.innerHTML = this.getAttribute( 'data-loading-text' );
		
		//Ajax
		var info = infoInput.value;
		var password = passwordInput.value;
		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function() {
			if ( xhttp.readyState == 4 && xhttp.status == 200 ) {
				if( xhttp.responseText.trim() == 'success' ) {
					location.href = _WWW + 'admin';
				}
				else {
					status.innerHTML = '<i class="fa fa-exclamation-circle" aria-hidden="true"></i>' + xhttp.responseText;
					status.style.display = 'block';
					loginBtn.innerHTML = 'Đăng nhập';
				}
			}
		};
		xhttp.open( 'POST', 'include/3', true );
		xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xhttp.send( 'info=' + info + '&password=' + password );
	}, false );
	
	/*Enable login button*/
	for( i = 0; i < 2; i++ ) {
		addListenerMulti( loginInput[i], 'keyup change', function() {
			var info = infoInput.value;
			var password = passwordInput.value;
			if( info != '' && password != '' ) {
				loginBtn.disabled = false;
			}
			else {
				loginBtn.disabled = true;
			}
		} );
	}
};

function addListenerMulti(el, s, fn) {
  var evts = s.split(' ');
  for (var i=0, iLen=evts.length; i<iLen; i++) {
    el.addEventListener(evts[i], fn, false);
  }
};