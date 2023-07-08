<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/ClientSide/html.html to edit this template
-->
<?php

@include 'config.php';


if (isset($_GET['delete'])) {
  $deleteId = $_GET['delete'];

  // Check if the delete parameter is a forum or reply ID
  $table = '';
  $idColumn = '';
  if (strpos($deleteId, 'f_') === 0) {
    $table = 'forum';
    $idColumn = 'id';
  } elseif (strpos($deleteId, 'r_') === 0) {
    $table = 'forum_reply';
    $idColumn = 'id';
  } else {
    // Invalid delete parameter
    echo "Invalid delete parameter.";
    exit();
  }

  // Remove the table prefix from the deleteId
  $id = substr($deleteId, 2);

  // Delete the record from the corresponding table
  if ($table === 'forum') {
    // Delete the forum and its associated replies
    $deleteQuery = "DELETE forum, forum_reply
                    FROM forum
                    LEFT JOIN forum_reply ON forum.id = forum_reply.forum_id
                    WHERE forum.id = $id";
  } else {
    // Delete only the selected reply
    $deleteQuery = "DELETE FROM $table WHERE $idColumn = $id";
  }

  $deleteResult = mysqli_query($conn, $deleteQuery);

  if ($deleteResult) {
    echo "Record(s) deleted successfully.";
  } else {
    echo "Error deleting the record(s): " . mysqli_error($conn);
  }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Add news page</title>

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

  <?php
$sql = "SELECT f.id as forum_id,
          f.title as forum_title,
          f.content as forum_content,
          f.username as forum_username,
          f.date as forum_date,
          f.user_id as forum_userId,
          r.id as reply_id,
          r.title as reply_title,
          r.content as reply_content,
          r.username as reply_username,
          r.date as reply_date,
          r.forum_id as reply_forumId,
          r.user_id as reply_userId
        FROM forum f
        LEFT JOIN forum_reply r
        ON f.id = r.forum_id
        ORDER BY f.id, r.id"; // Add ORDER BY clause
$select = mysqli_query($conn, $sql);
?>

<div class="news-display" style="margin-left:100px;">
  <h1 style="color:black; padding: 30px;">LIST OF TOURNAMENT APPLICATION</h1>
  <table class="news-display-table">
    <thead>
      <tr>
        <th>Forum Id</th>
        <th>Forum Title</th>
        <th>Forum Content</th>
        <th>Forum Username</th>
        <th>Forum Date</th>
        <th>Forum UserID</th>
        <th>Reply Title</th>
        <th>Reply Content</th>
        <th>Reply Username</th>
        <th>Reply Date</th>
        <th>Reply UserID</th>
        <th>Delete</th>
      </tr>
    </thead>
    <?php
    $previous_forum_id = null; // Track the previous forum ID
    while ($row = mysqli_fetch_assoc($select)) {
      $forum_id = $row['forum_id'];
      if ($previous_forum_id !== $forum_id) {
        // Display forum details
        ?>
        <tr>
          <td><?php echo $row['forum_id']; ?></td>
          <td><?php echo $row['forum_title']; ?></td>
          <td><?php echo $row['forum_content']; ?></td>
          <td><?php echo $row['forum_username']; ?></td>
          <td><?php echo $row['forum_date']; ?></td>
          <td><?php echo $row['forum_userId']; ?></td>
          <td></td> <!-- Placeholder for reply title -->
          <td></td> <!-- Placeholder for reply content -->
          <td></td> <!-- Placeholder for reply username -->
          <td></td> <!-- Placeholder for reply date -->
          <td></td> <!-- Placeholder for reply user ID -->
          <td>
            <a href="view_forum.php?delete=f_<?php echo $row['forum_id']; ?>" class="delete-btn">
              <i class="fas fa-trash"></i> delete
            </a>
          </td>
        </tr>
        <?php
      }
      // Display reply details if reply_id is not null
      if ($row['reply_id']) {
        ?>
        <tr>
          <td><?php echo $row['reply_forumId']; ?></td>
          <td colspan="5"></td>
          <td><?php echo $row['reply_title']; ?></td>
          <td><?php echo $row['reply_content']; ?></td>
          <td><?php echo $row['reply_username']; ?></td>
          <td><?php echo $row['reply_date']; ?></td>
          <td><?php echo $row['reply_userId']; ?></td>
          <td>
            <a href="view_forum.php?delete=r_<?php echo $row['reply_id']; ?>" class="delete-btn">
              <i class="fas fa-trash"></i> delete
            </a>
          </td>
        </tr>
        <?php
      }
      $previous_forum_id = $forum_id; // Update the previous forum ID
    }
    ?>
  </table>
</div>

</div>


</body>
</html>

