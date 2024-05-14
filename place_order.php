<?php
session_start();
include('conn.php');

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: login.php');
    exit;
}

// Get user ID from session
$user_id = $_SESSION['user_id'];

// Insert data into orders table
$total_cost_with_delivery = $_POST['total_cost_with_delivery']; // Assuming you are passing this value from the previous page
$shipping_amt = $_POST['delivery_charge']; // Assuming you are passing this value from the previous page
$status = 'Pending'; // Assuming the default status for new orders is 'Pending'

$sql_orders = "INSERT INTO orders (ord_user_id, total_amt, shipping_amt, status) 
               VALUES ('$user_id', '$total_cost_with_delivery', '$shipping_amt', '$status')";
if (mysqli_query($conn, $sql_orders)) {
    $ord_id = mysqli_insert_id($conn); // Get the ID of the inserted order
} else {
    echo "Error: " . $sql_orders . "<br>" . mysqli_error($conn);
}

// Insert data into order_details table and update product quantity
$query = "SELECT p.prd_id, c.quantity, p.prd_price,p.prd_name
          FROM carts c
          INNER JOIN product p ON c.carts_prd_id = p.prd_id
          WHERE c.carts_user_id = $user_id";
$result = mysqli_query($conn, $query);

while ($row = mysqli_fetch_assoc($result)) {
    $prd_id = $row['prd_id'];
    $quantity = $row['quantity'];
    $prd_price = $row['prd_price'];
    $total_amt = $quantity * $prd_price;
    $prd_name = $row['prd_name'];


    // Insert order details
    $sql_order_details = "INSERT INTO order_details (ord_id, ord_prd_id,ord_prd_name, ord_quantity, ord_price, total_amt) 
                          VALUES ('$ord_id', '$prd_id','$prd_name', '$quantity', '$prd_price', '$total_amt')";
    if (!mysqli_query($conn, $sql_order_details)) {
        echo "Error: " . $sql_order_details . "<br>" . mysqli_error($conn);
    }

    // Update product quantity
    $sql_update_quantity = "UPDATE product SET prd_quantity = prd_quantity - $quantity WHERE prd_id = $prd_id";
    if (!mysqli_query($conn, $sql_update_quantity)) {
        echo "Error: " . $sql_update_quantity . "<br>" . mysqli_error($conn);
    }
}

// Clear user's cart after placing the order
$sql_clear_cart = "DELETE FROM carts WHERE carts_user_id = '$user_id'";
if (!mysqli_query($conn, $sql_clear_cart)) {
    echo "Error: " . $sql_clear_cart . "<br>" . mysqli_error($conn);
}

// Redirect to a page indicating successful order placement
$_SESSION['order']=true;
header('Location: index.php');

mysqli_close($conn);