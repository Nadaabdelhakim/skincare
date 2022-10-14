<?php 
include('../shared/config.php');
session_start();
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
    <link rel="stylesheet" href="./login.css.css">
</head>

<body>
<h1 id="log">LOGIN</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <label for="mail">Email</label><br>
        <input type="email" id="mail" name="email"><br><br>
        <label for="pass">Password</label><br>
        <input type="password" id="pass" name="password"><br><br>
        <button type="submit" name="add">LogIn</button><br><br>
        <a style=" color:white; text-align:center;" href="/tedx/skincare/sign/signup.php">Don't have an account! SignUp</a>
    </form>

</body>

</html>
<?php
if (isset($_POST['add'])) {
    $email =$conn->real_escape_string($_POST['email']);
    $password =$conn->real_escape_string($_POST['password']);

    $selectadmin = "SELECT * FROM `admin` where `adminemail`='$email' AND `adminpassword`='$password'";
    $s = mysqli_query($conn, $selectadmin);
    $rowadmin = mysqli_num_rows($s);
    if ($rowadmin > 0) {
        $admin = mysqli_fetch_assoc($s);
        $_SESSION['adminid'] = $admin['adminid'];
        $_SESSION['adminemail'] = $admin['adminemail'];
        header("location:/tedx/skincare/homepage/homeadmin.php");

    } else {
        $select = "SELECT * FROM `user` WHERE `useremail`='$email' AND `userpassword`='$password'";
        $run_select = mysqli_query($conn, $select);
        $rows = mysqli_num_rows($run_select);
        if ($rows > 0) {
            $data = mysqli_fetch_array($run_select);
            $_SESSION['useremail'] = $data['useremail'];
            $_SESSION['userid'] = $data['userid'];
           header("location:/tedx/skincare/home.php");
        } else {
            echo "<h2 style='text-align:center; color:#F8B400;'> 'Your Account maybe false, Try Again!'</h2>";
        }
    }
}
?>