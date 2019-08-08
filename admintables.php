<!doctype html>
<html>
<?php
session_start();
if(!isset($_SESSION['id']))
{
	header('location:admin.php');
}
?>
    <head>
        <meta charset = "utf-8" />
        <title>
            ADMIN PAGE
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
		       $query="SELECT * FROM `customer bill` WHERE 1";
				$run=mysqli_query($con,$query);
				
          ?>
          <div class="container" style="padding-top:130px">
          <div class="row">
          <div class="col-md-10 offset-md-1">
            <h1 class="text-center" style="padding-bottom:20px;text-decoration:underline">USER BILL</h1>
          </div>
          <div class="col-md-10 offset-md-1">
            <table class="table table-dark table-hover">
                <caption> confidential!</caption>
                <thead>
                <tr>
                    <th> user_id</th>
                    <th>name</th>
                    <th>bill</th>
                    <th>payment status</th>
                </tr>
                </thead>
                <tbody>
                <?php
                 while($data=mysqli_fetch_assoc($run)){
                        $id=$data['cust_id'];
                        $query="SELECT * FROM `customer` WHERE cust_id='$id'";
                        $run2=mysqli_query($con,$query);
                        $data2=mysqli_fetch_assoc($run2);
                        ?>
                        
                        <tr>
                            <td><?php echo $data2['cust_name']?></td>
                            <td><?php echo $data2['cust_email']?></td>
                            <td>Rs. <?php echo $data['cust_bill']?></td>
                                <td><?php echo $data['cust_status']?></td>
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
