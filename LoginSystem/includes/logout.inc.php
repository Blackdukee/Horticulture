<?php 

if(isset($_COOKIE['rememberme'])){
        setcookie('rememberme', null, time() - 3600, '/');
}

session_start();
session_unset();
session_destroy();

// going back to front page
header("Location: /Horticulture/home.php?error=none");