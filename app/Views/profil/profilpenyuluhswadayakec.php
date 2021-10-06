<?= $this->extend('layout/main_template') ?>

<?= $this->section('content') ?>
<div class="container-fluid py-4">
    <div class="row">
        <!-- Page Heading -->
        <div class="page-header min-height-150 border-radius-xl mt-4" style="background-image: url('<?= base_url(); ?>/assets/img/curved-images/curved0.jpg'); background-position-y: 50%;">
            <span class="mask bg-gradient-primary opacity-6"></span>
            <!-- <div class="card mb-3 col-lg-8 opacity-8">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="<?= base_url('assets/img/profile/default.jpg') ?>" class="card-img">
                    </div>
                    <div class="col-md-8 ">
                        <div class="card-body">
                            <h5 class="card-title">Nama Penyuluh</h5>
                            <p class="card-text">Email Penyuluh</p>
                            <p class="card-text"><small class="text-muted">Member since <?= date('d F Y'); ?></small></p>
                        </div>
                    </div>
                </div>
            </div> -->
        </div>
        <div class="card card-body blur shadow-blur mx-4 mt-n6 overflow-hidden">
            <div class="row gx-4">
                <div class="col-auto">
                    <div class="avatar avatar-xl position-relative">
                        <img src="<?= base_url('assets/img/profile/default.jpg') ?>" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
                    </div>
                </div>
                <div class="col-auto my-auto">
                    <div class="h-100">
                        <h5 class="mb-1">
                            <?= $dt['nama']; ?>
                        </h5>
                    </div>
                </div>

            </div>
        </div>



        <div class="row mt-3">

            <nav class="col-lg-12">
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Profil</button>
                    <button class="nav-link" id="nav-unker-tab" data-bs-toggle="tab" data-bs-target="#nav-unker" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Wilayah Kerja</button>
                    <button class="nav-link" id="nav-jabatan-tab" data-bs-toggle="tab" data-bs-target="#nav-jabatan" type="button" role="tab" aria-controls="nav-jabatan" aria-selected="false">Riwayat Jabatan</button>
                    <button class="nav-link" id="nav-pendidikan-tab" data-bs-toggle="tab" data-bs-target="#nav-pendidikan" type="button" role="tab" aria-controls="nav-pendidikan" aria-selected="false">Pendidikan</button>
                    <button class="nav-link" id="nav-pelatihan-tab" data-bs-toggle="tab" data-bs-target="#nav-pelatihan" type="button" role="tab" aria-controls="nav-pelatihan" aria-selected="false">Pelatihan</button>
                </div>
            </nav>
            <div class="tab-content " id="nav-tabContent">
                <div class="tab-pane  fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                    <div class="row">
                        <div class="col-lg-12 mb-lg-0 mb-4">
                            <div class="card">
                                <div class="card-body p-3">
                                    <div class="row">

                                        <div class="col-lg-8">

                                            <table class="table">

                                                <tbody>
                                                    <tr>
                                                        <td>Nama Lengkap</td>
                                                        <td>:</td>
                                                        <td><?= $dt['nama']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>NIK</td>
                                                        <td>:</td>
                                                        <td> <?= $dt['noktp']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Tempat/Tanggal Lahir </td>
                                                        <td>:</td>
                                                        <td><?= $dt['tempat_lahir'] . ' / ' . $dt['tgl_lahir']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Agama</td>
                                                        <td>:</td>
                                                        <td><?= $dt['agama']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Pendidikan Akhir</td>
                                                        <td>:</td>
                                                        <td><?= $dt['tingkat']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Alamat Email</td>
                                                        <td>:</td>
                                                        <td><?= $dt['email']; ?></td>
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

                <div class="tab-pane fade" id="nav-unker" role="tabpanel" aria-labelledby="nav-unker-tab">
                    <div class="row">
                        <div class="col-lg-12 mb-lg-0 mb-4">
                            <div class="card">
                                <div class="card-body p-3">
                                    <div class="row">

                                        <div class="col-lg-12">
                                            <ul class="list-group list-group-flush">
                                                <li class="list-group-item"><b>Unit Kerja : </b><?= $dt['nama_bpp'] ?></li>
                                                <li class="list-group-item"><b>Wilayah Kerja :</b>
                                                    <br>1. <?= $dt['wil_ker'] ?><br>
                                                    2. <?= $dt['wil_ker2'] ?><br>
                                                    3. <?= $dt['wil_ker3'] ?><br>
                                                    4. <?= $dt['wil_ker4'] ?><br>
                                                    5. <?= $dt['wil_ker5'] ?></p>
                                                </li>
                                                <li class="list-group-item"><b>Poktan Binaan :</b></li>

                                            </ul>
                                        </div>



                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="tab-pane fade" id="nav-jabatan" role="tabpanel" aria-labelledby="nav-jabatan-tab">Riwayat Jabatan</div>
                <div class="tab-pane fade" id="nav-pendidikan" role="tabpanel" aria-labelledby="nav-pendidikan-tab">Pendidikan</div>
                <div class="tab-pane fade" id="nav-pelatihan" role="tabpanel" aria-labelledby="nav-pelatihan-tab">
                    <div class="row">
                        <div class="col-lg-12 mb-lg-0 mb-4">
                            <div class="card">
                                <div class="card-body p-3">
                                    <div class="row">

                                        <div class="col-lg-8">

                                            <table class="table">

                                                <tbody>
                                                    <tr>
                                                        <td>Pelatihan 1</td>
                                                        <td>:</td>
                                                        <td><?= $dt['nm_pelatihan1']; ?> Tahun <?= $dt['tahun_pelatihan1']; ?></td>
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
            </div>

        </div>

        <?php echo view('layout/footer'); ?>

    </div>
</div>

<?= $this->endSection() ?>