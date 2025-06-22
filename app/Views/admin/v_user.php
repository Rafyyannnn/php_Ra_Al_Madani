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
                        <th>Nama User</th>
                        <th>E-mail</th>
                        <th>Foto</th>
                        <th Width="100px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($user as $key => $value) { ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $value['nama_user'] ?></td>
                            <td><?= $value['email'] ?></td>
                            <td><img class="img-circle img-fluid" src="<?= base_url('foto/' . $value['foto']) ?>" width="80px" height="80px"></td>
                            <td>
                                <button class="btn btn-flat btn-warning btn-xs" data-toggle="modal" data-target="#edit<?= $value['id_user'] ?>"><i class="fa fa-edit"></i></button>
                                <button class="btn btn-flat btn-danger btn-xs" data-toggle="modal" data-target="#delete<?= $value['id_user'] ?>"><i class="fa fa-trash"></i></button>
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
                <h4 class="modal-title">Add User</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php echo form_open_multipart('user/insertData') ?>
            <div class="modal-body">
                <div class="form-group">
                    <label> Nama User </label>
                    <input name="nama_user" class="form-control" placeholder="Nama_User" required>
                </div>
                <div class="form-group">
                    <label> Email </label>
                    <input type="email" name="email" class="form-control" placeholder="E-Mail" required>
                </div>
                <div class="form-group">
                    <label> Password </label>
                    <input name="password" class="form-control" placeholder="Password" required>
                </div>
                <div class="form-group">
                    <label> Foto </label>
                    <input type="file" name="foto" class="form-control" accept="image/*" required>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
            </div>
            <?php echo form_close() ?>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<!-- Modals edit -->
<?php foreach ($user as $key => $value) { ?>
  <div class="modal fade" id="edit<?= $value['id_user'] ?>">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Edit User</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <?php echo form_open_multipart('user/editData/' . $value['id_user']) ?>
        <div class="modal-body">
          <div class="form-group">
                    <label> Nama User </label>
                    <input name="nama_user" value="<?= $value['nama_user'] ?>" class="form-control" placeholder="Nama_User" required>
                </div>
                <div class="form-group">
                    <label> Email </label>
                    <input type="email" name="email" value="<?= $value['email'] ?>" class="form-control" placeholder="E-Mail" required>
                </div>
                <div class="form-group">
                    <label> Password </label>
                    <input name="password" class="form-control" value="<?= $value['password'] ?>" placeholder="Password" required>
                </div>
                <div class="form-group">
                    <label> Ganti Foto </label>
                    <input type="file" name="foto" class="form-control" accept="image/*">
                    <img src="<?= base_url('foto/'. $value['foto'])?>" width="100px" height="100px">
                </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
        </div>
        <?php echo form_close() ?>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
<?php } ?>

<!-- Modals delete -->
<?php foreach ($user as $key => $value) { ?>
  <div class="modal fade" id="delete<?= $value['id_user'] ?>">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Hapus User</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Apakah Anda Ingin Menghapus <b><?= $value['nama_user'] ?></b> ?
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
          <a href="<?= base_url('user/deleteData/' . $value['id_user']) ?>" class="btn btn-danger btn-sm">Delete</a>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
<?php } ?>
        <?= $this->endSection() ?>