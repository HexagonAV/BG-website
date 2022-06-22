import { position, scrollTo, scrollToNow } from "../scroll_control.js";
// left: 37, up: 38, right: 39, down: 40,
// spacebar: 32, pageup: 33, pagedown: 34, end: 35, home: 36

let funcs = {
    0: () => {return (position < 4) ? position + 1 : -1},
    1: () => {return (position > 0) ? position - 1 : -1},
    2: () => {return 4},
    3: () => {return 0}
}
let keys =  { 32: [0, 0], 33: [1, 1], 34: [0, 1], 35: [2, 1], 36: [3, 1], 38: [1, 0], 40: [0, 0] };

export function onPress(e) {
    if (e.keyCode >= 32 && e.keyCode <= 36 || e.keyCode == 38 || e.keyCode == 40) {
        let tmp = funcs[keys[e.keyCode][0]]();
        if (tmp != -1) {
            if (keys[e.keyCode][1]) {
                scrollToNow(tmp);
            } else {
                scrollTo(tmp);
            }
        }
        e.preventDefault();
    }
}