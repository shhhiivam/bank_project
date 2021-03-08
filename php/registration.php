<?php
$flag=0;
if (isset($_POST['btn'])) {
	$email=$_POST['email'];
	$name=$_POST['customername'];
	$fathername=$_POST['fathername'];
	$gender=$_POST['gender'];
	$dob=$_POST['dob'];
	$mobilenumber=$_POST['mobilenumber'];
	$address=$_POST['address'];
	$pancard=$_POST['pancard'];
	$aadharcard=$_POST['aadharcard'];
	$password=$_POST['password'];
	$securityquestion=$_POST['securityquestion'];
	$securityanswer=$_POST['securityanswer'];
$url="http://rahul-e150443:9297/registration?customername=".urlencode($name)."&fathername=".urlencode($fathername)."&gender=".urlencode($gender)
."&dob=".urlencode($dob)."&mobilenumber=".urlencode($mobilenumber)."&address=".urlencode($address)."&pancard=".urlencode($pancard)."&aadharcard=".urlencode($aadharcard)."&emailid=".urlencode($email)."&password=".urlencode($password)."&securityquestion=".urlencode($securityquestion)."&securityanswer=".urlencode($securityanswer);

$data=file_get_contents($url);
	if($data!="SUCCESS")
	{	
		$flag=1;
		$message="User Already Exist";	
	}
	else{
		$flag=2;
		$message="Your Account is under process";
	}

}



?>

<html>
<head>
<title>Bank Registration Form</title>
<head>
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

	  <div class="w3-bar w3-dark-grey">
         <a href="home.php" class="w3-bar-item w3-button "><i class="fa fa-bank"></i> <b>InfyBank</b></a>
        <a href="../login.php" class="w3-bar-item w3-button ">Login</a>
        <a href="registration.php" class="w3-bar-item w3-button w3-light-grey">Registration</a>
        <a href="../admin/index.php" class="w3-bar-item w3-button ">Admin Login</a>
        <a href="../customercare.html" class="w3-bar-item w3-button ">FAQ</a>

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
	<div class="w3-card-4 w3-half" style="margin-left:25%;margin-top:5%;margin-bottom:10%">
		<div class="w3-bar w3-grey w3-center ">
			<h2 class="w3-text-white"><b>Open New Account Here</b></h2>
		</div>
    <form method="post" name="registration" action="" class="w3-container">
        		<p>	
                <label>Customer Name</label>
                <input type="text" name="customername" id="customername" class="w3-input  w3-border w3-round" required />
   				</p>
            	<p>
				<label>Father's Name</label>
                <input type="text" name="fathername" id="fathername" class="w3-input  w3-border w3-round "  required />
           		</p>
           		<p>
               <input type="radio" name="gender" id="gender" value="Male" class="w3-radio" required />&emsp;<label>Male</label>&emsp;&emsp;
				<input type="radio" name="gender" id="gender" value="Female" class="w3-radio" required/>&emsp;<label>Female</label>&emsp;&emsp;
				<input type="radio" name="gender" id="gender" value="Other" class="w3-radio" required/>&emsp;<label>Other</label>&emsp;&emsp;
				</p>
				<p>
				<label>Date Of Birth</label>
                <input type="date" name="dob" id="dob" class="w3-input w3-border w3-round" required />
				</p>
				<p>
				<label>Mobile Number</label>
                <input type="number" name="mobilenumber" id="mobilenumber" class="w3-input w3-border w3-round" required />
				</p>
				<p>
				<label>Address</label>
                <textarea rows="4" cols="22" name="address" id="address" class="w3-input w3-border w3-round" required ></textarea>
				</p>
				<p>
				<label>PAN Card</label>
             	<input type="text" name="pancard" id="pancard" class="w3-input w3-border w3-round" required/>
				</p>
				<p>
				<label>Aadhar Card</label>
                <input type="number" name="aadharcard" id="aadharcard" class="w3-input w3-border w3-round" required />
				</p>
				<p>
				<label>Email Id</label>
               <input type="email" name="email" id="email" class="w3-input w3-border w3-round" required />
				</p>
				<p>
				<label>Password</label>
                <input type="password" name="password" id="password" class="w3-input w3-border w3-round" required />
				</p>
				<p>
				<label>Re-enter Password</label>
                <input type="password" name="rpassword" id="rpassword" class="w3-input w3-border w3-round" required />
				</p>
				<p>
				<label>Security Question</label>
               
					<select name="securityquestion" id="securityquestion" class="w3-select w3-border w3-round" required>
						<option disabled="true">--Pick a question--</option>
						<option value="Who is your favourite sports player?">Who is your favourite sports player?</option>
						<option value="Which is your favourite movie/web-series?">Which is your favourite movie/web-series?</option>
						<option value="Which is your favourite character?">Which is your favourite character?</option>
					</select>
				</p>
				<p>
				<label>Security Answer</label>
                <input type="text" name="securityanswer" id="securityanswer" class="w3-input w3-border w3-round" required />
       			</p>
        <br/>
        <input type="reset" value="Reset" name="btn1" class="w3-button  w3-red" />
        <input type="submit" value="Submit" name="btn" class="w3-button w3-right w3-green" />
		
    </form>
	</div>

</body>
</html>