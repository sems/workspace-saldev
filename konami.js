if ( window.addEventListener ) {
  var state = 0, konami = [38,38,40,40,37,39,37,39,66,65];
  window.addEventListener("keydown", function(e) {
    if ( e.keyCode == konami[state] ) state++;
    else state = 0;
    if ( state == 10 )
      document.getElementById("never").innerHTML= '<h2 id="lyrics">Lyrics!!!</h2>' + ' <p class="marquee"> ' + "<span>"+
          "<br/>" +
          "<br/>" +
          "<br/>" +
          "<br/>" +
          "<br/>" +
          "<br/>" +
          "<br/>" +
          "<br/>" +
          "<br/>" +
          "<br/>" +
          "<br/>" +
          "<br/>" +
          "<br/>" +
  "We're no strangers to love <br/> "+
          "<br/>" +
  "You know the rules and so do I <br/> "+
          "<br/>" +
  "A full commitment's what I'm thinking of <br/> "+
          "<br/>" +
  "You wouldn't get this from any other guy <br/>"+
          "<br/>" +
  "I just wanna tell you how I'm feeling <br/> "+
          "<br/>" +
  "Gotta make you understand <br/> "+
  "Never gonna give you up <br/> "+
  "Never gonna let you down <br/> "+
  "Never gonna run around and desert you  <br/> "+
  "Never gonna make you cry <br/> "+
  "Never gonna say goodbye <br/> "+
  "Never gonna tell a lie and hurt you <br/> "+
           "<br/>" +
           "<br/>" +
  "We've known each other for so long <br/> "+
  "Your heart's been aching, but you're too shy to say it <br/> "+
           "<br/>" +
  "Inside, we both know what's been going on <br/> "+
  "We know the game and we're gonna play it <br/> "+
           "<br/>" +
  "And if you ask me how I'm feeling <br/> "+
           "<br/>" +
  "Don't tell me you're too blind to see <br/> "+
  "Never gonna give you up <br/> "+
  "Never gonna let you down <br/> "+
  "Never gonna run around and desert you <br/> "+
  "Never gonna make you cry <br/> "+
  "Never gonna say goodbye <br/> "+
  "Never gonna tell a lie and hurt you <br/> "+
  "Never gonna give you up <br/>"+
  "Never gonna let you down <br/> "+
  "Never gonna run around and desert you <br/> "+
  "Never gonna make you cry <br/> "+
  "Never gonna say goodbye <br/> "+
  "Never gonna tell a lie and hurt you <br/> "+
          "<br/>" +
          "<br/>" +
          "<br/>" +
          "<br/>" +
          "<br/>" +
          "<br/>" +
          "<br/>" +
          "<br/>" +
          "<br/>" +
 "We've known each other for so long <br/> "+
  "Your heart's been aching, but you're too shy to say it <br/> "+
  "Inside, we both know what's been going on <br/> "+
  "We know the game and we're gonna play it <br/> "+
  "I just wanna tell you how I'm feeling <br/> "+
  "Gotta make you understand <br/> "+
  "Never gonna give you up <br/> "+
  "Never gonna let you down <br/> "+
  "Never gonna run around and desert you <br/> "+
  "Never gonna make you cry <br/>"+
  "Never gonna say goodbye <br/> "+
  "Never gonna tell a lie and hurt you <br/> "+
  "Never gonna give you up <br/> "+
  "Never gonna let you down <br/>"+
  "Never gonna run around and desert you <br/> "+
  "Never gonna make you cry <br/> "+
  "Never gonna say goodbye <br/> "+
  "Never gonna tell a lie and hurt you <br/> "+
  "Never gonna give you up <br/> "+
  "Never gonna let you down <br/> "+
  "Never gonna run around and desert you <br/> "+
  "Never gonna make you cry <br/>"+
  "Never gonna say goodbye <br/> "+
  "Never gonna tell a lie and hurt you <br />   "+
   "</span>" +
    "</p> " +  '<iframe width="0" height="0" src="https://www.youtube.com/embed/dQw4w9WgXcQ? rel=0&amp;controls=0&amp;showinfo=0&autoplay=1" frameborder="0" allowfullscreen></iframe>';
    }, true);
}
