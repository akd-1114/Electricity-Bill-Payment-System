<!DOCTYPE html>
<?php
session_start();
if(!isset($_SESSION['cid']))
{
	header('location:user.php');
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User</title>
       <!--Import Google Icon Font-->
       <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
       <!--Import materialize.css-->
       <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
   
       <!--Let browser know website is optimized for mobile-->
       <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body>
    <nav class="teal">
        <a href="" class="brand-logo center">Welcome User</a>
        <ul class="right">
            <li><a href="y.php"><span>View Bill</span></a></li>
            <li><a href="logout.php"><span>Logout</span></a></li>
            <li><a href=""><span class="new badge right black-text">4</span><i class="material-icons">notifications_active</i></a></li>

          
        </ul>
    </nav>


    
</body>
</html>