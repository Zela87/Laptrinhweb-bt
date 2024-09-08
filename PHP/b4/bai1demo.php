<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = htmlspecialchars($_POST['firstname']);
    $lastName = htmlspecialchars($_POST['lastname']);
    $email = htmlspecialchars($_POST['email']);
    $invoiceID = htmlspecialchars($_POST['invoiceID']);
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

    // Kiểm tra và xử lý file upload
    $target_dir = "uploads/";
    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0755, true); // Tạo thư mục nếu chưa có
    }

    if (isset($_FILES['receiptFile']) && $_FILES['receiptFile']['error'] == 0) {
        $target_file = $target_dir . basename($_FILES["receiptFile"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Kiểm tra định dạng file
        $allowed_types = ['jpg', 'jpeg', 'png', 'gif'];
        if (!in_array($imageFileType, $allowed_types)) {
            $errors[] = "Chỉ cho phép các tệp JPG, JPEG, PNG, và GIF.";
        } else {
            // Kiểm tra kích thước file (giới hạn 5MB)
            if ($_FILES["receiptFile"]["size"] > 5000000) {
                $errors[] = "Tệp quá lớn. Giới hạn cho phép là 5MB.";
            } else {
                // Lưu file upload
                if (!move_uploaded_file($_FILES["receiptFile"]["tmp_name"], $target_file)) {
                    $errors[] = "Có lỗi xảy ra khi tải lên file.";
                }
            }
        }
    } else {
        $errors[] = "Bạn phải tải lên biên lai thanh toán.";
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
        echo "<p>Biên lai đã tải lên:</p>";
        echo "<img src='$target_file' alt='Receipt Image' width='300'>"; // Hiển thị ảnh đã tải lên
    }
}
?>
