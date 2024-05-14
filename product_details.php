<?php


include('conn.php');

if (isset($_GET['product_id'])) {
    $product_id = $_GET['product_id'];

    $sql = "SELECT * FROM product WHERE prd_id = '$product_id'";
    $result = $conn->query($sql);
    $row_product = $result->fetch_assoc();

    $cat_name = '';
    if (isset($row_product['prd_cat_id'])) {
        $id = $row_product['prd_cat_id'];
        $cat_result = $conn->query("SELECT cat_name FROM categories WHERE cat_id='$id'");
        $row_cat = $cat_result->fetch_assoc();
        $cat_name = $row_cat['cat_name'];
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details</title>
    <link rel="stylesheet" href="product_details.css">
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
            <div class="bx bx-menu" id="menu-icon"></div>
        </div>
    </header>

    <section class="product-details-container">
        <div class="product-image">
            <img src="uploads/<?php echo $cat_name; ?>/<?php echo $row_product['prd_image']; ?>" alt="<?php echo $row_product['prd_name']; ?>">
        </div>
        <div class="product-info">
            <h2><?php echo $row_product['prd_name']; ?></h2>
            <p><p>Product description:</p><?php echo $row_product['prd_description']; ?></p>
            <?php if ($row_product['prd_quantity'] == 0) { ?>
                <p class="out-of-stock">Out of Stock</p>
            <?php } else {?>
            <p>In Stock: <?php echo $row_product['prd_quantity']; ?></p><?php } ?>
            <p>Price: Nrs <?php echo $row_product['prd_price']; ?></p>

            <form action="add_to_cart.php" method="post">
                <input type="hidden" name="product_id" value="<?php echo $row_product['prd_id']; ?>">
                <input type="hidden" name="product_name" value="<?php echo $row_product['prd_name']; ?>">
                <input type="hidden" name="product_price" value="<?php echo $row_product['prd_price']; ?>">

                <label for="quantity">Quantity:</label>
                <input type="number" id="quantity" name="quantity" min="1" max="<?php echo $row_product['prd_quantity']; ?>" required>

                <input type="submit" value="Add to Cart">
                <input type="submit" value="Buy Now">
            </form>
        </div>
    </section>

    <footer class="footer">
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
    </footer>
</body>

</html>