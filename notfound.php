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
	<title>Fund Transfer | Infy Bank</title>
</head>
<body>

 
 <div class="w3-bar w3-dark-grey">
         <a href="home.php" class="w3-bar-item w3-button "><i class="fa fa-bank"></i> <b>InfyBank</b></a>
        <a href="php/netbanking.php" class="w3-bar-item w3-button ">Account</a>
        <a href="php/cards.php" class="w3-bar-item w3-button">Cards</a>
        <a href="notfound.php" class="w3-bar-item w3-button w3-light-grey">Fund Transfer</a>
        <a href="notfound1.php" class="w3-bar-item w3-button ">Offer For You</a>

       <form method="post" action="logout.php">
        <button class="w3-bar-item w3-button w3-right" name="btn1"><i class="fa fa-sign-out"></i>  Logout</button>
       </form>
        <a  class="w3-bar-item w3-right w3-button"><i class="fa fa-user-circle-o"></i> <b><?php echo ucwords($_SESSION['Name']);?></b></a>
  </div>

   <!-- Header -->
  <header class="w3-container w3-center w3-padding-48 w3-white">
    <h1 class="w3-xxxlarge w3-text-dark-grey"><b>This Feature Will Coming Soon </b></h1>
    <h6>Welcome to the powerfull solution of <span class="w3-tag w3-dark-grey">Digital Banking</span></h6>
  </header>

<div class="w3-card-4 w3-half" style="margin-left:25%;margin-top:5%;margin-bottom:10%">
    <div class="w3-bar w3-grey w3-center ">
      <h2 class="w3-text-white"><b>Fund Transfer</b></h2>
    </div>
    <form method="post" name="registration" action="" class="w3-container">
            <p> 
                <label>Reciver Name</label>
                <input type="text" name="recivername" class="w3-input  w3-border w3-round" required />
            </p>

              <p>
                <label>Reciver Account Number</label>
                <input type="text" name="Account Number"  class="w3-input  w3-border w3-round "  required />
              </p>


        <p>
        <label>Excepted Date</label>
                <input type="date" name="time" id="dob" class="w3-input w3-border w3-round" required />
        </p>
        <p>
        <label>Amount</label>
                <input type="number" name="mode"  class="w3-input w3-border w3-round" required />
        </p>
        
        
        <p>
        <label>Select Mode</label>
               
          <select name="mode"  class="w3-select w3-border w3-round" required>
            <option disabled="true">--Pick a question--</option>
            <option value="NEFT">NEFT</option>
            <option value="RTGS">RTGS</option>
            <option value="IMPS">IMPS</option>
            <option value="Cheque">Cheque</option>
               <option value="DT">DT</option>
          </select>
        </p>
        
        <input type="reset" value="Reset" name="btn1" class="w3-button  w3-red" />
        <input type="submit" value="Send" name="send" class="w3-button w3-right w3-green" />
    
    </form>
  </div>
    
	
</body>
</html>