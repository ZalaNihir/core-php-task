<?php
include 'dbconnection.php';
?>

<?php
    $rollno = $_POST['rollno'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $hobbies = $_POST['hobbies'];
    //covert array to string
    $hobby = implode(",", $hobbies);
    $department = $_POST['department'];
    $state = $_POST['state'];
    $city = $_POST['city'];
    $address = $_POST['address'];
    $pincode = $_POST['pincode'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];

    if(isset($_REQUEST['update'])){

    //For Store image in database

    $imgName = $_FILES['image']['name'];
    $tmpName = $_FILES['image']['tmp_name'];
    $folder = "images/" . $imgName;

    //For store img in folder 
    $store = move_uploaded_file($tmpName, $folder);

    $sql = "UPDATE stdrecord SET name='$name', email='$email', phone=$phone,dob='$dob',gender='$gender',hobby='$hobby',department='$department',state='$state',city='$city',address='$address',pincode =$pincode,password='$password',confirmpassword='$cpassword',img='$folder' WHERE rollno = $rollno";
        
    if ($result = mysqli_query($conn,$sql)) {
        header("location:display.php");
    }
}
    
?>

