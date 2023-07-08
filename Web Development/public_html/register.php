<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/ClientSide/html.html to edit this template
-->

<?php 

include 'config.php';

error_reporting(0);

session_start();

if (isset($_SESSION['username'])) {
    header("Location: index.php");
}

if (isset($_POST['submit'])) {
	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = md5($_POST['password']);
	$cpassword = md5($_POST['confirm-password']);

	if ($password == $cpassword) {
		$sql = "SELECT * FROM users WHERE email='$email' OR username = '$username'";
		$result = mysqli_query($conn, $sql);
		if (!$result->num_rows > 0) {
			$sql = "INSERT INTO users (username, email, password)
					VALUES ('$username', '$email', '$password')";
			$result = mysqli_query($conn, $sql);
			if ($result) {
				echo "<script>alert('User Registration Sucessfully Completed.')</script>";
				$username = "";
				$email = "";
				$_POST['password'] = "";
				$_POST['confirm-password'] = "";
			} else {
				echo "<script>alert('Something Wrong Went.')</script>";
			}
		} else {
			echo "<script>alert('Email or Username Already Exists.')</script>";
		}
		
	} else {
		echo "<script>alert('Password Not Matched.')</script>";
	}
}

?>


<style>
    
body {
    width: 100%;
    min-height: 100vh;
    background-image: linear-gradient(rgba(0,0,0,.5), rgba(0,0,0,.5)), url(img/e-sports_bg.jpg);
    background-position: center;
    background-size: cover;
    display: flex;
    justify-content: center;
    align-items: center;
}
    
</style>
    

<html>
    <head>
        <title>Register</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="css/main.css">
        <script src="js/main.js"></script>
    </head>
    <body>
        <!-- Registration Form -->
        <div class="register-box">
            <h1>Register</h1>
            <form name="register-form" method="POST">
              <div class="input">
                <input type="text" name="username" id="username" placeholder="Username" value="<?php echo $username; ?>" required><br>
              </div>
              <div class="input">
                <input type="email" name="email" id="email" placeholder="Email" value="<?php echo $email; ?>" required><br>
              </div>
              <div class="input">
                <input type="password" name="password" id="password" placeholder="Password" value="<?php echo $_POST['password']; ?>" required><br>
              </div>
              <div class="input">
                  <input type="password" name="confirm-password" id="confirm-password" placeholder="Confirm Password" value="<?php echo $_POST['confirm-password']; ?>" required><br>
              </div>
              <input type="submit" name="submit" value="Register" class="btn" onclick="validation()">
            </form>
            <div class="txt">
                <a>Already own an account? &nbsp;&nbsp;&nbsp; <a href="login.php">Login Here!</a>
            </div>
        </div>
   
    
</html>
