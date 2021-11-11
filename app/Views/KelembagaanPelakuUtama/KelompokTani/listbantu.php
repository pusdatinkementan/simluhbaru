<?= $this->extend('layout/main_template') ?>

<?= $this->section('content') ?>


<center><h2> Daftar Bantuan Kegiatan yang di peroleh Kelompok <?= ucwords(strtolower($nama_poktan)) ?> </h2></center>

<button type="button" data-bs-toggle="modal" data-bs-target="#modal-form" class="btn bg-gradient-primary btn-sm">+ Tambah Data</button>
<div class="card">
    <div class="table-responsive">
        <table class="table align-items-center mb-0">
            <thead>
                <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder" style="text-align: center;">No</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder" style="text-align: center;">Kegiatan</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder" style="text-align: center;">Volume</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder" style="text-align: center;">Tahun</th>
                   
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
                        <p class="text-xs font-weight-bold mb-0"><?= $row['kegiatan'] ?></p>
                    </td>
                    <td class="align-middle text-center text-sm">
                        <p class="text-xs font-weight-bold mb-0"><?= $row['volume'] ?></p>
                    </td>
                    <td class="align-middle text-center text-sm">
                        <p class="text-xs font-weight-bold mb-0"><?= $row['tahun'] ?></p>
                    </td>
                    <td class="align-middle text-center text-sm">
                            
                                <button type="button"  data-idban="<?= $row['idban'] ?>" id="btnEditBan" class="btn bg-gradient-warning btn-sm">
                                    <i class="fas fa-edit"></i> Ubah
                                </button>
                                <button class="btn btn-danger btn-sm" id="btnHapus" data-idban="<?= $row['idban'] ?>" type="button" >
                                    <i class="fas fa-trash"></i> Hapus
                                </button>
                           
                            
                        
                            
                        </td>
                </tr>
            <?php
            }
            ?>

            </tbody>
        </table>
        <div class="modal fade" align="center" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-body p-0">
                                    <div class="card card-plain">
                                        <div class="card-header pb-0 text-left">
                                            <h4 class="font-weight-bolder text-warning text-gradient">Tambah Data</h4>
                                        </div>
                                        <div class="card-body">
                                        <form role="form text-left" action="<?= base_url('/KelembagaanPelakuUtama/KelompokTani/ListBantu/save'); ?>" method="post" enctype="multipart/form-data">
                                            <? csrf_field(); ?>
                                    <div class="row">
                                        <div class="col-5" mt-5>
                                            <div class="input-group mb-3">
                                            <label>Kegiatan</label>
                                            <div class="input-group mb-3">
                                               <select name="kegiatan" id="kegiatan"  class="form-control input-lg">
                                                            <option value="">Pilih Kegiatan</option>
                                                            <?php
                                                            foreach ($kegiatan as $row2) {
                                                                echo '<option value="' . $row2["idmast"] . '">' . $row2["desckeg"] . '-' . $row2["subitem"] . '</option>';
                                                            }
                                                            ?>
                                                        </select>
                                            </div>
                                            <label>Volume</label>
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" id="volume" name="volume" >
                                            </div>
                                            <label>Tahun</label>
                                            <div class="input-group mb-3">
                                                <select id="year" class="form-select"  aria-label="Default select example" name="tahun">
                                                    <option value="">Pilih Tahun</option>
                                                </select>
                                            </div>
                                         
                                           
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

         
            var kegiatan = $('#kegiatan').val();
            var volume = $('#volume').val();
            var tahun = $('#year').val();
           

            $.ajax({
                url: '<?= base_url() ?>/KelembagaanPelakuUtama/KelompokTani/ListBantu/save/',
                type: 'POST',
                data: {
                    
                    'kegiatan': kegiatan, 
                    'volume': volume,
                    'tahun': tahun,
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
                    var id = $(this).data('idban');

                    $.ajax({
                        url: '<?= base_url() ?>/KelembagaanPelakuUtama/KelompokTani/ListBantu/delete/' + id,
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
        $(document).delegate('#btnEditBan', 'click', function() {
            $.ajax({
                url: '<?= base_url() ?>/KelembagaanPelakuUtama/KelompokTani/ListBantu/edit/' + $(this).data('idban'),
                type: 'GET',
                dataType: 'JSON',
                success: function(result) {
                    // console.log(result);

                    $('#idban').val(result.idban);
                    $('#kegiatan').val(result.kegiatan);
                    $('#volume').val(result.volume);
                       $('#year').val(result.tahun);


                    $('#modal-form').modal('show');
                    $("#btnSave").attr("id", "btnDoEdit");

                    $(document).delegate('#btnDoEdit', 'click', function() {
                     

                        var idban = $('#idban').val();
                        var kegiatan = $('#kegiatan').val();
                        var volume = $('#volume').val();
                        var tahun = $('#year').val();

                        let formData = new FormData();
                        formData.append('idban', idban);
                        formData.append('kegiatan', kegiatan);
                        formData.append('volume', volume);
                        formData.append('tahun', tahun);

                        $.ajax({
                            url: '<?= base_url() ?>/KelembagaanPelakuUtama/KelompokTani/ListBantu/update/' + idban,
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
<?= $this->endSection() ?>