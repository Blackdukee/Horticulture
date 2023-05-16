<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <!-- make reset password form -->
    <form action="LoginSystem/includes/reset-request.inc.php" method="post">
        <input type="text" name="email" placeholder="Enter your email address...">
        <button type="submit" name="reset-request-submit">Receive new password by email</button>
    </form>
    <!-- make reset password form -->
    <?php
    // check if we have the reset=success in url
    if (isset($_GET["reset"])) {
        if ($_GET["reset"] == "success") {
            echo '<p class="signupsuccess">Check your email!</p>';
        }
    }
    ?>

</body>

</html>