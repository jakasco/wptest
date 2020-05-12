console.log("customizer.js ladattu!");

/*
The customize() function takes two parameters,
the name of the setting to listen to, and a function
that performs an action
*/



( function( $ ) {

  wp.customize( 'background_color', function( value ) {
		value.bind( function( newval ) {
			jQuery( 'body' ).css( 'background-color', newval );
		} );
	} );

} )( jQuery );

/*
( function( $ ) {

  wp.customize( 'background_color', function( value ) {
		value.bind( function( newval ) {
			jQuery( 'header' ).css( 'background-color', newval );
		} );
	} );

} )( jQuery );
*/

//Veto viivan muutos
( function( $ ) {
wp.customize( 'cd_photocount', function( value ) {
	value.bind( function( newval ) {
		jQuery( '#photocount span' ).html( newval );
	} );
} );
} )( jQuery );


////TEKSTIN MUUTOS
( function( $ ) {
wp.customize( 'blogname', function( value ) {
  value.bind( function( newval ) {
    $( '#intro h1' ).html( newval );
  } );
} );
} )( jQuery );


( function( $ ) {
wp.customize( 'blogdescription', function( value ) {
  value.bind( function( newval ) {
    $( '#intro h2' ).html( newval );
  } );
} );
} )( jQuery );



///VÄRI
/*
( function( $ ) {

  wp.customize( 'background_color', function( value ) {
		value.bind( function( newval ) {
			$( 'body' ).css( 'background-color', newval );
		} );
	} );

} )( jQuery );*/
