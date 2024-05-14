<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="login.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bodoni+Moda:ital,opsz,wght@0,6..96,400..900;1,6..96,400..900&family=Jost:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <script src="home.js" defer></script>
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
    <br><br> <br><br> <br><br>
<form action="login_process.php" method="post">
    <div class="login-cont">
        <div class="login-lable">
            <h1>LOGIN</h1>
            <div class="input-field">
                <input class="Email" type="email" placeholder="Email" name="email">
            </div>
            <div class="input-field">
                <input class="password" type="password" placeholder="Password" name="password">
            </div>
            <div>
                <input type="submit" value="Login" name="login">
            </div>
            <div class="bottom-link">
                Don't have an account?
                <a href="signup.php" id="signup-link">Signup</a>
            </div>
        </div>
    </div>
</form>
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