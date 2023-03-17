<?php

session_start();

?> 


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


</head>

<body>

    <header>
        <nav>
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
                    <ul class="menu-member">
                        <?php 
                        
                        if(isset($_SESSION["UserName"])){
                        
                            
                        ?>
                        <a href="#"><?php echo $_SESSION['UserName'] ?></a>
                        <a href="includes/logout.inc.php" class="header-login-a"><button>Logout</button> </a>
                        <?php 
                        }else{
                        
                        
                        ?>
                        <a href="#"><button>Sign up</button></a>
                        <a href="#" class="header-login-a"><button>Login</button> </a>
                        <?php 
                        }
                        ?>
                    </ul>
                </div>

            </div>

        </nav>
    </header>
    <section>
        <!-- this is the main div for the login form -->

    </section>
    <!-- this is the link for the ionicons to get icons -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>


</body>

</html>