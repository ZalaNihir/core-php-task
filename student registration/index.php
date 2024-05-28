<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <section class="form-container">
        <div class="form-content">
            <div class="title">
                Student Registration Form
            </div>
            <div class="form">
                <form action="insert.php" method="post" enctype="multipart/form-data">
                    <div class="input-box">
                        <Label>Name</Label>
                        <input type="text" class="input" name="name" id="name" placeholder="Enter Your FullName"
                            >
                    </div>
                    <div class="input-box">
                        <Label>Email</Label>
                        <input type="email" class="input" name="email" id="email" placeholder="Enter Your Email"
                            required>
                    </div>
                    <div class="input-box">
                        <Label>Phone No.</Label>
                        <input type="tel" class="input" name="phone" id="phone" minlength="10" maxlength="10"
                            placeholder="Enter Your Mobile Number" required>
                    </div>
                    <div class="input-box">
                        <Label>D.O.B</Label>
                        <input type="date" class="input" name="dob" id="dob" required>
                    </div>
                    <div class="input-box">
                        <Label>Gender</Label>
                        <div class="gender">
                            <input type="radio" class="gender1" name="gender" id="genderm" value="male"
                                required>Male<input type="radio" class="gender1" name="gender" id="genderf"
                                value="female" required>Female
                        </div>
                    </div>
                    <div class="input-box">
                        <Label style="width: 150px;">Hobby</Label>
                        <input type="checkbox" name="hobbies[]" value="read"> Read &nbsp; 
                        <input type="checkbox" name="hobbies[]" value="sing"> Sing &nbsp;
                        <input type="checkbox" name="hobbies[]" value="play"> Play &nbsp;
                        <input type="checkbox" name="hobbies[]" value="dance"> Dance &nbsp;
                    </div>
                    <div class="input-box">
                        <Label>Department</Label>
                        <div class="dept">
                            <select name="department" id="dept" required>
                                <option selected disabled>Select Department</option>
                                <option value="Computer Science & Engineering">Computer Science & Engineering</option>
                                <option value="Mechanical Engineering">Mechanical Engineering</option>
                                <option value="Electrical Engineering">Electrical Engineering</option>
                                <option value="Civil Engineering">Civil Engineering</option>
                            </select>
                        </div>
                    </div>

                    <div class="input-box">
                        <div class="add">
                            <Label id="stat">State</Label><input type="text" class="input" name="state" id="state"
                                placeholder="Enter Your state" required>
                            <Label id="citi">City</Label><input type="text" class="input" name="city" id="city"
                                placeholder="Enter Your city" required>
                        </div>
                    </div>
                    <div class="input-box">
                        <Label>Address</Label>
                        <textarea name="address" id="address" class="textarea" rows="2"></textarea required>
                    </div>
                    <div class="input-box">
                        <Label>PostalCode</Label>
                        <input type="number" class="input" name="pincode" id="pincode" minlength="6" maxlength="6" placeholder="Enter Your Postal Code" required>
                    </div>
                    <div class="input-box">
                        <Label>Password</Label>
                        <input type="password" class="input" name="password" id="password" minlength="8" placeholder="Enter Password" title="at least 8 char,One UpperCase,One LowerCase,One Number, One Special Character,Alphabets " required>
                    </div>
                    <div class="input-box">
                        <Label>Confirm Password</Label>
                        <input type="password" class="input" name="cpassword" id="cpassword"
                            placeholder="Confirm Password" required>
                    </div>
                    <div class="input-box">
                        <Label>Upload Image</Label>
                        <input type="file" class="input" name="image" id="image" required>
                    </div>
                    <div class="input-box">
                        <input type="submit" value="Register" name="insertform" class="btn"><input type="reset" value="Reset" class="btn">
                    </div>
                </form>
                
            </div>
        </div>
    </section><hr>
    

</body>

</html>