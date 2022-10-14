<?php
include("../shared/config.php");
include("../shared/authuser.php");


if (isset($adminid)) {
    echo "You can't enter this page!";
    header("refresh:2;url=/tedx/skincare/homepage/homeadmin.php");
} elseif (isset($userid)) {

    $select = "SELECT * FROM `user` WHERE `userid`= $userid";
    $runselect = mysqli_query($conn, $select);
    $fetchuser = mysqli_fetch_assoc($runselect);

    $selected = "SELECT * FROM `book`
 JOIN `product`
 ON `book`.`p_id` = `product`.`productid` WHERE `u_id`= '$userid'";
    $runselected = mysqli_query($conn, $selected);
    $data = mysqli_fetch_array($runselected);



?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./profile.css">
        <link rel="preconnect" href="https://fonts.googleapis.com/%22%3E">
        <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Alata&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="../css/all.min.css">
        <title>profile</title>
    </head>

    <body>
        <section id="first">
            <div id="nav">
                <ul>
                    <li><a href="/tedx/skincare/index.php">Nefertari</a></li>
                    <li><a href="/tedx/skincare/home.php">home</a></li>
                    <li><a href="/tedx/skincare/product/html/product.php">product</a></li>
                    <li><a href="/tedx/skincare/profile/profile.php">Account</a></li>
                    <?php if (isset($_SESSION['useremail']) || isset($_SESSION['adminemail'])) : ?>
                        <li><span><a href="/tedx/skincare/shared/logout.php"><i class="fas fa-user-circle"></i> log out</a></span></li>
                    <?php else : ?>
                        <li><span><a href="/tedx/skincare/sign/login.php"><i class="fas fa-user-circle"></i> log in</a></span></li>
                    <?php endif; ?>
                </ul>
            </div>

        </section>

    <?php



}

if (isset($_POST['update'])) {
    $username = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $update = "UPDATE `user` SET `username`='$username', `useremail` ='$email', `userphone`='$phone' WHERE `userid`= '$userid' ";
    $runupdate = mysqli_query($conn, $update);

    header("location:profile.php");
}


    ?>
    <section id="file">
        <h1>profile</h1>
        <div id="back"></div>
        <div id="back2">
            <div class="con">
                <table border="1">
                    <thead>
                        <tr>
                            <th>Product Name</th>
                            <th>Product Price</th>
                            <th>Product Quantity</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($runselected as $data) { ?>
                            <tr>
                                <td>
                                    <span> Product Name :
                                        <?php echo  $data['pname']; ?>
                                    </span>

                                </td>

                                <td class="text-center">
                                    <span>Product Price :
                                        <?php echo  $data['pprice']; ?>
                                    </span>
                                </td>
                                <td class="text-center">
                                    <span>Product Quantity :
                                        <?php echo  $data['quantity']; ?>
                                    </span>
                                </td>
                            </tr>
                        <?php } ?>


                    </tbody>
                </table>
            </div>
        </div>
        </div>
        <form action="" method="POST" id="formm">
            <label for="">Full Name</label>
            <input type="text" name="name" value="<?php echo $fetchuser['username']; ?>">

            <label for="">Email</label>
            <input type="email" name="email" value="<?php echo $fetchuser['useremail']; ?>">

            <label for="">phone</label>
            <input type="text" name="phone" value="<?php echo $fetchuser['userphone']; ?>">


            <input type="submit" value="update" name="update" id="save">

        </form>


    </section>


    <!-- <div id="last">
       
    </div> -->
    <div id="nav2">
        <ul>
            <li><a href="/tedx/skincare/index.php">Nefertari</a></li>
            <li><a href="/tedx/skincare/home.php">home</a></li>
            <li><a href="/tedx/skincare/product/html/product.php">product</a></li>
            <li><a href="/tedx/skincare/booking/book.php">booking</a></li>
            <li><a href="https://m.facebook.com/TEDxHelwanUniversity/" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
            <li><a href="https://twitter.com/tedxhelwanu?lang=ar-x-fm" target="_blank"><i class="fab fa-twitter"></i></a></li>
            <li><a href="https://discord.com/invite/3GUMZDBP" target="_blank"><i class="fab fa-discord"></i></a></li>
        </ul>


    </div>
    <footer>
        <p>© 2023 By . Proudly Created With .Com</p>
    </footer>
    </body>

    </html>