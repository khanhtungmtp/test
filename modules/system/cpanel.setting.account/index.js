$( document ).ready( function() {
	/*PARAMS*/
	PARAMS = ULTI.queryString();

	/*When click addnew*/
	$( document ).on( 'click', '.account-addnew-btn', function() {
		MODULE.cmd( 'addnew', $( '.account-cancel-btn' ) );
	} );

	/*When click cancel*/
	$( document ).on( 'click', '.account-cancel-btn', function() {
		$( '.selects option' ).prop( 'selected', false );
		MODULE.cmd( 'cancel', $( '.account-cancel-btn' ) );
		//Disable save buttons
		DOM.disableSaveBtn();
	} );

	/*On input account-textbox*/
	$( document ).on( 'input change', '.account-textbox', function() {
		var allDone = ULTI.validate( $( '.module-addnew .required-inputs' ), 'empty' );
		if( allDone ) {
			DOM.enableSaveBtn();
		}
		else {
			DOM.disableSaveBtn();
		}
	} );

	/*When click edit*/
	$( document ).on( 'click', '.edit-account-btn', function() {
		//Load tpl
		DOM.loadTplThisEl( $( this ) );
	} );

	/*When edit*/
	$( document ).ready( function() {
		if( PARAMS.action == 'edit' ) {
			//Fade In addnew form
			$( '.account-addnew-btn' ).click();
		}
	} );

	/*Save new account*/
	$( document ).off( 'click', '.account-save-new' ).on( 'click', '.account-save-new', function() {
		$( '.account-save-new' ).addClass( 'saving' ).html( '<i class="fa fa-spinner" aria-hidden="true"></i> Đang lưu</span>' );
		//Save data
		var data = $( '.module-addnew .account-textbox' ).serialize();
		if( PARAMS.action == 'edit' ) {
			data += '&action=edit&id=' + PARAMS.id;
		}

		var url = 'include/37';
		var callback = function( html ) {
			$( '.account-save-new' ).removeClass( 'saving' );
			var htmlArr = html.split( '|' );
            console.log(htmlArr);
			if( parseInt( htmlArr[0] ) == 1 ) {
				ULTI.done( htmlArr[1] );
			}
			else {
				DOM.showStatus( htmlArr[1], parseInt( htmlArr[0] ) );
				$( '.account-save-new' ).removeClass( 'saving' ).html( 'Lưu' );
			}
		};
		AJAX.post( url, data, callback );
	} );

	/*When click block*/
	$( document ).off( 'click', '.block-account-btn' ).on( 'click', '.block-account-btn', function() {
		var _this = $( this );
		var data = {
			'admin_id': $( this ).data( 'id' )
		};
		var url = 'include/38';
		var callback = function( html ) {
			ULTI.done( html );
		};
		AJAX.post( url, data, callback );
	} );

	/*When click delete*/
	$( document ).off( 'click', '.delete-account-btn' ).on( 'click', '.delete-account-btn', function() {
		var deleteFn = function( target ) {
			var id = target.data( 'id' );
			var url = 'include/45';
			var data = {
				'id' : id
			};
			var callback = function( html ) {
				ULTI.done( 'Xóa tài khoản thành công' );
			};
			AJAX.post( url, data, callback );
		};
		var text = 'Bạn có chắc chắn muốn xóa tài khoản này?';
		DOM.showPopup( text, deleteFn, $( this ) );
	} );
} )
