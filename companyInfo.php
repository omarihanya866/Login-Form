<?php
session_start();
include('conn.php');

// Check if the user is not logged in
if (!isset($_SESSION['userEmail'])) {
    header("Location: login.php"); // Redirect to the login page
    exit();
}
// If the user is logged in and has already filled the company info, redirect to the dashboard
if (isset($_SESSION['companyInfoFilled']) && $_SESSION['companyInfoFilled']) {
    header("Location: userDashboard.php");
    exit();
}


//If the user clicks the reg btn all details are checked
$companyName = "";
if(isset($_POST['companyName']))
{
    $companyName = $_POST['companyName'];
}

$companyType = "";
if(isset($_POST['companyType']))
{
    $companyType = $_POST['companyType'];
}

$companyAddress = "";
if(isset($_POST['companyAddress']))
{
    $companyAddress = $_POST['companyAddress'];
}

$vrnNumber = "";
if(isset($_POST['vrnNumber']))
{
    $vrnNumber = $_POST['vrnNumber'];
}

$companytinNumber = "";
if(isset($_POST['companytinNumber']))
{
    $companytinNumber = $_POST['companytinNumber'];
}

$companyEmail = "";
if(isset($_POST['companyEmail']))
{
    $companyEmail = $_POST['companyEmail'];
}
$companyphoneNumber = "";
if(isset($_POST['companyphoneNumber']))
{
    $companyphoneNumber = $_POST['companyphoneNumber'];
}

// If the database is connected successfully, the following code will be executed
if($conn)
{
    // If the submit button is clicked
    if(isset($_POST['reg_company']))
    {
        // Check if the user email or name already exists in the database
        $sql = "SELECT * FROM company WHERE companyName='$companyName' OR companyEmail='$companyEmail'";
        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) > 0)
        {
            echo "Company already exists. Please try again.";
        }
        else
        {
            // If the user doesn't exist, create a new user and insert the data into the database
            $sql = "INSERT INTO company(companyName, companyType, companyAddress, vrnNumber, companytinNumber, companyEmail, companyphoneNumber) VALUES('$companyName', '$companyType', '$companyAddress', '$vrnNumber', '$companytinNumber', '$companyEmail','$companyphoneNumber')";

            // If the data is successfully inserted into the database
            if(mysqli_query($conn, $sql))
            {
                header("Location: userDashboard.php");
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


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User | Company registration</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
</head>
<body>
<h1>Company registration</h1>
            <form action="" method="post" onsubmit="return validate();">
                <div class="form-group">
                    <label for="name">Company Name:</label>
                    <input type="text" id="companyName" name="companyName">
                </div>
                <div class="form-group">
                    <label for="name">Company Type:</label>
                    <input type="text" id="companyType" name="companyType">
                </div>
                <div class="form-group">
                    <label for="location">Company Address:</label>
                    <input type="text" id="companyAddress" name="companyAddress">
                </div>
                <div class="form-group">
                    <label for="vrnNumber">VRN:</label>
                    <input type="text" id="vrnNumber" name="vrnNumber">
                </div>
                <div class="form-group">
                    <label for="tinNumber">Tin Number:</label>
                    <input type="number" id="companytinNumber" name="companytinNumber">
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="text" id="companyEmail" name="companyEmail">
                </div>
                <div class="form-group">
                    <label for="Phone number">Phone Number:</label>
                    <input type="number" id="companyphoneNumber" name="companyphoneNumber">
                </div>
                <div class="form-group">
                    <input type="submit" value="Submit" name="reg_company" id="reg_company">
                </div>
                <div class="form-group">
                    <input type="submit" value="back" id="backbtn">
                </div>
            </form>
        </div>
        
        
        <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
        <script>
            //back button functionality
            var backbtn = document.getElementById('backbtn')
            backbtn.addEventListener("click", goBack);

            function goBack(){
                window.location.href="co-info.html";
            }
            //Data validation
            //when the reg form is clicked
            function validate() {
            var companyName = document.getElementById("companyName").value;
            var companyType = document.getElementById("companyType").value;
            var companyAddress = document.getElementById("companyAddress").value;
            var vrnNumber = document.getElementById("vrnNumber").value;
            var companytinNumber = document.getElementById("companytinNumber").value;
            var companyEmail = document.getElementById("companyEmail").value;
            var companyphoneNumber = document.getElementById("companyphoneNumber").value;

            if (companyName == null || companyName.trim() === "") {
            Toastify({
            text: "companyName is required.",
            duration: 3000,
            position: "toast-bottom-right",
            backgroundColor: "#000000",
            }).showToast();
            return false;
            }

            if (companyType == null || companyType.trim() === "") {
                Toastify({
                    text: "Company Type is required.",
                    duration: 3000,
                    position: "toast-bottom-right",
                    backgroundColor: "#000000",
                }).showToast();
                return false;
            }

            if (companyAddress == null || companyAddress.trim() === "") {
                Toastify({
                    text: "Company Address is required.",
                    duration: 3000,
                    position: "toast-bottom-right",
                    backgroundColor: "#000000",
                }).showToast();
                return false;
            }

            if (vrnNumber == null || vrnNumber.trim() === "") {
                Toastify({
                    text: "VRN Number is required.",
                    duration: 3000,
                    position: "toast-bottom-right",
                    backgroundColor: "#000000",
                }).showToast();
                return false;
            }
            // Validate company VRN
            if (!vrnNumber.match(/^\d{13}[a-zA-Z]$/)) {
            Toastify({
                text: "VRN must have 13 digits and end with a letter.",
                duration: 3000,
                position: "toast-bottom-right",
                backgroundColor: "#000000",
            }).showToast();
            return false;
            }

            if (companytinNumber == null || companytinNumber.trim() === "") {
                Toastify({
                    text: "TIN Number is required.",
                    duration: 3000,
                    position: "toast-bottom-right",
                    backgroundColor: "#000000",
                }).showToast();
                return false;
            }
            if (!companytinNumber.match(/^\d{9}$/)) {
                Toastify({
                    text: "TIN number must have nine digits.",
                    duration: 3000,
                    position: "toast-bottom-right",
                    backgroundColor: "#000000",
                }).showToast();
                return false;
            }

            if (companyEmail == null || companyEmail.trim() === "") {
                Toastify({
                    text: "Company Email is required.",
                    duration: 3000,
                    position: "toast-bottom-right",
                    backgroundColor: "#000000",
                }).showToast();
                return false;
            }
            // Validate company email
            if (!/.+@.+\..+/.test(companyEmail)) {
            Toastify({
                text: "Invalid Email Address.",
                duration: 3000,
                position: "toast-bottom-right",
                backgroundColor: "#000000",
            }).showToast();
            return false;
            }

            if (companyphoneNumber == null || companyphoneNumber.trim() === "") {
                Toastify({
                    text: "Company Phone Number is required.",
                    duration: 3000,
                    position: "toast-bottom-right",
                    backgroundColor: "#000000",
                }).showToast();
                return false;
            }

            if (!companyphoneNumber.match(/^0\d{9}$/)) {
                Toastify({
                text: "Invalid Phone Number. It should start with 0 and be followed by nine digits.",
                duration: 3000,
                position: "toast-bottom-right",
                backgroundColor: "#000000",
                }).showToast();
                return false;
            }





            return true;
        }
        </script>
</body>
</html>