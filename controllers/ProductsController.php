<?php

class ProductsController
{
    public $modelProducts;

    public function __construct()
    { 
        $this->modelProducts = new Products(); // Khởi tạo mô hình Products
        if (session_status() === PHP_SESSION_NONE) {
            session_start(); // Khởi tạo session nếu chưa có
        }
    }

    // Hiển thị danh sách sản phẩm
    public function admin()
    {
        $listDanhMuc = $this->modelProducts->getAllDanhMuc();
        $listProducts = $this->modelProducts->getAllProducts(); // Lấy danh sách sản phẩm
        $listDonHang = $this->modelProducts->getAllDonHang();
        $listBinhLuan = $this->modelProducts->getAllBinhLuan();
        $listNguoiDung = $this->modelProducts->getAllNguoiDung();
        // require_once './views/searchForm.php'; // Hiển thị danh sách sản phẩm
        require_once './views/admin.php';
    }

    public function index()
    {
        $listDanhMuc = $this->modelProducts->getAllDanhMuc();
        $listProducts = $this->modelProducts->getAllProducts(); // Lấy danh sách sản phẩm
        $listDonHang = $this->modelProducts->getAllDonHang();
        $listBinhLuan = $this->modelProducts->getAllBinhLuan();
        $listNguoiDung = $this->modelProducts->getAllNguoiDung();
        require_once './views/index.php'; // Hiển thị danh sách sản phẩm
    }

    // Hiển thị form thêm sản phẩm
    public function formAddProducts()
    {
        $listDanhMuc = $this->modelProducts->getAllDanhMuc();
        require_once './views/formAddProducts.php'; // Hiển thị form thêm sản phẩm
    }

    // Xử lý việc thêm sản phẩm
    public function postAddProducts()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $ten = $_POST['ten'];
            $gia = $_POST['gia'];
            $mo_ta = $_POST['mo_ta'];
            $danh_muc_id = $_POST['danh_muc_id'];

            // Xử lý tải lên hình ảnh
            $hinh_anh = isset($_FILES['hinh_anh']) ? $this->uploadFile($_FILES['hinh_anh'], './uploads/img/') : null;

            if ($this->modelProducts->addProduct($ten, $gia, $mo_ta, $hinh_anh, $danh_muc_id)) {
                header('Location: ./?act=admin'); // Điều hướng về trang chính sau khi thêm
                exit;
            }
        }
    }

    // Hiển thị form cập nhật sản phẩm
    public function formUpdateProducts()
    {
        $id = $_GET['id'];
        $Products = $this->modelProducts->getProductById($id); // Lấy thông tin sản phẩm
        $danhMuc = $this->modelProducts->getDanhMuc($id);
        $listDanhMuc = $this->modelProducts->getAllDanhMuc();
        require_once './views/formUpdateProducts.php'; // Hiển thị form cập nhật sản phẩm
    }

    // Xử lý việc cập nhật sản phẩm
    public function postUpdateProducts()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'];
            $ten = $_POST['ten'];
            $gia = $_POST['gia'];
            $mo_ta = $_POST['mo_ta'];
            $hinh_anh_cu = $_POST['hinh_anh_cu'];
            $hinh_anh_moi = isset($_FILES['hinh_anh_moi']) ? $_FILES['hinh_anh_moi'] : null;
            $danh_muc_id = $_POST['danh_muc_id'];

            // Xử lý tải lên hình ảnh mới
            if ($hinh_anh_moi && $hinh_anh_moi['error'] == UPLOAD_ERR_OK) {
                $image = $this->uploadFile($hinh_anh_moi, './uploads/img/');
                if (!empty($hinh_anh_cu)) {
                    $this->deleteFile($hinh_anh_cu); // Xóa hình ảnh cũ nếu có
                }
            } else {
                $image = $hinh_anh_cu; // Giữ nguyên hình ảnh cũ nếu không có hình ảnh mới
            }

            if ($this->modelProducts->updateProduct($id, $ten, $gia, $mo_ta, $image, $danh_muc_id)) {
                header('Location: ./?act=admin#sanpham'); // Điều hướng về trang chính sau khi cập nhật
                exit;
            }
        }
    }

    // Xóa sản phẩm
    public function deleteProducts()
    {
        $id = $_GET['id'];
        $product = $this->modelProducts->getProductById($id); // Lấy thông tin sản phẩm để có hình ảnh cũ
        if ($this->modelProducts->deleteProduct($id)) {
            if (!empty($product['image'])) {
                $this->deleteFile($product['image']); // Xóa hình ảnh nếu có
            }
            header('Location: ./?act=admin'); // Điều hướng về trang chính sau khi xóa
            exit;
        }
    }

    function uploadFile($file, $folderUpload)
    {
        $pathStorage = $folderUpload . time() . '-' . basename($file['name']);
        $from = $file['tmp_name'];
        $to = PATH_ROOT . $pathStorage;

        if (move_uploaded_file($from, $to)) {
            return $pathStorage;
        }
        return null;
    }

    function deleteFile($file)
    {
        $pathFile = PATH_ROOT . $file;
        if (file_exists($pathFile)) {
            unlink($pathFile);
        }
    }

    public function listDanhMuc()
    {
        $listDanhMuc = $this->modelProducts->getAllDanhMuc();
        require_once './views/admin.php';
    }

    // Thêm sản phẩm vào giỏ hàng
    public function addToCart()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $product_id = $_POST['product_id'];
            $quantity = $_POST['quantity'];

            $product = $this->modelProducts->getProductById($product_id);

            if ($product) {
                if (!isset($_SESSION['cart'])) {
                    $_SESSION['cart'] = array();
                }

                $found = false;
                foreach ($_SESSION['cart'] as &$item) {
                    if ($item['id'] == $product_id) {
                        $item['quantity'] += $quantity;
                        $found = true;
                        break;
                    }
                }

                if (!$found) {
                    $cartItem = array(
                        'id' => $product_id,
                        'name' => $product['ten'],
                        'price' => $product['gia'],
                        'quantity' => $quantity
                    );
                    array_push($_SESSION['cart'], $cartItem);
                }


                header('Location: ./');
                exit;
            }
        }
    }


    // Hiển thị giỏ hàng
    public function viewCart()
    {
        if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
            require_once './views/gioHangTrong.php';
        } else {
            $cartItems = $_SESSION['cart'];
            require_once './views/gioHang.php';
        }
    }

    // Xóa sản phẩm khỏi giỏ hàng
    public function removeFromCart()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $product_id = $_POST['product_id'];

            foreach ($_SESSION['cart'] as $key => $item) {
                if ($item['id'] == $product_id) {
                    unset($_SESSION['cart'][$key]);
                    break;
                }
            }

            header('Location: ./?act=viewCart');
            exit;
        }
    }

    // Xóa toàn bộ giỏ hàng
    public function clearCart()
    {
        unset($_SESSION['cart']);
        header('Location: ./');
        exit;
    }
}
?>
