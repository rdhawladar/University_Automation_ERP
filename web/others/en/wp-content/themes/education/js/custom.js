( function( $ ) {

	$( document ).ready(function( $ ) {

		// Implement go to top.
		var $scroll_obj = $( '#btn-scrollup' );
		if ( $scroll_obj.length > 0 ) {

			$( window ).scroll( function() {
				if ( $( this ).scrollTop() > 100 ) {
					$scroll_obj.fadeIn();
				} else {
					$scroll_obj.fadeOut();
				}
			});

			$scroll_obj.click( function() {
				$( 'html, body' ).animate( { scrollTop: 0 }, 600 );
				return false;
			});
		}

	});

} )( jQuery );
