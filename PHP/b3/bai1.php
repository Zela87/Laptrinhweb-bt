<!DOCTYPE html>
<html>
<head>
    <title>Form Sách</title>
    <link rel="stylesheet" type="text/css" href="bai1.css">
    <script>
        function validateForm() {
            const bookName = document.forms["bookForm"]["bookName"].value;
            const author = document.forms["bookForm"]["author"].value;
            const publisher = document.forms["bookForm"]["publisher"].value;
            const year = document.forms["bookForm"]["year"].value;

            if (bookName == "" || author == "" || publisher == "" || year == "") {
                alert("Tất cả các trường phải được điền");
                return false;
            }

            if (isNaN(year)) {
                alert("Năm xuất bản phải là số");
                return false;
            }

            return true;
        }
    </script>
</head>
<body>
    <h2>Form Sách</h2>
    <form name="bookForm" action="bai1demo.php" onsubmit="return validateForm()" method="post">
        <label for="bookName">Tên sách:</label>
        <input type="text" id="bookName" name="bookName"><br>

        <label for="author">Tác giả:</label>
        <input type="text" id="author" name="author"><br>

        <label for="publisher">Nhà xuất bản:</label>
        <input type="text" id="publisher" name="publisher"><br>

        <label for="year">Năm xuất bản:</label>
        <input type="text" id="year" name="year"><br>

        <input type="submit" value="Gửi">
    </form>
</body>
</html>
