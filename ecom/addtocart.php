<?php
include 'config/dbconnection.php';
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-COM | Shopping Cart</title>
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
                <section class="table-container">
                    <div class="table-content">
                        <div class="db-title">Shopping - Cart</div>

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>S.no</th>
                                    <th>Name</th>
                                    <th>Image</th>
                                    <th>Description</th>
                                    <th>Price</th>
                                    <th>Qty</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                
                                if (isset($_SESSION['user'])) {

                                    if (isset($_POST['pid'])) {
                                        $cartid = $_POST['pid'];
                                        $cart = "SELECT * FROM products WHERE product_id='$cartid'";
                                        $can = mysqli_query($conn, $cart);
                                        $sno = 1;
                                        while ($crow = mysqli_fetch_assoc($can)) {
                                ?>
                                            <tr>
                                                <td><?php echo $sno++; ?></td>
                                                <td><?php echo $crow['product_name']; ?></td>
                                                <td><img src="<?php echo $crow['product_image']; ?>" width="100px" height="100px" alt="<?php echo $crow['product_image']; ?>"></td>
                                                <td><?php echo $crow['product_desc']; ?></td>
                                                <td><?php echo $crow['product_price']; ?></td>
                                                <td><?php echo $qty = $_POST['qty']; ?></td>
                                                <td><?php echo $total = $crow['product_price'] * $qty; ?></td>
                                            </tr>
                                <?php
                                        }
                                    } else {
                                        echo "<tr><td colspan='7' align=center><h1>Cart is Empty</h1></td></tr>";
                                    }
                                }
                                else{
                                    echo "<script>alert('Login to continue');</script>";
                                    echo "<script>window.location.href='login.php'</script>";
                                    die();
                                }
                                ?>
                            </tbody>
                        </table>
                        <?php
                        if (isset($_POST['pid'])) {
                        ?>
                            <form action="myorder.php" method="post" style="height: fit-content;">
                                <input type="hidden" name="id" value="<?php echo $cartid; ?>">
                                <input type="hidden" name="qty" value="<?php echo $qty; ?>">
                                <input type="hidden" name="total" value="<?php echo $total; ?>">
                                <style>
                                    .buy {
                                        margin: auto;
                                        position: relative;
                                        background-color: #fbb710;
                                        width: fit-content;
                                        text-align: center;
                                        line-height: 30px;
                                    }

                                    #buybtn {
                                        background-color: #fbb710;
                                        border: none;
                                        line-height: 40px;
                                        padding: 0 4vw;
                                        color: #fff;
                                        font-size: 1rem;
                                    }

                                    #buybtn:hover {
                                        background-color: #343a40;
                                        cursor: pointer;
                                    }
                                </style>
                                <div class="buy" onclick="alert('Your Order is Confirmed')">
                                    <input type="submit" value="Buy Now" name="buy" id="buybtn">
                                </div>
                            </form>
                        <?php
                        }
                        ?>
                    </div>
                </section>
            </div>
        </main>


        <footer>
            <strong>Copyright &copy; 2003-2024 <a href="./index.php">JaydevM</a>.</strong>
            All rights reserved.
        </footer>
    </div>
</body>

</html>