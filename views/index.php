<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>
    <link rel="stylesheet" href="./public/css/index.css">
</head>

<body>
    <div class="container">
        <header class="header">
            <!-- Logo -->
            <!-- <img src="img/logo.webp" alt="Logo" class="logo"> -->

            <!-- Menu -->
            <nav class="menu">
                <ul>
                    <li><a href="./">Trang chủ</a></li>
                    <li><a href="./?act=viewCart">Giỏ hàng</a></li>
                    <li><a href="./?act=login">Đăng nhập</a></li>
                </ul>
            </nav>

            <!-- Tìm kiếm -->
            <form action="" method="get" class="search-form">
                <input type="text" name="tuKhoa" placeholder="Tìm kiếm">
                <button type="submit"><img src="./public/img/search.png" alt="Tìm kiếm" href="#search" onclick="showSection('search')"></button>
            </form>
        </header>

        <!-- Banner -->
        <div class="banner">
            <img src="./public/img/tech.png" alt="Banner" class="banner-image">
        </div>

        <!-- Main Content -->
        <div class="main-content">
            <!-- Danh mục -->
            <aside class="sidebar">
                <h2>Danh mục</h2>
                <ul>
                    <li><a href="#all" onclick="showSection('all')">Tất cả</a></li>
                    <li><a href="#ban" onclick="showSection('ban')">Bàn</a></li>
                    <li><a href="#ghe" onclick="showSection('ghe')">Ghế</a></li>
                    <li><a href="#phukiensetup" onclick="showSection('phukiensetup')">Phụ kiện setup</a></li>
                    <li><a href="#phukienmaytinh" onclick="showSection('phukienmaytinh')">Phụ kiện máy tính</a></li>
                </ul>
            </aside>

            <!-- Sản phẩm -->
            <div id="all" class="section">
                <h2>Tất cả sản phẩm</h2>
                <?php if (isset($listProducts) && !empty($listProducts)): ?>
                    <?php foreach ($listProducts as $product): ?>
                        <div class="product-item">
                            <img src="<?php echo ($product['hinh_anh']); ?>" alt="Hình ảnh sản phẩm" class="product-image">
                            <h3><?php echo ($product['ten']); ?></h3>
                            <p class="product-price"><?php echo number_format($product['gia'], 0, ',', '.'); ?> VNĐ</p>
                            <form id="add-to-cart-form" method="post" action="./?act=addToCart" onclick="alert('Sản phẩm đã được thêm vào giỏ hàng!')">
                                <input type="hidden" name="product_id" value="<?php echo ($product['id']); ?>">
                                <!-- <input type="number" name="quantity" value="1" min="1"> -->
                                <button type="submit" class="btn-view">Thêm vào giỏ hàng</button>
                            </form>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>Không có sản phẩm nào để hiển thị.</p>
                <?php endif; ?>
            </div>

            <div id="search" class="section">
                <div class="search">
                    <?php
                    // Danh sách sản phẩm
                    // Hàm tìm kiếm sản phẩm
                    function timKiemSanPham($listProducts, $tuKhoa){
                        $ketQua = array();    
                        foreach($listProducts as $product){
                            $tenSanPham = strtolower($product['ten']);
                            $tuKhoaTimKiem = trim(strtolower($tuKhoa));

                            if (strpos($tenSanPham, $tuKhoaTimKiem) !== false) {
                                $ketQua[] = $product;
                            }
                        }   
                        return $ketQua; 
                    }

                    // Xử lý form
                    if(isset($_GET['tuKhoa'])){
                        $tuKhoaTimKiem = $_GET['tuKhoa'];
                        $ketQuaTimKiem = timKiemSanPham($listProducts, $tuKhoaTimKiem);
                        if(count($ketQuaTimKiem) > 0){
                    ?>
                            <h2>Sản phẩm phù hợp với "<?php echo $tuKhoaTimKiem; ?>"</h2>
                    <?php foreach($ketQuaTimKiem as $product){ ?>                      
                        <div class="product-item">
                                <img src="<?php echo ($product['hinh_anh']); ?>" alt="Hình ảnh sản phẩm" class="product-image">
                                <h3><?php echo ($product['ten']); ?></h3>
                                <p class="product-price"><?php echo number_format($product['gia'], 0, ',', '.'); ?> VNĐ</p>
                                <form id="add-to-cart-form" method="post" action="./?act=addToCart" onclick="alert('Sản phẩm đã được thêm vào giỏ hàng!')">
                                    <input type="hidden" name="product_id" value="<?php echo ($product['id']); ?>">
                                    <!-- <input type="number" name="quantity" value="1" min="1"> -->
                                    <button type="submit" class="btn-view">Thêm vào giỏ hàng</button>
                                </form>
                            </div>
                    <?php
                            }
                        }
                        else{
                    ?>
                            <h2>Không tìm thấy sản phẩm "<?php echo $tuKhoaTimKiem; ?>"</h2>
                    <?php
                        }
                    }
                    ?>
                    </div>
            </div>

            <div id="ban" class="section">
                <h2>Bàn công thái học</h2>
                <?php if (isset($listProducts) && !empty($listProducts)): ?>
                    <?php foreach ($listProducts as $product): ?>
                        <?php if ($product['danh_muc_id'] == 1): ?>
                            <div class="product-item">
                                <img src="<?php echo ($product['hinh_anh']); ?>" alt="Hình ảnh sản phẩm" class="product-image">
                                <h3><?php echo ($product['ten']); ?></h3>
                                <p class="product-price"><?php echo number_format($product['gia'], 0, ',', '.'); ?> VNĐ</p>
                                <form id="add-to-cart-form" method="post" action="./?act=addToCart" onclick="alert('Sản phẩm đã được thêm vào giỏ hàng!')">
                                    <input type="hidden" name="product_id" value="<?php echo ($product['id']); ?>">
                                    <!-- <input type="number" name="quantity" value="1" min="1"> -->
                                    <button type="submit" class="btn-view">Thêm vào giỏ hàng</button>
                                </form>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>Không có sản phẩm nào để hiển thị.</p>
                <?php endif; ?>
            </div>

            <div id="ghe" class="section">
                <h2>Ghế công thái học</h2>
                <?php if (isset($listProducts) && !empty($listProducts)): ?>
                    <?php foreach ($listProducts as $product): ?>
                        <?php if ($product['danh_muc_id'] == 2): ?>
                            <div class="product-item">
                                <img src="<?php echo ($product['hinh_anh']); ?>" alt="Hình ảnh sản phẩm" class="product-image">
                                <h3><?php echo ($product['ten']); ?></h3>
                                <p class="product-price"><?php echo number_format($product['gia'], 0, ',', '.'); ?> VNĐ</p>
                                <form id="add-to-cart-form" method="post" action="./?act=addToCart" onclick="alert('Sản phẩm đã được thêm vào giỏ hàng!')">
                                    <input type="hidden" name="product_id" value="<?php echo ($product['id']); ?>">
                                    <!-- <input type="number" name="quantity" value="1" min="1"> -->
                                    <button type="submit" class="btn-view">Thêm vào giỏ hàng</button>
                                </form>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>Không có sản phẩm nào để hiển thị.</p>
                <?php endif; ?>
            </div>

            <div id="phukiensetup" class="section">
                <h2>Phụ kiện setup</h2>
                <?php if (isset($listProducts) && !empty($listProducts)): ?>
                    <?php foreach ($listProducts as $product): ?>
                        <?php if ($product['danh_muc_id'] == 3): ?>
                            <div class="product-item">
                                <img src="<?php echo ($product['hinh_anh']); ?>" alt="Hình ảnh sản phẩm" class="product-image">
                                <h3><?php echo ($product['ten']); ?></h3>
                                <p class="product-price"><?php echo number_format($product['gia'], 0, ',', '.'); ?> VNĐ</p>
                                <form id="add-to-cart-form" method="post" action="./?act=addToCart" onclick="alert('Sản phẩm đã được thêm vào giỏ hàng!')">
                                    <input type="hidden" name="product_id" value="<?php echo ($product['id']); ?>">
                                    <!-- <input type="number" name="quantity" value="1" min="1"> -->
                                    <button type="submit" class="btn-view">Thêm vào giỏ hàng</button>
                                </form>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>Không có sản phẩm nào để hiển thị.</p>
                <?php endif; ?>
            </div>

            <div id="phukienmaytinh" class="section">
                <h2>Phụ kiện máy tính</h2>
                <?php if (isset($listProducts) && !empty($listProducts)): ?>
                    <?php foreach ($listProducts as $product): ?>
                        <?php if ($product['danh_muc_id'] == 4): ?>
                            <div class="product-item">
                                <img src="<?php echo htmlspecialchars($product['hinh_anh']); ?>" alt="Hình ảnh sản phẩm" class="product-image">
                                <h3><?php echo htmlspecialchars($product['ten']); ?></h3>
                                <p class="product-price"><?php echo number_format($product['gia'], 0, ',', '.'); ?> VNĐ</p>
                                <form id="add-to-cart-form" method="post" action="./?act=addToCart" onclick="alert('Sản phẩm đã được thêm vào giỏ hàng!')">
                                    <input type="hidden" name="product_id" value="<?php echo ($product['id']); ?>">
                                    <!-- <input type="number" name="quantity" value="1" min="1"> -->
                                    <button type="submit" class="btn-view">Thêm vào giỏ hàng</button>
                                </form>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>Không có sản phẩm nào để hiển thị.</p>
                <?php endif; ?>
            </div>
        </div>

        <!-- Footer -->
        <footer class="footer">
            <div class="footer-content">
                <p>&copy; 2024 My project.</p>
                <ul class="footer-menu">
                    <li><a href="./">Trang chủ</a></li>
                    <li><a href="index.php?action=viewCart">Giỏ hàng</a></li>
                    <li><a href="dangKy.html">Đăng ký</a></li>
                </ul>
            </div>
        </footer>
    </div>

    <script>
        function showSection(sectionId) {
            // Ẩn tất cả các section sản phẩm
            var sections = document.querySelectorAll('.section');
            sections.forEach(function (section) {
                section.style.display = 'none';
            });

            // Hiển thị section sản phẩm được chọn
            var sectionToShow = document.getElementById(sectionId);
            if (sectionToShow) {
                sectionToShow.style.display = 'block';
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            if (window.location.search.includes('tuKhoa')) {
                showSection('search');
            } else {
                showSection('all');
            }
        });


    </script>
</body>

</html>
