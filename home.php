<?php
include("./shared/config.php");
include("/xampp/htdocs/tedx/skincare/shared/authuser.php");


if(isset($_POST['feedback'])){

    $select = "SELECT * FROM `user` WHERE `userid`=2 ";
    $s = mysqli_query( $conn , $select );
    $row = mysqli_fetch_assoc($s);
    $u_id = $row['userid'];

    $selected = "SELECT * FROM `product` WHERE `productid` = 7";
    $ss = mysqli_query($conn , $selected );
    $data= mysqli_fetch_assoc($ss);
    $p_id = $data['productid'];
    
    $feed = $_POST['feed'];
    $insert = "INSERT INTO `feedback` VALUES (NULL , '$feed', $u_id, $p_id )";
    $i = mysqli_query($conn , $insert);
 
    
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/tedx/skincare/homepage/css/all.min.css">
    <link rel="stylesheet" href="/tedx/skincare/homepage/css/home.css">
    <link rel="preconnect" href="https://fonts.googleapis.com/%22%3E">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Alata&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <title>home</title>
</head>

<body>
    <section id="first">
    
    <div id="nav">
        <ul>
            <li><a href="index.php">Nefertari</a></li>
            <li><a href="index.php">home</a></li>
            <li><a href="/tedx/skincare/product/html/product.php">product</a></li>
            <li><a href="/tedx/skincare/profile/profile.php">Account</a></li>
            <form class="d-flex" action="/tedx/skincare/product/html/search.php" method="POST">
        <input class="form-control me-2" type="search" placeholder="Search" name="search" aria-label="Search">
        <button class="btn btn-outline-success" name="btn" type="submit">Search</button>
      </form>
            <?php if (isset($_SESSION['useremail']) || isset($_SESSION['adminemail'])) : ?>
                <li><span><a href="/tedx/skincare/shared/logout.php"><i class="fas fa-user-circle"></i> log out</a></span></li>
            <?php else : ?>
                <li><span><a href="/tedx/skincare/sign/login.php"><i class="fas fa-user-circle"></i> log in</a></span></li>
            <?php endif; ?>
        </ul>
    </div>

        <div id="back">
            <div id="imgg"></div>
            <div id="parg">
                <p class="p1">Discover all our products</p>
                <p class="p2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis odio modi dignissimos illum . </p>
              <a href="/tedx/skincare/product/html/product.php"><button>booking now</button></a>  
            </div>
            <ul>
                <li><a href="https://m.facebook.com/TEDxHelwanUniversity/" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                <li><a href="https://twitter.com/tedxhelwanu?lang=ar-x-fm" target="_blank"><i class="fab fa-twitter"></i></a></li>
                <li><a href="https://discord.com/invite/3GUMZDBP" target="_blank"><i class="fab fa-discord"></i></a></li>
            </ul>
        </div>
    </section>
    <section id="about">
        <video autoplay muted width="985">
            <source src="/tedx/skincare/homepage/Let's Go - Egypt.mp4" type="video/mp4">
        </video>
        <div id="tttt">
            <p class="p11">Proudly HandMade in Egypt</p>
            <p class="p22">All over the world, people are being re-educated with regards to the benefits of using all things natural particularly products with direct contact to the human body with special emphasis on toiletries, beauty creams, and all other products related to personal grooming and the general well being of our skin, our hair and our entire body.
        </div>

    </section>


    <section id="product">
        <h1 id="hhhh">products</h1>
        <section id="main" data-aos="fade-down">
            <div>
                <a href=""><img src="/tedx/skincare/homepage/img/05-hotel-amenities.jpeg" alt=""></a>
                <h1>Spa & hotel amenities</h1>
                <h2>61.00 LE</h2>
                <a href="/tedx/skincare/booking/book.php"><button>book now</button></a>
            </div>

            <div>
                <a href=""><img src="/tedx/skincare/homepage/img/img2566-600x600.jpeg" alt=""></a>
                <h1>Exfoliating Scrubs</h1>
                <h2>180.00 LE</h2>
                <a href="/tedx/skincare/booking/book.php"><button>book now</button></a>
            </div>

            <div>
                <a href=""><img src="/tedx/skincare/homepage/img/jojobaoil2-600x600.jpeg" alt=""></a>
                <h1>Oils</h1>
                <h2>167.00 LE</h2>
                <a href="/tedx/skincare/booking/book.php"><button>book now</button></a>
            </div>
        </section>
        <section id="feedback">
            <div><img src="/tedx/skincare/homepage/img/pexels-juliano-astc-10556587.jpg" alt=""></div>
            <div id="feed2">
                <h1>THE PEOPLE'S WORD</h1>

                <div class="mySlides " data-aos="fade-up">
                    <p>
                        I'm a paragraph. Click here to add your own text and edit me. It’s easy. Just click “Edit Text” or double click me to add your own content and make changes to the font. I’m a great place for you to tell a story and let your users know a little more about you.1
                    </p>
                </div>
                <div class="mySlides fade" data-aos="fade-up">
                    <p>
                        I'm a paragraph. Click here to add your own text and edit me. It’s easy. Just click “Edit Text” or double click me to add your own content and make changes to the font. I’m a great place for you to tell a story and let your users know a little more about you.2
                    </p>
                </div>
                <div class="mySlides fade" data-aos="fade-up">
                    <p>
                        I'm a paragraph. Click here to add your own text and edit me. It’s easy. Just click “Edit Text” or double click me to add your own content and make changes to the font. I’m a great place for you to tell a story and let your users know a little more about you.3
                    </p>
                </div>

              

                <div style="text-align:center">
                    <span class="dot"></span>
                    <span class="dot"></span>
                    <span class="dot"></span>
                </div>
                <form action="" method="POST">
                
            <textarea name="feed" id="" cols="70" rows="10" placeholder="Please write your feedback"></textarea>

            <button id="feed" name="feedback">submit</button>
                  </form>
            </div>
        </section>
    </section>


    <!-- <section id="best">
        <div id="d11">
            <h1 id="ffff">Featured Products</h1>
            <div id="d12">
                <div>
                    <a href=""><img src="../img/05-hotel-amenities.jpeg" alt=""></a> 
                     <h1>Spa & hotel amenities</h1>
                     <h2>61.00 LE</h2>
                     <a href="product.html"><button>book now</button></a> 
                 </div>
         
                 <div>
                     <a href=""><img src="../img/img2566-600x600.jpeg" alt=""></a>
                     <h1>Exfoliating Scrubs</h1>
                     <h2>180.00 LE</h2>
                     <a href="product.html"><button>book now</button></a> 
                 </div>         
            </div>
            <button></button>
        </div>
    </section> -->

    <div id="last">

    </div>
    <div id="nav2">
        <ul>

       
            <li><a href="index.php">Nefertari</a></li>
            <li><a href="home.php">home</a></li>
            <li><a href="/tedx/skincare/product/html/product.php">product</a></li>
            <li><a href="/tedx/skincare/profile/profile.php">Account</a></li>
            <?php if (isset($_SESSION['useremail']) || isset($_SESSION['adminemail'])) : ?>
                <li><span><a href="/tedx/skincare/shared/logout.php"><i class="fas fa-user-circle"></i> log out</a></span></li>
            <?php else : ?>
                <li><span><a href="/tedx/skincare/sign/login.php"><i class="fas fa-user-circle"></i> log in</a></span></li>
            <?php endif; ?>
        
            <li><a href="https://m.facebook.com/TEDxHelwanUniversity/" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
            <li><a href="https://twitter.com/tedxhelwanu?lang=ar-x-fm" target="_blank"><i class="fab fa-twitter"></i></a></li>
            <li><a href="https://discord.com/invite/3GUMZDBP" target="_blank"><i class="fab fa-discord"></i></a></li>
        </ul>


    </div>
    <footer>
        <p>© 2023 By . Proudly Created With .Com</p>
    </footer>
    <script src="/tedx/skincare/homepage/js/home.js"></script>

    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>

</html>