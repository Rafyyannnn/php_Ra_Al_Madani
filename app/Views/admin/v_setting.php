<?= $this->extend('template/template-backend-admin') ?>
<?= $this->section('content') ?>
<div class="col-sm-12">
    <?php 
if (session()->getFlashdata('pesan')) {
                    echo '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-check"></i>';
                    echo session()->getFlashdata('pesan');
                    echo '</h4></div>';
                }
    ?>
</div>
<div class="col-sm-4">
    <?= form_open_multipart('Admin/saveSetting') ?>
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">Logo</h3>
        </div>
        <div class="card-body">
            <div class="text-center">
                <img id="gambar_load" class="img-fluid pad" src="<?= base_url('logo/' . $setting['logo']) ?>" width="250px" height="250px">
            </div>
            <div class="form-group mt-3">
                <label>Ganti Logo</label>
                <input id="preview_gambar" name="logo" type="file" class="form-control" accept="image/*">
            </div>
        </div>
    </div>
</div>

<div class="col-sm-8">
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">Data Sekolah</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <!-- Kolom kiri -->
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Nama Sekolah</label>
                        <input name="nama_sekolah" value="<?= $setting['nama_sekolah'] ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Nomor Telphone</label>
                        <input name="no_telpon" value="<?= $setting['no_telpon'] ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>E-mail</label>
                        <input name="email" value="<?= $setting['email'] ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Web</label>
                        <input name="web" value="<?= $setting['web'] ?>" class="form-control">
                    </div>
                </div>

                <!-- Kolom kanan -->
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Alamat Sekolah</label>
                        <input name="alamat" value="<?= $setting['alamat'] ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Kecamatan</label>
                        <input name="kecamatan" value="<?= $setting['kecamatan'] ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Kabupaten/Kota</label>
                        <input name="kabupaten" value="<?= $setting['kabupaten'] ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Provinsi</label>
                        <input name="provinsi" value="<?= $setting['provinsi'] ?>" class="form-control">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-sm-12">
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">Deskripsi Sekolah</h3>
        </div>
        <div class="card-body">
            <div class="form-group mt-3">
                <textarea name="deskripsi" rows="5" class="form-control"><?= $setting['deskripsi'] ?></textarea>
            </div>
        </div>
        <div class="card-body">
            <div class="form-group mt-3">
                <button type="submit" class="btn btn-flat btn-primary"><i class="fas fa-save"></i> Simpan </button>
            </div>
        </div>
    </div>
</div>

<?= form_close() ?>
<?= $this->endSection() ?>