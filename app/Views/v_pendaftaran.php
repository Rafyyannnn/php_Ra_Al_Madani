<?= $this->extend('template/template-frontend') ?>
<?= $this->section('content') ?>

<?php if (!empty($ta) && $ta['status'] == 1) { ?>
    <div class="row"> 
        <div class="col-sm-5">
            <img class="img-fluid pad" src="<?= base_url('logo/registrasi.png') ?>" alt="">
        </div>
        <div class="col-sm-7">
            <?= form_open('pendaftaran/simpan') ?>
            <?= csrf_field(); ?>

            <?php if (session()->getFlashdata('pesan')) : ?>
                <div class="alert alert-success alert-dismissible">
                    <?= session()->getFlashdata('pesan') ?>
                </div>
            <?php endif; ?>

            <?php $validation = session()->getFlashdata('validation'); ?>

            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title"><b>Pendaftaran</b></h3>
                </div>
                <div class="card-body">
                    <div class="row">

                        <!-- ID Siswa -->
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>ID SISWA</label>
                                <input type="text" name="ids" class="form-control" placeholder="Contoh: RA + Tanggal/Bulan/Tahun(RA20142019)" value="<?= old('ids') ?>">
                                <p class="text-danger"><?= $validation?->getError('ids') ?></p>
                            </div>
                        </div>

                        <!-- Nama Lengkap -->
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Nama Lengkap</label>
                                <input type="text" name="nama_lengkap" class="form-control" placeholder="Nama Lengkap" value="<?= old('nama_lengkap') ?>">
                                <p class="text-danger"><?= $validation?->getError('nama_lengkap') ?></p>
                            </div>
                        </div>

                        <!-- Nama Panggilan -->
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Nama Panggilan</label>
                                <input type="text" name="nama_panggilan" class="form-control" placeholder="Nama Panggilan" value="<?= old('nama_panggilan') ?>">
                                <p class="text-danger"><?= $validation?->getError('nama_panggilan') ?></p>
                            </div>
                        </div>

                        <!-- Jenis Kelamin -->
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Jenis Kelamin</label>
                                <select name="jk" class="form-control">
                                    <option value="">--Pilih Jenis Kelamin--</option>
                                    <option value="L" <?= old('jk') == 'L' ? 'selected' : '' ?>>Laki-Laki</option>
                                    <option value="P" <?= old('jk') == 'P' ? 'selected' : '' ?>>Perempuan</option>
                                </select>
                                <p class="text-danger"><?= $validation?->getError('jk') ?></p>
                            </div>
                        </div>

                        <!-- Tempat Lahir -->
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Tempat Lahir</label>
                                <input type="text" name="tempat_lahir" class="form-control" placeholder="Tempat Lahir" value="<?= old('tempat_lahir') ?>">
                                <p class="text-danger"><?= $validation?->getError('tempat_lahir') ?></p>
                            </div>
                        </div>

                        <!-- Tanggal -->
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Tanggal</label>
                                <select name="tanggal" class="form-control">
                                    <option value="">--Tanggal--</option>
                                    <?php for ($i = 1; $i <= 31; $i++) {
                                        $val = str_pad($i, 2, '0', STR_PAD_LEFT); ?>
                                        <option value="<?= $val ?>" <?= old('tanggal') == $val ? 'selected' : '' ?>><?= $val ?></option>
                                    <?php } ?>
                                </select>
                                <p class="text-danger"><?= $validation?->getError('tanggal') ?></p>
                            </div>
                        </div>

                        <!-- Bulan -->
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Bulan</label>
                                <select name="bulan" class="form-control">
                                    <option value="">--Bulan--</option>
                                    <?php for ($i = 1; $i <= 12; $i++) {
                                        $val = str_pad($i, 2, '0', STR_PAD_LEFT); ?>
                                        <option value="<?= $val ?>" <?= old('bulan') == $val ? 'selected' : '' ?>><?= $val ?></option>
                                    <?php } ?>
                                </select>
                                <p class="text-danger"><?= $validation?->getError('bulan') ?></p>
                            </div>
                        </div>

                        <!-- Tahun -->
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Tahun</label>
                                <select name="tahun" class="form-control">
                                    <option value="">--Tahun--</option>
                                    <?php 
                                    $now = date('Y');
                                    for ($i = 2019; $i <= $now; $i++) { ?>
                                        <option value="<?= $i ?>" <?= old('tahun') == $i ? 'selected' : '' ?>><?= $i ?></option>
                                    <?php } ?>
                                </select>
                                <p class="text-danger"><?= $validation?->getError('tahun') ?></p>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="col-12">
                            <button type="submit" class="btn btn-info btn-flat btn-block">
                                <i class="fas fa-save"></i> Submit
                            </button>
                        </div>

                    </div>
                </div>
            </div>
            <?= form_close() ?>
        </div>
    </div>

<?php } else { ?>
    <div class="col-sm-12">
        <div class="alert alert-warning alert-dismissible">
            <h5><i class="icon fas fa-exclamation-triangle"></i> Pemberitahuan!</h5>
            Maaf, pendaftaran sudah ditutup. Anda tidak dapat melakukan pendaftaran saat ini.
        </div>
    </div>
<?php } ?>

<?= $this->endSection() ?>
