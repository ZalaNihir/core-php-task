<?php
include 'connection.php';
session_start();

if (isset($_POST['login'])) {
    $name = $_POST['name'];
    $password = $_POST['password'];

    $name_pass_check = "SELECT * FROM sessionform WHERE name='$name' && password='$password'";
    $run = mysqli_query($conn, $name_pass_check);
    $row = mysqli_fetch_assoc($run);

    if ($row) {
        $_SESSION['name'] = $row['name'];
        $_SESSION['password'] = $row['password'];
        header("location:welcome.php?name=$name");
    }

    // if ($row['name']==$name && $row['password']==$password) {
    //     $_SESSION['name'] = $row['name'];
    //     $_SESSION['password'] = $row['password'];
    //     header('location:welcome.php');
    // }
    else {
        echo "<h2>Data not Found!</h2>";
    }
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
    <link rel="stylesheet" href="./css/style.css">
    <style>
        .container {
            height: 55vh;
            margin-top: 6%;
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
        </form>
    </div>
</body>

</html>