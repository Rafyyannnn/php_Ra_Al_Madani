<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelUser;

class User extends BaseController
{
     protected $ModelUser;

    public function __construct() 
    {
        $this->ModelUser = new ModelUser();
        helper('form');
    }
    public function index()
    {
        $data = [
            'title' => 'PPDB Online',
            'subtitle' => 'User',
            'user' => $this->ModelUser->getAllData(),
        ];
        return view('admin/v_user', $data);
    }

    public function insertData()
{
    $file = $this->request->getFile('foto'); // ✅ Perbaikan di sini
    $nama_file = $file->getRandomName();
    $data = [
        'nama_user' => $this->request->getPost('nama_user'),
        'email'     => $this->request->getPost('email'),
        'password'  => $this->request->getPost('password'),
        'foto'      => $nama_file
    ];
    // upload file foto
    $file->move('foto/', $nama_file);

    $this->ModelUser->insertData($data);
    session()->setFlashdata('tambah', 'Data berhasil ditambahkan.');
    return redirect()->to(base_url('user'));
}


    public function editData($id_user)
{
    $file = $this->request->getFile('foto');

    if ($file->getError() == 4) {
        // Jika tidak ada file diupload
        $data = [
            'id_user'    => $id_user,
            'nama_user'  => $this->request->getPost('nama_user'),
            'email'      => $this->request->getPost('email'),
            'password'   => $this->request->getPost('password'),
        ];
    } else {
        $user = $this->ModelUser->detailData($id_user);
        if ($user['foto'] != '') {
            unlink('./foto/' . $user['foto']);
        }
        // Jika ada file diupload
        $nama_file = $file->getRandomName();
        $file->move('foto/', $nama_file);

        $data = [
            'id_user'    => $id_user,
            'nama_user'  => $this->request->getPost('nama_user'),
            'email'      => $this->request->getPost('email'),
            'password'   => $this->request->getPost('password'),
            'foto'       => $nama_file,
        ];
    }

    $this->ModelUser->editData($id_user, $data);
    session()->setFlashdata('edit', 'Data Berhasil Di Edit !!!');
    return redirect()->to('/user');
}

public function deleteData($id_user)
{
    $user = $this->ModelUser->detailData($id_user);
        if ($user['foto'] != '') {
            unlink('./foto/' . $user['foto']);
        }
        $data = [
            'id_user' => $id_user,
    ];
    $this->ModelUser->deleteData($data);
    session()->setFlashdata('delete', 'Data berhasil dihapus!!!');
    return redirect()->to('/user');
}

}
