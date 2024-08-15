<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Phép tính trên hai số</title>
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

        input[type="radio"] {
            margin-top: 20px;
            margin-bottom: 10px;
            color: blue;
        }

        input, button {
            border: 1px solid rgb(80, 106, 226);
        }

        input.value {
            font-size: 50px;
        }
    </style>
</head>

<body>
    <form action="bai3-2.php" method="post" name="cac_phep_tinh_co_ban">
        <fieldset>
            <h1>Phép tính trên hai số</h1>

            <label for="math" id="lb1">Chọn phép tính:</label>
            <input type="radio" name="math" value="cộng"> Cộng
            <input type="radio" name="math" value="trừ"> Trừ
            <input type="radio" name="math" value="nhân"> Nhân
            <input type="radio" name="math" value="chia"> Chia <br>

            <label for="number1" id="lb2">Số thứ nhất: </label>
            <input type="text" name="number1" id="ip1"> <br>

            <label for="number2" id="lb2">Số thứ nhì: </label>
            <input type="text" name="number2" id="ip1"> <br>

            <button type="submit">Tính</button>
        </fieldset>
    </form>
</body>

</html>
