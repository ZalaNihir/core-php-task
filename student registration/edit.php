<?php 
include 'dbconnection.php';

$rollno = $_GET['rollno'];
$sql = "SELECT * FROM stdrecord where rollno=$rollno";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update <?php echo $row['name'];?></title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <section class="form-container">
        <div class="form-content">
            <div class="title">
                UPDATE - Student <?php echo $row['name'];?>
            </div>
            <div class="form">
                <form action="update.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="rollno" value="<?php echo $row['rollno'] ?>">
                    <div class="input-box">
                        <Label>Name</Label>
                        <input type="text" class="input" name="name" id="name" value="<?php echo $row['name'];?>"
                            required>
                    </div>
                    <div class="input-box">
                        <Label>Email</Label>
                        <input type="email" class="input" name="email" id="email" value="<?php echo $row['email'];?>"
                            required>
                    </div>
                    <div class="input-box">
                        <Label>Phone No.</Label>
                        <input type="tel" class="input" name="phone" id="phone" minlength="10" maxlength="10" value="<?php echo $row['phone'];?>"
                            required>
                    </div>
                    <div class="input-box">
                        <Label>D.O.B</Label>
                        <input type="date" class="input" name="dob" id="dob" value="<?php echo $row['dob'];?>" required>
                    </div>
                    <div class="input-box">
                        <Label>Gender</Label>
                        <div class="gender">
                            <input type="radio" class="gender1" name="gender" id="genderm" value="male"  <?php if ($row['gender'] == 'male') {echo "checked";}?>
                                required>Male<input type="radio" class="gender1" name="gender" id="genderf" value="female"  <?php if ($row['gender'] == 'female') {echo "checked";}?>
                                required>Female
                        </div>
                    </div>
                    <?php $checkbox = $row['hobby'];
                    $hobby = explode(",",$checkbox);
                    ?>
                    <div class="input-box">
                        <Label style="width: 150px;">Hobby</Label>
                        <input type="checkbox" name="hobbies[]" value="read"  <?php if (in_array("read",$hobby)) {echo"checked"; }?>>Read &nbsp; 
                        <input type="checkbox" name="hobbies[]" value="sing"  <?php if (in_array("sing",$hobby)) {echo"checked"; }?>> Sing &nbsp;
                        <input type="checkbox" name="hobbies[]" value="play"  <?php if (in_array("play",$hobby)) {echo"checked"; }?>> Play &nbsp;
                        <input type="checkbox" name="hobbies[]" value="dance"  <?php if (in_array("dance",$hobby)) {echo"checked"; }?>> Dance &nbsp;
                    </div>
                    <div class="input-box">
                        <Label>Department</Label>
                        <div class="dept">
                            <select name="department" id="dept" required>
                                <option selected><?php echo $row['department'];?></option>
                                <option value="Computer Science & Engineering">Computer Science & Engineering</option>
                                <option value="Mechanical Engineering">Mechanical Engineering</option>
                                <option value="Electrical Engineering">Electrical Engineering</option>
                                <option value="Civil Engineering">Civil Engineering</option>
                            </select>
                        </div>
                    </div>

                    <div class="input-box">
                        <div class="add">
                            <Label id="stat">State</Label><input type="text" class="input" name="state" id="state" value="<?php echo $row['state'];?>"
                                 required>
                            <Label id="citi">City</Label><input type="text" class="input" name="city" id="city" value="<?php echo $row['city'];?>"
                                 required>
                        </div>
                    </div>
                    <div class="input-box">
                        <Label>Address</Label>
                        <textarea name="address" id="address" class="textarea" required> <?php echo $row['address'];?> </textarea>
                    </div>
                    <div class="input-box">
                        <Label>PostalCode</Label>
                        <input type="number" class="input" name="pincode" id="pincode" minlength="6" maxlength="6" value="<?php echo $row['pincode'];?>" required>
                    </div>
                    <div class="input-box">
                        <Label>Password</Label>
                        <input type="text" class="input" name="password" id="password" minlength="8"  title="at least 8 char,One UpperCase,One LowerCase,One Number, One Special Character,Alphabets " value="<?php echo $row['password'];?>" required>
                    </div>
                    <div class="input-box">
                        <Label>Confirm Password</Label>
                        <input type="text" class="input" name="cpassword" id="cpassword" value="<?php echo $row['confirmpassword'];?>"
                            required>
                    </div>
                    <div class="input-box">
                        <Label>Image</Label>
                        <img class="input" style="width: 150px !important; margin-left:-50px" src="<?php echo $row['img'];?>" height="100px">
                    </div>
                    <div class="input-box">
                    <Label>Select Image</Label>
                    <input type="file" style="margin-left:-50px" name="image" id="image" required>
                    </div>
                    <div class="input-box">
                        <input type="submit" name="update" value="Update" class="btn">
                    </div>
                </form>
                
            </div>
        </div>
    </section><hr>
    

</body>

</html>
