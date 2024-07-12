<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelLokasi extends Model
{
    protected $table = 'tbl_lokasi'; // Nama tabel di database

    public function insertData($data)
    {
        // Insert data ke dalam tabel
        return $this->db->table($this->table)->insert($data);
    }

    public function getAllData()
    {
        // Ambil semua data dari tabel
        return $this->db->table($this->table)
            ->get()->getResultArray();
    }

    // public function getDataById($id_lokasi)
    // {
    //     return $this->db->table($this->table)
    //         ->where('id_lokasi', $id_lokasi)
    //         ->get()->getRowArray();
    // }

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


}
