<?php
require './libs/students.php';

// Thực hiện xóa
$id = isset($_POST['id']) ? (int)$_POST['id'] : '';
if ($id){
    delete_student($id); // Ensure delete_student() uses PDO
}

// Trở về trang danh sách
header("location: students_list.php");
?>
