<?php 
$conn = mysqli_connect("localhost","root","","mystudents");

$select = "select * from multiimg";
$res = mysqli_query($conn,$select);
if(mysqli_num_rows($res)>0){
    while($row = mysqli_fetch_assoc($res)){
        ?>
        <img src="images/<?php echo $row['img'];?>" width="150px" height="100px" alt="">
        <?php
    }
}
?>
