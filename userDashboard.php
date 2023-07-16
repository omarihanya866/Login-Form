<?php
include('conn.php');
session_start();
    // Check if the user is not logged in
    if (!isset($_SESSION['userEmail'])) {
        header("Location: login.php"); // Redirect to the login page
        exit();
    }

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>User | Home</title>
        <link rel="stylesheet" href="">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
        <style>
            @import url("https://fonts.googleapis.com/css2?family=Spartan:wght@100;200;300;400;500;600;700;800;900&display=swap");
            * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Spartan", sans-serif;
            }

            /* Global Styles */
            body{
                width: 100%;
                display: flex;
                background-color: #f7f7f7;
            }

            h1{
                font-size: 50px;
                line-height: 64px;
                color: #222;
            }

            h2 {
                font-size: 46px;
                line-height: 54px;
                color: #222;
            }

            h4 {
                font-size: 20px;
                /* line-height: 64px; */
                color: #222;
            }

            h6 {
                font-size: 12px;
                font-weight: 700;
            }

            p{
                font-size: 16px;
                color: #465b52;
                margin: 15px 0 20px 0;
            }

            .section-pl{
                padding: 40px 80px;
            }

            .section-ml{
                margin: 40px 0;
            }

            .sidebar {
                width: fit-content;
                background-color: #008080; /* Teal color */
                color: #ffffff; /* Text color */
                height: 100vh;
                overflow-y:auto;

            }

            .sidebar {
                list-style-type: none;
                padding: 0;
                margin: 0;
            }
            .sidebar .item{
                line-height: 40px;
            }
            
            .sidebar .menu .sub-btn {
                padding: 10px;
            }

            .sidebar  a {
                color: #ffffff; /* Link color */
                text-decoration: none;
                cursor: pointer;
            }  

            .sidebar a:hover {
                opacity: 80%;
            }

            .menu{
                width: fit-content;
            }

            .sub-menu{
                line-height: 10px;
                background: #008080;
                display: none;
                padding-left: 10px;
                font-size: smaller;

            }
            .sub-menu a{
                font-size: smaller;
                text-decoration: none;
                color:#fff;
                display: list-item;
                padding: 10px;

            }
            .sub-menu a:hover{
                opacity: 80%;
            }



            .rotate{
                transform: rotate(90deg);
            }

            .item a .dropdown{
                margin: 5px;
                transition: 0.3s ease;
            }

            /*table starts here*/

            .table {
                border-collapse: collapse;
            }
            #employeeTable{
                margin-left: -70px;
            }

            th, td {
                box-shadow: 0.5px 0.5px 3px 0.5px #c9c9c9 ; /* Add box shadow */
                padding: 5px;
                text-align: center;

            }

            th {
                background-color: #efefef;
            }

            .last-cell {
                border-right: 1px solid black;
            }

            td i{
                margin: 5px;
                cursor: pointer;
            }
            td i:hover{
                opacity: 40%;
            }

            button{
                text-align:center;
                padding-top: 1px;
            }

            #downbtn{
                margin-left: -70px;  
            }

            /*main content starts here*/
            .container{
                margin-left: 60px;
                margin-top: 40px;
                background-color:rgb(251, 251, 251);
                width: 1000px;
                height: 200px;
                box-shadow: 1.5px 1.5px 2px 1.5px #e0e6e6 ; /* Add box shadow */


            }
            .container .dash-info .box{
                color: black;
                background-color:rgb(231, 231, 231);
                display:inline-flex;
                width: 200px; /* Adjust the width as needed */
                height: 100px; /* Adjust the height as needed */
                text-align: center; /* Center the link content */
                text-decoration: none; /* Remove underline */
                box-shadow: 0.5px 0.5px 0.5px #008080 ; /* Add box shadow */
                margin-top:40px;
                margin-left:30px;
                border-radius: 20px 15px;
            }

            .container .dash-info .box:hover{
                opacity: 70%;
            }



            .box > a{
                text-decoration: none;
                color: black;
                font-weight: 700;
                line-height: 160px; /* Vertically center the link content */
                margin-left: 4px;
            }
            .box i{
                color: #008080;
            }

                /* Line 1 */

            .container hr{
                margin-top: 100px;
                width: 112%;
                margin-left: -50px;
                opacity: 20%;
                box-shadow: 0.5px 0.1px #008080 ; /* Add box shadow */
            }


            /*Icon animation*/
            .icon {
            width: 100px;
            height: 100px;
            position: relative;
            }

            .icon:hover {
            animation: swing 2s infinite;
            }

            @keyframes swing {
            0% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-10px);
            }
            100% {
                transform: translateY(0);
            }
            }

            .fa-hand-holding-dollar {
            font-size: 48px;
            position: absolute;
            }

            .employeeicon {
            width: 100px;
            height: 100px;
            position: relative;
            }
            .employeeicon:hover .fa-people-group{
            animation: pulse 2s infinite;
            }

            @keyframes pulse {
            0% {
                transform: rotate(0deg);
            }
            50% {
                transform: rotate(-10px);
            }
            100% {
                transform: rotate(0deg);
            }
            }

            .fas-fa-people-group {
            font-size: 48px;
            position: absolute;
            top: 50%;
            left: 50%;

            }
            .usericon {
            width: 100px;
            height: 100px;
            position: relative;
            }
            .usericon:hover .fa-users
            {
            animation: pulse 2s infinite;
            }
            @keyframes pulse
            {
            0% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.1);
            }
            100% {
                transform: scale(1);
            }
            }

            .fas-fa-people-group
            {
            font-size: 48px;
            position: absolute;
            top: 50%;
            left: 50%;

            }

            /*Sidebar Logo*/
            .sidebar .menu .item .logo img
            {
                width: 180px;
                height: fit-content;
                margin-left: 20px;
                margin-top: 20px;   
            }

            .sidebar hr
            {
                margin-top: 20px;
                opacity: 30%;
            }
        </style>
    </head>
    <body>
        <!--sidebar starts here-->
        <section class="header">
            <div class="sidebar">
                <div class="menu">
                    <div class="item">
                        <a href="user-dashboard.html" class="logo"><img src="/img/Logo new.png" alt=""></a>
                    </div>
                    <hr>
                    <div class="item">
                        <a class="sub-btn">SETTINGS<i class="fas fa-caret-right dropdown" style="margin-left: 100px;"></i></a>
                        <div class="sub-menu">
                            <a href="companyInfo.php" class="sub-item">Company Information</a>
                            <a href="user-info.html" class="sub-item">User Information</a>
                        </div>
                    </div>  
                    <div class="item">
                        <a class="sub-btn">EMPLOYEE<i class="fas fa-caret-right dropdown" style="margin-left: 93px;"></i></a>
                        <div class="sub-menu">
                            <a href="p-employee.html" class="sub-item">Primary Employees</a>
                            <a href="c-employee.html" class="sub-item">Secondary Employees</a>
                        </div>
                    </div>
                    <div class="item">
                        <a class="sub-btn">PAYROLL<i class="fas fa-caret-right dropdown"style="margin-left: 109px;"></i></a>
                        <div class="sub-menu">
                            <a href="allowances.html" class="sub-item">Allowance</a>
                            <a href="deductions.html" class="sub-item">Deductions</a>
                            <a href="payrollsetup.html" class="sub-item">Payroll setup</a>
                            <a href="payeecalculator.html" class="sub-item">PAYE calculator.</a>
                            <a href="https://taxpayerportal.tra.go.tz" class="sub-item">TAX Portal.</a>
                        </div>
                    </div>
                    <div class="item">
                        <a class="sub-btn">REPORTS<i class="fas fa-caret-right dropdown"style="margin-left: 109px;"></i></a>
                        <div class="sub-menu">
                        <a href="" class="sub-item">Summary Reports</a>
                        <a href="" class="sub-item">Detailed Reports</a>
                        </div>
                    </div>
                    <div class="item">
                        <a class="sub-btn" style="margin-left: 10px;"> <i class="fas fa-user"></i></a>
                        <div class="sub-menu">
                        <a href="" class="sub-item">Change Password.</a>
                        <form action="logout.php" method="post">
                        <button class="sub-item" id="logout-link" name="logout">Log Out.</button>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--sidebar ends here-->
        <!--Dashboard starts here-->
        <section class="main-content">
            <div class="container">
                <div class="dash-info">
                    <div class="box">
                        <a href="p-employee.html">Employees</a>
                        <div class="employeeicon"><i class="fas fa-people-group" style="font-size: 80px; margin-left:-5px; opacity: 70%;margin-top: 5px;"></i></div>
                    </div>
                    <div class="box" style="margin-left: 40px;">
                        <a href="">Users</a>
                        <div class="usericon"><i class="fas fa-users" style="font-size: 70px; margin-left: 55px;margin-top: 10px;opacity: 70%;"></i></div>
                    </div>
                    <div class="box" style="margin-left: 40px;">
                        <a href="">Tax Zone</a>
                        <div class="icon">
                        <i class="fa-solid fa-hand-holding-dollar" style = "font-size: 70px; margin-left: -20px;margin-top: 15px;opacity: 70%;"></i>
                        </div>
                    </div>
                </div>
                <hr>
            </div>
        </section>



        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>   
        <script type="text/javascript">
            $(document).ready(function() {
                $('.sub-btn').click(function(){
                    $(this).next('.sub-menu').slideToggle();
                    $(this).find('.dropdown').toggleClass('rotate');
                });
            });

        </script>


        <script>
            // Example logic to update progress based on monthly sales value
            const progressCircle = document.querySelector('.progress-circle');
            const progressText = progressCircle.querySelector('.progress-text');

            // Set the initial progress value
            let currentProgress = 0;

            // Update the progress circle based on new monthly sales value
            function updateProgress(newSalesValue) {
            // Calculate the progress percentage
            const progressPercentage = Math.floor((newSalesValue / MAX_SALES) * 100);

            // Update the progress text
            progressText.textContent = `${progressPercentage}%`;

            // Update the rotation angle of the progress bar
            const rotationAngle = (progressPercentage / 100) * 360;
            progressCircle.querySelector('.progress').style.transform = `rotate(${rotationAngle}deg)`;

            // Update the current progress value
            currentProgress = progressPercentage;
            }

            // Call the updateProgress function with the new monthly sales value
            updateProgress(newMonthlySales);
        </script>


    </body>
</html>
