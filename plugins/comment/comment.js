$( document ).ready( function() {
	$( 'textarea' ).each( function() {
		this.setAttribute( 'style', 'height:' + ( this.scrollHeight) + 'px;overflow-y:hidden;' );
	} ).on( 'input', function() {
		this.style.height = 'auto';
		this.style.height = ( this.scrollHeight ) + 'px';
	});
	
	$( '.chat-box input, .chat-box-reply input, .chat-box textarea, .chat-box-reply textarea' ).on( 'input change', function(){
        $( this ).parent().find(":submit").removeAttr('disabled');
    });
	
	$( document ).on( 'click', '.reply span', function() {
		$( this ).parent().parent().next().find( '.reply-input' ).show();
	} );
} )