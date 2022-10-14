<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home Admin</title>
  <style>
    body {
      background-image: url(/tedx/skincare/homepage/img/pexels-roxanne-shewchuk-2184177.jpg);
      background-position: center;
      background-repeat: no-repeat;
      background-size: cover;
      background-attachment: fixed;
      font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
    }

    h1 {
      text-align: center;
      margin-top: 200px;
      font-size: 50px;
      color: #F8B400;
    }

    .dropbtn {
      background-color: #bd9b3e;
      color: rgb(232, 229, 229);
      padding: 16px;
      font-size: 20px;
      border: none;
      cursor: pointer;
      margin-left: 610px;
      width: 40%;
      font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;

    }

    .dropdown {
      position: relative;
      display: inline-block;

    }

    .dropdown-content {
      display: none;
      position: absolute;
      background-color: #f9f9f9;
      min-width: 160px;
      box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
      z-index: 1;
      margin-left: 610px;
      width: 40%;
    }

    .dropdown-content a {
      color: black;
      padding: 12px 16px;
      text-decoration: none;
      display: block;
      font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;

    }

    .dropdown-content a:hover {
      background-color: #e1dfdf;
    }

    .dropdown:hover .dropdown-content {
      display: block;

    }
  </style>
</head>

<body>
  <div class="img">
    <h1>ADMIN PANEL</h1>
  </div>

  <div class="dropdown">
    <button class="dropbtn">Pages</button>
    <div class="dropdown-content">
      <a href="../user/listuser.php">Users</a>
      <a href="../productadmin/listproduct.php">List Products</a>
      <a href="../productadmin/addproduct.php">Add Products</a>
      <a href="../booking/listbook.php">Bookings</a>
      <li><span><a href="/tedx/skincare/shared/logout.php"><i class="fas fa-user-circle"></i> log out</a></span></li>

    </div>
  </div>

</body>

</html>