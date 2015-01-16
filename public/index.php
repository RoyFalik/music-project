<!DOCTYPE html>
<html>
	<title>YOLO</title>
	<head>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
		    <script type="text/javascript">
		    $(document).ready(function() {
		    $.ajaxSetup({ cache: false }); // This part addresses an IE bug. without it, IE will only load the first number and will never refresh
		    $('#submission').load('tableUpdate.php');
		    $.getScript('youtubePlayer.js');
		    
		    });
		</script>
		<script>
			function reloadSub(url){
				var vidID = url.substr(url.lastIndexOf("=") + 1);
				if (vidID.length == 11 && ytVidId(url))
				{
					var xmlhttp = new XMLHttpRequest();
	        		xmlhttp.onreadystatechange = function() {
	           			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
	           			document.getElementById("formURL").value = "";
	                	document.getElementById("submission").innerHTML = xmlhttp.responseText;
	            		}
	        		};
	        		xmlhttp.open("POST", "submission.php?q=" + url, true);
	        		xmlhttp.send();
	        	}
	        	else
	        	{
	        		document.getElementById("formURL").value = "";
	        		alert("Please enter a valid URL");
	        	}
	        		
		    }
			
			// http://stackoverflow.com/questions/2964678/jquery-youtube-url-validation-with-regex/10315969#10315969
		   	function ytVidId(url) {
			  var p = /^(?:https?:\/\/)?(?:www\.)?(?:youtu\.be\/|youtube\.com\/(?:embed\/|v\/|watch\?v=|watch\?.+&v=))((\w|-){11})(?:\S+)?$/;
			  return (url.match(p)) ? true : false;
			}
		   
		</script>
	</head>
	<body>
		<p>github??????</p>
		<p> roy test</p>
		<form>
        		Youtube URL: <input name='URL' type="text" id="formURL"/>
				<button type="button" onclick=reloadSub(document.getElementById("formURL").value)>Submit URL</button>
		</form>

		<div id="player"></div>
		
		<div id="YTplayer"></div>
		
		<button type="button" onclick=nextVid()>Skip</button>
		
		<div id="submission"></div>
		
	</body>
</html>