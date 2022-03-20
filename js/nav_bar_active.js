import { abc, change_active } from "./btn_active.js"
let blocks = [];

let nav_a = Array.from(document.getElementsByClassName("nav-a"));
let top_btn = document.getElementById("top-btn");

nav_a = [nav_a[0], nav_a[1], nav_a[3], nav_a[4], top_btn]; 

abc.forEach(x => {
    blocks.push(document.getElementById(x));
});

export function nearest() {
    let target_distance = [];

    blocks.forEach(el => {
        target_distance.push(Math.abs((el.getBoundingClientRect().top - window.innerHeight / 2) + el.clientHeight / 2));
    });

    nav_a.forEach(el => {
        change_active(el, false);
    });

    change_active(nav_a[target_distance.indexOf(Math.min.apply(null, target_distance))], true);
}