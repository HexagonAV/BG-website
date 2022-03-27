import { abc, changeActive } from "./btn_active.js"
let blocks = [];

let navA = Array.from(document.getElementsByClassName("nav-a"));
let top_btn = document.getElementById("top-btn");

navA = [navA[0], navA[1], navA[3], navA[4], top_btn]; 

abc.forEach(x => {
    blocks.push(document.getElementById(x));
});

export function nearest() {
    let target_distance = [];

    blocks.forEach(el => {
        target_distance.push(Math.abs((el.getBoundingClientRect().top - window.innerHeight / 2) + el.clientHeight / 2));
    });

    navA.forEach(el => {
        changeActive(el, false);
    });

    changeActive(navA[target_distance.indexOf(Math.min.apply(null, target_distance))], true);
}