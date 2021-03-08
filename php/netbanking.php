<?php
session_start();

$flag=0;
$CustomerID=$_SESSION['CustId'];
$url="http://rahul-e150443:9297/fetchaccounts?customerid=".$CustomerID;
$content=file_get_contents($url);
$json=json_decode($content,true);
if(isset($_POST['btnapply'])){
  $email=$_SESSION['Email'];
  $password=$_POST['var1'];
 $accountnumber= $_POST['var3'];
  $url="http://rahul-e150443:9297/netbankingactivation?var1=".$email."&var2=".$password."&AccountNumber=".$accountnumber;
  
  $content=file_get_contents($url);
  if ($content=="FAILURE") {
    $flag=1;
    $message="Password didn't matches. Try Again!!";
     }
  else{
    $flag=2;
    $message="Activation process has been initiated.";
  }
}

if(isset($_POST['btnremove'])){
  $email=$_SESSION['Email'];
  $password=$_POST['var6'];
 $accountnumber= $_POST['var5'];
  $url="http://rahul-e150443:9297/netbankingdeactivation?var1=".$email."&var2=".$password."&AccountNumber=".$accountnumber;
  
  $content=file_get_contents($url);
  if ($content=="FAILURE") {
    $flag=1;
    $message="Password didn't matches. Try Again!!";
     }
  else{
    $flag=2;
    $message="Activation process has been initiated.";
  }
}
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
    <h1 class="w3-xxxlarge w3-text-dark-grey"><b>Accounts</b></h1>
    <h6>User have following accounts in <span class="w3-tag w3-dark-grey">Our Bank</span></h6>
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



   <div>
      <a href="../home.php" class="w3-button w3-border" style="margin-left:6%;margin-bottom:2%"><i class="fa fa-arrow-left"></i> Back</a>
            <a href="netbanking.php" class="w3-button w3-border" style="margin-left:2%;margin-bottom:2%"><i class="fa fa-refresh"></i> Refresh</a>
    </div>



	<div class="w3-row-padding w3-container" style="margin-left:5%;margin-right:5%">
		 <table class="w3-table-all">
    <tr class="w3-dark-grey">
      <th>Account Number</th>
      <th>Account Type</th>
      
      <th class="w3-right-align">Actions</th>
    </tr>
    <?php
    $i=0;
    while( isset($json["AccountInfo"][$i]["AccountNumber"])){
    ?>
    <tr>
      <td><?php echo $json["AccountInfo"][$i]["AccountNumber"];?></td>
      <td><?php echo $json["AccountInfo"][$i]["AccountType"];?></td>
      
    <td class="w3-right-align">
      <?php 
      if($json["AccountInfo"][$i]["Netbanking"]=="false"){
      ?>
      	<button id="showtransactionbtn" class="w3-button w3-border" onclick="open11(<?php echo $json["AccountInfo"][$i]["AccountNumber"]; ?>)" type="button" value="Activate"><i class="fa fa-check-circle"></i> Activate</button>
          <?php
        }
            elseif ($json["AccountInfo"][$i]["Netbanking"]=="pending") {
            
            
          ?>
          <p>pending</p>
      	<?php
          }
          else{
        ?>
        
        <button type="button" class="w3-button w3-border"  onclick="open12(<?php echo $json["AccountInfo"][$i]["AccountNumber"]; ?>)" value="Deactivate"><i class="fa fa-close"></i> Deactivate</button>


      	<button class="w3-button w3-border" onclick="open13(<?php echo $json["AccountInfo"][$i]["Balance"]; ?>,<?php echo $json["AccountInfo"][$i]["AccountNumber"];?>)"><i class="fa fa-eye"></i> Show Balance</button>

      	<a href="showtransactions.php?accId=<?php echo $json["AccountInfo"][$i]["AccountNumber"]; ?>&name=<?php echo $_SESSION['Name']; ?>&bal=<?php echo $json["AccountInfo"][$i]["Balance"]; ?>" class="w3-button w3-border"><i class="fa fa-info-circle"></i> Show Transactions</a>


        <?php
          }
      ?>
      </td>
    </tr>
   
<?php 
$i++;
}
?>
  </table>
	</div>


           <div class="w3-card-4 w3-half w3-cente w3-container" id="form11"  style="display:none;margin-left:25%;margin-bottom: 25%;margin-top:2%">
                <i class="w3-text-red" style="">Enter Password for Netbanking Activation</i>
                <form method="post">

                  <p>
                    <label>Account Number : <b id="var2"></b> </label> 
                    <input type="text" id="var3" name="var3" class="w3-input w3-border w3-round" style="display:none"> </p>  
                    <p><label>Email : <?php echo $_SESSION['Email'];?></label></p>
                    <p>
                    <label>Password :</label>
                    <input type="password" name="var1" class="w3-input w3-border w3-round" >                  
                    </p>  
                    <input type="submit" value="Apply" class="w3-button w3-bar w3-margin-bottom w3-blue" name="btnapply">  
                </form>
                </div>


           <div class="w3-card-4 w3-half w3-cente w3-container" id="form12"  style="display:none;margin-left:25%;margin-bottom: 25%;margin-top:2%">
                <i class="w3-text-red">Enter Password For Deactivate Netbanking</i>
                <form method="post">

                  <p>
                    <label>Account Number : <b id="var4"></b> </label> 
                    <input type="text" id="var5" name="var5" class="w3-input w3-border w3-round" style="display:none"> </p>  
                    <p><label>Email : <?php echo $_SESSION['Email'];?></label></p>
                    <p>
                    <label>Password :</label>
                    <input type="password" name="var6" class="w3-input w3-border w3-round" >                  
                    </p>  
                    <input type="submit" value="Apply" class="w3-button w3-bar w3-margin-bottom w3-blue" name="btnremove">  
                </form>
                </div>

                <div  class="w3-card-4 w3-panel w3-leftbar w3-border-blue w3-half w3-pale-blue" id="form13"  style="display:none;margin-left:25%;margin-bottom: 25%;margin-top:2%"> 
                   <h3>Balance : ₹<b id="var7"></b></h3>
               </div>

<script type="text/javascript">
  function open11(accountnumber){
   var x = document.getElementById("form11");
  if (x.style.display === "none") {
    x.style.display = "block";
    document.getElementById("var2").innerHTML=accountnumber;
    document.getElementById("var3").value=accountnumber;
  } else {
    x.style.display = "none";
  }
  }

  function open12(accountnumber){
   var x = document.getElementById("form12");
  if (x.style.display === "none") {
    x.style.display = "block";
    document.getElementById("var4").innerHTML=accountnumber;
    document.getElementById("var5").value=accountnumber;
  } else {
    x.style.display = "none";
  }
  }

   function open13(accountbalance,accountnumber){
   var x = document.getElementById("form13");
  if (x.style.display === "none") {
    x.style.display = "block";
    document.getElementById("var7").innerHTML=accountbalance;
    //document.getElementById("var5").value=accountnumber;
  } else {
    x.style.display = "none";
  }
  }
</script>





</body>
</html>