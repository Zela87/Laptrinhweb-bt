<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $bookName = $_POST['bookName'];
    $author = $_POST['author'];
    $publisher = $_POST['publisher'];
    $year = $_POST['year'];

    $errors = [];

    if (empty($bookName)) {
        $errors[] = "Tên sách là bắt buộc";
    }
    if (empty($author)) {
        $errors[] = "Tác giả là bắt buộc";
    }
    if (empty($publisher)) {
        $errors[] = "Nhà xuất bản là bắt buộc";
    }
    if (empty($year)) {
        $errors[] = "Năm xuất bản là bắt buộc";
    } elseif (!is_numeric($year)) {
        $errors[] = "Năm xuất bản phải là số";
    }

    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo "<p>$error</p>";
        }
    } else {
        echo "<p>Form đã được gửi thành công!</p>";
        echo "<p>Tên sách: $bookName</p>";
        echo "<p>Tác giả: $author</p>";
        echo "<p>Nhà xuất bản: $publisher</p>";
        echo "<p>Năm xuất bản: $year</p>";
    }
}
?>
