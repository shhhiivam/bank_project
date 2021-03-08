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
  <title>Show Customers| Infy Bank</title>
</head>
<body>

  <div class="w3-bar w3-dark-grey ">
        <a href="index.html" class="w3-bar-item w3-button "><b>InfyBank</b></a>
       <form method="post" action="logout.php">
        <button class="w3-bar-item w3-button w3-right" name="btn1">Logout</button>
       </form>
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
      <a href="adminhome.php" class="w3-button w3-border" style="margin-left:6%;margin-bottom:2%"><i class="fa fa-arrow-left"></i> Back</a>
            <a href="adminshowexistinguser.php" class="w3-button w3-border" style="margin-left:2%;margin-bottom:2%"><i class="fa fa-refresh"></i> Refresh</a>
    </div>



  <div class="w3-row-padding w3-container" style="margin-left:5%;margin-right:5%">
     <table class="w3-table-all">
    <tr class="w3-dark-grey">
      <th>Customer Name</th>
      <th>PAN</th>
      
      <th class="w3-right-align">Actions</th>
    </tr>
    <tr >
      <td>Customer Name</td>
      <td>Pan</td>
      
      <td class="w3-right-align">Actions</td>
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
        <button id="showtransactionbtn" class="w3-button w3-border"  ><i class="fa fa-check-circle"></i> Activate</button>
          
        <?php
          }
          else{
        ?>
        
        <button type="button" class="w3-button w3-border" value="Deactivate"><i class="fa fa-close"></i> Deactivate</button

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


          




</body>
</html>