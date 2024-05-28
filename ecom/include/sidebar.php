<?php
include './config/dbconnection.php';

$select = "SELECT * FROM category";
$run = mysqli_query($conn, $select);
?>

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="assets/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">Jaydev Mungara</a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <li class="nav-item menu-open">
          <a href="./admin.php" class="nav-link active">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>
        <div class="nav-item">
          <a href="./category.php" class="nav-link">
            <i class="nav-icon fas fa-plus text-red"></i>
            <p>Add Category</p>
          </a>
        </div>
        <div class="nav-item">
          <a href="./productadd.php" class="nav-link">
            <i class="nav-icon fas fa-plus text-yellow"></i>
            <p>Add Products</p>
          </a>
        </div>
        <li class="nav-item">
          <a class="nav-link" style="cursor: pointer;">
            <i class="nav-icon fas fa-tag text-white"></i>
            <p>
              Categories
              <i class="fas fa-angle-left right"></i>
              <!-- <span class="badge badge-info right">4</span> -->
            </p>
          </a>
          <ul class="nav nav-treeview">
            <?php
            while ($row = mysqli_fetch_assoc($run)) {
            ?>
              <li class="nav-item">
                <a href="./productdisplay.php?id=<?php echo $row['id']; ?>" class="nav-link">
                  <i class="fas fa-box nav-icon text-blue"></i>
                  <p class="h6">
                    <?php echo $row['name']; ?>
                  </p>
                </a>
              </li>
            <?php
            }
            ?>

          </ul>
        </li>

        <li class="nav-header">Admin</li>
        <li class="nav-item">
          <a href="./adminprofile.php" class="nav-link">
            <i class="nav-icon fa fa-regular fa-user text-red"></i>
            <p class="text">Admin Profile</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="./registereduser.php" class="nav-link">
            <i class="nav-icon fa fa-users text-green"></i>
            <p>Registered User</p>
          </a>
        </li>
        <!-- <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-circle text-info"></i>
              <p>Informational</p>
            </a>
          </li> -->
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>