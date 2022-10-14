<?php include('../shared/config.php');


?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="./signup.css.css">
</head>

<body>
    <h1 id="log">Sign Up</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <label for="username">User Name</label> <br>
        <input type="text" id="username" name="name" placeholder="Enter Your Username"></div> <br><br>
        <label for="mail">Email</label><br>
        <input type="email" id="mail" name="email" placeholder="Enter Your Email"><br><br>
        <label for="pass">Password</label><br>
        <input type="password" id="pass" name="password" placeholder="Enter Your Password"><br><br>
        <label for="mobile">Mobile</label><br>
        <input type="number" id="mobile" name="phone" placeholder="Enter Your Phone"><br><br>
        <label for="male">Male</label>
        <input type="radio" name="gender" id="male" value="male" checked>
        <label for="female">Female</label>
        <input type="radio" name="gender" id="female" value="female"><br>
        <button type="submit" name="add">Sign Up</button><br><br>
        <a style=" color:white; text-align:center;" href="/tedx/skincare/sign/login.php">Already have an account! LogIn</a>
    </form>
</body>

</html>
<?php
if (isset($_POST['add'])) {
    $username = $conn->real_escape_string($_POST['name']);
    $useremail = $conn->real_escape_string($_POST['email']);
    $userpassword = $conn->real_escape_string($_POST['password']);
    $userphone = $conn->real_escape_string($_POST['phone']);
    $gender = $conn->real_escape_string($_POST['gender']);

    $selectuserMail = "SELECT `useremail` FROM `user` WHERE `useremail` = '$useremail'";
    $rows = mysqli_num_rows(mysqli_query($conn, $selectuserMail));
    if ($rows >= 1) {
        echo "This Email Already Exist";
    } else {
        $insert = "INSERT INTO `user` VALUES (NULL,'$username', '$useremail','$userpassword','$userphone','$gender')";
        $runInsert = mysqli_query($conn, $insert);
        if ($runInsert) {
            // $_SESSION['userMail']=$useremail;
            header('location:/tedx/skincare/home.php');
        }
    }
}
?>