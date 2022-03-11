<?php

@include 'config.php';

if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pwd = md5($_POST['password']);
   $cpwd = md5($_POST['cpassword']);
   $user_type = $_POST['user_type'];

   $select = " SELECT * FROM user_form WHERE email = '$email' && password = '$pwd' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $error[] = 'user already exist!';

   }else{

      if($pwd != $cpwd){
         $error[] = 'password not matched!';
      }else{
         $insert = "INSERT INTO user_form(name, email, password, user_type) VALUES('$name','$email','$pwd','$user_type')";
         mysqli_query($conn, $insert);
         header('location:headadmin.php');
      }
   }

};

session_start();

if(!isset($_SESSION['Head Admin_name'])){
   header('location:login_form.php');
}

?>

<!DOCTYPE html>
<html lang="en">


<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Admin Dashboard</title>

  
   <link rel="stylesheet" href="css/admDashboardStyle.css">

</head>
<body>
<h1>Welcome <span><?php echo $_SESSION['Head Admin_name'] ?></span></h1>
<div class="user-table">
   <table>
            <tr>   
               <th>Name</th>
               <th>Email</th>
               <th>Role</th>
               <th>Action</th>
            </tr>
            <?php

            $res=mysqli_query($conn, "select * from user_form");
            while($row=mysqli_fetch_array($res))
            {
               echo "<tr>";
               echo "<td>"; echo $row["name"]; echo "</td>";
               echo "<td>"; echo $row["email"]; echo "</td>";
               echo "<td>"; echo $row["user_type"]; echo "</td>";
               echo "<td>"; ?> <span class="action_btn"><a href="edit.php?id=<?php echo $row["id"]; ?>">Edit</a><a href="delete.php?id=<?php echo $row["id"]; ?>">Remove</a></span> <?php echo "</td>";
            }
            ?>
   </table>
</div>


<div class="container">
   
   <div class="header">
      <h1>Create Users</h1>
   </div>
   <div class="main">
      <form action="" method="post">
         <?php
         if(isset($error)){
            foreach($error as $error){
               echo '<span class="error-msg">'.$error.'</span>';
            };
         };
         ?>
         <input type="text" name="name" required placeholder="enter your name">
         <input type="email" name="email" required placeholder="enter your email">
         <input type="password" name="password" required placeholder="enter your password">
         <input type="password" name="cpassword" required placeholder="confirm your password">
         <select name="user_type">
            <option value="Cashier Admin">Cashier Admin</option>
            <option value="Head Admin">Head Admin</option>
            <option value="Manager">Manager</option>
            <option value="Pharmacist Admin">Pharmacist Admin</option>
         </select>
         <button type="submit" name="submit" value="Add User">Create User</button>
         <a href="logout.php" class="btn">logout</a>
      </form>
   </div>
</div>
   
   
</body>
</html>