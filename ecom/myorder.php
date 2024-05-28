<?php
include 'config/dbconnection.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-COM</title>
    <link rel="stylesheet" href="include/css/main.css">
    <link rel="stylesheet" href="include/css/order.css">
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
                            session_start();
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
                <div class="order">
                    <h1 align=center>Manage Your Orders</h1>
                    <div class="orderbox">
                        <table>
                            <thead>
                                <tr>
                                    <th>S.no</th>
                                    <th>Product Name</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th>Manage</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (isset($_POST['id'])) {
                                    $orderid = $_POST['id'];
                                    $qty = $_POST['qty'];
                                    $total = $_POST['total'];

                                    $cart = "SELECT * FROM products WHERE product_id='$orderid'";
                                    $can = mysqli_query($conn, $cart);
                                    $sno = 1;
                                    while ($crow = mysqli_fetch_assoc($can)) {
                                ?>
                                        <tr>
                                            <td><?php echo $sno++; ?></td>
                                            <td><?php echo $crow['product_name']; ?></td>
                                            <td><?php echo $crow['product_price']; ?></td>
                                            <td><?php echo $qty; ?></td>
                                            <td><?php echo $total; ?></td>
                                            <td style="border-bottom: none;"><a href="shop.php">Cancel</a></td>
                                        </tr>
                                <?php
                                    }
                                } else {
                                    echo "<tr>
                                        <td colspan='6' align=center><h1>Total Order = 0</h1></td>
                                    </tr>";
                                }
                                ?>
                            </tbody>
                        </table> 
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

                </div>
        </main>

        <footer>
            <strong>Copyright &copy; 2003-2024 <a href="./index.php">JaydevM</a>.</strong>
            All rights reserved.
        </footer>
    </div>
</body>

</html>