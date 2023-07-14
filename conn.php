<?php
// Initializing variables
$userName = "";
$tinNumber = "";
$userEmail = "";
$phoneNumber = "";
$password = "";
$confirmPassword = "";

// Connect to the database
$conn = mysqli_connect('localhost', 'root', '', 'payroll system');
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

?>