<?php 


session_start();
session_unset();
session_destroy();

// going back to front page
header("Location: ../home.php?error=none");