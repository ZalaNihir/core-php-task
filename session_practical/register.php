<?php
include 'connection.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
    <link rel="stylesheet" href="./css/style.css">
    <style>
        form{
            padding: 10px 0;
        }
        .login_box{
            width: 100%;
            padding: 0 11%;
            display: inline-block;
            margin: auto;
        }
        .login_box label{
            width: 50%;
        }
        .login_box .btn{
            width: 30%;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="title">
            <h1 align="center">Registration Form</h1>
        </div>
        <form action="register.php" method="post" autocomplete="on">
            <div class="input_box">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" placeholder="Enter Your Name"  required>
            </div>
            <div class="input_box">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" placeholder="Enter your email Id">
            </div>
            <div class="input_box">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" placeholder="Password">
            </div>
            <div class="input_box">
                <label for="cpassword">Re-enter *</label>
                <input type="password" name="cpassword" id="cpassword" placeholder="Confirm Password">
            </div>
            <div class="input_box">
                <input class="btn" type="submit" name="register" value="Register">
                <input class="btn" type="reset" name="reset" value="Reset">
            </div>
            <div class="input_box login_box">
                <label>Login if already registered! Please</label>
                <input class="btn" type="submit" name="login" value="Login">
            </div>

            <?php
            
            if (isset($_POST['register'])) {
                $name = $_POST['name'];
                $email = $_POST['email'];
                $pass = $_POST['password'];
                $cpass = $_POST['cpassword'];

                $sql = "insert into sessionform (name,email,password,confirmpass) values('$name','$email','$pass','$cpass')";
                
                if ($pass == $cpass) {
                    $res = mysqli_query($conn, $sql);
                    header('location:login.php');
                } else {
                    echo "<h4 style='color:red;'>Password Does not Match!<h4>";
                }
            }
            if (isset($_POST['login'])) {
                header('location:login.php');
            }
            ?>
        </form>
    </div>
</body>

</html>