document.addEventListener("DOMContentLoaded", function () {
    const makeDropdown = document.getElementById("make");
    const makeURL =
        "https://public.opendatasoft.com/api/records/1.0/search/?dataset=all-vehicles-model&facet=make&rows=0";
    fetch(makeURL)
        .then((response) => response.json())
        .then((data) => {
            data["facet_groups"][0]["facets"].forEach(function (value) {
                const option = document.createElement("option");
                option.text = value["name"];
                option.value = value["name"];
                makeDropdown.add(option);
            });
        });

    const modelDropdown = document.getElementById("model");
    const modelURL =
        "https://public.opendatasoft.com/api/records/1.0/search/?dataset=all-vehicles-model&facet=model&rows=0";
    fetch(modelURL)
        .then((response) => response.json())
        .then((data) => {
            data["facet_groups"][0]["facets"].forEach(function (value) {
                const option = document.createElement("option");
                option.text = value["name"];
                option.value = value["name"];
                modelDropdown.add(option);
            });
        });

    const fromYearDropdown = document.getElementById("from_year");
    const tillYearDropdown = document.getElementById("till_year");
    const yearURL =
        "https://public.opendatasoft.com/api/records/1.0/search/?dataset=all-vehicles-model&facet=year&rows=0";
    fetch(yearURL)
        .then((response) => response.json())
        .then((data) => {
            data["facet_groups"][0]["facets"].forEach(function (value) {
                const option = document.createElement("option");
                option.text = value["name"];
                option.value = value["name"];
                fromYearDropdown.add(option);
                tillYearDropdown.add(option.cloneNode(true));
            });
        });

    const engineDropdown = document.getElementById("engine");
    const engineURL =
        "https://public.opendatasoft.com/api/records/1.0/search/?dataset=all-vehicles-model&facet=eng_dscr&rows=0";
    fetch(engineURL)
        .then((response) => response.json())
        .then((data) => {
            data["facet_groups"][0]["facets"].forEach(function (value) {
                const option = document.createElement("option");
                option.text = value["name"];
                option.value = value["name"];
                engineDropdown.add(option);
            });
        });

    const transmissionDropdown = document.getElementById("transmission");
    const transmissionURL =
        "https://public.opendatasoft.com/api/records/1.0/search/?dataset=all-vehicles-model&facet=trany&rows=0";
    fetch(transmissionURL)
        .then((response) => response.json())
        .then((data) => {
            data["facet_groups"][0]["facets"].forEach(function (value) {
                const option = document.createElement("option");
                option.text = value["name"];
                option.value = value["name"];
                transmissionDropdown.add(option);
            });
        });

    const cylindersDropdown = document.getElementById("cylinders");
    const cylindersURL =
        "https://public.opendatasoft.com/api/records/1.0/search/?dataset=all-vehicles-model&facet=cylinders&rows=0";
    fetch(cylindersURL)
        .then((response) => response.json())
        .then((data) => {
            data["facet_groups"][0]["facets"].forEach(function (value) {
                const option = document.createElement("option");
                option.text = value["name"];
                option.value = value["name"];
                cylindersDropdown.add(option);
            });
        });

    const driveDropdown = document.getElementById("drive");
    const driveURL =
        "https://public.opendatasoft.com/api/records/1.0/search/?dataset=all-vehicles-model&facet=drive&rows=0";
    fetch(driveURL)
        .then((response) => response.json())
        .then((data) => {
            data["facet_groups"][0]["facets"].forEach(function (value) {
                const option = document.createElement("option");
                option.text = value["name"];
                option.value = value["name"];
                driveDropdown.add(option);
            });
        });
});
