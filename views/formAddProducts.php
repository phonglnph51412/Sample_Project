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
        <h1>Thêm sản phẩm</h1>
        <form action="./?act=post-Add-Products" method="post" enctype="multipart/form-data" class="product-form">
            <label for="ten">Tên sản phẩm</label>
            <input type="text" name="ten" id="ten" placeholder="Nhập tên sản phẩm" required> <br>

            <label for="gia">Giá sản phẩm</label>
            <input type="number" name="gia" id="gia" placeholder="Nhập giá sản phẩm" required> <br>

            <label for="mo_ta">Mô tả sản phẩm</label>
            <input type="text" name="mo_ta" id="mo_ta" placeholder="Nhập mô tả sản phẩm" required> <br>

            <label for="hinh_anh">Hình ảnh sản phẩm</label>
            <input type="file" name="hinh_anh" id="hinh_anh" required> <br>
            
            <label for="hinh_anh">Danh mục</label>
            <select name="danh_muc_id" id="danh_muc_id">
                <?php foreach($listDanhMuc as $DanhMuc): ?>
                    <option value="<?= $DanhMuc['id']?>"><?= $DanhMuc['ten_danh_muc']?></option>
                    <?php endforeach ?>
            </select>

            <button type="submit">Thêm</button>
        </form>
    </div>
</body>
</html>
