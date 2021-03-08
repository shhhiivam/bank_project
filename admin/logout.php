<?php 

if(isset($_POST['btn1'])){
session_destroy();
header('location:index.php');
}

?>