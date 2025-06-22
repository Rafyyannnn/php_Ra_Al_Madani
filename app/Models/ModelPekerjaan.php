<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPekerjaan extends Model
{
    public function getAllData()
    {
        return $this->db->table('tbl_pekerjaan')
        ->orderBy('id_pekerjaan', 'ASC')
        ->get()
        ->getResultArray();
    }
    public function insertData($data)
    {
        $this->db->table('tbl_pekerjaan')->insert($data);
    }
    public function editData($id_pekerjaan, $data)
{
    $this->db->table('tbl_pekerjaan')
        ->where('id_pekerjaan', $id_pekerjaan)
        ->update($data);
}
public function deleteData($id_pekerjaan)
{
    $this->db->table('tbl_pekerjaan')
             ->where('id_pekerjaan', $id_pekerjaan)
             ->delete();
}

}