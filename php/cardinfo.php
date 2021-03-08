<?php
session_start();
if(is_null($_SESSION['Email']))
{
	header('location:../login.php');
}
$cardnumber=$_GET['cardnumber'];
$url="http://rahul-e150443:9297/carddetails?cardnumber=".$cardnumber;
$content=file_get_contents($url);
$json=json_decode($content,true);

?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<title>Card Details Infy Bank</title>
</head>
<body>

   <div class="w3-bar w3-dark-grey">
         <a href="home.php" class="w3-bar-item w3-button "><i class="fa fa-bank"></i> <b>InfyBank</b></a>
        <a href="../php/netbanking.php" class="w3-bar-item w3-button ">Account</a>
        <a href="../php/cards.php" class="w3-bar-item w3-button w3-light-grey">Cards</a>
        <a href="../notfound.php" class="w3-bar-item w3-button ">Fund Transfer</a>
        <a href="../notfound1.php" class="w3-bar-item w3-button ">Offer For You</a>

       <form method="post" action="logout.php">
        <button class="w3-bar-item w3-button w3-right" name="btn1"><i class="fa fa-sign-out"></i>  Logout</button>
       </form>
        <a  class="w3-bar-item w3-right w3-button"><i class="fa fa-user-circle-o"></i> <b><?php echo ucwords($_SESSION['Name']);?></b></a>
  </div>

    <h1 style="margin-left:37%;margin-top:5%" class="w3-text-dark-grey" ><b>Your Card Details <i class="fa fa-info-circle" style="font-size:40px;"></i></b></h1>

  <div class="w3-card-4 w3-panel w3-leftbar w3-border-blue w3-pale-blue" style="width:55%;margin-left:20%"> 
      <br>
      
      <h3><b>Card Number</b> : <?php echo $_GET['cardnumber'];?>&emsp; <b>Card Holder</b> : <?php echo $_SESSION['Name'];?></h3>
     
      <h5>Valid From : <?php echo ucwords($_GET['validfrom']);?></h5>
      <h5>Valid Upto : <?php echo $_GET['validupto'];?> </h5>
     <h5>CVV : <?php echo $_GET['cvv'];?></h5><h5 > CardType : <?php echo $_GET['cardtype'];?></h5>
      <br>
      

  </div>
  <div>
      <a href="cards.php" class="w3-button w3-border" style="margin-left:6%;margin-bottom:2%"><i class="fa fa-arrow-left"></i> Back</a>
            <a href="cardinfo.php" class="w3-button w3-border" style="margin-left:2%;margin-bottom:2%"><i class="fa fa-refresh"></i> Refresh</a>
    </div>


	<div class="w3-row-padding w3-container" style="margin-left:5%;margin-right:5%">
		 <table class="w3-table-all">
    <tr class="w3-dark-grey">
      <th>Transction ID</th>
      <th>Reciver</th>
      <th>Amount</th>
      <th>Credit/Debit</th>
      <th class="w3-right-align">Date</th>
    </tr>
    <?php
    $i=0;
    while(isset($json['cardInfo'][$i]['TransactionID'])){
    ?>
    <tr>
      <td><?php echo $json['cardInfo'][$i]['TransactionID'];?></td>
      <td><?php echo $json['cardInfo'][$i]['Receiver'];?></td>
      <td><?php echo $json['cardInfo'][$i]['Amount'];?></td>
      <td>Debit.</td>
      <td class="w3-right-align"><?php echo str_split($json['cardInfo'][$i]['TransactionDate'],10)[0];?></td>
    </tr>

  <?php
    $i++;
  }
    ?>

    

    
    
  </table>
	</div>
</body>
</html>