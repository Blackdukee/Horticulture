<?php 

session_start();

if(isset($_SESSION['UserName'])){
    
    header("Location: /Horticulture/Shop/index2.php");
    exit();
}
if(isset($_GET['error'])){
    $error = $_GET['error'];
        
    switch($error){ 
            
        case 'emptyinput':
            echo '<script>alert("Please fill all the fields")</script>';
            break;
        case 'invaliduid':
            echo '<script>alert("Please enter a valid username")</script>';
            break;
        case 'invalidemail':
            echo '<script>alert("Please enter a valid email")</script>';
            break;
        case 'passwordsdontmatch':
            echo '<script>alert("Passwords don\'t match")</script>';
            break;
        case 'usertaken':
            echo '<script>alert("Username already taken")</script>';
            break;
        case 'invalidphone':
            echo '<script>alert("Please enter a valid phone number")</script>';
            break;
        case 'stmtfailed':
            echo '<script>alert("Something went wrong, try again")</script>';
            break;
        case 'none':
            echo '<script>alert("You have signed up successfully")</script>';
            break;
        default:
            echo '<script>alert("Something went wrong, try again")</script>';
            break;
    }
    
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="/Horticulture/Shop/scss/style2.scss">
    <link rel="stylesheet" href="/Horticulture/Shop/scss/formStyle.css">
    <title>Document</title>
</head>

<body>

    <?php include 'header.php'  ?>

    <div class="SignForm">
        <!-- this is the script for the password matching -->


        <!-- this is the main div for the register form -->
        <div class="form-box">

            <div class="form-value">
                <!-- the login form is starting from  here  -->
                <form action="/Horticulture/LoginSystem/includes/signup.inc.php" method="post">

                    <h2>Register</h2>

                    <div class="inputbox">
                        <ion-icon name="mail-outline"></ion-icon>
                        <input type="email" name="UserEmail" id="" required>
                        <label for="">Email</label>

                    </div>

                    <div class="inputbox">
                        <ion-icon name="people-outline"></ion-icon>
                        <input type="text" name="UserName" id="" required>
                        <label for="">Username</label>
                    </div>

                    <div class="inputbox">
                        <ion-icon name="call-outline"></ion-icon>
                        <input type="text" name="Phone" id="" required>
                        <label for="">Phone</label>
                    </div>

                    <div class="inputbox">
                        <ion-icon name="lock-closed-outline" id="PassIcon"></ion-icon>
                        <input type="password" name="UserPassword" id="password" required onkeyup="check();">
                        <label for="">Password</label>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="lock-closed-outline" id="RePassIcon"></ion-icon>
                        <input type="password" name="re_password" id="re_password" required onkeyup="check();">
                        <label for="">Re-password</label>

                    </div>
                    <div class="forget">
                        <label for="">
                            <input type="hidden" name="rememberme" value="off">
                            <input type="checkbox" name="rememberme" id="rememberme">Remember Me <a
                                href="reset-password.php"> Forget Password</a>
                        </label>

                    </div>
                    <input type="submit" class="submit" name="submit" value="Register">
                    <div class="register">
                        <p>Have an account <a href="a">Login <span id="message"></span></a></p>
                    </div>
                    <span id="message"></span>
                </form>
            </div>
        </div>



        <div class="form-box2">
            <form class="row g-3" action="/Horticulture/LoginSystem/includes/signup.inc.php" method="post">
                <div class="col-md-6">
                    <label for="UserEmail" class="form-label">Email</label>
                    <input type="email" name="UserEmail" class="form-control" id="UserEmail">
                </div>
                <div class="col-md-6">
                    <label for="inputPassword4" class="form-label">Password</label>
                    <input type="password" class="form-control" name="UserPassword" id="inputPassword4">
                </div>
                <div class="col-md-6">
                    <label for="UserName" class="form-label">Full Name</label>
                    <input type="text" class="form-control" name="UserName" id="UserName"
                        placeholder="Enter you'er full name">
                </div>
                <div class="col-md-6">
                    <label for="re_password" class="form-label">Re-password</label>
                    <input type="text" class="form-control" name="re_password" id="re_password"
                        placeholder="Match Password">
                </div>
                <div class="col-md-6">
                    <label for="UserAddress" class="form-label">Address</label>
                    <input type="text" name="UserAddress" class=" form-control" id="UserAddress">
                </div>
                <div class="col-md-6">
                    <label for="Phone" class="form-label">Phone</label>
                    <input type="text" name="Phone" class=" form-control" id="Phone">
                </div>

                <div class="col-12">
                    <div class="form-check">

                        <input type="hidden" name="rememberme" value="off">
                        <input class="form-check-input" type="checkbox" name="rememberme" id="rememberme">
                        <label class="form-check-label" for="rememberme">
                            Remember Me
                        </label>
                    </div>
                </div>
                <div class="col-12">
                    <button type="submit" name="submit" class="btn btn-primary">Sign in</button>
                </div>
            </form>
        </div>
    </div>



    <!-- these are links for the ionicons to get icons -->

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script>
    var check = function() {
        if (document.getElementById('password').value ==
            document.getElementById('re_password').value) {
            document.getElementById('PassIcon').style.color = 'green';
            document.getElementById('RePassIcon').style.color = 'green';
        } else {

            document.getElementById('PassIcon').style.color = 'red';
            document.getElementById('RePassIcon').style.color = 'red';

        }

    };
    </script>

</body>

</html>