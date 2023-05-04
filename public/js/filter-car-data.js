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
    var modelURL =
        "https://public.opendatasoft.com/api/records/1.0/search/?dataset=all-vehicles-model&facet=model&rows=0";
    $.getJSON(modelURL, function (data) {
        $.each(data["facet_groups"][0]["facets"], function (index, value) {
            modelDropdown.append(
                $("<option>").text(value["name"]).attr("value", value["name"])
            );
        });
    });
var fromYearDropdown = $("#from_year");
var tillYearDropdown = $("#till_year");
var yearURL =
    "https://public.opendatasoft.com/api/records/1.0/search/?dataset=all-vehicles-model&facet=year&rows=0";
$.getJSON(yearURL, function (data) {
    $.each(data["facet_groups"][0]["facets"], function (index, value) {
        fromYearDropdown.append(
            $("<option>").text(value["name"]).attr("value", value["name"])
        );
        tillYearDropdown.append(
            $("<option>").text(value["name"]).attr("value", value["name"])
        );
    });
});


    var engineDropdown = $("#engine");
    var engineURL =
        "https://public.opendatasoft.com/api/records/1.0/search/?dataset=all-vehicles-model&facet=eng_dscr&rows=0";
    $.getJSON(engineURL, function (data) {
        $.each(data["facet_groups"][0]["facets"], function (index, value) {
            engineDropdown.append(
                $("<option>").text(value["name"]).attr("value", value["name"])
            );
        });
    });
    var transmissionDropdown = $("#transmission");
    var transmissionURL =
        "https://public.opendatasoft.com/api/records/1.0/search/?dataset=all-vehicles-model&facet=trany&rows=0";
    $.getJSON(transmissionURL, function (data) {
        $.each(data["facet_groups"][0]["facets"], function (index, value) {
            transmissionDropdown.append(
                $("<option>").text(value["name"]).attr("value", value["name"])
            );
        });
    });
    var cylindersDropdown = $("#cylinders");
    var cylindersURL =
        "https://public.opendatasoft.com/api/records/1.0/search/?dataset=all-vehicles-model&facet=cylinders&rows=0";
    $.getJSON(cylindersURL, function (data) {
        $.each(data["facet_groups"][0]["facets"], function (index, value) {
            cylindersDropdown.append(
                $("<option>").text(value["name"]).attr("value", value["name"])
            );
        });
    });
    var driveDropdown = $("#drive");
    var driveURL =
        "https://public.opendatasoft.com/api/records/1.0/search/?dataset=all-vehicles-model&facet=drive&rows=0";
    $.getJSON(driveURL, function (data) {
        $.each(data["facet_groups"][0]["facets"], function (index, value) {
            driveDropdown.append(
                $("<option>").text(value["name"]).attr("value", value["name"])
            );
        });
    });
});
