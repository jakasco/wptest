console.log("js ladattu?");



/*
( function( $ ) {
//jQuery(function(){
	let menuLink = jQuery('.menu-item').first();
	console.log("menuLink? = ",menuLink);

	menuLink.click(function(){
		jQuery('.menu-item:not(:first)').slideToggle(400); //se menuitem joka ei ole ensimmäinen, ajetaan
	});
//});
} )( jQuery );
*/


let uri = "http://localhost/wp/wp-content/themes/oma-teema";
var tag = document.createElement("script");
tag.src = uri+"/js/menuFunctions.js";
document.getElementsByTagName("head")[0].appendChild(tag);
