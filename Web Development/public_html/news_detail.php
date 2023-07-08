<?php
    session_start();
    
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    };
?>



<html>

<head>
    <title>News</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/main.js" defer></script>
</head>

<body>
    <!----------------- HEADER ------------------>
    <div class="top_header">
        <img src="img/E-sports_icon.png" alt="icon" style="height:40px; width:40px;" />&nbsp;&nbsp;&nbsp;
        <h3 style="color:#ff0066;">E-Sports Information</h3>
        <div class="navbar">
            <a href="index.php">Home</a>
            <a href="news.php" class="active">News</a>
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
    $api_latest_url = "http://localhost/Web%20Development/public_html/api/objects/read_one.php?id=$id";
    $json_latest_data = file_get_contents($api_latest_url);
    $latest_data = json_decode($json_latest_data);

    if ($latest_data !== null) {
        echo "<div class='Latest'>
                  <h1>News Details</h1>
                  <div class='row align-items-center'>
                      <div class='col-sm-3 p-3 text-center mx-auto'>
                          <img src='uploaded_img/{$latest_data->img}' alt='Latest News'/ style='width: 100%; height: 100%'>
                      </div>

                      <div class='col-sm-9 text-center'>
                          <h2>{$latest_data->title}</h2><br>
                          <p style='font-size: 20px; padding: 40px;'>{$latest_data->description}</p>
                      </div>
                  </div>
              </div>";
    } else {
        echo "No records found.";
    }
    ?><br><br><br><br>

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
