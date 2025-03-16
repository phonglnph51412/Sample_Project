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
        <h1>Cập nhật sản phẩm</h1>
        <form action="./?act=postUpdateProducts" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= ($Products['id']); ?>">
            
            <label for="ten">Tên sản phẩm</label>
            <input type="text" name="ten" id="ten" value="<?= ($Products['ten']); ?>" required>
            
            <label for="gia">Giá sản phẩm</label>
            <input type="text" name="gia" id="gia" value="<?= ($Products['gia']); ?>" required>
            
            <label for="mo_ta">Mô tả sản phẩm</label>
            <input type="text" name="mo_ta" id="mo_ta" value="<?= ($Products['mo_ta']); ?>" required>
            
            <input type="hidden" name="hinh_anh_cu" value="<?= ($Products['hinh_anh']); ?>">
            
            <label for="new_hinh_anh">Hình ảnh mới</label>
            <input type="file" name="hinh_anh_moi" id="new_hinh_anh">

            <label for="hinh_anh">Danh mục</label>
            <input type="text" name="id" value="<?= ($Products['danh_muc_id']); ?>" disabled>

            <select name="danh_muc_id" id="danh_muc_id" value="<?= ($Products['danh_muc_id']); ?>">
                <?php foreach($listDanhMuc as $DanhMuc): ?>
                    <option value="<?= $DanhMuc['id']?>"><?= $DanhMuc['id']?> - <?=$DanhMuc['ten_danh_muc']?></option>
                    <?php endforeach ?>
            </select>
            
            <button type="submit">Lưu</button>
        </form>
    </div>
</body>
</html>
