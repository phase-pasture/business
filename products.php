<?php
include 'db.php';
include 'functions.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['add'])) {
        addProduct($conn, $_POST['name'], $_POST['price'], $_POST['quantity']);
    } elseif (isset($_POST['update'])) {
        updateProduct($conn, $_POST['id'], $_POST['name'], $_POST['price'], $_POST['quantity']);
    } elseif (isset($_POST['delete'])) {
        deleteProduct($conn, $_POST['id']);
    }
}

$products = getAllProducts($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Products</title>
</head>
<body>
    <h2>Manage Products</h2>

    <h3>Add Product</h3>
    <form method="post">
        <label>Name: <input type="text" name="name" required></label>
        <label>Price: <input type="number" name="price" step="0.01" required></label>
        <label>Quantity: <input type="number" name="quantity" required></label>
        <button type="submit" name="add">Add Product</button>
    </form>

    <h3>Product List</h3>
    <ul>
        <?php foreach ($products as $product): ?>
            <li>
                <?php echo "{$product['name']} - \${$product['price']} - Quantity: {$product['quantity']}"; ?>
                <form method="post" style="display: inline;">
                    <input type="hidden" name="id" value="<?php echo $product['id']; ?>">
                    <button type="submit" name="update">Update</button>
                    <button type="submit" name="delete">Delete</button>
                </form>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
