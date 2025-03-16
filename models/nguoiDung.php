<?php
class nguoiDung 
{
    public $db; 

    public function __construct()
    {
        $this->db = connectDB();
    }

    public function getAllNguoiDung()
    {
        $query = "SELECT * FROM nguoi_dung";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>