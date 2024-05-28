<?php
include 'connection.php';

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];

if ($_POST['firstname']) {
    $sql = "INSERT INTO ajax (fname,lname,email)values('$firstname','$lastname','$email')";
    $insert = mysqli_query($conn,$sql);
}
else{
    echo"Not insert";
}

?>