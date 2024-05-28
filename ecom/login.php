<?php
include 'config/dbconnection.php';
session_start();

if (isset($_POST['login'])) {
    $name = $_POST['name'];
    $password = $_POST['password'];

    //For users
    $usersql = "SELECT * FROM users WHERE name='$name' AND password='$password'";
    $userexec = mysqli_query($conn, $usersql);
    $user = mysqli_fetch_assoc($userexec);

    //For admin
    $adminsql = "SELECT * FROM admin WHERE admin='$name' AND password='$password'";
    $adminexec = mysqli_query($conn, $adminsql);
    $admin = mysqli_fetch_assoc($adminexec);

    if ($admin) {
        $_SESSION['admin'] = $admin['admin'];
        $_SESSION['password'] = $admin['password'];
        header('location: admin.php');
    } else if ($user) {
        $_SESSION['user'] = $user['name'];
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['password'] = $user['password'];
        echo "<script>window.location.href='index.php'</script>";
    } 
    // else {
    //     echo "<h2 align=center style='color:red;'>Username and Password is not Valid</h2>";
    // }
}

if (isset($_POST['register'])) {
    header('location:register.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="include/css/style.css">
    <style>
        .container {
            height: 55vh;
            position: absolute;
            top: 40%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="title">
            <h1 align="center">Login Form</h1>
        </div>
        <form action="login.php" method="post">
            <div class="input_box">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" placeholder="Enter Your Name">
            </div>

            <div class="input_box">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" placeholder="Password">
            </div>

            <div class="input_box">
                <input class="btn" type="submit" name="login" value="Login">
                <input class="btn" type="submit" name="register" value="Register">
            </div>
            <?php
                if (isset($_POST['login'])) {
                    if (!$user || $admin) {
                        echo "<h2 align=center style='color:yellow;'>Username & Password is not Valid</h2>";
                    }
                }
            ?>
        </form>
    </div>
</body>

</html>