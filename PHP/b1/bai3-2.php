<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kết quả phép tính</title>
    <style>
        fieldset {
            text-align: center;
        }

        h1 {
            color: blue;
            font-size: 40px;
            font-weight: bold;
        }

        #lb1 {
            font-size: 20px;
            margin-top: 40px;
            color: blue;
            font: bold;
        }

        #lb2 {
            font-size: 20px;
            margin-top: 20px;
            color: green;
            font-weight: bold;
        }

        button {
            font-size: 20px;
            width: 90px;
            margin-top: 20px;
            margin-bottom: 30px;
        }

        #ip1 {
            font-size: 20px;
            width: 200px;
            margin-top: 20px;
            margin-bottom: 10px;
        }

        input, button {
            border: 1px solid rgb(80, 106, 226);
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
    $number1 = $_POST["number1"];
    $number2 = $_POST["number2"];
    $math = $_POST["math"];
    $result = "";

    if (is_numeric($number1) && is_numeric($number2)) {
        switch ($math) {
            case "cộng":
                $result = $number1 + $number2;
                break;
            case "trừ":
                $result = $number1 - $number2;
                break;
            case "nhân":
                $result = $number1 * $number2;
                break;
            case "chia":
                if ($number2 == 0) {
                    $result = "Không thể chia cho 0";
                } else {
                    $result = $number1 / $number2;
                }
                break;
        }
    } else {
        $result = "Vui lòng nhập số hợp lệ!";
    }
    ?>

    <fieldset>
        <h1>Kết quả phép tính</h1>

        <label for="math" id="lb1">Chọn phép tính: </label>
        <span class="large-text"><?php echo htmlspecialchars($math); ?></span> <br>

        <label for="number1" id="lb2">Số 1: </label>
        <input type="text" name="number1" id="ip1" value="<?php echo htmlspecialchars($number1); ?>" readonly> <br>

        <label for="number2" id="lb2">Số 2: </label>
        <input type="text" name="number2" id="ip1" value="<?php echo htmlspecialchars($number2); ?>" readonly> <br>

        <label for="result" id="lb2">Kết quả: </label>
        <input type="text" name="result" id="ip1" value="<?php echo htmlspecialchars($result); ?>" readonly> <br>

        <a href="bai3.php">Quay lại trang trước</a>
    </fieldset>

</body>

</html>
