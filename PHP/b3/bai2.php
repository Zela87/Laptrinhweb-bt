<!DOCTYPE html>
<html>
<head>
    <title>Payment Receipt Upload Form</title>
    <link rel="stylesheet" type="text/css" href="bai2.css">
    <script>
        function validateForm() {
            // Lấy giá trị của các trường
            const firstName = document.forms["paymentForm"]["firstName"].value;
            const lastName = document.forms["paymentForm"]["lastName"].value;
            const email = document.forms["paymentForm"]["email"].value;
            const invoiceID = document.forms["paymentForm"]["invoiceID"].value;
            const checkboxes = document.querySelectorAll('input[type="checkbox"]:checked');

            // Kiểm tra các trường bắt buộc
            if (firstName == "" || lastName == "" || email == "" || invoiceID == "") {
                alert("Tất cả các trường phải được điền");
                return false;
            }

            // Kiểm tra Invoice ID phải là số
            if (isNaN(invoiceID)) {
                alert("Invoice ID phải là số");
                return false;
            }

            // Kiểm tra ít nhất một checkbox được chọn
            if (checkboxes.length === 0) {
                alert("Vui lòng chọn ít nhất một mục trong 'Pay For'");
                return false;
            }

            return true;
        }
    </script>
</head>
<body>
    <h2>Payment Receipt Upload Form</h2>
    <form name="paymentForm" action="bai2demo.php" onsubmit="return validateForm()" method="post">
        <label for="firstName">First Name:</label>
        <input type="text" id="firstName" name="firstName"><br>

        <label for="lastName">Last Name:</label>
        <input type="text" id="lastName" name="lastName"><br>

        <label for="email">Email:</label>
        <input type="text" id="email" name="email"><br>

        <label for="invoiceID">Invoice ID:</label>
        <input type="text" id="invoiceID" name="invoiceID"><br>

        <h3>Pay For:</h3>
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

        <input type="submit" value="Submit">
    </form>
</body>
</html>
