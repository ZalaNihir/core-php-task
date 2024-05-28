<?php
include 'config/dbconnection.php';
session_start();
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
    <div class="wrapper" id="wrapper">
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
                <div class="homepage">
                    <h1 align=center>Our Products</h1>
                    <div class="line"></div>
                    <div class="ibox">

                        <?php

                        $sql = mysqli_query($conn, "SELECT * FROM products");
                        while ($row = mysqli_fetch_assoc($sql)) {
                        ?>
                            <div class="img" onclick="window.location.href='products.php?id=<?php echo $row['product_id']; ?>'">
                                <img src="<?php echo $row['product_image']; ?>" alt="<?php echo $row['product_image']; ?>">
                                <p><?php echo $row['product_name'], $row['product_id']; ?></p>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
            <style>
                .category {
                    width: 100%;
                    margin: auto;
                    background-color: #343a40;
                }

                #items {
                    display: flex;
                    flex-wrap: wrap;
                    padding: 2vw;
                    align-items: center;
                    justify-content: center;
                }

                #items h4 {
                    padding: 0 2vw;
                }

                #items h4 a {
                    padding: 2vw 0;
                    text-decoration: none;
                    color: #fbb710;
                    transition: all 0.6s ease-in-out;
                }

                #items h4 a:hover {
                    color: #fff;
                }
            </style>
            <div class="category">
                <div class="cobx">
                    <h2 align=center style="padding: 1% 0;color: white;">All Categories</h2>
                    <div id="items">
                        <?php
                        $category = "SELECT * FROM category";
                        $exec = mysqli_query($conn, $category);
                        while ($row = mysqli_fetch_assoc($exec)) {
                        ?>
                            <h4><a href="./shop.php?id=<?php echo $row['id']; ?>"><?php echo $row['name']; ?></a></h4>
                        <?php
                        }
                        ?>
                    </div>
                    </.>
                </div>
        </main>


        <footer>
            <strong>Copyright &copy; 2003-2024 <a href="./index.php">JaydevM</a>.</strong>
            All rights reserved.
        </footer>
    </div>
</body>

</html>