let canvas = document.getElementById('canvas');
window.addEventListener('resize', () => {
    canvas.setAttribute("width", document.documentElement.offsetWidth);
    canvas.setAttribute("height", document.documentElement.offsetHeight);
});
canvas.setAttribute("width", document.documentElement.offsetWidth);
canvas.setAttribute("height", document.documentElement.offsetHeight);
let ctx = canvas.getContext('2d');
ctx.fillStyle = "#ffffff";
let x = 700;
let y = 500;
let dx = Math.round(Math.random() * 20);
let dy = Math.round(Math.random() * 20);
let cx = Math.round(Math.random() - 0.5);
let cy = 0.1;
let step = 0;
setInterval(move, 10);

function move() {
    ctx.fillStyle = "#0e0e0e10";
    ctx.fillRect(0, 0, 5000, 5000);
    ctx.fillStyle = "#ffffff";
    ctx.fillRect(x, y, 10, 10);
    if (step > 200) {
        x = 700;
        y = 500;
        dx = Math.round(Math.random() * 5) - 2.5;
        dy = -Math.round(Math.random() * 5) - 5;
        cx = Math.round(Math.random() - 0.5);
        step = 0;
    } else {
        dx += cx;
        dy += cy;
        x += dx;
        y += dy;
    }
    step++;
    console.log(step);
}