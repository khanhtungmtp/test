//Extend String object
var Latinise={};Latinise.latin_map={"Á":"A","Ă":"A","Ắ":"A","Ặ":"A","Ằ":"A","Ẳ":"A","Ẵ":"A","Ǎ":"A","Â":"A","Ấ":"A","Ậ":"A","Ầ":"A","Ẩ":"A","Ẫ":"A","Ä":"A","Ǟ":"A","Ȧ":"A","Ǡ":"A","Ạ":"A","Ȁ":"A","À":"A","Ả":"A","Ȃ":"A","Ā":"A","Ą":"A","Å":"A","Ǻ":"A","Ḁ":"A","Ⱥ":"A","Ã":"A","Ꜳ":"AA","Æ":"AE","Ǽ":"AE","Ǣ":"AE","Ꜵ":"AO","Ꜷ":"AU","Ꜹ":"AV","Ꜻ":"AV","Ꜽ":"AY","Ḃ":"B","Ḅ":"B","Ɓ":"B","Ḇ":"B","Ƀ":"B","Ƃ":"B","Ć":"C","Č":"C","Ç":"C","Ḉ":"C","Ĉ":"C","Ċ":"C","Ƈ":"C","Ȼ":"C","Ď":"D","Ḑ":"D","Ḓ":"D","Ḋ":"D","Ḍ":"D","Ɗ":"D","Ḏ":"D","ǲ":"D","ǅ":"D","Đ":"D","Ƌ":"D","Ǳ":"DZ","Ǆ":"DZ","É":"E","Ĕ":"E","Ě":"E","Ȩ":"E","Ḝ":"E","Ê":"E","Ế":"E","Ệ":"E","Ề":"E","Ể":"E","Ễ":"E","Ḙ":"E","Ë":"E","Ė":"E","Ẹ":"E","Ȅ":"E","È":"E","Ẻ":"E","Ȇ":"E","Ē":"E","Ḗ":"E","Ḕ":"E","Ę":"E","Ɇ":"E","Ẽ":"E","Ḛ":"E","Ꝫ":"ET","Ḟ":"F","Ƒ":"F","Ǵ":"G","Ğ":"G","Ǧ":"G","Ģ":"G","Ĝ":"G","Ġ":"G","Ɠ":"G","Ḡ":"G","Ǥ":"G","Ḫ":"H","Ȟ":"H","Ḩ":"H","Ĥ":"H","Ⱨ":"H","Ḧ":"H","Ḣ":"H","Ḥ":"H","Ħ":"H","Í":"I","Ĭ":"I","Ǐ":"I","Î":"I","Ï":"I","Ḯ":"I","İ":"I","Ị":"I","Ȉ":"I","Ì":"I","Ỉ":"I","Ȋ":"I","Ī":"I","Į":"I","Ɨ":"I","Ĩ":"I","Ḭ":"I","Ꝺ":"D","Ꝼ":"F","Ᵹ":"G","Ꞃ":"R","Ꞅ":"S","Ꞇ":"T","Ꝭ":"IS","Ĵ":"J","Ɉ":"J","Ḱ":"K","Ǩ":"K","Ķ":"K","Ⱪ":"K","Ꝃ":"K","Ḳ":"K","Ƙ":"K","Ḵ":"K","Ꝁ":"K","Ꝅ":"K","Ĺ":"L","Ƚ":"L","Ľ":"L","Ļ":"L","Ḽ":"L","Ḷ":"L","Ḹ":"L","Ⱡ":"L","Ꝉ":"L","Ḻ":"L","Ŀ":"L","Ɫ":"L","ǈ":"L","Ł":"L","Ǉ":"LJ","Ḿ":"M","Ṁ":"M","Ṃ":"M","Ɱ":"M","Ń":"N","Ň":"N","Ņ":"N","Ṋ":"N","Ṅ":"N","Ṇ":"N","Ǹ":"N","Ɲ":"N","Ṉ":"N","Ƞ":"N","ǋ":"N","Ñ":"N","Ǌ":"NJ","Ó":"O","Ŏ":"O","Ǒ":"O","Ô":"O","Ố":"O","Ộ":"O","Ồ":"O","Ổ":"O","Ỗ":"O","Ö":"O","Ȫ":"O","Ȯ":"O","Ȱ":"O","Ọ":"O","Ő":"O","Ȍ":"O","Ò":"O","Ỏ":"O","Ơ":"O","Ớ":"O","Ợ":"O","Ờ":"O","Ở":"O","Ỡ":"O","Ȏ":"O","Ꝋ":"O","Ꝍ":"O","Ō":"O","Ṓ":"O","Ṑ":"O","Ɵ":"O","Ǫ":"O","Ǭ":"O","Ø":"O","Ǿ":"O","Õ":"O","Ṍ":"O","Ṏ":"O","Ȭ":"O","Ƣ":"OI","Ꝏ":"OO","Ɛ":"E","Ɔ":"O","Ȣ":"OU","Ṕ":"P","Ṗ":"P","Ꝓ":"P","Ƥ":"P","Ꝕ":"P","Ᵽ":"P","Ꝑ":"P","Ꝙ":"Q","Ꝗ":"Q","Ŕ":"R","Ř":"R","Ŗ":"R","Ṙ":"R","Ṛ":"R","Ṝ":"R","Ȑ":"R","Ȓ":"R","Ṟ":"R","Ɍ":"R","Ɽ":"R","Ꜿ":"C","Ǝ":"E","Ś":"S","Ṥ":"S","Š":"S","Ṧ":"S","Ş":"S","Ŝ":"S","Ș":"S","Ṡ":"S","Ṣ":"S","Ṩ":"S","Ť":"T","Ţ":"T","Ṱ":"T","Ț":"T","Ⱦ":"T","Ṫ":"T","Ṭ":"T","Ƭ":"T","Ṯ":"T","Ʈ":"T","Ŧ":"T","Ɐ":"A","Ꞁ":"L","Ɯ":"M","Ʌ":"V","Ꜩ":"TZ","Ú":"U","Ŭ":"U","Ǔ":"U","Û":"U","Ṷ":"U","Ü":"U","Ǘ":"U","Ǚ":"U","Ǜ":"U","Ǖ":"U","Ṳ":"U","Ụ":"U","Ű":"U","Ȕ":"U","Ù":"U","Ủ":"U","Ư":"U","Ứ":"U","Ự":"U","Ừ":"U","Ử":"U","Ữ":"U","Ȗ":"U","Ū":"U","Ṻ":"U","Ų":"U","Ů":"U","Ũ":"U","Ṹ":"U","Ṵ":"U","Ꝟ":"V","Ṿ":"V","Ʋ":"V","Ṽ":"V","Ꝡ":"VY","Ẃ":"W","Ŵ":"W","Ẅ":"W","Ẇ":"W","Ẉ":"W","Ẁ":"W","Ⱳ":"W","Ẍ":"X","Ẋ":"X","Ý":"Y","Ŷ":"Y","Ÿ":"Y","Ẏ":"Y","Ỵ":"Y","Ỳ":"Y","Ƴ":"Y","Ỷ":"Y","Ỿ":"Y","Ȳ":"Y","Ɏ":"Y","Ỹ":"Y","Ź":"Z","Ž":"Z","Ẑ":"Z","Ⱬ":"Z","Ż":"Z","Ẓ":"Z","Ȥ":"Z","Ẕ":"Z","Ƶ":"Z","Ĳ":"IJ","Œ":"OE","ᴀ":"A","ᴁ":"AE","ʙ":"B","ᴃ":"B","ᴄ":"C","ᴅ":"D","ᴇ":"E","ꜰ":"F","ɢ":"G","ʛ":"G","ʜ":"H","ɪ":"I","ʁ":"R","ᴊ":"J","ᴋ":"K","ʟ":"L","ᴌ":"L","ᴍ":"M","ɴ":"N","ᴏ":"O","ɶ":"OE","ᴐ":"O","ᴕ":"OU","ᴘ":"P","ʀ":"R","ᴎ":"N","ᴙ":"R","ꜱ":"S","ᴛ":"T","ⱻ":"E","ᴚ":"R","ᴜ":"U","ᴠ":"V","ᴡ":"W","ʏ":"Y","ᴢ":"Z","á":"a","ă":"a","ắ":"a","ặ":"a","ằ":"a","ẳ":"a","ẵ":"a","ǎ":"a","â":"a","ấ":"a","ậ":"a","ầ":"a","ẩ":"a","ẫ":"a","ä":"a","ǟ":"a","ȧ":"a","ǡ":"a","ạ":"a","ȁ":"a","à":"a","ả":"a","ȃ":"a","ā":"a","ą":"a","ᶏ":"a","ẚ":"a","å":"a","ǻ":"a","ḁ":"a","ⱥ":"a","ã":"a","ꜳ":"aa","æ":"ae","ǽ":"ae","ǣ":"ae","ꜵ":"ao","ꜷ":"au","ꜹ":"av","ꜻ":"av","ꜽ":"ay","ḃ":"b","ḅ":"b","ɓ":"b","ḇ":"b","ᵬ":"b","ᶀ":"b","ƀ":"b","ƃ":"b","ɵ":"o","ć":"c","č":"c","ç":"c","ḉ":"c","ĉ":"c","ɕ":"c","ċ":"c","ƈ":"c","ȼ":"c","ď":"d","ḑ":"d","ḓ":"d","ȡ":"d","ḋ":"d","ḍ":"d","ɗ":"d","ᶑ":"d","ḏ":"d","ᵭ":"d","ᶁ":"d","đ":"d","ɖ":"d","ƌ":"d","ı":"i","ȷ":"j","ɟ":"j","ʄ":"j","ǳ":"dz","ǆ":"dz","é":"e","ĕ":"e","ě":"e","ȩ":"e","ḝ":"e","ê":"e","ế":"e","ệ":"e","ề":"e","ể":"e","ễ":"e","ḙ":"e","ë":"e","ė":"e","ẹ":"e","ȅ":"e","è":"e","ẻ":"e","ȇ":"e","ē":"e","ḗ":"e","ḕ":"e","ⱸ":"e","ę":"e","ᶒ":"e","ɇ":"e","ẽ":"e","ḛ":"e","ꝫ":"et","ḟ":"f","ƒ":"f","ᵮ":"f","ᶂ":"f","ǵ":"g","ğ":"g","ǧ":"g","ģ":"g","ĝ":"g","ġ":"g","ɠ":"g","ḡ":"g","ᶃ":"g","ǥ":"g","ḫ":"h","ȟ":"h","ḩ":"h","ĥ":"h","ⱨ":"h","ḧ":"h","ḣ":"h","ḥ":"h","ɦ":"h","ẖ":"h","ħ":"h","ƕ":"hv","í":"i","ĭ":"i","ǐ":"i","î":"i","ï":"i","ḯ":"i","ị":"i","ȉ":"i","ì":"i","ỉ":"i","ȋ":"i","ī":"i","į":"i","ᶖ":"i","ɨ":"i","ĩ":"i","ḭ":"i","ꝺ":"d","ꝼ":"f","ᵹ":"g","ꞃ":"r","ꞅ":"s","ꞇ":"t","ꝭ":"is","ǰ":"j","ĵ":"j","ʝ":"j","ɉ":"j","ḱ":"k","ǩ":"k","ķ":"k","ⱪ":"k","ꝃ":"k","ḳ":"k","ƙ":"k","ḵ":"k","ᶄ":"k","ꝁ":"k","ꝅ":"k","ĺ":"l","ƚ":"l","ɬ":"l","ľ":"l","ļ":"l","ḽ":"l","ȴ":"l","ḷ":"l","ḹ":"l","ⱡ":"l","ꝉ":"l","ḻ":"l","ŀ":"l","ɫ":"l","ᶅ":"l","ɭ":"l","ł":"l","ǉ":"lj","ſ":"s","ẜ":"s","ẛ":"s","ẝ":"s","ḿ":"m","ṁ":"m","ṃ":"m","ɱ":"m","ᵯ":"m","ᶆ":"m","ń":"n","ň":"n","ņ":"n","ṋ":"n","ȵ":"n","ṅ":"n","ṇ":"n","ǹ":"n","ɲ":"n","ṉ":"n","ƞ":"n","ᵰ":"n","ᶇ":"n","ɳ":"n","ñ":"n","ǌ":"nj","ó":"o","ŏ":"o","ǒ":"o","ô":"o","ố":"o","ộ":"o","ồ":"o","ổ":"o","ỗ":"o","ö":"o","ȫ":"o","ȯ":"o","ȱ":"o","ọ":"o","ő":"o","ȍ":"o","ò":"o","ỏ":"o","ơ":"o","ớ":"o","ợ":"o","ờ":"o","ở":"o","ỡ":"o","ȏ":"o","ꝋ":"o","ꝍ":"o","ⱺ":"o","ō":"o","ṓ":"o","ṑ":"o","ǫ":"o","ǭ":"o","ø":"o","ǿ":"o","õ":"o","ṍ":"o","ṏ":"o","ȭ":"o","ƣ":"oi","ꝏ":"oo","ɛ":"e","ᶓ":"e","ɔ":"o","ᶗ":"o","ȣ":"ou","ṕ":"p","ṗ":"p","ꝓ":"p","ƥ":"p","ᵱ":"p","ᶈ":"p","ꝕ":"p","ᵽ":"p","ꝑ":"p","ꝙ":"q","ʠ":"q","ɋ":"q","ꝗ":"q","ŕ":"r","ř":"r","ŗ":"r","ṙ":"r","ṛ":"r","ṝ":"r","ȑ":"r","ɾ":"r","ᵳ":"r","ȓ":"r","ṟ":"r","ɼ":"r","ᵲ":"r","ᶉ":"r","ɍ":"r","ɽ":"r","ↄ":"c","ꜿ":"c","ɘ":"e","ɿ":"r","ś":"s","ṥ":"s","š":"s","ṧ":"s","ş":"s","ŝ":"s","ș":"s","ṡ":"s","ṣ":"s","ṩ":"s","ʂ":"s","ᵴ":"s","ᶊ":"s","ȿ":"s","ɡ":"g","ᴑ":"o","ᴓ":"o","ᴝ":"u","ť":"t","ţ":"t","ṱ":"t","ț":"t","ȶ":"t","ẗ":"t","ⱦ":"t","ṫ":"t","ṭ":"t","ƭ":"t","ṯ":"t","ᵵ":"t","ƫ":"t","ʈ":"t","ŧ":"t","ᵺ":"th","ɐ":"a","ᴂ":"ae","ǝ":"e","ᵷ":"g","ɥ":"h","ʮ":"h","ʯ":"h","ᴉ":"i","ʞ":"k","ꞁ":"l","ɯ":"m","ɰ":"m","ᴔ":"oe","ɹ":"r","ɻ":"r","ɺ":"r","ⱹ":"r","ʇ":"t","ʌ":"v","ʍ":"w","ʎ":"y","ꜩ":"tz","ú":"u","ŭ":"u","ǔ":"u","û":"u","ṷ":"u","ü":"u","ǘ":"u","ǚ":"u","ǜ":"u","ǖ":"u","ṳ":"u","ụ":"u","ű":"u","ȕ":"u","ù":"u","ủ":"u","ư":"u","ứ":"u","ự":"u","ừ":"u","ử":"u","ữ":"u","ȗ":"u","ū":"u","ṻ":"u","ų":"u","ᶙ":"u","ů":"u","ũ":"u","ṹ":"u","ṵ":"u","ᵫ":"ue","ꝸ":"um","ⱴ":"v","ꝟ":"v","ṿ":"v","ʋ":"v","ᶌ":"v","ⱱ":"v","ṽ":"v","ꝡ":"vy","ẃ":"w","ŵ":"w","ẅ":"w","ẇ":"w","ẉ":"w","ẁ":"w","ⱳ":"w","ẘ":"w","ẍ":"x","ẋ":"x","ᶍ":"x","ý":"y","ŷ":"y","ÿ":"y","ẏ":"y","ỵ":"y","ỳ":"y","ƴ":"y","ỷ":"y","ỿ":"y","ȳ":"y","ẙ":"y","ɏ":"y","ỹ":"y","ź":"z","ž":"z","ẑ":"z","ʑ":"z","ⱬ":"z","ż":"z","ẓ":"z","ȥ":"z","ẕ":"z","ᵶ":"z","ᶎ":"z","ʐ":"z","ƶ":"z","ɀ":"z","ﬀ":"ff","ﬃ":"ffi","ﬄ":"ffl","ﬁ":"fi","ﬂ":"fl","ĳ":"ij","œ":"oe","ﬆ":"st","ₐ":"a","ₑ":"e","ᵢ":"i","ⱼ":"j","ₒ":"o","ᵣ":"r","ᵤ":"u","ᵥ":"v","ₓ":"x"};
String.prototype.latinise=function(){return this.replace(/[^A-Za-z0-9\[\] ]/g,function(a){return Latinise.latin_map[a]||a})};
String.prototype.latinize=String.prototype.latinise;
String.prototype.isLatin=function(){return this==this.latinise()}

//Extend number object
Number.prototype.format = function(n, x, s, c) {
	var re = '\\d(?=(\\d{' + (x || 3) + '})+' + (n > 0 ? '\\D' : '$') + ')',
	num = this.toFixed(Math.max(0, ~~n));
	return (c ? num.replace('.', c) : num).replace(new RegExp(re, 'g'), '$&' + (s || ','));
};

//Declare global variable
var $doc = $( document );
var $article = $( 'article' );
var AJAX, DOM, ULTI, PARAMS;

//Regex prevent XSS
// Regex allow a-zA-Z0-9 and space, [], {}, (), -, ,
var REGEX = new RegExp( /[^a-zA-Z0-9\s\[\]\{\}\(\),-]/ );

( function() {
	"use strict";

	/*Ajax shape for all requests
	===========================================*/
	AJAX = {
		post: function( url, data, callback ) {
			$.ajax( {
				url: url,
				type: 'POST',
				data: data,
				success: function( html ) {
					callback( html );
				}
			} )
		},

		get: function( url, data, callback ) {
			typeof data == 'undefined' ? data = {} : false;
			typeof callback == 'undefined' ? callback = function(){} : false;
			$.ajax( {
				url: url,
				type: 'GET',
				data: data,
				success: function( html ) {
					callback( html );
				}
			} )
		},

		load: function( el, url ) {
			//Show loading
			$( '.loading-wrapper, .loading' ).show();

			el.load( url, function( html ) {
				$( this ).children().unwrap();

				//Inject script tag
				var script = $( html ).find( '.takaplus-script' ).html();
				$( 'article' ).append( '<script class="takaplus-script">' + script + '</script>' );

				//Hilite sidebar item
				SIDEBAR.hilite();

				/*Scrollbar*/
				DOM.initScrollbar();

				/*Trigger change for tab radio*/
				$( '.tab-radio' ).change();

				/*Get query string*/
				PARAMS = ULTI.queryString();

				//Hide loading
				$( document ).ready( function() {
					$( '.loading-wrapper, .loading' ).hide();
				} );
			} );
		}
	}

	/* DOM functions
	============================================*/
	DOM = {
		loadTplThisEl: function( el ) {
			var callback = function( el ) {
				var href;
				if( typeof el === 'string' ) {
					href = el;
				}
				else
					href = el.prop( 'href' ) || el.data( 'href' );
				var url = href + ' article' ;
				var el2 = $( 'article' );
				history.pushState( '', '', href );
				AJAX.load( el2, url );
				ULTI.updateChangeState( false );
			};
			ULTI.needSave( callback, el );
		},

		showStatus: function( string, state ) {
			var status = $( '.cpanel-status' );
			status.find( '.status-content' ).text( string );
			if( state ) {
				status.find( '.status-icon' ).removeClass( 'fa-exclamation' ).addClass( 'fa-check' );
				status.find( 'p' ).removeClass( 'error' ).addClass( 'success' );
			}
			else {
				status.find( '.status-icon' ).removeClass( 'fa-check' ).addClass( 'fa-exclamation' );
				status.find( 'p' ).removeClass( 'success' ).addClass( 'error' );
			}
			status.addClass( 'show' );
			window.setTimeout( function() {
				status.removeClass( 'show' );
			}, 3000 );
		},

		showPopup: function( text, callback, target ){
			var popup = $( '.cpanel-popup' );
			var popupWrapper = $( '.cpanel-popup-wrapper' );
			popup.find( 'p:eq(0)' ).text( text );
			popupWrapper.fadeIn( 'medium' );
			popup.fadeIn( 'medium' );
			var _this = this;
			$( document ).off( 'click', '.cpanel-popup span' ).on( 'click', '.cpanel-popup span', function() {
				if( $( this ).hasClass( 'popup-agree' ) ) {
					callback( target );
				}
				popupWrapper.fadeOut( 'medium' );
				popup.fadeOut( 'medium' );
			} );
		},

		enableSaveBtn: function() {
			$( '.save-btn' ).removeClass( 'disabled-buttons' ).addClass( 'save-buttons' );
			$( '.undo-btn' ).removeClass( 'disabled-buttons' ).addClass( 'cancel-buttons' );
			ULTI.updateChangeState( true );
		},

		disableSaveBtn: function() {
			$( '.save-btn' ).removeClass( 'save-buttons' ).addClass( 'disabled-buttons' );
			$( '.undo-btn' ).removeClass( 'cancel-buttons' ).addClass( 'disabled-buttons' );
			ULTI.updateChangeState( false );
		},

		initScrollbar: function() {
			$( ".module-content" ).mCustomScrollbar({
				theme: "minimal-dark",
				axis: 'y',
				scrollInertia: 400,
				autoHideScrollbar: true
			});
		},

		initWysiwyg: function() {
			/*Init tinyMCE*/
			tinymce.init( {
				selector: '.wysiwyg',
				width: 700,
				plugins: [
					'advlist autolink lists link image imagetools textcolor charmap preview anchor autoresize codesample',
					'insertdatetime media table contextmenu paste responsivefilemanager emoticons charmap hr'
				],
				toolbar1: 'insertfile undo redo | bold italic underline strikethrough superscript subscript | alignleft aligncenter alignright alignjustify outdent indent | forecolor backcolor ',
				toolbar2: 'table bullist numlist | link image media responsivefilemanager | emoticons charmap hr insertdatetime anchor codesample | preview',
				toolbar3: 'fontselect fontsizeselect',
				image_advtab: true,
				relative_urls : false,
				remove_script_host : false,
				convert_urls : true,
				menubar: false,
				external_filemanager_path: _WWW + "modules/system/filemanager/",
				filemanager_title:"File Manager" ,
				external_plugins: { "filemanager" : _WWW + "modules/system/filemanager/plugin.min.js"},
				setup: function ( ed ) {
					ed.on( 'init', function() {
						$(ed.getWin()).trigger( 'resize' );
						$(ed.getWin()).bind('resize', function(e){
							$( '.tab-radio' ).change();
						})
					});
					ed.off( 'change keyup' ).on( 'change keyup', function() {
						tinymce.triggerSave();
						$( '.wysiwyg' ).change();
					});
				}
			});
		},

		tinytrapSuggest: ( function() {
			$( document ).on( 'click', '.suggest-list-panel > span', function() {
				var text = $( this ).text();
				var id = $( this ).data( 'id' );
				var span = '<span data-id="' + id + '">' + text + ' <i class="fa fa-times" aria-hidden="true"></i></span>';
				var resultDiv = $( this ).parent().parent().next();
				var input = resultDiv.find( 'input' );
				var value = input.val();
				if( value.search( id ) === -1 ) {
					resultDiv.append( span );
					input.val( input.val() + ',' + id ).change();
					$( '.tab-radio' ).change();
				}
			} )

			$( document ).on( 'click', '.suggest-list-result .fa', function() {
				var span = $( this ).parent();
				var id = span.data( 'id' );
				var input = span.parent().find( 'input' );
				var value = input.val();
				value = value.replace( id, '' );
				input.val( value );
				span.remove();
			} );
		} () ),

		numberInputHandler: ( function() {
			$( document ).on( 'keyup keydown', '.number-inputs .currency-inputs', function( e ) {
				e = ( e ) ? e : window.event;
				var charCode = ( e.which ) ? e.which : e.keyCode;

				// Allow: backspace, delete, tab, escape, enter and .
				if ($.inArray(charCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
					// Allow: Ctrl+A
					(charCode == 65 && e.ctrlKey === true) ||
					// Allow: Ctrl+C
					(charCode == 67 && e.ctrlKey === true) ||
					// Allow: Ctrl+X
					(charCode == 88 && e.ctrlKey === true) ||
					// Allow: home, end, left, right
					(charCode >= 35 && e.keyCode <= 39)) {
					// let it happen, don't do anything
					return;
				}
				// Ensure that it is a number and stop the keypress
				if ((e.shiftKey || (charCode < 48 || charCode > 57)) && (charCode < 96 || charCode > 105)) {
					e.preventDefault();
				}
			} )

			$( document ).on( 'input', '.number-inputs', function() {
				var max = $( this ).data( 'max' );
				var min = $( this ).data( 'min' );
				var value = $( this ).val();
				if( value < min ) {
					$( this ).val( min );
				}
				if( value > max ) {
					$( this ).val( max );
				}
			} )
		} ) (),

		currencyInputHanlder: ( function() {
			$( document ).on( 'input', '.currency-inputs', function() {
				var value = $( this ).val();
				value = value.replace( /\./g, "");
				value = parseInt( value );
				value = isNaN( value ) ? 0 : value;
				value = value.format( 0, 3, '.', ',' );
				$( this ).val( value );
			})
		} ) (),
	}

	ULTI = {
		placeCaretAtEnd: function(el) {
			el.focus();
			if (typeof window.getSelection != "undefined"
					&& typeof document.createRange != "undefined") {
				var range = document.createRange();
				range.selectNodeContents(el);
				range.collapse(false);
				var sel = window.getSelection();
				sel.removeAllRanges();
				sel.addRange(range);
			} else if (typeof document.body.createTextRange != "undefined") {
				var textRange = document.body.createTextRange();
				textRange.moveToElementText(el);
				textRange.collapse(false);
				textRange.select();
			}
		},

		queryString: function() {
			var query_string = {};
			var query = window.location.search.substring(1);
			var vars = query.split("&");
			for (var i=0;i<vars.length;i++) {
				var pair = vars[i].split("=");
					// If first entry with this name
				if (typeof query_string[pair[0]] === "undefined") {
				  query_string[pair[0]] = decodeURIComponent(pair[1]);
					// If second entry with this name
				} else if (typeof query_string[pair[0]] === "string") {
				  var arr = [ query_string[pair[0]],decodeURIComponent(pair[1]) ];
				  query_string[pair[0]] = arr;
					// If third or later entry with this name
				} else {
				  query_string[pair[0]].push(decodeURIComponent(pair[1]));
				}
			}
			return query_string;
		},

		validate: function( rangeEl, type ) {
			type = typeof type === 'undefined' ? 'secure' : 'empty';
			var emptyFields = rangeEl.filter( function() {
				if( type == 'secure' ) {
					var value = $( this ).val().latinise();
					return REGEX.test( value ) || $.trim( value ).length === 0;
				}
				else if( type = 'empty' ) {
					var value = $( this ).val();
					return $.trim( value ).length === 0;
				}
			} );
			return emptyFields.length === 0;
		},

		upload: function( file, destination, imageName, callback ) {
			var data = new FormData();
			for( var i = 0, len = file.length; i < len; i++ ) {
				data.append( 'file[]', file[i] );
			}
			data.append( 'destination', destination );
			data.append( 'image_name', imageName );
			$.ajax( {
				url: 'include/6',
				type: 'POST',
				processData: false,
				contentType: false,
				cache: false,
				async: false,
				data: data,
				success: function( html ) {
                    console.log(html);
					var html = html.split( '|' ),
						state = html[0],
						text = html[1];

					if( state == '0' ) {
						DOM.showStatus( text, false );
					}
					else {
						callback( text );
					}
				}
			} );
		},

		change: false,
		updateChangeState: function( state ) {
			this.change = state;
		},

		needSave: function( callback, target ) {
			var text = 'Thay đổi chưa được lưu, bạn có muốn thoát?';
			if( this.change ) {
				DOM.showPopup( text, callback, target );
			}
			else {
				callback( target );
			}
		},

		done: function( text ) {
			//Disable save button
			DOM.disableSaveBtn();

			//Show status
			DOM.showStatus( text, true );

			//Reload
			DOM.loadTplThisEl( window.location.href.split('?')[0] );
		},
	}
} ) ( jQuery, window );
