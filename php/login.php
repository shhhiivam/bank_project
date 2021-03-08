<?php
session_start();
if(isset($_POST['btn'])){
$email =$_POST['email'];
$password=$_POST['password'];

$url="http://rahul-e150443:9297/login?email=".$email."&password=".$password;
$content=file_get_contents($url);
$json=json_decode($content,true);
$CustomerID=$json['CustomerInfo']['CustomerID'];
if($CustomerID!=0){
$_SESSION['CustId']=$json['CustomerInfo']['CustomerID'];
$_SESSION['Email']=$json['CustomerInfo']['Email'];
$_SESSION['Name']=$json['CustomerInfo']['CustomerName'];
	header('location:../home.php');
}
else{
	header('location:./login.html');
}

}

?>