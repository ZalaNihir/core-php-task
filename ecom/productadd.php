<?php
include 'include/header.php';
include 'include/navbar.php';
include 'include/sidebar.php';
include 'config/dbconnection.php';
?>
<style>
    .addPro {
        width: 80%;
        margin: auto;
        background-color: #343a40;
        border: 2px solid #343a40;
        color: white;
        padding: 1vw;
    }

    .addPro h2 {
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
                    <h1 class="m-0">Add Products</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="./admin.php">Home</a></li>
                        <li class="breadcrumb-item active">Add Products</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content mt-1 mb-4">
        <div class="addPro">
            <h2 align=center>New Products</h2>
            <form action="productadd.php" method="post" enctype="multipart/form-data">

                <div class="row">
                    <div class="col-md-12">
                        <div class="input-box">
                            <label for="name">select category</label>
                            <select name="category" id="category" class="form-control">
                                <option selected disabled>select category</option>

                                <?php 
                                $sel = "SELECT * FROM category";
                                $run = mysqli_query($conn,$sel);
                                while ($row = mysqli_fetch_assoc($run)) {
                                    ?>
                                <option value="<?php echo $row['id'];?>"><?php echo $row['name'];?></option>    
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-box form-group">
                            <label for="name">Product Name</label>
                            <input type="text" class="form-control" name="productname" placeholder="Add product Name">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-box form-group">
                            <label for="name">Product Description</label>
                            <input type="text" class="form-control" name="productdesc" placeholder="About product Description">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-box form-group">
                            <label for="name">Product Price</label>
                            <input type="number" min="0" class="form-control" name="productprice" placeholder="Add product Price">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-box form-group">
                            <label for="name">Product Image</label>
                            <input type="file" name="productimg" id="productimg" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-box form-group">
                            <input type="submit" value="Add Product" name="addProduct" class="btn btn-primary">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-box form-group">
                            <input type="reset" value="Reset" class="btn btn-danger">
                        </div>
                    </div>
                </div>

            <?php

            if (isset($_POST['addProduct'])) {
                $productname = $_POST['productname'];
                $productdesc = $_POST['productdesc'];
                $productprice = $_POST['productprice'];
                
                $productimg = $_FILES['productimg']['name'];
                $tmpName = $_FILES['productimg']['tmp_name'];
                $location = "productimg/".$productimg;
                
                $categoryid = $_POST['category'];

                if (move_uploaded_file($tmpName,$location)) {
                    $addproduct = "INSERT INTO products (product_name,product_desc,product_price,product_image,id) values('$productname','$productdesc','$productprice','$location','$categoryid')";

                    $add = mysqli_query($conn,$addproduct);
                    if ($add) {
                        echo "<script>alert('Product add successfully!!...')</script>";
                    }
                    else{
                        echo"<h1 align=center>Product not inserted</h1>";
                    }
                }
                else{
                    $addproduct = "INSERT INTO products (product_name,product_desc,product_price,id) values('$productname','$productdesc','$productprice','$categoryid')";

                    $add = mysqli_query($conn,$addproduct);
                    if ($add) {
                        echo "<script>alert('Product Inserted without Image!!...')</script>";
                    }
                    else{
                        echo"<h1 align=center>Product not inserted</h1>";
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