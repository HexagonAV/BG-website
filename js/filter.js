const Fblocks = [document.getElementById("b"), document.getElementById("c")];

filter(); 

export function filter() {
    Fblocks.forEach(el => {
        el.style.setProperty("--filter-img", window.innerWidth/(1920/100) - 10 + "%");
    });
}