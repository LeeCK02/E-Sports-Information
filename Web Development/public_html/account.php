<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/ClientSide/html.html to edit this template
-->

<?php
    session_start();
    @include 'config.php';
    
    if (isset($_POST['update'])) {
    $username = $_SESSION['username'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $cpassword = md5($_POST['confirm-password']);

    if ($password == $cpassword) {
        $update_data = "UPDATE users SET email='$email', password='$password' WHERE username = '$username'";
        $update = mysqli_query($conn, $update_data);

        if ($update) {
            // Logout the user and display success message
            
            session_unset();
            session_destroy();
            echo "<script>alert('Account updated successfully. Please log in again.');</script>";
            echo "<script>window.location.href = 'index.php';</script>";
        } else {
            echo "<script>alert('Failed to update account.');</script>";
        }
    } else {
        echo "<script>alert('Password not matched.');</script>";
    }
}
    
?>

<style>
    
/* Set default styles for body, headings and paragraphs */
body {
  font-family: Arial, sans-serif;
  font-size: 16px;
  line-height: 1.5;
  margin: 0;
  padding: 0;
}

/* Style user details section */
.user_details {
  margin-top: 20px;
  margin-bottom: 60px !important;
  text-align: center;
  border: 1px solid #ccc;
  padding: 20px;
  border-radius: 5px;
  width: 40%;
  margin: 0 auto;
}

.user_details p{
    margin-bottom: 20px;
}

/* Style account settings section */
.acc_settings {
  margin-top: 40px;
  text-align: center;
  border: 1px solid #ccc;
  padding: 20px;
  border-radius: 5px;
  width: 40%;
  margin: 0 auto;
}

.acc_settings label {
  display: block;
  font-weight: bold;
  margin-bottom: 5px;
}

.acc_settings input[type="email"],
.acc_settings input[type="password"] {
  padding: 10px;
  font-size: 16px;
  border: 1px solid #ccc;
  border-radius: 3px;
  width: 60%;
  margin-bottom: 30px;
}

.acc_settings input[type="submit"] {
  background-color: #4CAF50;
  color: #fff;
  padding: 10px 20px;
  border: none;
  border-radius: 3px;
  font-size: 16px;
  cursor: pointer;
}

 @media (max-width: 767px) {
        .user_details {
            margin-top: 20px;
            margin-bottom: 60px !important;
            text-align: center;
            border: 1px solid #ccc;
            padding: 20px;
            border-radius: 5px;
            width: 80%;
            margin: 0 auto;
          }
        

        .acc_settings {
            margin-top: 40px;
            text-align: center;
            border: 1px solid #ccc;
            padding: 20px;
            border-radius: 5px;
            width: 80%;
            margin: 0 auto;
          }
    }
    
</style>

<html>
    <head>
        <title>Account</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="css/main.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="js/main.js"></script>
    </head>
    <body>
        
            <!----------------- HEADER ------------------>
        <div class="top_header">
            <img src="img/E-sports_icon.png" alt="icon" style="height:40px; width:40px;"/>&nbsp;&nbsp;&nbsp;
            <h3 style="color:#ff0066;">E-Sports Information</h3>
             <div class="navbar">
                <a href="index.php">Home</a>
                <a href="news.php">News</a>
                <a href="forum.php">Forum</a>
                <a href="tournament.php">Tournament</a>
                <a href="about.php">About Us</a>
            </div>
            <div class="acc_navbar">
                 <?php

                            if (isset($_SESSION['username'])) {
                               echo "<a>". $_SESSION['username'] . "</a>";
                               echo "<a href='account.php'>View Account</a>";
                               echo "<a href='logout.php'>Logout</a>";
                            }
                            else{
                               echo "<a href='login.php'>Login</a>";
                               echo "<a href='register.php'>Register</a>";
                            }
                ?>
            </div>
        </div>
        
        <div class="game_navbar" style="margin-top:30px;">
            <a href="league.php">League of Legends</a>
            <a href="csgo.php">CS:GO</a>
            <a href="dota.php">Dota 2</a>
            <a href="valorant.php">Valorant</a>
        </div>
        
        <!------------------ END OF HEADER ------------------>
        
        <h1 style=" font-size: 28px; font-weight: bold; margin-bottom: 20px; text-align:center; padding: 20px;">Account Information</h1>
        <div class="user_details">
            <h2 style="font-size: 20px; font-weight: bold; margin-top: 10px; margin-bottom: 30px;">User Details</h2>
            <p><strong>Username:</strong> <?php echo $_SESSION['username']; ?></p>
            <p><strong>Email:</strong> <?php echo $_SESSION['email']; ?></p>
         </div>
        
        <div class="acc_settings">
            <h2 style="font-size: 20px; font-weight: bold; margin-top: 10px; margin-bottom: 10px;">Update Account Settings</h2>        
            <form action="" method="POST" enctype="multipart/form-data">
              <label for="email">Email:</label>
              <input type="email" id="email" name="email" value="<?php echo $_SESSION['email']; ?>" required>
              <br>
              <label for="password">Password:</label>
              <input type="password" id="password" name="password" required>
              <br>
              <label for="confirm-password">Confirm Password:</label>
              <input type="password" id="confirm-password" name="confirm-password" required>
              <br>
              <input type="submit" name="update" value="Update Account">
            </form>
        </div>
        <br><br><br>
    </body>
    
   <footer class="footer">
    <div class="container">
        <div class="footer-columns">
            <div class="footer-column">
                <h3>About Us</h3>
                <ul>
                    <li><a href="about.php">Our Story</a></li>
                </ul>
            </div>
            <div class="footer-column">
                <h3>News</h3>
                <ul>
                    <li><a href="league.php">League of Legends</a></li>
                    <li><a href="csgo.php">CS:GO</a></li>
                    <li><a href="dota.php">Dota 2</a></li>
                    <li><a href="valorant.php">Valorant</a></li>
                </ul>
            </div>
            <div class="footer-column">
                <h3>Follow Us</h3>
                <ul>
                    <li><a href="https://www.facebook.com">Facebook</a></li>
                    <li><a href="https://www.twitter.com">Twitter</a></li>
                    <li><a href="https://www.instagram.com">Instagram</a></li>
                </ul>
            </div>
        </div>
        <br><br>
        <p>&copy; <?php echo date('Y'); ?> E-Sports Information. All rights reserved.</p>
        <p>Designed and developed by Lee Chee Kwong</a></p>
    </div>
</footer>

</html>
