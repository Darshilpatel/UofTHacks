<?php
if($_GET) {
   	$maxRecentRows = 5;
	$query = "SELECT name, title, text, date FROM user_posts ORDER BY date DESC LIMIT $maxRecentRows";

	

	// Create connection
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "user_info";
	$conn = mysqli_connect($servername, $username, $password, $dbname);

	// Check connection
	if (!$conn) {
	    die("Connection failed: " . mysqli_connect_error());
	}
	$result = mysqli_query($conn, $query);
	if($result){
		$myArray = array();
		while($row = $result->fetch_array(MYSQL_ASSOC)) {
			$myArray[] = $row;
		}
		echo json_encode($myArray);
	} else {
		echo "error" . $query . "<br>" . mysqli_error($conn);
	}
}


?>