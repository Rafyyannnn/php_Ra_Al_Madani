<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Siswa extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'PPDB Online',
            'subtitle' => 'Siswa',
        ];
        return view('siswa/v_dashboard', $data);
    }
}
