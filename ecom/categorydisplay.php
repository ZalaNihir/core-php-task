<?php
include 'include/header.php';
include 'include/navbar.php';
include 'include/sidebar.php';
include 'config/dbconnection.php';
?>
<style>
    .addCat {
        width: 50%;
        margin: auto;
        background-color: #343a40;
        border: 2px solid #343a40;
        color: white;
        padding: 1vw;
    }

    .addCat h2 {
        font-weight: 900;
        width: 100%;
        background-color: #0077ff;
        padding: 1vw;
    }

    .input-box {
        width: 80%;
        margin: 2vw auto;
        /* background-color: red; */
    }

    .input-box label {
        font-size: 1.5em;
    }
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Category</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="./admin.php">Home</a></li>
                        <li class="breadcrumb-item active">Display Category</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content mt-3">
        
            <?php
            if (isset($_POST['addCategory'])) {
                $id = $_GET['id'];
                $displayCategory = "SELECT name FROM category WHERE id='$id'";
                $run = mysqli_query($conn, $displayCategory);

            }
            ?>
            <div class="addCat">
            <h2 align=center>Category</h2>
        </div>
    </section>


</div>
<?php
include 'include/footer.php';
?>