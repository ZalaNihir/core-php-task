<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "mystudents";

$conn = mysqli_connect($servername,$username,$password,$database);
if (!$conn) {
    echo "Database can't connected !!";
}


?>