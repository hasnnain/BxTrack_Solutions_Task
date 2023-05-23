<?php

@include 'config.php';
session_start();
if(!isset($_SESSION['user_name'])){
   header('location:index.php');
 }
if(isset($_POST['submit'])){
 $oldpass=md5($_POST['oldpass']);
$npassword=md5($_POST['npassword']);
$cpassword=md5($_POST['cpassword']);
$chg_pwd="select * from user where name = '".$_SESSION['user_name']."'";
$result=$conn->query($chg_pwd);
$chg_pwd1=$result->fetch_array();
$data_pwd=$chg_pwd1['password'];
if($data_pwd==$oldpass){
if($npassword==$cpassword){
$update_pwd= "update user set password='".$npassword."' where name = '".$_SESSION['user_name']."'";
if ($conn->query($update_pwd)) {
  ?>

  <script type="text/javascript">
    alert("Password Successfully Changed");
    window.location.href="index.php";
  </script>
  <?php
}else{
$error[]="Password Can not Change !!!";
}
}
else{
$error[]="Your new and Retype Password is not match !!!";
}
}
else
{
$error[]="Your old password is wrong !!!";
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Change Password</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style2.css">

</head>
<body>

<div class="form-container">

   <form action="" method="post">
      <h3>change password</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <input type="password" name="oldpass" required placeholder="enter your current password">
      <input type="password" name="npassword" required placeholder="enter your new password">
      <input type="password" name="cpassword" required placeholder="confirm your password">
      <input type="submit" name="submit" value="change password" class="form-btn">
      <p>go back to<a href="index.php">home page</a></p>
   </form>

</div>

</body>
</html>
