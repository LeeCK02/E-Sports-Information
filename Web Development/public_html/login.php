<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/ClientSide/html.html to edit this template
-->

<?php 

include 'config.php';

session_start();

error_reporting(0);

if (isset($_SESSION['username'])) {
    header("Location: index.php");
}

if (isset($_POST['submit'])) {
	$username = $_POST['username'];
	$password = md5($_POST['password']);

	$sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
	$result = mysqli_query($conn, $sql);
	if ($result->num_rows > 0) {
		$row = mysqli_fetch_assoc($result);
		$_SESSION['username'] = $row['username'];
                                $_SESSION['email'] = $row['email'];
                                $_SESSION['id'] = $row['id'];
		header("Location: index.php");
	} else {
		echo "<script>alert('Username or Password is Wrong.')</script>";
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
        <title>Login</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="css/main.css">
        <script src="js/main.js"></script>
    </head>
    <body>
        <div class="login-box">
             <h1>Login</h1>
                 <form class="login-form" method="POST">
                     <div class="input">
                        <input type="text" name="username" placeholder="Username" value="<?php echo $username; ?>" required>
                     </div>
                     <div class="input">
                        <input type="password" name="password" placeholder="Password" value="<?php echo $_POST['password']; ?>" required>
                     </div>
                    <button type="submit" name="submit" class="btn">Login</button>
                </form>
                    <div class="txt">
                        <a>Don't have an account? &nbsp;&nbsp;<a href="register.php">Register Here!</a>
                    </div>
        </div>
        
    </body>
</html>
