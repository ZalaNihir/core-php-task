<?php
include 'include/header.php';
include 'include/navbar.php';
include 'include/sidebar.php';
include 'config/dbconnection.php';

$sql = "SELECT * FROM admin";
$run = mysqli_query($conn, $sql);
$id = 1;
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Admin Profile</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/index.php">Home</a></li>
                        <li class="breadcrumb-item active">Admin</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr style="background-color: #343a40;color: white;">
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Password</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($row = mysqli_fetch_assoc($run)) {
                                ?>
                                    <tr>
                                        <td><?php echo $id++; ?></td>
                                        <td><?php echo $row['admin']; ?></td>
                                        <td><?php echo $row['password']; ?></td>
                                        <td><a href="editadmin.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">Edit</a>&nbsp;&nbsp;
                                            <a href="deleteadmin.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                <?php
                                }

                                ?>

                            </tbody>
                        </table>
                    </div>

</div>
<?php
include 'include/footer.php';
?>
