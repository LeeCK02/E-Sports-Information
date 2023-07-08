<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/ClientSide/html.html to edit this template
-->

<?php
    session_start();
?>

<html>
    <head>
        <title>About us</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="css/main.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="js/main.js"></script>
        
        <style>
            /* Clear the float */
            .clearfix::after {
                content: "";
                display: table;
                clear: both;
            }
        </style>
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
                <a href="about.php" class="active">About Us</a>
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
            
            <h1 align="center" style="margin-top: 20px;">About Us</h1>
            
            <!-- Carousel -->
<div id="demo" class="carousel slide" data-bs-ride="carousel" style="margin-top: 50px;">

  <!-- Indicators/dots -->
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
    <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
    <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
  </div>
  
  <!-- The slideshow/carousel -->
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="img/E_sports_img01.jpg" alt="E-sports" class="d-block" style="height: 500px; width: 90%; margin: 0 auto;">
    </div>
    <div class="carousel-item">
      <img src="img/E_sports_img02.jpg" alt="E-sports" class="d-block"  style="height: 500px; width: 90%; margin: 0 auto;">
    </div>
    <div class="carousel-item">
      <img src="img/E_sports_img03.jpg" alt="E-sports" class="d-block" style="height: 500px; width: 90%; margin: 0 auto;">
    </div>
  </div>
  
  <!-- Left and right controls/icons -->
  <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
    <span class="carousel-control-next-icon"></span>
  </button>
</div>
            <div class="clearfix">
            <section style="width: 60%; margin: 0 auto; margin-top: 50px; padding-bottom: 50px; float:left;">
                <img src="img/E_sports_img03.jpg" alt="E-sports" class="d-block" style="height: 400px; width: 90%; margin: 0 auto;">
            </section>
             <section style="width: 40%; margin: 0 auto; margin-top: 50px;  float:right;">
                <h2 align="center">Our Story</h2>
                <p>
                  Welcome to e-sports information website! This website is about
                  e-sports enthusiasts who are passionate about providing up-to-date
                  and accurate information about the latest e-sports news, tournaments,
                  teams, players, and more.
                </p>
                <p>
                  The journey began as the big passionate and high interest
                  in e-sports. We recognized the lack of a reliable and
                  comprehensive source for e-sports information, and we decided to
                  create this website to fill that gap.
                </p>
                <p>
                  Since our inception, we have been committed to delivering high-quality
                  content and keeping our visitors informed about the latest happenings
                  in the e-sports world. We strive to provide reliable and accurate
                  information to our users, and we are proud to have become a trusted
                  source of e-sports news and updates for the community.
                </p>
              </section>
            </div>
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
    </body>
</html>
