<?php
include 'connection.php';
session_start();

$sql = "select * from sessionform";
$res = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($res);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome <?php echo $_SESSION['name']; ?></title>
</head>

<body>
    <form action="welcome.php" method="post">
        <h1> 
            <?php
             if (isset($_SESSION['name'])) {
                echo "Welcome&nbsp;".$_SESSION['name']."<br>"; 
                echo "<input type='submit' name='logout' value='logout'>";
             }
             else{
                echo"Please Login first <br>";
                echo "<input type='submit' name='login' value='Login'>";
            }

            //For Redirection
            if (isset($_POST['logout'])) {
                header('location:logout.php');
            }
            if (isset($_POST['login'])) {
                header('location:login.php');
            }
             ?></h1>
        
    </form>
</body>

</html>
