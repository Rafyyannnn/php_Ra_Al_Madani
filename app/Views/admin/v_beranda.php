<?= $this->extend('template/template-backend-admin') ?>
<?= $this->section('content') ?>

<div class="col-sm-12">
  <div class="card card-outline card-primary">
    <div class="card-header">
      <h3 class="card-title"><b>Beranda</b></h3>
    </div>

    <div class="card-body">
      <?php 
        if (session()->getFlashdata('pesan')) {
          echo '<div class="alert alert-success alert-dismissible fade show">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  <h4><i class="icon fa fa-check"></i> ' . session()->getFlashdata('pesan') . '</h4>
                </div>';
        }
      ?>

      <?= form_open('Admin/saveBeranda') ?>
        <div class="form-group">
          <textarea name="beranda" id="summernote" class="form-control"><?= $beranda['beranda'] ?? 'Hello Jawa' ?></textarea>
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-primary btn-flat">
            <i class="fas fa-save mr-1"></i> Simpan
          </button>
        </div>
      <?= form_close() ?>
    </div> <!-- /.card-body -->
  </div>
</div>

<!-- Inisialisasi Summernote -->
<script>
  $(document).ready(function () {
    $('#summernote').summernote({
      height: 300
    });

    // Saat form disubmit, hapus semua tag <p>
    $('form').on('submit', function () {
      var content = $('#summernote').summernote('code');
      content = content.replace(/<\/?p[^>]*>/g, '');
      $('#summernote').summernote('code', content);
    });
  });
</script>

<?= $this->endSection() ?>
