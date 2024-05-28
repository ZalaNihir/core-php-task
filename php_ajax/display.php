<?php
include 'connection.php';

$select = mysqli_query($conn, "SELECT * FROM ajax");
if (mysqli_num_rows($select) > 0) {
    $table = '<table class="table table-striped">
        <tr>
            <th>Id</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>';
    while ($row = mysqli_fetch_assoc($select)) {
        $table .= '<tr>
                <td>' . $row['id'] . '</td>
                <td>' . $row['fname'] . '</td>
                <td>' . $row['lname'] . '</td>
                <td>' . $row['email'] . '</td>
                <td><button class="btn btn-primary" onclick="editrecord('.$row['id'].')">Edit</button></td>
                <td><button class="btn btn-danger" onclick="deleterecord('.$row['id'].')">Delete</button></td>
                </tr>'; 
    }
    $table .= '</table>';

    // this line important otherwise output will not show
    echo $table;    
}
