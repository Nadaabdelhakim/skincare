<?php
include("../shared/config.php");


$select= "SELECT * FROM `product`";
$runselect=mysqli_query($conn, $select);


if(isset($_GET['delete'])){
    $productid = $_GET['delete'];
    $delete="DELETE FROM `product` WHERE `productid`= '$productid'";
    $rundelete = mysqli_query($conn, $delete);
    header("location:/tedx/skincare/productadmin/listproduct.php");
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../feedback/feed.css">
    <title>Document</title>
</head>
<body>

<div class="container"> 
 <table >
 
<tr>
       <th >ID</th>
       <th>Product Name</th>
       <th>Product Image</th>


       <th>Product Price</th>
       <th>Product Quantity</th>
       <th colspan="2" >Action</th>
     </tr>
 
    <?php foreach ( $runselect as $data ) { ?>

     <tr>
       <td> <?php echo $data ['productid']; ?> </td>
       <td> <?php echo $data ['pname']; ?> </td>
       <td> <img width="150" height="100" src="upload/<?php echo $data['pimage']; ?>"> </td>
       

       <td> <?php echo $data ['pprice']; ?> </td>
       <td> <?php echo $data ['pquantity']; ?> </td>

       <td>
       <a style="color: #ffb703; margin-right:10px;" href="./addproduct.php?edit=<?php echo $data['productid'];?>">Edit</a>

         <a href="listproduct.php?delete=<?php echo $data['productid']; ?>" onclick="return confirm(' Sure To Delete ?! ')">Delete</a>
       </td>
     </tr>
    <?php } ?>
</body>
</html>