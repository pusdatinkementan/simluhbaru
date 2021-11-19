<?= $this->extend('layout/main_template') ?>

<?= $this->section('content') ?>

<div class="container-fluid py-4">
    <div class="row">
        <!-- Page Heading -->
        <div class="row">
            <nav class="col-lg-12">
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <button class="nav-link active" id="nav-bun-tab" data-bs-toggle="tab" data-bs-target="#nav-bun" type="button" role="tab" aria-controls="nav-bun" aria-selected="true">Perkebunan</button>
                    <button class="nav-link" id="nav-hor-tab" data-bs-toggle="tab" data-bs-target="#nav-hor" type="button" role="tab" aria-controls="nav-hor" aria-selected="false">Hortikultura</button>
                    <button class="nav-link" id="nav-nak-tab" data-bs-toggle="tab" data-bs-target="#nav-nak" type="button" role="tab" aria-controls="nav-nak" aria-selected="false">Peternakan</button>
                    <button class="nav-link" id="nav-olah-tab" data-bs-toggle="tab" data-bs-target="#nav-olah" type="button" role="tab" aria-controls="nav-olah" aria-selected="false">Pengolahan</button>
                    <button class="nav-link" id="nav-tp-tab" data-bs-toggle="tab" data-bs-target="#nav-tp" type="button" role="tab" aria-controls="nav-tp" aria-selected="false">Tanaman Pangan</button>
                </div>
            </nav>
            <div class="tab-content " id="nav-tabContent">

                <div class="tab-pane fade show active" id="nav-bun" role="tabpanel" aria-labelledby="nav-bun-tab">
                    <div class="row">
                        <div class="col-lg-12 mb-lg-0 mb-4">
                            <div class="card">
                                <div class="card-body p-3">
                                    <div class="row">
                                        <h1 class="h3 mb-4 text-gray-800">Perkebunan
                                            <i class="fas fa-edit" style="float: right;" data-bs-toggle="modal" data-bs-target="#modal-bun"></i></a>
                                        </h1>
                                        <div class="col-lg-12">
                                            <table class="table align-items-center mb-0">
                                                <thead>
                                                    <tr>
                                                        <td width="5" class="text-uppercase text-secondary text-xxs font-weight-bolder">ID Poktan</td>
                                                        <td width="100" class="text-uppercase text-secondary text-xxs font-weight-bolder">Komoditas Yang Di Usahakan</td>
                                                        <td width="100" class="text-secondary opacity-7"></td>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    foreach ($kebun as $kbn) {
                                                    ?>
                                                        <tr>
                                                            <td width="50">
                                                                <p class="text-xs font-weight-bold mb-0"><?= $kbn['id_poktan'] ?></p>
                                                            </td>
                                                            <td class="align-middle text-sm">
                                                                <p class="text-xs font-weight-bold mb-0"><?= $kbn['nama_subsektor'] ?> - <?= $kbn['nama_komoditas']; ?></p>
                                                            </td>
                                                            <td class="align-middle text-center text-sm">
                                                                <a href="#">
                                                                    <button type="button" id="btn-edit-bun" class="btn bg-gradient-warning btn-sm" data-id_usaha="<?= $kbn['id_usaha'] ?>">
                                                                        <i class="fas fa-edit"></i> Ubah
                                                                    </button>
                                                                </a>
                                                                <button type="button" id="btn-hapus-bun" data-id_usaha="<?= $kbn['id_usaha'] ?>" class="btn bg-gradient-danger btn-sm">
                                                                    <i class="fas fa-trash"></i> Hapus
                                                                </button>
                                                            </td>
                                                        </tr>
                                                    <?php
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="nav-hor" role="tabpanel" aria-labelledby="nav-hor-tab">
                    <div class="row">
                        <div class="col-lg-12 mb-lg-0 mb-4">
                            <div class="card">
                                <div class="card-body p-3">
                                    <div class="row">
                                        <h1 class="h3 mb-4 text-gray-800">Hortikultura
                                            <i class="fas fa-edit" style="float: right;" data-bs-toggle="modal" data-bs-target="#modal-hor"></i></a>
                                        </h1>
                                        <div class="col-lg-12">
                                            <table class="table align-items-center mb-0">
                                                <thead>
                                                    <tr>
                                                        <td width="5" class="text-uppercase text-secondary text-xxs font-weight-bolder">ID Poktan</td>
                                                        <td width="100" class="text-uppercase text-secondary text-xxs font-weight-bolder">Komoditas Yang Di Usahakan</td>
                                                        <td width="100" class="text-secondary opacity-7"></td>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    foreach ($horti as $h) {
                                                    ?>
                                                        <tr>
                                                            <td width="50">
                                                                <p class="text-xs font-weight-bold mb-0"><?= $h['id_poktan'] ?></p>
                                                            </td>
                                                            <td class="align-middle text-sm">
                                                                <p class="text-xs font-weight-bold mb-0"><?= $h['nama_subsektor'] ?> - <?= $h['nama_komoditas']; ?></p>
                                                            </td>
                                                            <td class="align-middle text-center text-sm">
                                                                <a href="#">
                                                                    <button type="button" id="btn-edit-hor" class="btn bg-gradient-warning btn-sm" data-id_usaha="<?= $h['id_usaha'] ?>">
                                                                        <i class="fas fa-edit"></i> Ubah
                                                                    </button>
                                                                </a>
                                                                <button type="button" id="btn-hapus-hor" data-id_usaha="<?= $h['id_usaha'] ?>" class="btn bg-gradient-danger btn-sm">
                                                                    <i class="fas fa-trash"></i> Hapus
                                                                </button>
                                                            </td>
                                                        </tr>
                                                    <?php
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="nav-nak" role="tabpanel" aria-labelledby="nav-nak-tab">
                    <div class="row">
                        <div class="col-lg-12 mb-lg-0 mb-4">
                            <div class="card">
                                <div class="card-body p-3">
                                    <div class="row">
                                        <h1 class="h3 mb-4 text-gray-800">Peternakan
                                            <i class="fas fa-edit" style="float: right;" data-bs-toggle="modal" data-bs-target="#modal-nak"></i></a>
                                        </h1>
                                        <div class="col-lg-12">
                                            <table class="table align-items-center mb-0">
                                                <thead>
                                                    <tr>
                                                        <td width="5" class="text-uppercase text-secondary text-xxs font-weight-bolder">ID Poktan</td>
                                                        <td width="100" class="text-uppercase text-secondary text-xxs font-weight-bolder">Komoditas Yang Di Usahakan</td>
                                                        <td width="100" class="text-secondary opacity-7"></td>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    foreach ($ternak as $trn) {
                                                    ?>
                                                        <tr>
                                                            <td width="50">
                                                                <p class="text-xs font-weight-bold mb-0"><?= $trn['id_poktan'] ?></p>
                                                            </td>
                                                            <td class="align-middle text-sm">
                                                                <p class="text-xs font-weight-bold mb-0"><?= $trn['nama_subsektor'] ?> - <?= $trn['nama_komoditas']; ?></p>
                                                            </td>
                                                            <td class="align-middle text-center text-sm">
                                                                <a href="#">
                                                                    <button type="button" id="btn-edit-nak" class="btn bg-gradient-warning btn-sm" data-id_usaha="<?= $trn['id_usaha'] ?>">
                                                                        <i class="fas fa-edit"></i> Ubah
                                                                    </button>
                                                                </a>
                                                                <button type="button" id="btn-hapus-nak" data-id_usaha="<?= $trn['id_usaha'] ?>" class="btn bg-gradient-danger btn-sm">
                                                                    <i class="fas fa-trash"></i> Hapus
                                                                </button>
                                                            </td>
                                                        </tr>
                                                    <?php
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="nav-olah" role="tabpanel" aria-labelledby="nav-olah-tab">
                    <div class="row">
                        <div class="col-lg-12 mb-lg-0 mb-4">
                            <div class="card">
                                <div class="card-body p-3">
                                    <div class="row">
                                        <h1 class="h3 mb-4 text-gray-800">Pengolahan
                                            <i class="fas fa-edit" style="float: right;" data-bs-toggle="modal" data-bs-target="#modal-olah"></i></a>
                                        </h1>
                                        <div class="col-lg-12">
                                            <table class="table align-items-center mb-0">
                                                <thead>
                                                    <tr>
                                                        <td width="5" class="text-uppercase text-secondary text-xxs font-weight-bolder">ID Poktan</td>
                                                        <td width="100" class="text-uppercase text-secondary text-xxs font-weight-bolder">Komoditas Yang Di Usahakan</td>
                                                        <td width="100" class="text-secondary opacity-7"></td>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    foreach ($olah as $ol) {
                                                    ?>
                                                        <tr>
                                                            <td width="50">
                                                                <p class="text-xs font-weight-bold mb-0"><?= $ol['id_poktan'] ?></p>
                                                            </td>
                                                            <td class="align-middle text-sm">
                                                                <p class="text-xs font-weight-bold mb-0"><?= $ol['nama_subsektor'] ?> - <?= $ol['nama_komoditas']; ?></p>
                                                            </td>
                                                            <td class="align-middle text-center text-sm">
                                                                <a href="#">
                                                                    <button type="button" id="btn-edit-olah" class="btn bg-gradient-warning btn-sm" data-id_usaha="<?= $ol['id_usaha'] ?>">
                                                                        <i class="fas fa-edit"></i> Ubah
                                                                    </button>
                                                                </a>
                                                                <button type="button" id="btn-hapus-olah" data-id_usaha="<?= $ol['id_usaha'] ?>" class="btn bg-gradient-danger btn-sm">
                                                                    <i class="fas fa-trash"></i> Hapus
                                                                </button>
                                                            </td>
                                                        </tr>
                                                    <?php
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="nav-tp" role="tabpanel" aria-labelledby="nav-tp-tab">
                    <div class="row">
                        <div class="col-lg-12 mb-lg-0 mb-4">
                            <div class="card">
                                <div class="card-body p-3">
                                    <div class="row">
                                        <h1 class="h3 mb-4 text-gray-800">Tanaman Pangan
                                            <i class="fas fa-edit" style="float: right;" data-bs-toggle="modal" data-bs-target="#modal-tp"></i></a>
                                        </h1>
                                        <div class="col-lg-12">
                                            <table class="table align-items-center mb-0">
                                                <thead>
                                                    <tr>
                                                        <td width="5" class="text-uppercase text-secondary text-xxs font-weight-bolder">ID Poktan</td>
                                                        <td width="100" class="text-uppercase text-secondary text-xxs font-weight-bolder">Komoditas Yang Di Usahakan</td>
                                                        <td width="100" class="text-secondary opacity-7"></td>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    foreach ($tapang as $tpg) {
                                                    ?>
                                                        <tr>
                                                            <td width="50">
                                                                <p class="text-xs font-weight-bold mb-0"><?= $tpg['id_poktan'] ?></p>
                                                            </td>
                                                            <td class="align-middle text-sm">
                                                                <p class="text-xs font-weight-bold mb-0"><?= $tpg['nama_subsektor'] ?> - <?= $tpg['nama_komoditas']; ?></p>
                                                            </td>
                                                            <td class="align-middle text-center text-sm">
                                                                <a href="#">
                                                                    <button type="button" id="btn-edit-tp" class="btn bg-gradient-warning btn-sm" data-id_usaha="<?= $tpg['id_usaha'] ?>">
                                                                        <i class="fas fa-edit"></i> Ubah
                                                                    </button>
                                                                </a>
                                                                <button type="button" id="btn-hapus-tp" data-id_usaha="<?= $tpg['id_usaha'] ?>" class="btn bg-gradient-danger btn-sm">
                                                                    <i class="fas fa-trash"></i> Hapus
                                                                </button>
                                                            </td>
                                                        </tr>
                                                    <?php
                                                    }
                                                    ?>
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
            <div class="modal fade" id="modal-bun" tabindex="-1" role="dialog" aria-labelledby="modal-bun" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-l" role="document">
                    <div class="modal-content">
                        <div class="modal-body p-0">
                            <div class="card card-plain">
                                <div class="card-header pb-0 text-left">
                                    <h4 class="font-weight-bolder text-warning text-gradient" id="judul_form">Tambah Data </h4>
                                </div>
                                <div class="card-body">

                                    <form role="form text-left" action="<?= base_url('KelembagaanPelakuUtama/KelompokTani/JenisKomoditasDiusahakan/saveBun'); ?>">
                                        <div class="row">
                                            <div class="col">
                                                <input type="hidden" name="id_usaha" id="id_usaha">
                                                <input type="hidden" name="sektor" id="sektor" value="bun">
                                                <input type="hidden" name="id_poktan" id="id_poktan" value="<?= $id_poktan; ?>">

                                                <label for="jum_petani">Komoditas Lainnya</label>
                                                <div class="input-group mb-3">
                                                    <select name="kode_komoditas_bun" id="kode_komoditas_bun" class="form-control input-lg">
                                                        <option value="">Pilih Komoditas</option>
                                                        <?php
                                                        foreach ($bun as $b) {
                                                            echo '<option value="' . $b["kode_komoditas"] . '">' . $b["nama_subsektor"] . ' - ' . $b["nama_komoditas"] . '</option>';
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="button" id="btnSaveBun" class="btn bg-gradient-primary">Simpan Data</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="modal-hor" tabindex="-1" role="dialog" aria-labelledby="modal-hor" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-l" role="document">
                    <div class="modal-content">
                        <div class="modal-body p-0">
                            <div class="card card-plain">
                                <div class="card-header pb-0 text-left">
                                    <h4 class="font-weight-bolder text-warning text-gradient" id="judul_form">Tambah Data </h4>
                                </div>
                                <div class="card-body">

                                    <form role="form text-left">
                                        <div class="row">
                                            <div class="col">
                                                <input type="hidden" name="id_usaha" id="id_usaha">
                                                <input type="hidden" name="sektor" id="sektor" value="hor">
                                                <input type="hidden" name="id_poktan" id="id_poktan" value="<?= $id_poktan; ?>">

                                                <label for="jum_petani">Komoditas Lainnya</label>
                                                <div class="input-group mb-3">
                                                    <select name="kode_komoditas_hor" id="kode_komoditas_hor" class="form-control input-lg">
                                                        <option value="">Pilih Komoditas</option>
                                                        <?php
                                                        foreach ($hor as $h) {
                                                            echo '<option value="' . $h["kode_komoditas"] . '">' . $h["nama_subsektor"] . ' - ' . $h["nama_komoditas"] . '</option>';
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="button" id="btnSaveHor" class="btn bg-gradient-primary">Simpan Data</button>
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

        <div class="modal fade" id="modal-nak" tabindex="-1" role="dialog" aria-labelledby="modal-nak" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-l" role="document">
                <div class="modal-content">
                    <div class="modal-body p-0">
                        <div class="card card-plain">
                            <div class="card-header pb-0 text-left">
                                <h4 class="font-weight-bolder text-warning text-gradient" id="judul_form">Tambah Data</h4>
                            </div>
                            <div class="card-body">

                                <form role="form text-left" action="<?= base_url('KelembagaanPelakuUtama/KelompokTani/JenisKomoditasDiusahakan/saveBun'); ?>">
                                    <div class="row">
                                        <div class="col">
                                            <input type="hidden" name="id_usaha" id="id_usaha">
                                            <input type="hidden" name="sektor" id="sektor" value="nak">
                                            <input type="hidden" name="id_poktan" id="id_poktan" value="<?= $id_poktan; ?>">

                                            <label for="jum_petani">Komoditas Lainnya</label>
                                            <div class="input-group mb-3">
                                                <select name="kode_komoditas_nak" id="kode_komoditas_nak" class="form-control input-lg">
                                                    <option value="">Pilih Komoditas</option>
                                                    <?php
                                                    foreach ($nak as $n) {
                                                        echo '<option value="' . $n["kode_komoditas"] . '">' . $n["nama_subsektor"] . ' - ' . $n["nama_komoditas"] . '</option>';
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="button" id="btnSaveNak" class="btn bg-gradient-primary">Simpan Data</button>
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

    <div class="modal fade" id="modal-olah" tabindex="-1" role="dialog" aria-labelledby="modal-olah" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-l" role="document">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="card card-plain">
                        <div class="card-header pb-0 text-left">
                            <h4 class="font-weight-bolder text-warning text-gradient" id="judul_form">Tambah Data</h4>
                        </div>
                        <div class="card-body">

                            <form role="form text-left" action="<?= base_url('KelembagaanPelakuUtama/KelompokTani/JenisKomoditasDiusahakan/saveBun'); ?>">
                                <div class="row">
                                    <div class="col">
                                        <input type="hidden" name="id_usaha" id="id_usaha">
                                        <input type="hidden" name="sektor" id="sektor" value="olah">
                                        <input type="hidden" name="id_poktan" id="id_poktan" value="<?= $id_poktan; ?>">

                                        <label for="jum_petani">Komoditas Lainnya</label>
                                        <div class="input-group mb-3">
                                            <select name="kode_komoditas_olah" id="kode_komoditas_olah" class="form-control input-lg">
                                                <option value="">Pilih Komoditas</option>
                                                <?php
                                                foreach ($olh as $o) {
                                                    echo '<option value="' . $o["kode_komoditas"] . '">' . $o["nama_subsektor"] . ' - ' . $o["nama_komoditas"] . '</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="button" id="btnSaveOlah" class="btn bg-gradient-primary">Simpan Data</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-tp" tabindex="-1" role="dialog" aria-labelledby="modal-tp" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-l" role="document">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="card card-plain">
                        <div class="card-header pb-0 text-left">
                            <h4 class="font-weight-bolder text-warning text-gradient" id="judul_form">Tambah Data</h4>
                        </div>
                        <div class="card-body">

                            <form role="form text-left" action="<?= base_url('KelembagaanPelakuUtama/KelompokTani/JenisKomoditasDiusahakan/saveBun'); ?>">
                                <div class="row">
                                    <div class="col">
                                        <input type="hidden" name="id_usaha" id="id_usaha">
                                        <input type="hidden" name="sektor" id="sektor" value="tp">
                                        <input type="hidden" name="id_poktan" id="id_poktan" value="<?= $id_poktan; ?>">

                                        <label for="jum_petani">Komoditas Lainnya</label>
                                        <div class="input-group mb-3">
                                            <select name="kode_komoditas_tp" id="kode_komoditas_tp" class="form-control input-lg">
                                                <option value="">Pilih Komoditas</option>
                                                <?php
                                                foreach ($tp as $t) {
                                                    echo '<option value="' . $t["kode_komoditas"] . '">' . $t["nama_subsektor"] . ' - ' . $t["nama_komoditas"] . '</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="button" id="btnSaveTp" class="btn bg-gradient-primary">Simpan Data</button>
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
    $(document).delegate('#btnSaveBun', 'click', function() {
        var id_poktan = $('#id_poktan').val();
        var sektor = $('#sektor').val();
        var kode_komoditas_bun = $('#kode_komoditas_bun').val();


        $.ajax({
            url: '<?= base_url() ?>/KelembagaanPelakuUtama/KelompokTani/JenisKomoditasDiusahakan/saveBun/',
            type: 'POST',
            data: {
                'id_poktan': id_poktan,
                'kode_komoditas_bun': kode_komoditas_bun,
                'sektor': sektor,
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


    $(document).delegate('#btn-edit-bun', 'click', function() {
        //var myModal = new bootstrap.Modal(document.getElementById('modal-edit'), options);
        // alert(id);
        $.ajax({
            url: '<?= base_url() ?>/KelembagaanPelakuUtama/KelompokTani/JenisKomoditasDiusahakan/detailBun/' + $(this).data('id_usaha'),
            type: 'GET',
            dataType: 'JSON',
            success: function(result) {
                //alert($(this).data('id_usaha'));
                // $(".daftpos").html(res)
                //console.log(res);
                //res = JSON.parse(res);

                $('#id_usaha').val(result.id_usaha);
                $('#id_poktan').val(result.id_poktan);
                $('#kode_komoditas_bun').val(result.kode_komoditas_bun);
                $('#sektor').val(result.sektor);
                $('#modal-bun').modal("show");
                $('#judul-form').text('Edit Data');
                $("#btnSaveBun").attr("id", "btnUbahBun");

                $(document).delegate('#btnUbahBun', 'click', function() {
                    console.log('ok');

                    var id_usaha = $('#id_usaha').val();
                    var id_poktan = $('#id_poktan').val();
                    var kode_komoditas_bun = $('#kode_komoditas_bun').val();
                    var sektor = $('#sektor').val();

                    let formData = new FormData();
                    formData.append('id_usaha', id_usaha);
                    formData.append('id_poktan', id_poktan);
                    formData.append('kode_komoditas_bun', kode_komoditas_bun);
                    formData.append('sektor', sektor);
                    $.ajax({
                        url: '<?= base_url() ?>/KelembagaanPelakuUtama/KelompokTani/JenisKomoditasDiusahakan/updateBun/' + id_usaha,
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

    $(document).delegate('#btn-hapus-bun', 'click', function() {
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
                var id_usaha = $(this).data('id_usaha');

                $.ajax({
                    url: '<?= base_url() ?>/KelembagaanPelakuUtama/KelompokTani/JenisKomoditasDiusahakan/deleteBun/' + id_usaha,
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
</script>

<script>
    $(document).delegate('#btnSaveHor', 'click', function() {
        var id_poktan = $('#id_poktan').val();
        var sektor = $('#sektor').val();
        var kode_komoditas_hor = $('#kode_komoditas_hor').val();


        $.ajax({
            url: '<?= base_url() ?>/KelembagaanPelakuUtama/KelompokTani/JenisKomoditasDiusahakan/saveHor/',
            type: 'POST',
            data: {
                'id_poktan': id_poktan,
                'kode_komoditas_hor': kode_komoditas_hor,
                'sektor': sektor,
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


    $(document).delegate('#btn-edit-hor', 'click', function() {
        //var myModal = new bootstrap.Modal(document.getElementById('modal-edit'), options);
        // alert(id);
        $.ajax({
            url: '<?= base_url() ?>/KelembagaanPelakuUtama/KelompokTani/JenisKomoditasDiusahakan/detailHor/' + $(this).data('id_usaha'),
            type: 'GET',
            dataType: 'JSON',
            success: function(result) {
                //alert($(this).data('id_usaha'));
                // $(".daftpos").html(res)
                //console.log(res);
                //res = JSON.parse(res);

                $('#id_usaha').val(result.id_usaha);
                $('#id_poktan').val(result.id_poktan);
                $('#kode_komoditas_hor').val(result.kode_komoditas_hor);
                $('#sektor').val(result.sektor);
                $('#modal-hor').modal("show");
                $('#judul-form').text('Edit Data');
                $("#btnSaveHor").attr("id", "btnUbahHor");

                $(document).delegate('#btnUbahHor', 'click', function() {
                    console.log('ok');

                    var id_usaha = $('#id_usaha').val();
                    var id_poktan = $('#id_poktan').val();
                    var kode_komoditas_hor = $('#kode_komoditas_hor').val();
                    var sektor = $('#sektor').val();

                    let formData = new FormData();
                    formData.append('id_usaha', id_usaha);
                    formData.append('id_poktan', id_poktan);
                    formData.append('kode_komoditas_hor', kode_komoditas_hor);
                    formData.append('sektor', sektor);
                    $.ajax({
                        url: '<?= base_url() ?>/KelembagaanPelakuUtama/KelompokTani/JenisKomoditasDiusahakan/updateHor/' + id_usaha,
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

    $(document).delegate('#btn-hapus-hor', 'click', function() {
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
                var id_usaha = $(this).data('id_usaha');

                $.ajax({
                    url: '<?= base_url() ?>/KelembagaanPelakuUtama/KelompokTani/JenisKomoditasDiusahakan/deleteHor/' + id_usaha,
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
</script>

<script>
    $(document).delegate('#btnSaveNak', 'click', function() {
        var id_poktan = $('#id_poktan').val();
        var sektor = $('#sektor').val();
        var kode_komoditas_nak = $('#kode_komoditas_nak').val();


        $.ajax({
            url: '<?= base_url() ?>/KelembagaanPelakuUtama/KelompokTani/JenisKomoditasDiusahakan/saveNak/',
            type: 'POST',
            data: {
                'id_poktan': id_poktan,
                'kode_komoditas_nak': kode_komoditas_nak,
                'sektor': sektor,
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


    $(document).delegate('#btn-edit-nak', 'click', function() {
        //var myModal = new bootstrap.Modal(document.getElementById('modal-edit'), options);
        // alert(id);
        $.ajax({
            url: '<?= base_url() ?>/KelembagaanPelakuUtama/KelompokTani/JenisKomoditasDiusahakan/detailNak/' + $(this).data('id_usaha'),
            type: 'GET',
            dataType: 'JSON',
            success: function(result) {
                //alert($(this).data('id_usaha'));
                // $(".daftpos").html(res)
                //console.log(res);
                //res = JSON.parse(res);

                $('#id_usaha').val(result.id_usaha);
                $('#id_poktan').val(result.id_poktan);
                $('#kode_komoditas_nak').val(result.kode_komoditas_nak);
                $('#sektor').val(result.sektor);
                $('#modal-nak').modal("show");
                $('#judul-form').text('Edit Data');
                $("#btnSaveNak").attr("id", "btnUbahNak");

                $(document).delegate('#btnUbahNak', 'click', function() {
                    console.log('ok');

                    var id_usaha = $('#id_usaha').val();
                    var id_poktan = $('#id_poktan').val();
                    var kode_komoditas_nak = $('#kode_komoditas_nak').val();
                    var sektor = $('#sektor').val();

                    let formData = new FormData();
                    formData.append('id_usaha', id_usaha);
                    formData.append('id_poktan', id_poktan);
                    formData.append('kode_komoditas_nak', kode_komoditas_nak);
                    formData.append('sektor', sektor);
                    $.ajax({
                        url: '<?= base_url() ?>/KelembagaanPelakuUtama/KelompokTani/JenisKomoditasDiusahakan/updateNak/' + id_usaha,
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

    $(document).delegate('#btn-hapus-nak', 'click', function() {
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
                var id_usaha = $(this).data('id_usaha');

                $.ajax({
                    url: '<?= base_url() ?>/KelembagaanPelakuUtama/KelompokTani/JenisKomoditasDiusahakan/deleteNak/' + id_usaha,
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
</script>

<script>
    $(document).delegate('#btnSaveOlah', 'click', function() {
        var id_poktan = $('#id_poktan').val();
        var sektor = $('#sektor').val();
        var kode_komoditas_olah = $('#kode_komoditas_olah').val();


        $.ajax({
            url: '<?= base_url() ?>/KelembagaanPelakuUtama/KelompokTani/JenisKomoditasDiusahakan/saveOlah/',
            type: 'POST',
            data: {
                'id_poktan': id_poktan,
                'kode_komoditas_olah': kode_komoditas_olah,
                'sektor': sektor,
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


    $(document).delegate('#btn-edit-olah', 'click', function() {
        //var myModal = new bootstrap.Modal(document.getElementById('modal-edit'), options);
        // alert(id);
        $.ajax({
            url: '<?= base_url() ?>/KelembagaanPelakuUtama/KelompokTani/JenisKomoditasDiusahakan/detailOlah/' + $(this).data('id_usaha'),
            type: 'GET',
            dataType: 'JSON',
            success: function(result) {
                //alert($(this).data('id_usaha'));
                // $(".daftpos").html(res)
                //console.log(res);
                //res = JSON.parse(res);

                $('#id_usaha').val(result.id_usaha);
                $('#id_poktan').val(result.id_poktan);
                $('#kode_komoditas_olah').val(result.kode_komoditas_olah);
                $('#sektor').val(result.sektor);
                $('#modal-olah').modal("show");
                $('#judul-form').text('Edit Data');
                $("#btnSaveOlah").attr("id", "btnUbahOlah");

                $(document).delegate('#btnUbahOlah', 'click', function() {
                    console.log('ok');

                    var id_usaha = $('#id_usaha').val();
                    var id_poktan = $('#id_poktan').val();
                    var kode_komoditas_olah = $('#kode_komoditas_olah').val();
                    var sektor = $('#sektor').val();

                    let formData = new FormData();
                    formData.append('id_usaha', id_usaha);
                    formData.append('id_poktan', id_poktan);
                    formData.append('kode_komoditas_olah', kode_komoditas_olah);
                    formData.append('sektor', sektor);
                    $.ajax({
                        url: '<?= base_url() ?>/KelembagaanPelakuUtama/KelompokTani/JenisKomoditasDiusahakan/updateOlah/' + id_usaha,
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

    $(document).delegate('#btn-hapus-olah', 'click', function() {
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
                var id_usaha = $(this).data('id_usaha');

                $.ajax({
                    url: '<?= base_url() ?>/KelembagaanPelakuUtama/KelompokTani/JenisKomoditasDiusahakan/deleteOlah/' + id_usaha,
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
</script>

<script>
    $(document).delegate('#btnSaveTp', 'click', function() {
        var id_poktan = $('#id_poktan').val();
        var sektor = $('#sektor').val();
        var kode_komoditas_tp = $('#kode_komoditas_tp').val();


        $.ajax({
            url: '<?= base_url() ?>/KelembagaanPelakuUtama/KelompokTani/JenisKomoditasDiusahakan/saveTp/',
            type: 'POST',
            data: {
                'id_poktan': id_poktan,
                'kode_komoditas_tp': kode_komoditas_tp,
                'sektor': sektor,
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


    $(document).delegate('#btn-edit-tp', 'click', function() {
        //var myModal = new bootstrap.Modal(document.getElementById('modal-edit'), options);
        // alert(id);
        $.ajax({
            url: '<?= base_url() ?>/KelembagaanPelakuUtama/KelompokTani/JenisKomoditasDiusahakan/detailTp/' + $(this).data('id_usaha'),
            type: 'GET',
            dataType: 'JSON',
            success: function(result) {
                //alert($(this).data('id_usaha'));
                // $(".daftpos").html(res)
                //console.log(res);
                //res = JSON.parse(res);

                $('#id_usaha').val(result.id_usaha);
                $('#id_poktan').val(result.id_poktan);
                $('#kode_komoditas_tp').val(result.kode_komoditas_tp);
                $('#sektor').val(result.sektor);
                $('#modal-tp').modal("show");
                $('#judul-form').text('Edit Data');
                $("#btnSaveTp").attr("id", "btnUbahTp");

                $(document).delegate('#btnUbahTp', 'click', function() {
                    console.log('ok');

                    var id_usaha = $('#id_usaha').val();
                    var id_poktan = $('#id_poktan').val();
                    var kode_komoditas_tp = $('#kode_komoditas_tp').val();
                    var sektor = $('#sektor').val();

                    let formData = new FormData();
                    formData.append('id_usaha', id_usaha);
                    formData.append('id_poktan', id_poktan);
                    formData.append('kode_komoditas_tp', kode_komoditas_tp);
                    formData.append('sektor', sektor);
                    $.ajax({
                        url: '<?= base_url() ?>/KelembagaanPelakuUtama/KelompokTani/JenisKomoditasDiusahakan/updateTp/' + id_usaha,
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

    $(document).delegate('#btn-hapus-tp', 'click', function() {
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
                var id_usaha = $(this).data('id_usaha');

                $.ajax({
                    url: '<?= base_url() ?>/KelembagaanPelakuUtama/KelompokTani/JenisKomoditasDiusahakan/deleteTp/' + id_usaha,
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
</script>
<?= $this->endSection() ?>