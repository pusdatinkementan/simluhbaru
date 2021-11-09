<?php

namespace App\Controllers\profil;

use App\Controllers\BaseController;
use App\Models\penyuluh\PenyuluhTHLAPBDKecModel;

class PenyuluhTHLAPBDKec extends BaseController
{
    protected $session;
    function __construct()
    {
        $this->session = \Config\Services::session();
        $this->session->start();
    }

    public function detail($nik)
    {
        $penyuluhmodel = new PenyuluhTHLAPBDKecModel();
        $dtpenyuluh = $penyuluhmodel->getDetailPenyuluhTHLAPBDKecByNIK($nik);
        $data = [
            'title' => 'Profil penyuluh',
            'dt' => $dtpenyuluh
        ];

        //dd($data);

        return view('profil/profilpenyuluhthlapbn', $data);
    }
}
