<!DOCTYPE HTML>
<html>
<body>
<?php
session_start();
if(!isset($_SESSION['id']))
{
	header('location:admin.php');
}
?>
<?php
include('dbcon.php');
	$query="SELECT * FROM `admin`";
	$run1 =mysqli_query($con,$query);
	$data1=mysqli_fetch_assoc($run1);
	?>
<div style="text-align:center; padding:20px; font-weight:bold">
 <h1 style="font-size:40px">Update Per Unit Cost</h1>
 <form method="post" action="update.php">
 1 Kilo Watt per Hour(KWH) Cost: <input type="number" name="kwh"  value="<?php echo $data1['kwh_cost']?>" required><br><br>
 <input type="submit" name="update" value="Update">
 </form>
 <?php
 if(isset($_POST['update']))
 {
	 $kwh=$_POST['kwh'];
	 $query="UPDATE `admin` SET `kwh_cost`='$kwh'";
include('dbcon.php');	 
		$run=mysqli_query($con,$query);
 if($run)
 {?>
	 <script>
	 alert("KWH cost updated successfully!");
	 window.open('update.php','_self');
	 </script>
	<?php 
 }
 }
 ?>
</div>
</body>
</html>