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
if ($conn) {
    // If the submit button is clicked
    if (isset($_POST['reg_user'])) {
        // Check if the user email or name already exists in the database
        $sql = "SELECT * FROM user WHERE userName='$userName' OR userEmail='$userEmail'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            echo "User already exists. Please try again.";
        } else {
            // If the user doesn't exist, create a new user and insert the data into the database
            $insertUserSql = "INSERT INTO user(userName, userEmail, tinNumber, phoneNumber, password, confirmPassword) VALUES('$userName', '$userEmail', '$tinNumber', '$phoneNumber', '$password', '$confirmPassword')";

            // If the data is successfully inserted into the user table
            if (mysqli_query($conn, $insertUserSql)) {
                // Insert the company info with the corresponding userEmail into the company table
                $insertCompanySql = "INSERT INTO company(userEmail) VALUES('$userEmail')";
                if (mysqli_query($conn, $insertCompanySql)) {
                    $_SESSION['userEmail'] = $userEmail; // Store user's email in session
                    $_SESSION['companyInfoFilled'] = false; // Set company info filled status to false
                    header("Location: login.php");
                    exit();
                } else {
                    echo "Company info not recorded. Please try again later.";
                }
            } else {
                echo "User data not recorded. Please try again later.";
            }
        }
    }
} else {
    echo "No database connection.";
}
?>