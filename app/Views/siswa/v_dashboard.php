<?= $this->extend('template/template-frontend') ?>
<?= $this->section('content') ?>

<div class="col-sm-12">
    <div class="card card-outline card-primary mt-3">
        <div class="card-header">
            <h3 class="card-title"><b>Biodata Siswa</b></h3>
        </div>
        <div class="card-body">
                <div class="alert alert-warning alert-dismissible">
                  <h5><i class="icon fas fa-exclamation-triangle"></i>Pemberitahuan!</h5>
                   Lengkapi Telebih Dahulu Biodata Anda Sebelum Melakukan Apply Pendaftaran !!!
                </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-user-check mr-2"></i><b>Pendaftaran</b>
                            </h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-default btn-xs btn-flat">
                                    <i class="fas fa-pencil-alt"></i> Edit
                                </button>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-4">
                                    <strong><i class="fas fa-id-badge mr-1"></i> ID Siswa</strong>
                                    <p class="text-muted">Lorem ipsum</p>
                                </div>
                                <div class="col-sm-4">
                                    <strong><i class="fas fa-receipt mr-1"></i> No Pendaftaran</strong>
                                    <p class="text-muted">Lorem ipsum</p>
                                </div>
                                <div class="col-sm-4">
                                    <strong><i class="fas fa-calendar-check mr-1"></i> Tanggal Pendaftaran</strong>
                                    <p class="text-muted">Lorem ipsum</p>
                                </div>
                            </div> <!-- end row -->
                        </div> <!-- end card-body -->
                    </div> <!-- end card -->
                </div> <!-- end col -->
            </div> <!-- end row -->

            <!-- Mulai satu baris row untuk Foto dan Identitas -->
            <div class="row">
                <!-- FOTO -->
                <div class="col-sm-3">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-image mr-2"></i><b>Foto</b>
                            </h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-default btn-xs btn-flat">
                                    <i class="fas fa-pencil-alt"></i> Edit
                                </button>
                            </div>
                        </div>
                        <div class="card-body text-center">
                            <img src="<?= base_url('foto/jawa.jpeg') ?>" width="250px" class="img-fluid pad">
                        </div>
                    </div>
                </div>

                <!-- IDENTITAS SISWA -->
                <div class="col-sm-9">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-address-card mr-2"></i><b>Identitas Siswa</b>
                            </h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-default btn-xs btn-flat">
                                    <i class="fas fa-pencil-alt"></i> Edit
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <strong><i class="fas fa-user mr-1"></i> Nama Lengkap</strong>
                                    <p class="text-muted">Lorem ipsum</p>

                                    <strong><i class="fas fa-map-marker-alt mr-1"></i> Tempat Lahir</strong>
                                    <p class="text-muted">Lorem ipsum</p>

                                    <strong><i class="fas fa-id-card mr-1"></i> NIK</strong>
                                    <p class="text-muted">Lorem ipsum</p>

                                    <strong><i class="fas fa-pray mr-1"></i> Agama</strong>
                                    <p class="text-muted">Lorem ipsum</p>
                                </div>
                                <div class="col-sm-6">
                                    <strong><i class="fas fa-child mr-1"></i> Nama Panggilan</strong>
                                    <p class="text-muted">Lorem ipsum</p>

                                    <strong><i class="fas fa-calendar-alt mr-1"></i> Tanggal Lahir</strong>
                                    <p class="text-muted">Lorem ipsum</p>

                                    <strong><i class="fas fa-venus-mars mr-1"></i> Jenis Kelamin</strong>
                                    <p class="text-muted">Lorem ipsum</p>

                                    <strong><i class="fas fa-home mr-1"></i> Alamat Lengkap Siswa</strong>
                                    <p class="text-muted">Lorem ipsum</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- Tutup row -->



            <!-- Data Ayah Kandung -->
            <div class="col-sm-12">
                <div class="card card-outline card-primary mt-3">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-male mr-2"></i><b>Data Ayah Kandung</b>
                        </h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-default btn-xs btn-flat">
                                <i class="fas fa-pencil-alt"></i> Edit
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-4">
                                <strong><i class="fas fa-id-card mr-1"></i> NIK Ayah</strong>
                                <p class="text-muted">Lorem ipsum</p>

                                <strong><i class="fas fa-user mr-1"></i> Nama Ayah</strong>
                                <p class="text-muted">Lorem ipsum</p>
                            </div>
                            <div class="col-sm-4">
                                <strong><i class="fas fa-briefcase mr-1"></i> Pekerjaan</strong>
                                <p class="text-muted">Lorem ipsum</p>

                                <strong><i class="fas fa-phone mr-1"></i> No Telpon</strong>
                                <p class="text-muted">Lorem ipsum</p>
                            </div>
                            <div class="col-sm-4">
                                <strong><i class="fas fa-graduation-cap mr-1"></i> Pendidikan</strong>
                                <p class="text-muted">Lorem ipsum</p>

                                <strong><i class="fas fa-wallet mr-1"></i> Penghasilan/Bulan</strong>
                                <p class="text-muted">Lorem ipsum</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Data Ibu Kandung -->
            <div class="col-sm-12">
                <div class="card card-outline card-primary mt-3">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-female mr-2"></i><b>Data Ibu Kandung</b>
                        </h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-default btn-xs btn-flat">
                                <i class="fas fa-pencil-alt"></i> Edit
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-4">
                                <strong><i class="fas fa-id-card mr-1"></i> NIK Ibu</strong>
                                <p class="text-muted">Lorem ipsum</p>

                                <strong><i class="fas fa-user mr-1"></i> Nama Ibu</strong>
                                <p class="text-muted">Lorem ipsum</p>
                            </div>
                            <div class="col-sm-4">
                                <strong><i class="fas fa-briefcase mr-1"></i> Pekerjaan</strong>
                                <p class="text-muted">Lorem ipsum</p>

                                <strong><i class="fas fa-phone mr-1"></i> No Telpon</strong>
                                <p class="text-muted">Lorem ipsum</p>
                            </div>
                            <div class="col-sm-4">
                                <strong><i class="fas fa-graduation-cap mr-1"></i> Pendidikan</strong>
                                <p class="text-muted">Lorem ipsum</p>

                                <strong><i class="fas fa-wallet mr-1"></i> Penghasilan/Bulan</strong>
                                <p class="text-muted">Lorem ipsum</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!-- File Pendukung -->
            <div class="col-sm-12 mb-5">
                <div class="card card-outline card-primary mt-3">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-paperclip mr-2"></i><b>File Pendukung / File Lampiran</b>
                        </h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-default btn-xs btn-flat">
                                <i class="fas fa-pencil-alt"></i> Edit
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="<?= base_url('ppdb/upload_lampiran') ?>" method="post" enctype="multipart/form-data">
                            <table class="table table-bordered table-striped">
                                <thead class="text-center">
                                    <tr>
                                        <th><i class="fas fa-hashtag"></i></th>
                                        <th><i class="fas fa-file-alt mr-1"></i>Jenis File</th>
                                        <th><i class="fas fa-comment-dots mr-1"></i>Keterangan</th>
                                        <th><i class="fas fa-cogs mr-1"></i>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-center">1</td>
                                        <td>Akta Kelahiran</td>
                                        <td>Wajib</td>
                                        <td>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <input type="file" name="akta_kelahiran" class="form-control form-control-sm mr-2" accept=".pdf,.jpg,.png" required>
                                                <button type="submit" class="btn btn-sm btn-primary ml-2">
                                                    <i class="fas fa-upload"></i> Upload
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    <!-- Tambahkan jenis file lainnya dengan baris serupa -->
                                </tbody>
                            </table>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-sm-12 mb-5">
                <form action="<?= base_url('ppdb/apply') ?>" method="post">
                    <button type="submit" class="btn btn-success btn-lg w-100 py-3">
                        <i class="fas fa-paper-plane mr-2"></i> Apply Pendaftaran
                    </button>
                </form>
            </div>

            <?= $this->endSection() ?>