$( document ).ready( function() {
	/*Global fileList*/
	var fileList = [];

	/*PARAMS*/
	PARAMS = ULTI.queryString();

	/*Preview when select picture*/
	$( document ).off( 'change', '.picture' ).on( 'change', '.picture', function() {
		var len = this.files.length;
		if( len > 0 ) {
            var previewArea = $(this).parent().parent().next().find('.picture-preview');
			previewArea.empty();
			var reader = new FileReader();
			reader.onload = function( e ) {
				previewArea.append( '<div class="preview-el"><img width="200" height="200" src="' + e.target.result + '" /></div>' );
				$( '.tab-radio' ).change();
			};
			reader.readAsDataURL( this.files[0] );
		}
		else {
			previewArea.empty();
            $( '.tab-radio' ).change();
		}
	} );

	/*On input general-textbox*/
	$( document ).on( 'input change', '.general-textbox', function() {
		DOM.enableSaveBtn();
	} );

	/*Upload picture when click upload*/
	$( document ).off( 'click', '.upload-image' ).on( 'click', '.upload-image', function() {
		var file = $( this ).next().next()[0].files;
		if( file.length > 0 ) {
			var input = $( this ).next();
			var destination = 'public';
			var imageName = $(this).next().next().data('image-name');
			var callback = function( html ) {
				input.val( html );
			};
			ULTI.upload( file, destination, imageName, callback );
		}
	} );

	/*Save setting*/
	$( document ).off( 'click', '.general-save-new' ).on( 'click', '.general-save-new', function() {
		var confirmFn = function( target ) {
			target.addClass( 'saving' ).html( '<i class="fa fa-spinner fa-spin fa-fw" aria-hidden="true"></i> Đang lưu' );

			//Upload image
			$( '.upload-image' ).click();

			//Save data
			var data = $( '.module .general-textbox' ).serialize();
			var url = 'include/44';
			var callback = function( html ) {
				htmlArr = html.split( '|' );
				if( htmlArr[0] == '1' ) {
					ULTI.done( htmlArr[1] );
				}
				else {
					DOM.showStatus( htmlArr[1], parseInt( htmlArr[0] ) );
					target.removeClass( 'saving' ).html( '<i class="fa fa-floppy-o" aria-hidden="true"></i> Lưu' );
				}
			};
			AJAX.post( url, data, callback );
		};
		var text = 'Bạn có muốn lưu các thiết lập?';
		DOM.showPopup( text, confirmFn, $( this ) );
	} );
} );
