console.log("customizer.js ladattu!");

/*
The customize() function takes two parameters,
the name of the setting to listen to, and a function
that performs an action
*/

( function( $ ) {

  wp.customize( 'background_color', function( value ) {
		value.bind( function( newval ) {
      console.log("newval: ",newval);
			jQuery( 'header' ).css( 'background-color', newval );
		} );
	} );

} )( jQuery );

( function( $ ) {
wp.customize( 'cd_photocount', function( value ) {
	value.bind( function( newval ) {
		jQuery( '#photocount span' ).html( newval );
	} );
} );
} )( jQuery );
