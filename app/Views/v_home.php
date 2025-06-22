<?= $this->extend('template/template-frontend') ?>
<?= $this->section('content') ?>

<div class="row"><!-- ✅ Diperlukan oleh Bootstrap grid -->

  <div class="col-sm-8">
    <div id="carouselExampleIndicators" class="carousel slide mb-4" data-ride="carousel">

      <!-- Dinamis: Carousel Indicators -->
      <ol class="carousel-indicators">
        <?php foreach ($baner as $key => $value) { ?>
          <li data-target="#carouselExampleIndicators" data-slide-to="<?= $key ?>" class="<?= $key == 0 ? 'active' : '' ?>"></li>
        <?php } ?>
      </ol>

      <style>
        .carousel-item img {
          max-height: 410px;
          object-fit: contain;
          object-position: center;
          margin: auto;
        }
      </style>

      <div class="carousel-inner text-center">
        <?php foreach ($baner as $key => $value) { ?>
          <div class="carousel-item <?= $key == 0 ? 'active' : '' ?>">
            <img class="d-block w-100" src="<?= base_url('banner/' . $value['baner']) ?>" alt="Banner <?= $key + 1 ?>" title="Banner <?= $key + 1 ?>">
          </div>
        <?php } ?>
      </div>

      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-custom-icon" aria-hidden="true">
          <i class="fas fa-chevron-left"></i>
        </span>
        <span class="sr-only">Previous</span>
      </a>

      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-custom-icon" aria-hidden="true">
          <i class="fas fa-chevron-right"></i>
        </span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </div>

  <div class="col-sm-4">
    <div class="card card-outline card-primary">
      <div class="card-header">
        <h3 class="card-title"><b>Estimasi Pendaftaran</b></h3>
      </div>
      <div class="card-body">
        <div class="col-12">
          <div class="info-box">
            <span class="info-box-icon bg-info"><i class="fas fa-graduation-cap"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Jumlah Pendaftaran</span>
              <span class="info-box-number">0</span>
            </div>
          </div>
        </div>
        <div class="col-12">
          <div class="info-box">
            <span class="info-box-icon bg-success"><i class="far fa-flag"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Jumlah Laki-Laki</span>
              <span class="info-box-number">0</span>
            </div>
          </div>
        </div>
        <div class="col-12">
          <div class="info-box">
            <span class="info-box-icon bg-warning"><i class="far fa-copy"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Jumlah Perempuan</span>
              <span class="info-box-number">0</span>
            </div>
          </div>
        </div>
        <div class="col-12">
          <a href="<?= base_url('/pendaftaran') ?>" class="btn btn-primary btn-flat btn-block">
            <i class="fas fa-file-alt mr-2"></i> Mendaftar
          </a>
        </div>
      </div>
    </div>
  </div>

  <div class="col-sm-12">
    <div class="card card-outline card-primary mt-3">
      <div class="card-header">
        <h3 class="card-title"><b>Beranda</b></h3>
      </div>
      <div class="card-body">
        <?= $beranda['beranda'] ?>
      </div>
    </div>
  </div>

</div> 

<?= $this->endSection() ?>
