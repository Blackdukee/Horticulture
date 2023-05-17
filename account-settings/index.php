<?php

session_start();




if(isset($_POST['submit'])){
	$oldPass = $_POST['oldPass'];
	$NewPass = $_POST['newPass'];
	$checkpass = $_POST['checkPass'];
	$UserEmail = $_SESSION['UserEmail'];

	include_once "C:\\xampp\htdocs\Horticulture\LoginSystem\Classes\dbh.classes.php";
	include_once "C:\\xampp\htdocs\Horticulture\LoginSystem\Classes\login.classes.php";
	include_once "C:\\xampp\htdocs\Horticulture\LoginSystem\Classes\login_contr.classes.php";
	$signup = LoginContr::forUpdatePassword();
	$signup->UpdatePassword($oldPass,$NewPass,$checkpass,$UserEmail);
	header("Location: /Horticulture/account-settings/index.php?error=none");
	exit();

}



?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Account Settings UI Design</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- FontAwesome 6.2.0 CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css"
        href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="/Horticulture/Shop/scss/style2.scss">

</head>

<body>
    <?php include_once "C:\\xampp\htdocs\Horticulture\header.php"; ?>

    <section class="py-5 my-5">
        <div class="container" id="result">
            <h1 class="mb-5">Account Settings</h1>
            <div class="bg-white shadow rounded-lg d-block d-sm-flex">
                <div class="profile-tab-nav border-right">
                    <div class="p-4">
                        <div class="img-circle2 text-center mb-3">
                            <img class="shadow" id="profileimg"
                                src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($_SESSION['UserImg']); ?>"
                                alt="image" />
                        </div>

                        <h4 class="text-center"><?php echo $_SESSION['UserName']  ?></h4>
                    </div>
                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <a class="nav-link active" id="account-tab" data-toggle="pill" href="#account" role="tab"
                            aria-controls="account" aria-selected="true">
                            <i class="fa fa-home text-center mr-1"></i>
                            Account
                        </a>
                        <a class="nav-link" id="password-tab" data-toggle="pill" href="#password" role="tab"
                            aria-controls="password" aria-selected="false">
                            <i class="fa fa-key text-center mr-1"></i>
                            Password
                        </a>
                        <a class="nav-link" id="favorites-tab" data-toggle="pill" href="#favorites" role="tab"
                            aria-controls="favorites" aria-selected="false">
                            <i class="fa fa-user text-center mr-1"></i>
                            Favorites
                        </a>


                    </div>
                </div>
                <div class="tab-content p-4 p-md-5" id="v-pills-tabContent">

                    <div class="tab-pane fade show active" id="account" role="tabpanel" aria-labelledby="account-tab">
                        <form id="form1">
                            <h3 class="mb-4">Account Settings</h3>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Full Name</label>
                                        <input type="text" class="form-control" name="UserName"
                                            value="<?php echo $_SESSION['UserName']  ?>">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="text" class="form-control" name="UserEmail"
                                            value="<?php echo $_SESSION['UserEmail']  ?>" disabled>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Phone number</label>
                                        <input type="text" class="form-control" name="UserPhone"
                                            value="<?php echo $_SESSION['UserPhone']  ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Address</label>
                                        <input type="text" class="form-control" name="UserAddress"
                                            value="<?php echo $_SESSION['UserAddress']  ?>">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Uploade New img</label>
                                        <input type="file" name="file" id="file">

                                    </div>
                                </div>


                            </div>
                            <div>
                                <input type="submit" class="btn btn-primary" name="updatesetting" id="updatesetting"
                                    value="Test">
                                <button class="btn btn-light">Cancel</button>
                            </div>
                        </form>
                    </div>


                    <div class="tab-pane fade" id="password" role="tabpanel" aria-labelledby="password-tab">
                        <form action="" method="post">
                            <h3 class="mb-4">Password Settings</h3>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Old password</label>
                                        <input type="password" class="form-control" name="oldPass">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>New password</label>
                                        <input type="password" class="form-control" name="newPass">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Confirm new password</label>
                                        <input type="password" class="form-control" name="checkPass">
                                    </div>
                                </div>
                            </div>
                            <div>
                                <input type="submit" class="btn btn-primary" name="submit">
                                <button class="btn btn-light">Cancel</button>
                            </div>
                        </form>
                    </div>



                    <div class="tab-pane fade" id="favorites" role="tabpanel" aria-labelledby="favorites-tab">
                        <form action="" method="post">
                            <h3 class="mb-4">favorites Settings</h3>
                            <div style="height: 300px; overflow-y:auto;">
                                <ul class="list-group">
                                    <?php
							        for($i=0;$i<10;$i++)
									echo '<li class="list-group-item"> 
								    <div class="media-body">
									    <h4>John Doe <small><i>Posted on February 19, 2016</i></small></h4>
									    <p>Lorem ipsum...</p>
									</div>
								</li>';
							  ?>

                                </ul>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php include 'http://localhost/Horticulture/cartComponent.php';?>
    </section>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>
    //form Submit
    $("#form1").submit(function(evt) {

        evt.preventDefault();
        var formData = new FormData($(this)[0]);
        $("#file").val(null);
        $("#profileimg").attr('src',
            'data:image/jpg;charset=utf8;base64,<?php echo base64_encode($_SESSION['UserImg']) ?>')

        $.ajax({
            url: '/Horticulture/te.php',
            type: 'POST',
            data: formData,
            async: false,
            cache: false,
            contentType: false,
            enctype: 'multipart/form-data',
            processData: false,
            success: function(response) {
                alert("updated successfully");
                var parser = new DOMParser();
                var responseHtml = parser.parseFromString(response,
                    "text/html"); // Parse the AJAX response as HTML using the DOMParser API
                var myElement = responseHtml.getElementById(
                    "profileimg"); // Select the desired HTML element using standard DOM APIs

                $("#profileimg").attr('src', myElement.getAttribute("src"));
                // Extract the date string from the HTML using a DOM API selector

            }
        });

        return false;

    });
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script type="text/javascript" src="http://localhost/Horticulture/Shop/jsfiles/main2.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html>