<?php

@include 'config.php';

$id = $_GET['edit'];

if(isset($_POST['update_tour'])){

   $tour_title = $_POST['tour_title'];
   $tour_date = date('Y-m-d', strtotime($_POST['date']));
   $tour_venue = $_POST['venue'];
   $tour_contact = $_POST['contact'];
   $tour_description = $_POST['tour_description'];
   $tour_image = $_FILES['tour_image']['name'];
   $tour_type = $_POST['tour_type'];
   $tour_image_tmp_name = $_FILES['tour_image']['tmp_name'];
   $tour_image_folder = 'uploaded_img/'.$tour_image;

   if(empty( $tour_title) || empty($tour_date) || empty($tour_venue) || empty($tour_contact) || empty($tour_description) || empty($tour_image) || empty( $tour_type)){
      $message[] = 'please fill out all';
   }else{
      $update_data = "UPDATE tournaments SET title='$tour_title', date='$tour_date', venue='$tour_venue', contact='$tour_contact', description='$tour_description', type='$tour_type', img='$tour_image' WHERE id = '$id'";
      $upload = mysqli_query($conn, $update_data);

      if($upload){
         move_uploaded_file($tour_image_tmp_name, $tour_image_folder);
         header('location:add_tournaments.php');
      }else{
         $$message[] = 'please fill out all!'; 
      }

   }
};

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="css/style.css">


<style>

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

   </style>

</head>
<body style="background:#F1DAA4;">

<?php
   if(isset($message)){
      foreach($message as $message){
         echo '<span class="message">'.$message.'</span>';
      }
   }
?>

<div class="container">


<div class="admin-news-form-container centered">

   <?php
      
      $select = mysqli_query($conn, "SELECT * FROM tournaments WHERE id = '$id'");
      while($row = mysqli_fetch_assoc($select)){

   ?>
   
   <form action="" method="post" enctype="multipart/form-data">
      <h3 class="title">update the tournament</h3>
      <label for="title" style="font-size:1.7rem;color:white;">News Title :</label><br>
      <input type="text" class="box" name="tour_title" value="<?php echo $row['title']; ?>" placeholder="enter the tournament title">
      <label for="date" style="font-size:1.7rem;color:white;">Date :</label><br>
      <input type="date" id="date" name="date" class="box">
      <label for="venue" style="font-size:1.7rem;color:white;">Tournament Venue :</label><br>
      <input type="text" placeholder="enter tournament venue" name="venue" value="<?php echo $row['venue']; ?>" class="box">
      <label for="contact" style="font-size:1.7rem;color:white;">Contact Email :</label><br>
      <input type="email" placeholder="enter contact email" name="contact" value="<?php echo $row['contact']; ?>" class="box">
      <label for="desc" style="font-size:1.7rem;color:white;">Tournament Description :</label><br>
      <textarea rows="4" cols="50"  placeholder="enter tournament description" name="tour_description" class="box"><?php echo htmlspecialchars($row['description']); ?></textarea>
     <label for="type" style="font-size:1.7rem;color:white;">Tournament Type :</label><br>
         <select id="newst_type" name="tour_type" class="box">
            <option value="league">League</option>
            <option value="csgo">CS:GO</option>
            <option value="dota">Dota 2</option>
            <option value="val">Valorant</option>
         </select>
         <label for="img" style="font-size:1.7rem;color:white;">Image :</label><br>
         <input type="file" accept="image/png, image/jpeg, image/jpg" name="tour_image" class="box">
      <input type="submit" value="update tournament" name="update_tour" class="add-btn">
      <a href="add_tournaments.php" class="add-btn">Go Back</a>
   </form>
   


   <?php }; ?>

   

</div>

</div>

</body>
</html>
