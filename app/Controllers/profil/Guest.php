<?php

namespace App\Controllers\profil;

use App\Controllers\BaseController;
use App\Models\Guest\GuestModel;
use App\Models\KelembagaanPenyuluhan\Kecamatan\KecamatanModel;

use PhpOffice\PhpSpreadsheet\Spreadsheet;

use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Guest extends BaseController
{
    protected $session;

    function __construct()
    {
        $this->session = \Config\Services::session();
        $this->session->start();
        helper('autentikasi');

        $this->model = new GuestModel();
    }

    public function daftarkelembagaan()
    {

        $gmodel = new GuestModel();

        $rlprov = $gmodel->getDaftarKelembagaanProv();
        $data = [
            'title' => 'Rekap Kelembagaan Provinsi',
            'rlprov' => $rlprov['rlprov']
        ];
        // dd($data);

        return view('guest/daftarkelembagaan', $data);
    }

    public function daftarkelembagaankab()
    {
        $gmodel = new GuestModel();
        $get_param = $this->request->getGet();
        $kode_prop = $get_param['kode_prop'];

        $rlkab = $gmodel->getDaftarKelembagaanKab($kode_prop);
        $data = [
            'title' => 'Rekap Kelembagaan Kabupaten',
            'rlkab' => $rlkab['rlkab']
        ];
        // dd($data);
        return view('guest/daftarkelembagaankab', $data);
    }

    public function daftarkelembagaankec()
    {
        $gmodel = new GuestModel();
        $get_param = $this->request->getGet();
        $kode_kab = $get_param['kode_kab'];

        $rlkec = $gmodel->getDaftarKelembagaanKec($kode_kab);
        $data = [
            'title' => 'Rekap Kelembagaan Kabupaten',
            'rlkec' => $rlkec['rlkec']
        ];
        // dd($data);
        return view('guest/daftarkelembagaankec', $data);
    }

    public function profilbpp()
    {
        $kec_model = new KecamatanModel();
        $gmodel = new GuestModel();

        // $kode_kab = session()->get('kodebapel');
        // 


        $get_param = $this->request->getGet();
        $kode_bpp = $get_param['kodebpp'];
        $kode_kec = $get_param['kode_kec'];

        $profilkec = $gmodel->getProfilBPP($kode_kec, $kode_bpp);
        $wilkec = $kec_model->getWIlkec($kode_kec, $kode_bpp);;
        $penyuluhPNS = $kec_model->getPenyuluhPNS(session()->get('kodebapel'));
        $penyuluhTHL = $kec_model->getPenyuluhTHL(session()->get('kodebapel'));
        $kec = $kec_model->getKec(session()->get('kodebapel'));
        $fasdata = $kec_model->getFas($kode_kec, $kode_bpp);
        $klas = $kec_model->getKlasifikasi($kode_kec, $kode_bpp);
        $award = $kec_model->getAward($kode_kec, $kode_bpp);
        $dana = $kec_model->getDana($kode_kec, $kode_bpp);
        $potensi = $kec_model->getPotensiWilayah($kode_kec, $kode_bpp);
        $jenis_komoditas = $kec_model->getJenisKomoditas();
        $penyuluh = $kec_model->getPenyuluh($kode_kec);
        $bp = $kec_model->getBP3K($kode_kec);

        $data = [
            'title' => 'Profil BPP',
            'bp' => $bp['kode_bp3k'],
            'dt' => $profilkec,
            'wilkec' => $wilkec['wilkec'],
            'fasdata' => $fasdata['fasdata'],
            'penyuluhPNS' => $penyuluhPNS,
            'penyuluhTHL' => $penyuluhTHL,
            'jenis_komoditas' => $jenis_komoditas,
            'kode_kec' => $kode_kec,
            'klas' => $klas['klas'],
            'penghargaan' => $award['penghargaan'],
            'dana' => $dana['dana'],
            'potensi' => $potensi['potensi'],
            'pns_kec' => $penyuluh['pns_kec'],
            'thl_kec' => $penyuluh['thl_kec'],
            'swa_kec' => $penyuluh['swa_kec'],
            'p3k_kec' => $penyuluh['p3k_kec'],
            'swasta_kec' => $penyuluh['swasta_kec'],
            'kec' => $kec
        ];
        return view('guest/profilebpp', $data);
    }

    public function rekapkeluh()
    {
        $gmodel = new GuestModel();

        $rekapluh = $gmodel->getRekapKeluh();
        $data = [
            'title' => 'Rekap Kelembagaan Penyuluhan',
            'rkeluh' => $rekapluh['rkeluh'],
        ];
        return view('guest/rekap_keluh', $data);
    }

    public function rekapkeluhkec()
    {
        $gmodel = new GuestModel();

        $get_param = $this->request->getGet();
        $kode_prop = $get_param['kode_prop'];

        $rekapluhkec = $gmodel->getRekapKeluhKec($kode_prop);
        $data = [
            'title' => 'Rekap Kelembagaan Penyuluhan',
            'namaprov' => $rekapluhkec['namaprov'],
            'rkeluhkec' => $rekapluhkec['rkeluhkec']
        ];
        return view('guest/rekap_keluhkec', $data);
    }

    public function rekapkelembagaan()
    {

        $gmodel = new GuestModel();

        $rlprov = $gmodel->getRekapKelembagaan();
        $data = [
            'title' => 'Rekap Kelembagaan Provinsi',
            'rlprov' => $rlprov['rlprov']
        ];
        // dd($data);

        return view('guest/rekapkelembagaan', $data);
    }

    public function rekapbpp()
    {
        $gmodel = new GuestModel();

        $get_param = $this->request->getGet();
        $kode_prop = $get_param['kode_prop'];

        $rkbpp = $gmodel->getRekapBPP($kode_prop);
        $data = [
            'title' => 'Rekap Profil BPP',
            'namaprov' => $rkbpp['namaprov'],
            'rkbpp' => $rkbpp['rkbpp']
        ];
        return view('guest/rekap_bpp', $data);
    }

    public function rekapprofbpp()
    {
        $gmodel = new GuestModel();

        $get_param = $this->request->getGet();
        $kode_kab = $get_param['kode_kab'];

        $rpbpp = $gmodel->getRekapProfBPP($kode_kab);
        $data = [
            'title' => 'Rekap Profil BPP',
            'namaprov' => $rpbpp['namaprov'],
            'namakab' => $rpbpp['namakab'],
            'rpbpp' => $rpbpp['rpbpp']
        ];
        return view('guest/rekap_profbpp', $data);
    }

    public function rekapexcbpp()
    {
        $gmodel = new GuestModel();


        $prov = $gmodel->getProv();
        $data = [
            'title' => 'Rekap Profil BPP',
            'prov' => $prov
        ];
        return view('guest/rekapbpp_excel', $data);
    }

    public function rekappowil()
    {
        $gmodel = new GuestModel();


        $prov = $gmodel->getProv();
        $data = [
            'title' => 'Rekap Potensi Wilayah',
            'prov' => $prov
        ];
        return view('guest/rekap_powil', $data);
    }

    public function showKab($idprop)
    {

        $data['q'] = $this->model->getKab($idprop);

        foreach ($data['q'] as $dtKab) {

            echo '<option value="' . $dtKab['id_dati2'] . '">' . $dtKab['nama_dati2'] . '</option>';
        }
    }

    public function showBpp($idkab)
    {

        $data['q'] = $this->model->getBpp($idkab);

        foreach ($data['q'] as $dtBpp) {

            echo '<option value="' . $dtBpp['id'] . '">' . $dtBpp['nama_bpp'] . '</option>';
        }
    }
    public function showPowil($idbpp)
    {
        $data['q'] = $this->model->getPotensiWilayah($idbpp);

        $i = 1;
        foreach ($data['q'] as $dtBpp) {
            echo '<tr>
            <td align=center><font color=black face=verdana size=2>' . $i++ . '</font></td>
            <td bgcolor=#A5C677 width="70"><font color=black face=verdana size=2>' . $dtBpp['nama_komoditas'] . '</td>
            <td bgcolor=#A5C677 width="85" align="center"><font color=black face=verdana size=2>' . $dtBpp['luas_lhn'] . '</td>
            <td bgcolor=#A5C677 width="80" align="center"><font color=black face=verdana size=2>' . $dtBpp['luas_tnm'] . '</td>
            <td bgcolor=#A5C677 width="80" align="center"><font color=black face=verdana size=2>' . $dtBpp['luas_panen'] . '</td>
            <td bgcolor=#A5C677 width="80" align="center"><font color=black face=verdana size=2>' . $dtBpp['prod'] . '</td>
            <td bgcolor=#A5C677 width="80" align="center"><font color=black face=verdana size=2>' . $dtBpp['prov'] . '</td>
            <td bgcolor=#A5C677 width="80" align="center"><font color=black face=verdana size=2>' . $dtBpp['ip'] . '</td>
            </tr>';
        }
    }

    public function rekapexcbppex()
    {
        $gmodel = new GuestModel();


        $get_param = $this->request->getGet();
        $kode_prop = $get_param['kode_prop'];

        $bpp = $gmodel->getRekapBPPExcView($kode_prop);
        $data = [
            'title' => 'Rekap Profil BPP',
            'bpp' => $bpp['bpp']
        ];
        return view('guest/viewrekapbpp_excel', $data);
    }

    public function rekapbppexcel($kode_prop)
    {

        // $get_param = $this->request->getGet();
        // $kode_prop = $get_param['kode_prop'];

        $data['q'] = $this->model->getRekapBPPExc($kode_prop);

        $file_name = 'rekap_bpp.xlsx';

        $spreadsheet = new Spreadsheet();

        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setCellValue('A1', 'Kabupaten');
        $sheet->setCellValue('B1', 'WKBPP Kecamatan');
        $sheet->setCellValue('C1', 'BPP');
        $sheet->setCellValue('D1', 'Klasifikasi');
        $sheet->setCellValue('E1', 'Alamat');
        $sheet->setCellValue('F1', 'GPS Point');
        $sheet->setCellValue('G1', 'Nama Pimpinan');
        $sheet->setCellValue('H1', 'No HP');
        $sheet->setCellValue('I1', 'Email');
        $sheet->setCellValue('J1', 'Kondisi Bangunan');
        $sheet->setCellValue('K1', 'PC APBN');
        $sheet->setCellValue('L1', 'PC APBD');
        $sheet->setCellValue('M1', 'Laptop APBN');
        $sheet->setCellValue('N1', 'Laptop APBD');
        $sheet->setCellValue('O1', 'PNS');
        $sheet->setCellValue('P1', 'THL-TBPP');
        $sheet->setCellValue('Q1', 'Swadaya');
        $sheet->setCellValue('R1', 'Swasta');
        $sheet->setCellValue('S1', 'Poktan');
        $sheet->setCellValue('T1', 'Gapoktan');
        $sheet->setCellValue('U1', 'KEP');
        $sheet->setCellValue('V1', 'Lahan Demplot BPP');
        $sheet->setCellValue('W1', 'Lahan Demplot Petani');
        $rows = 2;

        foreach ($data['q'] as $val) {
            $sheet->setCellValue('A' . $rows, $val['nama_dati2']);

            $sheet->setCellValue('B' . $rows, $val['deskripsi']);

            $sheet->setCellValue('C' . $rows, $val['nama_bpp']);

            $sheet->setCellValue('D' . $rows, $val['klasifikasi']);
            $sheet->setCellValue('E' . $rows, $val['alamat']);
            $sheet->setCellValue('F' . $rows, $val['koordinat_lokasi_bpp']);
            $sheet->setCellValue('G' . $rows, $val['ketua']);
            $sheet->setCellValue('H' . $rows, $val['telp_hp']);
            $sheet->setCellValue('I' . $rows, $val['email']);
            $sheet->setCellValue('J' . $rows, $val['kondisi_bangunan']);
            $sheet->setCellValue('K' . $rows, $val['pc_apbn']);
            $sheet->setCellValue('L' . $rows, $val['pc_apbd']);
            $sheet->setCellValue('M' . $rows, $val['laptop_apbn']);
            $sheet->setCellValue('N' . $rows, $val['laptop_apbd']);
            $sheet->setCellValue('O' . $rows, $val['jumpns']);
            $sheet->setCellValue('P' . $rows, $val['jumthl']);
            $sheet->setCellValue('Q' . $rows, $val['jumswa']);
            $sheet->setCellValue('R' . $rows, $val['jumswas']);
            $sheet->setCellValue('S' . $rows, $val['jumpok']);
            $sheet->setCellValue('T' . $rows, $val['jumgap']);
            $sheet->setCellValue('U' . $rows, $val['jumkep']);
            $sheet->setCellValue('V' . $rows, $val['luas_lahan_bp3k']);
            $sheet->setCellValue('W' . $rows, $val['luas_lahan_petani']);

            $rows++;
        }
        $writer = new Xlsx($spreadsheet);

        $writer->save($file_name);

        header("Content-Type: application/vnd.ms-excel");

        header('Content-Disposition: attachment; filename="' . basename($file_name) . '"');

        header('Expires: 0');

        header('Cache-Control: must-revalidate');

        header('Pragma: public');

        header('Content-Length:' . filesize($file_name));

        flush();

        readfile($file_name);

        exit;
    }

    public function daftarketenagaan()
    {
        $gmodel = new GuestModel();

        // $get_param = $this->request->getGet();
        // $kode_kab = $get_param['kode_kab'];

        $dk = $gmodel->getDaftarKetenagaan();
        $data = [
            'title' => 'Rekap Ketenagaan Penyuluhan Tingkat Nasional',
            'jum_pusat' => $dk['jum_pusat'],
            'jum_pusatTB' => $dk['jum_pusatTB'],
            'jum_bp2tp' => $dk['jum_bp2tp'],
            'jum_bp2tp_TB' => $dk['jum_bp2tp_TB'],
            'dk' => $dk['dk']
        ];
        return view('guest/daftarketenagaan', $data);
    }

    public function bppsdmpaktif()
    {
        $gmodel = new GuestModel();

        // $get_param = $this->request->getGet();
        // $kode_kab = $get_param['kode_kab'];

        $bppsdmp = $gmodel->getBPPSDMP();
        $data = [
            'title' => 'Data BPPSDMP Aktif',
            'bppsdmp' => $bppsdmp['bppsdmp']
        ];
        return view('guest/BppsdmpAktif', $data);
    }

    public function bp2tpaktif()
    {
        $gmodel = new GuestModel();

        // $get_param = $this->request->getGet();
        // $kode_kab = $get_param['kode_kab'];

        $bp2tp = $gmodel->getBP2TP();
        $data = [
            'title' => 'Data BBP2TP Aktif',
            'bp2tp' => $bp2tp['bp2tp']
        ];
        return view('guest/Bp2tpAktif', $data);
    }

    public function bptpaktif()
    {
        $gmodel = new GuestModel();

        $get_param = $this->request->getGet();
        $kode_prop = $get_param['kode_prop'];

        $bptp = $gmodel->getBPTP($kode_prop);
        $data = [
            'title' => 'Data BPTP Aktif',
            'bptp' => $bptp['bptp']
        ];
        return view('guest/BptpAktif', $data);
    }

    public function daftarketenagaankab()
    {
        $gmodel = new GuestModel();


        $get_param = $this->request->getGet();
        $kode_prop = $get_param['kode_prop'];

        $dk = $gmodel->getDaftarKetenagaanKab($kode_prop);
        $data = [
            'title' => 'Rekap Ketenagaan Penyuluhan Tingkat Kabupaten/Kota',
            'namaprov' => $dk['namaprov'],
            'id_prop' => $dk['id_prop'],
            'jum_bptp' => $dk['jum_bptp'],
            'jum_bptp_TB' => $dk['jum_bptp_TB'],
            'dk' => $dk['dk']
        ];
        return view('guest/daftarketenagaan_kab', $data);
    }

    public function pnsaktif()
    {
        $gmodel = new GuestModel();

        $get_param = $this->request->getGet();
        $kode_kab = $get_param['kode_kab'];

        $pns = $gmodel->getPNS($kode_kab);
        $data = [
            'title' => 'Data PNS Aktif',
            'namakab' => $pns['namakab'],
            'pns' => $pns['pns']
        ];
        return view('guest/PnsAktif', $data);
    }

    public function pnsaktifkab()
    {
        $gmodel = new GuestModel();

        $get_param = $this->request->getGet();
        $kode_kab = $get_param['kode_kab'];

        $pns = $gmodel->getPNSKab($kode_kab);
        $data = [
            'title' => 'Data PNS Aktif',
            'namakab' => $pns['namakab'],
            'pns' => $pns['pns']
        ];
        return view('guest/PnsAktif', $data);
    }

    public function thlapbn()
    {
        $gmodel = new GuestModel();

        $get_param = $this->request->getGet();
        $kode_kab = $get_param['kode_kab'];

        $thlapbn = $gmodel->getTHLAPBN($kode_kab);
        $data = [
            'title' => 'Data Dasar Penyuluh Pertanian THL-TB (APBN)',
            'namakab' => $thlapbn['namakab'],
            'thlapbn' => $thlapbn['thlapbn']
        ];
        return view('guest/ThlApbn', $data);
    }

    public function thlapbn1()
    {
        $gmodel = new GuestModel();

        $get_param = $this->request->getGet();
        $kode_kab = $get_param['kode_kab'];

        $thlapbn = $gmodel->getTHLAPBN1($kode_kab);
        $data = [
            'title' => 'Data Dasar Penyuluh Pertanian THL-TB (APBN)',
            'namakab' => $thlapbn['namakab'],
            'thlapbn' => $thlapbn['thlapbn']
        ];
        return view('guest/ThlApbn', $data);
    }

    public function thlapbn2()
    {
        $gmodel = new GuestModel();

        $get_param = $this->request->getGet();
        $kode_kab = $get_param['kode_kab'];

        $thlapbn = $gmodel->getTHLAPBN2($kode_kab);
        $data = [
            'title' => 'Data Dasar Penyuluh Pertanian THL-TB (APBN)',
            'namakab' => $thlapbn['namakab'],
            'thlapbn' => $thlapbn['thlapbn']
        ];
        return view('guest/ThlApbn', $data);
    }

    public function thlapbn3()
    {
        $gmodel = new GuestModel();

        $get_param = $this->request->getGet();
        $kode_kab = $get_param['kode_kab'];

        $thlapbn = $gmodel->getTHLAPBN3($kode_kab);
        $data = [
            'title' => 'Data Dasar Penyuluh Pertanian THL-TB (APBN)',
            'namakab' => $thlapbn['namakab'],
            'thlapbn' => $thlapbn['thlapbn']
        ];
        return view('guest/ThlApbn', $data);
    }

    public function thlapbnslta()
    {
        $gmodel = new GuestModel();

        $get_param = $this->request->getGet();
        $kode_kab = $get_param['kode_kab'];

        $thlapbn = $gmodel->getTHLAPBNslta($kode_kab);
        $data = [
            'title' => 'Data Dasar Penyuluh Pertanian THL-TB (APBN)',
            'namakab' => $thlapbn['namakab'],
            'thlapbn' => $thlapbn['thlapbn']
        ];
        return view('guest/ThlApbn', $data);
    }

    public function thlapbnd3()
    {
        $gmodel = new GuestModel();

        $get_param = $this->request->getGet();
        $kode_kab = $get_param['kode_kab'];

        $thlapbn = $gmodel->getTHLAPBNd3($kode_kab);
        $data = [
            'title' => 'Data Dasar Penyuluh Pertanian THL-TB (APBN)',
            'namakab' => $thlapbn['namakab'],
            'thlapbn' => $thlapbn['thlapbn']
        ];
        return view('guest/ThlApbn', $data);
    }

    public function thlapbnd4()
    {
        $gmodel = new GuestModel();

        $get_param = $this->request->getGet();
        $kode_kab = $get_param['kode_kab'];

        $thlapbn = $gmodel->getTHLAPBNd4($kode_kab);
        $data = [
            'title' => 'Data Dasar Penyuluh Pertanian THL-TB (APBN)',
            'namakab' => $thlapbn['namakab'],
            'thlapbn' => $thlapbn['thlapbn']
        ];
        return view('guest/ThlApbn', $data);
    }

    public function thlapbns1()
    {
        $gmodel = new GuestModel();

        $get_param = $this->request->getGet();
        $kode_kab = $get_param['kode_kab'];

        $thlapbn = $gmodel->getTHLAPBNs1($kode_kab);
        $data = [
            'title' => 'Data Dasar Penyuluh Pertanian THL-TB (APBN)',
            'namakab' => $thlapbn['namakab'],
            'thlapbn' => $thlapbn['thlapbn']
        ];
        return view('guest/ThlApbn', $data);
    }

    public function thlapbns2()
    {
        $gmodel = new GuestModel();

        $get_param = $this->request->getGet();
        $kode_kab = $get_param['kode_kab'];

        $thlapbn = $gmodel->getTHLAPBNs2($kode_kab);
        $data = [
            'title' => 'Data Dasar Penyuluh Pertanian THL-TB (APBN)',
            'namakab' => $thlapbn['namakab'],
            'thlapbn' => $thlapbn['thlapbn']
        ];
        return view('guest/ThlApbn', $data);
    }

    public function thlapbnk35()
    {
        $gmodel = new GuestModel();

        $get_param = $this->request->getGet();
        $kode_kab = $get_param['kode_kab'];
        $tahun_today = date('Y') - 35;

        $thlapbn = $gmodel->getTHLAPBNk35($kode_kab, $tahun_today);
        $data = [
            'title' => 'Data Dasar Penyuluh Pertanian THL-TB (APBN)',
            'namakab' => $thlapbn['namakab'],
            'thlapbn' => $thlapbn['thlapbn']
        ];
        return view('guest/ThlApbn', $data);
    }

    public function thlapbnl35()
    {
        $gmodel = new GuestModel();

        $get_param = $this->request->getGet();
        $kode_kab = $get_param['kode_kab'];
        $tahun_today = date('Y') - 35;

        $thlapbn = $gmodel->getTHLAPBNl35($kode_kab, $tahun_today);
        $data = [
            'title' => 'Data Dasar Penyuluh Pertanian THL-TB (APBN)',
            'namakab' => $thlapbn['namakab'],
            'thlapbn' => $thlapbn['thlapbn']
        ];
        return view('guest/ThlApbn', $data);
    }

    public function thlapbd()
    {
        $gmodel = new GuestModel();

        $get_param = $this->request->getGet();
        $kode_kab = $get_param['kode_kab'];

        $thlapbd = $gmodel->getTHLAPBD($kode_kab);
        $data = [
            'title' => 'Data Dasar Penyuluh Pertanian THL-TB (APBD)',
            'namakab' => $thlapbd['namakab'],
            'thlapbd' => $thlapbd['thlapbd']
        ];
        return view('guest/ThlApbd', $data);
    }

    public function swadaya()
    {
        $gmodel = new GuestModel();

        $get_param = $this->request->getGet();
        $kode_kab = $get_param['kode_kab'];

        $swadaya = $gmodel->getSwadaya($kode_kab);
        $data = [
            'title' => 'Data Dasar Penyuluh Pertanian Swadaya',
            'namakab' => $swadaya['namakab'],
            'swadaya' => $swadaya['swadaya']
        ];
        return view('guest/Swadaya', $data);
    }

    public function daftarketenagaankec()
    {
        $gmodel = new GuestModel();

        $get_param = $this->request->getGet();
        $kode_kab = $get_param['kode_kab'];

        $dkkec = $gmodel->getDaftarKetenagaanKec($kode_kab);
        $data = [
            'title' => 'Rekap Ketenagaan Penyuluhan Tingkat Kecamatan',
            'namakab' => $dkkec['namakab'],
            'id_dati2' => $dkkec['id_dati2'],
            'pns' => $dkkec['pns'],
            'pnsTB' => $dkkec['pnsTB'],
            'p3k' => $dkkec['p3k'],
            'thl_apbn' => $dkkec['thl_apbn'],
            'thl_apbd' => $dkkec['thl_apbd'],
            'swa' => $dkkec['swa'],
            'swasta' => $dkkec['swasta'],
            'dkkec' => $dkkec['dkkec']
        ];
        return view('guest/daftarketenagaan_kec', $data);
    }

    public function daftarpenyuluh()
    {
        $gmodel = new GuestModel();

        $get_param = $this->request->getGet();
        $kode_kec = $get_param['kode_kec'];

        $dp = $gmodel->getDaftPenyuluh($kode_kec);
        $data = [
            'title' => 'Data Dasar Penyuluh Pertanian',
            'nama_bpp' => $dp['nama_bpp'],
            'pns' => $dp['pns'],
            'p3k' => $dp['p3k'],
            'thl_apbn' => $dp['thl_apbn'],
            'thl_apbd' => $dp['thl_apbd'],
            'swa' => $dp['swa']
        ];
        return view('guest/daftpenyuluh', $data);
    }

    public function rekaptngumur()
    {
        $gmodel = new GuestModel();

        $tahun_today = date('Y') - 53;
        $tahun_today54 = date('Y') - 54;
        $tahun_today55 = date('Y') - 55;
        $tahun_today56 = date('Y') - 56;
        $tahun_today57 = date('Y') - 57;
        $tahun_today58 = date('Y') - 58;
        $tahun_today59 = date('Y') - 59;
        $tahun_today60 = date('Y') - 60;
        $tahun_today0 = date('Y') - 0;

        $rtu53 = $gmodel->getRekapTngUmur53($tahun_today);
        $rtu54 = $gmodel->getRekapTngUmur54($tahun_today54);
        $rtu55 = $gmodel->getRekapTngUmur55($tahun_today55);
        $rtu56 = $gmodel->getRekapTngUmur56($tahun_today56);
        $rtu57 = $gmodel->getRekapTngUmur57($tahun_today57);
        $rtu58 = $gmodel->getRekapTngUmur58($tahun_today58);
        $rtu59 = $gmodel->getRekapTngUmur59($tahun_today59);
        $rtu60 = $gmodel->getRekapTngUmur60($tahun_today60);
        $rtu0 = $gmodel->getRekapTngUmur0($tahun_today0);
        $data = [
            'title' => 'Rekap Ketenagaan Penyuluhan Tingkat Nasional (Berdasarkan Usia)',
            'pst_kurang_53' => $rtu53['pst_kurang_53'],
            'pst_pas_53' => $rtu53['pst_pas_53'],
            'prov_kurang_53' => $rtu53['prov_kurang_53'],
            'prov_pas_53' => $rtu53['prov_pas_53'],
            'kab_kurang_53' => $rtu53['kab_kurang_53'],
            'kab_pas_53' => $rtu53['kab_pas_53'],
            'bptp_kurang_53' => $rtu53['bptp_kurang_53'],
            'bptp_pas_53' => $rtu53['bptp_pas_53'],

            'pst_pas_54' => $rtu54['pst_pas_54'],
            'prov_pas_54' => $rtu54['prov_pas_54'],
            'kab_pas_54' => $rtu54['kab_pas_54'],
            'bptp_pas_54' => $rtu54['bptp_pas_54'],

            'pst_pas_55' => $rtu55['pst_pas_55'],
            'prov_pas_55' => $rtu55['prov_pas_55'],
            'kab_pas_55' => $rtu55['kab_pas_55'],
            'bptp_pas_55' => $rtu55['bptp_pas_55'],

            'pst_pas_56' => $rtu56['pst_pas_56'],
            'prov_pas_56' => $rtu56['prov_pas_56'],
            'kab_pas_56' => $rtu56['kab_pas_56'],
            'bptp_pas_56' => $rtu56['bptp_pas_56'],

            'pst_pas_57' => $rtu57['pst_pas_57'],
            'prov_pas_57' => $rtu57['prov_pas_57'],
            'kab_pas_57' => $rtu57['kab_pas_57'],
            'bptp_pas_57' => $rtu57['bptp_pas_57'],

            'pst_pas_58' => $rtu58['pst_pas_58'],
            'prov_pas_58' => $rtu58['prov_pas_58'],
            'kab_pas_58' => $rtu58['kab_pas_58'],
            'bptp_pas_58' => $rtu58['bptp_pas_58'],

            'pst_pas_59' => $rtu59['pst_pas_59'],
            'prov_pas_59' => $rtu59['prov_pas_59'],
            'kab_pas_59' => $rtu59['kab_pas_59'],
            'bptp_pas_59' => $rtu59['bptp_pas_59'],

            'pst_lebih_60' => $rtu60['pst_lebih_60'],
            'pst_pas_60' => $rtu60['pst_pas_60'],
            'prov_lebih_60' => $rtu60['prov_lebih_60'],
            'prov_pas_60' => $rtu60['prov_pas_60'],
            'kab_lebih_60' => $rtu60['kab_lebih_60'],
            'kab_pas_60' => $rtu60['kab_pas_60'],
            'bptp_lebih_60' => $rtu60['bptp_lebih_60'],
            'bptp_pas_60' => $rtu60['bptp_pas_60'],

            'pst_tidak_diisi' => $rtu0['pst_tidak_diisi'],
            'prov_tidak_diisi' => $rtu0['prov_tidak_diisi'],
            'kab_tidak_diisi' => $rtu0['kab_tidak_diisi'],
            'bptp_tidak_diisi' => $rtu0['bptp_tidak_diisi'],

        ];
        return view('guest/rekaptngumur', $data);
    }

    public function rktenagapusat()
    {
        $gmodel = new GuestModel();
        $tahun_today = date('Y') - 53;
        $tahun_today54 = date('Y') - 54;
        $tahun_today55 = date('Y') - 55;
        $tahun_today56 = date('Y') - 56;
        $tahun_today57 = date('Y') - 57;
        $tahun_today58 = date('Y') - 58;
        $tahun_today59 = date('Y') - 59;
        $tahun_today60 = date('Y') - 60;
        $tahun_today0 = date('Y') - 0;

        $rtpusat = $gmodel->getRekapTngUmurPst($tahun_today, $tahun_today54, $tahun_today55, $tahun_today56, $tahun_today57, $tahun_today58, $tahun_today59, $tahun_today60, $tahun_today0);
        $data = [
            'title' => 'Rekap Ketenagaan Penyuluhan Tingkat Nasional (Berdasarkan Usia)',
            'nama' => $rtpusat['nama'],
            'kurang_53' => $rtpusat['kurang_53'],
            'pas_53' => $rtpusat['pas_53'],
            'pas_54' => $rtpusat['pas_54'],
            'pas_55' => $rtpusat['pas_55'],
            'pas_56' => $rtpusat['pas_56'],
            'pas_57' => $rtpusat['pas_57'],
            'pas_58' => $rtpusat['pas_58'],
            'pas_59' => $rtpusat['pas_59'],
            'pas_60' => $rtpusat['pas_60'],
            'lebih_60' => $rtpusat['lebih_60'],
            'tidak_diisi' => $rtpusat['tidak_diisi'],
            'nama2' => $rtpusat['nama2'],
            'krg_53' => $rtpusat['krg_53'],
            'ps_53' => $rtpusat['ps_53'],
            'ps_54' => $rtpusat['ps_54'],
            'ps_55' => $rtpusat['ps_55'],
            'ps_56' => $rtpusat['ps_56'],
            'ps_57' => $rtpusat['ps_57'],
            'ps_58' => $rtpusat['ps_58'],
            'ps_59' => $rtpusat['ps_59'],
            'ps_60' => $rtpusat['ps_60'],
            'lbh_60' => $rtpusat['lbh_60'],
            'tdk_diisi' => $rtpusat['tdk_diisi']
        ];
        return view('guest/rekaptngumur_pst', $data);
    }

    public function rktenagaprov()
    {
        $gmodel = new GuestModel();
        $tahun_today = date('Y') - 53;
        $tahun_today54 = date('Y') - 54;
        $tahun_today55 = date('Y') - 55;
        $tahun_today56 = date('Y') - 56;
        $tahun_today57 = date('Y') - 57;
        $tahun_today58 = date('Y') - 58;
        $tahun_today59 = date('Y') - 59;
        $tahun_today60 = date('Y') - 60;
        $tahun_today0 = date('Y') - 0;

        $rtprov = $gmodel->getRekapTngUmurPr($tahun_today, $tahun_today54, $tahun_today55, $tahun_today56, $tahun_today57, $tahun_today58, $tahun_today59, $tahun_today60, $tahun_today0);
        $data = [
            'title' => 'Rekap Ketenagaan Penyuluhan Tingkat Nasional (Berdasarkan Usia)',
            'rtprov' => $rtprov['rtprov']
        ];
        return view('guest/rekaptngumur_pr', $data);
    }

    public function thlpend()
    {
        $gmodel = new GuestModel();


        $thl = $gmodel->getTHLPend();
        $data = [
            'title' => 'Rekap Ketenagaan THL',
            'thlpend' => $thl['thlpend']
        ];
        return view('guest/rekapthlpend', $data);
    }

    public function thlang()
    {
        $gmodel = new GuestModel();

        $tahun_today = date('Y') - 35;

        $thl = $gmodel->getTHLAng($tahun_today);
        $data = [
            'title' => 'Rekap Ketenagaan THL',
            'thlang' => $thl['thlang']
        ];
        return view('guest/rekapthlang', $data);
    }

    public function thlangkab()
    {
        $gmodel = new GuestModel();

        $get_param = $this->request->getGet();
        $kode_prop = $get_param['kode_prop'];
        $tahun_today = date('Y') - 35;

        $thl = $gmodel->getTHLAngKab($kode_prop, $tahun_today);
        $data = [
            'title' => 'Rekap Ketenagaan THL',
            'namaprov' => $thl['namaprov'],
            'thlangkab' => $thl['thlangkab']
        ];
        return view('guest/rekapthlang_kab', $data);
    }

    public function sarpras()
    {
        $gmodel = new GuestModel();


        $sp = $gmodel->getSarpras();
        $data = [
            'title' => 'Rekap Sarana & Prasarana',
            'sarpras' => $sp['sarpras']
        ];
        return view('guest/rekapsarpras', $data);
    }

    public function sarpraskab()
    {
        $gmodel = new GuestModel();
        $get_param = $this->request->getGet();
        $kode_prop = $get_param['kode_prop'];

        $sp = $gmodel->getSarprasKab($kode_prop);
        $data = [
            'title' => 'Rekap Sarana & Prasarana',
            'namaprov' => $sp['namaprov'],
            'sarpras' => $sp['sarpras']
        ];
        return view('guest/rekapsarpras_kab', $data);
    }

    public function sarpraskec()
    {
        $gmodel = new GuestModel();
        $get_param = $this->request->getGet();
        $kode_kab = $get_param['kode_kab'];

        $sp = $gmodel->getSarprasKec($kode_kab);
        $data = [
            'title' => 'Rekap Sarana & Prasarana',
            'namakab' => $sp['namakab'],
            'sarpras' => $sp['sarpras']
        ];
        return view('guest/rekapsarpras_kec', $data);
    }

    public function audlhn()
    {
        $gmodel = new GuestModel();

        $al = $gmodel->getDataAuditLahan();
        $data = [
            'title' => 'Rekap Audit Lahan Tahun 2012',
            'audlhn' => $al['audlhn']
        ];
        return view('guest/data_audit2012', $data);
    }

    public function audlhnkab()
    {
        $gmodel = new GuestModel();

        $get_param = $this->request->getGet();
        $kode_prop = $get_param['kode_prop'];

        $al = $gmodel->getDataAuditLahanKab($kode_prop);
        $data = [
            'title' => 'Rekap Audit Lahan Tahun 2012',
            'namaprov' => $al['namaprov'],
            'audlhn' => $al['audlhn']
        ];
        return view('guest/data_audit2012_kab', $data);
    }

    public function audlhnkec()
    {
        $gmodel = new GuestModel();

        $get_param = $this->request->getGet();
        $kode_kab = $get_param['kode_kab'];

        $al = $gmodel->getDataAuditLahanKec($kode_kab);
        $data = [
            'title' => 'Rekap Audit Lahan Tahun 2012',
            'namakab' => $al['namakab'],
            'audlhn' => $al['audlhn']
        ];
        return view('guest/data_audit2012_kec', $data);
    }

    public function datadukung()
    {
        $gmodel = new GuestModel();


        $dd = $gmodel->getDataDukung();
        $data = [
            'title' => 'Rekap Data Dukung Layanan',
            'daduk' => $dd['daduk']
        ];
        return view('guest/rekap_datadukung', $data);
    }

    public function datadukungkab()
    {
        $gmodel = new GuestModel();
        $get_param = $this->request->getGet();
        $kode_prop = $get_param['kode_prop'];

        $dd = $gmodel->getDataDukungKab($kode_prop);
        $data = [
            'title' => 'Rekap Data Dukung Layanan',
            'namaprov' => $dd['namaprov'],
            'daduk' => $dd['daduk']
        ];
        return view('guest/rekap_datadukung_kab', $data);
    }

    public function datadukungkec()
    {
        $gmodel = new GuestModel();
        $get_param = $this->request->getGet();
        $kode_kab = $get_param['kode_kab'];

        $dd = $gmodel->getDataDukungKec($kode_kab);
        $data = [
            'title' => 'Rekap Data Dukung Layanan',
            'namakab' => $dd['namakab'],
            'daduk' => $dd['daduk']
        ];
        return view('guest/rekap_datadukung_kec', $data);
    }
}
