<?php

session_start();


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/cssfiles/index.css">
    <title>Document</title>


</head>

<body>

    <section>
        <!-- this is the main div for the login form -->
        <div class="form-box">

            <div class="form-value">
                <!-- the login form is starting from  here  -->
                <form action="includes/login.inc.php" method="post">

                    <h2>Login</h2>
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
                        <ion-icon name="lock-closed-outline"></ion-icon>
                        <input type="password" name="UserPassword" id="" required>
                        
                        <label for="">Password</label>
                    </div>
                    <div class="forget">
                        <label for=""> <input type="checkbox" name="" id="">Remember Me <a href="a"> Forget Password</a>
                        </label>

                    </div>
                    <input type="submit" class="submit" name="submit" value="Login">
                    <div class="register">
                        <p>Don't have an account <a href="a">Register</a></p>
                    </div>
                </form>
            </div>
        </div>

    </section>
    <!-- this is the link for the ionicons to get icons -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>