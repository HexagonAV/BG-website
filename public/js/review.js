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

let isGet = false;
getNewReviews();
preStart();

function preStart(){
    if (isGet) {
        start();
    } else {
        setTimeout(() => {
            preStart();
        }, 100);
    }
}

function start() {
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
            if (position < 0) {e.preventDefault(); position = 0}
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
            getNewReviews();
        }
    });
}


function randomName(x) {
    let name = "";
    for (let index = 0; index < x; index++) {
        name += abc[Math.round(Math.random()*(abc.length - 1))];
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
        while (len != n) {
            pages[page].children.item(len - 1).remove();
            len--;
        }
    }
}

function getNewReviews() {

    axios.post('/review', {
        offset: reviews.length
    })
        .then(function (response) {
        get_array(response.data);
        isGet = true;
    })
        .catch(function (error) {
        console.log(error);
    });
}

function get_array(text) {
    let lastid = reviews.length;
    let i = 0;
    text.forEach(info => {
        reviews.push(new review(lastid + i, info.avatar, info.buys, info.name, info.stars, info.created_at, info.text));
        i++;
    });
}

function changeReviewContent(el, content) {
    let tmp;
    tmp = el.children.item(0);
    tmp.children.item(0).src = content.img;
    tmp = tmp.children.item(1);
    tmp.children.item(0).textContent = content.name;
    tmp.children.item(1).textContent = "Куплено игр через наш сервис: " + content.buys;
    tmp.children.item(2).textContent = "Куплено игр: " + content.buys;
    tmp = el.children.item(1);
    let stars = content.stars;
    for (let n = 0; n < 5; n++) {
        if (stars > 0) {
            tmp.children.item(n).src = "https://hexagonav.github.io/BG-website/imgs/star.svg";
            stars--;
        } else {
            tmp.children.item(n).src = "https://hexagonav.github.io/BG-website/imgs/hollow_star.svg";
        }
    }
    el.children.item(2).textContent = "опубликованно: " + content.date;
    el.children.item(3).textContent = content.text;
}

export { getSize };