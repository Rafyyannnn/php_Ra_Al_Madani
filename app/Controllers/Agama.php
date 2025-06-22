<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelAgama;

class Agama extends BaseController
{
     protected $ModelAgama;

    public function __construct() 
    {
        $this->ModelAgama = new ModelAgama();
        helper('form');
    }
    public function index()
    {
        $data = [
            'title' => 'PPDB Online',
            'subtitle' => 'Agama',
            'Agama' => $this->ModelAgama->getAllData(),
        ];
        return view('admin/v_agama', $data);
    }

    public function insertData()
    {
        $data = [
            'agama' => $this->request->getPost('agama'), // fix here
        ];
        $this->ModelAgama->insertData($data); // pastikan method ini ada
        session()->setFlashdata('tambah', 'Data berhasil ditambahkan.');
        return redirect()->to(base_url('agama')); // fix redirect
    }

    public function editData($id_agama)
{
    $data = [
        'agama' => $this->request->getPost('agama'),
    ];
    $this->ModelAgama->editData($id_agama, $data);
    session()->setFlashdata('edit', 'Data Berhasil Di Edit !!!');
    return redirect()->to('/agama');
}

public function deleteData($id_agama)
{
    $this->ModelAgama->deleteData($id_agama);
    session()->setFlashdata('delete', 'Data berhasil dihapus!');
    return redirect()->to('/agama');
}
}
