<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cập nhật sản phẩm</title>
    <link rel="stylesheet" href="./public/css/styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
            background: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        h1 {
            color: #333;
            text-align: center;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        label {
            margin-bottom: 5px;
            font-weight: bold;
        }
        input[type="text"],
        input[type="file"],
        select {
            margin-bottom: 10px;
            padding: 8px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            padding: 10px 20px;
            font-size: 16px;
            color: #fff;
            background-color: #007bff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Cập nhật danh mục</h1>
        <form action="./?act=postUpdateDanhMuc" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= ($danhMuc['id']); ?>">
            
            <label for="ten_danh_muc">Tên danh mục</label>
            <input type="text" name="ten_danh_muc" id="ten_danh_muc" value="<?= ($danhMuc['ten_danh_muc']); ?>" required>
            
            <label for="mo_ta">Mô tả danh mục</label>
            <input type="text" name="mo_ta" id="mo_ta" value="<?= ($danhMuc['mo_ta']); ?>" required>
            
            <button type="submit">Lưu</button>
        </form>
    </div>
</body>
</html>
