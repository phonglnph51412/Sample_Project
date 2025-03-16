<?php

class DanhMucController
{
    public $modelDanhMuc;

    public function __construct()
    {
        $this->modelDanhMuc = new danhMuc();
        if (session_status() === PHP_SESSION_NONE) {
            session_start(); // Khởi tạo session nếu chưa có
        }
    }

    // Hiển thị form thêm danh mục
    public function formAddDanhMuc()
    {
        $listDanhMuc = $this->modelDanhMuc->getAllDanhMuc();
        require_once './views/formAddDanhMuc.php'; // Hiển thị form thêm danh mục
    }

    // Xử lý việc thêm danh mục
    public function postAddDanhMuc()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $ten_danh_muc = $_POST['ten_danh_muc'];
            $mo_ta = $_POST['mo_ta'];

            if ($this->modelDanhMuc->addDanhMuc($ten_danh_muc, $mo_ta)) {
                header('Location: ./?act=admin#danhmuc'); // Điều hướng về trang chính sau khi thêm
                exit;
            }
        }
    }

    // Hiển thị form cập nhật danh mục
    public function formUpdateDanhMuc()
    {
        $id = $_GET['id'];
        $danhMuc = $this->modelDanhMuc->getDanhMucById($id);
        require_once './views/formUpdateDanhMuc.php'; 
    }

    // Xử lý việc cập nhật danh mục
    public function postUpdateDanhMuc()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'];
            $ten_danh_muc = $_POST['ten_danh_muc'];
            $mo_ta = $_POST['mo_ta'];

            if ($this->modelDanhMuc->updateDanhMuc($id, $ten_danh_muc, $mo_ta)) {
                header('Location: ./?act=admin#danhmuc'); 
                exit;
            }
        }
    }

    // Xóa danh mục
    public function deleteDanhMuc()
    {
        $id = $_GET['id'];
        $danhMuc = $this->modelDanhMuc->getDanhMucById($id);
        if ($this->modelDanhMuc->deleteDanhMuc($id)) {
            header('Location: ./?act=admin#danhmuc');
            exit;
        }
    }

}


?>