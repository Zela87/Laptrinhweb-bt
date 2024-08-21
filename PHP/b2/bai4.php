<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Array Functions</title>
    <link rel="stylesheet" href="bai4.css">
</head>

<body>
    <?php
    include 'bai4arr.php';

    // Khởi tạo các biến
    $arr = [];
    $originalArray = $maxValue = $minValue = $sum = $sortedArray = $elementExists = "";
    $elementToCheck = 7; // Bạn có thể thay đổi giá trị này nếu muốn

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Nhận dữ liệu từ người dùng
        $arr = array_map('intval', explode(',', $_POST['array_input']));
        $originalArray = $arr;  // Lưu lại mảng ban đầu

        // Gọi các hàm xử lý mảng
        if (!empty($arr)) {
            $maxValue = findMax($arr);
            $minValue = findMin($arr);
            $sum = calculateSum($arr);

            // Kiểm tra phần tử
            // $elementExists = checkElementExists($arr, $elementToCheck);

            // Sắp xếp mảng
            sortArray($arr);
            $sortedArray = $arr;  // Lưu lại mảng sau khi sắp xếp
        }
    }
    ?>

    <div class="container">
        <h1>Array Functions</h1>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label for="array_input">Nhập mảng (các số cách nhau bằng dấu phẩy):</label><br>
            <input type="text" name="array_input" id="array_input" required><br><br>
            <button type="submit">Kiểm tra</button>
        </form>

        <?php if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($originalArray)) : ?>
        <div class="result-box">
            <p><strong>Mảng ban đầu:</strong> <?php echo implode(", ", $originalArray); ?></p>
            <p><strong>Giá trị lớn nhất trong mảng:</strong> <?php echo $maxValue; ?></p>
            <p><strong>Giá trị nhỏ nhất trong mảng:</strong> <?php echo $minValue; ?></p>
            <p><strong>Tổng các phần tử trong mảng:</strong> <?php echo $sum; ?></p>
            <p><strong>Mảng sau khi sắp xếp:</strong> <?php echo implode(", ", $sortedArray); ?></p>
        </div>
        <?php endif; ?>
    </div>
</body>

</html>
