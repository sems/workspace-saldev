$(document).ready(function() {
    var url = "http://www.saldev.nl/json/studenten-sites-2015.json";

    $.getJSON(url).done(function(response) {
        // Zoekt het element #klassenlijst in de HTML
        var $element = $('#klassenlijst');

        if(response.code === 0) {
            // Hij laat de ontvangen lijst zien en gaat hem opslaan
            var classList = result.data;
            for(var i = 0; i < response.data.length; i++) {
                // Voegd een div toe aan de #klassenlijst
                printClassList(classList, i);
                var backup = JSON.stringify(classList);
                localStorage.setItem("classList", backup);
            }
        } else {
            // De foutmelding
            alert('Er ging iets fout! ' + response.error);
        }
    }).fail(function(xhr, errorState, errorMessage) {
        // De opgeslagen lijst wordt weergegeven of de foutmelding
        alert('Er ging iets fout! ' + errorMessage);
    });
});
