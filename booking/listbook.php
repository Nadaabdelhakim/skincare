<?php
include('../shared/config.php');

$select = "SELECT * FROM `book` ";
$runselect = mysqli_query($conn, $select);
// testmessges($runselect, "select");

if (isset($_GET['delete'])) {
  $bid = $_GET['delete'];
  $delete = "DELETE FROM `book` WHERE `bookid`= '$bid'";
  $rundelete = mysqli_query($conn, $delete);
  header("location:listbook.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Listbooking</title>
  <link rel="stylesheet" href="../user/listuser.css">
</head>

<body>

  <div class="container">
    <table>
      <tr>
        <th>ID</th>
        <th>User ID</th>
        <th>Product ID</th>
        <th>Quantity</th>
        <th>Date</th>
        <th>Way Of Payment</th>
        <th>Delete</th>
      </tr>


      <?php foreach ($runselect as $data) { ?>

        <tr>
          <td> <?php echo $data['bookid']; ?> </td>
          <td> <?php echo $data['u_id']; ?> </td>
          <td> <?php echo $data['p_id']; ?> </td>
          <td> <?php echo $data['quantity']; ?> </td>
          <td> <?php echo $data['bookdate']; ?> </td>
          <td> <?php echo $data['wayofpayment']; ?> </td>
          <td>
            <a href="listbook.php?delete=<?php echo $data['bookid']; ?>" onclick="return confirm(' Sure To Delete ?! ')">Delete</a>
          </td>
        </tr>

      <?php } ?>

</body>

</html>