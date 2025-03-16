<?php
class nguoiDungController
{
    public $modelNguoiDung;
    public function __construct()
    { 
        $this->modelNguoiDung = new nguoiDung();
        if (session_status() === PHP_SESSION_NONE) {
            session_start(); // Khởi tạo session nếu chưa có
        }
    }

    public function login()
    {
        $listNguoiDung = $this->modelNguoiDung->getAllNguoiDung();
        require_once './views/login.php';
    }

}

?>