<?php
session_start();
include('conn.php');

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: login.php');
    exit;
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $product_id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $quantity = $_POST['quantity'];

    // Check if the quantity is less than stock
    // $sql_id='SELECT * FROM carts;'
    // $cid = $conn->query($sql_id)->num_rows + 1;
    $sql_stock = "SELECT prd_quantity FROM product WHERE prd_id = '$product_id'";
    $result_stock = $conn->query($sql_stock);
    $row_stock = $result_stock->fetch_assoc();
    $id = $_SESSION['user_id'];
    if ($quantity <= $row_stock['prd_quantity']) {
        // Add to cart
        $sql_add_cart = "INSERT INTO carts (carts_user_id,carts_prd_id,quantity) VALUES ('$id', '$product_id', '$quantity')";

        if ($conn->query($sql_add_cart) === TRUE) {
            header("Location:cart.php");
        } else {
            header("login.php");
        }
    } else {
        echo "Quantity exceeds stock!";
    }
}

$conn->close();
