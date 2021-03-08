<?php
session_start();

$flag=0;

$url="http://rahul-e150443:9297/fetchcustomers";
$content=file_get_contents($url);
$json=json_decode($content,true);

if(isset($_POST['add'])){
  $custid=$_POST['addinput'];
  
  $url="http://rahul-e150443:9297/addcustomer?customerid=".$custid;

  $content=file_get_contents($url);
  if ($content=="FAILURE") {
    $flag=1;
    $message="Account Is Not Found Please Reload";
     }
  else{
    $flag=2;
    $message="Account Activated... Please Reload!!";
  }
}




if(isset($_POST['reject'])){
  $custid=$_POST['rejectinput'];
 
  $url="http://rahul-e150443:9297/removecustomer?customerid=".$custid;

  $content=file_get_contents($url);
  if ($content=="FAILURE") {
    $flag=1;
    $message="Account Is Not Found Please Reload";
     }
  else{
    $flag=2;
    $message="Account Is Rejected... Please Reload!!";
  }
}
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<title>Show Customers | Infy Bank</title>
</head>
<body>
  <div class="w3-bar w3-dark-grey ">
        <a href="adminhome.php" class="w3-bar-item w3-button "><i class="fa fa-bank"></i> <b>InfyBank</b></a>
        <a href="adminshowexistinguser.php" class="w3-bar-item w3-button w3-light-grey">Show Customers</a>
        <a href="adminnetbanking.php" class="w3-bar-item w3-button ">Show Netbanking</a>
        <a href="notfound.php" class="w3-bar-item w3-button ">Show Transactions</a>

       <form method="post" action="logout.php">
        <button class="w3-bar-item w3-button w3-right" name="btn1"><i class="fa fa-sign-out"></i>  Logout</button>
       </form>

       <a href="index.html" class="w3-bar-item w3-right w3-button"><i class="fa fa-user-circle-o"></i> <b><?php echo ucwords($_SESSION['Name']);?></b></a>
  </div>
     <header class="w3-container w3-center w3-padding-48 w3-white">
    <h1 class="w3-xxxlarge w3-text-dark-grey"><b>Customers Manager</b></h1>
    <h6>Here you can accept and reject <span class="w3-tag w3-dark-grey">Customer Request</span></h6>
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

             <button  class="w3-button w3-border" style="margin-left:2%;margin-bottom:2%" onclick="open12()"><i class=" fa fa-hourglass-2" ></i> Show Pending</button>

              <button  class="w3-button w3-border" style="margin-left:2%;margin-bottom:2%" onclick="open13()"><i class="fa fa-check-square-o" ></i> 
              Show Approved</button>

    </div>

   

	<div class="w3-row-padding w3-container" style="margin-left:5%;margin-right:5%" id="pending">
     <h2 style="margin-left: 40%">Pending Application</h2>
		 <table class="w3-table-all">
    <tr class="w3-dark-grey">
      <th>Customer Name</th>
      <th>Email</th>
      <th>PAN</th>
      
      <th class="w3-right-align">Actions</th>
      <th class="w3-right-align"></th>
    </tr>
   
    <?php
    $i=0;
    while( isset($json["CustomersInfo"][$i]["CustomerID"])){
      if($json["CustomersInfo"][$i]["AccountStatus"]=="pending"){
    ?>
    <tr>
      <td><?php echo $json["CustomersInfo"][$i]["CustomerName"];?></td>
      <td><?php echo $json["CustomersInfo"][$i]["Email"];?></td>
       <td><?php echo $json["CustomersInfo"][$i]["PanNumber"];?></td>
      
    <td class="w3-right-align">
      <?php 
      if($json["CustomersInfo"][$i]["AccountStatus"]=="pending"){
      ?>

        <form method="post" name="addform">
   <input type="text" name="addinput" class="w3-input w3-border w3-round" value=<?php echo $json["CustomersInfo"][$i]["CustomerID"];?> style="display:none" >  
      	<button id="showtransactionbtn" class="w3-button w3-border w3-green"  name="add"><i class="fa fa-check-circle"></i> Accept</button>
        </form>
        </td>
      
       
         <td class="w3-right-align">
        <form method="post" name="rejectform">
          <input type="text"  name="rejectinput" class="w3-input w3-border w3-round" value=<?php echo $json["CustomersInfo"][$i]["CustomerID"];?> style="display:none" >  
        <button type="submit" class="w3-button w3-border w3-pale-red"name="reject"><i class="fa fa-close"></i> Reject</button>
        </form>


        <?php
          }
          else{
        ?>
         </td>
      
       
         <td class="w3-right-align">
          <form method="post" name="rejectform">
          <input type="text"  name="rejectinput" class="w3-input w3-border w3-round" value=<?php echo $json["CustomersInfo"][$i]["CustomerID"];?> style="display:none" >  
        <button type="submit" class="w3-button w3-border w3-red"name="reject"><i class="fa fa-trash-o"></i> Delete</button>
        </form>
          
         

        <?php
          }
      ?>
      </td>
    </tr>
   
<?php
} 
$i++;
}
?>
  </table>
	</div>



  <div class="w3-row-padding w3-container" style="display:none;margin-left:5%;margin-right:5%" id="approved" >

     <h2 style="margin-left: 40%">Approve Applications</h2>
     <table class="w3-table-all">
    <tr class="w3-dark-grey">
      <th>Customer Name</th>
      <th>Email</th>
      <th>PAN</th>
      
      <th class="w3-right-align">Actions</th>
      <th class="w3-right-align"></th>
    </tr>
   
    <?php
    $i=0;
    while( isset($json["CustomersInfo"][$i]["CustomerID"])){
      if($json["CustomersInfo"][$i]["AccountStatus"]=="approved"){
    ?>
    <tr>
      <td><?php echo $json["CustomersInfo"][$i]["CustomerName"];?></td>
      <td><?php echo $json["CustomersInfo"][$i]["Email"];?></td>
       <td><?php echo $json["CustomersInfo"][$i]["PanNumber"];?></td>
      
    <td class="w3-right-align">
      <?php 
      if($json["CustomersInfo"][$i]["AccountStatus"]=="pending"){
      ?>

        <form method="post" name="addform">
   <input type="text" name="addinput" class="w3-input w3-border w3-round" value=<?php echo $json["CustomersInfo"][$i]["CustomerID"];?> style="display:none" >  
        <button id="showtransactionbtn" class="w3-button w3-border w3-green"  name="add"><i class="fa fa-check-circle"></i> Accept</button>
        </form>
        </td>
      
       
         <td class="w3-right-align">
        <form method="post" name="rejectform">
          <input type="text"  name="rejectinput" class="w3-input w3-border w3-round" value=<?php echo $json["CustomersInfo"][$i]["CustomerID"];?> style="display:none" >  
        <button type="submit" class="w3-button w3-border w3-pale-red"name="reject"><i class="fa fa-close"></i> Reject</button>
        </form>


        <?php
          }
          else{
        ?>
         </td>
      
       
         <td class="w3-right-align">
          <form method="post" name="rejectform">
          <input type="text"  name="rejectinput" class="w3-input w3-border w3-round" value=<?php echo $json["CustomersInfo"][$i]["CustomerID"];?> style="display:none" >  
        <button type="submit" class="w3-button w3-border w3-red"name="reject"><i class="fa fa-trash-o"></i> Delete</button>
        </form>
          
         

        <?php
          }
      ?>
      </td>
    </tr>
   
<?php
} 
$i++;
}
?>
  </table>
  </div>     

<script type="text/javascript">
   function open12(){
   var x = document.getElementById("pending");
   var y = document.getElementById("approved");
  if (x.style.display === "none") {
    x.style.display = "block";
    y.style.display = "none";
    
  } else {
    x.style.display = "none";
    y.style.display = "none";
  }
  }
function open13(){
   var x = document.getElementById("pending");
   var y = document.getElementById("approved");
  if (y.style.display === "none") {
    y.style.display = "block";
    x.style.display = "none";
    
  } else {
    x.style.display = "none";
    y.style.display = "none";
  }
  }

</script>


</body>
</html>