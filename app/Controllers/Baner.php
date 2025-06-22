<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelBaner;

class Baner extends BaseController
{
    protected $ModelBaner;

    public function __construct()
    {
        $this->ModelBaner = new ModelBaner();
        helper(['form', 'url']);
    }

    public function index()
    {
        $data = [
            'title'    => 'PPDB Online',
            'subtitle' => 'Baner',
            'baner'    => $this->ModelBaner->getAllData(),
        ];
        return view('admin/v_baner', $data);
    }

    public function insertData()
    {
        $validation = $this->validate([
            'baner' => [
                'label' => 'File Banner',
                'rules' => 'uploaded[baner]|mime_in[baner,image/png,image/jpeg,image/jpg]|max_size[baner,2048]',
                'errors' => [
                    'uploaded' => '{field} wajib diunggah.',
                    'mime_in'  => '{field} harus berupa gambar (jpg/jpeg/png).',
                    'max_size' => '{field} maksimal 2MB.',
                ]
            ]
        ]);

        if (!$validation) {
            return redirect()->back()->withInput()->with('error', $this->validator->getErrors());
        }

        $file     = $this->request->getFile('baner');
        $namaFile = $file->getRandomName();
        $file->move('banner/', $namaFile);

        $data = [
            'ket'   => $this->request->getPost('ket'),
            'baner' => $namaFile,
        ];

        $this->ModelBaner->insertData($data);

        session()->setFlashdata('tambah', 'Data berhasil ditambahkan!');
        return redirect()->to(base_url('baner'));
    }

    public function editData($id_baner)
    {
        $banerLama = $this->ModelBaner->find($id_baner);
        $file      = $this->request->getFile('baner');

        if ($file && $file->getError() == 4) {
            // Tidak ada file baru diupload
            $data = [
                'id_baner' => $id_baner,
                'ket'      => $this->request->getPost('ket'),
            ];
        } else {
            // Validasi file baru
            $validation = $this->validate([
                'baner' => [
                    'label' => 'File Banner',
                    'rules' => 'mime_in[baner,image/png,image/jpeg,image/jpg]|max_size[baner,2048]',
                    'errors' => [
                        'mime_in'  => '{field} harus berupa gambar (jpg/jpeg/png).',
                        'max_size' => '{field} maksimal 2MB.',
                    ]
                ]
            ]);

            if (!$validation) {
                return redirect()->back()->withInput()->with('error', $this->validator->getErrors());
            }

            $namaFile = $file->getRandomName();
            $file->move('banner/', $namaFile);

            // Hapus file lama jika ada
            if (!empty($banerLama['baner']) && file_exists('banner/' . $banerLama['baner'])) {
                unlink('banner/' . $banerLama['baner']);
            }

            $data = [
                'id_baner' => $id_baner,
                'ket'      => $this->request->getPost('ket'),
                'baner'    => $namaFile,
            ];
        }

        $this->ModelBaner->editData($id_baner, $data);

        session()->setFlashdata('edit', 'Data berhasil diperbarui!');
        return redirect()->to(base_url('baner'));
    }

    public function deleteData($id_baner)
    {
        $baner = $this->ModelBaner->find($id_baner);

        if ($baner) {
            if (!empty($baner['baner']) && is_file('banner/' . $baner['baner'])) {
                unlink('banner/' . $baner['baner']);
            }

            $this->ModelBaner->deleteData($id_baner);

            session()->setFlashdata('delete', 'Data berhasil dihapus!');
        }

        return redirect()->to(base_url('baner'));
    }
}
