<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="cssfiles/index.css">
</head>

<body>

    <section>
        <!-- this is the script for the password matching -->
        <script>
            var check = function() {
                if (document.getElementById('password').value ==
                    document.getElementById('re_password').value) {
                    document.getElementById('PassIcon').style.color = 'green';
                    document.getElementById('RePassIcon').style.color = 'green';
                } else {

                    document.getElementById('PassIcon').style.color = 'red';
                    document.getElementById('RePassIcon').style.color = 'red';

                }

            };
        </script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

        <!-- this is the main div for the register form -->
        <div class="form-box">

            <div class="form-value">
                <!-- the login form is starting from  here  -->
                <form action="/includes/signup.inc.php" method="post">

                    <h2>Register</h2>
                    <div class="inputbox">
                        <ion-icon name="people-outline"></ion-icon>
                        <input type="text" name="UserName" id="" required>
                        <label for="">Username</label>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="mail-outline"></ion-icon>
                        <input type="email" name="UserEmail" id="" required>
                        <label for="">Email</label>

                    </div>

                    <div class="inputbox">
                        <ion-icon name="lock-closed-outline" id="PassIcon"></ion-icon>
                        <input type="password" name="UserPassword" id="password" required onkeyup="check();">
                        <label for="">Password</label>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="lock-closed-outline" id="RePassIcon"></ion-icon>
                        <input type="password" name="re_password" id="re_password" required onkeyup="check();">
                        <label for="">Re-password</label>
                    </div>
                    <input type="submit" class="submit" name="submit" value="Register">
                    <div class="register">
                        <p>Have an account <a href="a">Login <span id="message"></span></a></p>
                    </div>
                    <span id="message"></span>
                </form>
            </div>
        </div>

    </section>



    <!-- this is the link for the ionicons to get icons -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>


</body>

</html>