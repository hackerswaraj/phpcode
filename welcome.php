<?php
  session_start();
  if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true)
  {
     header("location:login.php");
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome Page</title>
</head>

<body>

    <?php
     $userwelcome=$_SESSION['username'];
     ?>

    <h1> Welcome <?php echo $userwelcome; ?></h1>
    <br>
    <p>Hi <?php echo $userwelcome ?> this is your profile pic:</p>
    <!-- Image Fetching -->
    <?php
    include 'dbcon.php';
    $selectquery = "select * from swaraj where name='$userwelcome'";
    $query = mysqli_query($conn,$selectquery);
    $result = mysqli_fetch_assoc($query);
    $path = $result['user_image'];
    ?>
    <img src="<?php echo $path ?>" width="250px" height="300px">
    <br>
    <h2><a href="logout.php">Log Out</a></h2>


</body>

</html>