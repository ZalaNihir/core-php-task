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
                    <h1 class="m-0">Delete Category</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="./admin.php">Home</a></li>
                        <li class="breadcrumb-item active">Delete Category</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content mt-3">
        
            <?php
            if (isset($_POST['deleteCategory'])) {
                if (isset($_POST['delete'])) {
                    $id = $_POST['delete'];
                    $del = mysqli_query($conn,"DELETE FROM category WHERE id='$id'"); 
                    if ($del) {
                        echo"<script>alert('Category Delete Successfully')</script>";
                    }
                    else{
                        echo"<script>alert('Something Went Wrong....!!')</script>";
                    }  
                }else{
                    echo"<script>alert('Select Category First')</script>";
                }

            }
            if(isset($_POST['addCategory'])){
                echo"<script>window.location.href='category.php'</script>";
            }
            ?>
            <div class="addCat">
            <h2 align=center>Delete Category</h2>
            <form action="categorydelete.php" method="post">
                <div class="input-box form-group">
                    <select name="delete" style="width: 100%;">
                        <option selected disabled>Select Category</option>
                        <?php
                        $addCategory = "SELECT * FROM category";
                        $run = mysqli_query($conn, $addCategory);
                        while ($row = mysqli_fetch_assoc($run)) {
                            ?>
                            <option value="<?php echo $row['id'];?>"><?php echo $row['name'],$row['id'];?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="input-box">
                    <input type="submit" value="Delete Category" name="deleteCategory" class="btn btn-danger">
                    <input type="submit" value="Back" name="addCategory" class="btn btn-primary">&nbsp;
                </div>
            </form>
        </div>
    </section>


</div>
<?php
include 'include/footer.php';
?>