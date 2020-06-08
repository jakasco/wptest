console.log("js ladattu?");

//Ladataan kaikki muut Js tiedostot

let uri = "http://localhost/wordpress/wp-content/themes/oma-teema";

let uri4 = "http://localhost/wordpress4/wordpress/wp-content/themes/oma-teema/js/menuFunctions.js";

let uri2 = window.location.href;
console.log("window.location: ",window.location);
let uri3  = "wp-content/themes/oma-teema";
let urlWhole = uri4;//uri4.concat(uri3);
console.log("urlWhole: ",urlWhole);
try{
  let tag = document.createElement("script");
  let tag2 = document.createElement("script");
  tag.src = "http://localhost/wordpress4/wordpress/wp-content/themes/oma-teema/js/menuFunctions.js";
  tag2.src = "http://localhost/wordpress4/wordpress/wp-content/themes/oma-teema/js/homepageCarousel.js";
  console.log("tag.src = ",tag.src);
  document.getElementsByTagName("head")[0].appendChild(tag);
  //document.getElementsByTagName("head")[0].appendChild(tag2);
}catch(e){
  alert("If error, CHANGE URI at line 19 in app.js: "+uri2);
}
