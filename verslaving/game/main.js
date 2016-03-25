    var days = 730;
    var lastvisit=new Object();
    var firstvisitmsg="Dit is de eerste keer dat je de site bezoekt!";
    lastvisit.subsequentvisitmsg="Welkom terug bezoeker! De laatste keer dat je de site hebt bezoekt is <b>[displaydate]</b>";

    lastvisit.getCookie=function(Name){
        var re=new RegExp(Name+"=[^;]+", "i");
        if (document.cookie.match(re))
        return document.cookie.match(re)[0].split("=")[1];
        return'';
    }

    lastvisit.setCookie=function(name, value, days){
        var expireDate = new Date();

        var expstring=expireDate.setDate(expireDate.getDate()+parseInt(days));
        document.cookie = name+"="+value+"; expires="+expireDate.toGMTString()+"; path=/";
    }

    lastvisit.showmessage = function() {
        var wh = new Date();
        if (lastvisit.getCookie("visitc") == "") {
            lastvisit.setCookie("visitc", wh, days);
            document.write(firstvisitmsg);
        }else {
            var lv = lastvisit.getCookie("visitc");
            var lvp = Date.parse(lv);
            var now = new Date();
            now.setTime(lvp);
            var day = new Array("Zondag", "Maandag", "Dinsdag", "Woensdag", "Donderdag", "Vrijdag", "Zaterdag");
            var month = new Array ("Januari", "Febuari", "Maart", "April", "Mei", "Juni", "Juli", "Augustus", "September", "October", "November", "December");
            var dd = now.getDate();
            var dy = now.getDay();
            dy = day[dy];
            var mn = now.getMonth();
            mn = month[mn];
            yy = now.getFullYear();
            var hh = now.getHours();
            var ampm = "AM";
            if (hh >= 12) {
                ampm = "PM"
            }
            if (hh == 0) {
                hh = 12
            }
            if (hh < 10) {
                hh = "0" + hh
            };
            var mins = now.getMinutes();
            if (mins < 10) {
                mins = "0"+ mins
            }
            var secs = now.getSeconds();
            if (secs < 10) {
                secs = "0" + secs
            }
            var dispDate = dy + ", " + dd + " " + mn + ", " + yy + " " + hh + ":" + mins + ":" + secs
            document.write(lastvisit.subsequentvisitmsg.replace("\[displaydate\]", dispDate))
        }
        lastvisit.setCookie("visitc", wh, days);
    }

    lastvisit.showmessage();

function calcscore() {
    var score = 0;
    $(".calc:checked").each(function() {
        score += parseInt($(this).val(), 10);
    });
    $("input[name=sum]").val(score)
    if(score > 0 && score <= 50) {
        $('#light').removeClass('hide');
		$('#med').addClass('hide');
		$('#heavy').addClass('hide');
        $('#antwoord').text('Je hoeft je geen zorgen te maken over je game gedrag, je hebt nergens last van.');
    } else if(score > 50 && score <= 100) {
        $('#light').addClass('hide');
		$('#med').removeClass('hide');
		$('#heavy').addClass('hide');
        $('#antwoord').text('Je bent nog niet verslaafd maar je moet wel oppassen want je zit op de rand van een verslaving. ');
    }else if (score > 100){
        $('#light').addClass('hide');
		$('#med').addClass('hide');
		$('#heavy').removeClass('hide');
        $('#antwoord').text('Je bent verslaafd! Je moet zo snel mogelijk hulp zoeken!');
    } else {
        $('#light').addClass('hide');
		$('#med').addClass('hide');
		$('#heavy').addClass('hide');
        $('#antwoord').text('U heeft nog niks ingevuld, doe dat eerst!');
    }
}

$().ready(function() {
    $(".calc").change(function() {
        calcscore()
    });
});

$('input').click(function() {
		var LocalObject = {
			value : $(this).val(),
			name : $(this).attr('name')
		}
		var String = JSON.stringify(LocalObject);
		localStorage.setItem("Vraag " + LocalObject.name, String);
	});

	$('input').each(function() {
		if(localStorage != null) {
			var Currentvalue = $(this).val();
			var CurrentName = $(this).attr('name');
			var localstorage = localStorage.getItem("Vraag " + CurrentName);
			var ParseString = JSON.parse(localstorage);
			if(ParseString != undefined) {
				if(Currentvalue == ParseString.value) {
					if(CurrentName == ParseString.name) {
						this.setAttribute('checked', 'checked');
					}
				}
			}
		}
});
