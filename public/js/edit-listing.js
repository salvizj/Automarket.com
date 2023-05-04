$(document).ready(function () {
    $(".edit-btn").on("click", function () {
        $(".form-control").show();
        $(".save-btn").show();
        $(".price-text").hide();
        $(".distance-text").hide();
        $(".comment-text").hide();
        $(".edit-btn").hide();
        $(".form-control").show();
    });

    $(".save-btn").click(function () {
        $(".form-control").hide();
        $(".distance-text").show();
        $(".comment-text").show();
        $(".price-text").show();
        $(".save-btn").hide();
        $(".edit-btn").show();
        $(".form-control").hide();
    });
});
