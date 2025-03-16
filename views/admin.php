

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang quản trị</title>
    <link rel="stylesheet" href="./public/css/listProducts.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            height: 100vh;
            background-color: #f4f4f4;
        }
        .sidebar {
            width: 200px;
            background-color: #333;
            color: #fff;
            padding: 20px;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
        }
        .sidebar h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .sidebar ul {
            list-style: none;
            padding: 0;
        }
        .sidebar ul li {
            margin: 10px 0;
        }
        .sidebar ul li a {
            color: #fff;
            text-decoration: none;
            display: block;
            padding: 10px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        .sidebar ul li a:hover {
            background-color: #575757;
        }
        .content {
            flex: 1;
            padding: 20px;
        }
        .header {
            background-color: #4CAF50;
            color: #fff;
            padding: 10px 20px;
            text-align: center;
        }
        .section {
            background-color: #fff;
            padding: 20px;
            margin: 20px 0;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            display: none; 
        }
        .section.active {
            display: block; /* Hiển thị section khi có class active */
        }
        .section h3 {
            margin-top: 0;
        }
        #dangNhap, button{
            border: none;
            height: 30px;
            width: 100px;
            background-color:  gray;
            color: white;
            border-radius: 5px;
        }
        #dangNhap a{
            text-decoration: none;
            color: #fff;
        }
        #dangNhap a:hover{
            /* text-decoration: wavy; */
            color: red;
        }
        .client a:hover{
            /* text-decoration: wavy; */
            color: skyblue;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <h2>ADMIN</h2>
        <ul>
            <li><a href="#danhmuc" onclick="showSection('danhmuc')">Quản lý danh mục</a></li>
            <li><a href="#sanpham" onclick="showSection('sanpham')">Quản lý sản phẩm</a></li>
            <li><a href="#donhang" onclick="showSection('donhang')">Quản lý đơn hàng</a></li>
            <li><a href="#binhluan" onclick="showSection('binhluan')">Quản lý bình luận</a></li>
            <li><a href="#nguoidung" onclick="showSection('nguoidung')">Quản lý người dùng</a></li>
        </ul>
    </div>
    <div class="content">
        <div class="header">
            <h1>Trang quản trị</h1>
        </div>

        <div id="ad" class="section">
            <?php             
                if(isset($_SESSION['username'])){
                    $username = $_SESSION['username'];
                    ?>
                    <button id="dangNhap" class="client" ><a href="./">Home</a></button>
                    <button><?php echo 'Admin'; ?></button>
                    <button id="dangNhap" ><a href="./views/logout.php">Đăng xuất</a></button>
                    <?php
                }else {
                    header("Location: ./?act=login")
                    ?>
                    <button class="dangNhap"><a href="./views/login.php">Đăng nhập</a></button>
                    
                    <?php
                }
            ?>

        </div>
        <div id="danhmuc" class="section">
            <h3>Quản lý danh mục</h3><br>
            <!-- Nội dung quản lý danh mục sẽ được thêm vào đây -->
            <a href="./?act=form-Add-DanhMuc"><button>Thêm danh mục</button></a>
            <table border="1">
                <thead>
                    <th>STT</th>
                    <th>Tên danh mục</th>
                    <th>Mô tả</th>
                    <th>Ngày tạo</th>
                    <th>Tùy Chọn</th>
                </thead>
                <tbody>
                    <?php foreach($listDanhMuc as $danhMuc): ?>
                        <tr>               
                            <td><?= $danhMuc['id'] ?></td>
                            <td><?= $danhMuc['ten_danh_muc'] ?></td>
                            <td><?= $danhMuc['mo_ta'] ?></td>
                            <td><?= $danhMuc['ngay_tao'] ?></td>   
                            <td>
                                <a href="./?act=form-Update-DanhMuc&id=<?= $danhMuc['id']; ?>"><button>Sửa</button></a>
                                <a href="./?act=delete-DanhMuc&id=<?= $danhMuc['id']; ?>"><button class="delete" onclick="return confirm('Xac nhan xoa ?')">Xóa</button></a>
                            </td>            
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>


        <div id="sanpham" class="section">
            <h3>Quản lý sản phẩm</h3>
            <!-- Nội dung quản lý sản phẩm sẽ được thêm vào đây -->
            <a href="./?act=form-Add-Products"><button>Thêm sản phẩm</button></a>
        <table border="1">
            <thead>
                <th>STT</th>
                <th>Tên</th>
                <th>Hình ảnh</th>
                <th>Giá</th>
                <th>Mô tả</th>
                <th>Tùy Chọn</th>
            </thead>
            <tbody>
                <?php foreach($listProducts as $Products): ?>
                    <tr>
                        <td><?= $Products['id']; ?></td>
                        <td><?= $Products['ten']; ?></td>
                        <td><img src="<?= $Products['hinh_anh']; ?>"></td>
                        <td><?= $Products['gia']; ?></td>
                        <td><?= $Products['mo_ta']; ?></td>
                        <td>
                            <a href="./?act=form-Update-Products&id=<?= $Products['id']; ?>"><button>Sửa</button></a>
                            <a href="./?act=delete-Products&id=<?= $Products['id']; ?>"><button class="delete" onclick="return confirm('Xac nhan xoa ?')">Xóa</button></a>
                        </td>
                    </tr>

                <?php endforeach ?>
            </tbody>
        </table>
        </div>
        <div id="donhang" class="section">
            <h3>Quản lý đơn hàng</h3><br>
            <!-- Nội dung quản lý đơn hàng sẽ được thêm vào đây -->
            <table border="1">
                <thead>
                    <th>STT</th>
                    <th>ID người dùng</th>
                    <th>Ngày đặt</th>
                    <th>Tổng tiền</th>
                </thead>
                <tbody>
                    <?php foreach($listDonHang as $donHang): ?>
                        <tr>               
                            <td><?= $donHang['id'] ?></td>
                            <td><?= $donHang['id_nguoi_dung'] ?></td>
                            <td><?= $donHang['ngay_dat'] ?></td>
                            <td><?= $donHang['tong_tien'] ?></td>               
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>


        <div id="binhluan" class="section">
            <h3>Quản lý bình luận</h3><br>
            <!-- Nội dung quản lý bình luận sẽ được thêm vào đây -->
            <table border="1">
                <thead>
                    <th>STT</th>
                    <th>ID sản phẩm</th>
                    <th>ID người dùng</th>
                    <th>Đánh giá</th>
                    <th>Nội dung</th>
                </thead>
                <tbody>
                    <?php foreach($listBinhLuan as $BinhLuan): ?>
                        <tr>               
                            <td><?= $BinhLuan['id'] ?></td>
                            <td><?= $BinhLuan['id_san_pham'] ?></td>
                            <td><?= $BinhLuan['id_nguoi_dung'] ?></td>
                            <td><?= $BinhLuan['danh_gia'] ?></td>
                            <td><?= $BinhLuan['noi_dung'] ?></td>                    
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>

        <div id="nguoidung" class="section">
            <h3>Quản lý người dùng</h3><br>
            <!-- Nội dung quản lý bình luận sẽ được thêm vào đây -->
            <table border="1">
                <thead>
                    <th>STT</th>
                    <th>Tên đăng nhập</th>
                    <th>Mật khẩu</th>
                    <th>ID vai trò</th>
                </thead>
                <tbody>
                    <?php foreach($listNguoiDung as $NguoiDung): ?>
                        <tr>               
                            <td><?= $NguoiDung['id'] ?></td>
                            <td><?= $NguoiDung['ten_dang_nhap'] ?></td>
                            <td><?= $NguoiDung['mat_khau'] ?></td>
                            <td><?= $NguoiDung['id_vai_tro'] ?></td>               
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>


    </div>

    <script>
        function showSection(sectionId) {
            // Ẩn tất cả các section
            var sections = document.querySelectorAll('.section');
            sections.forEach(function(section) {
                section.classList.remove('active');
            });

            // Hiển thị section được chọn
            var sectionToShow = document.getElementById(sectionId);
            if (sectionToShow) {
                sectionToShow.classList.add('active');
            }
        }
        document.addEventListener('DOMContentLoaded', function() {
            showSection('ad');
        })
    </script>
</body>
</html>
