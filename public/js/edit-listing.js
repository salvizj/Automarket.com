$(document).ready(function () {
    $(".edit-btn").on("click", function () {
        $(".save-btn").show();
        $(".price-text").hide();
        $(".distance-text").hide();
        $(".comment-text").hide();
        $(".edit-btn").hide();
        $(".form-control").show();
    });

    $(".save-btn").click(function () {
        $(".distance-text").show();
        $(".comment-text").show();
        $(".price-text").show();
        $(".save-btn").hide();
        $(".edit-btn").show();
        $(".form-control").hide();
    });
});
