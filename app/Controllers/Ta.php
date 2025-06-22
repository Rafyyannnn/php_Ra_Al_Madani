<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelTa;

class Ta extends BaseController
{
     protected $ModelTa;

    public function __construct() 
    {
        $this->ModelTa = new ModelTa();
        helper('form');
    }
    public function index()
    {
        $data = [
            'title' => 'PPDB Online',
            'subtitle' => 'Tahun Ajaran',
            'ta' => $this->ModelTa->getAllData(),
        ];
        return view('admin/v_ta', $data);
    }

    public function insertData()
    {
        $data = [
            'ta' => $this->request->getPost('ta'), 
            'tahun' => $this->request->getPost('tahun'),
        ];
        $this->ModelTa->insertData($data); // pastikan method ini ada
        session()->setFlashdata('tambah', 'Data berhasil ditambahkan.');
        return redirect()->to(base_url('ta')); // fix redirect
    }

    public function editData($id_ta)
    {
    $data = [
        'id_ta' => $id_ta,
        'ta' => $this->request->getPost('ta'),
        'tahun' => $this->request->getPost('tahun'),
    ];
    $this->ModelTa->editData($id_ta, $data);
    session()->setFlashdata('edit', 'Data Berhasil Di Edit !!!');
    return redirect()->to('/ta');
}

public function deleteData($id_ta)
{
    $this->ModelTa->deleteData($id_ta);
    session()->setFlashdata('delete', 'Data berhasil dihapus!');
    return redirect()->to('/ta');
}
public function statusAktif($id_ta)
{
    $data = [
        'id_ta' => $id_ta,
        'status' => 1
    ];
    $this->ModelTa->resetStatus();
    $this->ModelTa->editData($id_ta, $data);  // Ganti dari insertData ke editData
    session()->setFlashdata('tambah', 'Status Tahun Ajaran berhasil Diganti');
    return redirect()->to(base_url('ta'));
}

public function statusNonAktif($id_ta)
{
    $data = [
        'id_ta' => $id_ta,
        'status' => 0
    ];
    $this->ModelTa->editData($id_ta, $data);  // Ganti dari insertData ke editData
    session()->setFlashdata('tambah', 'Status Tahun Ajaran berhasil Diganti');
    return redirect()->to(base_url('ta'));
}

}