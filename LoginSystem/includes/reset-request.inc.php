<?php


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';        
// check if the user has clicked the reset password button
if (isset($_POST["reset-request-submit"])) {

    // create selector and token
    $selector = bin2hex(random_bytes(8));
    $token  = random_bytes(32);
    
    // create url for the user to reset the password
    $url = "http://localhost:3000/create-new-password.php?selector=" . $selector . "&validator=" . bin2hex($token);

    $exires = date("U") + 1800;
    
    require 'dbh.inc.php';
    
    //delete the old pasword 
    $userEmail = $_POST["email"];
    $sql = "DELETE FROM pwdReset WHERE pwdResetEmail=?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "There was an error!";
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, "s", $userEmail);
        mysqli_stmt_execute($stmt);
    }
    // insert the token information into the database
    $sql = "INSERT INTO pwdReset (pwdResetEmail, pwdResetSelector, pwdResetToken, pwdResetExpires) VALUES (?,?,?,?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "There was an error!";
        exit();
    } else {
        // hashing the token
        $hashedToken = password_hash($token, PASSWORD_DEFAULT);
        mysqli_stmt_bind_param($stmt, "ssss", $userEmail, $selector, $hashedToken, $exires);
        mysqli_stmt_execute($stmt);
    }
    // close the connection
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
    
    // send the email to the user
    $to = $userEmail;
    $subject = 'Reset your password for Horticulture';

    $massage = '<p>We recieved a password reset request. The link to reset your password is below. If you did not make this request, you can ignore this email</p>';

    $massage .= '<p>Here is your password reset link: </br>';

    $massage .= '<a href="' . $url . '">' . $url . '</a></p>';

    $header = "From: Horticulture <blackduck682@gmail.com>\r\n";

    $header .= "Reply-To: blackduck682@gmail.com\r\n";

    $header .= "Content-type: text/html\r\n";
    
    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'blackduck682@gmail.com';
    $mail->Password = 'lswsglmtyehfgesx';
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;
    $mail->setFrom('blackduck682@gmail.com');
    $mail->addAddress($_POST['email']);
    $mail->isHTML(true);
    $mail->Subject = $subject;
    $mail->Body = $massage;
    $mail->send();

    echo "<script>alert('Message sent successfully');
document.location.href='../home.html';
</script>";


    header("Location: ../reset-password.php?reset=success");
} else {
    header("Location: ../index.php");
}
