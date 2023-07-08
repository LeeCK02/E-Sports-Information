<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Other/html.html to edit this template
-->

<?php
    session_start();

?>

<style>
    
        .Latest img {
            max-width: 340px !important;
            width: 340px  !important;
            height: 200px  !important;
            margin-bottom: 20px  !important;
          }
      
        .Latest p {
            font-size: 15px !important;
            font-weight: bold;
          }

        .News p {
            font-size: 15px !important;
            font-weight: bold;
         }

         .News h1{
            color: red;
         }
         
         .custom-link {
            text-decoration: none;
            color: inherit;
        }

        .custom-link p {
            color: inherit;
        }
        
/* Media query for responsive header */
@media only screen and (max-width: 768px) {
  .top_header {
    flex-direction: column;
    align-items: center; /* Update to align center */
    padding: 10px;
  }
  
  .top_header div {
  display: flex;
  align-items: center;
  margin-left: 0 !important;
}

  .top_header img {
    width: 60px !important;
    height: 60px !important;
  }

  .navbar,
  .acc_navbar {
    display: flex;
    flex-direction: column;
    margin-top: 10px;
    align-items: center; /* Align center */
  }

  .navbar a,
  .acc_navbar a {
    margin: 5px 0;
    font-size: 16px;
    text-align: center; /* Align center */
  }

  .game_navbar {
    flex-wrap: wrap;
    justify-content: center;
    padding: 10px 0px;
  }

  .game_navbar a {
    margin: 5px;
  }
}
    
 </style>

<html>
    <head>
        <title>E-Sports</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="css/main.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- CSS -->
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">

<!-- JavaScript -->
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="js/main.js"></script>
    </head>
    <body>
            <!----------------- HEADER ------------------>
        <div class="top_header">
            <img src="img/E-sports_icon.png" alt="icon" style="height:40px; width:40px;"/>&nbsp;&nbsp;&nbsp;
            <h3 style="color:#ff0066;">E-Sports Information</h3>
             <div class="navbar">
                <a href="index.php" class="active">Home</a>
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
        
        <?php 
                   $api_latest_url = "http://localhost/Web%20Development/public_html/api/objects/readLatest.php";
                   $json_latest_data = file_get_contents($api_latest_url);
                   $latest_data = json_decode($json_latest_data);

                   if (count($latest_data->records)){
                       echo 

               "<div class='Latest'>
                   <h1>Latest News</h1>
                   <div class='row'>";

                               foreach ($latest_data->records as $idx => $records){


                                   echo  
                                       "   
                                           <div class='col-sm-3 p-3'>
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
        <hr>

        
        <?php 
            $api_latest_league_url = "http://localhost/Web%20Development/public_html/api/objects/readLatestLeague.php";
            $json_latest_league_data = file_get_contents($api_latest_league_url);
            $latest_league_data = json_decode($json_latest_league_data);
            
            if (count($latest_league_data->records)){
                echo 
        
        "<div class='News'>
            <h1>League of Legends</h1>
            <div class='row'>";
                
                foreach ($latest_league_data->records as $idx => $records){
                            
                       
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
        <hr>

        <?php 
            $api_latest_csgo_url = "http://localhost/Web%20Development/public_html/api/objects/readLatestCsgo.php";
            $json_latest_csgo_data = file_get_contents($api_latest_csgo_url);
            $latest_csgo_data = json_decode($json_latest_csgo_data);
            
            if (count($latest_csgo_data->records)){
                echo 
        
        "<div class='News'>
            <h1>CS:GO</h1>
            <div class='row'>";
                
                foreach ($latest_csgo_data->records as $idx => $records){
                            
                       
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
            <hr>
        
        <?php 
            $api_latest_dota_url = "http://localhost/Web%20Development/public_html/api/objects/readLatestDota.php";
            $json_latest_dota_data = file_get_contents($api_latest_dota_url);
            $latest_dota_data = json_decode($json_latest_dota_data);
            
            if (count($latest_dota_data->records)){
                echo 
        
        "<div class='News'>
            <h1>Dota 2</h1>
            <div class='row'>";
                
                foreach ($latest_dota_data->records as $idx => $records){
                            
                       
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
            <hr>
        
        <?php 
            $api_latest_valorant_url = "http://localhost/Web%20Development/public_html/api/objects/readLatestValorant.php";
            $json_latest_valorant_data = file_get_contents($api_latest_valorant_url);
            $latest_valorant_data = json_decode($json_latest_valorant_data);
            
            if (count($latest_valorant_data->records)){
                echo 
        
        "<div class='News'>
            <h1>Valorant</h1>
            <div class='row'>";
                
                foreach ($latest_valorant_data->records as $idx => $records){
                            
                       
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
            ?><br><br>
            
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

<script>
            var swiper = new Swiper('.swiper-container', {
                slidesPerView: 4,
                spaceBetween: 10,
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
            });
</script>
