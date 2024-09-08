<?php
// Bắt đầu session
session_start();

// Kiểm tra nếu có POST dữ liệu từ form
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

    // Nếu không có lỗi thì lưu thông tin vào session và cookies
    if (empty($errors)) {
        // Lưu thông tin vào session
        $_SESSION['firstname'] = $firstName;
        $_SESSION['lastname'] = $lastName;
        $_SESSION['email'] = $email;
        $_SESSION['invoiceID'] = $invoiceID;
        $_SESSION['payFor'] = $payFor;
        $_SESSION['receiptFile'] = $target_file;

        // Lưu thông tin vào cookies (thời gian sống 1 ngày)
        setcookie('firstname', $firstName, time() + 86400, "/");
        setcookie('lastname', $lastName, time() + 86400, "/");
        setcookie('email', $email, time() + 86400, "/");
        setcookie('invoiceID', $invoiceID, time() + 86400, "/");
        setcookie('payFor', json_encode($payFor), time() + 86400, "/"); // Lưu array dưới dạng JSON
        setcookie('receiptFile', $target_file, time() + 86400, "/");

        // Chuyển hướng tới trang hiển thị kết quả
        header("Location: display.php");
        exit();
    } else {
        // Hiển thị lỗi
        foreach ($errors as $error) {
            echo "<p style='color:red;'>$error</p>";
        }
    }
}
