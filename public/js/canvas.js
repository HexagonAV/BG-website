let n = 0;
if (window.matchMedia("(max-width: 480px)").matches) {
	n = 64;
} else {
	n = 512; //539
}
let w = 0;
let h = 0;
let x = 0;
let y = 0;
let z = 0;
//let t = 0;
let star_color_ratio = 0;
let star_ratio = 256;
let star_speed = 0;
let max_star_speed = 0;
let change_speed = 0;
let btn_speed = 0;
let old_position = 0;
let speed_state = false;
let star = new Array(n);
let opacity = 1;

let cursor_x = 0;
let cursor_y = 0;
let mouse_x = 0;
let mouse_y = 0;
let scroll = 0;

let canvas_x = 0;
let canvas_y = 0;

let canvas, scroll_control = { position: 0 };

let timeout;

try {
	canvas = document.getElementById("canvas");
	scroll_control = await import('./scroll_control.js');
} catch (err) {
	canvas = document.getElementById("canvasf");
	scroll_control.position = 0;
}

let ctx = canvas.getContext("2d");

function init() {
	for(let i=0;i<n;i++) {
		star[i]=new Array(5);
		star[i][0]=Math.random()*w*2-x*2;
		star[i][1]=Math.random()*h*2-y*2;
		star[i][2]=Math.round(Math.random()*z);
		star[i][3]=0;
		star[i][4]=0;
    }
	//ctx.lineCap='round';
	ctx.fillStyle = "rgba(0, 0, 0, 1)";
	ctx.strokeStyle = "white";
}

function anim() {
	//t = (t < 360) ? t + 1 : 0;
	//ctx.strokeStyle = "hsl(" + t + ", 100%, 50%)";
	mouse_x = (cursor_x - x);
	mouse_y = (cursor_y - y) - scroll;
	(scroll != 0) ? scroll /= 2 : 0;
	ctx.fillRect(0,0,w,h);
	if (old_position != scroll_control.position) {
		max_star_speed = scroll_control.position * 2;
		change_speed = Math.abs(scroll_control.position - old_position) / 80;
		old_position = scroll_control.position;
	}
	switch (scroll_control.position) {
		case 1:
			mouse_x = -h / 2;
			break;
		
		case 2:
			mouse_x = h / 2;
			break;

		case 4:
			mouse_y -= 500;
			break;
	}

	if (star_speed < max_star_speed + btn_speed) {
		star_speed += change_speed + btn_speed / 60;
	} else {
		star_speed -= change_speed * 10;
	}
	
	if (speed_state) {
		opacity -= (opacity > 0.11) ? 0.1 : 0;
		ctx.fillStyle = "rgba(0, 0, 0, "+ opacity +")";
	} else {
		opacity += (opacity < 1) ? 0.1 : 0;
		ctx.fillStyle = "rgba(0, 0, 0, "+ opacity +")";
	}

	for (let i = 0; i < n; i++) {
		//t = (t < 360) ? t + 60 : 0;
		//ctx.strokeStyle = "hsl(" + t + ", 100%, 50%)";
		let test = true;
		let star_x_save = star[i][3];
		let star_y_save = star[i][4];
		star[i][1] += (mouse_y >> 4) / 7; if(star[i][1] > y << 1) { star[i][1] -= h << 1; test = false; } if(star[i][1] < -y << 1) { star[i][1] += h << 1; test = false; }
		star[i][0] += (mouse_x >> 4) / 7; if(star[i][0] > x << 1) { star[i][0] -= w << 1; test = false; } if(star[i][0] < -x << 1) { star[i][0] += w << 1; test = false; }
		star[i][2] -= star_speed; if(star[i][2] > z) { star[i][2] -= z; test = false; } if(star[i][2] < 0) { star[i][2] += z; test = false; }
		star[i][3] = x + (star[i][0] / star[i][2]) * star_ratio;
		star[i][4] = y + (star[i][1] / star[i][2]) * star_ratio;

		if (star_x_save > 0 && star_x_save < w && star_y_save > 0 && star_y_save < h && test) {
			ctx.lineWidth = (1 - star_color_ratio * star[i][2]) * 2;
			ctx.beginPath();
			ctx.moveTo(star_x_save,star_y_save);
			ctx.lineTo(star[i][3],star[i][4]);
			ctx.stroke();
			ctx.closePath();
		}
	}
	timeout = setTimeout(anim, 10);
	}

function move(e) {
	cursor_x = e.clientX - canvas_x;
	cursor_y = e.clientY - canvas_y;
}

function resize() {
	w = window.innerWidth;
	h = window.innerHeight;
	canvas.width = w;
	canvas.height = h;
	x = Math.round(w / 2);
	y = Math.round(h / 2);
	z = (w + h) / 2;
	star_color_ratio = 1 / z;
	cursor_x = x;
	cursor_y = y;
	init();
}

document.onmousemove = move;

let lastScroll = 0;
window.addEventListener("scroll", () => {
	scroll += (window.pageYOffset - lastScroll) * 40;
	lastScroll = window.pageYOffset;
}, false);

window.addEventListener("resize", resize);

//document.getElementById("div-btn").addEventListener("mouseover", () => {btn_speed = 40; speed_state = true;});
//document.getElementById("div-btn").addEventListener("mouseout", () => {btn_speed = 0; speed_state = false;});

resize();
anim();