<?php
$login=false;
if($_SERVER["REQUEST_METHOD"] == "POST")
{
  require 'dbcon.php';
 $user = $_POST["user"];
 $pass = $_POST["pass"];
 $sql= "select * from swaraj where name='$user'";
 $result = mysqli_query($conn, $sql);
 $num = mysqli_num_rows($result);
 if($num)
 {   $row=mysqli_fetch_assoc($result);
     
       if(password_verify($pass,$row['password']))
       {
        $login=true;
        session_start();
        $_SESSION['loggedin']=true;
        $_SESSION['username']=$user;
        header("location:welcome.php");
       }   
       echo "<br>Invalid Password";
 }
 else{
     echo "<br>Invalid Username";
 }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Log In</title>
</head>
<body>
  <h1>Welcome to Debraj's Website </h1>
  <h2>Please Log In to Continue </h2>
  <form action="login.php" method="POST"  >

    <p> Please enter your name </p>
    <input type="text" name="user" placeholder="Enter Your Name">
    <p>Enter Password</p>

    <input type="password" name="pass" placeholder="Enter Password">
    
    <input type="submit" value="Log In">
  </form>
  <p>If You Have No Account Please <a href="signup.php">Sign Up </a> </p>
  <?php
   if($login)
   {
       echo "<br> You are loged in successfully";
   }
  ?>
</body>
</html>
