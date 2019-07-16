$( document ).ready( function() {	
	/*On input account-textbox*/
	$( document ).off( 'input change', '.personal-textbox' ).on( 'input change', '.personal-textbox', function() {
		if ( $( '.hide' ).css( 'display' ) == 'none' ) {
			DOM.enableSaveBtn();
		} else {
			var pattern = /^\S*(?=\S{8,20})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])(?=\S*[\W])\S*$/;
			var allDone = ULTI.validate( $( '.module-content .required-inputs' ), 'empty' );
			if( allDone && pattern.test( $( '.pass2 input' ).val() ) && pattern.test( $( '.pass3 input' ).val() ) ) {
				DOM.enableSaveBtn();
			}
			else {
				DOM.disableSaveBtn();
			}
		}
	} );
	
	/*Change pass*/
	$( document ).off( 'click', '.change-pass' ).on( 'click', '.change-pass', function() {
		$( '.hide' ).toggle();
		$( '.personal-textbox' ).change();
		if ( $( '.hide' ).css( 'display' ) == 'none' ) {
			$( '.hide input' ).val( '' );
		}
	} );
	
	/*Save new account*/
	$( document ).off( 'click', '.personal-save-new' ).on( 'click', '.personal-save-new', function() {
		$( this ).addClass( 'saving' ).html( '<i class="fa fa-spinner fa-spin fa-fw" aria-hidden="true"></i> Đang lưu' );
		//Save data
		var data = $( '.module-content .personal-textbox' ).serialize();		
		var url = 'include/46';
		var callback = function( html ) {
			var htmlArr = html.split( '|' );
			if( htmlArr[0] == '1' ) {
				ULTI.done( htmlArr[1] );
			}
			else {
				DOM.showStatus( htmlArr[1], parseInt( htmlArr[0] ) );
				$( '.personal-save-new' ).removeClass( 'saving' ).html( '<i class="fa fa-floppy-o" aria-hidden="true"></i> Lưu' );
			}
		};
		AJAX.post( url, data, callback );
	} );
} )