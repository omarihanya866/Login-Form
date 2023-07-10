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

$errors = array(); // Initialize the errors array

// REGISTER USER
if (isset($_POST['reg_user'])) {
    // Receive all input values from the form
    $userName = mysqli_real_escape_string($conn, $_POST['userName']);
    $tinNumber = mysqli_real_escape_string($conn, $_POST['tinNumber']);
    $userEmail = mysqli_real_escape_string($conn, $_POST['userEmail']);
    $phoneNumber = mysqli_real_escape_string($conn, $_POST['phoneNumber']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $confirmPassword = isset($_POST['confirmPassword']) ? mysqli_real_escape_string($conn, $_POST['confirmPassword']) : '';


    // Form validation: ensure that the form is correctly filled...
    // by adding corresponding errors to the $errors array
    if (empty($userName)) {
        array_push($errors, "Username is required");
    }
    if (empty($userEmail)) {
        array_push($errors, "Email is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }
    if ($password != $confirmPassword) {
        array_push($errors, "The two passwords do not match");
    }

    // First, check the database to make sure a user does not already exist with the same username and/or email
    $user_check_query = "SELECT * FROM user WHERE userName='$userName' OR userEmail='$userEmail' LIMIT 1";
    $result = mysqli_query($conn, $user_check_query);
    $user = mysqli_fetch_assoc($result);

    if ($user) { // If user exists
        if ($user['userName'] === $userName) {
            array_push($errors, "Username already exists");
        }

        if ($user['userEmail'] === $userEmail) {
            array_push($errors, "Email already exists");
        }
    }

    // Finally, register the user if there are no errors in the form
    if (count($errors) == 0) {
        $password = md5($password); // Encrypt the password before saving it in the database

        $query = "INSERT INTO user (userName, tinNumber, userEmail, phoneNumber,password, confirmPassword) 
        VALUES('$userName', '$tinNumber', '$userEmail', '$phoneNumber', '$password', $confirmPassword)";
        mysqli_query($conn, $query);
        $result = mysqli_query($conn, $query);
        if (!$result) {
            die('Error executing query: ' . mysqli_error($conn));
        }

        $_SESSION['userName'] = $userName;
        $_SESSION['success'] = "Your account has been created successfully";
        header('location: login.php');
    }
}
?>