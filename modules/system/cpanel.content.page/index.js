$(document).ready( function() {
	/*Init wysiwyg*/
	DOM.initWysiwyg();
	
	var PARAMS = ULTI.queryString();
	
	/*Show addnew form*/
	$( document ).on( 'click', '.page-addnew-btn', function() {
		MODULE.cmd( 'addnew', $( '.page-cancel-btn' ) );
	} );
	
	/*Hide addnew form*/
	$( document ).on( 'click', '.page-cancel-btn', function() {
		MODULE.cmd( 'cancel', $( '.page-cancel-btn' ) );
		//Disable save buttons
		DOM.disableSaveBtn();
	} );
	
	/*Delete page*/
	$( document ).off( 'click', '.delete-page' ).on( 'click', '.delete-page', function() {
		var deleteFn = function( target ) {
			var id = target.data( 'id' );
			var url = 'include/17';
			var data = {
				'page_id' : id
			};
			var callback = function( html ) {
				var htmlArr = html.split( '|' );
				DOM.showStatus( htmlArr[1], htmlArr[0] );
				target.parent().parent().remove();
			};
			AJAX.post( url, data, callback );
		};
		var text = 'Bạn có chắc chắn muốn xóa trang này?';
		DOM.showPopup( text, deleteFn, $( this ) );
	} );
	
	/*Auto fill url*/
	$( document ).on( 'input', '.page-name', function() {
		var value = $( this ).val();
		value = value.latinise();
		value = value.replace( / /g, '-' );
		value = value.toLowerCase();
		$( '.page-url' ).val( value );
	} );
	
	/*On input page-textboxes*/
	$( document ).on( 'input change', '.page-textboxes', function() {
		var allDone = ULTI.validate( $( '.module-addnew .required-inputs' ), 'empty' );
		if( allDone ) {
			DOM.enableSaveBtn();
		}
		else {
			DOM.disableSaveBtn();
		}
	} );
	
	
	/*Save new page*/
	$( document ).off( 'click', '.page-save-new' ).on( 'click', '.page-save-new', function() {
		$( this ).addClass( 'saving' ).html( '<i class="fa fa-spinner fa-spin fa-fw" aria-hidden="true"></i> Đang lưu' );
		
		//Save data
		var data = $( '.module-addnew .page-textboxes' ).serialize();

		if( PARAMS.action == 'edit' ) {
			data += '&action=edit&id=' + PARAMS.id;
		}
		
		var url = 'include/14';
		var callback = function( html ) {
			htmlArr = html.split( '|' );
			if( htmlArr[0] == '1' ) {
				ULTI.done( htmlArr[1] );
			}
			else {
				DOM.showStatus( htmlArr[1], parseInt( htmlArr[0] ) );
				$( '.page-save-new' ).removeClass( 'saving' ).html( '<i class="fa fa-floppy-o" aria-hidden="true"></i> Lưu' );
			}
		};
		AJAX.post( url, data, callback );
	} );
	
	/*Edit page*/
	$( document ).on( 'click', '.edit-page-btn', function() {
		//Load tpl
		DOM.loadTplThisEl( $( this ) );
	} );
	
	/*When edit*/
	$( document ).ready( function() {
		if( PARAMS.action == 'edit' ) {		
			//Fade In addnew form
			$( '.page-addnew-btn' ).click();
		}
	} );
} );