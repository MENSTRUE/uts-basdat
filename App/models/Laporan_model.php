<?php
class Laporan_model {
    private $table = 'laporan';
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function getLaporanById($id_laporan) {
        $this->db->query("SELECT * FROM " . $this->table . " WHERE id_laporan = :id_laporan");
        $this->db->bind('id_laporan', $id_laporan);
        return $this->db->single();
    }
    

    public function updateLaporan($data) {
        $query = "UPDATE " . $this->table . " SET 
                    category = :category,
                    type = :type,
                    amount = :amount,
                    description = :description,
                    status = :status,
                    updated_at = :updated_at 
                  WHERE id_laporan = :id_laporan";
        
        $this->db->query($query);
        $this->db->bind('category', $data['category']);
        $this->db->bind('type', $data['type']);
        $this->db->bind('amount', $data['amount']);
        $this->db->bind('description', $data['description']);
        $this->db->bind('status', $data['status']);
        $this->db->bind('updated_at', date('Y-m-d H:i:s'));
        $this->db->bind('id_laporan', $data['id_laporan']);
        
        $this->db->execute();
        return $this->db->rowCount();
    }
    
    public function deleteLaporan($id_laporan) {
        $query = "DELETE FROM " . $this->table . " WHERE id_laporan = :id_laporan";
        
        $this->db->query($query);
        $this->db->bind('id_laporan', $id_laporan);
        
        $this->db->execute();
        return $this->db->rowCount();
    }
    
    
    
    
    
}
