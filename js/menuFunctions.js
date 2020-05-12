const menuToFind = ".left-nav > ul > li";

let menuState = false; //closed

checkElement(menuToFind).then(() => {
  const leftNav = document.querySelectorAll(".left-nav");

  const menuIconInMobileVersion = document.querySelectorAll(".left-nav > ul > li")[0];

  const ul = document.querySelectorAll(".left-nav > ul);

  const liElement = document.querySelectorAll(".left-nav > ul > li");
  console.log("LADATTU: ", menuIconInMobileVersion);
  const a = menuIconInMobileVersion.querySelector('a');

  let bool = isHidden(menuIconInMobileVersion);

  if (bool === false) { //mobile, laita näkyväksi li elementit pysty suunnassa

    for (let i = 0; i < liElement.length; i++) {
      addScrollToMenu(liElement[i]);
    }

  } else { //desktop

  }

  menuIconInMobileVersion.addEventListener("click", function() {
      checkIfMenuIsOpenOrClosed(menuState);
  });
});


function checkIfMenuIsOpenOrClosed(bool) {

 if(bool === false){ //valikko suljettu, avaa se

 }else{

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
  li.style.display = "inline";
  li.style.width = "100%";
  li.style.float = "none";
}


function scrollToTop (duration) {
    // cancel if already on top
    if (document.scrollingElement.scrollTop === 0) return;

    const cosParameter = document.scrollingElement.scrollTop / 2;
    let scrollCount = 0, oldTimestamp = null;

    function step (newTimestamp) {
        if (oldTimestamp !== null) {
            // if duration is 0 scrollCount will be Infinity
            scrollCount += Math.PI * (newTimestamp - oldTimestamp) / duration;
            if (scrollCount >= Math.PI) return document.scrollingElement.scrollTop = 0;
            document.scrollingElement.scrollTop = cosParameter + cosParameter * Math.cos(scrollCount);
        }
        oldTimestamp = newTimestamp;
        window.requestAnimationFrame(step);
    }
    window.requestAnimationFrame(step);
}
