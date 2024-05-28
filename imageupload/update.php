<?php
include 'connection.php';
?>

<?php

$id = $_POST['id'];

if (isset($_POST['update'])) {

$imgName = $_FILES['image']['name'];
$tmpName = $_FILES['image']['tmp_name'];
$folder = "images/".$imgName;

$sql = "update studimg set imgupload='$folder' where id='$id'";
$res = mysqli_query($conn,$sql);
$data = move_uploaded_file($tmpName,$folder);
if ($res) {
    header('location:display.php');    
}
}
?>