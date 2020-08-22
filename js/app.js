console.log("js ladattu?");

//Ladataan kaikki muut Js tiedostot
console.log("window.location: ", window.location);
const firstPath = window.location.pathname.split('/')[1];
console.log(firstPath);
let origin = window.location.origin + "/" + firstPath + "/wordpress/wp-content/themes/oma-teema/js/menuFunctions.js";
//lisää tähän muut js tiedostot mitkä halutaan lataa...

console.log("URL: ", origin);
try {
    let tag = document.createElement("script");
    tag.src = origin;
    document.getElementsByTagName("head")[0].appendChild(tag);
} catch (e) {
    alert("If error, CHANGE URI at line 19 in app.js: " + uri2);
}