<?php
include 'connection.php';
?>

<?php
$id = $_GET['id'];
$del = mysqli_query($conn,"delete from studimg where id='$id' ");
if($del){
    header('location:display.php');
}
?>