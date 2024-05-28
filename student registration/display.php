<?php
include 'dbconnection.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Records</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <section class="table-container">
        <div class="table-content">
            <div class="db-title">Database - Table</div>
            
            <table class="table">
                <thead>
                    <tr>
                        <th>S.no</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone No</th>
                        <th>D.O.B.</th>
                        <th>Gender</th>
                        <th>Hobby</th>
                        <th>Department</th>
                        <th>State</th>
                        <th>City</th>
                        <th>Address</th>
                        <th>Pincode</th>
                        <th>Image</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    
                    $sql = "SELECT * FROM stdrecord";
                    $result = mysqli_query($conn, $sql);
                    $sno =1;
                    
                    while ($row = mysqli_fetch_assoc($result)) {
                        $rollno = $row['rollno'];
                        echo '<tr>';
                        echo '<td>' . $sno++ . '</td>';
                        echo '<td>' . $row['name'] . '</td>';
                        echo '<td>' . $row['email'] . '</td>';
                        echo '<td>' . $row['phone'] . '</td>';
                        echo '<td>' . $row['dob'] . '</td>';
                        echo '<td>' . $row['gender'] . '</td>';
                        echo '<td>' . $row['hobby'] . '</td>';
                        echo '<td>' . $row['department'] . '</td>';
                        echo '<td>' . $row['state'] . '</td>';
                        echo '<td>' . $row['city'] . '</td>';
                        echo '<td>' . $row['address'] . '</td>';
                        echo '<td>' . $row['pincode'] . '</td>';
                        echo "<input type='hidden' name='rollno' value='$rollno'>";
                        echo "<td><a href='viewimg.php?rollno=$rollno'><button type='button' class='tbtn'>View</button></a></td>
                        <td><a href='edit.php?rollno=$rollno'><button type='button' class='tbtn'>Edit</button></a></td>
                              <td><a href='delete.php?rollno=$rollno'><button type='button' class='tbtn'>Delete</button></a></td>";
                        echo '</tr>';
                    }
                    ?>
                    <tr>
                    </tr>
                </tbody>
            </table>
        </div>
    </section> 

</body>

</html>