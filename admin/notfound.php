<?php
session_start();
if(isset($_SESSION['Email'])){
}
else{
    #header('location:index.php');
}
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<title>Customer Home | Infy Bank</title>
</head>
<body>

 
  <div class="w3-bar w3-dark-grey ">
        <a href="adminhome.php" class="w3-bar-item w3-button "><i class="fa fa-bank"></i> <b>InfyBank</b></a>
        <a href="adminshowexistinguser.php" class="w3-bar-item w3-button">Show Customers</a>
        <a href="adminnetbanking.php" class="w3-bar-item w3-button  ">Show Netbanking</a>
        <a href="notfound.php" class="w3-bar-item w3-button w3-light-grey">Show Transactions</a>

       <form method="post" action="logout.php">
        <button class="w3-bar-item w3-button w3-right" name="btn1"><i class="fa fa-sign-out"></i>  Logout</button>
       </form>

       <a href="index.html" class="w3-bar-item w3-right w3-button"><i class="fa fa-user-circle-o"></i> <b><?php echo ucwords($_SESSION['Name']);?></b></a>
  </div>
   <!-- Header -->
  <header class="w3-container w3-center w3-padding-48 w3-white">
    <h1 class="w3-xxxlarge w3-text-dark-grey"><b>This Feature Will Some Soon </b></h1>
    <h6>Welcome to the powerfull solution of <span class="w3-tag w3-dark-grey">Digital Banking</span></h6>
  </header>


    
	
</body>
</html>