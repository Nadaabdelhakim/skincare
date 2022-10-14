

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./book.css">
    <title>Document</title>
</head>
<?php
include("../shared/config.php");
include("../shared/authuser.php");


if(isset($_GET['buynow'])){
    $productid=$_GET['buynow'];

    $select="SELECT `pquantity` FROM `product` WHERE `productid` = '$productid'";
    $runselect= mysqli_query($conn, $select);
    $fetch = mysqli_fetch_assoc($runselect);

}

if(isset($_POST['send'])){
    
    $time=date("Y-m-d H:i:s");
    $quantity=$_POST['quant'];
    $way=$_POST['wayofpayment'];

    $insert="INSERT INTO `book` VALUES( NULL, $userid, $productid, $quantity, '$time', '$way') ";
    $runinsert= mysqli_query($conn, $insert);
    if($runinsert){
    $update="UPDATE `product` SET `quantity`= `quantity` - $quantity WHERE `productid`=$productid ";
    $runupdate=mysqli_query($conn, $update);
    header("location:/tedx/skincare/profile/profile.php");
    }

}
?>
<body>
<section id="first">
    <div id="nav">
        <ul>
            <li><a href="/tedx/skincare/index.php">Nefertari</a></li>
            <li><a href="/tedx/skincare/index.php">home</a></li>
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
<div class="container">
        <br>
            <form method="POST" enctype="multipart/form-data">
            <h1>Booking Form</h1>

                <div class="one">

                    <label class="item1" for="name"> Product Quantity</label>
                    <br>
                    <input class="item2" type="number" name="quant" max="<?php echo $fetch['quantity']; ?>" >

                </div>
                <div class="one">
                <label class="item1" for="name"> Way Of Payment</label>

                <select name="wayofpayment">
                            
                                <option value="Visa">Visa</option>
                                <option value="Cash">Cash</option>

                            </select>
                </div>
                <!-- <div class="one">
                    <label class="item1" for="name">Product Quantity</label>
                    <br>
                    <input class="item2" type="number" name="quant" >
                </div> -->
        
                <div class="btn">
                    
                        <input type="submit" value="Buy Now" name="send">
                    
                      
                </div>
            </form>
    </div>
</body>
</html>