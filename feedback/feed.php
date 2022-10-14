<?php
include("../shared/config.php");


$select= "SELECT * FROM `feedback`";
$runselect=mysqli_query($conn, $select);


if(isset($_GET['delete'])){
    $feedid = $_GET['delete'];
    $delete="DELETE FROM `feedback` WHERE `feedid`= '$feedid'";
    $rundelete = mysqli_query($conn, $delete);
    header("location:/tedx/skincare/feedback/feed.php");
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./feed.css">
    <title>Document</title>
</head>
<body>
    
<div class="container"> 
 <table >
 
<tr>
       <th >ID</th>
       <th> Feedback Content</th>
       <th>User_ID</th>
       <th>Product_ID</th>

       <th >Delete</th>
     </tr>
 

    <?php foreach ( $runselect as $data ) { ?>

     <tr>
       <td> <?php echo $data ['feedid']; ?> </td>
       <td> <?php echo $data ['feedcontent']; ?> </td>
       <td> <?php echo $data ['u_id']; ?> </td>
       <td> <?php echo $data ['p_id']; ?> </td>

       <td>
         <a href="feed.php?delete=<?php echo $data['feedid']; ?>"  onclick="return confirm(' Sure To Delete ?! ')">Delete</a>
       </td>
     </tr>

    <?php } ?>
</body>
</html>