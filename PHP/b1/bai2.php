<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .add{
            text-align: center;
            margin: 0 auto;
            width: 50%;
        }
    </style>
</head>

<body>
    <div class="add">
    <?php
    // Tạo mảng chứa thông tin sách
    $books = [];
    for ($i = 1; $i <= 100; $i++) {
        $books[] = [
            'title' => "Tensach $i",
            'content' => "Noidung $i"
        ];
    }
    ?>
    <?php
    // Xác định số sách trên mỗi trang
    $books_per_page = 10;

    // Xác định số trang hiện tại
    $current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

    // Tính tổng số trang
    $total_pages = ceil(count($books) / $books_per_page);

    // Xác định vị trí bắt đầu của sách trên mỗi trang
    $start_index = ($current_page - 1) * $books_per_page;

    // Lấy các sách cần hiển thị trên trang hiện tại
    $books_to_display = array_slice($books, $start_index, $books_per_page);
    ?>

    <!-- Hiển thị bảng sách -->
    <table border="1" cellpadding="10">
        <tr>
            <th>STT</th>
            <th>Tên sách</th>
            <th>Nội dung sách</th>
        </tr>
        <?php foreach ($books_to_display as $index => $book) : ?>
            <tr>
                <td><?php echo $start_index + $index + 1; ?></td>
                <td><?php echo htmlspecialchars($book['title']); ?></td>
                <td><?php echo htmlspecialchars($book['content']); ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

    <!-- Hiển thị các nút điều hướng trang -->
    <div style="margin-top: 20px;">
        <?php if ($current_page > 1) : ?>
            <a href="?page=<?php echo $current_page - 1; ?>">&laquo; Previous</a>
        <?php endif; ?>

        <?php for ($page = 1; $page <= $total_pages; $page++) : ?>
            <?php if ($page == $current_page) : ?>
                <strong><?php echo $page; ?></strong>
            <?php else : ?>
                <a href="?page=<?php echo $page; ?>"><?php echo $page; ?></a>
            <?php endif; ?>
        <?php endfor; ?>

        <?php if ($current_page < $total_pages) : ?>
            <a href="?page=<?php echo $current_page + 1; ?>">Next &raquo;</a>
        <?php endif; ?>
    </div>
    </div>
</body>

</html>