<?php
session_start();
if(isset($_SESSION['Email'])){
}
else{
    #header('location:index.php');
}

if (isset($_POST['add'])) {
  $custid=$_POST['recivername'];
  $bonuspoint=$_POST['bonuspoint'];
echo $custid;
$url="";
$content=file_get_contents($url);
 $content=file_get_contents($url);
  if ($content=="FAILURE") {
    $flag=1;
    $message="Bonus not added";
     }
  else{
    $flag=2;
    $message="Bonus Added";
  }
}

?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <title>Fund Transfer | Infy Bank</title>
</head>
<body>

 
<div class="w3-bar w3-dark-grey ">
        <a href="adminhome.php" class="w3-bar-item w3-button "><i class="fa fa-bank"></i> <b>InfyBank</b></a>
        <a href="adminshowexistinguser.php" class="w3-bar-item w3-button ">Show Customers</a>
        <a href="adminnetbanking.php" class="w3-bar-item w3-button ">Show Netbanking</a>
        <a href="notfound.php" class="w3-bar-item w3-button ">Show Transactions</a>

       <form method="post" action="logout.php">
        <button class="w3-bar-item w3-button w3-right" name="btn1"><i class="fa fa-sign-out"></i>  Logout</button>
       </form>

       <a href="index.html" class="w3-bar-item w3-right w3-button"><i class="fa fa-user-circle-o"></i> <b><?php echo ucwords($_SESSION['Name']);?></b></a>
  </div>

   <!-- Header -->
  <header class="w3-container w3-center w3-padding-48 w3-white">
    <h1 class="w3-xxxlarge w3-text-dark-grey"><b>Bonus Feature</b></h1>
    <h6>Welcome to the powerfull solution of <span class="w3-tag w3-dark-grey">Digital Banking</span></h6>
  </header>

     <?php
    if($flag==1)
            {
  ?>
      <div class="w3-card-4 w3-panel w3-leftbar w3-border-red w3-pale-red" style="width:55%;margin-left:20%"> 
          <h3><b><?php echo $message; ?></b></h3>
      </div>

    <?php 
            }
            elseif ($flag==2) {
                  ?>
      <div class="w3-card-4 w3-panel w3-leftbar w3-border-green w3-pale-green" style="width:55%;margin-left:20%"> 
          <h3><b><?php echo $message; ?></b></h3>
      </div>

    <?php
            }


    ?>
<div class="w3-card-4 w3-half" style="margin-left:25%;margin-top:5%;margin-bottom:10%">
    <div class="w3-bar w3-grey w3-center ">
      <h2 class="w3-text-white"><b>Add Bonus</b></h2>
    </div>
    <form method="post"  action="" class="w3-container">
            <p> 
                <label>Customer Id</label>
                <input type="text" name="recivername" class="w3-input  w3-border w3-round" required />
            </p>

              <p>
                <label>Bonus Point</label>
                <input type="number" name="bonuspoint"  class="w3-input  w3-border w3-round "  required />
              </p>


        
        <input type="reset" value="Reset" name="btn1" class="w3-button  w3-red" />
        <input type="submit" value="Add" name="add" class="w3-button w3-right w3-margin-bottom w3-green" />

    
    </form>
  </div>
    
  
</body>
</html>