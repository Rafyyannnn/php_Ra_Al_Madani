<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelAdmin;
use CodeIgniter\HTTP\ResponseInterface;

class Admin extends BaseController
{
    protected $ModelAdmin;

    public function __construct()
    {
        helper('form');
        $this->ModelAdmin = new ModelAdmin();
    }

    public function index()
    {
        $data = [
            'title' => 'PPDB Online',
            'subtitle' => 'Admin',
        ];
        return view('Admin/v_dashboard', $data);
    }

    public function setting()
    {
        $data = [
            'title' => 'PPDB Online',
            'subtitle' => 'Setting',
            'setting' => $this->ModelAdmin->detailSetting(),
        ];
        return view('Admin/v_setting', $data);
    }

    public function saveSetting()
    {
        $file = $this->request->getFile('logo');

        // Jika logo tidak diganti
        if ($file && $file->getError() == 4) {
            $data = [
                'nama_sekolah' => $this->request->getPost('nama_sekolah'),
                'alamat' => $this->request->getPost('alamat'),
                'kecamatan' => $this->request->getPost('kecamatan'),
                'kabupaten' => $this->request->getPost('kabupaten'),
                'provinsi' => $this->request->getPost('provinsi'),
                'no_telpon' => $this->request->getPost('no_telpon'),
                'email' => $this->request->getPost('email'),
                'web' => $this->request->getPost('web'),
                'deskripsi' => $this->request->getPost('deskripsi'),
            ];
            $this->ModelAdmin->saveSetting($data);
        } else {
            // Jika logo diganti
            if ($file && $file->isValid() && !$file->hasMoved()) {
                $ext = $file->getClientExtension();
                $allowedExt = ['jpg', 'jpeg', 'png', 'gif'];
                $maxSize = 2 * 1024 * 1024; // 2MB

                // Validasi ekstensi
                if (!in_array(strtolower($ext), $allowedExt)) {
                    session()->setFlashdata('pesan', 'Format logo harus JPG, JPEG, PNG, atau GIF!');
                    return redirect()->to('/Admin/setting');
                }

                // Validasi ukuran
                if ($file->getSize() > $maxSize) {
                    session()->setFlashdata('pesan', 'Ukuran logo maksimal 2MB!');
                    return redirect()->to('/Admin/setting');
                }

                $nama_file = $file->getRandomName();

                if ($file->move('logo/', $nama_file)) {
                    // Hapus logo lama
                    $setting = $this->ModelAdmin->detailSetting();
                    if (!empty($setting['logo']) && file_exists('./logo/' . $setting['logo'])) {
                        unlink('./logo/' . $setting['logo']);
                    }

                    $data = [
                        'nama_sekolah' => $this->request->getPost('nama_sekolah'),
                        'alamat' => $this->request->getPost('alamat'),
                        'kecamatan' => $this->request->getPost('kecamatan'),
                        'kabupaten' => $this->request->getPost('kabupaten'),
                        'provinsi' => $this->request->getPost('provinsi'),
                        'no_telpon' => $this->request->getPost('no_telpon'),
                        'email' => $this->request->getPost('email'),
                        'web' => $this->request->getPost('web'),
                        'deskripsi' => $this->request->getPost('deskripsi'),
                        'logo' => $nama_file,
                    ];
                    $this->ModelAdmin->saveSetting($data);
                } else {
                    session()->setFlashdata('pesan', 'Gagal upload logo baru!');
                    return redirect()->to('/Admin/setting');
                }
            }
        }

        session()->setFlashdata('pesan', 'Settingan Berhasil Di Ganti !!!');
        return redirect()->to('/Admin/setting');
    }

    public function beranda()
    {
        $data = [
            'title' => 'PPDB Online',
            'subtitle' => 'Beranda',
            'beranda' => $this->ModelAdmin->detailSetting(),
        ];
        return view('Admin/v_beranda', $data);
    }

    public function saveBeranda()
    {
        $data = [
            'beranda' => $this->request->getPost('beranda'),
        ];
        $this->ModelAdmin->saveSetting($data);
        session()->setFlashdata('pesan', 'Beranda Berhasil Diganti...!!!');
        return redirect()->to('/Admin/Beranda');
    }
}
