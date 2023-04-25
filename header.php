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
                        <script></script>
                        <?php

                        if (isset($_SESSION["UserName"])) {


                        ?>
                            <a href="/account-settings/index.html">
                                <?php echo $_SESSION['UserName'] ?>
                            </a>
                            <a href="/Horticulture/LoginSystem/includes/logout.inc.php" class="header-login-a"><button>Logout</button> </a>
                        <?php
                        }else {


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