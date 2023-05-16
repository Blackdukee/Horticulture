<?php 


if(isset($_POST['submit'])){
// Grabbing data from the form
    $name = $_POST['UserName'];
    $email = $_POST['UserEmail'];
    $password = $_POST['UserPassword'];
    $passwordRe = $_POST['re_password'];
    $address = $_POST['UserAddress'];
    $phone = $_POST['Phone'];
    $rembmerme = $_POST['rememberme'];

}
    //instantiating the signupContr class
    include "../Classes/dbh.classes.php";
    include "../Classes/signup.classes.php";
    include "../Classes/signup_contr.classes.php";    
    include "../Classes/login.classes.php";
    include "../Classes/login_contr.classes.php";
    $signup = new SignupContr($name, $email,$phone, $password, $passwordRe, $address );
    $signup->signupUser();
    
    $login =loginContr::forLogin($name, $email, $password,$rembmerme);
    $login->getUser($name, $email, $password,$rembmerme);

    // Going to back to front page 
    header("Location: /Horticulture/home.php?error=none");
    
    ?>