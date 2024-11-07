<?php
include 'db_connect.php';

$product_id = (int)$_GET['product_id'];

$stmt = $conn->prepare("CALL GetProductInfo(?)");
$stmt->bind_param("i", $product_id);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<strong>Product Name:</strong> " . $row["product_name"] . "<br>";
        echo "<strong>Category:</strong> " . $row["category_name"] . "<br>";
        echo "<strong>Total Orders:</strong> " . $row["total_orders"] . "<br>";
    }
} else {
    echo "No data found for this product.";
}

$stmt->close();
$conn->close();
?>


<!-- SELECT 
        p.product_name,
        c.category_name,
        (SELECT COUNT(*) FROM Orders WHERE product_id = id) AS total_orders
    FROM 
        Products p
    LEFT JOIN Categories c ON p.category_id = c.category_id
    WHERE 
        p.product_id = id -->