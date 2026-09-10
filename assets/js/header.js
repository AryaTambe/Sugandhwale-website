document.addEventListener("DOMContentLoaded", function () {


    /* =========================================
       SEARCH
    ========================================= */

    const searchToggle =
        document.querySelector(".search-toggle");

    const searchPanel =
        document.querySelector(".header-search-panel");

    const searchInput =
        searchPanel
            ? searchPanel.querySelector(
                'input[type="search"]'
            )
            : null;


    if (searchToggle && searchPanel) {

        searchToggle.addEventListener("click", function (event) {

            event.preventDefault();

            event.stopPropagation();

            const isOpen =
                searchPanel.classList.toggle("active");


            searchToggle.setAttribute(
                "aria-expanded",
                isOpen ? "true" : "false"
            );


            if (isOpen && searchInput) {

                setTimeout(function () {

                    searchInput.focus();

                }, 50);

            }

        });

    }


    /* =========================================
       MOBILE MENU
    ========================================= */

    const mobileToggle =
        document.querySelector(".mobile-menu-toggle");

    const mobileNavigation =
        document.querySelector(".mobile-navigation");


    if (mobileToggle && mobileNavigation) {


        /* =====================================
           OPEN / CLOSE
        ===================================== */

        mobileToggle.addEventListener("click", function (event) {

            event.preventDefault();

            event.stopPropagation();


            const isOpen =
                mobileNavigation.classList.toggle("active");


            mobileToggle.classList.toggle(
                "active",
                isOpen
            );


            mobileToggle.setAttribute(
                "aria-expanded",
                isOpen ? "true" : "false"
            );


            mobileToggle.setAttribute(
                "aria-label",
                isOpen
                    ? "Close menu"
                    : "Open menu"
            );


            mobileNavigation.setAttribute(
                "aria-hidden",
                isOpen ? "false" : "true"
            );

        });


        /* =====================================
           MOBILE NAVIGATION LINKS
        ===================================== */

        const mobileLinks =
            mobileNavigation.querySelectorAll("a");


        mobileLinks.forEach(function (link) {

            link.addEventListener("click", function () {

                mobileNavigation.classList.remove("active");

                mobileToggle.classList.remove("active");

                mobileToggle.setAttribute(
                    "aria-expanded",
                    "false"
                );

                mobileToggle.setAttribute(
                    "aria-label",
                    "Open menu"
                );

                mobileNavigation.setAttribute(
                    "aria-hidden",
                    "true"
                );

            });

        });

    }


    /* =========================================
       CLICK OUTSIDE
    ========================================= */

    document.addEventListener("click", function (event) {


        /* Close mobile menu */

        if (
            mobileNavigation &&
            mobileToggle &&
            mobileNavigation.classList.contains("active") &&
            !mobileNavigation.contains(event.target) &&
            !mobileToggle.contains(event.target)
        ) {

            mobileNavigation.classList.remove("active");

            mobileToggle.classList.remove("active");

            mobileToggle.setAttribute(
                "aria-expanded",
                "false"
            );

            mobileToggle.setAttribute(
                "aria-label",
                "Open menu"
            );

            mobileNavigation.setAttribute(
                "aria-hidden",
                "true"
            );

        }


        /* Close search */

        if (
            searchPanel &&
            searchToggle &&
            searchPanel.classList.contains("active") &&
            !searchPanel.contains(event.target) &&
            !searchToggle.contains(event.target)
        ) {

            searchPanel.classList.remove("active");

            searchToggle.setAttribute(
                "aria-expanded",
                "false"
            );

        }

    });


    /* =========================================
       ESCAPE KEY
    ========================================= */

    document.addEventListener("keydown", function (event) {

        if (event.key !== "Escape") {
            return;
        }


        /* Close mobile menu */

        if (mobileNavigation) {

            mobileNavigation.classList.remove("active");

        }

        if (mobileToggle) {

            mobileToggle.classList.remove("active");

            mobileToggle.setAttribute(
                "aria-expanded",
                "false"
            );

            mobileToggle.setAttribute(
                "aria-label",
                "Open menu"
            );

        }

        if (mobileNavigation) {

            mobileNavigation.setAttribute(
                "aria-hidden",
                "true"
            );

        }


        /* Close search */

        if (searchPanel) {

            searchPanel.classList.remove("active");

        }

        if (searchToggle) {

            searchToggle.setAttribute(
                "aria-expanded",
                "false"
            );

        }

    });

});