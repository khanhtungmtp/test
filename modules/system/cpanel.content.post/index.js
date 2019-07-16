$( document ).ready( function() {

	/*WYSIWYG init*/
	DOM.initWysiwyg();

	var PARAMS = ULTI.queryString();

	/*Click addnew button*/
	$( document ).off( 'click', '.post-addnew-btn' ).on( 'click', '.post-addnew-btn', function() {
		MODULE.cmd( 'addnew', $( '.post-cancel-btn' ) );
	} );

	/*Validate form*/
	$( document ).on( 'change input', '.post-textbox', function() {
		var allDone = ULTI.validate( $( '.module-addnew .required-inputs' ), 'empty' );
		if( allDone ) {
			DOM.enableSaveBtn();
		}
		else {
			DOM.disableSaveBtn();
		}
	} );

	/*Click cancel*/
	$( document ).off( 'click', '.post-cancel-btn' ).on( 'click', '.post-cancel-btn', function() {
		MODULE.cmd( 'cancel', $( '.post-cancel-btn' ) );
		DOM.loadTplThisEl( _WWW + 'admin/noidung/baiviet' );
	} );


	/*Auto-fill url*/
	$( document ).on( 'input', '.post-title', function() {
		var value = $( this ).val();
		value = value.latinise();
		value = value.replace( / /g, '-' );
		value = value.toLowerCase();
		$( '.post-url' ).val( value ).change();
	} );

	/*Upload image when click upload*/
	$( document ).off( 'click', '.upload-btn' ).on( 'click', '.upload-btn', function() {
		var file = $( '#post-image' )[0].files;
		if( file.length > 0 ) {
			var input = $( '.post-image' );
			var destination = 'public';
			var imageName = $( '.post-url' ).val();
			var callback = function( html ) {
				input.val( html ).change();
			};
			ULTI.upload( file, destination, imageName, callback );
		}
	} );

	/*Save new post*/
	$( document ).off( 'click', '.post-save-new' ).on( 'click', '.post-save-new', function() {
		$( this ).addClass( 'saving' ).html( '<i class="fa fa-spinner fa-spin fa-fw" aria-hidden="true"></i> Đang lưu' );

		//Upload image
		$( '.upload-btn' ).click();

		//Save data
		var url = 'include/26';
		var data = $( '.module-addnew .post-textbox' ).serialize();

		if( PARAMS.action == 'edit' ) {
			data += '&action=edit&id=' + PARAMS.id;
		}

		var callback = function( html ) {
			var htmlArr = html.split( '|' );
			if( htmlArr[0] == '1' ) {
				ULTI.done( htmlArr[1] );
			}
			else {
				DOM.showStatus( htmlArr[1], parseInt( htmlArr[0] ) );
				$( '.post-save-new' ).removeClass( 'saving' ).html( '<i class="fa fa-floppy-o" aria-hidden="true"></i> Lưu' );
			}
		};
		AJAX.post( url, data, callback );
	} );

	/*When click edit*/
	$( document ).off( 'click', '.edit-post' ).on( 'click', '.edit-post', function() {
		var id = $( this ).data( 'id' );
		DOM.loadTplThisEl( _WWW + 'admin/noidung/baiviet?action=edit&id=' + id );
	} );

	/*When edit*/
	$( document ).ready( function() {
		if( PARAMS.action == 'edit' ) {
			$( '.post-addnew-btn' ).click();
		}
	} );

	/*Delete post*/
	$( document ).off( 'click', '.delete-post' ).on( 'click', '.delete-post', function() {
		var deleteFn = function( target ) {
			var id = target.data( 'id' );
			var url = 'include/29';
			var data = {
				'post_id' : id
			};
			var callback = function( html ) {
				console.log( html );
				var htmlArr = html.split( '|' );
				DOM.showStatus( htmlArr[1], htmlArr[0] );
				DOM.loadTplThisEl( _WWW + 'admin/noidung/baiviet' );
			};
			AJAX.post( url, data, callback );
		};
		var text = 'Bạn có chắc chắn xóa bài viết này?';
		DOM.showPopup( text, deleteFn, $( this ) );
	} );


	/*Load more*/
	$( document ).off( 'click', '.loadmore-btn' ).on( 'click', '.loadmore-btn', function() {
		$( this ).addClass( 'saving' ).html( '<i class="fa fa-spinner fa-spin fa-fw" aria-hidden="true"></i> Đang tải' );
		var offset =  $( this ).data( 'offset' );
		var cate =  $( this ).data( 'cate' );
		offset = parseInt( offset ) + 5;
		var url = 'include/30';
		var data = {
			'offset': offset,
            'cate': cate
		};
		var _this = $( this );
		var tbl = $( '.post-table' );
		var callback = function( html ) {
			$( '.loadmore-btn' ).removeClass( 'saving' ).html( 'Tải thêm' );
			if( html.search( 'colspan="5"' ) === -1 ) {
				tbl.find( 'tbody' ).append( html );
				_this.data( 'offset', offset );
				var row = tbl.find( 'tr' ).length;
				row = parseInt( row ) - 1;
				$( '.viewing' ).text( row );
			}
			else {
				var emptyRow = '<tr><td colspan="5">Đã tải hết tất cả</td></tr>';
				tbl.find( 'tr:last-of-type' ).after( emptyRow );
				_this.remove();
			}
		};
		AJAX.post( url, data, callback );
	} );


    // When choose js_filter
    $(document).off('change', '.js_filter').on('change', '.js_filter', function() {
        var cate = $(this).val();
        if(cate != '0') {
            $('.loadmore-btn').remove();
            $('.total-row').prepend('<span class="loadmore-btn" data-offset="0">Tải thêm</span>');
            $( '.loadmore-btn' ).data('cate', cate);
            var url = 'include/30';
            var data = {
                'cate': cate
            };
    		var tbl = $( '.post-table' );
            var callback = function(html) {
                var titleRow = tbl.find('.title-rows').clone();
                tbl.find( 'tbody' ).html( titleRow );
                tbl.find( 'tbody' ).append( html );
            };
            AJAX.post( url, data, callback );
        }
    });
} );
