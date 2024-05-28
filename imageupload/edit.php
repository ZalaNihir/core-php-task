<?php
include 'connection.php';
?>

<?php
$id = $_GET['id'];
$res = mysqli_query($conn, "select * from studimg where id='$id'");
$row = mysqli_fetch_assoc($res);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="update.php" method="post" enctype="multipart/form-data">
     <label for="">Select New Image:</label><br>
     <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
        <input type="file" name="image">
        <img src="<?php echo $row['imgupload']; ?>" width="150px" height="150px" alt=""> <br>
        <input type="submit" name="update" value="Update Image">
    </form>
    <a href="display.php"><button>Back</button></a>
</body>

</html>