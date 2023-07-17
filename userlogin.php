<?php
include('conn.php');
include('server.php');
// LOGIN USER
if (isset($_POST['login'])) {
    $userEmail = $_POST['userEmail'];
    $password = $_POST['password'];

    // Check if the user exists in the database
    $sql = "SELECT * FROM user WHERE userEmail='$userEmail'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $storedPassword = $row['password'];

        // Verify the password
        // Verify the password
        if ($password === $storedPassword) {
            // Password is correct, log in the user
            $_SESSION['userEmail'] = $userEmail;
            
            // Check if company info is filled for the user
            $companyInfoSql = "SELECT * FROM company WHERE userEmail='$userEmail'";
            $companyInfoResult = mysqli_query($conn, $companyInfoSql);

            if (mysqli_num_rows($companyInfoResult) > 0) {
                $row = mysqli_fetch_assoc($companyInfoResult);

                // Check if any of the required fields are empty
                if (empty($row['companyName']) || empty($row['companyType']) || empty($row['companyAddress']) || empty($row['vrnNumber']) || empty($row['companytinNumber']) || empty($row['companyEmail']) || empty($row['companyphoneNumber'])) {
                    // Redirect to the fill company info page
                    header("Location: companyInfo.php");
                    exit();
                } else {
                    // All required fields are filled, redirect to the dashboard
                    header("Location: userDashboard.php");
                    exit();
                }
            } else {
                // Company info not found, redirect to fill company info page
                header("Location: companyInfo.php");
                exit();
            }
        } else {
            // Password is incorrect
            echo "Incorrect password. Please try again.";
        }
    } else {
        // User does not exist
        echo "User does not exist. Please try again.";
    }
}


?>