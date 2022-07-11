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
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <br>
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

                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th width="30px">No.</th>
                                        <th>NIM</th>
                                        <th>Nama</th>
                                        <th>Program Studi</th>
                                        <th>Periode</th>
                                        <th>Parameter Mahasiswa</th>
                                        <th>Parameter Prestasi</th>
                                        <th>Parameter IPK</th>
                                        <th>Parameter Organisasi</th>
                                        <th>Total Nilai</th>
                                        <th>Keterangan</th>
                                        <th>Ranking</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($data_penilaian as $mhs) { ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $mhs['nim']; ?></td>
                                            <td><?php echo $mhs['nama_lengkap']; ?></td>
                                            <td><?php echo $mhs['program_studi']; ?></td>
                                            <td><?php echo $mhs['periode']; ?></td>
                                            <td><?php echo $mhs['parameter_mahasiswa']; ?></td>
                                            <td><?php echo $mhs['parameter_prestasi']; ?></td>
                                            <td><?php echo $mhs['parameter_ipk']; ?></td>
                                            <td><?php echo $mhs['parameter_organisasi']; ?></td>
                                            <td><?php echo $mhs['total_nilai']; ?></td>
                                            <td><?php echo $mhs['keterangan']; ?></td>
                                            <td><?php echo $mhs['ranking']; ?></td>
                                        </tr>
                                    <?php
                                    } ?>

                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->

    </div>
</div>
<!-- /.content -->