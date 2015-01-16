var songNum = -1;
 
// This code loads the IFrame Player API code asynchronously.
var tag = document.createElement('script');
tag.src = "https://www.youtube.com/iframe_api";
var firstScriptTag = document.getElementsByTagName('script')[0];
firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

// This function creates an <iframe> (and YouTube player)
// after the API code downloads.
var player;
function onYouTubeIframeAPIReady() {
	player = new YT.Player('player', {
    	height: '390',
      	width: '640',
      	videoId: '_VPKfacgXao',
      	events: {
        'onReady': onPlayerReady,
        'onStateChange': onPlayerStateChange
      	}
	});
}

// The API will call this function when the video player is ready.
function onPlayerReady(event) {
    event.target.playVideo();
}

// The API calls this function when the player's state changes.
function onPlayerStateChange(event) {
	if (event.data == YT.PlayerState.ENDED) {	          		          	
		nextVid();   	    	
    }
}

function nextVid(){
	songNum++;	          	
  	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
    		 if (xmlhttp.responseText == "")
    		 {
    		 	alert('Reached end of playlist.');
    		 }
    		 else
    		 {
    		 	player.loadVideoById(xmlhttp.responseText);
    		 }
    		 updateTable();
		}
	};
	xmlhttp.open("POST", "nextVid.php?q=" + songNum, true);
	xmlhttp.send();	
}

function updateTable(){
	var xmlhttp2 = new XMLHttpRequest();
	xmlhttp2.onreadystatechange = function() {
		if (xmlhttp2.readyState == 4 && xmlhttp2.status == 200) {
    		 document.getElementById("submission").innerHTML = xmlhttp2.responseText;               		 	 
		}
	};
	xmlhttp2.open("POST", "tableUpdate.php", true);
    xmlhttp2.send();
}
        		      
