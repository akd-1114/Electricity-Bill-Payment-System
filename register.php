
<!doctype html>
<html>
    <head>
        <style type="text/css">

            body {font-family:Arial, Sans-Serif;}

            #container {width:300px; margin:0 auto;}

            /* Nicely lines up the labels. */
            form label {display:inline-block; width:140px;}

            /* You could add a class to all the input boxes instead, if you like. That would be safer, and more backwards-compatible */
            form input[type="text"],
            form input[type="password"],
            form input[type="email"] {width:160px;}

            form .line {clear:both;}
            form .line.submit {text-align:right;}

        </style>
    </head>
    <body>

	<?php
        if(isset($_GET['status']))
        {
            if($_GET['status']=="ALR")
            {
              ?>
                <script>
                alert("There already exists an account with this email id.")
               </script>
               <?php
            }
        }
    ?>
					<?php
					session_start();
				$rand=mt_rand(100000,999999);
				$_SESSION['otp']=$rand;
					$_SESSION['view']=0;
			
				?>
        <div id="container">
            <form style="font-weight:bold; font-size:20px" method="get" action="otpverification.php">
                <h1 style="font-size:45px">Create Login</h1>
                <div class="line"><label for="username">Username *: </label><input type="text" id="username" name="u" required/></div>
                <div class="line"><label for="pwd">Password *: </label><input type="password" id="pwd" name="p" required /></div>
                <!-- You may want to consider adding a "confirm" password box also -->
                <div class="line"><label for="surname">Surname *: </label><input type="text" id="surname" name="s" required/></div>
                <div class="line"><label for="other_names">Other Names *: </label><input type="text" id="names" name="n" required/></div>
                <div class="line"><label for="dob">Date of Birth *: </label><input type="date" id="dob" name="dob" required/></div>
                <div class="line"><label for="email">Email *: </label><input type="email" id="email" name="email" required /></div>
                <!-- Valid input types: http://www.w3schools.com/html5/html5_form_input_types.asp -->
                <div class="line"><label for="tel">Telephone*: </label><input type="text" id="tel" name="t" required /></div>
                <div class="line"><label for="add">Address *: </label><input type="text" id="add" name="a" required /></div>
                <div class="line"><label for="ptc">Post Code *: </label><input type="text" id="ptc" name="postc" required /></div>
                <div class="line submit" style="background:red; text-align:center"><input type="submit" name="register"/></div>

                <p>Note: Please make sure your details are correct before submitting form and that all fields marked with * are completed!.</p>
            </form>
	
        </div>
    </body>
</html>

