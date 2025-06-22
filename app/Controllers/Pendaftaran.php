<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelTa;
use App\Models\ModelSiswa;

class Pendaftaran extends BaseController
{
    protected $ModelTa;
    protected $ModelSiswa;

    public function __construct()
    {
        helper('form');
        $this->ModelTa = new ModelTa();
        $this->ModelSiswa = new ModelSiswa();
    }

    public function index()
{
    
    $data = [
        'title'    => 'PPDB Online',
        'subtitle' => 'Pendaftaran',
        'ta'       => $this->ModelTa->statusTa(),
        'validation' => \Config\Services::validation(),
    ];
    return view('v_pendaftaran', $data);
}


    public function simpanPendaftaran()
    {
        if ($this->validate([
            'ids' => [
                'label'  => 'ID Siswa',
                'rules'  => 'required|regex_match[/^RA[0-9]{8}$/]|is_unique[tbl_siswa.ids]',
                'errors' => [
                    'required'    => '{field} Wajib Di Isi !!',
                    'regex_match' => '{field} Harus diawali "RA" dan diikuti 8 digit angka (contoh: RA20250521)',
                    'is_unique'   => '{field} Ini Sudah Terdaftar!!',
                ]
            ],
            'nama_lengkap' => [
                'label'  => 'Nama Lengkap',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib Di Isi !!'
                ]
            ],
            'nama_panggilan' => [
                'label'  => 'Nama Panggilan',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib Di Isi !!'
                ]
            ],
            'tempat_lahir' => [
                'label'  => 'Tempat Lahir',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib Di Isi !!'
                ]
            ],
            'jk' => [
                'label'  => 'Jenis Kelamin',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib Di Isi !!'
                ]
            ],
            'tanggal' => [
                'label'  => 'Tanggal',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib Di Isi !!'
                ]
            ],
            'bulan' => [
                'label'  => 'Bulan',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib Di Isi !!'
                ]
            ],
            'tahun' => [
                'label'  => 'Tahun',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib Di Isi !!'
                ]
            ],
        ])) {
            // Ambil data tanggal
            $no_pendaftaran = $this->ModelSiswa->noPendaftaran();
            $tahun   = $this->request->getPost('tahun');
            $bulan   = str_pad($this->request->getPost('bulan'), 2, '0', STR_PAD_LEFT);
            $tanggal = str_pad($this->request->getPost('tanggal'), 2, '0', STR_PAD_LEFT);
            
            // Validasi tanggal secara logika
            if (!checkdate((int)$bulan, (int)$tanggal, (int)$tahun)) {
                return redirect()->to('/pendaftaran')
                    ->withInput()
                    ->with('validation', \Config\Services::validation()->setError('tanggal', 'Tanggal tidak valid.'));
            }

            $data = [
                'no_pendaftaran' => $no_pendaftaran,
                'tgl_pendaftaran' => date('Y-m-d'),
                'ids'           => $this->request->getPost('ids'),
                'nama_lengkap'  => $this->request->getPost('nama_lengkap'),
                'nama_panggilan'=> $this->request->getPost('nama_panggilan'),
                'tempat_lahir'  => $this->request->getPost('tempat_lahir'),
                'jk'  => $this->request->getPost('jk'),
                'tgl_lahir' => "$tahun-$bulan-$tanggal",
                'password' => $tanggal . $bulan . $tahun,
            ];

            // Simpan data (pastikan fungsi insertData ada, jika tidak gunakan insert())
            $this->ModelSiswa->insert($data);

            session()->setFlashdata('pesan', 'Pendaftaran Berhasil, Silahkan Login Untuk Melengkapi Data!');
            return redirect()->to('/pendaftaran');
        } else {
            // Jika validasi gagal
            return redirect()->to('/pendaftaran')
                ->withInput()
                ->with('validation', \Config\Services::validation());
        }
    }
}
