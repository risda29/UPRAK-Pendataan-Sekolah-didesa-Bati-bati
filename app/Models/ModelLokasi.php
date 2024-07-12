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

    public function updateData($id_lokasi, $data)
    {
        // Update data berdasarkan id_lokasi
        return $this->db->table($this->table)
            ->where('id_lokasi', $id_lokasi)
            ->update($data);
    }

    public function getAllData()
    {
        // Ambil semua data dari tabel
        return $this->db->table($this->table)
            ->get()->getResultArray();
    }

    public function getDataById($id_lokasi)
    {
        return $this->db->table($this->table)
            ->where('id_lokasi', $id_lokasi)
            ->get()->getRowArray();
    }
}
