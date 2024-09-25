<?php
$servername = "sql103.infinityfree.com";
$username = "if0_37267814";
$password = "HNMU1234";

try {
    $conn = new PDO("mysql:host=$servername;dbname=if0_37267814_b5_mydb", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Prepare SQL and bind parameters
    $stmt = $conn->prepare("INSERT INTO MyGuests (firstname, lastname, email) VALUES (:firstname, :lastname, :email)");
    $stmt->bindParam(':firstname', $firstname);
    $stmt->bindParam(':lastname', $lastname);
    $stmt->bindParam(':email', $email);

    // Insert row 1
    $firstname = "John";
    $lastname = "Doe";
    $email = "john@example.com";
    $stmt->execute();

    // Insert row 2
    $firstname = "Jane";
    $lastname = "Smith";
    $email = "jane@example.com";
    $stmt->execute();

    // Insert row 3
    $firstname = "James";
    $lastname = "Johnson";
    $email = "james@example.com";
    $stmt->execute();

    // Insert row 4
    $firstname = "Emily";
    $lastname = "Brown";
    $email = "emily@example.com";
    $stmt->execute();

    // Insert row 5
    $firstname = "Michael";
    $lastname = "Davis";
    $email = "michael@example.com";
    $stmt->execute();

    echo "New records created successfully";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$conn = null;
?>
