<?php
include("../shared/config.php");
$update = false;

//creat product///
if (isset($_POST['send'])) {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $quant = $_POST['quant'];

    $imagename = $_FILES['image']['name'];
    $imagetype = $_FILES['image']['type'];
    $imagetmp = $_FILES['image']['tmp_name'];

    $extension= pathinfo($imagename,PATHINFO_EXTENSION);
    $extension_lc= strtolower($extension);
    $newname=uniqid('img' , false).'.'.$extension_lc;
   
    $imagelocation = "/xampp/htdocs/tedx/skincare/productadmin/upload/";
    move_uploaded_file($imagetmp, $imagelocation . $newname);

    $insert = "INSERT INTO `product` VALUES(NULL, '$name', '$newname', '$price', '$quant')";
    $runinsert = mysqli_query($conn, $insert);
}

    //update product///
    if (isset($_GET['edit'])) {
        $update = true;
        $productid = $_GET['edit'];
        $select = "SELECT * FROM `product` WHERE `productid`='$productid'";
        $runselect = mysqli_query($conn, $select);
        $fetch = mysqli_fetch_array($runselect);
        $pname=$fetch['pname'];
        $price=$fetch['pprice'];
        
        $quantity=$fetch['pquantity'];

       
    }

if(isset($_POST['update'])){
    $productid = $_GET['edit'];
    $name = $_POST['name'];
    $price = $_POST['price'];
  
    $quant = $_POST['quant'];

$update = "UPDATE `product` SET `pname`='$name', `pprice`='$price', `pquantity`='$quant' WHERE `productid`='$productid' ";
$runupdate=mysqli_query($conn, $update);
header("location:/tedx/skincare/productadmin/listproduct.php");

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/tedx/skincare/productadmin/addproduct.css">
    
    <title>Add Product</title>
</head>

<body>
    <div class="container">
        <br>
            <form method="POST" enctype="multipart/form-data">
            <h1>Product Form</h1>

                <div class="one">

                    <label class="item1" for="name">Product Name</label>
                    <br>
                    <input class="item2" type="text" name="name" value="<?php if($update){ echo $pname;} ?>">

                </div>
                <div class="one">
                    <label class="item1" for="name">Product price</label>
                    <br>
                    <input class="item2" type="number" name="price" value="<?php if($update){ echo $price;} ?>">
                       
                </div>
                <div class="one">
                    <label class="item1" for="name">Product Quantity</label>
                    <br>
                    <input class="item2" type="number" name="quant" value="<?php if($update){ echo $quantity;} ?>">
                </div>
                <?php if($update == false){ ?>
                <div class="one">
                    <label class="item1" for="name">Product Image</label>
                    <br>
                    <input style="background-color: none;" class="item2" type="file" name="image" value="">
                </div>
                <?php }; ?>
                <div class="btn">
                    <?php if ($update) { ?>
                        <input type="submit" value="update Product" name="update">
                    <?php } else { ?>
                        <input type="submit" value="Create Product" name="send">
                    <?php }; ?>
                </div>
            </form>
    </div>
</body>

</html>