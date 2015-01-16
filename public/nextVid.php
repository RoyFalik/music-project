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
	
	
	$current = 0;
	if (!empty($_REQUEST['q']))
	{
		$current = $_REQUEST['q'];
	}
	
	//$query1 = "SELECT * FROM songlist";
	//$result = $connect->query($query1) or die("Error in the consult.." . mysqli_error($connect));
	
	$result = makeQuery("SELECT * FROM songlist");
	$result->data_seek(0);
	
	for ($x = 0; $x < $current; $x++)
	{
		$result->fetch_assoc();
	}
	
	$row = $result->fetch_assoc();
		$v = $row['URL'];	
		

	//$query2 = "UPDATE songlist SET Played = 1 WHERE URL = '$v'";
	//$result2 = $connect->query($query2) or die("Error in the consult.." . mysqli_error($connect));
	
	$result2 = makeQuery("UPDATE songlist SET Played = 1 WHERE URL = '$v'");
		
	echo $v;
		
?>
