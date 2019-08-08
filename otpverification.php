
		<?php
		session_start();
if(!isset($_GET['register']))
header('register.php');	
ob_start();
if(isset($_SESSION['view']))
$_SESSION['view']=$_SESSION['view']+1;
?>
<?php
function getRealIpAddr()
{
    if (!empty($_SERVER['HTTP_CLIENT_IP']))   //check ip from share internet
    {
      $ip=$_SERVER['HTTP_CLIENT_IP'];
    }
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   //to check ip is pass from proxy
    {
      $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    else
    {
      $ip=$_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}
?>
<html>
<head>
<meta name="veiwport" content="width=device-width,initial state=1"/>
<script src="jquery-3.3.1.min.js"></script>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">
<link rel="stylesheet" href="style1.css"/>
<script src="js/bootstrap.js"></script>
<script src="js/validator.js"></script>
</head>
<body>
<?php
if(isset($_GET['register'])){
	$e=$_GET['email'];
	$query1="SELECT * FROM `customer` WHERE cust_email='$e'";
					include('dbcon.php');
				$run1=mysqli_query($con,$query1);
				$data=mysqli_fetch_assoc($run1);
				
				if(mysqli_num_rows($run1)>0){

		$res="ALR";
			
	?>
	<script>window.open('register.php?status=<?php echo $res?>','_self')</script>
	<?php
}
else{
	
	if(isset($_SESSION['otp'])&&($_SESSION['view']==1)){
	$to=$_GET['email'];
	$otp=$_SESSION['otp'];
	$name=$_GET['n'];
		  $message="Your One Time Password for signing in is <span style='color:red;'>$otp</span>. Kindly enter the OTP and  register.";
include ('sendemail.php');
sendemail($e,$message);
if(!isset($_POST['create']))
{
?>

<script>alert("An OTP has been sent to your email address.");</script>
<?php

}
	}
}
}
?>
<div class="container-fluid">
<br/>
<div class="row">
<div class="col-sm-4"></div>
<div class="col-sm-4"></div>
</div>
</div>
</div>
<br/>

		<div class="container">
			<div class="row">
			<div class="col-sm-4"></div>
			<div class="col-sm-4">
			<div class="panel">
				<div class="panel-heading">
	               <div class="panel-title text-center">
	               		<h3>Verify Your Email Address</h3>
	               		<hr />
	               	</div>
	            </div> 
				<div class="panel-body">
				
					<form class="form-horizontal" method="post" action=""  data-toggle="validator" role="form">
						<div class="form-group">
							<label for="confirm" class="cols-sm-2 control-label">One Time Password</label>
							<div class="cols-sm-10">
							
									<input type="text" pattern="^\d{6}$" class="form-control"  name="otp" id="confirm" required/>
							
																<div class="help-block">OTP is of 6 digits.</div>
							</div>
							
		<div class="text-center"><input type="submit" class="btn btn-success pull-right" style="float:left;" Value="Verify" name="create"></div>
		</form>	
	
				
								</div>
	
				</div>
			</div>
		</div>
		<div class="col-sm-4"></div>
		</div>
		</div>
		</div>
		<?php

if(isset($_POST['create'])){
	$otp=$_POST['otp'];
    if($_SESSION['otp']==$otp){
		$u=$_GET['u'];$p=$_GET['p'];$s=$_GET['s'];$o=$_GET['n'];$d=$_GET['dob'];$e=$_GET['email'];$t=$_GET['t'];$a=$_GET['a'];$ptc=$_GET['postc'];
			$query="INSERT INTO `customer`(`cust_name`, `cust_pass`, `cust_email`, `surname`, `other_names`, `dob`, `telephone`, `address`, `postcode`) VALUES ('$u','$p','$e','$s','$o','$d','$t','$a','$ptc')";	
			$run=mysqli_query($con,$query);
					if($run)
					{
						?>
						<script>
						alert("You are successfully registered!");
						</script>
						
						<?php
						include('sendemail.php');
								  $message="Dear ".$u.", you have been sucessfully registered. <span style='color:red'>Make sure you pay electricity bill before expiry date to avoid penalty charges.</span> <br> Thanks.";
sendemail($e,$message);
						?>
						<script>
						window.open('user.php','_self');
						</script>
						<?php
					}
					else
					{
						?>
						<script>
						alert("You are not registered!");
						</script>
						<?php
					}
			
	}
else
{
	
	
		?>
			<script>
			alert("OTP Entered by you is incorrect");
		</script><?php
}
}
?>