<?php
include 'connection.php';
//Display records
$display = "SELECT * FROM demo";
$data = mysqli_query($conn, $display);
$sno = 1;
if (mysqli_num_rows($data)) {

    while ($row = mysqli_fetch_assoc($data)) {
        $table = '<tr>
        <td>' . $sno++ . '</td>
        <td>' . $row['name'] . '</td>
    <td>' . $row['email'] . '</td>
    <td>' . $row['phone'] . '</td>
    <td>' . $row['password'] . '</td> 
    <td> <button class="btn btn-primary" onclick="editrecord(' . $row['id'] . ')">Edit</td><td>
     <button class="btn btn-danger" onclick="deleterecord(' . $row['id'] . ')">Delete</td>
     </tr>';
        echo $table;
    }
}
else{
    echo "Not";
}

