<?php
// session_start();

// if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
//     header('Location: login.php');
//     exit;
// }

include('conn.php');

if (isset($_GET['div_id'])) {
    $div_id = $_GET['div_id'];

    // Extract the category ID from the div ID
    $image_id = substr($div_id, 5); // Assuming the div IDs are like "image1", "image2", etc.

    $sql = "SELECT cat_name FROM categories WHERE cat_id = '$image_id'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $category_name = $row['cat_name'];

    $sql_products = "SELECT * FROM product WHERE prd_cat_id = '$image_id'";
    $result_products = $conn->query($sql_products);
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>
    <link rel="stylesheet" href="products.css">
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
            <a href="#"><i class='bx bx-cart'></i></a>
            <div class="bx bx-menu" id="menu-icon"></div>
        </div>
    </header>

    <section class="grid-container">
    <h2><?php echo $category_name ?? 'Products'; ?></h2>
    <div class="product-grid">
        <?php
        if (isset($result_products) && $result_products->num_rows > 0) {
            while ($row_product = $result_products->fetch_assoc()) {
        ?>
                <div class="product-item">
                    <a href="product_details.php?product_id=<?php echo $row_product['prd_id']; ?>">
                        <img src="uploads/<?php echo $category_name; ?>/<?php echo $row_product['prd_image']; ?>" alt="<?php echo $row_product['prd_name']; ?>" width="200" height="200">
                    </a>
                    <h3><?php echo $row_product['prd_name']; ?></h3>
                    
                    <p>Price: NRs <?php echo $row_product['prd_price']; ?></p>
                </div>
        <?php
            }
        } else {
            echo "No products found!";
        }
        ?>
    </div>
  </section>
  <div class="footer">
        <div class="Ftext">
            <h1>Contact</h1>
            <p>Cosmos College</p>
            <p>Tutepani, Lalitpur</p>
            <a href="mailto:info@cosmoscollege.edu.np">info@cosmoscollege.edu.np</a>
        </div>
        <div class="Ftext">
            <h3>Links</h3>
            <p><a href="index.php">Home</a></p>
            <p><a href="login.php">Login</a></p>
            <p><a href="signup.php">Register</a></p>
            <p><a href="About.php">About</a></p>
        </div>
    </div>

 
 </body>
     </html>