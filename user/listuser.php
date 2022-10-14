<?php
include("../shared/config.php");


$select= "SELECT * FROM `user`";
$runselect=mysqli_query($conn, $select);


if(isset($_GET['delete'])){
    $userid = $_GET['delete'];
    $delete="DELETE FROM `user` WHERE `userid`= '$userid'";
    $rundelete = mysqli_query($conn, $delete);
    header("location:/tedx/skincare/user/listuser.php");
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./listuser.css">
    <title>Document</title>
</head>
<body>
    
<div class="container"> 
 <table >
 
<tr>
       <th >ID</th>
       <th>Name</th>
       <th >Email</th>
       <th >Pass</th>
       <th >Phone</th>
       <th >gender</th>
       <th >Delete</th>
     </tr>
 
    
  
     
    <?php foreach ( $runselect as $data ) { ?>

     <tr>
       <td> <?php echo $data ['userid']; ?> </td>
       <td> <?php echo $data ['username']; ?> </td>
       <td> <?php echo $data ['useremail']; ?> </td>
       <td> <?php echo $data ['userpassword']; ?> </td>
       <td> <?php echo $data ['userphone']; ?> </td>
       <td> <?php echo $data ['gender']; ?> </td>
       <td>
         <a href="listuser.php?delete=<?php echo $data['userid']; ?>"  onclick="return confirm(' Sure To Delete ?! ')">Delete</a>
       </td>
     </tr>

    <?php } ?>
</body>
</html>