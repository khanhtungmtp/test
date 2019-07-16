$( document ).ready( function() {

	var PARAMS = ULTI.queryString();

	/*Init sortable*/
	PRODUCT_CATEGORY.initSortable();

	/*Click edit button*/
	$( document ).off( 'click', '.edit-slider' ).on( 'click', '.edit-slider', function() {
		DOM.loadTplThisEl( '/admin/giaodien/slider?action=edit&id=' + $( this ).data( 'id' ) );
	} );

	/*Show editor when edit*/
	$( document ).ready( function() {
		if( PARAMS.action == 'edit' ) {
			$( '.module-addnew' ).fadeIn( 'fast' );
		}
	} );

	/*Slide down hidden content when click caret*/
	$( document ).off( 'click', '.slide-caret' ).on( 'click', '.slide-caret', function() {
		$( this ).next().next().next().slideToggle( 'fast' );
		$( this ).find( '.fa' ).toggleClass( 'fa-caret-right' ).toggleClass( 'fa-caret-down' );
	} );

	/*When click addnew*/
	$( document ).on( 'click', '.slider-addnew-btn', function() {
		MODULE.cmd( 'addnew', $( '.slider-cancel-btn' ) );
	} );

	/*When click cancel*/
	$( document ).on( 'click', '.slider-cancel-btn', function() {
		MODULE.cmd( 'cancel', $( '.slider-cancel-btn' ) );
	} );

	/*When input textbox of addnew*/
	$( document ).off( 'input change', '.addnew-slide input' ).on( 'input change', '.addnew-slide input', function() {
		var condition = ULTI.validate( $( '.addnew-slide .required-inputs' ), 'empty' );
		if( condition ) {
			DOM.enableSaveBtn();
		}
		else {
			DOM.disableSaveBtn();
		}
	} );

	/*When click on save new cate*/
	//Notice: Image of cate is saved with name like: 'danhmuc_url_id'
	$( document ).off( 'click', '.insert-new-btn' ).on( 'click', '.insert-new-btn', function(){
		//Upload image
		var title = $( '.slider-title' ).val().latinise();
		var callback = function( html ) {
			$( '.slider-image-url-addnew' ).val( html );
		};
		ULTI.upload( $( '#slider-image' )[0].files, 'public', title, callback );

		var data = $( '.addnew-slide input' ).serialize();
		var url = 'include/40';
		var callback2 = function( html ) {
            console.log(html);
			ULTI.done( 'Lưu thành công' );
		};
		AJAX.post( url, data, callback2 );
	} );

	/*Edit slide*/
	$( document ).off( 'change input', '.sortable input' ).on( 'change input', '.sortable input', function() {
		var condition = ULTI.validate( $( '.sortable .required-inputs' ), 'empty' );
		if( condition ) {
			DOM.enableSaveBtn();
		}
		else {
			DOM.disableSaveBtn();
		}
	} );


	/*Save change*/
	$( document ).off( 'click', '.update-list-btn' ).on( 'click', '.update-list-btn', function() {
		//Get order
		var order = $( 'ol.sortable' ).nestedSortable( 'toArray' );
		var data = new Array();
		for( var i = 1, len = order.length; i < len; i++ ) {
			var inputs = $( '#slide_' + order[i]['id'] ).find( 'input' );

			//Upload
			var file = inputs[4].files;
			var title = inputs[1].value.latinise();
			var srcEl = inputs[0];
			var callback = function( html ) {
				srcEl.value = html;
			};
			if( file.length > 0 ) {
				ULTI.upload( file, 'public', title + '-' + i, callback );
			}

			var slider = {
				'item_id': new Date().getTime() + i,
				'item_image': inputs[0].value,
				'item_title': inputs[1].value,
				'item_alt': inputs[2].value,
				'item_link': inputs[3].value
			};
			data.push( slider );
		}

		//Save into database
		var data = {
			'data': JSON.stringify( data )
		};
		var url = 'include/41';
		var callback2 = function( html ) {
			ULTI.done( 'Lưu thành công' );
		};
		AJAX.post( url, data, callback2 );
	} );

	/*Delete slide*/
	$( document ).off( 'click', '.slide-delete' ).on( 'click', '.slide-delete', function() {
		var deleteFn = function( target ) {
			var id = target.data( 'id' );
			var url = 'include/39';
			var data = {
				'id': id
			};
			var callback = function( html ) {
				ULTI.done( 'Xóa thành công' );
			};
			AJAX.post( url, data, callback );
		};
		var text = 'Bạn có chắc chắn xóa slide này?';
		DOM.showPopup( text, deleteFn, $( this ) );
	} );
} );
