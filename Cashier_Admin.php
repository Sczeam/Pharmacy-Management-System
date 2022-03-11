<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['CashierAdmin_name'])){
   header('location:login_form.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  
   <title>Cashier Admin page</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>

<div class="container">

   <div class="content">
      <h3>hi, <span>Cashier Admin</span></h3>
      <h1>welcome <span><?php echo $_SESSION['CashierAdmin_name'] ?></span></h1>
      <p>this is Cashier Admin Page</p>
      <a href="logout.php" class="btn">logout</a>
   </div>

</div>

</body>
</html>
