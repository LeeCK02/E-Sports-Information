<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/ClientSide/html.html to edit this template
-->

<?php
    session_start();
?>

<html>

<style>

.content img {
  max-width: 420px !important;
  height: 250px !important;
  margin-bottom: 20px !important;
}

 .custom-link {
     text-decoration: none;
     color: inherit;
 }

 .custom-link p {
     color: inherit;
 }

</style>
    <head>
        <title>League of Legends</title>
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
            <a href="league.php"  class="active">League of Legends</a>
            <a href="csgo.php">CS:GO</a>
            <a href="dota.php">Dota 2</a>
            <a href="valorant.php">Valorant</a>
        </div>
        
        <!------------------ END OF HEADER ------------------>
        
        <div>
            <div style="display:flex; align-items: center;">
                <h1 align="center" style="margin-top: 20px; margin-bottom: 20px; padding-left: 20px;">League of Legends</h1>
            </div>
            <img src="img/lol_banner.jpg" alt="Banner" style="width:100%; height: 500px;"/>
            
            <div class="Latest">
                <h1>Latest News</h1>
                <?php 
                   $api_latest_url = "http://localhost/Web%20Development/public_html/api/objects/readLatestLeague.php";
                   $json_latest_data = file_get_contents($api_latest_url);
                   $latest_data = json_decode($json_latest_data);

                   if (count($latest_data->records)){
                       echo 

                    "<div class='row'>";

                                    foreach ($latest_data->records as $idx => $records){


                                        echo  
                                            "<div class='col-sm-3 p-3'>
                                           <a href='news_detail.php?id=$records->id' class='custom-link'>
                                           <img src='uploaded_img/$records->img' alt='Latest News'/>
                                           <p>$records->title</p>
                                           </a>
                                       </div>";
                                    }
                            echo"</div>
                        </div>";
                        }
                ?>
            
            <div class="game_info">
                <h2 style="padding: 20px;">Game Info</h2>
                <div style="background-image:  url('img/lol_banner02.jpeg'); background-size:cover; background-color: rgba(255,255,255,0.6); background-blend-mode: lighten; padding: 30px;">
                        <ul>
                            <li><strong>Platform:</strong> Windows, macOS</li>
                            <li><strong>Release Date:</strong> October 27, 2009</li>
                            <li><strong>Model:</strong> Free-to-play with in-game purchases</li>
                            <li><strong>Genre:</strong> Multiplayer online battle arena (MOBA)</li>
                        </ul>
                        <ul>
                            <li><strong>Cross-Platform Support:</strong> No</li>
                            <li><strong>Entwickler:</strong> Riot Games</li>
                            <li><strong>Publisher:</strong> Riot Games Inc., Tencent Holdings Ltd. (owner of branch in Los-Angeles)</li>
                            <li><strong>USK:</strong> 12</li>
                        </ul>
                </div>
            </div>
            
            <div class="content">
                <h2>All News</h2>
                <?php 
                   $api_latest_url = "http://localhost/Web%20Development/public_html/api/objects/readLeague.php";
                   $json_latest_data = file_get_contents($api_latest_url);
                   $latest_data = json_decode($json_latest_data);

                   if (count($latest_data->records)){
                       echo 

                    "<div class='row'>";

                                    foreach ($latest_data->records as $idx => $records){


                                        echo  
                                            "<div class='col-sm-3 p-3'>
                                           <a href='news_detail.php?id=$records->id' class='custom-link'>
                                           <img src='uploaded_img/$records->img' alt='Latest News'/>
                                           <p>$records->title</p>
                                           </a>
                                       </div>";
                                    }
                            echo"</div>
                        </div>";
                        }
                ?>
            </div>
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
