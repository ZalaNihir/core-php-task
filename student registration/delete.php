<?php 
include 'dbconnection.php';

$rollno = $_GET['rollno'];

$delete = "delete from stdrecord where rollno = $rollno";
$run = mysqli_query($conn,$delete);

if($run){
header('location:display.php');
}
?>