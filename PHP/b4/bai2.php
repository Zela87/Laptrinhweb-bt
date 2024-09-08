<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biểu mẫu tải lên biên lai thanh toán</title>
    <link rel="stylesheet" type="text/css" href="bai1.css">
    <script>
        function validateForm() {
            const firstName = document.forms["paymentForm"]["firstname"].value.trim();
            const lastName = document.forms["paymentForm"]["lastname"].value.trim();
            const email = document.forms["paymentForm"]["email"].value.trim();
            const invoiceID = document.forms["paymentForm"]["invoiceID"].value.trim();
            const checkboxes = document.querySelectorAll('input[type="checkbox"]:checked');
            const fileInput = document.forms["paymentForm"]["receiptFile"].value;

            if (firstName === "" || lastName === "" || email === "" || invoiceID === "") {
                alert("Tất cả các trường phải được điền");
                return false;
            }

            if (isNaN(invoiceID)) {
                alert("Mã hóa đơn phải là số");
                return false;
            }

            const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailPattern.test(email)) {
                alert("Vui lòng nhập địa chỉ email hợp lệ.");
                return false;
            }

            if (checkboxes.length === 0) {
                alert("Vui lòng chọn ít nhất một mục trong 'Thanh toán cho'");
                return false;
            }

            if (fileInput === "") {
                alert("Vui lòng tải lên ảnh biên lai thanh toán");
                return false;
            }

            return true;
        }
    </script>
</head>
<body>
    <h2>Biểu mẫu tải lên biên lai thanh toán</h2>
    <form name="paymentForm" action="bai2demo.php" onsubmit="return validateForm()" method="post" enctype="multipart/form-data">
        <label for="firstname">Họ:</label>
        <input type="text" id="firstname" name="firstname" required><br>

        <label for="lastname">Tên:</label>
        <input type="text" id="lastname" name="lastname" required><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br>

        <label for="invoiceID">Mã hóa đơn:</label>
        <input type="text" id="invoiceID" name="invoiceID" required><br>

        <h3>Thanh toán cho:</h3>
        <input type="checkbox" name="payFor[]" value="15K Category"> 15K Category<br>
        <input type="checkbox" name="payFor[]" value="35K Category"> 35K Category<br>
        <input type="checkbox" name="payFor[]" value="55K Category"> 55K Category<br>
        <input type="checkbox" name="payFor[]" value="75K Category"> 75K Category<br>
        <input type="checkbox" name="payFor[]" value="116K Category"> 116K Category<br>
        <input type="checkbox" name="payFor[]" value="Shuttle Two Ways"> Shuttle Two Ways<br>
        <input type="checkbox" name="payFor[]" value="Shuttle One Way"> Shuttle One Way<br>
        <input type="checkbox" name="payFor[]" value="Training Cap Merchandise"> Training Cap Merchandise<br>
        <input type="checkbox" name="payFor[]" value="Compressport T-Shirt Merchandise"> Compressport T-Shirt Merchandise<br>
        <input type="checkbox" name="payFor[]" value="Buf Merchandise"> Buf Merchandise<br>
        <input type="checkbox" name="payFor[]" value="Other"> Other<br><br>
        
        <h3>Tải lên biên lai thanh toán:</h3>
        <input type="file" id="receiptFile" name="receiptFile" accept="image/*" required><br><br>

        <input type="submit" value="Gửi đi">
    </form>
</body>
</html>
