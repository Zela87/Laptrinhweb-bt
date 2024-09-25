<?php
$servername = "sql103.infinityfree.com";
$username = "if0_37267814";
$password = "HNMU1234";

try {
    $conn = new PDO("mysql:host=$servername;dbname=if0_37267814_b5_mydb", $username, $password);
    // Set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // SQL to create table
    $sql = "CREATE TABLE IF NOT EXISTS MyGuests (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(50) NOT NULL,
    lastname VARCHAR(50) NOT NULL,
    email VARCHAR(100),
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

    // Execute query
    $conn->exec($sql);
    echo "Table MyGuests created successfully";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$conn = null;
?>
