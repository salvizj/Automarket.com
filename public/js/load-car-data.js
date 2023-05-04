$(document).ready(function () {
    // Populate car makes dropdown
    var makeDropdown = $("#make");
    var makeURL =
        "https://public.opendatasoft.com/api/records/1.0/search/?dataset=all-vehicles-model&facet=make&rows=0";
    $.getJSON(makeURL, function (data) {
        $.each(data["facet_groups"][0]["facets"], function (index, value) {
            makeDropdown.append(
                $("<option>").text(value["name"]).attr("value", value["name"])
            );
        });
    });

    var modelDropdown = $("#model");
    $("#make").change(function () {
        var selectedMake = $(this).children("option:selected").val();
        var modelURL =
            "https://public.opendatasoft.com/api/records/1.0/search/?dataset=all-vehicles-model&facet=model&refine.make=" +
            selectedMake +
            "&refine.fuel_type=E&rows=0"; // Add filter for electric cars
        $.getJSON(modelURL, function (data) {
            modelDropdown.empty();
            modelDropdown.append(
                $("<option>").text("--Select Model--").attr("value", "")
            );
            $.each(data["facet_groups"][0]["facets"], function (index, value) {
                modelDropdown.append(
                    $("<option>")
                        .text(value["name"])
                        .attr("value", value["name"])
                );
            });
        });
    });

    var yearDropdown = $("#year");
    $("#model").change(function () {
        var selectedMake = $("#make").children("option:selected").val();
        var selectedModel = $(this).children("option:selected").val();
        var yearURL =
            "https://public.opendatasoft.com/api/records/1.0/search/?dataset=all-vehicles-model&facet=year&refine.make=" +
            selectedMake +
            "&refine.model=" +
            selectedModel +
            "&rows=0";
        $.getJSON(yearURL, function (data) {
            yearDropdown.empty();
            yearDropdown.append(
                $("<option>").text("--Select Year--").attr("value", "")
            );
            $.each(data["facet_groups"][0]["facets"], function (index, value) {
                yearDropdown.append(
                    $("<option>")
                        .text(value["name"])
                        .attr("value", value["name"])
                );
            });
        });
    });
    var engineDropdown = $("#engine");
    $("#year").change(function () {
        var selectedMake = $("#make").children("option:selected").val();
        var selectedModel = $("#model").children("option:selected").val();
        var selectedYear = $(this).children("option:selected").val();
        var engineURL =
            "https://public.opendatasoft.com/api/records/1.0/search/?dataset=all-vehicles-model&facet=eng_dscr&refine.make=" +
            selectedMake +
            "&refine.model=" +
            selectedModel +
            "&refine.year=" +
            selectedYear +
            "&rows=0";
        $.getJSON(engineURL, function (data) {
            engineDropdown.empty();
            engineDropdown.append(
                $("<option>")
                    .text("--Select Engine Displacement--")
                    .attr("value", "")
            );
            $.each(data["facet_groups"][0]["facets"], function (index, value) {
                engineDropdown.append(
                    $("<option>")
                        .text(value["name"])
                        .attr("value", value["name"])
                );
            });
        });
    });

    var transmissionDropdown = $("#transmission");
    $("#engine").change(function () {
        var selectedMake = $("#make").children("option:selected").val();
        var selectedModel = $("#model").children("option:selected").val();
        var selectedYear = $("#year").children("option:selected").val();
        var transmissionURL =
            "https://public.opendatasoft.com/api/records/1.0/search/?dataset=all-vehicles-model&facet=trany&refine.make=" +
            selectedMake +
            "&refine.model=" +
            selectedModel +
            "&refine.year=" +
            selectedYear +
            "&rows=0";
        $.getJSON(transmissionURL, function (data) {
            transmissionDropdown.empty();
            transmissionDropdown.append(
                $("<option>").text("--Select Transmission--").attr("value", "")
            );
            $.each(data["facet_groups"][0]["facets"], function (index, value) {
                transmissionDropdown.append(
                    $("<option>")
                        .text(value["name"])
                        .attr("value", value["name"])
                );
            });
        });
    });

    var cylinderDropdown = $("#cylinders");
    $("#transmission").change(function () {
        var selectedMake = $("#make").children("option:selected").val();
        var selectedModel = $("#model").children("option:selected").val();
        var selectedEngine = $("#engine").children("option:selected").val();
        var cylinderURL =
            "https://public.opendatasoft.com/api/records/1.0/search/?dataset=all-vehicles-model&facet=cylinders&refine.make=" +
            selectedMake +
            "&refine.model=" +
            selectedModel +
            "&refine.eng_dscr=" +
            selectedEngine +
            "&rows=0";
        $.getJSON(cylinderURL, function (data) {
            cylinderDropdown.empty();
            cylinderDropdown.append(
                $("<option>")
                    .text("--Select Number of Cylinders--")
                    .attr("value", "")
            );
            $.each(data["facet_groups"][0]["facets"], function (index, value) {
                cylinderDropdown.append(
                    $("<option>")
                        .text(value["name"])
                        .attr("value", value["name"])
                );
            });
        });
    });

    var driveDropdown = $("#drive");
    $("#cylinders").change(function () {
        var selectedMake = $("#make").children("option:selected").val();
        var selectedModel = $("#model").children("option:selected").val();
        var selectedYear = $("#year").children("option:selected").val();
        var selectedEngine = $("#engine").children("option:selected").val();
        var selectedTransmission = $("#transmission").children("option:selected").val();
        var selectedCylinders = $(this).children("option:selected").val();
        console.log(selectedCylinders);

        var driveURL =
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
        $.getJSON(driveURL, function (data) {
            driveDropdown.empty();
            driveDropdown.append(
                $("<option>").text("--Select Drive Type--").attr("value", "")
            );
            $.each(data["facet_groups"][0]["facets"], function (index, value) {
                driveDropdown.append(
                    $("<option>")
                        .text(value["name"])
                        .attr("value", value["name"])
                );
            });
        });
    });
});
