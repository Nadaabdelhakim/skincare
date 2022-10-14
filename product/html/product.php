<?php
ob_start();
include("/xampp/htdocs/tedx/skincare/shared/config.php");
include("/xampp/htdocs/tedx/skincare/shared/authuser.php");
// include("/xampp/htdocs/tedx/skincare/shared/logout.php");


    function getIPAddress() {  
    //whether ip is from the share internet  
     if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                $ip = $_SERVER['HTTP_CLIENT_IP'];  
        }  
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
     }  
//whether ip is from the remote address  
    else{  
             $ip = $_SERVER['REMOTE_ADDR'];  
     }  
     return $ip;  
}  
// $ip = getIPAddress();  
// echo 'User Real IP Address - '.$ip;  
if(isset($_GET['cart'])){
    $ip = getIPAddress(); 
    $productid=$_GET['cart'];
    $select="SELECT * FROM `cart_details` WHERE `productid`='$productid' AND `ip_address`='$ip'";
    $run_select=mysqli_query($conn , $select);
    $numrows= mysqli_num_rows($run_select);
    if($numrows > 0){
        echo "<h1>This item is already in your cart</h1>";
        // header("location:/tedx/skincare/product/html/product.php");
    }else{
        $insert="INSERT INTO `cart_details` VALUES ($productid, '$ip', 0)";
        $run_insert=mysqli_query($conn, $insert);
    }
}


$select = "SELECT * FROM `product` ORDER BY RAND() LIMIT 0,9";
$runselect = mysqli_query($conn, $select);


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
                    <a name="seemore" href="/tedx/skincare/product/html/details.php?seemore=<?php echo $data['productid']; ?>"><button>see more</button></a>

                    <a name="cart" href="/tedx/skincare/product/html/product.php?cart=<?php echo $data['productid']; ?>"><button>Add to cart </button></a>
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