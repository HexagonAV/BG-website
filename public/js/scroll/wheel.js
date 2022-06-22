import { position, scrollTo } from "../scroll_control.js";

export function onScroll(e){
    if (e.deltaY > 0 && position < 4) {
        scrollTo(position + 1);
    } else if (e.deltaY < 0 && position > 0) {
        scrollTo(position - 1);
    }
    e.preventDefault();
}