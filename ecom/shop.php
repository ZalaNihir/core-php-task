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
    <style>
        .page {
            position: absolute;
            right: 1vw;
            color: grey;
            padding-top: 1%;
            padding-right: 1%;
        }

        .page h4 a {
            color: #fbb710;
        }

        .pro-category {
            display: grid;
            grid-gap: 10px;
            grid-template-columns: repeat(auto-fit, minmax(100px, 1fr));
            grid-auto-rows: 100px;
            grid-auto-flow: dense;
        }

        .wide {
            grid-row: span 1;
            grid-column: span 1;
        }

        .info a {
            text-decoration: none;
        }
    </style>
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
        <div class="page">
            <h4><a href="./index.php">Home</a>/Shop</h4>
        </div>
        <main>
            <div class="content">
                <aside>
                    <h2 align=center>All Categories</h2>
                    <div class="items">
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
                </aside>
                <div class="products">
                    <?php
                    if (isset($_GET['id'])) {
                        $id = $_GET['id'];
                        $select = "SELECT * FROM products where id='$id'";
                        $run = mysqli_query($conn, $select);
                        while ($pro = mysqli_fetch_assoc($run)) {
                    ?>
                            <div class="pbox">
                                <div class="imgs">
                                    <img src="<?php echo $pro['product_image']; ?>" width="100%" alt="<?php echo $pro['product_name']; ?>">
                                </div>
                                <div class="info">
                                    <p><?php echo $pro['product_name']; ?></p>
                                    <p>₹<?php echo $pro['product_price']; ?></p>
                                </div>
                                <div class="addtocart">
                                    <a href="products.php?id=<?php echo $pro['product_id']; ?>">
                                        <h4>Add to cart <svg fill="white" xmlns="http://www.w3.org/2000/svg" height="16" width="18" viewBox="0 0 576 512">
                                                <path d="M0 24C0 10.7 10.7 0 24 0H69.5c22 0 41.5 12.8 50.6 32h411c26.3 0 45.5 25 38.6 50.4l-41 152.3c-8.5 31.4-37 53.3-69.5 53.3H170.7l5.4 28.5c2.2 11.3 12.1 19.5 23.6 19.5H488c13.3 0 24 10.7 24 24s-10.7 24-24 24H199.7c-34.6 0-64.3-24.6-70.7-58.5L77.4 54.5c-.7-3.8-4-6.5-7.9-6.5H24C10.7 48 0 37.3 0 24zM128 464a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm336-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96z" />
                                            </svg></h4>
                                    </a>
                                    <a href="wishlist.php?product_id=<?php echo $pro['product_id']; ?>" style="color: white;"><i class="fas fa-heart"></i></a>
                                </div>
                            </div>
                        <?php
                        }
                    } else {
                        ?>
                        <div class="dispro">
                            <h1 align=center>Product Gallery</h1>
                            <div class="line"></div>
                            <div class="imgbox">
                                <?php

                                $sql = mysqli_query($conn, "SELECT * FROM products");
                                while ($prow = mysqli_fetch_assoc($sql)) {
                                ?>
                                    <div class="imgs">
                                        <img src="<?php echo $prow['product_image']; ?>" width="100%" alt="">
                                    </div>
                                <?php
                                }
                                ?>

                            </div>
                        </div>

                    <?php
                    }
                    ?>
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