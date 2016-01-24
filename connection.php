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
    $post_vars = join("&", $kv);
}
list($nameB, $imageB, $emailB, $idB) = explode("&", $post_vars);
list($nameIdentity, $nameFinal) = explode("=", $nameB);
list($imageIdentity, $imageFinal) = explode("=", $imageB);
list($emailIdentity, $emailFinal) = explode("=", $emailB);
list($idIdentity, $idFinal) = explode("=", $idB);



//Prinitng out finals
// echo($nameFinal);
// echo("<br>");
// echo($imageFinal);
// echo("<br>");
// echo($emailFinal);
// echo("<br>");
// echo($idFinal);
// echo("<br>");


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "user_info";


$query = "INSERT INTO google_related(id, name, email, image)
VALUES ('$idFinal', '$nameFinal', '$emailFinal', '$imageFinal')";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


if(mysqli_query($conn, $query)){
	echo("New Record Stored");
}else{
	echo "error" . $query . "<br>" . mysqli_error($conn);
}



echo "Connected Successfully!";







?>


<!DOCTYPE html>
<html>

<body>
	<p id = "rece"></p>

</body>

<script type="text/javascript">
window.location.href = "http://localhost/mainpage.html?id=<?php echo strVal($idFinal); ?>";
</script>




<html>




