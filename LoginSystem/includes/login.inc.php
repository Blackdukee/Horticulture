<?php


if (isset($_POST['submit'])) {
    // Grabbing data from the form
    $name = $_POST['UserName'];
    $email = $_POST['UserEmail'];
    $password = $_POST['UserPassword'];
}
//instantiating the signupContr class
include "../Classes/dbh.classes.php";
include "../Classes/login.classes.php";
include "../Classes/login_contr.classes.php";

$signup = new loginContr($name, $email, $password);
$signup->getUser($name, $email, $password);

// Going to back to front page 
header("Location: ../home.php?error=none");
