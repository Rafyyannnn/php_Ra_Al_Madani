<?php

namespace App\Models;

use CodeIgniter\Model;
use PhpParser\Node\Expr\FuncCall;

class ModelTa extends Model
{
    public function getAllData()
    {
        return $this->db->table('tbl_ta')
        ->orderBy('id_ta', 'ASC')
        ->get()
        ->getResultArray();
    }
    public function insertData($data)
    {
        $this->db->table('tbl_ta')->insert($data);
    }
    public function editData($id_ta, $data)
{
    $this->db->table('tbl_ta')
        ->where('id_ta', $id_ta)
        ->update($data);
}
public function deleteData($id_ta)
{
    $this->db->table('tbl_ta')
             ->where('id_ta', $id_ta)
             ->delete();
}
 public function resetStatus()
{
    $this->db->table('tbl_ta')
        ->update(['status' => 0]);
}

public function statusTa()
{
     return $this->db->table('tbl_ta')
        ->where('status', '1')
        ->get()
        ->getRowArray();
}

}