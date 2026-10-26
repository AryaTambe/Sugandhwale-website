document.addEventListener("DOMContentLoaded", function () {


    /* =========================================
       PREMIUM SMOOTH SCROLL
    ========================================= */

    function initSmoothScroll() {

        /*
         * Respect users who prefer reduced motion.
         */

        if (
            window.matchMedia(
                "(prefers-reduced-motion: reduce)"
            ).matches
        ) {
            return;
        }


        /*
         * Load Lenis only once.
         */

        if (window.Lenis) {

            startLenis();

            return;

        }


        const script = document.createElement("script");

        script.src =
            "https://cdn.jsdelivr.net/npm/lenis@1.3.11/dist/lenis.min.js";

        script.onload = function () {

            startLenis();

        };

        script.onerror = function () {

            /*
             * If the CDN fails, the website simply
             * falls back to normal browser scrolling.
             */

        };

        document.head.appendChild(script);


        function startLenis() {

            if (!window.Lenis) return;

            if (window.sugandhwaleLenis) return;


            const lenis = new Lenis({

                /*
                 * Slightly slower than native scrolling,
                 * but NOT floaty or laggy.
                 */

                duration: 1.05,

                /*
                 * Keeps wheel movement natural.
                 */

                wheelMultiplier: 0.85,

                /*
                 * Touch scrolling remains natural.
                 */

                touchMultiplier: 1,

                /*
                 * Smooth mouse-wheel scrolling.
                 */

                smoothWheel: true,

                /*
                 * Do not make touch scrolling feel artificial.
                 */

                syncTouch: false,

                /*
                 * Small easing curve for a premium finish.
                 */

                easing: function (t) {

                    return 1 -
                        Math.pow(
                            1 - t,
                            3
                        );

                }

            });


            window.sugandhwaleLenis = lenis;


            function raf(time) {

                lenis.raf(time);

                requestAnimationFrame(raf);

            }


            requestAnimationFrame(raf);

        }

    }


    initSmoothScroll();


    /* =========================================
       VIDEO TESTIMONIAL CAROUSEL
    ========================================= */

    const carousel = document.querySelector(
        ".video-testimonial-grid"
    );

    if (!carousel) return;


    const cards = Array.from(
        carousel.querySelectorAll(
            ".video-testimonial"
        )
    );


    if (cards.length < 3) return;


    const videos = cards.map(function (card) {

        return card.querySelector(
            ".testimonial-video"
        );

    });


    /*
     * Start from the middle video.
     */

    let currentIndex = 1;

    let isAnimating = false;


    /* =========================================
       CREATE ARROWS
    ========================================= */

    const prevButton =
        document.createElement("button");

    prevButton.className =
        "video-carousel-arrow video-carousel-prev";

    prevButton.innerHTML =
        "&#8249;";

    prevButton.setAttribute(
        "aria-label",
        "Previous video"
    );


    const nextButton =
        document.createElement("button");

    nextButton.className =
        "video-carousel-arrow video-carousel-next";

    nextButton.innerHTML =
        "&#8250;";

    nextButton.setAttribute(
        "aria-label",
        "Next video"
    );


    carousel.appendChild(prevButton);

    carousel.appendChild(nextButton);


    /* =========================================
       CREATE DOTS
    ========================================= */

    const dotsContainer =
        document.createElement("div");

    dotsContainer.className =
        "video-carousel-dots";


    cards.forEach(function (_, index) {

        const dot =
            document.createElement("button");

        dot.className =
            "video-carousel-dot";

        dot.setAttribute(
            "aria-label",
            "Go to video " + (index + 1)
        );


        dot.addEventListener(
            "click",
            function () {

                goToVideo(index);

            }
        );


        dotsContainer.appendChild(dot);

    });


    carousel.parentElement.appendChild(
        dotsContainer
    );


    const dots = Array.from(
        dotsContainer.querySelectorAll(
            ".video-carousel-dot"
        )
    );


    /* =========================================
       PAUSE ALL VIDEOS
    ========================================= */

    function pauseAllVideos() {

        videos.forEach(function (video) {

            if (video) {

                video.pause();

            }

        });

    }


    /* =========================================
       UPDATE ACTIVE CARD
    ========================================= */

    function updateActiveCard() {

        cards.forEach(
            function (card, index) {

                card.classList.toggle(
                    "active",
                    index === currentIndex
                );

            }
        );


        dots.forEach(
            function (dot, index) {

                dot.classList.toggle(
                    "active",
                    index === currentIndex
                );

            }
        );

    }


    /* =========================================
       PLAY CURRENT VIDEO
    ========================================= */

    function playCurrentVideo() {

        pauseAllVideos();


        const video =
            videos[currentIndex];


        if (!video) return;


        video.muted = true;

        video.currentTime = 0;


        const playPromise =
            video.play();


        if (
            playPromise !== undefined
        ) {

            playPromise.catch(
                function () {

                    /*
                     * Browser blocked autoplay.
                     * User can press play manually.
                     */

                }
            );

        }

    }


    /* =========================================
       ROTATE CARDS
    ========================================= */

    function rotateCards(direction) {

        if (isAnimating) return;


        isAnimating = true;


        if (direction === "next") {

            const firstCard =
                cards.shift();

            cards.push(firstCard);

        } else {

            const lastCard =
                cards.pop();

            cards.unshift(lastCard);

        }


        /*
         * Rebuild the visual order.
         */

        cards.forEach(function (card) {

            carousel.insertBefore(
                card,
                prevButton
            );

        });


        /*
         * Update video references.
         */

        const newVideos =
            cards.map(function (card) {

                return card.querySelector(
                    ".testimonial-video"
                );

            });


        videos.length = 0;


        newVideos.forEach(
            function (video) {

                videos.push(video);

            }
        );


        /*
         * Center video is always index 1.
         */

        currentIndex = 1;


        updateActiveCard();


        /*
         * Wait for the premium transition
         * before starting the new video.
         */

        setTimeout(
            function () {

                playCurrentVideo();

                isAnimating = false;

            },
            750
        );

    }


    /* =========================================
       NEXT VIDEO
    ========================================= */

    function nextVideo() {

        rotateCards("next");

    }


    /* =========================================
       PREVIOUS VIDEO
    ========================================= */

    function previousVideo() {

        rotateCards("previous");

    }


    /* =========================================
       VIDEO FINISHED
    ========================================= */

    videos.forEach(function (video) {

        if (!video) return;


        video.addEventListener(
            "ended",
            function () {

                /*
                 * Only the center video
                 * controls the carousel.
                 */

                if (
                    videos[currentIndex] ===
                    video
                ) {

                    nextVideo();

                }

            }
        );

    });


    /* =========================================
       ARROW BUTTONS
    ========================================= */

    nextButton.addEventListener(
        "click",
        nextVideo
    );


    prevButton.addEventListener(
        "click",
        previousVideo
    );


    /* =========================================
       SWIPE
    ========================================= */

    let touchStartX = 0;


    carousel.addEventListener(
        "touchstart",
        function (event) {

            touchStartX =
                event.changedTouches[0]
                    .screenX;

        },
        {
            passive: true
        }
    );


    carousel.addEventListener(
        "touchend",
        function (event) {

            const touchEndX =
                event.changedTouches[0]
                    .screenX;


            const difference =
                touchStartX -
                touchEndX;


            if (
                Math.abs(difference) < 50
            ) {

                return;

            }


            if (difference > 0) {

                nextVideo();

            } else {

                previousVideo();

            }

        },
        {
            passive: true
        }
    );


    /* =========================================
       INITIAL STATE
    ========================================= */

    updateActiveCard();


    /*
     * Start from the middle video.
     */

    setTimeout(
        function () {

            playCurrentVideo();

        },
        400
    );

});