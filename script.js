import { filter } from "./js/filter.js";
import { nearest } from "./js/nav_bar_active.js";

window.onscroll = () => { nearest() };
window.onresize = () => { filter() };