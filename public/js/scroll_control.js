import { onScroll as Wheel } from "./scroll/wheel.js";
import { onPress as Keys } from "./scroll/keys.js";
import { onTouchMove as TouchMove, onTouchStart as TouchStart, onTouchEnd as TouchEnd, onTouchCancel as TouchCancel } from "./scroll/touch.js";

let lastTimeout = 0;
function scrollTo(to) {
  if (!isScrolling) {
    isScrolling = true;
    position = to;
    document.getElementById(points[to]).scrollIntoView();
    lastTimeout = setTimeout(() => { isScrolling = false }, 350);
  }
}

function scrollToNow(to) {
  clearTimeout(lastTimeout);
  isScrolling = false;
  scrollTo(to);
}

// modern Chrome requires { passive: false } when adding event
let supportsPassive = false;
try {
  window.addEventListener("test", null, Object.defineProperty({}, 'passive', {
    get: function () { supportsPassive = true; } 
  }));
} catch(e) {}

let wheelOpt = supportsPassive ? { passive: false } : false;
let wheelEvent = 'onwheel' in document.createElement('div') ? 'wheel' : 'mousewheel';

// call this to Disable
function disableScroll() {
  window.addEventListener('DOMMouseScroll', Wheel, false); // older FF
  window.addEventListener(wheelEvent, Wheel, wheelOpt); // modern desktop
  window.addEventListener('touchmove', TouchMove, wheelOpt); // mobile move
  window.addEventListener('touchstart', TouchStart, wheelOpt); // mobile start
  window.addEventListener('touchend', TouchEnd, wheelOpt); // mobile end
  window.addEventListener('touchcancel', TouchCancel, wheelOpt); // mobile end
  window.addEventListener('keydown', Keys, false);
}

// call this to Enable
function enableScroll() {
  window.removeEventListener('DOMMouseScroll', Wheel, false);
  window.removeEventListener(wheelEvent, Wheel, wheelOpt); 
  window.removeEventListener('touchmove', TouchMove, wheelOpt);
  window.removeEventListener('touchstart', TouchStart, wheelOpt);
  window.removeEventListener('touchend', TouchEnd, wheelOpt);
  window.removeEventListener('touchcancel', TouchCancel, wheelOpt);
  window.removeEventListener('keydown', Keys, false);
}

let points = ['a', 'b', 'c', 'd', 'e'];
let isScrolling = false;
let position = 0;
document.getElementById(points[0]).scrollIntoView();

disableScroll();

let el = Array.from(document.querySelectorAll("[data-scroll-target]"));
el.forEach(element => {
  element.onclick = () => scrollToNow(Number(element.dataset.scrollTarget));
});

export { position, scrollTo, scrollToNow };