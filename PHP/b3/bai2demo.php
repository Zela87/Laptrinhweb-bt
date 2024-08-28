<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $invoiceID = $_POST['invoiceID'];
    $payFor = isset($_POST['payFor']) ? $_POST['payFor'] : [];

    $errors = [];

    // Kiểm tra các trường bắt buộc
    if (empty($firstName)) {
        $errors[] = "First Name là bắt buộc.";
    }
    if (empty($lastName)) {
        $errors[] = "Last Name là bắt buộc.";
    }
    if (empty($email)) {
        $errors[] = "Email là bắt buộc.";
    }
    if (empty($invoiceID)) {
        $errors[] = "Invoice ID là bắt buộc.";
    } elseif (!is_numeric($invoiceID)) {
        $errors[] = "Invoice ID phải là số.";
    }
    if (empty($payFor)) {
        $errors[] = "Bạn phải chọn ít nhất một mục trong 'Pay For'.";
    }

    // Hiển thị kết quả hoặc thông báo lỗi
    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo "<p style='color:red;'>$error</p>";
        }
    } else {
        echo "<p style='color:green;'>Form đã được gửi thành công!</p>";
        echo "<p>First Name: $firstName</p>";
        echo "<p>Last Name: $lastName</p>";
        echo "<p>Email: $email</p>";
        echo "<p>Invoice ID: $invoiceID</p>";
        echo "<p>Pay For: " . implode(", ", $payFor) . "</p>";
    }
}
?>
