<?php
$servername = "localhost";
$username = "root"; // default XAMPP username
$password = "Madhu@2005"; // default XAMPP password is empty
$dbname = "library_dbs"; // your database name

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
