const btns = Array.from(document.getElementsByClassName("nav-btn-mini"));
const btn = document.getElementById("menu-btn");
const abc = ['a', 'b', 'c', 'd', 'e'];

btns.forEach(el => { 
    let index = btns.indexOf(el);
    el.onclick = () => {
        document.getElementById(abc[index]).scrollIntoView();
        changeActive(btn, false);
    };
});
btn.onclick = () => {changeActive(btn, "not")};

function changeActive(el, x){
    switch (x) {
        case true:
            el.classList.add("active");
            break;

        case false:
            el.classList.remove("active");
            break;

        case "not":
            if (el.classList.contains("active")) {
                el.classList.remove("active");
            } else {
                el.classList.add("active");
            }
            break;

        default:
            console.error("Неправильно указан второй параметр функции changeActive (true, false, not)");
            break;
    }
}

export { abc, changeActive};