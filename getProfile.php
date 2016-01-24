<?php
$post_vars = "";
if ($_POST) {
    $kv = array();
    foreach ($_POST as $k => $v) {
        if (is_array($v)):
            $temp = array();
            foreach ($v as $v2) {
                $temp[] = $v2;
            }
            $kv[] = "$k=" . join("|", $temp);
        else:
            $kv[] = "$k=$v";
        endif;
	}
	// get the user id
	$post_vars = join("&", $kv);
	list($idB) = explode("&", $post_vars);
	list($idIdentity, $idFinal) = explode("=", $idB);

	$query = "SELECT id, name, email, image FROM google_related WHERE id = '$idFinal'";
//...
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