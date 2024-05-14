<?php
include 'conn.php';

$target_dir = "uploads/";

// Get selected category name from the form
$category_name = $_POST['category'];

// Get category ID based on the selected category name
$sql_cat = "SELECT cat_id FROM categories WHERE cat_name = '$category_name'";
$result_cat = $conn->query($sql_cat);
$row_cat = $result_cat->fetch_assoc();
$category_id = $row_cat['cat_id'];

// Create directory based on category name if it doesn't exist
if (!file_exists($target_dir . $category_name)) {
    mkdir($target_dir . $category_name, 0777, true);
}

// Generate a unique filename
$unique_name = uniqid() . '_' . basename($_FILES["image"]["name"]);
$target_file = $target_dir . $category_name . '/' . $unique_name;
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Check if image file is an actual image or fake image
if (isset($_POST["submit"])) {
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if ($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}

// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}

// Check file size (max 5MB)
if ($_FILES["image"]["size"] > 5000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

// Allow certain file formats
if (
    $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif"
) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        $productName = $_POST['productName'];
        $description = $_POST['description'];
        $stock = $_POST['stock'];
        $image_name = $unique_name;
        $price = $_POST['price'];
        $rownum = "SELECT * FROM product";
        $id = $conn->query($rownum)->num_rows + 1;

        // Generate URL slug
        $url_slug = strtolower(trim(preg_replace('/[^a-zA-Z0-9]+/', '-', $productName), '-'));

        $sql = "INSERT INTO product (prd_id,prd_name, prd_description, prd_quantity, prd_image, prd_cat_id, url_slug,prd_price) VALUES ('$id','$productName', '$description', '$stock', '$image_name', '$category_id', '$url_slug','$price')";

        if ($conn->query($sql) === TRUE) {
            echo "The file " . basename($_FILES["image"]["name"]) . " has been uploaded.";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
