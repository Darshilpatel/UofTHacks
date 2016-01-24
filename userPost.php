<?php 

$con = mysqli_connect('localhost', 'root', '');
if(!$con) {
	echo 'not connected';
}
 if (!mysqli_select_db($con,'user_info')) {
 	echo "not selected"; 
 }

 $name = $_POST['username'];
 $title = $_POST['title'];
 $text = $_POST['text'];

$date =  gmdate("Y-m-d G:i:s");

echo $date;

$sql = "Insert INTO user_posts (name, title, text, date) VALUES ('$name','$title', '$text', '$date')";

if (!mysqli_query($con, $sql)) {
	echo 'now working';
}
else 'works';








?>