<?php

class Products
{
    private $db;

    public function __construct()
    {
        $this->db = connectDB(); // Khởi tạo đối tượng kết nối cơ sở dữ liệu
    }

    // Lấy tất cả sản phẩm 
    public function getAllProducts()
    {
        $query = "SELECT * FROM san_pham";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Lấy sản phẩm theo ID
    public function getProductById($id)
    {
        $query = "SELECT * FROM san_pham WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Thêm sản phẩm mới
    public function addProduct($ten, $gia, $mo_ta, $hinh_anh, $danh_muc_id)
    {
        $query = "INSERT INTO san_pham (ten, gia, mo_ta, hinh_anh, danh_muc_id) VALUES (:ten, :gia, :mo_ta, :hinh_anh, :danh_muc_id)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':ten', $ten);
        $stmt->bindParam(':gia', $gia);
        $stmt->bindParam(':mo_ta', $mo_ta);
        $stmt->bindParam(':hinh_anh', $hinh_anh);
        $stmt->bindParam(':danh_muc_id', $danh_muc_id);
        return $stmt->execute();
    }

    // Cập nhật sản phẩm
    public function updateProduct($id, $ten, $gia, $mo_ta, $hinh_anh, $danh_muc_id)
    {
        $query = "UPDATE san_pham SET ten = :ten, gia = :gia, mo_ta = :mo_ta, hinh_anh = :hinh_anh, danh_muc_id = :danh_muc_id WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':ten', $ten);
        $stmt->bindParam(':gia', $gia);
        $stmt->bindParam(':mo_ta', $mo_ta);
        $stmt->bindParam(':hinh_anh', $hinh_anh);
        $stmt->bindParam(':danh_muc_id', $danh_muc_id);
        return $stmt->execute();
    }

    // Xóa sản phẩm
    public function deleteProduct($id)
    {
        $query = "DELETE FROM san_pham WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    // Lấy ra danh mục sản phẩm
    public function getAllDanhMuc()
    {
        $query = "SELECT * FROM danh_muc_san_pham";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function getDanhMuc($id)
    {
        $query = "SELECT * FROM danh_muc_san_pham WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getAllDonHang()
    {
        $query = "SELECT * FROM don_hang";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getAllBinhLuan()
    {
        $query = "SELECT * FROM gui_danh_gia";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getAllNguoiDung()
    {
        $query = "SELECT * FROM nguoi_dung";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    
}
?>
