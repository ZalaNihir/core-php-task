<?php
include 'connection.php';
?>

<?php

if (isset($_POST['submit'])) {

$imgName = $_FILES['image']['name'];
$tmpName = $_FILES['image']['tmp_name'];
$folder = "images/".$imgName;


$sql = "insert into studimg(imgupload) values('$folder')";
$res = mysqli_query($conn,$sql);
$data = move_uploaded_file($tmpName,$folder);
if ($res) {
    header('location:display.php');    
}
}
?>