<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/ClientSide/html.html to edit this template
-->
<?php

@include 'config.php';

if(isset($_POST['add_tournament'])){

   $tournament_title = $_POST['tournament_title'];
   $tournament_date = date('Y-m-d', strtotime($_POST['date']));
   $tournament_venue = $_POST['venue'];
   $tournament_contact = $_POST['contact'];
   $tournament_description = $_POST['tournament_description'];
   $tournament_image = $_FILES['tournament_image']['name'];
   $tournament_type = $_POST['tournament_type'];
   $tournament_image_tmp_name = $_FILES['tournament_image']['tmp_name'];
   $tournament_image_folder = 'uploaded_img/'.$tournament_image;

   if(empty($tournament_title) || empty($tournament_date) || empty($tournament_venue) || empty($tournament_contact) || empty($tournament_description) || empty($tournament_image) || empty($tournament_type)){
      $message[] = 'please fill out all';
   }else{
      $insert = "INSERT INTO tournaments(title, date, venue, contact, description, type, img) VALUES('$tournament_title', '$tournament_date', '$tournament_venue', '$tournament_contact', '$tournament_description', '$tournament_type', '$tournament_image')";
      $upload = mysqli_query($conn,$insert);
      if($upload){
         move_uploaded_file($tournament_image_tmp_name, $tournament_image_folder);
         $message[] = 'new news added successfully';
         header("Location: add_tournaments.php");
         
      }else{
         $message[] = 'could not add the news';
      }
   }

};

if(isset($_GET['delete'])){
   $id = $_GET['delete'];
   mysqli_query($conn, "DELETE FROM tournaments WHERE id = $id");
   header('location:add_tournaments.php');
};

?>


<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Add tournament page</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

<style>
   body {
      font-family: "Lato", sans-serif;
   }

   .sidenav {
      height: 100%;
      width: 220px;
      position: fixed;
      z-index: 1;
      top: 0;
      left: 0;
      background-color: black;
      overflow-x: hidden;
      padding-top: 20px;
   }

   .sidenav a {
      text-align: center;
      padding-top: 20px;
      text-decoration: none;
      font-size: 20px;
      color: white;
      display: block;
   }

   h1{
      text-align: center;
      text-decoration: none;
      font-size: 30px;
      color: white;
      display: block;
   }

   .sidenav a:hover {
      color: blue;
   }

   .main {
      margin-left: 200px; /* Same as the width of the sidenav */
   }

   @media screen and (max-height: 450px) {
      .sidenav {padding-top: 15px;}
      .sidenav a {font-size: 18px;}
   }

   .edit-btn {
      display: block;
      width: 140px;
      height:46px;
      cursor: pointer;
      border-radius: 0.5rem;
      margin-top: 1rem;
      margin-left: 20px;
      font-size: 1.7rem;
      padding: 1rem 3rem;
      background-image: radial-gradient(100% 100% at 100% 0, green 0, #59EA76 100%);
      color: var(--white);
      text-align: center;
   }

   .edit-btn:hover{
      background-image: radial-gradient(100% 100% at 100% 0, green 0, #01FEB2 100%);
      transform: translateY(-2px);
   }

   .delete-btn{
      display: block;
      width: 140px;
      height:46px;
      cursor: pointer;
      border-radius: 0.5rem;
      margin-top: 1rem;
      margin-left: 20px;
      font-size: 1.7rem;
      padding: 1rem 3rem;
      background-image: radial-gradient(100% 100% at 100% 0, #FE7B08 0, #FE1965 100%);
      color: var(--white);
      text-align: center;
   }

   .delete-btn:hover{
      background-image: radial-gradient(100% 100% at 100% 0, #FE6D19 0, red 100%);
      transform: translateY(-2px);
   }

   .add-btn {
      align-items: center;
      appearance: none;
      background-image: radial-gradient(100% 100% at 100% 0, #5adaff 0, #5468ff 100%);
      border: 0;
      border-radius: 6px;
      box-shadow: rgba(45, 35, 66, .4) 0 2px 4px,rgba(45, 35, 66, .3) 0 7px 13px -3px,rgba(58, 65, 111, .5) 0 -3px 0 inset;
      box-sizing: border-box;
      color: #fff;
      cursor: pointer;
      display: inline-flex;
      height: 48px;
      justify-content: center;
      line-height: 1;
      list-style: none;
      overflow: hidden;
      padding-left: 16px;
      padding-right: 16px;
      position: relative;
      text-align: left;
      font-size: 18px;
      margin-top: 1rem;
      margin-left: 140px;
      width: 180px;
   }

   .add-btn:hover {
      box-shadow: rgba(45, 35, 66, .4) 0 4px 8px, rgba(45, 35, 66, .3) 0 7px 13px -3px, #3c4fe0 0 -3px 0 inset;
      transform: translateY(-2px);
      background-image: radial-gradient(100% 100% at 100% 0, blue 0, purple 100%);

   }

   .admin-news-form-container form {
      background: linear-gradient(to top, #434343 0%, black 100%);
   }

   .admin-news-form-container form h3 {
    text-transform: uppercase;
    color: white;
    margin-bottom: 1rem;
    text-align: center;
    font-size: 2.5rem;
   }

   .news-display .news-display-table thead{
      background: #C6A95F;
   }

   .news-display .news-display-table td{
   padding:1rem;
   font-size: 1.2rem;
   border-bottom: var(--border);
}


</style>

</head>
<body style="background: #F1DAA4;">

<?php

if(isset($message)){
   foreach($message as $message){
      echo '<span class="message">'.$message.'</span>';
   }
}

?>

<div class="sidenav">
   <h1>Admin</h1>
   <a href="add_news.php" style="padding-top: 100px;">Add News</a>
   <a href="add_tournaments.php">Add Tournaments</a>
   <a href="view_application.php">View Application</a>
   <a href="view_forum.php">View Forum</a>
</div>
   
<div class="container">

   <div class="admin-news-form-container">

      <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
         <h3>add a new tournament</h3>
         <label for="title" style="font-size:1.7rem;color:white;">Tournament Title :</label><br>
         <input type="text" placeholder="enter tournament title" name="tournament_title" class="box">
         <label for="date" style="font-size:1.7rem;color:white;">Date :</label><br>
         <input type="date" id="date" name="date" class="box">
         <label for="venue" style="font-size:1.7rem;color:white;">Tournament Venue :</label><br>
         <input type="text" placeholder="enter tournament venue" name="venue" class="box">
         <label for="contact" style="font-size:1.7rem;color:white;">Contact Email :</label><br>
         <input type="email" placeholder="enter contact email" name="contact" class="box">
         <label for="desc" style="font-size:1.7rem;color:white;">Tournament Description :</label><br>
         <textarea rows="4" cols="50"  placeholder="enter tournament description" name="tournament_description" class="box"></textarea>
         <label for="type" style="font-size:1.7rem;color:white;">Tournament Type :</label><br>
         <select id="tournament_type" name="tournament_type" class="box">
            <option value="league">League</option>
            <option value="csgo">CS:GO</option>
            <option value="dota">Dota 2</option>
            <option value="val">Valorant</option>
         </select>
         <label for="img" style="font-size:1.7rem;color:white;">Image :</label><br>
         <input type="file" accept="image/png, image/jpeg, image/jpg" name="tournament_image" class="box">
         <input type="submit" class="add-btn" name="add_tournament" value="add tournament">
      </form>

   </div>

   <?php

   $select = mysqli_query($conn, "SELECT * FROM tournaments");
   
   ?>
   <div class="news-display" style="margin-left:100px;">
      <h1 style="color:black; padding: 30px;">LIST OF TOURNAMENTS</h1>
      <table class="news-display-table">
         <thead>
         <tr>
            <th>tournament image</th>
            <th>tournament title</th>
            <th>tournament date</th>
            <th>venue</th>
            <th>contact</th>
            <th>description</th>
            <th>type</th>
            <th>edit/delete</th>
         </tr>
         </thead>
         <?php while($row = mysqli_fetch_assoc($select)){ ?>
         <tr>
            <td><img src="uploaded_img/<?php echo $row['img']; ?>" height="100" width="120" alt=""></td>
            <td><?php echo $row['title']; ?></td>
            <td><?php echo $row['date']; ?></td>
            <td><?php echo $row['venue']; ?></td>
            <td><?php echo $row['contact']; ?></td>
            <td><?php echo $row['description']; ?></td>
            <td><?php echo $row['type']; ?></td>
            <td>
               <a href="update_tour.php?edit=<?php echo $row['id']; ?>" class="edit-btn"> <i class="fas fa-edit"></i> edit </a>
               <a href="add_tournaments.php?delete=<?php echo $row['id']; ?>" class="delete-btn"> <i class="fas fa-trash"></i> delete </a>
            </td>
         </tr>
      <?php } ?>
      </table>
   </div>

</div>


</body>
</html>
