<?php
include 'dbconnection.php';
?>

<?php
    
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $hobbies = $_POST['hobbies'];
    //covert array to string
    $hobby = implode(",",$hobbies);
    $department = $_POST['department'];
    $state = $_POST['state'];
    $city = $_POST['city'];
    $address = $_POST['address'];
    $pincode = $_POST['pincode'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];


    if(isset($_REQUEST['insertform'])){

    //For Store image in database

    $imgName = $_FILES['image']['name'];
    $tmpName = $_FILES['image']['tmp_name'];
    $folder = "images/" . $imgName;

    //For store img in folder 
    $store = move_uploaded_file($tmpName, $folder);

    $sql = "INSERT INTO stdrecord (`name`, `email`, `phone`, `dob`, `gender`, `hobby`, `department`, `state`, `city`, `address`, `pincode`, `password`, `confirmpassword`, `img`) VALUES('$name','$email',$phone,'$dob','$gender','$hobby','$department','$state','$city','$address',$pincode,'$password','$cpassword','$folder')";
    $result = mysqli_query($conn, $sql);
    var_dump($result);
    }
    
    if ($result) {
        header("location:display.php");
    }
    
?>

