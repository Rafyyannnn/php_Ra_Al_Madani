<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelPenghasilan;

class Penghasilan extends BaseController
{
     protected $ModelPenghasilan;

    public function __construct() 
    {
        $this->ModelPenghasilan = new ModelPenghasilan();
        helper('form');
    }
    public function index()
    {
        $data = [
            'title' => 'PPDB Online',
            'subtitle' => 'Penghasilan',
            'penghasilan' => $this->ModelPenghasilan->getAllData(),
        ];
        return view('admin/v_penghasilan', $data);
    }

    public function insertData()
    {
        $data = [
            'penghasilan' => $this->request->getPost('penghasilan'), // fix here
        ];
        $this->ModelPenghasilan->insertData($data); // pastikan method ini ada
        session()->setFlashdata('tambah', 'Data berhasil ditambahkan.');
        return redirect()->to(base_url('penghasilan')); // fix redirect
    }

    public function editData($id_penghasilan)
{
    $data = [
        'penghasilan' => $this->request->getPost('penghasilan'),
    ];
    $this->ModelPenghasilan->editData($id_penghasilan, $data);
    session()->setFlashdata('edit', 'Data Berhasil Di Edit !!!');
    return redirect()->to('/penghasilan');
}

public function deleteData($id_penghasilan)
{
    $this->ModelPenghasilan->deleteData($id_penghasilan);
    session()->setFlashdata('delete', 'Data berhasil dihapus!');
    return redirect()->to('/penghasilan');
}
}
