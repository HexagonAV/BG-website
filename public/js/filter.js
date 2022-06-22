const Fblocks = [document.getElementById("b"), document.getElementById("c")];

filter(); 

export function filter() {
    Fblocks.forEach(el => {
        if (window.innerWidth/(1920/100) - 10 <= 100) {
            el.style.setProperty("--filter-brig", window.innerWidth/(1920/100) - 10 + "%");
        }
    }); 
}