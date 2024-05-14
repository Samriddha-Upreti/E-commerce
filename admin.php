<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    < <link rel="stylesheet" href="admin.css">

</head>

<body>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <input type="text" name="productName" placeholder="Product Name">
        <?php
        include('conn.php');
        $sql = "SELECT cat_name FROM categories WHERE status='active'";
        $result = $conn->query($sql);

        $categories = [];

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $categories[] = $row;
            }
        }

        $conn->close();
        ?>
        <div class="category-dropdown">
            <label for="category">Category</label>
            <select name="category" id="category" required>
                <option value="" disabled selected>Select a category</option>
                <?php foreach ($categories as $category) : ?>
                    <option value="<?php echo $category['cat_name']; ?>"><?php echo $category['cat_name']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <input type="file" name="image" id="image" accept="image/*" required>
        <input type="text" name="description" placeholder="Product Description">
        <input type="text" name="stock" placeholder="In Stock">
        <input type="text" name="price" placeholder="Price">

        <input type="submit" value="Submit" name="submit">
    </form>
</body>

</html>