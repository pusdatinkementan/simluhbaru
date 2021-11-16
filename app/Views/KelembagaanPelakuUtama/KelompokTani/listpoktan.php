<?= $this->extend('layout/main_template') ?>

<?= $this->section('content') ?>


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
?>
<center><h2> Daftar Kelompok di Tani Kecamatan <?= ucwords(strtolower($nama_kecamatan)) ?> </h2></center>

<center><h4>Data ditemukan <?= ucwords(strtolower($jum)) ?> </h2></center>
<button type="button" data-bs-toggle="modal" data-bs-target="#modal-form" class="btn bg-gradient-primary btn-sm">+ Tambah Data</button>
<div class="card">
    <div class="table-responsive">
        <table class="table align-items-center mb-0">
            <thead>
                <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder" style="text-align: center;">No</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder" style="text-align: center;">Nama Desa</th>
                    
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder" style="text-align: center;">ID Poktan</th>
                    
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder" style="text-align: center;">Nama Poktan</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder" style="text-align: center;">Nama Ketua</th>
                   
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder" style="text-align: center;">Alamat Sekretariat</th>
                   
                    <th class="text-secondary opacity-7"></th>
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
                    
                    <td class="align-middle text-center text-sm">
                        <p class="text-xs font-weight-bold mb-0"><?= $row['nm_desa'] ?></p>
                    </td>
                    <td class="align-middle text-center text-sm">
                        <p class="text-xs font-weight-bold mb-0"><?= $row['id_poktan'] ?></p>
                    </td>
                    <td class="align-middle text-center text-sm">
                        <p class="text-xs font-weight-bold mb-0"><?= $row['nama_poktan'] ?></p>
                    </td>
                    <td class="align-middle text-center text-sm">
                        <p class="text-xs font-weight-bold mb-0"><?= $row['ketua_poktan'] ?></p>
                    </td>
                    <td class="align-middle text-center text-sm">
                        <p class="text-xs font-weight-bold mb-0"><?= $row['alamat'] ?></p>
                    </td>
                    <td class="align-middle text-center text-sm">
                            
                                <button type="button"  data-id_poktan="<?= $row['id_poktan'] ?>" id="btnEditPok" class="btn bg-gradient-warning btn-sm">
                                    <i class="fas fa-edit"></i> Ubah
                                </button>
                            
                           
                                <button class="btn btn-danger btn-sm" id="btnHapus" data-id_poktan="<?= $row['id_poktan'] ?>" type="button" >
                                <i class="fas fa-trash"></i> Hapus
                            </button>
                           
                            
                            <button type="button" class="btn bg-gradient-primary btn-sm">
                            <a href="<?= base_url('/listpoktananggota?ip=' . $row['id_poktan']) ?>">
                                <i class="ni ni-fat-add"></i> +Tambah Anggota
                            </button>
                         
                            
                            <button type="button" class="btn bg-gradient-info btn-sm">
                            <a href="<?= base_url('/listbantu?ip=' . $row['id_poktan']) ?>"> 
                                 +Tambah Bantuan
                            </button>
                            
                        </td>
                </tr>
            <?php
            }
            ?>

            </tbody>
        </table>
        <div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                            <div class="modal-content">
                                <div class="modal-body p-0">
                                    <div class="card card-plain">
                                        <div class="card-header pb-0 text-left">
                                            <h4 class="font-weight-bolder text-warning text-gradient">Tambah Data</h4>
                                        </div>
                                        <div class="card-body">
                                        <form role="form text-left" action="<?= base_url('/KelembagaanPelakuUtama/KelompokTani/ListPokTan/save'); ?>" method="post" enctype="multipart/form-data">
                                            <? csrf_field(); ?>
                                    <div class="row">
                                        <div class="col-5" mt-5>
                                            <label>Kecamatan</label>
                                            <div class="input-group mb-3">
                                            <input type="text" class="form-control" id="deskripsi" name="deskripsi" placeholder="Kecamatan" value="<?= $nama_kecamatan; ?>" disabled>
                                            </div>
                                            <label>Desa</label>
                                            <div class="input-group mb-3">
                                               <select name="kode_desa" id="kode_desa"  class="form-control input-lg">
                                                            <option value="">Pilih Desa</option>
                                                            <?php
                                                            foreach ($desa as $row2) {
                                                                echo '<option value="' . $row2["id_desa"] . '">' . $row2["nm_desa"] . '</option>';
                                                            }
                                                            ?>
                                                        </select>
                                            </div>
                                            <label>Nama Poktan</label>
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" id="nama_poktan" name="nama_poktan" placeholder="Nama Poktan" aria-label="Password" aria-describedby="password-addon">
                                            </div>
                                            <label>Nama Ketua</label>
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" id="ketua_poktan" name="ketua_poktan" placeholder="Nama Ketua" aria-label="Password" aria-describedby="password-addon">
                                            </div>
                                            <label>Alamat Lengkap Sekretariat</label>
                                                <textarea class="form-control" id="alamat" placeholder="Alamat" name="alamat" aria-label="Password" aria-describedby="password-addon"></textarea>
                                            <label>Tahun Pembentukan</label>
                                            <div class="input-group mb-3">
                                                <select id="year" class="form-select"  aria-label="Default select example" name="simluh_tahun_bentuk">
                                                    <option selected>Pilih Tahun</option>
                                                    
                                                </select>
                                            </div>
                                            <label>Status</label>
                                            <div class="input-group mb-3">
                                                <select class="form-select" id="status" name="status" aria-label="Default select example">
                                                    <option selected>Pilih  </option>
                                                    <option value="1">Aktif</option>
                                                    <option value="2">Tidak aktif</option>
                                                    <option value="3">Bergabung Dengan Kelompok Lain</option>
                                                </select>
                                            </div>  

                                                        </div>
                                            <div class="col">

                                            <label>Jenis Kelompok Lainnya</label>
                                            <div class="form-check">
                                                 <input class="form-check-input simluh_jenis_kelompok_perempuan" type="checkbox" value="perempuan" name="simluh_jenis_kelompok_perempuan" id="simluh_jenis_kelompok_perempuan" >
                                                    <label class="form-check-label" for="simluh_jenis_kelompok_perempuan">
                                                   Perempuan
                                                    </label>
                                                    </div>
                                                <div class="form-check">
                                                    <input class="form-check-input simluh_jenis_kelompok_domisili" type="checkbox" value="domisili" name="simluh_jenis_kelompok_domisili" id="simluh_jenis_kelompok_domisili" >
                                                        <label class="form-check-label" for="simluh_jenis_kelompok_domisili">
                                                             Domisili
                                                         </label>
                                                </div> 
                                                <div class="form-check">
                                                    <input class="form-check-input simluh_jenis_kelompok_upja" type="checkbox" value="upja" name="simluh_jenis_kelompok_upja" id="simluh_jenis_kelompok_upja" >
                                                        <label class="form-check-label" for="simluh_jenis_kelompok_upja">
                                                             UPJA
                                                         </label>
                                                </div> 
                                                <div class="form-check">
                                                    <input class="form-check-input simluh_jenis_kelompok_p3a" type="checkbox" value="p3a" name="simluh_jenis_kelompok_p3a" id="simluh_jenis_kelompok_p3a" >
                                                        <label class="form-check-label" for="simluh_jenis_kelompok_p3a">
                                                             P3A/HIPPA
                                                         </label>
                                                </div> 
                                                <div class="form-check">
                                                    <input class="form-check-input  simluh_jenis_kelompok_lmdh" type="checkbox" value="lmdh" name="simluh_jenis_kelompok_lmdh" id="simluh_jenis_kelompok_lmdh" >
                                                        <label class="form-check-label" for="simluh_jenis_kelompok_lmdh">
                                                             LMDH
                                                         </label>
                                                </div> 
                                                <div class="form-check">
                                                    <input class="form-check-input simluh_jenis_kelompok_penangkar" type="checkbox" value="penangkar" name="simluh_jenis_kelompok_penangkar" id="simluh_jenis_kelompok_penangkar" >
                                                        <label class="form-check-label" for="simluh_jenis_kelompok_penangkar">
                                                            Penangkar Benih
                                                         </label>
                                                </div> 
                                                <div class="form-check">
                                                    <input class="form-check-input simluh_jenis_kelompok_kmp" type="checkbox" value="kmp" name="simluh_jenis_kelompok_kmp" id="simluh_jenis_kelompok_kmp" >
                                                        <label class="form-check-label" for="simluh_jenis_kelompok_kmp">
                                                            KMP (Kawasan Mandiri Pangan)
                                                         </label>
                                                </div> 
                                                <div class="form-check">
                                                    <input class="form-check-input simluh_jenis_kelompok_umkm" type="checkbox" value="umkm" name="simluh_jenis_kelompok_umkm" id="simluh_jenis_kelompok_umkm" >
                                                        <label class="form-check-label" for="simluh_jenis_kelompok_umkm">
                                                             UMKM Model Pengembangan Pangan Pokok Lokal (MP3L)
                                                         </label>
                                                </div>
                                                <label>Kelas Kemampuan</label>
                                            <div class="input-group mb-3">
                                                <select class="form-select" id="simluh_kelas_kemampuan" name="simluh_kelas_kemampuan" aria-label="Default select example">
                                                    <option selected>Pilih  </option>
                                                    <option value="pemula">Pemula</option>
                                                    <option value="lanjut">Lanjut</option>
                                                    <option value="madya">Madya</option>
                                                    <option value="utama">Utama</option>
                                                </select>
                                            </div>  
                                            <label>Tahun Penetapan Kelas</label>
                                            <div class="input-group mb-3">
                                                <select id="year2" class="form-select"  aria-label="Default select example" name="simluh_tahun_tap_kelas">
                                                    <option selected>Pilih Tahun</option>
                                                    
                                                </select>
                                            </div>
                                                        </div>                 
                                    

                                            <input type="hidden" name="kode_kab" id="kode_kab" value="<?= $kode; ?>">
                                            <input type="hidden" name="kode_prop" id="kode_prop" value="<?= $kode_prop; ?>">
                                            <input type="hidden" name="kode_kec" id="kode_kec" value="<?= $kode_kec; ?>">
                                                <input type="hidden" id="id_poktan" name="id_poktan" >
                                               
                                                    <div class="text-center">
                                                        <button type="button" id="btnSave" class="btn btn-round bg-gradient-warning btn-sm">Simpan Data</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div 
    </div>
</div>   
    </div>
</div>
</tbody>
</table>
</div>

</div>
<?php echo view('layout/footer'); ?>
<br>

<?= $this->endSection() ?>

<?= $this->section('script') ?>

<script>
    $(document).ready(function() {

        $(document).delegate('#btnSave', 'click', function() {

            var kode_kec = $('#kode_kec').val();
            var kode_kab = $('#kode_kab').val();
            var kode_desa = $('#kode_desa').val();
            var kode_prop = $('#kode_prop').val();
            var id_gap = $('#id_gap').val();
            var nama_poktan = $('#nama_poktan').val();
            var ketua_poktan = $('#ketua_poktan').val();
            var alamat = $('#alamat').val();
            var simluh_tahun_bentuk = $('#year').val();
            var status = $('#status').val();
            var simluh_tahun_tap_kelas = $('#year2').val();
            var simluh_kelas_kemampuan = $('#simluh_kelas_kemampuan').val();

            var simluh_jenis_kelompok_perempuan = $(".simluh_jenis_kelompok_perempuan")[0].checked ? $(".simluh_jenis_kelompok_perempuan").val() : "";
            var simluh_jenis_kelompok_domisili = $(".simluh_jenis_kelompok_domisili")[0].checked ? $(".simluh_jenis_kelompok_domisili").val() : "";
            var simluh_jenis_kelompok_upja =$(".simluh_jenis_kelompok_upja")[0].checked ? $(".simluh_jenis_kelompok_upja").val() : "";
            var simluh_jenis_kelompok_p3a = $(".simluh_jenis_kelompok_p3a")[0].checked ? $(".simluh_jenis_kelompok_p3a").val() : "";
            var simluh_jenis_kelompok_lmdh =$(".simluh_jenis_kelompok_lmdh")[0].checked ? $(".simluh_jenis_kelompok_lmdh").val() : "";
            var simluh_jenis_kelompok_penangkar =$(".simluh_jenis_kelompok_penangkar")[0].checked ? $(".simluh_jenis_kelompok_penangkar").val() : "";
            var simluh_jenis_kelompok_kmp = $(".simluh_jenis_kelompok_kmp")[0].checked ? $(".simluh_jenis_kelompok_kmp").val() : "";
            var simluh_jenis_kelompok_umkm = $(".simluh_jenis_kelompok_umkm")[0].checked ? $(".simluh_jenis_kelompok_umkm").val() : "";
            
            
            
          

            $.ajax({
                url: '<?= base_url() ?>/KelembagaanPelakuUtama/KelompokTani/KelompokTani/save/',
                type: 'POST',
                data: {
                    'kode_kec': kode_kec,
                    'kode_kab': kode_kab,
                    'kode_desa': kode_desa,
                    'kode_prop': kode_prop,
                    'id_gap': id_gap,
                    'nama_poktan': nama_poktan,
                    'ketua_poktan': ketua_poktan,
                    'alamat': alamat,
                    'simluh_tahun_bentuk': simluh_tahun_bentuk,
                    'status': status,
                    'simluh_tahun_tap_kelas': simluh_tahun_tap_kelas,
                    'simluh_kelas_kemampuan': simluh_kelas_kemampuan,
                    'simluh_jenis_kelompok_perempuan': simluh_jenis_kelompok_perempuan,
                    'simluh_jenis_kelompok_domisili': simluh_jenis_kelompok_domisili,
                    'simluh_jenis_kelompok_upja': simluh_jenis_kelompok_upja,
                    'simluh_jenis_kelompok_p3a': simluh_jenis_kelompok_p3a,
                    'simluh_jenis_kelompok_lmdh': simluh_jenis_kelompok_lmdh,
                    'simluh_jenis_kelompok_penangkar': simluh_jenis_kelompok_penangkar,
                    'simluh_jenis_kelompok_kmp': simluh_jenis_kelompok_kmp,
                    'simluh_jenis_kelompok_umkm': simluh_jenis_kelompok_umkm,
                    
                },
                success: function(result) {
                    result = JSON.parse(result);
                    if(result.value){
                        Swal.fire({
                            title: 'Sukses',
                            text: "Sukses tambah data",
                            type: 'success',
                        }).then((result) => {

                            if (result.value) {
                                location.reload();
                            }
                        });
                    }else{
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
        $(document).delegate('#btnHapus', 'click', function() {
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
                    var id = $(this).data('id_poktan');

                    $.ajax({
                        url: '<?= base_url() ?>/KelembagaanPelakuUtama/KelompokTani/KelompokTani/delete/' + id,
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
        $(document).delegate('#btnEditPok', 'click', function() {
            $.ajax({
                url: '<?= base_url() ?>/KelembagaanPelakuUtama/KelompokTani/KelompokTani/edit/' + $(this).data('id_poktan'),
                type: 'GET',
                dataType: 'JSON',
                success: function(result) {
                    // console.log(result);

                    $('#id_poktan').val(result.id_poktan);
                    $('#kode_kec').val(result.kode_kec);
                    $('#kode_desa').val(result.kode_desa);
                    $('#kode_kab').val(result.kode_kab);
                    $('#kode_prop').val(result.kode_prop);
                    $('#id_gap').val(result.id_gap);
                    $('#nama_poktan').val(result.nama_poktan);
                    $('#ketua_poktan').val(result.ketua_poktan);
                    $('#alamat').val(result.alamat);
                    $('#year').val(result.simluh_tahun_bentuk);
                    $('#status').val(result.status);
                    $('#year2').val(result.simluh_tahun_tap_kelas);
                    $('#simluh_kelas_kemampuan').val(result.simluh_kelas_kemampuan);
                   
                    if (result.simluh_jenis_kelompok_perempuan == "perempuan") {
                        $("#simluh_jenis_kelompok_perempuan").prop("checked", true);
                    } else {
                        $("#simluh_jenis_kelompok_perempuan").prop("checked", false);
                    } 
                    if (result.simluh_jenis_kelompok_domisili == "domisili") {
                        $("#simluh_jenis_kelompok_domisili").prop("checked", true);
                    } else {
                        $("#simluh_jenis_kelompok_domisili").prop("checked", false);
                    } 
                    if (result.simluh_jenis_kelompok_upja == "upja") {
                        $("#simluh_jenis_kelompok_upja").prop("checked", true);
                    } else {
                        $("#simluh_jenis_kelompok_upja").prop("checked", false);
                    }
                    if (result.simluh_jenis_kelompok_p3a == "p3a") {
                        $("#simluh_jenis_kelompok_p3a").prop("checked", true);
                    } else {
                        $("#simluh_jenis_kelompok_p3a").prop("checked", false);
                    }
                    if (result.simluh_jenis_kelompok_lmdh == "lmdh") {
                        $("#simluh_jenis_kelompok_lmdh").prop("checked", true);
                    } else {
                        $("#simluh_jenis_kelompok_lmdh").prop("checked", false);
                    }
                    if (result.simluh_jenis_kelompok_penangkar == "penangkar") {
                        $("#simluh_jenis_kelompok_penangkar").prop("checked", true);
                    } else {
                        $("#simluh_jenis_kelompok_penangkar").prop("checked", false);
                    }
                    if (result.simluh_jenis_kelompok_kmp == "kmp") {
                        $("#simluh_jenis_kelompok_kmp").prop("checked", true);
                    } else {
                        $("#simluh_jenis_kelompok_kmp").prop("checked", false);
                    }
                    if (result.simluh_jenis_kelompok_umkm == "umkm") {
                        $("#simluh_jenis_kelompok_umkm").prop("checked", true);
                    } else {
                        $("#simluh_jenis_kelompok_umkm").prop("checked", false);
                    }
                    $('#modal-form').modal('show');
                    $("#btnSave").attr("id", "btnDoEdit");

                    $(document).delegate('#btnDoEdit', 'click', function() {
                     

                        var id_poktan = $('#id_poktan').val();
                        var kode_kec = $('#kode_kec').val();
                        var kode_kab = $('#kode_kab').val();
                        var kode_desa = $('#kode_desa').val();
                        var kode_prop = $('#kode_prop').val();
                        var id_gap = $('#id_gap').val();
                        var nama_poktan = $('#nama_poktan').val();
                        var ketua_poktan = $('#ketua_poktan').val();
                        var alamat = $('#alamat').val();
                        var simluh_tahun_bentuk = $('#year').val();
                        var status = $('#status').val();
                        var simluh_tahun_tap_kelas = $('#year2').val();
                        var simluh_kelas_kemampuan = $('#simluh_kelas_kemampuan').val();

                        var simluh_jenis_kelompok_perempuan = $(".simluh_jenis_kelompok_perempuan")[0].checked ? $(".simluh_jenis_kelompok_perempuan").val() : "";
                        var simluh_jenis_kelompok_domisili = $(".simluh_jenis_kelompok_domisili")[0].checked ? $(".simluh_jenis_kelompok_domisili").val() : "";
                        var simluh_jenis_kelompok_upja = $(".simluh_jenis_kelompok_upja")[0].checked ? $(".simluh_jenis_kelompok_upja").val() : "";
                        var simluh_jenis_kelompok_p3a = $(".simluh_jenis_kelompok_p3a")[0].checked ? $(".simluh_jenis_kelompok_p3a").val() : "";
                        var simluh_jenis_kelompok_lmdh = $(".simluh_jenis_kelompok_lmdh")[0].checked ? $(".simluh_jenis_kelompok_lmdh").val() : "";
                        var simluh_jenis_kelompok_penangkar = $(".simluh_jenis_kelompok_penangkar")[0].checked ? $(".simluh_jenis_kelompok_penangkar").val() : "";
                        var simluh_jenis_kelompok_kmp = $(".simluh_jenis_kelompok_kmp")[0].checked ? $(".simluh_jenis_kelompok_kmp").val() : "";
                        var simluh_jenis_kelompok_umkm = $(".simluh_jenis_kelompok_umkm")[0].checked ? $(".simluh_jenis_kelompok_umkm").val() : "";

                        let formData = new FormData();
                        formData.append('id_poktan', id_poktan);
                        formData.append('kode_kec', kode_kec);
                        formData.append('kode_kab', kode_kab);
                        formData.append('kode_desa', kode_desa);
                        formData.append('kode_prop', kode_prop);
                        formData.append('id_gap', id_gap);
                        formData.append('nama_poktan', nama_poktan);
                        formData.append('ketua_poktan', ketua_poktan);
                        formData.append('alamat', alamat);
                        formData.append('simluh_tahun_bentuk', simluh_tahun_bentuk);
                        formData.append('status', status);
                        formData.append('simluh_tahun_tap_kelas', simluh_tahun_tap_kelas);
                        formData.append('simluh_kelas_kemampuan', simluh_kelas_kemampuan);
                        formData.append('simluh_jenis_kelompok_perempuan', simluh_jenis_kelompok_perempuan);
                        formData.append('simluh_jenis_kelompok_domisili', simluh_jenis_kelompok_domisili);
                        formData.append('simluh_jenis_kelompok_upja', simluh_jenis_kelompok_upja);
                        formData.append('simluh_jenis_kelompok_p3a', simluh_jenis_kelompok_p3a);
                        formData.append('simluh_jenis_kelompok_lmdh', simluh_jenis_kelompok_lmdh);
                        formData.append('simluh_jenis_kelompok_penangkar', simluh_jenis_kelompok_penangkar);
                        formData.append('simluh_jenis_kelompok_kmp', simluh_jenis_kelompok_kmp);
                        formData.append('simluh_jenis_kelompok_umkm', simluh_jenis_kelompok_umkm);

                        $.ajax({
                            url: '<?= base_url() ?>/KelembagaanPelakuUtama/KelompokTani/KelompokTani/update/' + id_poktan,
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
    
</script>


<script>
    $(document).ready(function() {
        const monthNames = ["Bulan", "Januari", "Februari", "Maret", "April", "Mei", "Juni",
            "Juli", "Agustus", "September", "Oktober", "November", "Desember"
        ];
        let qntYears = 80;
        let selectYear = $("#year2");
        let selectMonth = $("#month");
        let selectDay = $("#day");
        let currentYear = new Date().getFullYear();

        for (var y = 0; y < qntYears; y++) {
            let date = new Date(currentYear);
            let yearElem = document.createElement("option");
            yearElem.value = currentYear
            yearElem.textContent = currentYear;
            selectYear.append(yearElem);
            currentYear--;
        }

        for (var m = 1; m <= 12; m++) {
            let month = monthNames[m];
            let monthElem = document.createElement("option");
            monthElem.value = m;
            monthElem.textContent = month;
            selectMonth.append(monthElem);
        }

        var d = new Date();
        var month = d.getMonth();
        var year2 = d.getFullYear();
        var day = d.getDate();

        selectYear.val(year2);
        selectYear.on("change", AdjustDays);
        selectMonth.val(month);
        selectMonth.on("change", AdjustDays);

        AdjustDays();
        selectDay.val(day)

        function AdjustDays() {
            var year2 = selectYear.val();
            var month = parseInt(selectMonth.val()) + 1;
            selectDay.empty();

            //get the last day, so the number of days in that month
            var days = new Date(year2, month, 0).getDate();

            //lets create the days of that month
            for (var d = 1; d <= days; d++) {
                var dayElem = document.createElement("option");
                dayElem.value = d;
                dayElem.textContent = d;
                selectDay.append(dayElem);
            }
        }
    });
</script>
<?= $this->endSection() ?>