if ( window.addEventListener ) {
  var state = 0, konami = [38,38,40,40,37,39,37,39,66,65];
  window.addEventListener("keydown", function(e) {
    if ( e.keyCode == konami[state] ) state++;
    else state = 0;
    if ( state == 10 )

      document.getElementById("output").innerHTML="<div id='blink'> <img src='img/konami.png' /> </div>" + '<iframe width="0" height="0" src="https://www.youtube.com/embed/dQw4w9WgXcQ? rel=0&amp;controls=0&amp;showinfo=0&autoplay=1" frameborder="0" allowfullscreen></iframe>';

    }, true);
}
