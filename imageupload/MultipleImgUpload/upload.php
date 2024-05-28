<?php 
$conn = mysqli_connect("localhost","root","","mystudents");


if (isset($_POST['submit'])) {
    $imgCount = count($_FILES['image']['name']);
    
    for( $i=0 ; $i < $imgCount ; $i++ ){
        $imgName = $_FILES['image']['name'][$i];
        $tmpName = $_FILES['image']['tmp_name'][$i];
        $location = "images/". $imgName;

        if(move_uploaded_file($tmpName,$location)){
            $sql = "insert into multiimg(img)VALUES('$imgName')";
            $result = mysqli_query($conn,$sql);
        }
    }
        if ($result) {
            header('location:display.php');
        }
}
?>