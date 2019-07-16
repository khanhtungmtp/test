/**
 * TAKA CPANEL
 * @author: dp0613
 * @link: fb.me/0613.dp
 * @version: v1.0
=======================================================*/
var MODULE, PRODUCT_CATEGORY, PRODUCT_PRODUCT, SIDEBAR, ARTICLE;
( function() {
	"use strict";

	/* SIDEBAR
	=================================================*/
	SIDEBAR = {
		toggle: ( function() {
			$( '.aside-button' ).click( function() {
				$( 'body' ).toggleClass( 'closed' );
			} )
		} () ),

		slideToggle: ( function() {
			$doc.off( 'click', '.aside-child-button' ).on( 'click', '.aside-child-button', function( e ) {
				e.stopPropagation();
				$( this ).parent().next().find( '.aside-child-item' ).slideToggle( 'fast' );
				$( this ).find( '.fa' ).toggleClass( 'fa-caret-down' ).toggleClass( 'fa-caret-right' );
			} )
		} () ),

		hilite: function() {
			$( '.active' ).removeClass( 'active' );
			var currentURL = location.href;
			var aEls = $( '.aside-list' ).find( '.aside-child-item a' );
			$.each( aEls, function() {
				var url = $( this ).prop( 'href' );
				if( currentURL.search( url ) !== -1 ) {
					var parent = $( this ).parent();

					//Change style
					parent.addClass( 'active' );

					//SlideDown sibling items
					parent.siblings().slideDown( 'fast' );
					parent.slideDown( 'fast' );
					parent.parent().parent().prev().find( '.aside-child-button .fa' ).removeClass( 'fa-caret-down' ).addClass( 'fa-caret-right' );

					return false;
				}
			} )
		},

		loadTpl: ( function() {
			$doc.off( 'click', '.aside-item, .aside-child-item, .profile-option' ).on( 'click', '.aside-item, .aside-child-item, .profile-option', function( e ) {
				e.preventDefault();
				var a = $( this ).find( 'a' );
				if( $( this ).hasClass( 'aside-item' ) ) {
					//Load homepage
					if( $( this ).hasClass( 'aside-homepage' ) ) {
						var url = a.prop( 'href' );
						var win = window.open( url, '_blank' );
						win.focus();
						return;
					}

					//Load overview
					if( $( this ).hasClass( 'aside-overview' ) ) {
						DOM.loadTplThisEl( a );
						return;
					}

					//SlideDown child items
					$( this ).next().find( '.aside-child-item' ).slideDown( 'fast' );
					$( this ).find( '.aside-child-button .fa' ).removeClass( 'fa-caret-down' ).addClass( 'fa-caret-right' );

					//Click main item
					$( this ).next().find( '.main' ).click();
				}
				else DOM.loadTplThisEl( a );
			} )
		} () ),

		hiliteWhenLoaded: ( function() {
			$( document ).ready( function() {
				SIDEBAR.hilite();
			} )
		} () ),

		scrollbar: ( function() {
			$( ".aside-list" ).mCustomScrollbar({
				theme: "minimal-dark",
				axis: 'y',
				scrollInertia: 400,
				autoHideScrollbar: true
			});
		} () ),

		showTooltip: ( function() {
			$( document ).on( 'mouseover', 'body.closed .aside-item,body.closed .aside-child-item', function() {
				var top = $( this ).offset().top;
				$( this ).find( 'span:eq(0)' ).css( {
					'top': top,
					'display': 'block'
				} );
			} )
			$( document ).on( 'mouseout', '.aside-item, .aside-child-item', function() {
				$( this ).find( 'span:eq(0)' ).hide();
			} )
		} () ),

		notification_fn: function() {
			var url = _WWW + 'admin';
			var data = {};
			var callback = function( html ) {
				var result = $( '<div />' ).append( html ).find( '.notification-wrapper' );
				var len = $( '.notification-wrapper' ).length;
				for( var i = 0; i < len; i++ ) {
					$( '.notification-wrapper' )[i].innerHTML = result[i].innerHTML;
				}
			};
			AJAX.get( url, data, callback );
		},

		notification: ( function() {
			window.setInterval( function() {
				SIDEBAR.notification_fn();
			}, 3000 ); //Load after 3s
		} ()),

		makeAsReadNotification: ( function() {
			$( document ).off( 'click', '.realtime-item' ).on( 'click', '.realtime-item', function() {
				var url = 'include/47';
				var type = $( this ).data( 'type' );
				var data = {
					'type': type,
				};
				var callback = function( html ) {
					//Do nothing
					SIDEBAR.notification_fn();
				};
				AJAX.post( url, data, callback );
			} );
		} ()),
	};

	/* ARTICLE
	=============================================*/
	ARTICLE = {
		smoothScroll: ( function() {
			DOM.initScrollbar();
		} () ),

		autoSetHeightTab: ( function() {
			$( document ).off( 'change', '.tab-radio' ).on( 'change', '.tab-radio', function() {
				if( $( this ).is( ':checked' ) ) {
					var height = $( this ).next().next().height() + 100;
					$( this ).parent().css( 'height', height );
				}
			} )

			$( document ).ready( function() {
				$( '.tab-radio' ).change();
			} )

			$( document ).on( 'mousemove', 'textarea', function() {
				if(this.oldwidth  === null){this.oldwidth  = this.style.width;}
				if(this.oldheight === null){this.oldheight = this.style.height;}
				if(this.style.width != this.oldwidth || this.style.height != this.oldheight){
					$( '.tab-radio' ).change();
					this.oldwidth  = this.style.width;
					this.oldheight = this.style.height;
				}
			} )
		} () ),

		inputFileController: ( function() {
			$( document ).on( 'change', '.file-inputs', function() {
				var files = this.files;
				var len = files.length;
				var label = $( this ).next().find( 'span:eq(1)' );
				if( len > 1 ) {
					label.html( 'Đã chọn <b>' + len + '</b> file' );
				}
				else if ( len == 1 ) {
					label.html( files.item(0).name );
				}
				else {
					label.html( 'Chưa chọn file...' );
				}
			} )
		} () ),
	};

	/* MODULE controling
	===================================================*/
	MODULE = {
		cmd: function( action, triggerEl ) {
			switch( action ) {
				case 'addnew':
					//Enable cancel button
					triggerEl.removeClass( 'disabled-buttons' ).addClass( 'cancel-buttons' );

					//Show hidden div
					$( '.module-addnew' ).fadeIn( 'medium' );

					break;
				case 'cancel':
					//Disable cancel button
					triggerEl.removeClass( 'cancel-buttons' ).addClass( 'disabled-buttons' );

					//Hide hidden div
					$( '.module-addnew' ).fadeOut( 'medium' );

					//Empty textbox
					$( '.module-addnew' ).find( 'input, textarea' ).val( '' );

					//Empty input file
					$( '#file-input-caption' ).text( 'Chưa chọn file...' );

					//Empty TinyMCE
					for( var i = 0, len = tinyMCE.editors.length; i < len; i++ ) {
						tinyMCE.editors[i].setContent('');
					}

					//Remove tags seperators
					$( '.product-tag-wrapper div > span' ).remove();

					//Remove preview image
					$( '.product-image-preview > div' ).remove();

					//Empty suggest list
					$( '.suggest-list-result > span' ).remove();

					//Restore checkbox and radio
					$( '.checkboxes, .radios' ).prop( 'checked', false );

					//Disable save btn
					DOM.disableSaveBtn();

					//Assign url location
					history.pushState( null, null, location.href.split( '?' )[0] );

					break;
				case 'input':
					var condition = ULTI.validate( $( '.module-addnew .required-inputs' ) );
					if( condition ) {
						triggerEl.removeClass( 'disabled-buttons' ).addClass( 'save-buttons' );
					}
					else {
						triggerEl.addClass( 'disabled-buttons' ).removeClass( 'save-buttons' );
					}
					break;
			}
		},
	};

	/*Product.category*/
	PRODUCT_CATEGORY = {
		oldOrder: '',

		updateOrder: function() {
			this.oldOrder = $( 'ol.sortable' ).nestedSortable( 'serialize' );
		},

		onChangeOrder: function() {
			var newOrder = $( 'ol.sortable' ).nestedSortable( 'serialize' );
			if( this.oldOrder != newOrder ) {
				DOM.enableSaveBtn();
			}
			else {
				DOM.disableSaveBtn();
			}
		},

		initSortable: function() {
			$( 'ol.sortable' ).nestedSortable({
				handle: 'div',
				items: 'li',
				toleranceElement: '> div',
				maxLevels: 4,
				placeholder: 'placeholder',
				forcePlaceholderSize: true,
				isTree: true,
				tabSize: 25,
				startCollapsed: false,
				opacity: 0.6,
				relocate: function() { PRODUCT_CATEGORY.onChangeOrder(); },
			});
			PRODUCT_CATEGORY.updateOrder();
		}
	};
} ) ( jQuery, window );
