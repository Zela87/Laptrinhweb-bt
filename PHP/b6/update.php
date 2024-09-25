<?php
$servername = "sql103.infinityfree.com";
$username = "if0_37267814";
$password = "HNMU1234";


try {
    $conn = new PDO("mysql:host=$servername;dbname=if0_37267814_b5_mydb", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Prepare the update statement
    $stmt = $conn->prepare("UPDATE MyGuests SET firstname = :newfirstname WHERE firstname = :oldfirstname");
    $stmt->bindParam(':newfirstname', $newfirstname);
    $stmt->bindParam(':oldfirstname', $oldfirstname);

    // Update data
    $newfirstname = "Jane";
    $oldfirstname = "James";
    $stmt->execute();

    echo "Record updated successfully";

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$conn = null;
?>
