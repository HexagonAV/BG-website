import { filter } from "./js/filter.js";
import { nearest } from "./js/nav_bar_active.js";
import { getSize } from "./js/review.js";

window.onscroll = () => { nearest() };
window.onresize = () => { filter() };