<!-- //For delete product -->
<?php
    include 'config/dbconnection.php';

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $del = "DELETE FROM products WHERE product_id='$id'";
        if (mysqli_query($conn,$del)) {
            echo"<script>alert('Product Deleted')</script>";
            echo"<script>window.location.href='admin.php'</script>";
        }
    }

    ?>
