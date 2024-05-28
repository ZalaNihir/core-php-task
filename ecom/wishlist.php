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
                            ?>
                        </h4>
                    </a>
                </div>
            </nav>
        </header>

        <main>
            <div class="content">
                <?php
                if (!isset($_SESSION['user'])) {
                    header('Location: login.php');
                    exit();
                }
                $user_id = $_SESSION['user_id'];
                if (isset($_GET['product_id'])) {
                    $product_id = $_GET['product_id'];

                    $wishlist = "INSERT INTO wishlist (user_id,product_id)values('$user_id','$product_id')";
                    if (mysqli_query($conn, $wishlist)) {
                        // echo"<h1 align=center>Product Successfully added to wishlist</h1>";
                        echo "<script>alert('Product Successfully added to wishlist')</script>";
                    }
                }

                $sql = "SELECT * FROM wishlist JOIN products ON products.product_id = wishlist.product_id WHERE user_id='$user_id'";
                $result = mysqli_query($conn, $sql);
                ?>
                <section class="table-container">
                    <div class="table-content">
                        <div class="db-title">
                            <h3>Your Wishlist</h3>
                        </div>

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $num = 1;
                                while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                    <tr>
                                        <td><?php echo $num++; ?></td>
                                        <td><img src="<?php echo $row['product_image']; ?>" width="100px" alt="<?php echo $row['product_image']; ?>"></td>
                                        <td><?php echo $row['product_name']; ?></td>
                                        <td><?php echo $row['product_price']; ?></td>
                                        <td><a href="wishlist.php?userid=<?php echo $row['product_id'];?>">Cancel</a></td>
                                    </tr>
                                    <?php
                                    //cancel wishlist
                                    if (isset($_GET['userid'])) {
                                        $id = $_GET['userid'];
                                        $del = mysqli_query($conn,"DELETE FROM wishlist WHERE product_id='$id'");
                                        if ($del) {
                                            header('location:wishlist.php');
                                        }
                                    }
                                    ?>
                                <?php
                                }
                                ?>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>Total:
                                        <?php
                                        if (isset($_SESSION['user'])) {
                                            $res = "SELECT SUM(products.product_price) FROM wishlist JOIN products ON products.product_id = wishlist.product_id WHERE user_id='$user_id'";
                                            $total = mysqli_fetch_array(mysqli_query($conn, $res));
                                            echo $total[0];
                                        }
                                        ?>
                                    </td>
                                    <td>Buy all</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </section>
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

                </div>
        </main>

        <footer>
            <strong>Copyright &copy; 2003-2024 <a href="./index.php">JaydevM</a>.</strong>
            All rights reserved.
        </footer>
    </div>
</body>

</html>