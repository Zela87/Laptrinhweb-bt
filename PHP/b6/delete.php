<?php
$servername = "sql103.infinityfree.com";
$username = "if0_37267814";
$password = "HNMU1234";


try {
    $conn = new PDO("mysql:host=$servername;dbname=if0_37267814_b5_mydb", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Prepare delete statement
    $stmt = $conn->prepare("DELETE FROM MyGuests WHERE id = :id");
    $stmt->bindParam(':id', $id);

    // Delete record where id = 3
    $id = 3;
    $stmt->execute();

    echo "Record deleted successfully";

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$conn = null;
?>
