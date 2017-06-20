/**
 * navigation.js
 */
( function( $ ) {

  $(document).ready(function($){
    $( ".menu-toggle" ).click(function(){
	        $( ".wrap-menu-content" ).toggle( 'slow' );
	});
  	function initMainNavigation( container ) {
	    // Add dropdown toggle that display child menu items.
	    container.find( '.menu-item-has-children > a' ).after( '<button class="dropdown-toggle" aria-expanded="false">' + EducationHubScreenReaderText.expand + '</button>' );

	    // Toggle buttons and submenu items with active children menu items.
	    container.find( '.current-menu-ancestor > button' ).addClass( 'toggle-on' );
	    container.find( '.current-menu-ancestor > .sub-menu' ).addClass( 'toggled-on' );

	    container.find( '.dropdown-toggle' ).click( function( e ) {
	    	var _this = $( this );
	    	e.preventDefault();
	    	_this.toggleClass( 'toggle-on' );
	    	_this.next( '.children, .sub-menu' ).toggleClass( 'toggled-on' );
	    	_this.attr( 'aria-expanded', _this.attr( 'aria-expanded' ) === 'false' ? 'true' : 'false' );
	    	_this.html( _this.html() === EducationHubScreenReaderText.expand ? EducationHubScreenReaderText.collapse : EducationHubScreenReaderText.expand );
	    } );
	  }

	  // Trigger menu.
	  initMainNavigation( $( '.main-navigation' ) );

  });

} )( jQuery );
