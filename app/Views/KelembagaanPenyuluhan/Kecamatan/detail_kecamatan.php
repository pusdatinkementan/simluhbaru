<?= $this->extend('layout/main_template') ?>

<?= $this->section('content') ?>
<?php $sessnama = session()->get('nama'); ?>
<?php
if (empty(session()->get('status_user')) || session()->get('status_user') == '2') {
    $kode = '00';
} elseif (session()->get('status_user') == '1') {
    $kode = session()->get('kodebakor');
} elseif (session()->get('status_user') == '200') {
    $kode = session()->get('kodebapel');
} elseif (session()->get('status_user') == '300') {
    $kode = session()->get('kodebpp');
}

$api = 'https://api.pertanian.go.id/api/simantap/dashboard/list?&api-key=f13914d292b53b10936b7a7d1d6f2406&kode=' . $kode_kec;
$result = file_get_contents($api, false);
$json = json_decode($result, true);
$data = $json[0];
?>
<div class="container-fluid py-4">
    <div class="row">
        <!-- Page Heading -->
        <div class="row mt-3 mb-4">

            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Jumlah BPP</p>
                                    <h5 class="font-weight-bolder mb-0">
                                        <?= number_format($data['jumbpp']); ?>
                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                    <i class="far fa-building"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Jumlah Poktan</p>
                                    <h5 class="font-weight-bolder mb-0">
                                        <?= number_format($data['jumpoktan']); ?>
                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                    <i class="fas fa-user"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Jumlah Gapoktan</p>
                                    <h5 class="font-weight-bolder mb-0">
                                        <?= number_format($data['jumgapoktan']); ?>
                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                    <i class="fas fa-user"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Jumlah Penyuluh PNS</p>
                                    <h5 class="font-weight-bolder mb-0">
                                        <?= number_format($data['jumpenyuluhpns']); ?>
                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                    <i class="fas fa-user"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Jumlah Penyuluh THL APBN</p>
                                    <h5 class="font-weight-bolder mb-0">
                                        <?= number_format($data['jumpenyuluhthlapbn']); ?>
                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                    <i class="fas fa-user"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Jumlah Penyuluh THL APBD</p>
                                    <h5 class="font-weight-bolder mb-0">
                                        <?= number_format($data['jumpenyuluhthlapbd']); ?>
                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                    <i class="fas fa-user"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Jumlah Penyuluh Swatahuna</p>
                                    <h5 class="font-weight-bolder mb-0">
                                        <?= number_format($data['jumpenyuluhswadaya']); ?>
                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                    <i class="fas fa-user"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Jumlah Penyuluh Swasta</p>
                                    <h5 class="font-weight-bolder mb-0">
                                        <?= number_format($data['jumpenyuluhswasta']); ?>
                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                    <i class="fas fa-user"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>

        <div class="row">

            <nav class="col-lg-12">
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Profil</button>
                    <button class="nav-link" id="nav-penyuluh-tab" data-bs-toggle="tab" data-bs-target="#nav-penyuluh" type="button" role="tab" aria-controls="nav-penyuluh" aria-selected="false">Daftar Penyuluh</button>
                    <button class="nav-link" id="nav-wilkec-tab" data-bs-toggle="tab" data-bs-target="#nav-wilkec" type="button" role="tab" aria-controls="nav-wilkec" aria-selected="false">Wilayah Kecamatan</button>
                    <button class="nav-link" id="nav-klas-tab" data-bs-toggle="tab" data-bs-target="#nav-klas" type="button" role="tab" aria-controls="nav-klas" aria-selected="false">Klasifikasi BPP</button>
                    <button class="nav-link" id="nav-kegiatan-tab" data-bs-toggle="tab" data-bs-target="#nav-kegiatan" type="button" role="tab" aria-controls="nav-kegiatan" aria-selected="false">Kegiatan</button>
                    <button class="nav-link" id="nav-lahan-tab" data-bs-toggle="tab" data-bs-target="#nav-lahan" type="button" role="tab" aria-controls="nav-lahan" aria-selected="false">Lahan</button>
                    <button class="nav-link" id="nav-penghargaan-tab" data-bs-toggle="tab" data-bs-target="#nav-penghargaan" type="button" role="tab" aria-controls="nav-penghargaan" aria-selected="false">Penghargaan</button>
                    <button class="nav-link" id="nav-dana-tab" data-bs-toggle="tab" data-bs-target="#nav-dana" type="button" role="tab" aria-controls="nav-dana" aria-selected="false">Dana Alokasi Khusus</button>
                    <button class="nav-link" id="nav-sarpras-tab" data-bs-toggle="tab" data-bs-target="#nav-sarpras" type="button" role="tab" aria-controls="nav-sarpras" aria-selected="false">Sarana & Prasarana</button>
                    <button class="nav-link" id="nav-pokom-tab" data-bs-toggle="tab" data-bs-target="#nav-pokom" type="button" role="tab" aria-controls="nav-pokom" aria-selected="false">Potensi Ekonomi</button>
                    <button class="nav-link" id="nav-powil-tab" data-bs-toggle="tab" data-bs-target="#nav-powil" type="button" role="tab" aria-controls="nav-powil" aria-selected="false">Potensi Wilayah</button>
                    <!-- <button class="nav-link" id="nav-sarpras-tab" data-bs-toggle="tab" data-bs-target="#nav-sarpras" type="button" role="tab" aria-controls="nav-sarpras" aria-selected="false">Sarana & Prasarana</button>
                    <button class="nav-link" id="nav-pokom-tab" data-bs-toggle="tab" data-bs-target="#nav-pokom" type="button" role="tab" aria-controls="nav-pokom" aria-selected="false">Potensi Ekonomi</button>
                    <button class="nav-link" id="nav-powil-tab" data-bs-toggle="tab" data-bs-target="#nav-powil" type="button" role="tab" aria-controls="nav-powil" aria-selected="false">Potensi Wilayah</button> -->
                </div>
            </nav>
            <div class="tab-content " id="nav-tabContent">
                <div class="tab-pane  fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                    <div class="row">
                        <div class="col-lg-9 mb-lg-0 mb-4">
                            <div class="card">
                                <div class="card-body p-3">
                                    <div class="row">
                                        <h1 class="h3 mb-4 text-gray-800"><?= $title; ?><i class="fas fa-edit" style="float: right;" data-bs-toggle="modal" data-bs-target="#modal-form" id="btn-edit" data-id="<?= $dt['id']; ?>"></i></a></h1>
                                        <div class="col-lg-12">

                                            <table class="table">

                                                <tbody>
                                                    <input type="hidden" name="id" value="<?= $dt['id']; ?>">
                                                    <tr>
                                                        <td>Nama Kelembagaan</td>
                                                        <td>:</td>
                                                        <td><?= $dt['nama_bpp']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Klasifikasi BP3K</td>
                                                        <td>:</td>
                                                        <td><?= $dt['klasifikasi']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Alamat</td>
                                                        <td>:</td>
                                                        <td> <?= $dt['alamat']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Kecamatan</td>
                                                        <td>:</td>
                                                        <td><?= $dt['deskripsi']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Kabupaten/Kota</td>
                                                        <td>:</td>
                                                        <td><?= $namakab; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Provinsi</td>
                                                        <td>:</td>
                                                        <td><?= $namaprov; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Status Bangunan</td>
                                                        <td>:</td>
                                                        <td><?= $dt['status_gedung']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Kondisi Bangunan</td>
                                                        <td>:</td>
                                                        <td><?= $dt['kondisi_bangunan']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Nama Kepala / Koordinator</td>
                                                        <td>:</td>
                                                        <td><?= $dt['ketua']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>No HP Pimpinan</td>
                                                        <td>:</td>
                                                        <td><?= $dt['telp_hp']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Email</td>
                                                        <td>:</td>
                                                        <td><?= $dt['email']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Kecamatan wilayah Kerja</td>
                                                        <td>:</td>
                                                        <td>- <?= $dt['deskripsi'];  ?></td>
                                                    </tr>

                                                </tbody>

                                            </table>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 mb-lg-0 mb-4 text-center">
                            <div class="card">
                                <div class="card-body p-3 ">
                                    <img src="<?= base_url('assets/img/logo.png'); ?>" width="150px" class="img-thumbnail" alt="profil">
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="tab-pane fade" id="nav-penyuluh" role="tabpanel" aria-labelledby="nav-penyuluh-tab">
                    <div class="row">

                        <div class="col-lg-12 mb-lg-0 mb-4">
                            <div class="card">
                                <div class="card-body p-3">
                                    <div class="row">
                                        <h1 class="h3 mb-4 text-gray-800">Daftar Penyuluh yang bertugas di Kab/Kota</h1>
                                        <div class="col-lg-8">

                                            <table class="table">
                                                <tbody>
                                                    <tr>
                                                        <td>Penyuluh PNS</td>
                                                        <td>:</td>
                                                        <td>dadasas</td>
                                                    </tr>
                                                    <tr>
                                                        <td>THL-TBPP (APBN)</td>
                                                        <td>:</td>
                                                        <td>dadasas</td>
                                                    </tr>
                                                    <tr>
                                                        <td>THL-TB PP (APBD)</td>
                                                        <td>:</td>
                                                        <td>dadasas</td>
                                                    </tr>
                                                </tbody>
                                            </table>

                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="nav-wilkec" role="tabpanel" aria-labelledby="nav-wilkec-tab">
                    <div class="row">
                        <div class="col-lg-12 mb-lg-0 mb-4">
                            <div class="card">
                                <div class="card-body p-3">
                                    <div class="row">
                                        <h1 class="h3 mb-4 text-gray-800">Wilayah Kecamatan<i class="fas fa-edit" style="float: right;" data-bs-toggle="modal" data-bs-target="#modal-wilkec" id="btn-edit" data-id="<?= $dt['id']; ?>"></i></a></h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-klas" role="tabpanel" aria-labelledby="nav-klas-tab">
                    <div class="row">
                        <div class="col-lg-12 mb-lg-0 mb-4">
                            <div class="card">
                                <div class="card-body p-3">
                                    <div class="row">
                                        <h1 class="h3 mb-4 text-gray-800">Klasifikasi BPP<i class="fas fa-edit" style="float: right;" data-bs-toggle="modal" data-bs-target="#modal-form" id="btn-edit" data-id="<?= $dt['id']; ?>"></i></a></h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-kegiatan" role="tabpanel" aria-labelledby="nav-kegiatan-tab">
                    <div class="row">
                        <div class="col-lg-12 mb-lg-0 mb-4">
                            <div class="card">
                                <div class="card-body p-3">
                                    <div class="row">
                                        <h1 class="h3 mb-4 text-gray-800">Kegiatan yang dilaksanakan oleh BPP<i class="fas fa-edit" style="float: right;" data-bs-toggle="modal" data-bs-target="#modal-form" id="btn-edit" data-id="<?= $dt['id']; ?>"></i></a></h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-lahan" role="tabpanel" aria-labelledby="nav-lahan-tab">
                    <div class="row">
                        <div class="col-lg-12 mb-lg-0 mb-4">
                            <div class="card">
                                <div class="card-body p-3">
                                    <div class="row">
                                        <h1 class="h3 mb-4 text-gray-800">Lahan Percontohan<i class="fas fa-edit" style="float: right;" data-bs-toggle="modal" data-bs-target="#modal-form" id="btn-edit" data-id="<?= $dt['id']; ?>"></i></a></h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-penghargaan" role="tabpanel" aria-labelledby="nav-penghargaan-tab">
                    <div class="row">
                        <div class="col-lg-12 mb-lg-0 mb-4">
                            <div class="card">
                                <div class="card-body p-3">
                                    <div class="row">
                                        <h1 class="h3 mb-4 text-gray-800">Penghargaan yang pernah diterima<i class="fas fa-edit" style="float: right;" data-bs-toggle="modal" data-bs-target="#modal-form" id="btn-edit" data-id="<?= $dt['id']; ?>"></i></a></h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-dana" role="tabpanel" aria-labelledby="nav-dana-tab">
                    <div class="row">
                        <div class="col-lg-12 mb-lg-0 mb-4">
                            <div class="card">
                                <div class="card-body p-3">
                                    <div class="row">
                                        <h1 class="h3 mb-4 text-gray-800">Mendapatkan Dana Alokasi Khusus (DAK)<i class="fas fa-edit" style="float: right;" data-bs-toggle="modal" data-bs-target="#modal-form" id="btn-edit" data-id="<?= $dt['id']; ?>"></i></a></h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-sarpras" role="tabpanel" aria-labelledby="nav-sarpras-tab">
                    <div class="row">
                        <div class="col-lg-12 mb-lg-0 mb-4">
                            <div class="card">
                                <div class="card-body p-3">
                                    <div class="row">
                                        <h1 class="h3 mb-4 text-gray-800">Sarana & Prasarana<i class="fas fa-edit" style="float: right;" data-bs-toggle="modal" data-bs-target="#modal-form" id="btn-edit" data-id="<?= $dt['id']; ?>"></i></a></h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-pokom" role="tabpanel" aria-labelledby="nav-pokom-tab">
                    <div class="row">
                        <div class="col-lg-12 mb-lg-0 mb-4">
                            <div class="card">
                                <div class="card-body p-3">
                                    <div class="row">
                                        <h1 class="h3 mb-4 text-gray-800">Potensi Ekonomi<i class="fas fa-edit" style="float: right;" data-bs-toggle="modal" data-bs-target="#modal-form" id="btn-edit" data-id="<?= $dt['id']; ?>"></i></a></h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-powil" role="tabpanel" aria-labelledby="nav-powil-tab">
                    <div class="row">
                        <div class="col-lg-12 mb-lg-0 mb-4">
                            <div class="card">
                                <div class="card-body p-3">
                                    <div class="row">
                                        <h1 class="h3 mb-4 text-gray-800">Potensi Wilayah<i class="fas fa-edit" style="float: right;" data-bs-toggle="modal" data-bs-target="#modal-form" id="btn-edit" data-id="<?= $dt['id']; ?>"></i></a></h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>


        <div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-body p-0">
                        <div class="card card-plain">
                            <div class="card-header pb-0 text-left">
                                <h4 class="font-weight-bolder text-warning text-gradient" id="judul_form">Edit Data</h4>
                            </div>
                            <div class="card-body">

                                <form method="POST" role="form text-left">
                                    <div class="row">
                                        <div class="col">
                                            <label for="prov">Propinsi</label>
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" name="prov" value="" disabled>
                                            </div>
                                            <label for="prov">Kabupaten</label>
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" name="kab" value="" disabled>
                                            </div>
                                            <label for="kode_desa">Jenis Kelembagaan</label>
                                            <div class="input-group mb-3">
                                                <select name="nama_bapel" id="nama_bapel" class="form-control input-lg">
                                                    <option value=""></option>
                                                    <OPTION value="31">Badan<BR>
                                                    <OPTION value="32">Dinas<BR>
                                                </select>
                                            </div>
                                            <div class="input-group mb-3">
                                                <label style="margin-top: 10px;">Nomenklatur :
                                                    <input type="text" class="form-control" id="deskripsi_lembaga_lain" placeholder="" name="deskripsi_lembaga_lain">
                                                    <label>Pilih Sesuai nomenklatur :</label>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="jenis_pertanian" name="jenis_pertanian" value="1">
                                                        <label class="form-check-label" for="flexCheckDefault">
                                                            Pertanian
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="jenis_tp" name="jenis_tp" value="2">
                                                        <label class="form-check-label" for="flexCheckDefault">
                                                            Tanaman Pangan
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="jenis_hor" name="jenis_hor" value="3">
                                                        <label class="form-check-label" for="flexCheckDefault">
                                                            Hortikultura
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="jenis_bun" name="jenis_bun" value="4">
                                                        <label class="form-check-label" for="flexCheckDefault">
                                                            Perkebunan
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="jenis_nak" name="jenis_nak" value="5">
                                                        <label class="form-check-label" for="flexCheckDefault">
                                                            Peternakan
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="jenis_ketahanan_pangan" name="jenis_ketahanan_pangan" value="6">
                                                        <label class="form-check-label" for="flexCheckDefault">
                                                            Kesehatan Pangan
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="jenis_pkh" name="jenis_pkh" value="7">
                                                        <label class="form-check-label" for="flexCheckDefault">
                                                            Kesehatan Hewan
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="jenis_pangan" name="jenis_pangan" value="8">
                                                        <label class="form-check-label" for="flexCheckDefault">
                                                            Pangan
                                                        </label>
                                                    </div>
                                                </label>
                                            </div>
                                            <label for="alamat">Dasar Hukum Pembentukan</label>
                                            <select name="dasar_hukum" id="dasar_hukum" class="form-control input-lg">
                                                <option value=""></option>
                                                <option value="Perda">Perda</option>
                                            </select>
                                            <label for="ketua">No Peraturan</label>
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" id="no_peraturan" placeholder="Nomor Peraturan" name="no_peraturan">
                                            </div>
                                            <label for="ketua">Tanggal Pembentukan</label>
                                            <div class="input-group mb-3">
                                                <select id="day" name="tgl_berdiri" class="form-select tgl_berdiri" aria-label="Default select example">
                                                    <option value=""></option>
                                                </select>
                                                <select id="month" name="bln_berdiri" class="form-select bln_berdiri" aria-label="Default select example">
                                                    <option value=""></option>
                                                </select>
                                                <select id="year" name="thn_berdiri" class="form-select thn_berdiri" aria-label="Default select example">
                                                    <option value=""></option>
                                                </select>
                                            </div>
                                            <label for="bendahara">Nama Pimpinan</label>
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" id="ketua" placeholder="Nama Pimpinan" name="ketua">
                                                <label style="margin-top: 10px;">No.HP</label>
                                                <input type="text" style="margin-left: 5px;" class="form-control" id="telp_hp" placeholder="No. HP" name="telp_hp">
                                            </div>
                                            <label> Nama Koordinator Penyuluh</label>
                                            <div class="input-group mb-3">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="jenis_penyuluh" id="inlineRadio1" value="1">
                                                    <label class="form-check-label" for="inlineRadio1">PNS</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="jenis_penyuluh" id="inlineRadio2" value="2">
                                                    <label class="form-check-label" for="inlineRadio2">THL</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="jenis_penyuluh" id="inlineRadio3" value="3">
                                                    <label class="form-check-label" for="inlineRadio2">Struktural</label>
                                                </div><br>
                                            </div>
                                            <div class="input-group mb-3" id="divPNS">
                                                <label style="margin-top: 10px;">PNS:</label>
                                                <select name="nama_koord_penyuluh" id="nama_koord_penyuluh" class="form-control input-lg" style="margin-left: 15px;">

                                                </select>
                                            </div>
                                            <div class="input-group mb-3" id="divTHL">
                                                <label>THL:</label>
                                                <select name="nama_koord_penyuluh_thl" id="nama_koord_penyuluh_thl" class="form-control input-lg" style="margin-left: 5px;">

                                                </select>
                                            </div>
                                            <div class="input-group mb-3" id="divST">
                                                <label style="margin-top: 10px;">NIP:</label>
                                                <input type="text" class="form-control" style="margin-left: 10px;" id="koord_lainya_nip" placeholder="ketua" name="koord_lainya_nip">
                                                <label style="margin-top: 10px;">Nama</label>
                                                <input type="text" class="form-control" style="margin-left: 10px;" id="koord_lainya_nama" placeholder="ketua" name="koord_lainya_nama">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <label for="ketua">Bidang yang menangani fungsi penyuluhan</label>
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" id="bidang_luh" placeholder="Bidang" name="bidang_luh">
                                            </div>
                                            <label for="ketua">Nama kepala bidang</label>
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" id="nama_kabid" placeholder="Nama Kabid" name="nama_kabid">
                                                <label style="margin-top: 10px;">No.HP</label>
                                                <input type="text" style="margin-left: 5px;" class="form-control" id="hp_kabid" placeholder="No. HP" name="hp_kabid">
                                            </div>
                                            <label for="ketua">Seksi yang menangani penyuluhan</label>
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" id="seksi_luh" placeholder="Seksi" name="seksi_luh">
                                            </div>
                                            <label for=" ketua">Nama kepala seksi</label>
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" id="nama_kasie" name="nama_kasie" placeholder="Nama Kepala Seksi">
                                                <label style="margin-top: 10px;">No.HP</label>
                                                <input type="text" style="margin-left: 5px;" class="form-control" id="hp_kasie" name="hp_kasie" placeholder="No. HP">
                                            </div>
                                            <label for="ketua">UPTD yang menangani fungsi penyuluhan</label>
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" id="uptd_luh" placeholder="ketua" name="uptd_luh">
                                            </div>
                                            <label for="ketua">Nama kepala UPTD</label>
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" id="nama_kauptd" name="nama_kauptd" placeholder="Nama Kepala UPTD">
                                                <label style="margin-top: 10px;">No.HP</label>
                                                <input type="text" style="margin-left: 5px;" class="form-control" id="hp_kauptd" name="hp_kauptd" placeholder="No. HP">
                                            </div>
                                            <label for="alamat">Alamat Kantor</label>
                                            <div class="input-group mb-3">
                                                <textarea type="text" class="form-control" id="alamat" placeholder="alamat" name="alamat"></textarea>
                                            </div>
                                            <div class="input-group mb-3">
                                                <label for="jum_anggota">Titik koordinat (GPS POint)
                                                    <input type="text" class="form-control" id="koord" name="koord"><br>
                                                    <label>Format titik koordinat adalah Decimal Degree, contoh : -6.2924034,106.820540</label>
                                                </label>
                                            </div>
                                            <label for="ketua">No.Telepon/Fax</label>
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" id="telp_kantor" placeholder="No Telp Kantor" name="telp_kantor">
                                            </div>
                                            <label for="ketua">Alamat Email</label>
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" id="email" placeholder="email" name="email">
                                            </div>
                                            <label for="ketua">Alamat Website/Blog</label>
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" id="website" placeholder="Alamat website" name="website">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="button" id="btnSave" class="btn bg-gradient-primary">Simpan Data</button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="modal-wilkec" tabindex="-1" role="dialog" aria-labelledby="modal-wilkec" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-l" role="document">
                <div class="modal-content">
                    <div class="modal-body p-0">
                        <div class="card card-plain">
                            <div class="card-header pb-0 text-left">
                                <h4 class="font-weight-bolder text-warning text-gradient" id="judul_form">Tambah Data</h4>
                            </div>
                            <div class="card-body">

                                <form role="form text-left" action="<?= base_url('profil/Lembaga/save'); ?>">
                                    <div class="row">
                                        <div class="col">
                                            <input type="hidden" name="kode_prop" id="kode_prop" value="<?= $dt['kode_prop']; ?>">
                                            <input type="hidden" name="satminkal" id="satminkal" value="<?= $dt['satminkal']; ?>">

                                            <label for="penyuluh_swadaya">Nama Kecamatan</label>
                                            <div class="input-group mb-3">
                                                <select name="kecamatan" id="kecamatan" class="form-control input-lg">
                                                    <option value="">Pilih Kecamatan</option>
                                                    <?php
                                                    foreach ($kec as $row) {
                                                        echo '<option value="' . $row["id_daerah"] . '">' . 'Kec. ' . $row["deskripsi"] . '</option>';
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <label for="alamat">Jumlah Petani</label>
                                            <div class="input-group mb-3">
                                                <input type="number" class="form-control" id="jum_petani" placeholder="Jumlah Petani" name="jum_petani">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="button" id="btnSimpan" class="btn bg-gradient-primary">Simpan Data</button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>

</div>
<?php echo view('layout/footer'); ?>

</div>
</div>

<?= $this->endSection() ?>



<?= $this->section('script') ?>
<script>
    $(document).ready(function() {
        $(document).delegate('#btn-edit', 'click', function() {
            //var myModal = new bootstrap.Modal(document.getElementById('modal-edit'), options);
            // alert(id);
            $.ajax({
                url: '<?= base_url() ?>/profil/Lembaga/detailKab/' + $(this).data('id_gapoktan'),
                type: 'GET',
                dataType: 'JSON',
                success: function(res) {
                    // $(".daftpos").html(res)
                    //console.log(res);
                    //res = JSON.parse(res);

                    $('#id_gapoktan').val(res[0].id_gapoktan);
                    $('#nama_bapel').val(res[0].nama_bapel);
                    $('#dasar_hukum').val(res[0].dasar_hukum);
                    $('#no_peraturan').val(res[0].no_peraturan);
                    $('#day').val(res[0].tgl_berdiri);
                    $('#month').val(res[0].bln_berdiri);
                    $('#year').val(res[0].thn_berdiri);
                    $('#alamat').val(res[0].alamat);
                    $('#deskripsi_lembaga_lain').val(res[0].deskripsi_lembaga_lain);
                    $('#telp_kantor').val(res[0].telp_kantor);
                    $('#email').val(res[0].email);
                    $('#website').val(res[0].website);
                    $('#ketua').val(res[0].ketua);
                    $('#koord').val(res[0].koord);
                    $('#telp_hp').val(res[0].telp_hp);
                    $('#telp_hp_koord').val(res[0].telp_hp_koord);
                    $('#email_koord').val(res[0].email_koord);
                    $('#jenis_pertanian').val(res[0].jenis_pertanian);
                    $('#jenis_tp').val(res[0].jenis_tp);
                    $('#jenis_hor').val(res[0].jenis_hor);
                    $('#jenis_bun').val(res[0].jenis_bun);
                    $('#jenis_nak').val(res[0].jenis_nak);
                    $('#jenis_pkh').val(res[0].jenis_pkh);
                    $('#jenis_ketahanan_pangan').val(res[0].jenis_ketahanan_pangan);
                    $('#jenis_pangan').val(res[0].jenis_pangan);
                    $('#bidang_luh').val(res[0].bidang_luh);
                    $('#nama_kabid').val(res[0].nama_kabid);
                    $('#hp_kabid').val(res[0].hp_kabid);
                    $('#seksi_luh').val(res[0].seksi_luh);
                    $('#nama_kasie').val(res[0].nama_kasie);
                    $('#hp_kasie').val(res[0].hp_kasie);
                    $('#uptd_luh').val(res[0].uptd_luh);
                    $('#nama_kauptd').val(res[0].nama_kauptd);
                    $('#hp_kauptd').val(res[0].hp_kauptd);
                    $('#nama_koord_penyuluh').val(res[0].nama_koord_penyuluh);
                    $('#nama_koord_penyuluh_thp').val(res[0].nama_koord_penyuluh_thp);
                    $('#koord_lainya_nip').val(res[0].koord_lainya_nip);
                    $('#koord_lainya_nama').val(res[0].koord_lainya_nama);
                    $('#kode_koord_penyuluh').val(res[0].kode_koord_penyuluh);
                    $("#btnSave").attr("id", "btnDoEdit");

                    $(document).delegate('#btnDoEdit', 'click', function() {
                        console.log('ok');

                        var id_gapoktan = $('#id_gapoktan').val();
                        var deskripsi_lembaga_lain = $('#deskripsi_lembaga_lain').val();
                        var nama_bapel = $('#nama_bapel').val();
                        var dasar_hukum = $('#dasar_hukum').val();
                        var no_peraturan = $('#no_peraturan').val();
                        var tgl_berdiri = $('#day').val();
                        var bln_berdiri = $('#month').val();
                        var thn_berdiri = $('#year').val();
                        var alamat = $('#alamat').val();
                        var telp_kantor = $('#telp_kantor').val();
                        var email = $('#email').val();
                        var website = $('#website').val();
                        var ketua = $('#ketua').val();
                        var telp_hp = $('#telp_hp').val();
                        var koord = $('#koord').val();

                        var telp_hp_koord = $('#telp_hp_koord').val();
                        var email_koord = $('#email_koord').val();
                        var jenis_pertanian = $('#jenis_pertanian').val();
                        var jenis_tp = $('#jenis_tp').val();
                        var jenis_hor = $('#jenis_hor').val();
                        var jenis_bun = $('#jenis_bun').val();
                        var jenis_nak = $('#jenis_nak').val();
                        var jenis_pkh = $('#jenis_pkh').val();
                        var jenis_ketahanan_pangan = $('#jenis_ketahanan_pangan').val();
                        var jenis_pangan = $('#jenis_pangan').val();

                        var bidang_luh = $('#bidang_luh').val();
                        var nama_kabid = $('#nama_kabid').val();
                        var hp_kabid = $('#hp_kabid').val();
                        var seksi_luh = $('#seksi_luh').val();
                        var nama_kasie = $('#nama_kasie').val();
                        var hp_kasie = $('#hp_kasie').val();
                        var uptd_luh = $('#uptd_luh').val();
                        var nama_kauptd = $('#nama_kauptd').val();
                        var hp_kauptd = $('#hp_kauptd').val();
                        var nama_koord_penyuluh = $('#nama_koord_penyuluh').val();
                        var nama_koord_penyuluh_thl = $('#nama_koord_penyuluh_thl').val();
                        var koord_lainya_nip = $('#koord_lainya_nip').val();
                        var koord_lainya_nama = $('#koord_lainya_nama').val();
                        var kode_koord_penyuluh = $('#kode_koord_penyuluh').val();

                        let formData = new FormData();
                        formData.append('id_gapoktan', id_gapoktan);
                        formData.append('nama_bapel', nama_bapel);
                        formData.append('deskripsi_lembaga_lain', deskripsi_lembaga_lain);
                        formData.append('dasar_hukum', dasar_hukum);
                        formData.append('no_peraturan', no_peraturan);
                        formData.append('tgl_berdiri', tgl_berdiri);
                        formData.append('bln_berdiri', bln_berdiri);
                        formData.append('thn_berdiri', thn_berdiri);
                        formData.append('alamat', alamat);
                        formData.append('telp_kantor', telp_kantor);
                        formData.append('email', email);
                        formData.append('website', website);
                        formData.append('ketua', ketua);
                        formData.append('koord', koord);
                        formData.append('telp_hp', telp_hp);
                        formData.append('telp_hp_koord', telp_hp_koord);
                        formData.append('email_koord', email_koord);
                        formData.append('jenis_pertanian', jenis_pertanian);
                        formData.append('jenis_tp', jenis_tp);
                        formData.append('jenis_hor', jenis_hor);
                        formData.append('jenis_bun', jenis_bun);
                        formData.append('jenis_nak', jenis_nak);
                        formData.append('jenis_pkh', jenis_pkh);
                        formData.append('jenis_ketahanan_pangan', jenis_ketahanan_pangan);
                        formData.append('jenis_pangan', jenis_pangan);
                        formData.append('bidang_luh', bidang_luh);
                        formData.append('nama_kabid', nama_kabid);
                        formData.append('hp_kabid', hp_kabid);
                        formData.append('seksi_luh', seksi_luh);
                        formData.append('nama_kasie', nama_kasie);
                        formData.append('hp_kasie', hp_kasie);
                        formData.append('uptd_luh', uptd_luh);
                        formData.append('nama_kauptd', nama_kauptd);
                        formData.append('hp_kauptd', hp_kauptd);
                        formData.append('nama_koord_penyuluh', nama_koord_penyuluh);
                        formData.append('nama_koord_penyuluh_thl', nama_koord_penyuluh_thl);
                        formData.append('koord_lainya_nip', koord_lainya_nip);
                        formData.append('koord_lainya_nama', koord_lainya_nama);
                        formData.append('kode_koord_penyuluh', kode_koord_penyuluh);

                        $.ajax({
                            url: '<?= base_url() ?>/profil/Lembaga/update/' + id_gapoktan,
                            type: "POST",
                            data: formData,
                            cache: false,
                            processData: false,
                            contentType: false,
                            success: function(result) {
                                $('#modal-form').modal('hide');
                                Swal.fire({
                                    title: 'Sukses',
                                    text: "Sukses edit data",
                                    type: 'success',
                                }).then((result) => {

                                    if (result.value) {
                                        location.reload();
                                    }
                                });

                            },
                            error: function(jqxhr, status, exception) {

                                Swal.fire({
                                    title: 'Error',
                                    text: "Gagal edit data",
                                    type: 'Error',
                                }).then((result) => {

                                    if (result.value) {
                                        location.reload();
                                    }
                                });

                            }
                        });
                    });

                }
            });

            $('.modal').on('hidden.bs.modal', function() {
                $(this).find('form')[0].reset();
            });

        });


        $(document).delegate('#btnSimpan', 'click', function() {
            var id_bapel = $('#id_bapel').val();
            var tahun = $('#tahun').val();
            var fasilitasi = $('#fasilitasi').val();
            var kegiatan = $('#kegiatan').val();

            $.ajax({
                url: '<?= base_url() ?>/profil/Lembaga/save/',
                type: 'POST',
                data: {
                    'id_bapel': id_bapel,
                    'tahun': tahun,
                    'fasilitasi': fasilitasi,
                    'kegiatan': kegiatan,
                },
                success: function(result) {
                    result = JSON.parse(result);
                    if (result.value) {
                        Swal.fire({
                            title: 'Sukses',
                            text: "Sukses tambah data",
                            type: 'success',
                        }).then((result) => {

                            if (result.value) {
                                location.reload();
                            }
                        });
                    } else {
                        Swal.fire({
                            title: 'Error',
                            text: "Gagal tambah data. " + result.message,
                            type: 'error',
                        }).then((result) => {

                        });
                    }
                },
                error: function(jqxhr, status, exception) {
                    Swal.fire({
                        title: 'Error',
                        text: "Gagal tambah data",
                        type: 'error',
                    }).then((result) => {
                        if (result.value) {
                            location.reload();
                        }
                    });
                }
            });
        });


        $(document).delegate('#btn-edit-fas', 'click', function() {
            //var myModal = new bootstrap.Modal(document.getElementById('modal-edit'), options);
            // alert(id);
            $.ajax({
                url: '<?= base_url() ?>/profil/Lembaga/fasilitas/' + $(this).data('id'),
                type: 'GET',
                dataType: 'JSON',
                success: function(res) {
                    // $(".daftpos").html(res)
                    //console.log(res);
                    //res = JSON.parse(res);

                    $('#id').val(res[0].id);
                    $('#id_bapel').val(res[0].id_bapel);
                    $('#fasilitasi').val(res[0].fasilitasi);
                    $('#kegiatan').val(res[0].kegiatan);
                    $('#tahun').val(res[0].tahun);
                    $("#btnSimpan").attr("id", "btnUbah");

                    $(document).delegate('#btnUbah', 'click', function() {
                        console.log('ok');

                        var id = $('#id').val();
                        var id_bapel = $('#id_bapel').val();
                        var fasilitasi = $('#fasilitasi').val();
                        var kegiatan = $('#kegiatan').val();
                        var tahun = $('#tahun').val();

                        let formData = new FormData();
                        formData.append('id', id);
                        formData.append('fasilitasi', fasilitasi);
                        formData.append('id_bapel', id_bapel);
                        formData.append('kegiatan', kegiatan);
                        formData.append('tahun', tahun);
                        $.ajax({
                            url: '<?= base_url() ?>/profil/Lembaga/updatefas/' + id,
                            type: "POST",
                            data: formData,
                            cache: false,
                            processData: false,
                            contentType: false,
                            success: function(result) {
                                $('#modal-form').modal('hide');
                                Swal.fire({
                                    title: 'Sukses',
                                    text: "Sukses edit data",
                                    type: 'success',
                                }).then((result) => {

                                    if (result.value) {
                                        location.reload();
                                    }
                                });

                            },
                            error: function(jqxhr, status, exception) {

                                Swal.fire({
                                    title: 'Error',
                                    text: "Gagal edit data",
                                    type: 'Error',
                                }).then((result) => {

                                    if (result.value) {
                                        location.reload();
                                    }
                                });

                            }
                        });
                    });

                }
            });

            $('.modal').on('hidden.bs.modal', function() {
                $(this).find('form')[0].reset();
            });

        });
    });
    $(document).delegate('#btn-hapus', 'click', function() {
        Swal.fire({
            title: 'Apakah anda yakin',
            text: "Data akan dihapus ?",
            type: 'warning',
            showCloseButton: true,
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Hapus Data!'
        }).then((result) => {
            if (result.value) {
                var id = $(this).data('id');

                $.ajax({
                    url: '<?= base_url() ?>/profil/Lembaga/delete/' + id,
                    type: 'POST',

                    success: function(result) {
                        Swal.fire({
                            title: 'Sukses',
                            text: "Sukses hapus data",
                            type: 'success',
                        }).then((result) => {

                            if (result.value) {
                                location.reload();
                            }
                        });
                    },
                    error: function(jqxhr, status, exception) {
                        Swal.fire({
                            title: 'Error',
                            text: "Gagal hapus data",
                            type: 'error',
                        }).then((result) => {
                            if (result.value) {
                                location.reload();
                            }
                        });
                    }
                });
            }
        });

    });

    function loadNamaKoordinator() {
        if ($('#inlineRadio1').is(':checked')) {
            $("#divPNS").show();
        } else {
            $("#divPNS").hide();
        }
        if ($('#inlineRadio2').is(':checked')) {
            $("#divTHL").show();
        } else {
            $("#divTHL").hide();
        }
        if ($('#inlineRadio3').is(':checked')) {
            $("#divST").show();
        } else {
            $("#divST").hide();
        }
    }

    $(document).ready(function() {
        loadNamaKoordinator();

        $(document).delegate('#inlineRadio1', 'click', function() {
            loadNamaKoordinator();
        });
        $(document).delegate('#inlineRadio2', 'click', function() {
            loadNamaKoordinator();
        });
        $(document).delegate('#inlineRadio3', 'click', function() {
            loadNamaKoordinator();
        });
    });
</script>

<?= $this->endSection() ?>