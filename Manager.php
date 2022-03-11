<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['Manager_name'])){
   header('location:login_form.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  
   <title>user page</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>

<div class="container">

   <div class="content">
      <h3>hi, <span>Manager</span></h3>
      <h1>welcome <span><?php echo $_SESSION['Manager_name'] ?></span></h1>
      <p>this is an Manager Page</p>
      <a href="logout.php" class="btn">logout</a>
   </div>

</div>

</body>
</html>