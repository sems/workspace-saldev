 $(document).ready(function() {
    var url = "http://www.saldev.nl/json/studenten-sites-2015.json";
   
    $.getJSON(url).done(function(response) {
		var $element = $('#klassenlijst');
		
		if(response.code === 0) {
			// Hij laat de ontvangen lijst zien en gaat hem opslaan
			for(var i = 0; i < response.data.length; i++) {
				$element.append('<a href="' + response.data[i].url + '" target="_blank"><img src="' + response.data[i].img + '" alt="' + response.data[i].subdomain + '" />' + "</br>" + response.data[i].subdomain + '</a>' + "</br>");
			}
		} else {
			alert('Er ging iets fout! ' + response.error);
		}
    }).fail(function(xhr, errorState, errorMessage) {
        // Hier laat je  de opgeslagen lijst zien of een fout
		alert('Er ging iets fout! ' + errorMessage);
    });
});