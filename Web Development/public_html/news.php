<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/ClientSide/html.html to edit this template
-->
<?php
    session_start();
?>

<style>
    .filter li {
        cursor: pointer;
    }

    .filter li.active {
        font-weight: bold;
    }

    .news-item {
        display: none;
    }

    .news-item.active {
        display: block;
    }

    .Latest .row{
    display:flex;
    margin-bottom: 0px !important;
}

 .custom-link {
     text-decoration: none;
     color: inherit;
 }

 .custom-link p {
     color: inherit;
 }
 
     /* Responsive Styles */
    @media (max-width: 767px) {
        .filter {
            flex-wrap: wrap !important;
            padding-left: 0px !important;
        }
        

        .filter li {
            margin: 5px;
        }
    }
 
</style>

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

    <div class="Latest">
        <h1>News</h1>
        <div class="filter">
            <ul>
                <li class="active" data-filter="*">All</li>
                <li data-filter="league">League</li>
                <li data-filter="csgo">CS:GO</li>
                <li data-filter="dota">Dota 2</li>
                <li data-filter="valorant">Valorant</li>
            </ul>
        </div>

        <?php
        $api_league_url = "http://localhost/Web%20Development/public_html/api/objects/readLeague.php";
        $json_league_data = file_get_contents($api_league_url);
        $league_data = json_decode($json_league_data);

        if (count($league_data->records)) {
            echo "<div class='row'>";
            foreach ($league_data->records as $idx => $records) {
                echo "<div class='col-sm-3 p-3 news-item' data-category='league'>";
                echo "<a href='news_detail.php?id=$records->id' class='custom-link'>";
                echo "<img src='uploaded_img/$records->img' alt='Latest News'/>";
                echo "<p>$records->title</p>";
                echo "</a>";
                echo "</div>";
            }
            echo "</div>";
        }
        ?>

        <?php
        $api_csgo_url = "http://localhost/Web%20Development/public_html/api/objects/readCsgo.php";
        $json_csgo_data = file_get_contents($api_csgo_url);
        $csgo_data = json_decode($json_csgo_data);

        if (count($csgo_data->records)) {
            echo "<div class='row'>";
            foreach ($csgo_data->records as $idx => $records) {
                echo "<div class='col-sm-3 p-3 news-item' data-category='csgo'>";
                echo "<a href='news_detail.php?id=$records->id' class='custom-link'>";
                echo "<img src='uploaded_img/$records->img' alt='Latest News'/>";
                echo "<p>$records->title</p>";
                echo "</a>";
                echo "</div>";
            }
            echo "</div>";
        }
        ?>

        <?php
        $api_dota_url = "http://localhost/Web%20Development/public_html/api/objects/readDota.php";
        $json_dota_data = file_get_contents($api_dota_url);
        $dota_data = json_decode($json_dota_data);

        if (count($dota_data->records)) {
            echo "<div class='row'>";
            foreach ($dota_data->records as $idx => $records) {
                echo "<div class='col-sm-3 p-3 news-item' data-category='dota'>";
                echo "<a href='news_detail.php?id=$records->id' class='custom-link'>";
                echo "<img src='uploaded_img/$records->img' alt='Latest News'/>";
                echo "<p>$records->title</p>";
                echo "</a>";
                echo "</div>";
            }
            echo "</div>";
        }
        ?>

        <?php
        $api_valorant_url = "http://localhost/Web%20Development/public_html/api/objects/readValorant.php";
        $json_valorant_data = file_get_contents($api_valorant_url);
        $valorant_data = json_decode($json_valorant_data);

        if (count($valorant_data->records)) {
            echo "<div class='row'>";
            foreach ($valorant_data->records as $idx => $records) {
                echo "<div class='col-sm-3 p-3 news-item' data-category='valorant'>";
                echo "<a href='news_detail.php?id=$records->id' class='custom-link'>";
                echo "<img src='uploaded_img/$records->img' alt='Latest News'/>";
                echo "<p>$records->title</p>";
                echo "</a>";
                echo "</div>";
            }
            echo "</div>";
        }
        ?>
    </div><br><br>
    
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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
  $('.filter li').click(function () {
    const filterValue = $(this).attr('data-filter');
    $('.news-item').removeClass('active');

    if (filterValue === '*') {
      $('.news-item').addClass('active');
    } else {
      $('.news-item').removeClass('active');
      $(`.news-item[data-category="${filterValue}"]`).addClass('active');
    }

    $('.filter li').removeClass('active');
    $(this).addClass('active');

    // Adjust the height of the filtered row
    adjustRowHeight();
  });

  // Show all news items initially
  $('.news-item').addClass('active');

  // Adjust row height on page load
  adjustRowHeight();

  // Adjust row height on window resize
  $(window).resize(function () {
    adjustRowHeight();
  });

  // Function to adjust the height of filtered row
  function adjustRowHeight() {
    $('.row').each(function () {
      var maxHeight = 0;
      $(this).find('.news-item.active').each(function () {
        var itemHeight = $(this).height();
        if (itemHeight > maxHeight) {
          maxHeight = itemHeight;
        }
      });
      $(this).find('.news-item').css('min-height', maxHeight);
    });
  }
});
    </script>

</body>

</html>