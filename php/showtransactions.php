<?php
session_start();
if(is_null($_SESSION['Email']))
{
  header('location:../login.php');
}


$accountID=$_GET['accId'];
$name=$_GET['name'];
$bal=$_GET['bal'];
$url="http://rahul-e150443:9297/fetchtransactions?accountnumber=".$accountID;
$content=file_get_contents($url);
$json=json_decode($content,true);

$activate=true;
?>

<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <title>Account | Infy Bank</title>
</head>
<body>

   <div class="w3-bar w3-dark-grey">
         <a href="home.php" class="w3-bar-item w3-button "><i class="fa fa-bank"></i> <b>InfyBank</b></a>
        <a href="../php/netbanking.php" class="w3-bar-item w3-button w3-light-grey">Account</a>
        <a href="../php/cards.php" class="w3-bar-item w3-button ">Cards</a>
        <a href="../notfound.php" class="w3-bar-item w3-button ">Fund Transfer</a>
        <a href="../notfound1.php" class="w3-bar-item w3-button ">Offer For You</a>

       <form method="post" action="logout.php">
        <button class="w3-bar-item w3-button w3-right" name="btn1"><i class="fa fa-sign-out"></i>  Logout</button>
       </form>
        <a  class="w3-bar-item w3-right w3-button"><i class="fa fa-user-circle-o"></i> <b><?php echo ucwords($_SESSION['Name']);?></b></a>
  </div>
     <header class="w3-container w3-center w3-padding-48 w3-white">
    <h1 class="w3-xxxlarge w3-text-dark-grey"><b>Account Details</b></h1>
    <h6>Account Details For Below Account</h6>
  </header>

  <div class="w3-card-4 w3-panel w3-leftbar w3-border-blue w3-pale-blue" style="width:55%;margin-left:20%"> 
      <br>
      
      <h3><b>A/c Number</b> : <?php echo $accountID; ?>&emsp; <b>A/c Holder</b> : <?php echo ucwords($name); ?></h3>
     
      <h5>Current Balance : <?php echo $bal; ?> cr</h5>
     <h5>Issued Card : <a href="cards.php">Click Here</a></h5>
      <br>
      

  </div>

  <div>
      <a href="netbanking.php" class="w3-button w3-border" style="margin-left:6%;margin-bottom:2%"><i class="fa fa-arrow-left"></i> Back</a>
            <a href="showtransactions.php" class="w3-button w3-border" style="margin-left:2%;margin-bottom:2%"><i class="fa fa-refresh"></i> Refresh</a>
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
    while(isset($json['TransactionInfo'][$i]['TransactionID'])){
    ?>
    <tr>
      <td><?php echo $json['TransactionInfo'][$i]['TransactionID'];?></td>
      <td><?php echo $json['TransactionInfo'][$i]['Receiver'];?></td>
      <td><?php echo $json['TransactionInfo'][$i]['Amount'];?></td>
      <td><?php echo $json['TransactionInfo'][$i]['Mode'];?></td>
      <td class="w3-right-align"><?php echo str_split($json['TransactionInfo'][$i]['TransactionDate'],10)[0];?></td>
    </tr>
    <?php
    $i++;
  }
    ?>
   
    

    
    
  </table>
  </div>
</body>
</html>