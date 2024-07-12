<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelLokasi extends Model
{
    protected $table = 'tbl_lokasi'; 

    public function insertData($data)
    {
        
        return $this->db->table($this->table)->insert($data);
    }

    public function getAllData()
    {
       
        return $this->db->table($this->table)
            ->get()->getResultArray();
    }

   

    public function getDataById($id_lokasi)
{
    return $this->db->table('tbl_lokasi')
                    ->where('id_lokasi', $id_lokasi)
                    ->get()
                    ->getRowArray();
}

public function updateData($data)
{
    $this->db->table('tbl_lokasi')
             ->where('id_lokasi', $data['id_lokasi'])
             ->update($data);
}


public function deleteData($id_lokasi)
{
    $this->db->table('tbl_lokasi')
             ->where('id_lokasi', $id_lokasi)
             ->delete();
}


}
