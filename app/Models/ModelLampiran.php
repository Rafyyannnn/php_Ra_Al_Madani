<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelLampiran extends Model
{
    public function getAllData()
    {
        return $this->db->table('tbl_lampiran')
        ->orderBy('id_lampiran', 'ASC')
        ->get()
        ->getResultArray();
    }
    public function insertData($data)
    {
        $this->db->table('tbl_lampiran')->insert($data);
    }
    public function editData($id_lampiran, $data)
{
    $this->db->table('tbl_lampiran')
        ->where('id_lampiran', $id_lampiran)
        ->update($data);
}
public function deleteData($id_lampiran)
{
    $this->db->table('tbl_lampiran')
             ->where('id_lampiran', $id_lampiran)
             ->delete();
}

}