<?= $this->extend('template/template-frontend') ?>
<?= $this->section('content') ?>

<div class="container mt-4">
  <div class="row justify-content-center">

    <div class="col-sm-5 mb-3">
      <div class="text-center">
        <img class="img-fluid pad" src="<?= base_url('logo/logo a.png') ?>" width="400px">
      </div>
    </div>

    <div class="col-sm-5">
      <?php echo form_open('Auth/cek_login_siswa') ?>
      <?= csrf_field(); ?>
      <div class="card card-outline card-primary">
        <div class="card-header">
          <h3 class="card-title">Login Siswa</h3>
        </div>
        <div class="card-body">
          <?= $errors = session()->getFlashdata('errors') ?>
          <?php $validation = session()->getFlashdata('validation');
          if (session()->getFlashdata('pesan')) {
            echo '<div class="alert alert-success alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <h4><i class="icon fa fa-check"></i>';
            echo session()->getFlashdata('pesan');
            echo '</h4></div>';
          }
          ?>
          <div class="form-group">
            <p class="text-danger">*) Gunakan Tanggal Lahir Sebagai Password !!!</p>
          </div>
          <div class="form-group">
            <label>ID Siswa</label>
            <input name="ids" class="form-control" placeholder="ID Siswa" value="<?= old('ids') ?>">
            <p class="text-danger"><?= isset($validation) && $validation->hasError('ids') ? $validation->getError('ids') : '' ?></p>
          </div>

          <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" class="form-control" placeholder="Password" value="<?= old('password') ?>">
            <p class="text-danger"><?= isset($validation) && $validation->hasError('password') ? $validation->getError('password') : '' ?></p>
          </div>

          <div class="form-group">
            <div class="row">
              <div class="col-sm-6">
                <button type="submit" class="btn btn-info btn-flat btn-block">Login</button>
              </div>
              <div class="col-sm-6">
                <a href="<?= base_url('pendaftaran') ?>" class="btn btn-success btn-flat btn-block">Mendaftar</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php echo form_close() ?>
    </div>

  </div>
</div>

<script src="<?= base_url() ?>/AdminLTE/plugins/jquery/jquery.min.js"></script>
<script>
  window.setTimeout(function () {
    $(".alert").fadeTo(500, 0).slideUp(500, function () {
      $(this).remove();
    });
  }, 3000);
</script>

<?= $this->endSection() ?>
