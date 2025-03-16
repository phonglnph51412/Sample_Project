<?php

class danhMuc
{
    public $db;

    public function __construct()
    {
        $this->db = connectDB(); // Khởi tạo đối tượng kết nối cơ sở dữ liệu
    }

    // Lấy ra danh mục danh mục
    public function getAllDanhMuc()
    {
        $query = "SELECT * FROM danh_muc_san_pham";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    // Lấy danh mục theo ID
    public function getDanhMucById($id)
    {
        $query = "SELECT * FROM danh_muc_san_pham WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

        // Thêm danh mục mới
        public function addDanhMuc($ten_danh_muc, $mo_ta)
        {
            $query = "INSERT INTO danh_muc_san_pham (ten_danh_muc, mo_ta) VALUES (:ten_danh_muc, :mo_ta)";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':ten_danh_muc', $ten_danh_muc);
            $stmt->bindParam(':mo_ta', $mo_ta);
            return $stmt->execute();
        }
    
        // Cập nhật danh mục
        public function updateDanhMuc($id, $ten_danh_muc, $mo_ta)
        {
            $query = "UPDATE danh_muc_san_pham SET ten_danh_muc = :ten_danh_muc, mo_ta = :mo_ta WHERE id = :id";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->bindParam(':ten_danh_muc', $ten_danh_muc);
            $stmt->bindParam(':mo_ta', $mo_ta);
            return $stmt->execute();
        }
    
        // Xóa danh mục
        public function deleteDanhMuc($id)
        {
            $query = "DELETE FROM danh_muc_san_pham WHERE id = :id";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            return $stmt->execute();
        }
}

?>