<?php
// Biến kết nối toàn cục
global $conn;

// Hàm kết nối database bằng PDO
function connect_db()
{
    // Gọi tới biến toàn cục $conn
    global $conn;

    // Nếu chưa kết nối thì thực hiện kết nối
    if (!$conn) {
        try {
            $conn = new PDO("mysql:host=sql103.infinityfree.com;dbname=if0_37267814_qlsinhvien;charset=utf8", "if0_37267814", "HNMU1234");
            // Thiết lập chế độ lỗi PDO để ngoại lệ
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }
}

// Hàm ngắt kết nối
function disconnect_db()
{
    // Gọi tới biến toàn cục $conn
    global $conn;

    // Nếu đã kết nối thì thực hiện ngắt kết nối
    if ($conn) {
        $conn = null; // Đóng kết nối PDO
    }
}

// Hàm lấy tất cả sinh viên
function get_all_students()
{
    // Gọi tới biến toàn cục $conn
    global $conn;

    // Hàm kết nối
    connect_db();

    // Câu truy vấn lấy tất cả sinh viên
    $sql = "SELECT * FROM sinhvien";

    // Thực hiện câu truy vấn
    $query = $conn->query($sql);

    // Mảng chứa kết quả
    $result = $query->fetchAll(PDO::FETCH_ASSOC);

    // Trả kết quả về
    return $result;
}

// Hàm lấy sinh viên theo ID
function get_student($student_id)
{
    // Gọi tới biến toàn cục $conn
    global $conn;

    // Hàm kết nối
    connect_db();

    // Câu truy vấn lấy sinh viên theo ID
    $sql = "SELECT * FROM sinhvien WHERE id = :student_id";

    // Chuẩn bị câu truy vấn
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':student_id', $student_id, PDO::PARAM_INT);
    $stmt->execute();

    // Trả kết quả về
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

// Hàm thêm sinh viên
function add_student($student_name, $student_sex, $student_birthday)
{
    // Gọi tới biến toàn cục $conn
    global $conn;

    // Hàm kết nối
    connect_db();

    // Câu truy vấn thêm sinh viên
    $sql = "INSERT INTO sinhvien (hoten, gioitinh, ngaysinh) VALUES (:hoten, :gioitinh, :ngaysinh)";

    // Chuẩn bị câu truy vấn
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':hoten', $student_name);
    $stmt->bindParam(':gioitinh', $student_sex);
    $stmt->bindParam(':ngaysinh', $student_birthday);

    // Thực hiện câu truy vấn
    return $stmt->execute();
}

// Hàm sửa sinh viên
function edit_student($student_id, $student_name, $student_sex, $student_birthday)
{
    // Gọi tới biến toàn cục $conn
    global $conn;

    // Hàm kết nối
    connect_db();

    // Câu truy sửa sinh viên
    $sql = "UPDATE sinhvien SET hoten = :hoten, gioitinh = :gioitinh, ngaysinh = :ngaysinh WHERE id = :id";

    // Chuẩn bị câu truy vấn
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':hoten', $student_name);
    $stmt->bindParam(':gioitinh', $student_sex);
    $stmt->bindParam(':ngaysinh', $student_birthday);
    $stmt->bindParam(':id', $student_id, PDO::PARAM_INT);

    // Thực hiện câu truy vấn
    return $stmt->execute();
}

// Hàm xóa sinh viên
function delete_student($student_id)
{
    // Gọi tới biến toàn cục $conn
    global $conn;

    // Hàm kết nối
    connect_db();

    // Câu truy vấn xóa sinh viên
    $sql = "DELETE FROM sinhvien WHERE id = :id";

    // Chuẩn bị câu truy vấn
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $student_id, PDO::PARAM_INT);

    // Thực hiện câu truy vấn
    return $stmt->execute();
}
