// config
var gameStart = false;
var name = undefined;
var jumping = false;
var jumpStart = 0;
var moveSpeed = 10; // lower is faster
var gravity = 0.3;
var aDown = false;
var dDown = false;
var wDown = false;
var maxFps = 60;
var mapHeight =  [20, 20, 20, 20, 20, 20, 20, 20, 20, 12, 10, 24, 2, 1, 1, 1, 1, 1, 2, 2, 3, 3, 4, 4, 2, 2, 2, 2, 3, 3, 3, 3, 4, 4, 0, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 4, 2, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1];
var renderDistance = 15;
var mapHeightPlayerPos = 420;
var otherPlayerarray;


// request animation
window.requestAnimFrame = (function(){
    return  window.requestAnimationFrame       || 
        window.webkitRequestAnimationFrame || 
        window.mozRequestAnimationFrame    || 
        window.oRequestAnimationFrame      || 
        window.msRequestAnimationFrame     || 
        function(/* function */ callback, /* DOMElement */ element){
            window.setTimeout(callback, 1000 / 60);
        };
    })();

window.onload = function() { 
    var themeSound = document.getElementById("themeSound");

    themeSound.volume=0.5;
    themeSound.play();
}

jQuery(function($) {
    $("#themeSound").prop('volume', 0.2);

    window.setVolume = function(themeSound,vol) {
        sounds[themeSound].volume = 0.33;
    }
});

$("document").ready(function() {
    // get canvas

    var jumpSound = document.getElementById("jump");

    var canvas = document.getElementById('portfolio');
    var context = canvas.getContext('2d');
    // Check if key down
    $(document).keydown(function(e){
        switch(e.keyCode){
            case 65: //left (a)
              aDown = true;
              break;

            case 68: //right (d)
              dDown = true;
              break;
                
            case 87: //up (w)
              if(player.y > (mapHeightPlayerPos - 5)) {
                wDown = true;
                
              }
                jumpSound.play();
              break;
        }
    });
    $(document).keyup(function(e){
        switch(e.keyCode){
            case 65: //left (a)
              aDown = false;
              break;

            case 68: //right (d)
              dDown = false;
              break;
                
            case 87: //up (w)
              wDown = false;
              break;
        }
    });
    
    // calculate player position
    setInterval(function(){
        p1 = Math.floor((player.x ) / 40) - 5;
        p2 = Math.ceil((player.x + 5) / 40) - 5;
        if(aDown) {
            if(465 - (mapHeight[p1] * 40) > player.y) {
                player.x -= 5;
                player.x = Math.round(player.x);
            }
        }
        if(dDown) {
            if(465 - (mapHeight[p2] * 40) > player.y) {
                player.x += 5
                player.x = Math.round(player.x);
            }
        }
        p1 = Math.floor((player.x + 5) / 40) - 5;
        p2 = Math.ceil(player.x / 40) - 5;
        mapHeightPlayerPos = 460 -  (Math.max(mapHeight[p1], mapHeight[p2]) * 40);
        // Let the player jump.
        if(wDown) {
            if(!jumping) {
                if(wDown) {

                    jumping = true;
                    jumpStart = 45;
                    jumpSound.play();
                }
            } else {
                if(jumpStart <= 0) {
                    
                    if(player.y < mapHeightPlayerPos) {
                        player.y += 5;
                    }
                } else {
                    jumpStart -= 2;
                    player.y -= jumpStart / 5;
                }
            }
        } else {
            if(player.y < mapHeightPlayerPos) {
                player.y += 5;

            } else {
                jumping = false;

            }
        }
    }, moveSpeed);
    
    
    function render() {
        background.draw();
        var groundpos = 0 - player.x % 40;
        for(var i = Math.floor((player.x / 40) - renderDistance) ; i < Math.floor((player.x / 40) + renderDistance); i++ ){
            var groundheight = 500;
            for(var k = 0; k < mapHeight[i]; k++ ) {
                groundheight -= 40;
                ground.x = groundpos;
                ground.y = groundheight;
                ground.draw();
            }
            grass.x = groundpos;
            grass.y = groundheight;
            grass.draw();
            groundpos += 40;
        }
        if(player.y > 450) {
            player.y = 420;
            player.x = 800;
        }
        player.draw();
    };
    function animloop(){
      requestAnimFrame(animloop);
      render();
    };
    
    $("#send_name").click(function(){
        player.name = $("#name_input").val();
        $(".nameSelect").css("display","none");
        animloop();
        gameStart = true
    });
});