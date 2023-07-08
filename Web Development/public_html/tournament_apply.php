<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/ClientSide/html.html to edit this template
-->
<?php
    session_start();
    if (!(isset($_SESSION['username']) && $_SESSION['username'] != '')) {
        header("location:login.php");
        die();
    }
    
    @include 'config.php';
    
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    };
    
    if(isset($_POST['apply_tournament'])){
    
   $name = $_POST['name'];
   $username = $_POST['username'];
   $type = $_POST['type'];
   $tournament = $_POST['tournament'];
   $tour_id = $_POST['tour_id'];
   $email = $_POST['email'];
   $contact_num = $_POST['contact_num'];
   $team_name = $_POST['team_name'];
   $player1 = $_POST['player1'];
   $player2 = $_POST['player2'];
   $player3 = $_POST['player3'];
   $player4 = $_POST['player4'];
   $player5 = $_POST['player5'];
   

   if(empty($name) || empty($email) || empty($contact_num) || empty($team_name) || empty($player1) || empty($player2) || empty($player3) || empty($player4) || empty($player5)){
      $message[] = 'please fill out all';
   }else{
      $insert = "INSERT INTO tour_apply(name, username, type, tour_name, tour_id, email, contact, team_name, p1_name, p2_name, p3_name, p4_name, p5_name) VALUES('$name', '$username', '$type', '$tournament', '$tour_id', '$email', '$contact_num', '$team_name', '$player1', '$player2', '$player3', '$player4', '$player5')";
      $upload = mysqli_query($conn,$insert);
      if($upload){
         $message[] = 'form applied successfully';
         header("Location: tournament.php");
         
      }else{
         $message[] = 'could not add the news';
      }
   }

};
    
?>

<style>
    
 /* Center the form container */
div {
  display: flex;
  justify-content: center;
  align-items: center;
  min-height: 100vh;
}

/* Style the form */
form {
  display: flex;
  flex-direction: column;
  align-items: center;
  width: 80%;
  max-width: 600px;
  background-color: #f2f2f2;
  padding: 20px;
  border-radius: 10px;
  box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
}

/* Style the form title */
h1 {
  text-align: center;
}

/* Style the form inputs and labels */
label {
  margin-top: 10px;
  margin-bottom: 5px;
  font-weight: bold;
}

input,
select {
  padding: 10px;
  margin-bottom: 20px;
  width: 100%;
  border-radius: 5px;
  border: none;
  box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.2);
  font-size: 16px;
}

input:focus,
select:focus {
  outline: none;
  box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);
}

/* Style the submit button */
input[type="submit"] {
  background-color: #4CAF50;
  color: white;
  cursor: pointer;
}

input[type="submit"]:hover {
  background-color: #3e8e41;
}

/* Style the error message */
input:invalid {
  border-color: red;
}

input:invalid:focus {
  box-shadow: none;
}
    
</style>

<html>
    <head>
        <title>Tournament Application Form</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="js/main.js"></script>
    </head>
    <body>
        
         <?php

    $select_tour = mysqli_query($conn, "SELECT * FROM tournaments WHERE id = '$id'");
    $row = mysqli_fetch_assoc($select_tour);

    ?>
        
        <h1>Tournament Application Form</h1>
        <div>
            <!-- Form Element -->
            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
              <!-- Name Input -->
              <label for="name">Name:</label>
              <input type="text" id="name" name="name" required>

              <!-- Username Input -->
              <label for="username">Username:</label>
              <input type="text" id="show_username" name="show_username" value="<?php echo $_SESSION['username']; ?>" disabled="disabled">
              <input type="hidden" name="username" value="<?php echo $_SESSION['username']; ?>">

              <!-- Games Type Select -->
              <label for="games">Games Type:</label>
              <input type="text" id="show_type" name="show_type" value="<?php echo $row['type']; ?>" disabled="disabled">
              <input type="hidden" name="type" value="<?php echo $row['type']; ?>">
              
              <!-- Tournament -->
              <label for="tournament">Tournament:</label>
              <input type="text" id="show_tournament" name="show_tournament" value="<?php echo $row['title']; ?>" disabled="disabled">
              <input type="hidden" name="tournament" value="<?php echo $row['title']; ?>">
              
              <label for="email">Email Address:</label>
              <input type="email" id="email" name="email" required>
              
              <label for="contact_num">Contact Number::</label>
              <input type="text" id="contact_num" name="contact_num" required>

              <!-- Team Name Input -->
              <label for="team_name">Team Name:</label>
              <input type="text" id="team_name" name="team_name" required>

              <!-- Player 1 Name Input -->
              <label for="player1">Player 1 Name:</label>
              <input type="text" id="player1" name="player1" required>

              <!-- Player 2 Name Input -->
              <label for="player2">Player 2 Name:</label>
              <input type="text" id="player2" name="player2" required>

              <!-- Player 3 Name Input -->
              <label for="player3">Player 3 Name:</label>
              <input type="text" id="player3" name="player3" required>

              <!-- Player 4 Name Input -->
              <label for="player4">Player 4 Name:</label>
              <input type="text" id="player4" name="player4" required>

              <!-- Player 5 Name Input -->
              <label for="player5">Player 5 Name:</label>
              <input type="text" id="player5" name="player5" required>
              
              <input type="hidden" name="tour_id" value="<?php echo $row['id']; ?>">

              <!-- Submit Button -->
              <input type="submit" name="apply_tournament" value="Apply">
            </form>
        </div>
    </body>
</html>
