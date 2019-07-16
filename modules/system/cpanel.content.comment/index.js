$( document ).ready( function() {	
	/*Load more*/
	$( document ).off( 'click', '.loadmore-btn' ).on( 'click', '.loadmore-btn', function() {
		$( this ).addClass( 'saving' ).html( '<i class="fa fa-spinner fa-spin fa-fw" aria-hidden="true"></i> Đang tải' );
		var offset =  $( this ).data( 'offset' );
		offset = parseInt( offset ) + 5;
		var url = 'include/31';
		var data = {
			'offset': offset	
		};
		var _this = $( this );
		var tbl = $( '.comment-table tbody' );
		var callback = function( html ) {
			$( '.loadmore-btn' ).removeClass( 'saving' ).html( 'Tải thêm' );
			if( html.search( 'colspan="4"' ) === -1 ) {
				tbl.append( html );
				_this.data( 'offset', offset );
				console.log(_this.data( 'offset' ));
				var row = tbl.find( 'tr' ).length;
				row = parseInt( row ) - 1;
				$( '.viewing' ).text( row );
			}
			else {
				var emptyRow = '<tr><td colspan="4">Đã tải hết tất cả</td></tr>';
				tbl.find( ' > tr:last-child' ).after( emptyRow );
				_this.remove();
			}
		};
		AJAX.post( url, data, callback );
	} );
	
	/*Lock / Unlock*/
	$( document ).off( 'click', '.block-comment' ).on( 'click', '.block-comment', function() {
		var _this = $( this );
		var url = 'include/32';
		var data = {
			'comment_id': $( this ).data( 'id' )
		};
		var callback = function( html ) {
			DOM.showStatus( html, true );
			_this.children().toggleClass( 'fa-eye-slash' );
			_this.parent().parent().toggleClass( 'block' );
		};
		AJAX.post( url, data, callback );
	} )
} )