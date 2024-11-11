const wrapper = document.querySelector(".wrap-carrossel");
const carousel = document.querySelector(".carrossel");
const firstCardWidth = carousel.querySelector(".col-vaga").offsetWidth;
const defCardWidth = firstCardWidth + 24;
const arrowBtns = document.querySelectorAll(".wrap-carrossel img");
const btn1 = document.querySelector("#backBtn");
const btn2 = document.querySelector("#nextBtn");
const carouselChildrens = [...carousel.children];

// Add event listeners for the arrow buttons to scroll the carousel left and right
arrowBtns.forEach(btn => {
    nextBtn.addEventListener("click", () => {
        carousel.scrollLeft += btn.id == "right" ? -defCardWidth : defCardWidth;
    });
    backBtn.addEventListener("click", () => {
        carousel.scrollLeft -= btn.id == "left" ? defCardWidth : defCardWidth;
    });
});