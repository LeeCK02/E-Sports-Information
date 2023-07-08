<?php

@include 'config.php';

$id = $_GET['edit'];

if(isset($_POST['update_news'])){

   $news_title = $_POST['news_title'];
   $news_description = $_POST['news_description'];
   $news_image = $_FILES['news_image']['name'];
   $news_type = $_POST['news_type'];
   $news_latest = $_POST['news_latest'];
   $news_image_tmp_name = $_FILES['news_image']['tmp_name'];
   $news_image_folder = 'uploaded_img/'.$news_image;

   if(empty($news_title) || empty($news_description) || empty($news_image) || empty($news_latest) || empty($news_type)){
      $message[] = 'please fill out all';
   }else{
      $update_data = "UPDATE news SET title='$news_title', description='$news_description', type='$news_type', latest='$news_latest', img='$news_image' WHERE id = '$id'";
      $upload = mysqli_query($conn, $update_data);

      if($upload){
         move_uploaded_file($news_image_tmp_name, $news_image_folder);
         header('location:add_news.php');
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
      
      $select = mysqli_query($conn, "SELECT * FROM news WHERE id = '$id'");
      while($row = mysqli_fetch_assoc($select)){

   ?>
   
   <form action="" method="post" enctype="multipart/form-data">
      <h3 class="title">update the news</h3>
      <label for="title" style="font-size:1.7rem;color:white;">News Title :</label><br>
      <input type="text" class="box" name="news_title" value="<?php echo $row['title']; ?>" placeholder="enter the news title">
      <label for="desc" style="font-size:1.7rem;color:white;">News Description :</label><br>
      <input type="text"  class="box" name="news_description" value="<?php echo $row['description']; ?>" placeholder="enter the news description">
     <label for="type" style="font-size:1.7rem;color:white;">News Type :</label><br>
         <select id="newst_type" name="news_type" class="box">
            <option value="league">League</option>
            <option value="csgo">CS:GO</option>
            <option value="dota">Dota 2</option>
            <option value="val">Valorant</option>
         </select>
         <label for="type" style="font-size:1.7rem;color:white;">Latest :</label><br>
         <select id="news_latest" name="news_latest" class="box">
            <option value="yes">Yes</option>
            <option value="no">No</option>
         </select>
         <label for="img" style="font-size:1.7rem;color:white;">Image :</label><br>
         <input type="file" accept="image/png, image/jpeg, image/jpg" name="news_image" class="box">
      <input type="submit" value="update news" name="update_news" class="add-btn">
      <a href="add_news.php" class="add-btn">Go Back</a>
   </form>
   


   <?php }; ?>

   

</div>

</div>

</body>
</html>
