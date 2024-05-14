<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Register</title>
    <link rel="stylesheet" href="signup.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="info@cosmoscollege.edu.np">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bodoni+Moda:ital,opsz,wght@0,6..96,400..900;1,6..96,400..900&family=Jost:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <script src="home.js" defer></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('signup-form').addEventListener('submit', function(event) {
                var password = document.getElementById('Password').value;
                var confirmPassword = document.getElementById('cpword').value;

                if (password.length < 3 || !/[A-Z]/.test(password) || !/\d/.test(password) || !/[!@#$%^&*]/.test(password)) {
                    event.preventDefault();
                    alert('Password must be at least 3 characters long and contain at least one uppercase letter, one number, and one special character');
                } else if (password !== confirmPassword) {
                    event.preventDefault();
                    alert('Passwords do not match');
                }
            });
        });
    </script>
</head>

<body>
    <header>
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
            <div class="bx bx-menu" id="menu-icon"></div>
        </div>
    </header>
    <div class="container">
        <h2>REGISTER HERE</h2>


        <form action="signup_process.php" method="post" id="signup-form">
            <div class="input-name">
                <i class='bx bxs-user lock'></i>
                <input type="text" name="MyfName" id="fname" placeholder="First Name" class="name" required>
                <span>
                    <i class='bx bxs-user lock'></i>
                    <input type="text" name="MylName" id="lname" placeholder="Last Name" class="name" required>
                </span>
            </div>
            <div class="input-name">
                <i class='bx bx-phone lock'></i>
                <input type="tel" name="Mynumber" id="number" placeholder="Phone Number" class="text-name" required>
            </div>

            <div class="input-name">
                <i class='bx bxs-home lock'></i>
                <input type="text" name="Myaddress" id="address" placeholder="Address" class="text-name" required>
            </div>



            <div class="input-name">

                <input type="text" name="Mycity" id="city" placeholder="District" class="num-name" required>
            </div>

            <div class="input-name">

                <input type="text" name="Mypcode" id="pcode" placeholder="Postal Code" class="num-name" required>
            </div>

            <div class="input-name">
                <i class='bx bxs-envelope email'></i>
                <input type="email" name="MyEmail" id="email" required placeholder="eg: myname@gmail.com" class="text-name">
            </div>

            <div class="input-name">
                <i class='bx bxs-user-circle lock'></i>
                <input type="text" name="MyuName" id="uname" placeholder="Username" class="text-name" required>
            </div>

            <div class="input-name">
                <i class='bx bxs-lock-alt lock'></i>
                <input type="password" name="Mypword" id="Password" placeholder="Password" class="text-name" required>
            </div>

            <div class="input-name">
                <i class='bx bxs-lock-alt lock'></i>
                <input type="password" name="Mycpword" id="cpword" placeholder="Confirm Password" class="text-name" required>
            </div>

            <div class="input-name">
                <input type="submit" value="Sign Up" name="signup" />
                <input type="reset" value="Reset" />
            </div>
        </form>
    </div>





    <div class="footer">
        <div class="Ftext">
            <h1>Conatct</h1>
            <p>Cosmos College</p>
            <p>Tutepani, Lalitpur</p>
            <a href="mailto:info@cosmoscollege.edu.np">info@cosmoscollege.edu.np</a>

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