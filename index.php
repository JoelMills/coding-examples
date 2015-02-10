<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title>Coding Example</title>	
	
	<script src="//code.jquery.com/jquery-1.11.2.min.js"></script><!-- JQUERY INCLUDE -->
	<script src="//use.typekit.net/ryv1oui.js"></script>
	<script>try{Typekit.load();}catch(e){}</script>
	
	
	
	<style>
		html, body {
			margin:0px;
			padding:0px;
		}
	
		#vidWrap {
			
			position:absolute;
			top: -50px;
			left:50%;
			margin-left:-320px;
		}
		
	
		#displayTranscript {			
			position:absolute;
			width:100%;
			top:50%;
			text-align:center;
			z-index: 999999;
			/*background:rgba(255,255,255,0.5);*/
			padding:10px 0;
			margin:0 auto;
			font-size:2.8rem;
			font-weight:bold;
			font-family: "aktiv-grotesk-std";			
			background:url('gradientBG.jpg');
			-webkit-text-fill-color: transparent;
			-webkit-background-clip: text;
			font-smooth:always;
			-webkit-font-smoothing: antialiased;
			-webkit-animation-name: masked-animation;
			-webkit-animation-duration: 10s;
			-webkit-animation-iteration-count: infinite;
			-webkit-animation-timing-function: linear;
		}
		
		@-webkit-keyframes masked-animation {
			0% {background-position: left bottom;}
			100% {background-position: right bottom;}
		}
		</style>
	
	
</head>
<body>
	<div id="vidWrap">		
			<div id="displayTranscript"></div>
		
		<!-- Video -->
		<video id="videoToTranscribe" width="640" height="480" controls>
			<source src="delmonte.mp4" type="video/mp4"></source>			
		</video>
	<!-- End Video -->
	</div>
	
	
	<div id="displayTime"></div>
	
	
	<!-- Video Related Scripts -->
	<script>
	
		// Get our video element
		var vidToTranscribe = document.getElementById("videoToTranscribe");
		
		
		var transcriptData = '{"transcript":[' + 
							 '{"time":"10","script":"If I was a flower"},' +
							 '{"time":"11","script":"Growing wild and free"},' +
							 '{"time":"13","script":"All I\'d want is you to be"},' +
							 '{"time":"14","script":"My sweet honey bee"},' +
							 '{"time":"15","script":"And if I was a tree"},' +
							 '{"time":"16","script":"Growing Tall and green"},' +
							 '{"time":"18","script":"All I\'d want is you to shade me"},' +
							 '{"time":"19","script":"And be my leaves"}]}';
			
		var transcript = JSON.parse(transcriptData);
							 
		var scripts = {};
		
		// Loop Through Parsed JSON object and write all data to dictionary
		for(var i = 0, script; i < transcript.transcript.length; i++){
			//console.log("Found "+(i+1));
			script = transcript.transcript[i];
			scripts[script.time] = script;
		}
		
		
		// Variable To Hold Current Video Time
		var currentTime;
		
		function doTranscribe() {
			
			// Current Time To String
			var ctts = Math.round(currentTime).toString();
			
			// Search Dictionary For Time (Second) Based On Current Video Time (In Rounded Seconds)
			for(var t in scripts){
				
				// If Time Match, Do Magic.
				if(scripts[t].time === ctts){
					console.log(scripts[ctts].script);
					$('#displayTranscript').html(scripts[ctts].script);
				}
			}			
		}
		
		// Function to get current video time in seconds (rounded) and display to displayTime div
		function ourCurrentTime(){			
			currentTime = vidToTranscribe.currentTime;
			
			doTranscribe();
			
			document.getElementById("displayTime").innerHTML = Math.round(currentTime);
			setTimeout(ourCurrentTime, 500);
			
		}		
		
		ourCurrentTime();
		
	</script>
	<!-- End Video Related -->
	
</body>
</html>