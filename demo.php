<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    $servername = "localhost:3310";
    $username = "root";
    $password = "";
    $dbname = "ecommerce";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);
    else echo "connected";
    $sql = "INSERT products (product_id, product_name, price, stock_quantity) VALUES
              (1,'Laptop', 1200.00, 10),
              (2,'Sofa', 300.00, 5),
              (3,'T-shirt', 15.00, 20)";
    if ($conn->multi_query($sql)) {
        echo "Sample data inserted successfully.";
    } else {
        echo "Error: " . $conn->error;
    }
    $conn->close();
?>
</body>
</html>