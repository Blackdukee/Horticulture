<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="cssfiles/index.css">
    <link rel="stylesheet" href="cssfiles/header.css">

    <title>Document</title>
    <?php
    if (isset($_POST["UserEmail"]) && isset($_POST["UserPassword"]) && isset($_POST["UserName"])) {
        $email = $_POST["UserEmail"];
        $Password = $_POST["UserPassword"];
        $name = $_POST["UserName"];
        echo '<script type ="text/JavaScript">';
        echo 'alert("You\'er name is :' . $name . ' and your password is :' . $Password . '")';
        echo '</script>';
    }
    ?>

</head>

<body>

    <header>
        <div class="navbar">
            <div class="logo"><ion-icon name="leaf" class="leaf"></ion-icon><a href="a">HortiCulture</a></div>
            <ul class="links">
                <li><a href="a">
                        <div class="home"><b>home</b> </div>
                    </a></li>
                <li><a href="a">
                        <div class="plants"><b>plants</b> </div>
                    </a></li>
                <li><a href="a">
                        <div class="tools"><b>tools</b> </div>
                    </a></li>
                <li><a href="a">
                        <div class="about"><b>about</b> </div>
                    </a></li>
            </ul>
            
            <a href="a" class="action_btn"><b>Get Started</b> </a>
            <div class="toggle_btn">
                <ion-icon name="menu-outline"></ion-icon>
            </div>

        </div>

    </header>
    <section>
        <!-- this is the main div for the login form -->
        <div class="form-box">

            <div class="form-value">
                <!-- the login form is starting from  here  -->
                <form action"" method="post">

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
                        <label for=""> <input type="checkbox" name="" id="">Remember Me <a href="a"> Forget Password</a>
                        </label>

                    </div>
                    <button><p>Login</p> </button>
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