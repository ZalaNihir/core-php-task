<?php
include 'connection.php';
if (isset($_POST['id'])) {
    $id = $_POST['id'];

    $delete = mysqli_query($conn,"DELETE FROM ajax WHERE id='$id'");
    if ($delete) {
        echo "1";
    }
    else{
        echo "0";
    }
}
// echo $_POST['id'];
?>