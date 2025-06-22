<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelBaner extends Model
{
    protected $table            = 'tbl_baner';
    protected $primaryKey       = 'id_baner';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;

    protected $allowedFields    = ['ket', 'baner'];

    // Optional timestamps
    protected $useTimestamps = false;

    // Ambil semua data banner
    public function getAllData()
    {
        return $this->orderBy('id_baner', 'ASC')->findAll();
    }

    // Insert data manual
    public function insertData($data)
    {
        return $this->insert($data);
    }

    // Update data manual
    public function editData($id_baner, $data)
    {
        return $this->update($id_baner, $data);
    }

    // Delete data manual
    public function deleteData($id_baner)
    {
        return $this->delete($id_baner);
    }
}
