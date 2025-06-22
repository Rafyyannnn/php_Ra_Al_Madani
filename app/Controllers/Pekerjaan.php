<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelPekerjaan;

class Pekerjaan extends BaseController
{
    protected $ModelPekerjaan;

    public function __construct() 
    {
        $this->ModelPekerjaan = new ModelPekerjaan();
        helper('form');
    }

    public function index()
    {
        $data = [
            'title' => 'PPDB Online',
            'subtitle' => 'Pekerjaan',
            'pekerjaan' => $this->ModelPekerjaan->getAllData(),
        ];
        return view('admin/v_pekerjaan', $data);
    }

    public function insertData()
    {
        $data = [
            'pekerjaan' => $this->request->getPost('pekerjaan'), // fix here
        ];
        $this->ModelPekerjaan->insertData($data); // pastikan method ini ada
        session()->setFlashdata('tambah', 'Data berhasil ditambahkan.');
        return redirect()->to(base_url('pekerjaan')); // fix redirect
    }

    public function editData($id_pekerjaan)
{
    $data = [
        'pekerjaan' => $this->request->getPost('pekerjaan'),
    ];
    $this->ModelPekerjaan->editData($id_pekerjaan, $data);
    session()->setFlashdata('edit', 'Data Berhasil Di Edit !!!');
    return redirect()->to('/pekerjaan');
}

public function deleteData($id_pekerjaan)
{
    $this->ModelPekerjaan->deleteData($id_pekerjaan);
    session()->setFlashdata('delete', 'Data berhasil dihapus!');
    return redirect()->to('/pekerjaan');
}

}
