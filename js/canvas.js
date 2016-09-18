$(document).ready(function() {
    console.log("ready!");
    
    

    var canvas = document.getElementById("myCanvas"),
        context = canvas.getContext('2d'),

        // lengte
        dashLen = 120,
        dashOffset = dashLen,

        // snelheid
        speed = 20,

        // tekst
        txt = "Welkom bij KSGJ",

        // waar start de tekst
        x = 0, i = 0;
    context.font = "25px tahoma"; 

    // dikte van de lijnen
    context.lineWidth = 2; 

   

    // doorzichtigheid van de tekst
    context.globalAlpha = 5/6;

    // de kleur en hoe die geschreven wordt
    context.strokeStyle = context.fillStyle = "#f25b26";
     (function loop() {
      // rondingen bij de tekst
      context.clearRect(x, 0, 60, 150);

      // lijnkleur lengte en snelheid
      context.setLineDash([dashLen - dashOffset, dashOffset - speed]);

      // lengte van het woord
      dashOffset -= speed;

      // hoogte en lengte
      context.strokeText(txt[i], x, 30);

      // klaar of niet
      if (dashOffset > 0) requestAnimationFrame(loop);
      else {

        // hoogte en lengte
        context.fillText(txt[i], x, 30);

        // reset de lengte
        dashOffset = dashLen;

        // de tekst lengte en de kleur
        x += context.measureText(txt[i++]).width + context.lineWidth * Math.random();

        
        // de tekst en lengte, hij roept de animatie aan
        if (i < txt.length) requestAnimationFrame(loop);
      }
    })();  
      
});