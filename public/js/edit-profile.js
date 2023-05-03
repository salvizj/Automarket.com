$(document).ready(function () {
    $(".edit-btn").on("click", function () {
        // Show input fields and hide span fields
        $(".card-text > input").show();
        $(".card-text > span").hide();
        $(".new-password-section").show();

        // Show save button and hide edit button
        $(".save-btn").show();
        $(".edit-btn").hide();
    });

    $(".save-btn").on("click", function () {
        // Check if new password is provided
        var newPassword = $("#new_password").val();
        var newPasswordConfirmation = $("#new_password_confirmation").val();
        if (newPassword) {
            // Check if the new password and its confirmation match
            if (newPassword !== newPasswordConfirmation) {
                alert("The new password confirmation does not match.");
                return;
            }
            $("form").append(
                '<input type="hidden" name="password" value="' +
                    newPassword +
                    '">'
            );
        }

        // Hide input fields and show span fields
        $(".card-text > input").hide();
        $(".card-text > span").show();
        $(".new-password-section").hide();

        // Hide save button and show edit button
        $(".save-btn").hide();
        $(".edit-btn").show();

        // Submit the form
        if ($(".new-password-section").is(":visible")) {
            $("form").submit();
        }
    });
});
