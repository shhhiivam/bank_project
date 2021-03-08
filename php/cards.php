<?php
session_start();
if(is_null($_SESSION['Email']))
{
	header('location:../login.php');
}
$custId=$_SESSION['CustId'];
$url="http://rahul-e150443:9297/card?customerid=".$custId;
$content=file_get_contents($url);
$json=json_decode($content,true);
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<title>Cards | Infy Bank</title>
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

   
   <header class="w3-container w3-center w3-padding-48 w3-white">
    <h1 class="w3-xxxlarge w3-text-dark-grey"><b>Your Cards <i class="fa fa-credit-card" style="font-size:48px;"></i></b></h1>
    <h6>List Of Issued Card Below <span class="w3-tag w3-dark-grey">Card Below</span></h6>
  </header>

   <div>
      <a href="../home.php" class="w3-button w3-border" style="margin-left:6%;margin-bottom:2%"><i class="fa fa-arrow-left"></i> Back</a>
            <a href="cards.php" class="w3-button w3-border" style="margin-left:2%;margin-bottom:2%"><i class="fa fa-refresh"></i> Refresh</a>
    </div>

	<div class="w3-row-padding w3-container" style="margin-left:5%;margin-right:5%">
		 <table class="w3-table-all">
    <tr class="w3-dark-grey">
      <th>Card Number <i class="fa fa-credit-card" ></i></th>
      <th>Card Type</th>
      <th class="w3-right-align">Action</th>
    </tr>
     <?php
    $i=0;
    while(isset($json['CardDetail'][$i]['CardNumber'])){
    ?>
    <tr>
    <tr>
      <td>XXXXXXXXXXXX<?php echo substr($json['CardDetail'][$i]['CardNumber'],12);?></td>
      <td><?php echo $json['CardDetail'][$i]['CardType'];?></td>
      <td class="w3-right-align"><a href=" cardinfo.php?cardnumber=<?php echo $json['CardDetail'][$i]['CardNumber'];?>&validfrom=<?php echo $json['CardDetail'][$i]['ValidFrom'];?>&validupto=<?php echo $json['CardDetail'][$i]['ValidUpto'];?>&cvv=<?php echo $json['CardDetail'][$i]['CVV'];?>&accountnumber=<?php echo $json['CardDetail'][$i]['AccountNumber'];?>&cardtype=<?php echo $json['CardDetail'][$i]['CardType'];?>" class="w3-button w3-border"><i class="fa fa-eye" ></i> Show details</a></td>
    </tr>
     <?php
    $i++;
  }
    ?>
  
  </table>
	</div>
</body>
</html>