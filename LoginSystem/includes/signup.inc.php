<?php 


if(isset($_POST['submit'])){
// Grabbing data from the form
    $name = $_POST['UserName'];
    $email = $_POST['UserEmail'];
    $password = $_POST['UserPassword'];
    $passwordRe = $_POST['re_password'];
    
}
    //instantiating the signupContr class
    include "../Classes/dbh.classes.php";
    include "../Classes/signup.classes.php";
    include "../Classes/signup_contr.classes.php";    
    $signup = new SignupContr($name, $email, $password, $passwordRe);
    $signup->signupUser();
    
    // Going to back to front page 
    header("Location: ../signup.php?error=none");
    
    ?>