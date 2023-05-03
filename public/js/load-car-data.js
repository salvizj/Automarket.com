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
    // Populate car models dropdown based on selected make
    $("#make").change(function () {
        var selectedMake = $(this).children("option:selected").val();
        var modelDropdown = $("#model");
        modelDropdown.empty();
        modelDropdown.append(
            $("<option>").text("Select a model").attr("value", "")
        );
        var modelURL =
            "https://public.opendatasoft.com/api/records/1.0/search/?dataset=all-vehicles-model&facet=model&q=make:" +
            selectedMake;
        $.getJSON(modelURL, function (data) {
            $.each(data["facet_groups"][0]["facets"], function (index, value) {
                modelDropdown.append(
                    $("<option>")
                        .text(value["name"])
                        .attr("value", value["name"])
                );
            });
        });
    });
    // Populate engine types dropdown based on selected model
    $("#model").change(function () {
        var selectedModel = $(this).children("option:selected").val();
        var engineDropdown = $("#engine");
        engineDropdown.empty();
        engineDropdown.append(
            $("<option>").text("Select an engine type").attr("value", "")
        );
        var engineURL =
            "https://public.opendatasoft.com/api/records/1.0/search/?dataset=all-vehicles-model&facet=eng_dscr&q=model:" +
            selectedModel;
        $.getJSON(engineURL, function (data) {
            $.each(data["facet_groups"][0]["facets"], function (index, value) {
                engineDropdown.append(
                    $("<option>")
                        .text(value["name"])
                        .attr("value", value["name"])
                );
            });
        });
    });
    // Populate transmission types dropdown based on selected model
    $("#model").change(function () {
        var selectedModel = $(this).children("option:selected").val();
        var transmissionDropdown = $("#transmission");
        transmissionDropdown.empty();
        transmissionDropdown.append(
            $("<option>").text("Select a transmission type").attr("value", "")
        );
        var transmissionURL =
            "https://public.opendatasoft.com/api/records/1.0/search/?dataset=all-vehicles-model&facet=trany&q=model:" +
            selectedModel;
        $.getJSON(transmissionURL, function (data) {
            $.each(data["facet_groups"][0]["facets"], function (index, value) {
                transmissionDropdown.append(
                    $("<option>")
                        .text(value["name"])
                        .attr("value", value["name"])
                );
            });
        });
    });
    // Populate years dropdown
    const yearSelect = $("#year");
    const currentYear = new Date().getFullYear();

    for (let i = 1960; i <= currentYear; i++) {
        yearSelect.append(`<option value="${i}">${i}</option>`);
    }
});
