<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['Pharmacist Admin_name'])){
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
      <h3>hi, <span>Pharmastic Admin</span></h3>
      <h1>welcome <span><?php echo $_SESSION['Pharmacist Admin_name'] ?></span></h1>
      <p>this is an Pharmastic Admin Page</p>
      <a href="logout.php" class="btn">logout</a>
   </div>

</div>

</body>
</html>