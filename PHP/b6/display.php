<?php
$servername = "sql103.infinityfree.com";
$username = "if0_37267814";
$password = "HNMU1234";


try {
    $conn = new PDO("mysql:host=$servername;dbname=if0_37267814_b5_mydb", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Fetch all data
    $stmt = $conn->prepare("SELECT id, firstname, lastname, reg_date FROM MyGuests");
    $stmt->execute();

    // Display data
    echo "<h2>Danh sách nhân viên</h2>";
    echo "<table border='1'>";
    echo "<tr><th>Id</th><th>Firstname</th><th>Lastname</th><th>Reg_Date</th></tr>";
    while ($row = $stmt->fetch()) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['firstname'] . "</td>";
        echo "<td>" . $row['lastname'] . "</td>";
        echo "<td>" . $row['reg_date'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$conn = null;
?>
