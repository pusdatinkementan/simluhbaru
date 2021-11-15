<?= $this->extend('layout/main_template') ?>

<?= $this->section('content') ?>

<center>
    <h5> Daftar Kelembagaan Penyuluhan Pertanian Tingkat Kecamatan (BP3K) <br>Kecamatan <?= ucwords(strtolower($nama_kec)) ?> </h5>
</center>
<a href="#"><button type="button" class="btn bg-gradient-primary">+ Tambah Data</button></a>
<div class="card">
    <div class="table-responsive">
        <table class="table align-items-center mb-0">
            <thead>
                <tr>
                    <td width="5" class="text-uppercase text-secondary text-xxs font-weight-bolder">No</td>
                    <td width="180" class="text-uppercase text-secondary text-xxs font-weight-bolder">Nama Lembaga</td>
                    <td width="180" class="text-uppercase text-secondary text-xxs font-weight-bolder">Alamat</td>
                    <td width="300" class="text-uppercase text-secondary text-xxs font-weight-bolder">Wilayah<br>(Kecamatan)</td>
                    <td width="150" class="text-uppercase text-secondary text-xxs font-weight-bolder">Nama<br>Pimpinan</td>
                    <td width="150" class="text-uppercase text-secondary text-xxs font-weight-bolder" style="text-align: center;">Jumlah<br>Penyuluh<br>PNS</td>
                    <td width="150" class="text-uppercase text-secondary text-xxs font-weight-bolder" style="text-align: center;">Jumlah<br>Penyuluh<br>THL</td>
                    <td width="150" class="text-uppercase text-secondary text-xxs font-weight-bolder" style="text-align: center;">Jumlah<br>Penyuluh<br>Swadaya</td>
                    <td width="150" class="text-uppercase text-secondary text-xxs font-weight-bolder" style="text-align: center;">Jumlah<br>Poktan</td>
                    <td width="150" class="text-uppercase text-secondary text-xxs font-weight-bolder" style="text-align: center;">Jumlah<br>Gapoktan</td>
                    <td width="150" class="text-uppercase text-secondary text-xxs font-weight-bolder" style="text-align: center;">Jumlah<br>KEP</td>
                    <td width="190" class="text-uppercase text-secondary text-xxs font-weight-bolder" style="text-align: center;">Update<br>Terakhir</td>
                    <td width="160" class="text-secondary opacity-7"></td>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 1;
                foreach ($tabel_data as $row) {
                ?>

                    <tr>
                        <td class="align-middle text-center text-sm">
                            <p class="text-xs font-weight-bold mb-0"><?= $i++ ?></p>
                        </td>
                        <td>
                            <a href="<?= base_url('/detail_kecamatan?kode_kec=' . $row['id_daerah']) ?>">
                                <p class="text-xs font-weight-bold mb-0"><?= $row['nama_bpp'] ?></p>
                            </a>
                        </td>
                        <td>
                            <p class="text-xs font-weight-bold mb-0"><?= $row['alamat'] ?></p>
                        </td>
                        <td>
                            <p class="text-xs font-weight-bold mb-0">- <?= $row['deskripsi'] ?> .</p>
                        </td>
                        <td>
                            <p class="text-xs font-weight-bold mb-0"><?= $row['ketua'] ?></p>
                        </td>
                        <td class="align-middle text-center text-sm">
                            <p class="text-xs font-weight-bold mb-0"><?= $row['jumpns'] ?></p>
                        </td>
                        <td class="align-middle text-center text-sm">
                            <p class="text-xs font-weight-bold mb-0"><?= $row['jumthl'] ?></p>
                        </td>
                        <td class="align-middle text-center text-sm">
                            <p class="text-xs font-weight-bold mb-0"><?= $row['jumswa'] ?></p>
                        </td>
                        <td class="align-middle text-center text-sm">
                            <p class="text-xs font-weight-bold mb-0"><?= $row['jumpok'] ?></p>
                        </td>
                        <td class="align-middle text-center text-sm">
                            <p class="text-xs font-weight-bold mb-0"><?= $row['jumgap'] ?></p>
                        </td>
                        <td class="align-middle text-center text-sm">
                            <p class="text-xs font-weight-bold mb-0"><?= $row['jumkep'] ?></p>
                        </td>
                        <td class="align-middle text-center text-sm">
                            <p class="text-xs font-weight-bold mb-0"><?= $row['tgl_update'] ?></p>
                        </td>
                        <td class="align-middle text-center text-sm">
                            <a href="<?= base_url('/detail_kecamatan?kode_kec=' . $row['id_daerah']) ?>">
                                <button type="button" id="btn-edit" class="btn bg-gradient-warning btn-sm">
                                    <i class="fas fa-edit"></i> Ubah
                                </button>
                            </a>
                            <a href="<?= base_url('KelembagaanPenyuluhan/Kecamatan/Kecamatan/delete/' . $row['id']) ?>" onclick="return confirm('apakah anda ingin menghapus data ini?')">
                                <button type="button" class="btn bg-gradient-danger btn-sm">
                                    <i class="fas fa-trash"></i> Hapus
                                </button>
                            </a>
                        </td>
                    </tr>
                <?php
                }
                ?>
                <!-- Modal -->
                <div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                        <div class="modal-content">
                            <div class="modal-body p-0">
                                <div class="card card-plain">
                                    <div class="card-header pb-0 text-left">
                                        <h4 class="font-weight-bolder text-warning text-gradient">Ubah Data</h4>
                                    </div>
                                    <div class="card-body">
                                        <form role="form text-left">
                                            <label>Nama lembaga</label>
                                            <div class="input-group mb-3">
                                                <input type="email" class="form-control" placeholder="Email" aria-label="Email" aria-describedby="email-addon">
                                            </div>
                                            <label>Wilayah (Kecamatan)</label>
                                            <div class="input-group mb-3">
                                                <input type="email" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="password-addon">
                                            </div>
                                            <label>Nama Pimpinan</label>
                                            <div class="input-group mb-3">
                                                <input type="email" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="password-addon">
                                            </div>
                                            <div class="text-center">
                                                <button type="button" class="btn btn-round bg-gradient-warning btn-lg w-100 mt-4 mb-0">Simpan Data</button>
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
</tbody>
</table>
</div>
</div>

<?= $this->endSection() ?>