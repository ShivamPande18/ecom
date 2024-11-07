<?php
include 'db_connect.php';

$product_id = $_POST['product_id'];
$order_quantity = $_POST['order_quantity'];

$productCheck = $conn->query("SELECT stock_quantity FROM Products WHERE product_id = $product_id");
if ($productCheck->num_rows > 0) {
    $product = $productCheck->fetch_assoc();
    $dateP = date("Y/m/d");
    if ($product['stock_quantity'] >= $order_quantity) {
        $conn->query("INSERT INTO Orders (product_id, order_quantity,order_date) VALUES ($product_id, $order_quantity, '2024/11/7')");
        $conn->query("UPDATE Products SET stock_quantity = stock_quantity - $order_quantity WHERE product_id = $product_id");
        echo "Order placed successfully.";
    } else {
        echo "Error: Not enough stock available.";
    }
} else {
    echo "Error: Product not found.";
}

$conn->close();
?>
