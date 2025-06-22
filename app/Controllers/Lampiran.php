<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelLampiran;

class Lampiran extends BaseController
{
     protected $ModelLampiran;

    public function __construct() 
    {
        $this->ModelLampiran = new ModelLampiran();
        helper('form');
    }
    public function index()
    {
        $data = [
            'title' => 'PPDB Online',
            'subtitle' => 'Lampiran',
            'Lampiran' => $this->ModelLampiran->getAllData(),
        ];
        return view('admin/v_lampiran', $data);
    }

    public function insertData()
    {
        $data = [
            'lampiran' => $this->request->getPost('lampiran'), // fix here
        ];
        $this->ModelLampiran->insertData($data); // pastikan method ini ada
        session()->setFlashdata('tambah', 'Data berhasil ditambahkan.');
        return redirect()->to(base_url('lampiran')); // fix redirect
    }

    public function editData($id_lampiran)
{
    $data = [
        'lampiran' => $this->request->getPost('lampiran'),
    ];
    $this->ModelLampiran->editData($id_lampiran, $data);
    session()->setFlashdata('edit', 'Data Berhasil Di Edit !!!');
    return redirect()->to('/lampiran');
}

public function deleteData($id_lampiran)
{
    $this->ModelLampiran->deleteData($id_lampiran);
    session()->setFlashdata('delete', 'Data berhasil dihapus!');
    return redirect()->to('/lampiran');
}
}
