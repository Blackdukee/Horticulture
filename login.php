<?php

session_start();


if(isset($_SESSION['UserName'])){
    
    header("Location: /Horticulture/Shop/index2.php");
    exit();
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
    <?php include 'header.php';?>
    <div class="SignForm">
        <!-- this is the main div for the login form -->
        <div class="form-box">

            <div class="form-value">
                <!-- the login form is starting from  here  -->
                <form action="LoginSystem/includes/login.inc.php" method="post">

                    <h2>Login</h2>
                    <div class="inputbox">
                        <ion-icon name="mail-outline"></ion-icon>
                        <input type="email" name="UserEmail" id="" required>
                        <label for="">Email</label>

                    </div>

                    <div class="inputbox">
                        <ion-icon name="lock-closed-outline"></ion-icon>
                        <input type="password" name="UserPassword" id="" required>

                        <label for="">Password</label>
                    </div>
                    <div class="forget">
                        <label for="">
                            <input type="hidden" name="rememberme" value="off">
                            <input type="checkbox" name="rememberme" id="rememberme">Remember Me <a
                                href="reset-password.php"> Forget Password</a>
                        </label>

                    </div>
                    <input type="submit" class="submit" name="submit" value="Login">
                    <div class="register">
                        <p>Don't have an account <a href="a">Register</a></p>
                    </div>
                </form>
            </div>
        </div>

    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script type="text/javascript" src="jsfiles/main2.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>

</body>

</html>