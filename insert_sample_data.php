<?php
include 'db_connect.php';
insertSampleData($conn);
function insertSampleData($conn) {
    // $sql = "INSERT IGNORE INTO Categories (category_id,category_name) VALUES (1,'Electronics'), (2,'Furniture'), (3,'Clothing')";
    $sql = " INSERT products (product_id, product_name, price, stock_quantity,category_id) VALUES (1,'Laptop', 1200.00, 10,1)";
    if ($conn->multi_query($sql)) {
        echo "Sample data inserted successfully\n";
    } else {
        echo "Error: " . $conn->error . "\n";
    }
}
$conn->close();
?>
