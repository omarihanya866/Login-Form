<?php
    include('conn.php');
    session_start();
    // Check if the user is not logged in
    if (!isset($_SESSION['userEmail'])) {
        header("Location: login.php"); // Redirect to the login page
        exit();
    }

?>