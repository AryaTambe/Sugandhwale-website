document.addEventListener("DOMContentLoaded", function () {

    const slides = document.querySelectorAll(".hero-slide");
    const dots = document.querySelectorAll(".hero-dot");

    const previousButton = document.querySelector(".hero-prev");
    const nextButton = document.querySelector(".hero-next");

    if (!slides.length) {
        return;
    }

    let currentSlide = 0;

    let autoSlide;


    /* =========================================
       SHOW SLIDE
    ========================================= */

    function showSlide(index) {

        if (index >= slides.length) {
            currentSlide = 0;
        }

        if (index < 0) {
            currentSlide = slides.length - 1;
        }

        slides.forEach(function (slide) {

            slide.classList.remove("active");

        });


        dots.forEach(function (dot) {

            dot.classList.remove("active");

        });


        slides[currentSlide].classList.add("active");

        if (dots[currentSlide]) {

            dots[currentSlide].classList.add("active");

        }

    }


    /* =========================================
       NEXT
    ========================================= */

    function nextSlide() {

        currentSlide++;

        if (currentSlide >= slides.length) {

            currentSlide = 0;

        }

        showSlide(currentSlide);

    }


    /* =========================================
       PREVIOUS
    ========================================= */

    function previousSlide() {

        currentSlide--;

        if (currentSlide < 0) {

            currentSlide = slides.length - 1;

        }

        showSlide(currentSlide);

    }


    /* =========================================
       ARROW EVENTS
    ========================================= */

    if (nextButton) {

        nextButton.addEventListener("click", function () {

            nextSlide();

            restartAutoSlide();

        });

    }


    if (previousButton) {

        previousButton.addEventListener("click", function () {

            previousSlide();

            restartAutoSlide();

        });

    }


    /* =========================================
       DOT EVENTS
    ========================================= */

    dots.forEach(function (dot, index) {

        dot.addEventListener("click", function () {

            currentSlide = index;

            showSlide(currentSlide);

            restartAutoSlide();

        });

    });


    /* =========================================
       AUTOMATIC SLIDE
    ========================================= */

    function startAutoSlide() {

        autoSlide = setInterval(function () {

            nextSlide();

        }, 5000);

    }


    /* =========================================
       RESTART TIMER
    ========================================= */

    function restartAutoSlide() {

        clearInterval(autoSlide);

        startAutoSlide();

    }


    /* =========================================
       INITIALIZE
    ========================================= */

    showSlide(currentSlide);

    startAutoSlide();

});