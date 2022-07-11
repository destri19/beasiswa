<?php
defined('BASEPATH') or exit('No direct script access allowed');
$cek    = $user;
$id_user = $cek->id;
$username    = $cek->username;
$level   = $cek->level_akses;
$judul  = $judul_web;

?>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0"><?php echo $judul ?></h1>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">


        <div class="col-md-12">
          <div class="panel panel-flat">
            <div class="panel-body">

              <form class="form-horizontal" action="ubah_pass" method="POST">
                <div class="form-group">
                  <label class="control-label col-lg-3">Password Lama</label>
                  <div class="col-lg-9">
                    <input type="password" name="password_lama" class="form-control" value="" placeholder="Password Lama" required>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-lg-3">Password Baru</label>
                  <div class="col-lg-9">
                    <input type="password" name="password" class="form-control" value="" placeholder="Password Baru" required>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-lg-3">Ulangi Password Baru</label>
                  <div class="col-lg-9">
                    <input type="password" name="password2" class="form-control" value="" placeholder="Ulangi Password Baru" required>
                  </div>
                </div>

                <hr style="margin-top:-10px;">
                <button type="submit" name="btnUbahPass" class="btn btn-primary" style="float:right;">Simpan</button>
              </form>
            </div>
          </div>
        </div>

        <?php if ($this->session->flashdata('success')) : ?>
          <div class="alert-success">
            <?php echo $this->session->flashdata('success'); ?>
          </div>
        <?php endif; ?>
        <?php if ($this->session->flashdata('error')) : ?>
          <div class="alert-danger">
            <?php echo $this->session->flashdata('error'); ?>
          </div>
        <?php endif; ?>
        <!-- /dashboard content -->

      </div>
    </div>
    <!-- /.content -->
  </div>
</div>
<!-- /.content-wrapper -->