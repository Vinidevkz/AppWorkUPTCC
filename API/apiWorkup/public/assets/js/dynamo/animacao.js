const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
        console.log(entry)
        if (entry.isIntersecting) {
            entry.target.classList.add('visivel');
        }
        else {
            entry.target.classList.remove('visivel');
        }
    });
});

const HiddenElements = document.querySelectorAll('.oculto');
HiddenElements.forEach((el) => observer.observe(el));

const wrapper = document.querySelector(".wrap-carrossel");
const carousel = document.querySelector(".carrossel");
const firstCardWidth = carousel.querySelector(".card").offsetWidth;
const arrowBtns = document.querySelectorAll(".wrap-carrossel img");
const btn1 = document.querySelector("#backBtn");
const btn2 = document.querySelector("#nextBtn");
const carouselChildrens = [...carousel.children];

// Add event listeners for the arrow buttons to scroll the carousel left and right
arrowBtns.forEach(btn => {
    nextBtn.addEventListener("click", () => {
        carousel.scrollLeft += btn.id == "right" ? -firstCardWidth : firstCardWidth;
    });
    backBtn.addEventListener("click", () => {
        carousel.scrollLeft -= btn.id == "left" ? firstCardWidth : firstCardWidth;
    });
});