<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kết quả kiểm tra</title>
    <style>
        fieldset {
            text-align: center;
        }

        h1 {
            color: blue;
            font-size: 40px;
            font-weight: bold;
        }

        .label {
            font-size: 20px;
            margin-top: 40px;
            color: blue;
            font-weight: bold;
        }

        .input-field {
            font-size: 20px;
            width: 200px;
            margin-top: 20px;
            margin-bottom: 10px;
            background-color: #f0f0f0;
            border: 1px solid #ccc;
        }

        .large-text {
            font-size: 20px;
            font-weight: bold;
            color: rgb(0, 0, 0);
        }

        a {
            font-size: 20px;
            color: green;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>

    <?php
    function isPrime($number) {
        if ($number <= 1) return false;
        if ($number == 2) return true;
        if ($number % 2 == 0) return false;
        for ($i = 3; $i <= sqrt($number); $i += 2) {
            if ($number % $i == 0) return false;
        }
        return true;
    }

    $number1 = trim($_POST["number1"]);
    $math = $_POST["math"];
    $result = "";

    if (is_numeric($number1)) {
        switch ($math) {
            case "kiểm tra nguyên tố":
                if (isPrime($number1)) {
                    $result = "$number1 là số nguyên tố";
                } else {
                    $result = "$number1 không phải là số nguyên tố";
                }
                break;
            case "kiểm tra số chẵn":
                if ($number1 % 2 == 0) {
                    $result = "$number1 là số chẵn";
                } else {
                    $result = "$number1 không phải là số chẵn";
                }
                break;
        }
    } else {
        $result = "Vui lòng nhập số hợp lệ!";
    }
    ?>

    <fieldset>
        <h1>Kết quả kiểm tra</h1>

        <label for="math" class="label">Kiểm tra: </label>
        <span class="large-text"><?php echo htmlspecialchars($math); ?></span> <br>

        <label for="number1" class="label">Số đã nhập: </label>
        <input type="text" name="number1" class="input-field" value="<?php echo htmlspecialchars($number1); ?>" readonly> <br>

        <label for="result" class="label">Kết quả: </label>
        <input type="text" name="result" class="input-field" value="<?php echo htmlspecialchars($result); ?>" readonly> <br>

        <a href="bai3-1.php">Quay lại trang trước</a>
    </fieldset>

</body>

</html>
