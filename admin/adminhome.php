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
       

       <form method="post" action="logout.php">
        <button class="w3-bar-item w3-button w3-right" name="btn1"><i class="fa fa-sign-out"></i>  Logout</button>
       </form>

       <a href="index.html" class="w3-bar-item w3-right w3-button"><i class="fa fa-user-circle-o"></i> <b><?php echo ucwords($_SESSION['Name']);?></b></a>
  </div>
   <!-- Header -->
  <header class="w3-container w3-center w3-padding-48 w3-white">
    <h1 class="w3-xxxlarge w3-text-dark-grey"><b>Admin's Home</b></h1>
    <h6>Welcome to the powerfull solution of <span class="w3-tag w3-dark-grey">Digital Banking</span></h6>
  </header>


    
	<div class="w3-row-padding w3-padding" style="margin:5%;">
		<div class="w3-quarter" >
			<div class=" w3-card-4 w3-center w3-pale-red w3-round-xlarge " style="height:150px;">

			<h3 style="margin-top:10%" class="w3-button">
				<i class="	fa fa-users" style="font-size:48px"></i><br>
				<a href="adminshowexistinguser.php">Show Customers</a>
			</h3>
			</div>
		</div>
		<div class="w3-quarter " style="height:100px;text-align:center;">
			<div class=" w3-card-4 w3-center w3-pale-blue w3-round-xlarge" style="height:150px;">
			<h3 style="margin-top:10%" class="w3-button">
					<i class="fa fa-globe" style="font-size:48px"></i><br>
				<a href="adminnetbanking.php">Netbanking Request</a></h3>
			</div>
		</div>
		<div class="w3-quarter " style="height:100px">
			<div class=" w3-card-4 w3-center w3-pale-yellow w3-round-xlarge" style="height:150px;">
			<h3 style="margin-top:10%" class="w3-button">
				<i class="	fa fa-book" style="font-size:48px"></i><br>
				<a href="notfound.php" >Transaction Request</a></h3>
			</div>
		</div>
		<div class="w3-quarter" style="height:100px">
			<div class=" w3-card-4 w3-center w3-pale-green w3-round-xlarge" style="height:150px;">
			<h3 style="margin-top:10%" class="w3-button">
				<i class="fa fa-trophy" style="font-size:48px"></i><br>
				<a href="adminbonus.php">Add Bonus Point</a></h3>
			</div>
		</div>
	</div>
</body>
</html>