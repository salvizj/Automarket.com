document.addEventListener("DOMContentLoaded", function () {
    // Populate car makes dropdown
    const makeDropdown = document.querySelector("#make");
    const makeURL =
        "https://public.opendatasoft.com/api/records/1.0/search/?dataset=all-vehicles-model&facet=make&rows=0";
    fetch(makeURL)
        .then(function (response) {
            return response.json();
        })
        .then(function (data) {
            data["facet_groups"][0]["facets"].forEach(function (value) {
                makeDropdown.appendChild(
                    new Option(value["name"], value["name"])
                );
            });
        });

    const modelDropdown = document.querySelector("#model");
    document.querySelector("#make").addEventListener("change", function () {
        const selectedMake = this.value;
        const modelURL =
            "https://public.opendatasoft.com/api/records/1.0/search/?dataset=all-vehicles-model&facet=model&refine.make=" +
            selectedMake +
            "&refine.fuel_type=E&rows=0"; // Add filter for electric cars
        fetch(modelURL)
            .then(function (response) {
                return response.json();
            })
            .then(function (data) {
                modelDropdown.innerHTML = "";
                modelDropdown.appendChild(new Option("--Select Model--", ""));
                data["facet_groups"][0]["facets"].forEach(function (value) {
                    modelDropdown.appendChild(
                        new Option(value["name"], value["name"])
                    );
                });
            });
    });

    const yearDropdown = document.querySelector("#year");
    document.querySelector("#model").addEventListener("change", function () {
        const selectedMake = document.querySelector("#make").value;
        const selectedModel = this.value;
        const yearURL =
            "https://public.opendatasoft.com/api/records/1.0/search/?dataset=all-vehicles-model&facet=year&refine.make=" +
            selectedMake +
            "&refine.model=" +
            selectedModel +
            "&rows=0";
        fetch(yearURL)
            .then(function (response) {
                return response.json();
            })
            .then(function (data) {
                yearDropdown.innerHTML = "";
                yearDropdown.appendChild(new Option("--Select Year--", ""));
                data["facet_groups"][0]["facets"].forEach(function (value) {
                    yearDropdown.appendChild(
                        new Option(value["name"], value["name"])
                    );
                });
            });
    });

    const engineDropdown = document.querySelector("#engine");

    document.querySelector("#year").addEventListener("change", function () {
        const selectedMake = document.querySelector("#make").value;
        const selectedModel = document.querySelector("#model").value;
        const selectedYear = this.value;
        const engineURL =
            "https://public.opendatasoft.com/api/records/1.0/search/?dataset=all-vehicles-model&facet=eng_dscr&refine.make=" +
            selectedMake +
            "&refine.model=" +
            selectedModel +
            "&refine.year=" +
            selectedYear +
            "&rows=0";
        fetch(engineURL)
            .then(function (response) {
                return response.json();
            })
            .then(function (data) {
                engineDropdown.innerHTML = "";
                engineDropdown.appendChild(
                    new Option("--Select Engine Displacement--", "")
                );
                data["facet_groups"][0]["facets"].forEach(function (value) {
                    const option = document.createElement("option");
                    option.value = value["name"];
                    option.text = value["name"];
                    engineDropdown.appendChild(option);
                });
            });
    });

    const transmissionDropdown = document.querySelector("#transmission");
    document.querySelector("#engine").addEventListener("change", function () {
        const selectedMake =
            document.querySelector("#make").children[
                document.querySelector("#make").selectedIndex
            ].value;
        const selectedModel =
            document.querySelector("#model").children[
                document.querySelector("#model").selectedIndex
            ].value;
        const selectedYear =
            document.querySelector("#year").children[
                document.querySelector("#year").selectedIndex
            ].value;
        const transmissionURL =
            "https://public.opendatasoft.com/api/records/1.0/search/?dataset=all-vehicles-model&facet=trany&refine.make=" +
            selectedMake +
            "&refine.model=" +
            selectedModel +
            "&refine.year=" +
            selectedYear +
            "&rows=0";
        fetch(transmissionURL)
            .then(function (response) {
                return response.json();
            })
            .then(function (data) {
                transmissionDropdown.innerHTML = "";
                transmissionDropdown.appendChild(
                    new Option("--Select Transmission--", "")
                );
                data["facet_groups"][0]["facets"].forEach(function (value) {
                    transmissionDropdown.appendChild(
                        new Option(value["name"], value["name"])
                    );
                });
            });
    });

    const cylinderDropdown = document.querySelector("#cylinders");
    document
        .querySelector("#transmission")
        .addEventListener("change", function () {
            const selectedMake = document.querySelector("#make").value;
            const selectedModel = document.querySelector("#model").value;
            const selectedEngine = document.querySelector("#engine").value;
            const cylinderURL =
                "https://public.opendatasoft.com/api/records/1.0/search/?dataset=all-vehicles-model&facet=cylinders&refine.make=" +
                selectedMake +
                "&refine.model=" +
                selectedModel +
                "&refine.eng_dscr=" +
                selectedEngine +
                "&rows=0";
            fetch(cylinderURL)
                .then(function (response) {
                    return response.json();
                })
                .then(function (data) {
                    cylinderDropdown.innerHTML = "";
                    cylinderDropdown.appendChild(
                        new Option("--Select Number of Cylinders--", "")
                    );
                    data["facet_groups"][0]["facets"].forEach(function (value) {
                        const option = document.createElement("option");
                        option.value = value["name"];
                        option.text = value["name"];
                        cylinderDropdown.appendChild(option);
                    });
                });
        });

    const driveDropdown = document.querySelector("#drive");
    document
        .querySelector("#cylinders")
        .addEventListener("change", function () {
            const selectedMake = document.querySelector("#make").value;
            const selectedModel = document.querySelector("#model").value;
            const selectedYear = document.querySelector("#year").value;
            const selectedEngine = document.querySelector("#engine").value;
            const selectedTransmission =
                document.querySelector("#transmission").value;
            const selectedCylinders = this.value;
            const driveURL =
                "https://public.opendatasoft.com/api/records/1.0/search/?dataset=all-vehicles-model&facet=drive&refine.make=" +
                selectedMake +
                "&refine.model=" +
                selectedModel +
                "&refine.year=" +
                selectedYear +
                "&refine.eng_dscr=" +
                selectedEngine +
                "&refine.trany=" +
                selectedTransmission +
                "&refine.cylinders=" +
                selectedCylinders +
                "&rows=0";
            fetch(driveURL)
                .then(function (response) {
                    return response.json();
                })
                .then(function (data) {
                    driveDropdown.innerHTML = "";
                    driveDropdown.appendChild(
                        new Option("--Select Drive Type--", "")
                    );
                    data["facet_groups"][0]["facets"].forEach(function (value) {
                        const option = document.createElement("option");
                        option.value = value["name"];
                        option.text = value["name"];
                        driveDropdown.appendChild(option);
                    });
                });
        });
});
