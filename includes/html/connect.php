<?php
$servername = "localhost";
$username = "root";
$password = "Hostel@17";
$dbname = "blogs_data";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
