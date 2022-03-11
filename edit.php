<?php

@include 'config.php';

session_start();

$id=$_GET["id"];
$name="";
$password="";
$email="";
$user_type="";

$res=mysqli_query($conn,"select * from user_form where id=$id");
while($row=mysqli_fetch_array($res))
{
    $name=$row["name"];
    $email=$row["email"];
    $password=$row["password"];
    $user_type=$row["user_type"];
}
?>

<!DOCTYPE html>
<html lang="en">


<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>register form</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/updateuser.css">

</head>
<body>

   <div class="container">
      <div class="header">
         <h1>Edit Users</h1>
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
            <input type="text" name="name" required placeholder="enter your name" value="<?php echo $name; ?>">
            <input type="email" name="email" required placeholder="enter your email" value="<?php echo $email; ?>">
            <input type="password" name="password" required placeholder="enter your password" value="<?php echo $password; ?>">
            
            <select name="user_type" value="<?php echo $user_type; ?> ">
            <option value="Cashier Admin">Cashier Admin</option>
            <option value="Head Admin">Head Admin</option>
            <option value="Manager">Manager</option>
            <option value="Pharmacist Admin">Pharmacist Admin</option>
            </select>
            <button type="submit" name="update" value="Update">Update</button><br>
            <a href="headadmin.php" class="btn">Go back</a>
         </form>
      </div>
      
   </div>  
</body>
<?php
if(isset($_POST["update"]))
{
    mysqli_query($conn, "update user_form set name='$_POST[name]', email='$_POST[email]', password=md5('$_POST[password]'), user_type='$_POST[user_type]' where id=$id");



?>
<script type="text/javascript">
    window.location="headadmin.php"
</script>
<?php
}
?>
</html>