<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Donkey Kong 3D</title>
		<link href="css/layout.css" rel="stylesheet" type="text/css"/>
		<script type="text/javascript" src="js/jquery.min.js"></script>
		<script type="text/javascript" src="js/obj.js"></script>
		<script type="text/javascript" src="js/main.js"></script>
	</head>
	<body>
	    <div class="nameSelect">
	        <div class="title">Enter Name</div>
	        	<input type="text" id="name_input"/>
	        <div id="send_name">Starten</div>
	    </div>
	    <div style="display:none;">
 			<img id="source" src="img/body.png" >
		</div>
		
		<audio id="jump" src="sound/jump.mp3" type="audio/mp3"> </audio>
		<audio loop id="themeSound" src="sound/theme.mp3" type="audio/mp3">  </audio>

		<canvas id="portfolio" width="1000px" height="500px" >
		U kunt deze site beter bezoeken met een goede browser</canvas>
	</body>
</html>