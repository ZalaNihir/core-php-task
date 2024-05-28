<?php
include 'include/header.php';
include 'include/navbar.php';
include 'include/sidebar.php';
include 'config/dbconnection.php';
?>
<style>
    .editPro {
        width: 80%;
        margin: auto;
        background-color: #343a40;
        border: 2px solid #343a40;
        color: white;
        padding: 1vw;
    }

    .editPro h2 {
        font-weight: 900;
        width: 100%;
        background-color: #0077ff;
        padding: 1vw;
    }

    .input-box {
        margin: 2vw;
    }

    .input-box label {
        font-size: 1.5em;
    }

    .btn {
        font-size: 1.2em;
        width: 100%;
    }
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit Product</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="./admin.php">Home</a></li>
                        <li class="breadcrumb-item active">Edit Product</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content mt-1 mb-4">
        <div class="editPro">
            <h2 align=center>Update Products</h2>
            <form action="productedit.php" method="post" enctype="multipart/form-data">

                <div class="row">
                    <div class="col-md-12">
                        <div class="input-box">

                            <?php
                            if (isset($_GET['id'])) {
                                $id = $_GET['id'];
                                $sel = "SELECT * FROM products where product_id='$id'";
                                $run = mysqli_query($conn, $sel);
                                $output = mysqli_fetch_assoc($run);
                            } else {
                                echo "Something went wrong!!";
                            }
                            ?>
                            <input type="hidden" name="pid" id="pid" value="<?php echo $output['product_id'];?>">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-box form-group">
                                        <label for="name">Product Name</label>
                                    <input type="text" class="form-control" name="productname" value="<?php echo $output['product_name'];?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-box form-group">
                                    <label for="name">Product Description</label>
                                    <input type="text" class="form-control" name="productdesc" value="<?php echo $output['product_desc'];?>">
                                </div>
                            </div>
                        </div>
                            <div class="row">
                            <div class="col-md-6">
                                <div class="input-box form-group">
                                    <label for="name">Select New Image</label>
                                    <input type="file" name="productimg" id="productimg" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-box form-group">
                                    <img src="<?php echo $output['product_image'];?>" width="250px" height="250px" alt="">
                                </div>
                            </div>
                            </div>
                            <div class="row">
                            <div class="col-md-6">
                                <div class="input-box form-group">
                                    <label for="name">Product Price</label>
                                    <input type="number" min="0" class="form-control" name="productprice" value="<?php echo $output['product_price'];?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-box form-group">
                                    <label for="">&nbsp;</label>
                                    <input type="submit" value="Update Product" name="editProduct" class="btn btn-primary">
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>

                </div>

                <?php

                if (isset($_POST['editProduct'])) {
                    $productname = $_POST['productname'];
                    $productdesc = $_POST['productdesc'];
                    $productprice = $_POST['productprice'];

                    $productimg = $_FILES['productimg']['name'];
                    $tmpName = $_FILES['productimg']['tmp_name'];
                    $location = "productimg/" . $productimg;

                    $productid = $_POST['pid'];

                    if (move_uploaded_file($tmpName, $location)) {
                        $addproduct = "UPDATE products SET product_name='$productname',product_desc='$productdesc',product_price='$productprice',product_image='$location' WHERE product_id='$productid'";

                        $add = mysqli_query($conn, $addproduct);
                        if ($add) {
                            echo "<script>window.location.href='admin.php'</script>";
                        } else {
                            echo "<h1 align=center>Product not inserted</h1>";
                        }
                    } else {
                        $addproduct = "UPDATE products SET product_name='$productname',product_desc='$productdesc',product_price='$productprice' WHERE product_id='$productid'";

                        $add = mysqli_query($conn, $addproduct);
                        if ($add) {
                            echo "<script>window.location.href='admin.php'</script>";
                        } else {
                            echo "<h1 align=center>Product not inserted</h1>";
                        }
                    }
                }

                ?>
            </form>
        </div>
    </section>


</div>
<?php
include 'include/footer.php';
?>