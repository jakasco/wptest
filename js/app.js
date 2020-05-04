console.log("js ladattu?");

jQuery(function(){
	let menuLink = jQuery('.menu-item').first();
	console.log(menuLink);

	menuLink.click(function(){
		jQuery('.menu-item:not(:first)').slideToggle(400); //se menuitem joka ei ole ensimmäinen, ajetaan
	});
});
