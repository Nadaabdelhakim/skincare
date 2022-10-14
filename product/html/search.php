<?php
ob_start();
include("/xampp/htdocs/tedx/skincare/shared/config.php");
include("/xampp/htdocs/tedx/skincare/shared/authuser.php");
// include("/xampp/htdocs/tedx/skincare/shared/logout.php");

if(isset($_POST['btn'])){
    $searched=$_POST['search'];
    // header("location: /tedx/skincare/product/html/search.php");

$select = "SELECT * FROM `product` WHERE `pname` LIKE '%$searched%'";
$runselect = mysqli_query($conn, $select);
$num_rows=mysqli_num_rows($runselect);
if($num_rows==0){
    echo "<h1 class='text-center text=danger'>No results matched</h1>";
}
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/all.min.css">
    <link rel="stylesheet" href="../css/product.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    <title>product</title>
</head>

<body>
    <section id="firstt">
        <div id="navv">
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
        </div>
    </section>

    <section id="productt">
        <h1 id="hhhht">products</h1>
        <section id="maint" data-aos="fade-down">
            <?php foreach ($runselect as $data) { ?>
                <div>
                    <img src="<?php echo '/tedx/skincare/productadmin/upload/' . $data['pimage']; ?>" alt="">
                    <h1><?php echo $data['pname']; ?></h1>
                    <h2><?php echo $data['pprice']; ?> LE</h2>
                    <a name="buynow" href="/tedx/skincare/booking/book.php?buynow=<?php echo $data['productid']; ?>"><button>book now</button></a>
                </div>
            <?php } ?>

        </section>

        <div id="lastttt">
        </div>

        <div id="nav2">
            <ul>
                <li><a href="">logo</a></li>
                <li><a href="home.html">home</a></li>
                <li><a href="#productt">product</a></li>
                <li><a href="">booking</a></li>
                <li><a href="https://m.facebook.com/TEDxHelwanUniversity/" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                <li><a href="https://twitter.com/tedxhelwanu?lang=ar-x-fm" target="_blank"><i class="fab fa-twitter"></i></a></li>
                <li><a href="https://discord.com/invite/3GUMZDBP" target="_blank"><i class="fab fa-discord"></i></a></li>
            </ul>


        </div>
        <footer>
            <p>© 2023 By . Proudly Created With .Com</p>
        </footer>


        <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
        <script>
            AOS.init();
        </script>
</body>

</html>

<?php 
ob_end_flush();
?>