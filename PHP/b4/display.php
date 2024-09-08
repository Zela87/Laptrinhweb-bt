<?php
// Bắt đầu session
session_start();

// Kiểm tra nếu có dữ liệu session hoặc cookies
$firstname = isset($_SESSION['firstname']) ? $_SESSION['firstname'] : (isset($_COOKIE['firstname']) ? $_COOKIE['firstname'] : '');
$lastname = isset($_SESSION['lastname']) ? $_SESSION['lastname'] : (isset($_COOKIE['lastname']) ? $_COOKIE['lastname'] : '');
$email = isset($_SESSION['email']) ? $_SESSION['email'] : (isset($_COOKIE['email']) ? $_COOKIE['email'] : '');
$invoiceID = isset($_SESSION['invoiceID']) ? $_SESSION['invoiceID'] : (isset($_COOKIE['invoiceID']) ? $_COOKIE['invoiceID'] : '');
$payFor = isset($_SESSION['payFor']) ? $_SESSION['payFor'] : (isset($_COOKIE['payFor']) ? json_decode($_COOKIE['payFor'], true) : []);
$receiptFile = isset($_SESSION['receiptFile']) ? $_SESSION['receiptFile'] : (isset($_COOKIE['receiptFile']) ? $_COOKIE['receiptFile'] : '');

?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông tin người dùng</title>
</head>
<body>
    <h2>Thông tin đã nhập:</h2>
    <p>First Name: <?php echo htmlspecialchars($firstname); ?></p>
    <p>Last Name: <?php echo htmlspecialchars($lastname); ?></p>
    <p>Email: <?php echo htmlspecialchars($email); ?></p>
    <p>Invoice ID: <?php echo htmlspecialchars($invoiceID); ?></p>
    <p>Pay For: <?php echo htmlspecialchars(implode(", ", $payFor)); ?></p>
    <p>Biên lai đã tải lên:</p>
    <?php if (!empty($receiptFile)): ?>
        <img src="<?php echo htmlspecialchars($receiptFile); ?>" alt="Receipt Image" width="300">
    <?php else: ?>
        <p>Không có biên lai nào được tải lên.</p>
    <?php endif; ?>
</body>
</html>
