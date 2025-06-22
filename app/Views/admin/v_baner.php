<?= $this->extend('template/template-backend-admin') ?>
<?= $this->section('content') ?>

<div class="col-sm-12">
    <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Daftar <?= $subtitle ?></h3>
              <div class="card-tools">
                <button class="btn btn-flat btn-primary btn-xs" data-toggle="modal" data-target="#add"><i class="fa fa-plus"></i> Add </button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="card-body p-0">
                <?php 
                if (session()->getFlashdata('tambah')) {
                    echo '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-check"></i>';
                    echo session()->getFlashdata('tambah');
                    echo '</h4></div>';
                }

                if (session()->getFlashdata('edit')) {
                    echo '<div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-check"></i>';
                    echo session()->getFlashdata('edit');
                    echo '</h4></div>';
                }

                if (session()->getFlashdata('delete')) {
                    echo '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-check"></i>';
                    echo session()->getFlashdata('delete');
                    echo '</h4></div>';
                }
                ?>
                <table class="table table-sm">
                    <thead>
                        <tr>
                            <th Width="70px">#</th>
                            <th>Keterangan</th>
                            <th>Banner</th>
                            <th Width="100px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1; foreach ($baner as $key => $value) { ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $value['ket'] ?></td>
                                <td>
                                    <img src="<?= base_url('banner/' . $value['baner']) ?>" alt="Baner" width="100">
                                </td>
                                <td>
                                    <button class="btn btn-flat btn-warning btn-xs" data-toggle="modal" data-target="#edit<?= $value['id_baner'] ?>">
                                        <i class="fa fa-edit"></i>
                                    </button>
                                    <button class="btn btn-flat btn-danger btn-xs" data-toggle="modal" data-target="#delete<?= $value['id_baner'] ?>">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
        </div>
    </div>
</div>

<!-- Modals Add -->
  <div class="modal fade" id="add">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Add Baner</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php echo form_open_multipart('baner/insertData') ?>
      <div class="modal-body">
        <div class="form-group">
          <label>Keterangan</label>
          <input name="ket" class="form-control" placeholder="Keterangan" required>
        </div>

        <div class="form-group">
          <label>File Baner (File Max 1024kb)</label> 
          <input type="file" accept="image/*" id="preview_baner_input" name="baner" class="form-control" required>
        </div>

        <div class="form-group">
          <label>Preview</label><br>
          <img id="preview_baner_img" src="" width="200px" height="130px" style="display:none;" class="img-thumbnail">
        </div>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
      </div>
      <?php echo form_close() ?>
    </div>
  </div>
</div>

 <!-- Modals edit -->
<?php foreach ($baner as $key => $value) { ?>
  <div class="modal fade" id="edit<?= $value['id_baner'] ?>">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Edit Banner</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <?= form_open_multipart('baner/editData/' . $value['id_baner']) ?>
        <div class="modal-body">
          <div class="form-group">
            <label>Keterangan</label>
            <input name="ket" value="<?= esc($value['ket']) ?>" class="form-control" placeholder="Keterangan" required>
          </div>

          <div class="form-group">
            <label>Ganti Banner (Max 2MB)</label>
            <input type="file" accept="image/*" name="baner" class="form-control" onchange="previewImage(this, 'preview_img_<?= $value['id_baner'] ?>')">
          </div>

          <div class="form-group">
            <label>Preview</label><br>
            <img id="preview_img_<?= $value['id_baner'] ?>" src="<?= base_url('banner/' . $value['baner']) ?>" width="200px" height="130px" class="img-thumbnail">
          </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
        </div>
        <?= form_close() ?>
      </div>
    </div>
  </div>

  <!-- Modals delete -->
<div class="modal fade" id="delete<?= $value['id_baner'] ?>">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-danger text-white">
        <h4 class="modal-title">Hapus Data</h4>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Yakin ingin menghapus banner <strong><?= esc($value['ket']) ?></strong>?</p>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
        <a href="<?= base_url('baner/deleteData/' . $value['id_baner']) ?>" class="btn btn-danger btn-sm">Delete</a>
      </div>
    </div>
  </div>
</div>
<?php } ?>

<script>
  // Preview untuk modal Tambah
  document.getElementById('preview_baner_input').addEventListener('change', function (event) {
    const file = event.target.files[0];
    const preview = document.getElementById('preview_baner_img');

    if (file) {
      const reader = new FileReader();
      reader.onload = function (e) {
        preview.src = e.target.result;
        preview.style.display = 'block';
      }
      reader.readAsDataURL(file);
    } else {
      preview.src = '';
      preview.style.display = 'none';
    }
  });

  // Preview untuk modal Edit
  function previewImage(input, targetId) {
    const file = input.files[0];
    const preview = document.getElementById(targetId);

    if (file) {
      const reader = new FileReader();
      reader.onload = function (e) {
        preview.src = e.target.result;
        preview.style.display = 'block';
      }
      reader.readAsDataURL(file);
    } else {
      preview.src = '';
      preview.style.display = 'none';
    }
  }
</script>



<?= $this->endSection() ?>