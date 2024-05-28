<?php
include('connection.php');

//insert operation
if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['phone']) && isset($_POST['password'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];

    $insert = "INSERT INTO demo (name,email,phone,password) VALUES('$name','$email','$phone','$password')";
    if (mysqli_query($conn, $insert)) {
        echo "inserted";
    } else {
        echo "Try again!";
    }
}

//Delete record
if (isset($_POST['delid'])) {
    $delid = $_POST['delid'];

    $delete = "DELETE FROM demo WHERE id='$delid'";
    if (mysqli_query($conn, $delete)) {
        echo "delete";
    }
}

//Edit record
if (isset($_POST['edit'])) {
    $id =  $_POST['edit'];
    $edit = "SELECT * FROM demo WHERE id='$id'";
    $run = mysqli_query($conn, $edit);
    $editrow = mysqli_fetch_assoc($run);
?>
    <div class="box">
        <input type="hidden" class="form-control" id="update_id" value="<?php echo $editrow['id']; ?>">
        <div class="form-group py-2">
            <label for="update_name">Name</label>
            <input type="text" id="update_name" value="<?php echo $editrow['name']; ?>" class="form-control">
        </div>
        <div class="form-group py-2">
            <label for="update_email">Email</label>
            <input type="email" id="update_email" value="<?php echo $editrow['email']; ?>" class="form-control">
        </div>
        <div class="form-group py-2">
            <label for="update_phone">Mobile No.</label>
            <input type="tel" id="update_phone" value="<?php echo $editrow['phone']; ?>" class="form-control">
        </div>
        <div class="form-group py-2">
            <label for="update_password">Password</label>
            <input type="text" id="update_password" value="<?php echo $editrow['password']; ?>" class="form-control">
        </div>
    </div>
<?php
}

//Update record
if (isset($_POST['updateid'])) {
    $id = $_POST['updateid'];
    $name = $_POST['updatename'];
    $email = $_POST['updateemail'];
    $phone = $_POST['updatephone'];
    $password = $_POST['updatepassword'];

    $update = "UPDATE demo SET name='$name',email='$email',phone='$phone',password='$password' WHERE id='$id'";
    if (mysqli_query($conn, $update)) {
        echo "update";
    }
}
?>