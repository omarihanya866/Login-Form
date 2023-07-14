<?php
session_start();
include('conn.php');

//If the user clicks the reg btn all details are checked
$userName = "";
if(isset($_POST['userName']))
{
    $userName = $_POST['userName'];
}

$userEmail = "";
if(isset($_POST['userEmail']))
{
    $userEmail = $_POST['userEmail'];
}

$tinNumber = "";
if(isset($_POST['tinNumber']))
{
    $tinNumber = $_POST['tinNumber'];
}

$phoneNumber = "";
if(isset($_POST['phoneNumber']))
{
    $phoneNumber = $_POST['phoneNumber'];
}

$password = "";
if(isset($_POST['password']))
{
    $password = $_POST['password'];
}

$confirmPassword = "";
if(isset($_POST['confirmPassword']))
{
    $confirmPassword = $_POST['confirmPassword'];
}

// If the database is connected successfully, the following code will be executed
if($conn)
{
    // If the submit button is clicked
    if(isset($_POST['reg_user']))
    {

        // Check if the passwords match
        if ($password !== $confirmPassword) {
            // Display a toast notification for password mismatch using JavaScript
            echo '<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
            <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
            <script>
                window.onload = function() {
                    Toastify({
                        text: "Passwords do not match.",
                        duration: 3000,
                        close: true,
                        gravity: "bottom",
                        backgroundColor: "#ff0000"
                    }).showToast();
                };
            </script>';
            exit; // Stop the execution when passwords don't match
        }
        // Check if the user email or name already exists in the database
        $sql = "SELECT * FROM user WHERE userName='$userName' OR userEmail='$userEmail'";
        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) > 0)
        {
            echo "User already exists. Please try again.";
        }
        else
        {
            // If the user doesn't exist, create a new user and insert the data into the database
            $sql = "INSERT INTO user(userName, userEmail, tinNumber, phoneNumber, password, confirmPassword) VALUES('$userName', '$userEmail', '$tinNumber', '$phoneNumber', '$password', '$confirmPassword')";

            // If the data is successfully inserted into the database
            if(mysqli_query($conn, $sql))
            {
                echo "Data recorded successfully.";
            }
            else
            {
                echo "Data not recorded. Please try again later.";
            }
        }
    }
}
else
{
    echo "No database connection.";
}



?>