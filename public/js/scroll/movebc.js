import { points } from "./touch.js";

let bPage = document.getElementById("b")["children"][1].style;
let cPage = document.getElementById("c")["children"][0].style;

window.addEventListener("scroll", onScroll, false);

function onScroll(e) {
    bPage.left = -Math.abs(points[1] - window.pageYOffset) + "px";
    cPage.left =  Math.abs(points[2] - window.pageYOffset) + "px";
}