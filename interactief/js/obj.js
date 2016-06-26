var background = {
	x: 0,
	y: 0,
	width: 1000,
	height: 500,
	color: "#44c9dd",
	draw: function() {
		var ctx = document.getElementById("portfolio").getContext('2d');
		ctx.fillStyle = this.color;
        ctx.fillRect(this.x, this.y, this.width, this.height);
	}
}

var ground = {
	x: 0,
	y: 0,
	maincolor: "#000",
	draw: function() {

		var ctx = document.getElementById("portfolio").getContext('2d');
		ctx.fillStyle = this.maincolor;
        ctx.fillRect(this.x, this.y, 40, 40);
	}
}

var grass = {
	x: 0,
	y: 0,
	color: "#b1224c",
	draw: function() {
		var ctx = document.getElementById("portfolio").getContext('2d');
		ctx.fillStyle = this.color;
        ctx.fillRect(this.x, this.y, 40, 5);
	}
}

var ball = {
	x: 0,
	y: 0,
	draw: function(){
		var ctx = document.getElementById("portfolio").getContext('2d');
      	var centerX = canvas.width / 2;
      	var centerY = canvas.height / 2;
      	var radius = 70;

      	ctx.beginPath();
      	ctx.arc(centerX, centerY, radius, 0, 2 * Math.PI, false);
      	ctx.fillStyle = '#b1224c';
      	ctx.fill();
      	ctx.lineWidth = 5;
      	ctx.strokeStyle = '#003300';
      	ctx.stroke();
	}
}

var player = {
    x: 800,
    y: 420,
    name: "not defined",
    jumping: false,
    draw: function() {
        var ctx = document.getElementById("portfolio").getContext('2d');
        if(this.jumping === false) {
            
            ctx.fillStyle = "#000";
            ctx.font="20px Arial";
            ctx.fillText(this.name, 400, this.y - 50);

            var img = document.getElementById("source");
            ctx.drawImage(img, 400 , this.y - 45);
        } else {
            // image not drawn yet
            ctx.fillStyle = "#f00";
            ctx.fillRect(this.x, this.y, 40, 40);
        }
    }
}

