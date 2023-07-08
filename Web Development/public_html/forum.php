<?php declare(strict_types=1) ?>
<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/ClientSide/html.html to edit this template
-->

<?php
    session_start();
    
    @include 'config.php';
    
    if(isset($_POST['create_post'])){
        
        if (!(isset($_SESSION['username']) && $_SESSION['username'] != '')) {
            echo "<script>alert('Please login create forum!');</script>";
            echo "<script>window.location.href = 'login.php';</script>";
            die();
        }
    
        $title = $_POST['post_title'];
        $content = $_POST['post_content'];
        $username = $_SESSION['username'];
        $date = date("Y/m/d");
        $user_id = $_SESSION['id'];


        if(empty($title) || empty($content)){
           $message[] = 'please fill out all';
        }else{
           $insert = "INSERT INTO forum(title, content, username, date, user_id) VALUES('$title', '$content', '$username', '$date', '$user_id')";
           $upload = mysqli_query($conn,$insert);
           if($upload){
              echo "<script>alert('Forum created sucessfully!');</script>";
              echo "<script>window.location.href = 'forum.php';</script>";

           }else{
              echo "<script>alert('could not create the post>";
           }
        }

     };
     
     if(isset($_POST['submit_reply'])){
        
        if (!(isset($_SESSION['username']) && $_SESSION['username'] != '')) {
            echo "<script>alert('Please login to reply forum!');</script>";
            echo "<script>window.location.href = 'login.php';</script>";
            die();
        }
    
        $reply_title = $_POST['reply_title'];
        $reply_content = $_POST['reply_content'];
        $username = $_SESSION['username'];
        $date = date("Y/m/d");
        $forum_id = $_POST['forum_id'];
        $user_id = $_SESSION['id'];


        if(empty($reply_title) || empty($reply_content)){
           $message[] = 'please fill out all';
        }else{
           $insert = "INSERT INTO forum_reply(title, content, username, date, forum_id ,user_id) VALUES('$reply_title', '$reply_content', '$username', '$date', '$forum_id', '$user_id')";
           $upload = mysqli_query($conn,$insert);
           if($upload){
              echo "<script>alert('Replied post sucessfully!');</script>";
              echo "<script>window.location.href = 'forum.php';</script>";

           }else{
              echo "<script>alert('could not create the reply>";
           }
        }

     };
?>

<style>

/* Style the reply button */
.review button {
  background-color: #008080;
  color: white;
  margin-top: 10px;
  border: none;
  border-radius: 5px;
  padding: 5px 10px;
  cursor: pointer;
  font-size: 16px;
}

.review button:hover {
  background-color: white;
  color: #008080;
  border: 1px solid #008080;
}

/* Style the create post section */
.post-review h2 {
  font-size: 20px;
  margin-top: 20px;
}

.post-review form {
  margin-top: 20px;
}

.post-review label {
  font-weight: bold;
  display: block;
  margin-bottom: 5px;
}

.post-review input[type="text"],
.post-review textarea {
  padding: 5px;
  font-size: 16px;
  border-radius: 5px;
  border: 1px solid #ddd;
  width: 100%;
  box-sizing: border-box;
  margin-bottom: 10px;
}

.post-review input[type="submit"] {
  background-color: #008080;
  color: white;
  border: none;
  border-radius: 5px;
  padding: 5px 10px;
  cursor: pointer;
  font-size: 16px;
}

.post-review input[type="submit"]:hover {
  background-color: white;
  color: #008080;
  border: 1px solid #008080;
}

.review{
    margin-bottom: 40px;
    border: 1px solid;
    padding: 10px;
    margin-left: 20px;
}

.post-review{
    margin-left: 20px;
}
    
    .modal-dialog {
        max-width: 500px;
        margin: 1.75rem auto;
    }

    .modal-content {
        padding: 20px;
    }

    .modal-title {
        margin-bottom: 15px;
    }

    .modal-body label {
        font-weight: bold;
    }

    .modal-body input[type="text"],
    .modal-body textarea {
        width: 100%;
        padding: 5px;
        font-size: 16px;
        border-radius: 5px;
        border: 1px solid #ddd;
        margin-bottom: 10px;
    }

    .modal-footer {
        justify-content: flex-start;
    }

    .modal-footer button {
        background-color: #008080;
        color: white;
        border: none;
        border-radius: 5px;
        padding: 5px 10px;
        cursor: pointer;
        font-size: 16px;
    }

    .modal-footer button:hover {
        background-color: white;
        color: #008080;
        border: 1px solid #008080;
    }


</style>

<html>
    <head>
        <title>Forum</title>
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
            <img src="img/E-sports_icon.png" alt="icon" style="height:40px; width:40px;"/>&nbsp;&nbsp;&nbsp;
            <h3 style="color:#ff0066;">E-Sports Information</h3>
             <div class="navbar">
                <a href="index.php">Home</a>
                <a href="news.php">News</a>
                <a href="forum.php" class="active">Forum</a>
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
        
    <h1 style="padding: 20px; margin: 0;">Forum</h1>
    
    <button type="submit" style="background-color: red; color:#fff; border:none; border-radius: 5px; padding: 10px 10px; margin-left: 20px; margin-bottom: 30px;" onclick="postReview();">Create A New Post</button>
        <div id="post-review" class="post-review" style="display: none; padding: 10px 10px; border: 1px solid; margin-top: 30px; margin-bottom: 60px;">
            <h2 style='float:left;'>Create a New Post</h2>
            <button type="submit" style="background-color: red; color:#fff; border:none; border-radius: 5px; padding: 7px 7px; margin-left:30px; margin-top: 8px;" onclick="hideReview();">Hide</button>
            <form action="" method="post">
                <label for="post-title">Title</label>
                <input type="text" id="post_title" name="post_title" required>
                <br>
                <label for="post-content">Content</label>
                <textarea id="post_content" name="post_content" rows="4" required></textarea>
                <br>
                <input type="submit" name="create_post" value="Post">
            </form>
        </div>
    
    <div>
        <?php

            $select_forum = mysqli_query($conn, "SELECT * FROM forum");          

        ?>
        <?php while($row = mysqli_fetch_assoc($select_forum)){ ?>
        <div class="review">
            <div><b><?php echo $row['title']; ?></b></div>
            <div><?php echo $row['content']; ?></div>
            <div>Posted by: <?php echo $row['username']; ?></div>
            <div>Posted on: <?php echo $row['date']; ?></div>
            <button class="reply-btn" type="button" data-bs-toggle="modal" data-bs-target="#replyModal<?php echo $row['id']; ?>">Reply</button>
            <button data-bs-toggle="collapse" data-bs-target="#reply<?php echo $row['id']; ?>">View Replies</button>
            <div id="reply<?php echo $row['id']; ?>" class="collapse">
                <?php
                    $select_reply = mysqli_query($conn, "SELECT * FROM forum_reply WHERE forum_id=" . $row['id']);
                ?>
                <?php while($reply_row = mysqli_fetch_assoc($select_reply)){ ?>
                <hr style="margin-top: 20px;">
                <div><b><?php echo $reply_row['title']; ?></b></div>
                <div><?php echo $reply_row['content']; ?></div>
                <div>Replied by: <?php echo $reply_row['username']; ?></div>
                <div>Replied on: <?php echo $reply_row['date']; ?></div>
                <?php } ?>       
            </div>
        </div>
        
        <!-- Reply Modal -->
        <div class="modal fade" id="replyModal<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="replyModalLabel<?php echo $row['id']; ?>" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="replyModalLabel<?php echo $row['id']; ?>">Reply</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="" method="post">
                            <label for="reply_to">Reply To</label>
                            <input type="text" name="replyto" value="<?php echo $row['title']; ?>" disabled="disabled">
                            <label for="reply_title">Reply Title</label>
                            <input type="text" name="reply_title" required>
                            <label for="reply_content">Reply Content</label>
                            <textarea name="reply_content" rows="4" required></textarea>
                            <input type="hidden" name="forum_id" value="<?php echo $row['id']; ?>">
                            <input type="submit" name="submit_reply" value="Reply">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
         <?php } ?>
        
        
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
