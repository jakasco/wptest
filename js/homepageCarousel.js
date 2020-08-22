console.log("carousel loaded!");

//animaatioita diveihin jos tarvetta

function scrollToTop(duration) {
    if (document.scrollingElement.scrollTop === 0) return;

    const cosParameter = document.scrollingElement.scrollTop / 2;
    let scrollCount = 0,
        oldTimestamp = null;

    function step(newTimestamp) {
        if (oldTimestamp !== null) {

            scrollCount += Math.PI * (newTimestamp - oldTimestamp) / duration;
            if (scrollCount >= Math.PI) return document.scrollingElement.scrollTop = 0;
            document.scrollingElement.scrollTop = cosParameter + cosParameter * Math.cos(scrollCount);
        }
        oldTimestamp = newTimestamp;
        window.requestAnimationFrame(step);
    }
    window.requestAnimationFrame(step);
}

///////////////////////
let minheight = 20;
let maxheight = 100;
let time = 1000;
let timer = null;
let toggled = false;

window.onload = function() {
    console.log("Slider clicked!");
    try {
        let controller = document.getElementById('slide');
        let slider = document.getElementById('slider');
        slider.style.height = minheight + 'px';
        controller.onclick = function() {
            console.log("Slider clicked!");
            clearInterval(timer);
            let instanceheight = parseInt(slider.style.height);
            let init = (new Date()).getTime();
            let height = (toggled = !toggled) ? maxheight : minheight;

            let disp = height - parseInt(slider.style.height);
            timer = setInterval(function() {
                let instance = (new Date()).getTime() - init;
                if (instance <= time) {
                    let pos = instanceheight + Math.floor(disp * instance / time);
                    slider.style.height = pos + 'px';
                } else {
                    slider.style.height = height + 'px';
                    clearInterval(timer);
                }
            }, 1);
        };
    } catch (e) {
        console.log(e);
    }
};