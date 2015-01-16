	<?php
		
		// configuration
    	require("../includes/config.php");
		
		// $user = 'root';
		// $password = 'root';
		// $db = 'test';
		// $host = 'localhost';
		// $port = 8888;
// 	
		// $connect = mysqli_init();
		// $success = mysqli_real_connect($connect, $host, $user, $password, $db, $port);				
		
		if (!empty($_REQUEST["q"]))
		{
			$url = 	$_REQUEST["q"];
			
	
	        // function to parse a video <entry>
	        function parseVideoEntry($entry) {      
	          $obj= new stdClass;
	
	          // get nodes in media: namespace for media information
	          $media = $entry->children('http://search.yahoo.com/mrss/');
	          $obj->title = $media->group->title;
	          $obj->description = $media->group->description;
	
	
	
	          // get <yt:duration> node for video length
	          $yt = $media->children('http://gdata.youtube.com/schemas/2007');
	          $attrs = $yt->duration->attributes();
	          $obj->length = $attrs['seconds']; 
	
	
	          // return object to caller  
	          return $obj;      
	        } 
			
			$v = htmlspecialchars(substr(strrchr($url, "="), 1));
			$post = "\"" . $v . "\"";	
		
			// set video data feed URL
	        $feedURL = 'http://gdata.youtube.com/feeds/api/videos/' . $v;
	
	        // read feed into SimpleXML object
	        $entry = simplexml_load_file($feedURL);
	
	        // parse video entry
	        $video = parseVideoEntry($entry);
	    	//echo "<p>{$video->title}</p>";
			
			$title =  "\"" . $video->title . "\"";			
	    	//echo "<p>".sprintf("%0.2f", $video->length/60) . " min. </p>";			
			
			$length = $video->length;
		
		
			//$query0 = "INSERT INTO songlist VALUES($title, $post, $length, 62, 0)";
			//$result = $connect->query($query0) or die("Error in the pooper.." . mysqli_error($connect));
			
			makeQuery("INSERT INTO songlist VALUES($title, $post, $length, 62, 0)");	
		}
	
		include 'tableUpdate.php';
	?>
