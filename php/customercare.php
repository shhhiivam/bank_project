<?php 


if(isset($_POST['btn'])){

	$email=$_POST['customername'];
	$name=$_POST['customeremail'];
	$message=$_POST['query'];
	echo $email,$name,$message;
#$url="";
#$content=file_get_contents($url);
}

?>