window.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll(".edit-btn").forEach(function (button) {
        button.addEventListener("click", function () {
            // Show input fields and hide span fields
            document
                .querySelectorAll(".card-text > input")
                .forEach(function (input) {
                    input.style.display = "block";
                });
            document
                .querySelectorAll(".card-text > span")
                .forEach(function (span) {
                    span.style.display = "none";
                });
            document.querySelector(".new-password-section").style.display =
                "block";

            // Show save button and hide edit button
            document.querySelector(".save-btn").style.display = "block";
            button.style.display = "none";
        });
    });

    document.querySelector(".save-btn").addEventListener("click", function () {
        // Check if new password is provided
        const newPassword = document.querySelector("#new_password").value;
        const newPasswordConfirmation = document.querySelector(
            "#new_password_confirmation"
        ).value;
        if (newPassword) {
            // Check if the new password and its confirmation match
            if (newPassword !== newPasswordConfirmation) {
                alert("The new password confirmation does not match.");
                return;
            }
            const passwordInput = document.createElement("input");
            passwordInput.type = "hidden";
            passwordInput.name = "password";
            passwordInput.value = newPassword;
            document.querySelector("form").appendChild(passwordInput);
        }

        // Hide input fields and show span fields
        document
            .querySelectorAll(".card-text > input")
            .forEach(function (input) {
                input.style.display = "none";
            });
        document.querySelectorAll(".card-text > span").forEach(function (span) {
            span.style.display = "inline";
        });
        document.querySelector(".new-password-section").style.display = "none";

        // Hide save button and show edit button
        document.querySelector(".save-btn").style.display = "none";
        document.querySelector(".edit-btn").style.display = "block";

        // Submit the form
        if (
            document.querySelector(".new-password-section").style.display ===
            "block"
        ) {
            document.querySelector("form").submit();
        }
    });
});
