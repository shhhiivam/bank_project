<?php
$flag=0;
session_start();
if(isset($_POST['btn'])){
$email =$_POST['email'];
$password=$_POST['password'];

$url="http://rahul-e150443:9297/adminlogin?email=".$email."&password=".$password;
$content=file_get_contents($url);
$json=json_decode($content,true);

$email=$json['AdminInfo']['AdminId'];


if($email==null){
   $flag=2;
    $message= "Invalid Credentials";
   
}
else{
    

$_SESSION['Email']=$json['AdminInfo']['AdminId'];
$_SESSION['Name']=$json['AdminInfo']['Name'];
    header('location:adminhome.php');
}

}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Admin's Login</title>
   
</head>

<body class=""> 
    
    <div class="w3-bar w3-grey" >
        <a href="../index.html" class="w3-bar-item w3-button"><i class="fa fa-bank"></i> <b>InfyBank</b></a>
    </div>

    <div class="" style="width:55%;margin-left:43%;margin-top:5%"> 
          <h3><b>Admin's Login</b></h3>
      </div>
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
      <div class="w3-card-4 w3-panel w3-leftbar w3-border-yellow w3-pale-yellow" style="width:55%;margin-left:20%"> 
          <h3><b><?php echo $message; ?></b></h3>
      </div>

    <?php
            }


    ?>

    <div class="w3-card-4 w3-light-grey w3-third " style="margin-top:10%;margin-left:33%">
        <h1 class="w3-green w3-center">Login</h1>
        <div class="w3-container">
            <form name="loginform" method="post" action="">
                 <label>Email</label><input type="email" name="email"class="w3-input">
                 <label>Password</label><input type="password" name="password" class="w3-input">
                 <a href="forget.html" class="w3-button w3-margin-top w3-sand">Forgot Password?</a>   
                 <button type="submit"  name="btn" class="w3-button w3-margin-top w3-green w3-margin-bottom w3-right"><i class="fa fa-user"></i> Login</button>
            </form>
        </div>
    </div>
</body>

</html>