<!doctype html>
<html>
<?php
session_start();
if(!isset($_SESSION['cid']))
{
	header('location:user.php');
}
?>

    <head>
        <meta charset = "utf-8" />
        <title>
            USER PAGE
        </title>
        <meta name  ="viewport" content = "width=device width,initial scale = 1">
        
        <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        </head>
        <body>
			<?php
include('dbcon.php');
$cid=$_SESSION['cid'];
		$query="SELECT * FROM `customer bill` WHERE cust_id='$cid'";
				$run=mysqli_query($con,$query);
				
?>
<div class="container" style="padding-top:130px">
          <div class="row">
          <div class="col-md-12 ">
            <h1 class="text-center" style="padding-bottom:20px;text-decoration:underline">USER BILL</h1>
          </div>
          <div class="col-md-12 ">
            <table class="table table-dark table-hover">
                <caption> don't be late!</caption>
				<thead>
                <tr>
                   
                    <th>Name</th>

					 <th>Bill Number</th>
					 <th>Expiry Date</th>
                     <th>Month</th>
                     <th>Bill (Rs.)</th>
                    <th>Penality (Rs.)</th>
				    <th>Total Amount to Pay (Rs.)</th>
					<th>Payment Status</th>
					<th>Make Payment</th>
                </tr>
				</thead>
				<tbody>
				<?php
				function dateDiffInDays($date1, $date2)  
{ 
    // Calulating the difference in timestamps 
    $diff = strtotime($date1) - strtotime($date2); 
      
    // 1 day = 24 hours 
    // 24 * 60 * 60 = 86400 seconds 
	if($diff>0)
    return (round($diff / 86400));
else return 0;
} ?>
				<?php
				while($data=mysqli_fetch_assoc($run)){
					$id=$data['cust_id'];
								$query="SELECT * FROM `customer` WHERE cust_id='$id'";
				$run2=mysqli_query($con,$query);
				$data2=mysqli_fetch_assoc($run2);
				?>
				<tr>
                   
                    <th><?php echo $data2['cust_name']?></th>
               
					 <th><?php echo $data['bill_number']?></th>
					<th> <?php
$date_array = getdate();
	$formated_date="";
   $formated_date .= $date_array['mday'] . "-";
   $formated_date .= $date_array['mon'] . "-";
   $formated_date .= $date_array['year'];
   $expdate=$data['cust_expiry_date'];
   echo $expdate;
  $diff= dateDiffInDays($formated_date, $expdate);  
$penalty=$data['cust_bill']*0.004*$diff;
$total=$penalty+$data['cust_bill'];
	 $query4="UPDATE `customer bill` SET `total_bill`='$total',`cust_penalty`='$penalty' where cust_id='$id'";
include('dbcon.php');	 
		$run4=mysqli_query($con,$query4);
?>
</th>
    
		             <th><?php echo $_GET['month']?></th>					 
              
					     <th><?php echo $data['cust_bill']?></th>
                    <th><?php echo $penalty?></th>
					   <th><?php echo $total?></th>
					      <th><?php echo $data['cust_status']?></th>
					<?php
					if($data['cust_status']=='DUE')
					{
						?>
						                    <th><a href="x.php?billno=<?php echo $data['bill_number']?>"><button>Pay Bill</button></a></th>
						<?php
					}
					else
					{
						?>
							<th>Bill Paid</th>
							<?php
					}
					?>
				
                </tr>
				<?php
				}
				?>
				</tbody>
            </table>
			</div>
            </div>
            </div>
        </body>
</html>
