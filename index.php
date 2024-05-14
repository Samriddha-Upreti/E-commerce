<?php
session_start();
// Initialize variables
$buttonText = "Login"; // Default value
$buttonAction = "login.php"; // Default action

// Check if the user is logged in
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    $buttonText = "Logout";
    $buttonAction = "logout.php"; // Replace with the actual logout URL
}

// Check if $_SESSION["loggedin"] is set to avoid undefined variable warning
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All in one</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bodoni+Moda:ital,opsz,wght@0,6..96,400..900;1,6..96,400..900&family=Jost:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <script src="home.js" defer></script>
   <?php if (isset($_SESSION['order']) && $_SESSION['order'] == true) {
    echo '<script>alert("Order Placed Sucessfully");</script>';
    unset($_SESSION['order']);
}?>

   
</head>

<body>
    <header class="header">
        <a href="index.php" class="logo"><img src="image/logo/logo.png" alt=""></a>

        <ul class="navmenu">
            <li><a href="index.php">Home</a></li>

            <div class="dropdown">
                <li><a href="#">Shop</a></li>
                <div class="dropdown-content">
                    <a href="products.php?div_id=image2">Electronics Devices</a>
                    <a href="products.php?div_id=image1">Clothes and Shoes</a>
                    <a href="products.php?div_id=image3">Home and Decor</a>

                </div>
            </div>
            <li><a href="About.php">About</a></li>

        </ul>
        
        <div class="nav-icon">
            <a href="#"><i class='bx bx-search'></i></a>
            <a href="#"><i class='bx bx-user'></i></a>
            <a href="cart.php"><i class='bx bx-cart'></i></a>
            <div class="bx bx-menu" id="menu-icon">


            </div>
        </div>
    </header>

    <section class="side-home">
        <div class="main-text"><br><br><br><br>
            <ul class="ul1">
                <li> <a href="#"><i class='bx bxs-zap'></i> Popular product</a></li><br>
                <li><a href="#"><i class='bx bx-show-alt'></i> Explore New</a></li><br>
                <li><a href="products.php?div_id=image1"><i class='bx bxs-t-shirt'></i> Clothing and Shoes</a></li><br>
                <li><a href="products.php?div_id=image2"><i class='bx bx-mobile-alt'></i> Electronics Device</a></li><br>
                <li><a href="products.php?div_id=image3"><i class='bx bxs-home'></i> Home and Decor</a></li><br>
            </ul>
        </div>
        <div class="line">
        </div>
        <li class="quick"> Quick Action</li>
        <div class="quick-action d-flex">
            <ul><br>
                <li><a href="cart.php"><i class='bx bx-cart-download'></i> Cart</a></li><br><br>
            </ul>
        </div><br><br>
        <?php if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) { ?>
            <form action="<?php echo $buttonAction; ?>" method="post">
                <input type="submit" value="<?php echo $buttonText; ?>" class="my-button">
            </form>
        <?php } else { ?>
            <form action="<?php echo $buttonAction; ?>" method="post">
                <input type="submit" value="<?php echo $buttonText; ?>" class="my-button">
            </form>
        <?php } ?>
    </section>
    <section class="grid-container">
        <div class="category-box" id="image1">
            <a href="products.php?div_id=image2"><img src="image/category/e1.jpg" alt="" width="530" height="150"></a>
        </div>
        <div class="category-box" id="image2">
            <a href="products.php?div_id=image3"><img src="image/category/home.jpg" alt="" width="530" height="150"></a>
        </div>
        <div class="category-box" id="image3">
            <a href="products.php?div_id=image1"><img src="image/category/blazer.jpg" alt="" width="300" height="350"></a>
        </div>
        <div class="category-box" id="image4">
            <a href="products.php?div_id=image2"><img src="image/category/apple.jpg" alt="" width="300" height="350"></a>
        </div>
        <div class="category-box" id="image5">
            <a href="products.php?div_id=image1"><img src="image/category/highneck.jpg" alt="" width="262" height="235"></a>
        </div>
        <div class="category-box" id="image6">
            <a href="products.php?div_id=image2"><img src="image/category/samsung.jpg" alt="" width="262" height="235"></a>
        </div>
        <div class="category-box" id="image7">
            <a href="products.php?div_id=image3"><img src="image/category/sooofa.jpeg" alt="" width="610" height="200"></a>
        </div>
    </section>
    <div class="footer">
        <div class="Ftext">
            <h1>Conatct</h1>
            <p>Cosmos College</p>
            <p>Tutepani, Lalitpur</p>
          <a href=" mailto:info@cosmoscollege.edu.np">info@cosmoscollege.edu.np</a>

        </div>
        <div class="Ftext">
            <h3>Links</h3>
           <p> <a href="index.php">Home</a></p>
           <p> <a href="login.php">Login</a></p>
            <p><a href="signup.php">Register</a></p>
            <p><a href="About.php">About</a></p>
        
        </div>
        
    </div>
</body>

</html>