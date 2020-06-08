console.log("menuFunctions successfully loaded!");

//Menun manipulointia

const menuToFind = ".left-nav > ul > li";

let menuState = false; //closed

checkElement(menuToFind).then(() => {
  console.log("DOM ladattu");
  const leftNav = document.querySelectorAll(".left-nav")[0];

  leftNav.style.width = "50%";

  const menuIconInMobileVersion = document.querySelectorAll(".left-nav > ul > li")[0];

  const ulList = document.querySelectorAll(".left-nav > ul")[0];

  const liElement = document.querySelectorAll(".left-nav > ul > li");

  console.log("LADATTU: ", menuIconInMobileVersion);

  const a = menuIconInMobileVersion.querySelector('a');

  let bool = isHidden(menuIconInMobileVersion);


  let defaultHeight = a.style.height;
  let defaultHeight2  = a.style.clientHeight;

  console.log("defaultHeight: ",defaultHeight);
  console.log("defaultHeight2: ",defaultHeight2);

  console.log("ul: ",ulList);

  menuIconInMobileVersion.addEventListener("click", function() {
    checkIfMenuIsOpenOrClosed(menuState, ulList, liElement);
  });

}); //funtio loppuu

function makeLiVisible(arr) {
  for (let i = 0; i < arr.length; i++) {
    addScrollToMenu(arr[i]);
  }
}

function makeLiHidden(arr) {
  for (let i = 1; i < arr.length; i++) {
    hideLiElements(arr[i]);
  }
}

function checkIfMenuIsOpenOrClosed(bool, ul, liList) {



  if (bool === false) { //valikko suljettu, avaa se
    ul.style.height = "100%";

  //  animateMenu(ul);


    makeLiVisible(liList);
    menuState = true;
  } else {
    ul.style.height = "10%";
    makeLiHidden(liList);
    menuState = false;
  }
}

function rafAsync() {
  return new Promise(resolve => {
    requestAnimationFrame(resolve); //faster than set time out
  });
}

function checkElement(selector) {
  //  console.log("Selecting: ",selector);
  if (document.querySelector(selector) === null) {
    return rafAsync().then(() => checkElement(selector));
  } else {
    return Promise.resolve(true);
  }
}

function isHidden(el) {
  return (el.offsetParent === null)
}

function addScrollToMenu(li) {
  console.log("li: ", li);
  li.style.display = "inline-block";
  li.style.width = "100%";
  li.style.float = "none";
}

function hideLiElements(li) {
  console.log("li: ", li);
  li.style.display = "none";
}

function animateMenu(elem) {
  //transition: width 2s, height 4s;
}
