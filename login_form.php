<?php
// error_reporting(0);
@include 'config.php';

session_start();
$error = "";
if(isset($_POST['submit'])){
   if(isset($_POST['name'])){
   $name = mysqli_real_escape_string($conn, $_POST['name']);
   }
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pwd = md5($_POST['password']);

   $select = " SELECT * FROM user_form WHERE email = '$email' && password = '$pwd' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $row = mysqli_fetch_array($result);

      if($row['user_type'] == 'Head Admin'){

         $_SESSION['Head Admin_name'] = $row['name'];
         header('location:headadmin.php');

      }
      elseif($row['user_type'] == 'Pharmacist Admin'){

         $_SESSION['Pharmacist Admin_name'] = $row['name'];
         header('location:Pharmacist_Admin.php');

      }
      elseif($row['user_type'] == 'Cashier Admin'){

         $_SESSION['CashierAdmin_name'] = $row['name'];
         header('location:Cashier_Admin.php');

      }
      elseif($row['user_type'] == 'Manager'){

         $_SESSION['Manager_name'] = $row['name'];
         header('location:Manager.php');
      }
   
   }else{
      $error = "Incorrect Email or Password!";
    }
};
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>login form</title>

   <!-- custom css file link  -->
   <script src="https://kit.fontawesome.com/ad9fea2c2b.js" crossorigin="anonymous"></script>
   <link rel="stylesheet" href="css/loginstyle.css">

</head>
<body>
   
<div class="container">
   <div class="header">
      <h1>Login</h1>
   </div>
   <div class="main">
      <p class="error"><?php echo $error; ?></p> 
      
      <form action="" method="post">
         
         <span>
            <i class="fa-solid fa-user"></i>
            <input type="email" name="email" required placeholder="enter your email">
         </span><br>
         <span>
            <i class="fa-solid fa-lock"></i>
            <input type="password" name="password" required placeholder="enter your password">
         </span><br>
         <button type="submit" name="submit" value="login">Login</button>
      </form>
   </div>

</div>

</body>
</html>