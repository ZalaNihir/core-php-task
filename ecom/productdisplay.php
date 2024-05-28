<?php
include 'include/header.php';
include 'include/navbar.php';
include 'include/sidebar.php';
include 'config/dbconnection.php';

$id = $_GET['id'];
$sql = "SELECT * FROM products where id='$id'";
$run = mysqli_query($conn, $sql);
?>
<style>
    .DisplayPro {
        width: 80%;
        margin: auto;
        background-color: #343a40;
        border: 2px solid #343a40;
        color: white;
        padding: 1vw;
    }

    .DisplayPro h2 {
        font-weight: 900;
        width: 100%;
        background-color: #0077ff;
        padding: 1vw;
    }
    table th, td{
        text-align: center;
    }
    td{
        font-size: 1.2em;
        font-weight: 500;
        font-family: cursive;
        border-bottom: 2px solid #343a4036;
    }
    
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Display Products</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="./admin.php">Home</a></li>
                        <li class="breadcrumb-item active">Display Products</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content mt-1 mb-4 offset-md-1">
        <div class="card-body bg-dark" style="width:90%;" >
            <table id="example1" class="table">
                <thead>
                    <tr style="color: white;">
                        <th>Id</th>
                        <th>Product Name</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $id = 1;
                    while ($row = mysqli_fetch_assoc($run)) {
                    ?>
                        <tr style="background-color:#dee2e6;color: black;">
                            <td><?php echo $id++; ?></td>
                            <td><?php echo $row['product_name']; ?></td>
                            <td><?php echo $row['product_desc']; ?></td>
                            <td><?php echo $row['product_price']; ?></td>
                            <td><img src="<?php echo $row['product_image']; ?>" width="100px" alt=""></td>
                            <td><a href="productedit.php?id=<?php echo $row['product_id']; ?>" class="btn btn-primary">Edit</a>&nbsp;&nbsp;
                                <a href="productdelete.php?id=<?php echo $row['product_id']; ?>" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </section>

</div>
<?php
include 'include/footer.php';
?>