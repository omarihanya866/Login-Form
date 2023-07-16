<?php
include('conn.php');
session_start();

// Check if the logout button is clicked
if(isset($_POST['logout'])) {
    // User clicked the logout button, perform logout
    session_unset(); // Clear all session variables
    session_destroy(); // Destroy the session
    // Prevent caching of restricted pages
    header("Cache-Control: no-cache, must-revalidate");
    header("Pragma: no-cache");
    header("Location: login.php"); // Redirect to the login page or desired location
    exit();
} else {
    // If the logout button is not clicked, redirect to the desired location
    header("Location: login.php");
    exit();
}
?>
