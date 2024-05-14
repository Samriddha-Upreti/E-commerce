<?php

session_start();
include('conn.php');
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
  header('Location: login.php');
  exit;
}

// Assuming you have established a connection to your database

// User ID for which you want to retrieve the cart items
$user_id = $_SESSION['user_id']; // Replace 123 with the actual user ID
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cart</title>
  <link rel="stylesheet" href="cart.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Bodoni+Moda:ital,opsz,wght@0,6..96,400..900;1,6..96,400..900&family=Jost:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
  <script src="home.js" defer></script>
 
</head>
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

  <?php
  // Retrieve cart items for the user from the database
  $query = "SELECT p.prd_name, p.prd_image, c.quantity, p.prd_price, cat.cat_name
          FROM carts c
          INNER JOIN product p ON c.carts_prd_id = p.prd_id
          INNER JOIN categories cat ON p.prd_cat_id = cat.cat_id
          WHERE c.carts_user_id = $user_id";
  $result = mysqli_query($conn, $query);

  // Calculate total cost and delivery charge
  $total_cost = 0;
  $delivery_charge_percentage = 0.01;
  ?>
  <div id="cart-container">
    <?php
    // Display table header
    echo "<table border='1'>
      <tr>
        <th>Product Name</th>
        <th>Product Image</th>
        <th>Quantity</th>
        <th>Price</th>
        <th>Total</th>
      </tr>";

    // Display cart items
    while ($row = mysqli_fetch_assoc($result)) {
      $product_name = $row['prd_name'];
      $category_name = $row['cat_name'];
      $product_image = $row['prd_image'];
      $quantity = $row['quantity'];
      $price = $row['prd_price'];
      $total = $quantity * $price;
      $total_cost += $total;

      echo "<tr>
            <td>$product_name</td>
            <td><img src='uploads/$category_name/$product_image' alt='$product_name' style='width: 100px; height: 100px;'></td>
            <td>$quantity</td>
            <td>$price</td>
            <td>$total</td>
          </tr>";
    }

    // Calculate delivery charge and total cost with delivery
    $delivery_charge = $total_cost * $delivery_charge_percentage;
    $total_cost_with_delivery = $total_cost + $delivery_charge;

    // Display total row
    echo "<tr>
        <td colspan='4'>Delivery Charge (1%): </td>
        <td>$delivery_charge</td>
      </tr>
      <tr>
        <td colspan='4'>Total Cost with Delivery: </td>
        <td>$total_cost_with_delivery</td>
      </tr>";

    echo "</table>";
    ?><form action="place_order.php" method="post">
    <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
    <input type="hidden" name="total_cost_with_delivery" value="<?php echo $total_cost_with_delivery; ?>">
    <input type="hidden" name="delivery_charge" value="<?php echo $delivery_charge; ?>">
    <input type="submit" value="Place an order" class="order" id="order">
</form>
   <?php // Free result set
    mysqli_free_result($result);

    // Close connection
    mysqli_close($conn); ?>
  </div>

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