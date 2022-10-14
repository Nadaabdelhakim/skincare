<?php
session_start();
session_unset();
session_destroy();
// echo"You Shoud Log In First";
header("refresh:2;url=/tedx/skincare/sign/signup.php");
?>