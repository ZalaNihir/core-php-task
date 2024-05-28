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
                    <h1 class="m-0">Add Category</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="./admin.php">Home</a></li>
                        <li class="breadcrumb-item active">Add Category</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content mt-3">

        <?php
        if (isset($_POST['addCategory'])) {
                $name = $_POST['categoryname'];
                $addCategory = "INSERT INTO category (name) values('$name')";
                $run = mysqli_query($conn, $addCategory);

                if ($run) {
                    // echo "<h4 align=center>Category added successfully</h4>";
                    echo "<script>alert('Category Added Successfully')</script>";
                } else {
                    echo "<h4 align=center>Oops something went wrong!</h4>";
                }
            }
            
        if (isset($_POST['deleteCategory'])) {
            echo "<script>window.location.href='categorydelete.php'</script>";
        }
        ?>
        <div class="addCat">
            <h2 align=center>New Category</h2>
            <form action="category.php" method="post">
                <div class="input-box form-group">
                    <label for="name"><i class="nav-icon fas fa-copy"></i> Category Name</label>
                    <input type="text" class="form-control" name="categoryname" placeholder="Add Category Name">
                </div>
                <div class="input-box">
                    <input type="submit" value="Add Category" name="addCategory" class="btn btn-primary">&nbsp;
                    <input type="submit" value="Delete Category" name="deleteCategory" class="btn btn-danger">
                </div>
            </form>
        </div>
    </section>


</div>
<?php
include 'include/footer.php';
?>