//* Getting variables
const nextBtn = document.getElementById('arrow-next');
const prevBtn = document.getElementById('arrow-prev');
const caroussel = document.getElementById('caroussel');
const slider = document.getElementById('slider');

//* index : l'index du slider showed
//* intervalId : l'intervalId permet de recuperer le setIntervalId permettant de bloquer le slide
let index = 0,
    intervalId = 0,
    speed = 2000;

//* Reset all sections
const reset = () => {
    for (let i = 0; i < slider.children.length; i++) {
        const element = slider.children[i];
        element.style.zIndex = 0;
        element.style.opacity = 0;
    }
}

//* change slide
//* forward : direction avant
//* indexed : true means we don't increment and decrement
const changeSlide = (forward = true, indexed = false) => {
    if (forward && !indexed) {
        index = index < slider.children.length - 1 ? index + 1 : 0;
    } else if (!forward && !indexed) {
        index = index > 0 ? index - 1 : slider.children.length - 1;
    }
    slider.children[index].style.zIndex = 1;
    slider.children[index].style.opacity = 1;
}

//* Caroussel
caroussel.addEventListener('mouseover', () => {
    clearInterval(intervalId);
});
caroussel.addEventListener('mouseout', () => {
    autoSlide();
});
//* Auto slide functions
const autoSlide = () => {
    intervalId = setInterval(() => {
        reset();
        changeSlide();
    }, speed);
}

//* L'auto slide function
autoSlide();

//* Slider next button
nextBtn.addEventListener('click', () => {
    reset();
    changeSlide();
});

//* Slider prev button
prevBtn.addEventListener('click', () => {
    reset();
    changeSlide(false);
});
