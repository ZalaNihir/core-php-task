<?php include 'config/dbconnection.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-COM</title>
    <link rel="stylesheet" href="include/css/main.css">
    <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <header>
            <nav>
                <a href="index.php">
                    <h1>E-COMMERCE</h1>
                </a>
                <div class="navlink">
                    <a href="index.php">
                        <h4>Home</h4>
                    </a>
                    <a href="shop.php">
                        <h4>Shop</h4>
                    </a>
                    <a href="addtocart.php">
                        <h4>Cart</h4>
                    </a>
                    <a href="wishlist.php">
                        <h4><?php
                            if (isset($_SESSION['user'])) {
                                echo"<i class='fas fa-heart'></i>";
                            }?></h4>
                    </a>
                    <a href="logout.php" id="log">
                        <h4><?php
                            session_start();
                            if (isset($_SESSION['user'])) {
                                echo "Logout";
                            } else {
                                echo "<script>document.write('Login');</script>";
                            }
                            ?></h4>
                    </a>
                </div>
            </nav>
        </header>

        <main>
            <div class="content">
                <div class="display">
                    <form action="addtocart.php" method="post">
                        <?php

                        if (isset($_GET['id'])) {
                            $id = $_GET['id'];

                            $sql = "SELECT * FROM products WHERE product_id='$id'";
                            $row = mysqli_fetch_assoc(mysqli_query($conn, $sql));
                        } else {
                            header('location:shop.php');
                        }
                        ?>
                        <div class="form">
                            <input type="hidden" name="pid" id="pid" value="<?php echo $row['product_id']; ?>">
                            <div id="img">
                                <img src="<?php echo $row['product_image']; ?>" width="100%" alt="">
                            </div>
                            <div id="info">
                                <h1 align=center><?php echo $row['product_name']; ?></h1>
                                <div class="inputbox">
                                    <h4>Description</h4>
                                    <p name="desc"><?php echo $row['product_desc']; ?></p>
                                </div>
                                <div class="inputbox" style="margin-top: 5%;">
                                    <div class="box">
                                        <h4>Price</h4>
                                        <input type="number" value="<?php echo $row['product_price']; ?>" readonly>
                                    </div>
                                    <div class="box">
                                        <h4>Quantity</h4>
                                        <input type="number" name="qty" min="1" autofocus required>
                                    </div>
                                </div>
                                <div class="inputbox btn">
                                    <input type="submit" name="submit" value="Add to Cart">
                                    <input type="reset" name="reset" value="<?php echo "Cancel"; ?>" onclick="window.location.href='shop.php'">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </main>
        <footer>
            <strong>Copyright &copy; 2003-2024 <a href="./index.php">JaydevM</a>.</strong>
            All rights reserved.
        </footer>
    </div>
</body>

</html>