<table border="1">
	<?php		
		// configuration
    	require_once("../includes/config.php");
		
		//$user = 'root';
		//$password = 'root';
		//$db = 'test';
		//$host = 'localhost';
		//$port = 8888;

		//$connect = mysqli_init();
		//$success = mysqli_real_connect($connect, $host, $user, $password, $db, $port);		
		
		//$query1 = "SELECT * FROM songlist WHERE Played = 0";
		//$result = $connect->query($query1) or die("Error in the consult.." . mysqli_error($connect));
		
		$result = makeQuery("SELECT * FROM songlist WHERE Played = 0");
		$result->data_seek(0);
		
	    print("<tr>");
	    print("<th>Song</th>");
	    print("<th>Length (Seconds)</th>");
	    print("<th>User</th>");
		print("<th>Played</th>");
		print("</tr>");		
		
		while ($row = $result->fetch_assoc()) {
		    print("<tr>");
            print("<td>" . $row["Name"] . "</td>");
            print("<td>" . $row["Length"] . "</td>");
            print("<td>" . $row["UserID"] . "</td>");
			print("<td>" . $row["Played"] . "</td>");			
            print("</tr>");		
		}
	?>
</table>