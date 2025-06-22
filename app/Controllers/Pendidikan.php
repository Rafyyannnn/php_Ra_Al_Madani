<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelPendidikan;

class Pendidikan extends BaseController
{
     protected $ModelPendidikan;

    public function __construct() 
    {
        $this->ModelPendidikan = new ModelPendidikan();
        helper('form');
    }
    public function index()
    {
        $data = [
            'title' => 'PPDB Online',
            'subtitle' => 'Pendidikan',
            'pendidikan' => $this->ModelPendidikan->getAllData(),
        ];
        return view('admin/v_pendidikan', $data);
    }

    public function insertData()
    {
        $data = [
            'pendidikan' => $this->request->getPost('pendidikan'), // fix here
        ];
        $this->ModelPendidikan->insertData($data); // pastikan method ini ada
        session()->setFlashdata('tambah', 'Data berhasil ditambahkan.');
        return redirect()->to(base_url('pendidikan')); // fix redirect
    }

    public function editData($id_pendidikan)
{
    $data = [
        'pendidikan' => $this->request->getPost('pendidikan'),
    ];
    $this->ModelPendidikan->editData($id_pendidikan, $data);
    session()->setFlashdata('edit', 'Data Berhasil Di Edit !!!');
    return redirect()->to('/pendidikan');
}

public function deleteData($id_pendidikan)
{
    $this->ModelPendidikan->deleteData($id_pendidikan);
    session()->setFlashdata('delete', 'Data berhasil dihapus!');
    return redirect()->to('/pendidikan');
}
}
