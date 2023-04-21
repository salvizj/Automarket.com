function previewImage() {
    var preview = document.querySelector('#preview');
    var file = document.querySelector('input[type=file]').files[0];
    var reader = new FileReader();

    reader.addEventListener("load", function () {
    preview.src = reader.result;
    preview.style.display = "block";
    }, false);

    if (file) {
    reader.readAsDataURL(file);
    }
}