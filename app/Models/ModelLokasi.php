<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelLokasi extends Model
{
  public function insertData($data){
    $this->db->table('tbl_lokasi')->insert($data) ;
  }
}
