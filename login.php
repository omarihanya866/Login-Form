<?php
include('server.php');
?>

<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!--<title> Responsive Login and Signup Form </title>-->

        <!-- CSS -->
        <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
        <style>
            /* Google Fonts - Poppins */
            @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap');

            *{
                margin: 0;
                padding: 0;
                box-sizing: border-box;
                font-family: 'Poppins', sans-serif;
            }
            /* Global Styles */
            body{
                width: 100%;
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

            button.normal{
                font-size: 14px;
                font-weight: 600;
                padding: 15px 30px;
                color: #000;
                background-color: #fff;
                border-radius: 4px;
                cursor: pointer; 
                border: none;
                outline: none;
                transition: 0.2s;
            }

            button.white{
                font-size: 13px;
                font-weight: 600;
                padding: 11px 18px;
                color: #fff;
                background-color: transparent;
                cursor: pointer; 
                border: 1px solid #fff;
                outline: none;
                transition: 0.2s;
            }

            /* Header Starts Here */
            #header {
                display: flex;
                align-items: center;
                justify-content: space-between;
                padding: 20px 80px;
                background: darkcyan;
                box-shadow: 0 5px 15px rgba(0, 0, 0, 0.09);
                z-index: 999;
                position: sticky;
                top: 0;
                left: 0;

            }

            #navbar{
                display: flex;
                align-items: center;
                justify-content: center;
            }

            #navbar li{
                list-style: none;
                padding: 0 20px;
                position: relative;
            }

            #navbar li a{
                text-decoration: none;
                font-size: 16px;
                font-weight: 600;
                color: #ffffff;
                transition: 0.3 ease;
            }

            #navbar li a:hover,
            #navbar li a.active {
                color: #000000;
            }

            #navbar li a:hover::after{
                content: "";
                width: 30px;
                height: 2px;
                background: #000000;
                position: absolute;
                bottom: -4px;
                left: 20px;
            }
            #signInBtn, #signOutBtn{
                padding: 7px 15px;
                background-color: #e3e6f3;
                box-shadow: 0 5px 15px rgba(0, 0, 0, 0.09);
            }

            #signInBtn:hover, #signOutBtn:hover{
                box-shadow: 0 5px 15px rgba(0, 0, 1, 0.3);
            }

            #mobile{
                display: none;
                align-items: center;
            }

            #close{
                display: none;
            }

            .container{
                background-image: url("img/logins.jpg");
                background-size: cover;
                background-position: top 34% right 0;
                height: 89vh;
                width: 100%;
                display: flex;
                align-items: center;
                justify-content: center;
                /* background-color: #4070f4; */
                column-gap: 30px;

            }
            .form{
                position: absolute;
                max-width: 430px;
                width: 100%;
                padding: 30px;
                border-radius: 6px;
                background: #FFF;
            }
            /* .form.signup{
                opacity: 0;
                pointer-events: none;
            }
            .forms.show-signup .form.signup{
                opacity: 1;
                pointer-events: auto;
            }
            .forms.show-signup .form.login{
                opacity: 0;
                pointer-events: none;
            } */


            #create-acct {
                display: none;
                margin-top: 150px;
            }

            header{
                font-size: 28px;
                font-weight: 600;
                color: #232836;
                text-align: center;
            }
            form{
                margin-top: 30px;
            }
            .form .field{
                position: relative;
                height: 50px;
                width: 100%;
                margin-top: 20px;
                border-radius: 6px;
            }
            .field input,
            .field select,
            .field button{
                height: 100%;
                width: 100%;
                border: none;
                font-size: 16px;
                font-weight: 400;
                border-radius: 6px;
            }
            
            .field select,
            .field input{
            outline: none;
                padding: 0 15px;
                border: 1px solid#CACACA;
            }

            .field select,
            .field input:focus{
                border-bottom-width: 2px;
            }
            .eye-icon{
                position: absolute;
                top: 50%;
                right: 10px;
                transform: translateY(-50%);
                font-size: 18px;
                color: #8b8b8b;
                cursor: pointer;
                padding: 5px;
            }
            .field button{
                color: #fff;
                background-color: #088178;
                transition: all 0.3s ease;
                cursor: pointer;
            }
            .field button:hover{
                background-color: #0baa9f;
            }
            .form-link{
                text-align: center;
                margin-top: 10px;
            }
            .form-link span,
            .form-link a{
                font-size: 14px;
                font-weight: 400;
                color: #232836;
            }
            .form a{
                color: #0171d3;
                text-decoration: none;
            }
            .form-content a:hover{
                text-decoration: underline;
            }
            .line{
                position: relative;
                height: 1px;
                width: 100%;
                margin: 36px 0;
                background-color: #d4d4d4;
            }
            .line::before{
                content: 'Or';
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                background-color: #FFF;
                color: #8b8b8b;
                padding: 0 15px;
            }
            @media screen and (max-width: 400px) {
                .form{
                    padding: 20px 10px;
                }   
            }
            /* Chrome, Safari, Edge, Opera */
            input::-webkit-outer-spin-button,
            input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
            }
        </style>
    </head>
    <body>
        <section id="header">
            <a href=""><img src="" class="logo" alt=""></a>
            <div>
                <ul id="navbar">
                    <li><a href="">Home</a></li>
                    <li><a href="">About</a></li>
                    <li><a href="">Contact</a></li>
                    <a href="#" id="close"><i  class="fa fa-times"></i></a>
                </ul>
            </div>
            <div id="mobile">
                <a href="cart.html"><i class="fa fa-bag-shopping"></i></a>
                <i id="bar" class="fa fa-outdent"></i>
            </div>
        </section>

        <section class="container forms">
            <div class="form login" id="main">
                <div class="form-content">
                    <header>Login</header>
                    <form action="" method="post">
                        <div class="field input-field">
                            <input id="email" type="email" placeholder="Email" class="input" required>
                        </div>

                        <div class="field input-field">
                            <input id="password" type="password" placeholder="Password" class="password" required>
                            <i class='fa fa-eye-slash eye-icon'></i>
                        </div>

                        <div class="field button-field">
                            <button id="submit">Login</button>
                        </div>
                    </form>

                    <div class="form-link">
                        <a href="#" class="forgot-pass">Forgot password?</a>
                    </div>

                    <div class="line"></div>

                    <div class="form-link">
                        <span>Don't have an account? <a id="sign-up" class="link signup-link">Signup</a></span>
                    </div>
                </div>

            </div>

            <!-- Signup Form -->

            <div class="form signup" id="create-acct">
                <div class="form-content">
                    <header>Signup</header>
                    <form action="server.php" method="post">
                        <div class="field input-field">
                            <input id="userName" type="text" placeholder="User Name" class="input" name="userName" required>
                        </div>
                        <div class="field input-field">
                            <input id="tinNumber" type="number" placeholder="Tin Number" class="input" name="tinNumber" required>
                        </div>
                        <div class="field input-field">
                            <input id="email-signup" type="email"  placeholder="Email" class="input" name="userEmail" required>
                        </div>
                        <div class="field input-field">
                            <input id="phoneNumber" type="number" placeholder="Phone Number" name="phoneNumber" required>
                        </div>
                        <div class="field input-field">
                            <input id="password-signup" type="password" placeholder="Create password" class="password" name="password" required>
                        </div>

                        <div class="field input-field">
                            <input id="confirm-password-signup" type="password" placeholder="Confirm password" class="password" name="confirmPassword" required>
                            <i class='bx bx-hide eye-icon'></i>
                        </div>


                        <div class="field button-field">
                            <button id="create-acct-btn" name="reg_user" value="Register">Signup</button>
                        </div>
                    </form>

                    <div class="form-link">
                        <span>Already have an account? <a href="#" id="return-btn" class="link login-link">Login</a></span>
                    </div>
                </div>

            </div>
        </section>

        <!-- JavaScript -->
        <script>
            const submitButton = document.getElementById("submit");
            const signupButton = document.getElementById("sign-up");
            const emailInput = document.getElementById("email");
            const passwordInput = document.getElementById("password");
            const main = document.getElementById("main");
            const createacct = document.getElementById("create-acct");
            const signupEmailIn = document.getElementById("email-signup");
            const confirmSignupEmailIn = document.getElementById("confirm-email-signup");
            const signupPasswordIn = document.getElementById("password-signup");
            const confirmSignUpPasswordIn = document.getElementById("confirm-password-signup");
            const createacctbtn = document.getElementById("create-acct-btn");
            const returnBtn = document.getElementById("return-btn");
            const signOutButton = document.getElementById("signOutBtn");
            const forms = document.querySelector(".forms"),
            pwShowHide = document.querySelectorAll(".eye-icon")
            // links = document.querySelectorAll(".link");



            // Switch Up the Login and SignUp form
            signupButton.addEventListener("click", () => {
                main.style.display = "none";
                createacct.style.display = "block";

            });

            returnBtn.addEventListener("click", function () {
                main.style.display = "block";
                createacct.style.display = "none";
            });


            /*password icon effect*/
            pwShowHide.forEach(eyeIcon => {
            eyeIcon.addEventListener("click", () => {
            let pwFields = eyeIcon.parentElement.parentElement.querySelectorAll(".password");
            
            pwFields.forEach(password => {
                if(password.type === "password"){
                    password.type = "text";
                    eyeIcon.classList.replace("fa-eye-slash", "fa-eye");
                    return;
                }
                password.type = "password";
                eyeIcon.classList.replace("fa-eye", "fa-eye-slash");
            })
            
            })
            })    
        </script>
    </body>
</html>
