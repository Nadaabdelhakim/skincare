<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        *{
    margin: 0;
    padding: 0;
    text-transform: capitalize;
    font-family: 'Alata', sans-serif;
}
#first{
    width: 100%;
    height: 143.7vh;
    background: Rgb(222,178,142);
    position: relative;
    
}
#first #nav{
    width: 100%;
    height: 15vh;
    position: sticky;
    top: 0%;
    background-color:  rgb(129,52,22);
}
#first #nav ul{
    list-style-type: none;
    display: flex;
    flex-direction: row;
    

}
#first #nav ul li {
    margin-left: 7%;
    margin-top: 5%;
    
}
#first #nav ul li span{
    position: absolute;
    left: 85%;
}
#first #nav ul li a{
    text-decoration: none;
    color: white;
    text-transform: uppercase;
    font-size: 20px;
}
#first #nav ul li a:hover{
    color: bisque;
}
    </style>
</head>

<body>
<section id="first">
    <div id="nav">
        <ul>
            <li><a href="index.php">Nefertari</a></li>
            <li><a href="index.php">home</a></li>
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
</body>

</html>