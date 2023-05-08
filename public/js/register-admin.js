document.querySelector("#role").addEventListener("change", function () {
    const adminPassword = document.querySelector("#admin-password");
    if (this.value === "admin") {
        adminPassword.style.display = "block";
    } else {
        adminPassword.style.display = "none";
    }
});
