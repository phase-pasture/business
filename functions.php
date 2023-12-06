<?php
function getAllProducts($conn) {
    $sql = "SELECT * FROM products";
    $result = $conn->query($sql);
    return ($result->num_rows > 0) ? $result->fetch_all(MYSQLI_ASSOC) : [];
}

function getProductById($conn, $id) {
    $sql = "SELECT * FROM products WHERE id = $id";
    $result = $conn->query($sql);
    return ($result->num_rows > 0) ? $result->fetch_assoc() : null;
}

function addProduct($conn, $name, $price, $quantity) {
    $sql = "INSERT INTO products (name, price, quantity) VALUES ('$name', $price, $quantity)";
    return $conn->query($sql);
}

function updateProduct($conn, $id, $name, $price, $quantity) {
    $sql = "UPDATE products SET name='$name', price=$price, quantity=$quantity WHERE id=$id";
    return $conn->query($sql);
}

function deleteProduct($conn, $id) {
    $sql = "DELETE FROM products WHERE id=$id";
    return $conn->query($sql);
}
?>
