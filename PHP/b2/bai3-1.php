<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kiểm tra số</title>
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
        }

        button {
            font-size: 20px;
            width: 150px;
            margin-top: 20px;
            margin-bottom: 30px;
        }

        input[type="radio"] {
            margin-top: 20px;
            margin-bottom: 10px;
            color: blue;
        }

        input, button {
            border: 1px solid rgb(80, 106, 226);
        }
    </style>
</head>

<body>
    <form action="bai3-11.php" method="post" name="kiem_tra_so">
        <fieldset>
            <h1>Kiểm tra số</h1>

            <label for="math" class="label">Chọn kiểm tra:</label>
            <input type="radio" name="math" value="kiểm tra nguyên tố" checked> Kiểm tra nguyên tố
            <input type="radio" name="math" value="kiểm tra số chẵn"> Kiểm tra số chẵn <br>

            <label for="number1" class="label">Nhập số: </label>
            <input type="text" name="number1" class="input-field" id="number1"> <br>

            <button type="submit">Kiểm tra</button>
        </fieldset>
    </form>
</body>

</html>
