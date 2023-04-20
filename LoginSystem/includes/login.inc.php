<?php


if (isset($_POST['submit'])) {
    // Grabbing data from the form
    $name = "test";
    $email = $_POST['UserEmail'];
    $password = $_POST['UserPassword'];
    $rembmerme = $_POST['rememberme'];
        

}
//instantiating the signupContr class
include "../Classes/dbh.classes.php";
include "../Classes/login.classes.php";
include "../Classes/login_contr.classes.php";


$signup = new loginContr($name, $email, $password,$rembmerme);
$signup->getUser($name, $email, $password,$rembmerme);


// Going to back to front page 
header("Location: http://localhost/Horticulture/home.php?error=none");
