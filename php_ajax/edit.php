<?php
include 'connection.php';
if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $getrecord = mysqli_query($conn,"SELECT * FROM ajax WHERE id='$id'");
    $respone = array();
    if (mysqli_num_rows($getrecord)>0) {
        while ($row = mysqli_fetch_assoc($getrecord)) {
            $respone = $row;
        }
    }
    echo json_encode($respone);
}
?>