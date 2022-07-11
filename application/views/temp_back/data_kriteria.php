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
                            <a href="" data-toggle="modal" data-target="#modal_tambah" class="btn btn-success"><b>TAMBAH DATA KRITERIA</b></a>
                            <br><br>
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
                                        <th width="30px">No</th>
                                        <th>Nama Kriteria</th>
                                        <th>Bobot</th>
                                        <th class="text-center" width="180">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($kriteria as $krt) { ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $krt['nama_kriteria']; ?></td>
                                            <td><?php echo $krt['bobot']; ?></td>
                                            <td align="center">
                                                <a href="" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modal_edit<?php echo $krt['id_kriteria']; ?>" title="Edit"><i class="far fa-edit"></i> </a>
                                                <a href="" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal_hapus<?php echo $krt['id_kriteria']; ?>" title="Hapus"><i class="far fa-trash-alt"></i></a>
                                            </td>
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
        <!-- MODAL TAMBAH DATA KRITERIA -->
        <div class="modal" id="modal_tambah" tabindex="-1" id="" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                        <h5 class="modal-title text-white">Tambah Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <form action="tambah_kriteria" method="POST">
                            <div class="form-group">
                                <label for="exampleInputnama">Nama Kriteria</label>
                                <input type="text" name="nama_kriteria" required class="form-control" id="exampleInputnama" aria-describedby="emailHelp" placeholder="Masukan Nama Kriteria">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputbobot">Bobot Kriteria</label>
                                <input type="text" name="bobot" required class="form-control" id="exampleInputbobot" aria-describedby="emailHelp" placeholder="Masukan Bobot Kriteria">
                            </div>
                    </div>
                    <div class="modal-footer">
                        <br>
                        <button type="submit" name="btnsimpan" class="btn btn-primary">Save changes</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- -------------------------- -->
        <!-- MODAL EDIT DATA KRITERIA -->
        <?php $no = 0;
        foreach ($kriteria as $baris) : $no++; ?>
            <div class="modal" id="modal_edit<?php echo $baris['id_kriteria']; ?>" tabindex="-1" id="" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-primary">
                            <h5 class="modal-title text-white">Edit Data</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                            <form action="edit_kriteria/<?php echo $baris['id_kriteria']; ?>" method="POST">
                                <div class="form-group">
                                    <label for="exampleInputnoktp">Nama Kriteria</label>
                                    <input type="text" name="nama_kriteria" required class="form-control" id="exampleInputnoktp" aria-describedby="emailHelp" placeholder="Masukan Nama Kriteria" value="<?php echo $baris['nama_kriteria']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputnoktp">Bobot Kriteria</label>
                                    <input type="text" name="bobot" required class="form-control" id="exampleInputnama" aria-describedby="emailHelp" placeholder="Masukan Bobot Kriteria" value="<?php echo $baris['bobot']; ?>">
                                </div>
                        </div>
                        <div class="modal-footer">
                            <br>
                            <button type="submit" name="btnedit" class="btn btn-primary">Save changes</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>

        <!-- -------------------------- -->

        <!-- MODAL HAPUS DATA KRITERIA -->
        <?php $no = 0;
        foreach ($kriteria as $baris) : $no++; ?>
            <div class="modal" id="modal_hapus<?php echo $baris['id_kriteria']; ?>" tabindex="-1" id="" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-primary">
                            <h5 class="modal-title text-white">Konfirmasi Hapus Data</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="hapus_kriteria" method="POST">
                                <h4>Yakin akan hapus data <?php echo $baris['nama_kriteria']; ?> ?</h4>
                        </div>
                        <div class="modal-footer">
                            <br>
                            <input type="text" hidden name="id" value="<?php echo $baris['id_kriteria']; ?>">
                            <button type="submit" name="btnhapus" class="btn btn-primary">Delete</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        <!-- -------------------------- -->

    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->