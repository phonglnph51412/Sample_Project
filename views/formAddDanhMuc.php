<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm sản phẩm</title>
    <style>
        /* Toàn bộ trang */
body {
    font-family: Arial, sans-serif;
    background-color: #f8f9fa;
    margin: 0;
    padding: 0;
}

/* Container chính */
.container {
    max-width: 600px;
    margin: 50px auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

/* Tiêu đề */
h1 {
    text-align: center;
    color: #333;
    margin-bottom: 20px;
}

/* Form */
.product-form {
    display: flex;
    flex-direction: column;
}

.product-form label {
    margin-bottom: 5px;
    font-weight: bold;
    color: #333;
}

.product-form input[type="text"],
.product-form input[type="number"],
.product-form input[type="file"] {
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 4px;
    width: 100%;
    box-sizing: border-box;
}

.product-form button {
    background-color: #007bff;
    color: #fff;
    border: none;
    padding: 10px;
    border-radius: 4px;
    font-size: 16px;
    cursor: pointer;
}

.product-form button:hover {
    background-color: #0056b3;
}

    </style>
</head>
<body>
    <div class="container">
        <h1>Thêm danh mục</h1>
        <form action="./?act=post-Add-DanhMuc" method="post" enctype="multipart/form-data" class="product-form">
            <label for="ten_danh_muc">Tên danh mục</label>
            <input type="text" name="ten_danh_muc" id="ten_danh_muc" placeholder="Nhập tên danh mục" required> <br>

            <label for="mo_ta">Mô tả danh mục</label>
            <input type="text" name="mo_ta" id="mo_ta" placeholder="Nhập mô tả danh mục" required> <br>

            <button type="submit">Thêm</button>
        </form>
    </div>
</body>
</html>
