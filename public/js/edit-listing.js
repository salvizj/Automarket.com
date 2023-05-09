document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll(".edit-btn").forEach(function (btn) {
        btn.addEventListener("click", function () {
            document.querySelectorAll(".form-group").forEach(function (input) {
                input.style.display = "block";
            });
            document
                .querySelectorAll(".form-control")
                .forEach(function (input) {
                    input.style.display = "block";
                });
            document.querySelectorAll(".save-btn").forEach(function (btn) {
                btn.style.display = "block";
            });
            document.querySelectorAll(".price-text").forEach(function (text) {
                text.style.display = "none";
            });
            document
                .querySelectorAll(".distance-text")
                .forEach(function (text) {
                    text.style.display = "none";
                });
            document.querySelectorAll(".comment-text").forEach(function (text) {
                text.style.display = "none";
            });
            document.querySelectorAll(".edit-btn").forEach(function (btn) {
                btn.style.display = "none";
            });
        });
    });
    document.querySelectorAll(".save-btn").forEach(function (btn) {
        btn.addEventListener("click", function () {
            document.querySelectorAll(".form-group").forEach(function (input) {
                input.style.display = "none";
            });
            document
                .querySelectorAll(".form-control")
                .forEach(function (input) {
                    input.style.display = "none";
                });
            document
                .querySelectorAll(".distance-text")
                .forEach(function (text) {
                    text.style.display = "block";
                });
            document.querySelectorAll(".comment-text").forEach(function (text) {
                text.style.display = "block";
            });
            document.querySelectorAll(".price-text").forEach(function (text) {
                text.style.display = "block";
            });
            document.querySelectorAll(".save-btn").forEach(function (btn) {
                btn.style.display = "none";
            });
            document.querySelectorAll(".edit-btn").forEach(function (btn) {
                btn.style.display = "block";
            });
        });
    });
});
