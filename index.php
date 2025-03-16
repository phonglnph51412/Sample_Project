<?php 

// Require file Common
require_once './commons/env.php'; // Khai báo biến môi trường
require_once './commons/function.php'; // Hàm hỗ trợ

// Require toàn bộ file Controllers
require_once './controllers/ProductsController.php';
require_once './controllers/danhMucController.php';
require_once './controllers/nguoiDungController.php';

// Require toàn bộ file Models
require_once './models/Products.php';
require_once './models/danhMuc.php';
require_once './models/nguoiDung.php';

// Route
$act = $_GET['act'] ?? '/';

// Để bảo bảo tính chất chỉ gọi 1 hàm Controller để xử lý request thì mình sử dụng match

match ($act) {
    // Trang chủ
    '/' => (new ProductsController())->index(),
    'admin' => (new ProductsController())->admin(),

    'form-Add-Products' => (new ProductsController())->formAddProducts(),
    'post-Add-Products' => (new ProductsController())->postAddProducts(),
    'form-Update-Products' => (new ProductsController())->formUpdateProducts(),
    'postUpdateProducts' => (new ProductsController())->postUpdateProducts(),
    'delete-Products' => (new ProductsController())->deleteProducts(),

    'form-Add-DanhMuc' => (new DanhMucController())->formAddDanhMuc(),
    'post-Add-DanhMuc' => (new DanhMucController())->postAddDanhMuc(),
    'form-Update-DanhMuc' => (new DanhMucController())->formUpdateDanhMuc(),
    'postUpdateDanhMuc' => (new DanhMucController())->postUpdateDanhMuc(),
    'delete-DanhMuc' => (new DanhMucController())->deleteDanhMuc(),
    
    'addToCart' => (new ProductsController())->addToCart(),
    'viewCart' => (new ProductsController())->viewCart(),
    'login' => (new nguoiDungController())->login(),


};