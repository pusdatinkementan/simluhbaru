<?php

namespace App\Controllers\Penyuluh;

use App\Controllers\BaseController;
use App\Models\penyuluh\PenyuluhPPPKModel;

class PenyuluhPPPK extends BaseController
{

    public function __construct()
    {
        $this->session = service('session');
        $this->config = config('Auth');
        $this->auth = service('authentication');

        $this->model = new PenyuluhPPPKModel();
    }

    public function penyuluhpppk()
    {

        // $get_param = $this->request->getGet();

        // $kode_kab = $get_param['kode_kab'];
        $penyuluh_model = new PenyuluhPPPKModel();
        $pppk_data = $penyuluh_model->getPenyuluhPPPKTotal(session()->get('kodebapel'));
        $namaprop = $penyuluh_model->getPropvinsi();
        $tingkatpen = $penyuluh_model->getTingkat();
        $tugas = $penyuluh_model->getTugas(session()->get('kodebapel'));
        $bpp = $penyuluh_model->getBpp(session()->get('kodebapel'));
        $unitkerja = $penyuluh_model->getUnitKerja(session()->get('kodebapel'));

        $data = [
            'jml_data' => $pppk_data['jum'],
            'nama_kabupaten' => $pppk_data['nama_kab'],
            'tabel_data' => $pppk_data['table_data'],
            'tugas' => $tugas,
            'unitkerja' => $unitkerja,
            'namaprop' => $namaprop,
            'tingkatpen' => $tingkatpen,
            'bpp' => $bpp,
            'title' => 'Penyuluh PPPK',
            'name' => 'PPPK'
        ];

        return view('kab/penyuluh/penyuluhpppk', $data);
    }

    public function showDesa($id_thl)
    {

        $data['q'] = $this->model->getDesa($id_thl);

        foreach ($data['q'] as $dtDesa) {

            echo '<option value="' . $dtDesa['id_desa'] . '">' . $dtDesa['nm_desa'] . '</option>';
        }
    }

    // public function getWilKer($tempat_tugas = null)
    // {
    //     $penyuluh_model = new PenyuluhSwadayaModel();
    //     $tugas = $penyuluh_model->getTugas(session()->get('kodebapel'));
    //     $data = [
    //         'tugas' => $tugas
    //     ];
    //     return json_encode($data);
    // }

    public function save()
    {

        if ($this->request->getPost('kode_kab') == '3') {
            try {
                $res = $this->model->save([
                    'nip' => $this->request->getPost('nip'),
                    'nama' => $this->request->getPost('nama'),
                    'gelar_dpn' => $this->request->getPost('gelar_dpn'),
                    'gelar_blk' => $this->request->getPost('gelar_blk'),
                    'tgl_lahir' => $this->request->getPost('tgl_lahir'),
                    'tempat_lahir' => $this->request->getPost('tempat_lahir'),
                    'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
                    'status_kel' => $this->request->getPost('status_kel'),
                    'agama' => $this->request->getPost('agama'),
                    'gol_darah' => $this->request->getPost('gol_darah'),
                    'keahlian' => $this->request->getPost('keahlian'),
                    'satminkal' => $this->request->getPost('satminkal'),
                    'kode_kab' => $this->request->getPost('kode_kab'),
                    'tgl_skcpns' => $this->request->getPost('tgl_skcpns'),
                    'peng_kerja_thn' => $this->request->getPost('peng_kerja_thn'),
                    'peng_kerja_bln' => $this->request->getPost('peng_kerja_bln'),
                    'alamat' => $this->request->getPost('alamat'),
                    'dati2' => $this->request->getPost('dati2'),
                    'kodepos' => $this->request->getPost('kodepos'),
                    'kode_prop' => $this->request->getPost('kode_prop'),
                    'telp' => $this->request->getPost('telp'),
                    'hp' => $this->request->getPost('hp'),
                    'email' => $this->request->getPost('email'),
                    'status' => $this->request->getPost('status'),
                    'gol' => $this->request->getPost('gol'),
                    'jabatan' => $this->request->getPost('jabatan'),
                    'tgltmtgol' => $this->request->getPost('tgltmtgol'),
                    'batas_pensiun' => $this->request->getPost('batas_pensiun'),
                    'tgl_pensiun' => $this->request->getPost('tgl_pensiun'),
                    'bulan_pensiun' => $this->request->getPost('bulan_pensiun'),
                    'tahun_pensiun' => $this->request->getPost('tahun_pensiun'),
                    'tgl_update' => $this->request->getPost('tgl_update'),
                    'unit_kerja' => $this->request->getPost('unit_kerja_kab'),
                    'tempat_tugas' => $this->request->getPost('satminkal'),
                    'kecamatan_tugas' => $this->request->getPost('kecamatan_tugas1'),
                    'kecamatan_tugas2' => $this->request->getPost('kecamatan_tugas2'),
                    'kecamatan_tugas3' => $this->request->getPost('kecamatan_tugas3'),
                    'kecamatan_tugas4' => $this->request->getPost('kecamatan_tugas4'),
                    'kecamatan_tugas5' => $this->request->getPost('kecamatan_tugas5'),
                    'kecamatan_tugas6' => $this->request->getPost('kecamatan_tugas6'),
                    'kecamatan_tugas7' => $this->request->getPost('kecamatan_tugas7'),
                    'kecamatan_tugas8' => $this->request->getPost('kecamatan_tugas8'),
                    'kecamatan_tugas9' => $this->request->getPost('kecamatan_tugas9'),
                    'kecamatan_tugas10' => $this->request->getPost('kecamatan_tugas10'),
                    'tgl_sk_luh' => $this->request->getPost('tgl_sk_luh'),
                    'bln_sk_luh' => $this->request->getPost('bln_sk_luh'),
                    'thn_sk_luh' => $this->request->getPost('thn_sk_luh'),
                    'tingkat_pendidikan' => $this->request->getPost('tingkat_pendidikan'),
                    'bidang_pendidikan' => $this->request->getPost('bidang_pendidikan'),
                    'mapping' => $this->request->getPost('mapping'),
                    'jurusan' => $this->request->getPost('jurusan'),
                    'nama_sekolah' => $this->request->getPost('nama_sekolah'),
                    'noktp' => $this->request->getPost('noktp')
                ]);

                if ($res == false) {
                    $data = [
                        "value" => false,
                        "message" => 'data tidak lengkap'
                    ];
                } else {
                    $data = [
                        "value" => true
                    ];
                }
                return json_encode($data);
            } catch (\Exception $e) {
                $data = [
                    "value" => false,
                    "message" => $e->getMessage()
                ];
                return json_encode($data);
            }
        } elseif ($this->request->getPost('kode_kab') == '4') {

            try {
                $res = $this->model->save([
                    'nip' => $this->request->getPost('nip'),
                    'nama' => $this->request->getPost('nama'),
                    'gelar_dpn' => $this->request->getPost('gelar_dpn'),
                    'gelar_blk' => $this->request->getPost('gelar_blk'),
                    'tgl_lahir' => $this->request->getPost('tgl_lahir'),
                    'tempat_lahir' => $this->request->getPost('tempat_lahir'),
                    'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
                    'status_kel' => $this->request->getPost('status_kel'),
                    'agama' => $this->request->getPost('agama'),
                    'gol_darah' => $this->request->getPost('gol_darah'),
                    'keahlian' => $this->request->getPost('keahlian'),
                    'satminkal' => $this->request->getPost('satminkal'),
                    'kode_kab' => $this->request->getPost('kode_kab'),
                    'tgl_skcpns' => $this->request->getPost('tgl_skcpns'),
                    'peng_kerja_thn' => $this->request->getPost('peng_kerja_thn'),
                    'peng_kerja_bln' => $this->request->getPost('peng_kerja_bln'),
                    'alamat' => $this->request->getPost('alamat'),
                    'dati2' => $this->request->getPost('dati2'),
                    'kodepos' => $this->request->getPost('kodepos'),
                    'kode_prop' => $this->request->getPost('kode_prop'),
                    'telp' => $this->request->getPost('telp'),
                    'hp' => $this->request->getPost('hp'),
                    'email' => $this->request->getPost('email'),
                    'status' => $this->request->getPost('status'),
                    'gol' => $this->request->getPost('gol'),
                    'jabatan' => $this->request->getPost('jabatan'),
                    'tgltmtgol' => $this->request->getPost('tgltmtgol'),
                    'batas_pensiun' => $this->request->getPost('batas_pensiun'),
                    'tgl_pensiun' => $this->request->getPost('tgl_pensiun'),
                    'bulan_pensiun' => $this->request->getPost('bulan_pensiun'),
                    'tahun_pensiun' => $this->request->getPost('tahun_pensiun'),
                    'tgl_update' => $this->request->getPost('tgl_update'),
                    'unit_kerja' => $this->request->getPost('unit_kerja'),
                    'tempat_tugas' => $this->request->getPost('kecamatan_tugas'),
                    'kecamatan_tugas' => $this->request->getPost('kecamatan_tugas'),
                    'kecamatan_tugas2' => $this->request->getPost('kecamatan_tugas2'),
                    'kecamatan_tugas3' => $this->request->getPost('kecamatan_tugas3'),
                    'kecamatan_tugas4' => $this->request->getPost('kecamatan_tugas4'),
                    'kecamatan_tugas5' => $this->request->getPost('kecamatan_tugas5'),
                    'kecamatan_tugas6' => $this->request->getPost('kecamatan_tugas6'),
                    'kecamatan_tugas7' => $this->request->getPost('kecamatan_tugas7'),
                    'kecamatan_tugas8' => $this->request->getPost('kecamatan_tugas8'),
                    'kecamatan_tugas9' => $this->request->getPost('kecamatan_tugas9'),
                    'kecamatan_tugas10' => $this->request->getPost('kecamatan_tugas10'),
                    'wil_kerja' => $this->request->getPost('wil_kerja'),
                    'wil_kerja2' => $this->request->getPost('wil_kerja2'),
                    'wil_kerja3' => $this->request->getPost('wil_kerja3'),
                    'wil_kerja4' => $this->request->getPost('wil_kerja4'),
                    'wil_kerja5' => $this->request->getPost('wil_kerja5'),
                    'wil_kerja6' => $this->request->getPost('wil_kerja6'),
                    'wil_kerja7' => $this->request->getPost('wil_kerja7'),
                    'wil_kerja8' => $this->request->getPost('wil_kerja8'),
                    'wil_kerja9' => $this->request->getPost('wil_kerja9'),
                    'wil_kerja10' => $this->request->getPost('wil_kerja10'),
                    'tgl_sk_luh' => $this->request->getPost('tgl_sk_luh'),
                    'bln_sk_luh' => $this->request->getPost('bln_sk_luh'),
                    'thn_sk_luh' => $this->request->getPost('thn_sk_luh'),
                    'tingkat_pendidikan' => $this->request->getPost('tingkat_pendidikan'),
                    'bidang_pendidikan' => $this->request->getPost('bidang_pendidikan'),
                    'mapping' => $this->request->getPost('mapping'),
                    'jurusan' => $this->request->getPost('jurusan'),
                    'nama_sekolah' => $this->request->getPost('nama_sekolah'),
                    'noktp' => $this->request->getPost('noktp')
                ]);

                if ($res == false) {
                    $data = [
                        "value" => false,
                        "message" => 'data tidak lengkap'
                    ];
                } else {
                    $data = [
                        "value" => true
                    ];
                }
                return json_encode($data);
            } catch (\Exception $e) {
                $data = [
                    "value" => false,
                    "message" => $e->getMessage()
                ];
                return json_encode($data);
            }
        }
    }

    public function delete($id)
    {
        $this->model->delete($id);
        return redirect()->to('/penyuluhpppk');
    }

    public function edit($id)
    {
        $pppk = $this->model->getDetailEdit($id);
        echo $pppk;
    }

    public function update($id)
    {

        $nip = $this->request->getPost('nip');
        $nama = $this->request->getPost('nama');
        $gelar_dpn = $this->request->getPost('gelar_dpn');
        $gelar_blk = $this->request->getPost('gelar_blk');
        $tgl_lahir = $this->request->getPost('tgl_lahir');
        $tempat_lahir = $this->request->getPost('tempat_lahir');
        $jenis_kelamin = $this->request->getPost('jenis_kelamin');
        $status_kel = $this->request->getPost('status_kel');
        $agama = $this->request->getPost('agama');
        $gol_darah = $this->request->getPost('gol_darah');
        $keahlian = $this->request->getPost('keahlian');
        $satminkal = $this->request->getPost('satminkal');
        $kode_kab = $this->request->getPost('kode_kab');
        $tgl_skcpns = $this->request->getPost('tgl_skcpns');
        $peng_kerja_thn = $this->request->getPost('peng_kerja_thn');
        $peng_kerja_bln = $this->request->getPost('peng_kerja_bln');
        $alamat = $this->request->getPost('alamat');
        $dati2 = $this->request->getPost('dati2');
        $kodepos = $this->request->getPost('kodepos');
        $kode_prop = $this->request->getPost('kode_prop');
        $telp = $this->request->getPost('telp');
        $hp = $this->request->getPost('hp');
        $email = $this->request->getPost('email');
        $status = $this->request->getPost('status');
        $gol = $this->request->getPost('gol');
        $jabatan = $this->request->getPost('jabatan');
        $tgltmtgol = $this->request->getPost('tgltmtgol');
        $batas_pensiun = $this->request->getPost('batas_pensiun');
        $tgl_pensiun = $this->request->getPost('tgl_pensiun');
        $bulan_pensiun = $this->request->getPost('bulan_pensiun');
        $tahun_pensiun = $this->request->getPost('tahun_pensiun');
        $tgl_update = $this->request->getPost('tgl_update');
        $unit_kerja = $this->request->getPost('unit_kerja_kab');
        $tempat_tugas = $this->request->getPost('satminkal');
        $kecamatan_tugas = $this->request->getPost('kecamatan_tugas1');
        $kecamatan_tugas2 = $this->request->getPost('kecamatan_tugas2');
        $kecamatan_tugas3 = $this->request->getPost('kecamatan_tugas3');
        $kecamatan_tugas4 = $this->request->getPost('kecamatan_tugas4');
        $kecamatan_tugas5 = $this->request->getPost('kecamatan_tugas5');
        $kecamatan_tugas6 = $this->request->getPost('kecamatan_tugas6');
        $kecamatan_tugas7 = $this->request->getPost('kecamatan_tugas7');
        $kecamatan_tugas8 = $this->request->getPost('kecamatan_tugas8');
        $kecamatan_tugas9 = $this->request->getPost('kecamatan_tugas9');
        $kecamatan_tugas10 = $this->request->getPost('kecamatan_tugas10');
        $tgl_sk_luh = $this->request->getPost('tgl_sk_luh');
        $bln_sk_luh = $this->request->getPost('bln_sk_luh');
        $thn_sk_luh = $this->request->getPost('thn_sk_luh');
        $tingkat_pendidikan = $this->request->getPost('tingkat_pendidikan');
        $bidang_pendidikan = $this->request->getPost('bidang_pendidikan');
        $mapping = $this->request->getPost('mapping');
        $jurusan = $this->request->getPost('jurusan');
        $nama_sekolah = $this->request->getPost('nama_sekolah');
        $noktp = $this->request->getPost('noktp');
        $kode_kab = $this->request->getPost('kode_kab');

        $nip = $this->request->getPost('nip');
        $nama = $this->request->getPost('nama');
        $gelar_dpn = $this->request->getPost('gelar_dpn');
        $gelar_blk = $this->request->getPost('gelar_blk');
        $tgl_lahir = $this->request->getPost('tgl_lahir');
        $tempat_lahir = $this->request->getPost('tempat_lahir');
        $jenis_kelamin = $this->request->getPost('jenis_kelamin');
        $status_kel = $this->request->getPost('status_kel');
        $agama = $this->request->getPost('agama');
        $gol_darah = $this->request->getPost('gol_darah');
        $keahlian = $this->request->getPost('keahlian');
        $satminkal = $this->request->getPost('satminkal');
        $kode_kab = $this->request->getPost('kode_kab');
        $tgl_skcpns = $this->request->getPost('tgl_skcpns');
        $peng_kerja_thn = $this->request->getPost('peng_kerja_thn');
        $peng_kerja_bln = $this->request->getPost('peng_kerja_bln');
        $alamat = $this->request->getPost('alamat');
        $dati2 = $this->request->getPost('dati2');
        $kodepos = $this->request->getPost('kodepos');
        $kode_prop = $this->request->getPost('kode_prop');
        $telp = $this->request->getPost('telp');
        $hp = $this->request->getPost('hp');
        $email = $this->request->getPost('email');
        $status = $this->request->getPost('status');
        $gol = $this->request->getPost('gol');
        $jabatan = $this->request->getPost('jabatan');
        $tgltmtgol = $this->request->getPost('tgltmtgol');
        $batas_pensiun = $this->request->getPost('batas_pensiun');
        $tgl_pensiun = $this->request->getPost('tgl_pensiun');
        $bulan_pensiun = $this->request->getPost('bulan_pensiun');
        $tahun_pensiun = $this->request->getPost('tahun_pensiun');
        $tgl_update = $this->request->getPost('tgl_update');
        $unit_kerja = $this->request->getPost('unit_kerja');
        $tempat_tugas = $this->request->getPost('kecamatan_tugas');
        $kecamatan_tugas = $this->request->getPost('kecamatan_tugas');
        $wil_kerja = $this->request->getPost('wil_kerja');
        $wil_kerja2 = $this->request->getPost('wil_kerja2');
        $wil_kerja3 = $this->request->getPost('wil_kerja3');
        $wil_kerja4 = $this->request->getPost('wil_kerja4');
        $wil_kerja5 = $this->request->getPost('wil_kerja5');
        $wil_kerja6 = $this->request->getPost('wil_kerja6');
        $wil_kerja7 = $this->request->getPost('wil_kerja7');
        $wil_kerja8 = $this->request->getPost('wil_kerja8');
        $wil_kerja9 = $this->request->getPost('wil_kerja9');
        $wil_kerja10 = $this->request->getPost('wil_kerja10');
        $tgl_sk_luh = $this->request->getPost('tgl_sk_luh');
        $bln_sk_luh = $this->request->getPost('bln_sk_luh');
        $thn_sk_luh = $this->request->getPost('thn_sk_luh');
        $tingkat_pendidikan = $this->request->getPost('tingkat_pendidikan');
        $bidang_pendidikan = $this->request->getPost('bidang_pendidikan');
        $mapping = $this->request->getPost('mapping');
        $jurusan = $this->request->getPost('jurusan');
        $nama_sekolah = $this->request->getPost('nama_sekolah');
        $noktp = $this->request->getPost('noktp');


        $this->model->save([
            'id' => $id,
            'nip' => $nip,
            'nama' => $nama,
            'gelar_dpn' => $gelar_dpn,
            'gelar_blk' => $gelar_blk,
            'tgl_lahir' => $tgl_lahir,
            'tempat_lahir' => $tempat_lahir,
            'jenis_kelamin' => $jenis_kelamin,
            'status_kel' => $status_kel,
            'agama' => $agama,
            'gol_darah' => $gol_darah,
            'keahlian' => $keahlian,
            'satminkal' => $satminkal,
            'kode_kab' => $kode_kab,
            'tgl_skcpns' => $tgl_skcpns,
            'peng_kerja_thn' => $peng_kerja_thn,
            'peng_kerja_bln' => $peng_kerja_bln,
            'alamat' => $alamat,
            'dati2' => $dati2,
            'kodepos' => $kodepos,
            'kode_prop' => $kode_prop,
            'telp' => $telp,
            'hp' => $hp,
            'email' => $email,
            'status' => $status,
            'gol' => $gol,
            'jabatan' => $jabatan,
            'tgltmtgol' => $tgltmtgol,
            'batas_pensiun' => $batas_pensiun,
            'tgl_pensiun' => $tgl_pensiun,
            'bulan_pensiun' => $bulan_pensiun,
            'tahun_pensiun' => $tahun_pensiun,
            'tgl_update' => $tgl_update,
            'unit_kerja' => $unit_kerja,
            'tempat_tugas' => $tempat_tugas,
            'kecamatan_tugas' => $kecamatan_tugas,
            'kecamatan_tugas2' => $kecamatan_tugas2,
            'kecamatan_tugas3' => $kecamatan_tugas3,
            'kecamatan_tugas4' => $kecamatan_tugas4,
            'kecamatan_tugas5' => $kecamatan_tugas5,
            'kecamatan_tugas6' => $kecamatan_tugas6,
            'kecamatan_tugas7' => $kecamatan_tugas7,
            'kecamatan_tugas8' => $kecamatan_tugas8,
            'kecamatan_tugas9' => $kecamatan_tugas9,
            'kecamatan_tugas10' => $kecamatan_tugas10,
            'wil_kerja' => $wil_kerja,
            'wil_kerja2' => $wil_kerja2,
            'wil_kerja3' => $wil_kerja3,
            'wil_kerja4' => $wil_kerja4,
            'wil_kerja5' => $wil_kerja5,
            'wil_kerja6' => $wil_kerja6,
            'wil_kerja7' => $wil_kerja7,
            'wil_kerja8' => $wil_kerja8,
            'wil_kerja9' => $wil_kerja9,
            'wil_kerja10' => $wil_kerja10,
            'tgl_sk_luh' => $tgl_sk_luh,
            'bln_sk_luh' => $bln_sk_luh,
            'thn_sk_luh' => $thn_sk_luh,
            'tingkat_pendidikan' => $tingkat_pendidikan,
            'bidang_pendidikan' => $bidang_pendidikan,
            'mapping' => $mapping,
            'jurusan' => $jurusan,
            'nama_sekolah' => $nama_sekolah,
            'noktp' => $noktp
        ]);

        //session()->setFlashdata('pesan', 'Data berhasil diubah');

    }
}
