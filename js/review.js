function review(id, img, buys, name, stars, date, text) {
    this.id = id;
    this.img = img;
    this.buys = buys;
    this.name = name;
    this.stars = stars;
    this.date = date;
    this.text = text;
};

let size = 3, position = 0, reviews = [], HTMLreviews = [];
let abc = ["q","w","e","r","t","y","u","i","o","p","a","s","d","f","g","h","j","k","l","z","x","c","v","b","n","m"];
let slider = document.getElementById("carouselControls");
let pages = document.getElementsByClassName("review-page");
let btnPrev = document.getElementsByClassName("carousel-control-prev")[0];
let btnNext = document.getElementsByClassName("carousel-control-next")[0];

getSize();

for (let x = 0; x < pages.length; x++) {
    for (let j = 0; j < pages[x].children.length; j++) {
        HTMLreviews.push(pages[x].children.item(j));
    }
}

getNewReviews(50);

let nr = 0;
HTMLreviews.forEach(el => {
    changeReviewContent(el, reviews[nr]);
    nr++;
});

slider.addEventListener('slide.bs.carousel', (e) => {
    if (e.direction == "left") {
        position += size;
        let start = ((e.to + 1 % 4) * size) % (size * 4);
        for (let x = 0; x < size; x++) {
            let rpos = position + 1 * size + x;
            if (rpos < reviews.length) {
                HTMLreviews[start + x].style.display = "block";
                changeReviewContent(HTMLreviews[start + x], reviews[rpos]);
            } else {
                HTMLreviews[start + x].style.display = "none";
            }
        }
    } else {
        position -= size;
        let start = (e.to - 1) * size;
        start += (start < 0) ? (size * 4) : 0;
        for (let x = 0; x < size; x++) {
            let rpos = position - 1 * size + x;
            if (rpos >= 0) {
                HTMLreviews[start + x].style.display = "block";
                changeReviewContent(HTMLreviews[start + x], reviews[rpos]);
            }
        }
    }
    btnPrev.style.display = position == 0 ? "none" : "flex";
    btnNext.style.display = (position + size >= reviews.length) ? "none" : "flex";
    if ((reviews.length - position) / size < 7) {
        getNewReviews(50);
    }
});

function randomName(x) {
    let name = "";
    for (let index = 0; index < x; index++) {
        name += abc[Math.round(Math.random()*abc.length)];
    }
    return name;
}

function getSize() {
    if (window.matchMedia("(max-width: 991.98px)").matches) {
        resize(1);
      } else {
        if (window.matchMedia("(max-width: 1459.98px)").matches) {
            resize(2);
          } else {
            resize(3);
        }
    }
}

function resize(n) {
    size = n;
    for (let page = 0; page < 4; page++) {
        let len = pages[page].children.length;
        console.log(len);
        while (len != n) {
            pages[page].children.item(len - 1).remove();
            len--;
        }
    }
}

function getNewReviews(n) {
    let lid = reviews.length;
    for (let id = 0; id < n; id++) {
        reviews.push(new review(lid + id, "imgs/test_avatar.png", Math.round(Math.random()*1000), randomName(10), Math.round(Math.random()*5), "1 апреля 2022", lid + id));
    }
}

function changeReviewContent(el, content) {
    let tmp;
    tmp = el.children.item(0);
    tmp.children.item(0).src = content.img;
    tmp = tmp.children.item(1);
    tmp.children.item(0).textContent = content.name;
    tmp.children.item(1).textContent = "Куплено игр через наш сервис: " + content.buys;
    tmp = el.children.item(1);
    let stars = content.stars;
    for (let n = 0; n < 5; n++) {
        if (stars > 0) {
            tmp.children.item(n).src = "http://127.0.0.1:5500/imgs/star.svg";
            stars--;
        } else {
            tmp.children.item(n).src = "http://127.0.0.1:5500/imgs/hollow_star.svg";
        }
    }
    el.children.item(2).textContent = "опубликованно: " + content.date;
    el.children.item(3).textContent = content.text;
}

export { getSize };