import { position, scrollToNow } from "../scroll_control.js";

let touch;
let isTouchDirectionY = NaN;
let directionHelper = 0;
let points = ['a', 'b', 'c', 'd', 'e'];

points.forEach(x => {
    points[points.indexOf(x)] = window.pageYOffset + document.getElementById(x).getBoundingClientRect().top;
});

export function onTouchStart(e){
    let isButton = false;
    e.path.forEach(el => {
        if (el.localName == "button") {
            isButton = true;
        }
    });
    touch = e.changedTouches[0];
    if (!isButton) {
        e.preventDefault();
    }
}

export function onTouchMove(e){
    let tmp = touch.clientY - e.changedTouches[0].clientY
    document.documentElement.style.setProperty("scroll-behavior", "auto");
    if (Math.abs(touch.clientX - e.changedTouches[0].clientX) < Math.abs(tmp) && Math.abs(tmp) > 5 || isTouchDirectionY == false) {
        if (tmp >= 0) {
            if (tmp < 400) {
                window.scrollTo(0, points[position] + Math.sqrt(tmp) * 5);
            } else {
                window.scrollTo(0, points[position] + 80 + Math.sqrt(tmp));
            }
        } else {
            if (tmp > -400) {
                window.scrollTo(0, points[position] - (Math.sqrt(Math.abs(tmp)) * 5));
            } else {
                window.scrollTo(0, points[position] - 80 - Math.sqrt(Math.abs(tmp)));
            }
        }
        if (directionHelper > 5) {
            isTouchDirectionY = false;
        } else {
            directionHelper++;
        }
    } else {
        if (directionHelper > 5) {
            isTouchDirectionY = true;
        } else {
            directionHelper++;
        }
    }
    
    document.documentElement.style.setProperty("scroll-behavior", "smooth");
    e.preventDefault();
}

export function onTouchEnd(e){
    let tmp = touch.clientY - e.changedTouches[0].clientY;
    if (isTouchDirectionY == false) {
        if (tmp > 100 && position < 4) {
            scrollToNow(position + 1);
            e.preventDefault();
        } else {
            if (tmp < -100 && position > 0) {
                scrollToNow(position - 1);
                e.preventDefault();
            } else {
                window.scrollTo(0, points[position]);
            }
        }
    }
    directionHelper = 0;
    isTouchDirectionY = NaN;
}

export function onTouchCancel(e){
    console.log(e.changedTouches[0]);
}

export { points };