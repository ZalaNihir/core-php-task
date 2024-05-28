<?php
    include 'dbconnection.php';
?>


<?php
$rollno = $_GET['rollno'];
$selectimg = "select * from stdrecord where rollno='$rollno'";
$res = mysqli_query($conn,$selectimg);
$row = mysqli_fetch_array($res);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hello <?php echo $row['name'];?></title>
    <style>
        *{
            margin: 0;padding: 0;box-sizing: border-box;
        }
        .container{
            width: 40%;
            height: 70vh;
            margin: 4% auto;
            background-color: orangered;
            box-shadow: .2em .4em 10px black;
        }
        .name{
            width: 100%;
            background-color: orangered;
            margin-top: 5%;
            color: white;
            line-height: 50px;
        }
        .img{
            margin-top: 2%;
        }
        .img img{
            width: 100%;
            height: auto;
        }
        .btn{
            width: 100%;
            margin-top: 2%;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 5px;
        }
        button{
            width: 90%;
            border-radius: 20px;
            box-shadow: .1em .1em 0 red;
            line-height: 40px;
            background-color:black;
            color: white;
            font-weight: 700;
            font-size: 1.1em;
            cursor: pointer;
        }
        button:hover{
            background-color: white;
            color: red;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="name">
        <h1 align=center><?php echo $row['name'];?></h1>
        </div>
        <hr>
        <div class="img">
            <img src="<?php echo $row['img'];?>" alt="<?php echo $row['img'];?>">
        </div>
        <div class="btn">
            <button onclick="window.location.href='edit.php?rollno=<?php echo $row['rollno'];?>'">Edit Image</button>
            <button onclick="window.location.href='display.php'">Back</button>
        </div>
    </div>
</body>
</html>


