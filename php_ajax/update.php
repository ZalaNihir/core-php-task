<?php
include 'connection.php';

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];

    $update = "UPDATE ajax SET fname='$firstname', lname='$lastname', email='$email' WHERE id='$id' ";
    if (mysqli_query($conn,$update)) {
        echo "1";
    }
    else {
        echo "0";
    }
}
?>