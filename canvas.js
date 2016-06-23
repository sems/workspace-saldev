function isCanvasSupported(){
    var elem = document.createElement('canvas');
    return !!(elem.getContext && elem.getContext('2d'));
}

// requestAnimationFrame polyfill
window.requestAnimFrame = (function() {
    return window.requestAnimationFrame  ||
        window.webkitRequestAnimationFrame ||
        window.mozRequestAnimationFrame    ||
        window.oRequestAnimationFrame      ||
        window.msRequestAnimationFrame     ||
        function(callback) {
            window.setTimeout(callback, 1000 / 16);
        };
})(); 

// "Klasse" Bal en constructor
function Bal(x, y, r, maxWidth) {
    this.x      = x;
    this.y      = y;
    this.r      = r;
    this.vx     = 5;
    this.vy     = 3;
    this.max    = maxWidth;
}

// Methode step in "klasse" Bal
Bal.prototype.step = function() {
    this.x += this.vx;
    if(this.x >= this.max - this.r || this.x < this.r) {
        this.vx *= -1;
    }
    
    this.y += this.vy;
    if(this.y >= this.max - this.r || this.y < this.r) {
        this.vy *= -1;
    }
};

// Methode draw in "klasse" Bal
Bal.prototype.draw = function(context) {
    context.fillStyle = "#be00be";
    context.beginPath();

    context.arc(this.x, this.y, this.r, 0, 2 * Math.PI, false);
    context.fill();
    
    context.closePath();
};



// Wachten op de DOM
window.addEventListener("load", function() {
    if(!isCanvasSupported()) {
        alert("Oh noes!! Canvas is not supported in your crappy old browser...");
        return;
    }
    
    // #my-canvas zoeken.
    var canvas  = document.getElementById("my-canvas"),
        context = canvas.getContext('2d');
    /*
        canvas.width = 400;
        canvas.height = 400;
    */
    
    // Stel vul kleur in
    context.fillStyle = "#00be00";
    
    // Teken een rechthoek
    context.fillRect(50, 50, 150, 200);
    
    // Stel lijnkleur in
    context.strokeStyle = "#000000";
    
    // Omlijn een rechthoek
    context.strokeRect(50, 50, 150, 200);
    
    // Verwijder een rechthoek
    context.clearRect(75, 75, 40, 40);
    
    // Stel lijnkleur in
    context.strokeStyle = "#0000ff";
    
    // Stel vulkleur in 
    context.fillStyle = "#be0000";
    
    // Begin een nieuw pad
    context.beginPath();
    
    // Bepaal begin van lijn
    context.moveTo(300, 200);
    context.lineTo(350, 200); // teken lijn naar
    context.lineTo(300, 250); // teken lijn naar
    context.lineTo(300, 200); // teken lijn naar
    
    // Teken lijn
    context.fill();
    context.stroke();
    
    // Sluit een pad
    context.closePath();
    
    context.fillStyle = "rgba(255, 120, 40, 0.5)";
    
    context.beginPath();
    
    context.rect(10, 10, 250, 250);
    
    context.fill();
    context.closePath();
    
    context.fillStyle = "pink";
    context.strokeStyle = "#000000";
    context.beginPath();
    
    context.arc(200, 200, 15, 0, 2 * Math.PI, false);
    context.fill();
    context.stroke();
    context.closePath();
    
    
    animation();
});













