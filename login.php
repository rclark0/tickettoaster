<?php

include('inc/init.inc.php');

$errors = array();

if (isset($_POST['username'], $_POST['password']))
{
	if (empty($_POST['username']))
	{
		$errors[] = 'The username cannot be empty.';
	}
	
	if (empty($_POST['password']))
	{
		$errors[] = 'The password cannot be empty.';
	}
	
	if (valid_credentials($_POST['username'], $_POST['password']) === false)
	{
		$errors[] = 'Username and/or password is incorrect.';
	}
	
	if (empty($errors))
	{
		$_SESSION['username'] = htmlentities($_POST['username']);
		
		header('Location: main.php');
	}
}

?>
<!DOCTYPE html>
<html lang="en"><head>
    <title>Ticket Toaster | Home</title>
    <meta charset="utf-8">

    <!-- Link styles -->
    <link rel="stylesheet" href="css/reset.css" type="text/css" />
    <link rel="stylesheet" href="css/style.css" type="text/css" />

    <!-- Link scripts -->
    <script src="https://www.google.com/jsapi"></script>
    <script>
        google.load("jquery", "1.7.1");
    </script>
    <script src="js/jquery.spinner.js"></script>
    <script src="js/script.js"></script>
</head>
<body>
  <header><!-- Define the header section of the page -->

        <h1 class="logo"><!-- Define the logo element --></h1>

        <ul class="soc-ico"><!-- Define social icons -->
            <li><a href="#"><img src="images/twitter48.png" alt=""></a></li>
            <li><a href="#"><img src="images/google48.png" alt=""></a></li>
            <li><a href="#"><img src="images/facebook48.png" alt=""></a></li>
            <li><a href="#"><img src="images/stumbleupon48.png" alt=""></a></li>
            <li><a href="#"><img src="images/rss48.png" alt=""></a></li>
        </ul>

        <nav><!-- Define the navigation menu -->
            <ul>
                <li class="active"><a href="#">Home</a></li>
                <li>
                  <div align="left"><a href="#">Members</a></div>
                </li>
                <li><a href="#">News</a></li>
                <li><a href="#">Photos</a></li>
                <li><a href="#">Forum</a></li>
                <li><a href="login.htm">Login</a></li>
                <li><a href="#"></a></li>
            </ul>
        </nav>
        </header>
        
 
		<div>
			<?php
			
			if (empty($errors) === false)
			{
				?>
				<ul>
					<?php
					
					foreach ($errors as $error)
					{
						echo "<li>{$error}</li>";
					}
					
					?>
				</ul>
				<?php
			}
			else
			{
			}
			
			?>
		</div>
		<form action="" method="post">
			<div id="stylized" class="myform">
			
				<label for="username">Username:</label>
				<input type="text" name="username" id="username" value="<?php if (isset($_POST['username'])) echo htmlentities($_POST['username']); ?>" />
			
			
				<label for="password">Password:</label>
				<input type="password" name="password" id="password" />
			
			
				<input style="margin-left:150px; width:100px" type="submit" value="Login" />
			</div>
		</form>
		
		<div class="underform">
			<p>Not signed up? <a href="register.php">Register here</a></p>
		</div>
		
	</body>
</html>