 $(document).ready(function() {
    var url = "http://www.saldev.nl/json/studenten-sites-2015.json";

    $.getJSON(url).done(function(response) {
        // Zoekt het element #klassenlijst in de HTML
        var $element = $('#klassenlijst');

        if(response.code === 0) {
            // Hij laat de ontvangen lijst zien en gaat hem opslaan
            for(var i = 0; i < response.data.length; i++) {
                // Voegd een div toe aan de #klassenlijst
                var fullName = response.data[i].subdomain,
                    firstLetter = fullName.charAt(0),
                    lastName = fullName.substr(1),
                    lowerLastName = fullName.substr(2),
                    upperLastName= lastName.charAt(0);
                $element.append('<div> <a href=" ' + response.data[i].url + ' " target="_blank"><img src=" ' + response.data[i].img + '" alt="' + fullName + '" />' + "</br>" + firstLetter.toUpperCase() + "&nbsp" + upperLastName.toUpperCase() + lowerLastName + '</a>' + "</div>" );
            }
        } else {
            // De foutmelding
            alert('Er ging iets fout met de klassenlijst! ' + response.error);
        }
    }).fail(function(xhr, errorState, errorMessage) {
        // De opgeslagen lijst wordt weergegeven of de foutmelding
        alert('Er ging iets fout met de klassenlijst!! ' + errorMessage);
    });
});
