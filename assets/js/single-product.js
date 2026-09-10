document.addEventListener("DOMContentLoaded", function () {

    const forms = document.querySelectorAll(".sw-cart-form");

    forms.forEach(function (form) {

        const input = form.querySelector(".sw-qty-input");
        const minus = form.querySelector(".sw-qty-minus");
        const plus = form.querySelector(".sw-qty-plus");

        if (!input || !minus || !plus) {
            return;
        }


        /* =========================================
           GET LIMITS
        ========================================= */

        const getMin = function () {

            const min = parseInt(input.getAttribute("min"), 10);

            return Number.isFinite(min) ? min : 1;

        };


        const getMax = function () {

            const max = input.getAttribute("max");

            /*
             * No max attribute = unlimited quantity.
             */

            if (
                max === null ||
                max === "" ||
                max === "-1"
            ) {
                return Infinity;
            }

            const maxNumber = parseInt(max, 10);

            return Number.isFinite(maxNumber)
                ? maxNumber
                : Infinity;

        };


        /* =========================================
           NORMALIZE INPUT
        ========================================= */

        const normalize = function () {

            let value = parseInt(input.value, 10);

            const min = getMin();
            const max = getMax();

            if (!Number.isFinite(value) || value < min) {
                value = min;
            }

            if (value > max) {
                value = max;
            }

            input.value = value;

        };


        /* =========================================
           MINUS
        ========================================= */

        minus.addEventListener("click", function (event) {

            event.preventDefault();

            let value = parseInt(input.value, 10);

            const min = getMin();

            if (!Number.isFinite(value)) {
                value = min;
            }

            if (value > min) {
                value--;
            }

            input.value = value;

            input.dispatchEvent(
                new Event("change", {
                    bubbles: true
                })
            );

        });


        /* =========================================
           PLUS
        ========================================= */

        plus.addEventListener("click", function (event) {

            event.preventDefault();

            let value = parseInt(input.value, 10);

            const max = getMax();

            if (!Number.isFinite(value) || value < 1) {
                value = 1;
            }

            /*
             * Increase until the actual WooCommerce
             * maximum, or indefinitely if unlimited.
             */

            if (value < max) {
                value++;
            }

            input.value = value;

            input.dispatchEvent(
                new Event("change", {
                    bubbles: true
                })
            );

        });


        /* =========================================
           MANUAL INPUT
        ========================================= */

        input.addEventListener("input", function () {

            let value = parseInt(input.value, 10);

            const min = getMin();
            const max = getMax();

            if (!Number.isFinite(value)) {
                return;
            }

            if (value < min) {
                input.value = min;
            }

            if (value > max) {
                input.value = max;
            }

        });


        /* =========================================
           BLUR
        ========================================= */

        input.addEventListener("blur", function () {

            normalize();

        });


        /* =========================================
           PREVENT ENTER FROM CAUSING WEIRD INPUT
        ========================================= */

        input.addEventListener("keydown", function (event) {

            if (event.key === "Enter") {
                normalize();
            }

        });

    });

});