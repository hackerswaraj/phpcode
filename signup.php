<?php

if($_SERVER["REQUEST_METHOD"] == "POST")
{
  require 'dbcon.php';
 $user = $_POST["user"];
 $pass = $_POST["pass"];
 $hass=password_hash($pass,PASSWORD_DEFAULT);
 
//  File Insert into database

 $_FILES['image'];
 $file_name = $_FILES['image']['name'];
 $file_size = $_FILES['image']['size'];
 $file_temp = $_FILES['image']['tmp_name'];
 $file_type = $_FILES['image']['type'];
 $dest_file = 'userimage/'. $file_name;
 $my=move_uploaded_file($file_temp,"userimage/".$file_name);

 $sql= "INSERT INTO `swaraj` (`name`, `password` , `user_image`) VALUES ('$user', '$hass' , '$dest_file')" ;
 $result=mysqli_query($conn,$sql);
if(!$result)
{
  echo "<br> Data Not Inserted due to Some Technical Problem";
}
else{
  echo "<br> You have Signed Up Successfully Please Log in";
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign Up Page</title>
</head>
<body>
  <h1>Welcome to Debraj's Website </h1>
  <h2>Please Sign Up to Continue </h2>
  <form action="signup.php" method="POST"  enctype="multipart/form-data">
    <p>Please enter your name</p>
    <input type="text" name="user" placeholder="Enter Your Name">
    <p>Enter Password</p>
    <input type="password" name="pass" placeholder="Enter Password">
    <p>Upload Your Image </P>
    <input type="file" name="image" />
    <br>
    <br>
    
    <input type="submit" value="Sign Up">
  </form>
  <p>Existing User Please <a href="login.php">Log In</a> </p>
</body>
</html>
