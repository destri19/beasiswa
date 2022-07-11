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
                            <a href="" data-toggle="modal" data-target="#modal_tambah" class="btn btn-success"><b>TAMBAH DATA MAHASISWA</b></a>
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
                                        <th>NIM</th>
                                        <th>Nama</th>
                                        <th>NIK</th>
                                        <th>Perguruan Tinggi</th>
                                        <th>Program Studi</th>
                                        <th class="text-center" width="180">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($mahasiswa as $mhs) { ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $mhs['nim']; ?></td>
                                            <td><?php echo $mhs['nama_lengkap']; ?></td>
                                            <td><?php echo $mhs['nik']; ?></td>
                                            <td><?php echo $mhs['perguruan_tinggi']; ?></td>
                                            <td><?php echo $mhs['fakultas']; ?></td>
                                            <td align="center">
                                                <a href="" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modal_edit<?php echo $mhs['id_pendaftaran']; ?>" title="Edit"><i class="far fa-edit"></i> </a>
                                                <a href="" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal_hapus<?php echo $mhs['id_pendaftaran']; ?>" title="Hapus"><i class="far fa-trash-alt"></i></a>
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
        <!-- MODAL TAMBAH DATAmhs-->
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
                        <form action="tambah_mahasiswa" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col">
                                    <div class="col-sm mb-3">
                                        <label for="InputId1" class="form-label">Id Pendaftaran</label>
                                        <input type="text" class="form-control" id="InputId1" name="id_pendaftaran" aria-describedby="idHelp" readonly value="<?= $id_pendaftaran; ?>">
                                    </div>
                                    <div class="col-sm mb-3">
                                        <label for="InputNik1" class="form-label">NIK</label>
                                        <input type="text" class="form-control" id="InputNik1" required name="nik" maxlength="16" placeholder="Isi Sesuai Kartu Identitas Anda.">
                                    </div>
                                    <div class="col-sm mb-3">
                                        <label for="InputNama1" class="form-label">Nama Lengkap</label>
                                        <input type="text" class="form-control" id="InputNama1" required name="nama_lengkap" placeholder="Isi Sesuai Kartu Identitas Anda.">
                                    </div>
                                    <div class="col-sm mb-3">
                                        <label for="InputNim1" class="form-label">NIM</label>
                                        <input type="text" class="form-control" id="InputNim1" required name="nim" placeholder="Isi Sesuai Kartu Identitas Anda.">
                                    </div>
                                    <div class="col-sm mb-3">
                                        <label for="InputTtl1" class="form-label">Tempat/Tanggal Lahir</label>
                                        <input type="text" class="form-control" id="InputTtl1" required name="ttl" placeholder="Contoh : Jakarta , 01 Desember 1990">
                                    </div>
                                    <div class="col-sm mb-3">
                                        <label for="InputAngkes1" class="form-label">Angkatan/Semester</label>
                                        <input type="text" class="form-control" id="InputAngkes1" required name="angkes" placeholder="Contoh : 2019/6">
                                    </div>
                                    <div class="col-sm mb-3">
                                        <label for="InputFakultas1" class="form-label">Jenjang/Prodi/Fakultas</label>
                                        <input type="text" class="form-control" id="InputFakultas1" required name="fakultas" placeholder="Contoh : S1 Sistem Informasi - FTKI">
                                    </div>
                                    <div class="col-sm mb-3">
                                        <label for="InputPT1" class="form-label">Perguruan Tinggi</label>
                                        <input type="text" class="form-control" id="InputPT1" required name="perguruan_tinggi" placeholder="Nama Universitas">
                                    </div>
                                    <div class="col-sm mb-3">
                                        <label for="InputAngkatan1" class="form-label">Angkatan</label>
                                        <input type="text" class="form-control" id="InputAngkatan1" required name="angkatan">
                                    </div>
                                    <div class="col-sm mb-3">
                                        <label for="InputSemester1" class="form-label">Semester</label>
                                        <input type="text" class="form-control" id="InputSemester1" required name="semester">
                                    </div>
                                    <div class="col-sm mb-3">
                                        <label for="InputNamaOrtu1" class="form-label">Nama Orang Tua/Wali</label>
                                        <input type="text" class="form-control" id="InputNamaOrtu1" required name="nama_ortu">
                                    </div>
                                    <div class="col-sm mb-3">
                                        <label for="InputPekerjaan1" class="form-label">Pekerjaan Orang Tua/Wali</label>
                                        <input type="text" class="form-control" id="InputPekerjaan1" required name="pekerjaan_ortu">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="formFile" class="form-label">Upload File KTP</label>
                                        <input class="form-control" type="file" id="formFile" required name="ktp">
                                    </div>
                                    <div class="mb-3">
                                        <label for="formFile" class="form-label">Upload File KTM</label>
                                        <input class="form-control" type="file" id="formFile" required name="ktm">
                                    </div>
                                    <div class="mb-3">
                                        <label for="formFile" class="form-label">Upload File KK</label>
                                        <input class="form-control" type="file" id="formFile" required name="kk">
                                    </div>
                                    <div class="mb-3">
                                        <label for="formFile" class="form-label">Upload File Sertifikat Prestasi</label>
                                        <input class="form-control" type="file" id="formFile" required name="sertifikat">
                                    </div>
                                    <div class="mb-3">
                                        <label for="formFile" class="form-label">Upload File Transkrip Nilai</label>
                                        <input class="form-control" type="file" id="formFile" required name="transkrip">
                                    </div>
                                    <div class="mb-3">
                                        <label for="formFile" class="form-label">Upload File Bukti Organisasi</label>
                                        <input class="form-control" type="file" id="formFile" required name="organisasi">
                                    </div>
                                    <div class="mb-3">
                                        <label for="formFile" class="form-label">Upload File Surat Keterangan Terdampak Covid Dari Kelurahan</label>
                                        <input class="form-control" type="file" id="formFile" required name="surat_tdc">
                                    </div>
                                </div>
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
        <!-- MODAL EDIT mhs-->
        <?php $no = 0;
        foreach ($mahasiswa as $mhs) : $no++; ?>
            <div class="modal" id="modal_edit<?php echo $mhs['id_pendaftaran']; ?>" tabindex="-1" id="" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-primary">
                            <h5 class="modal-title text-white">Edit Data</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="edit_mahasiswa" method="POST" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col">
                                        <div class="col-sm mb-3">
                                            <label for="InputId1" class="form-label">Id Pendaftaran</label>
                                            <input type="text" class="form-control" id="InputId1" name="id_pendaftaran" aria-describedby="idHelp" readonly value="<?php echo $mhs['id_pendaftaran']; ?>">
                                        </div>
                                        <div class="col-sm mb-3">
                                            <label for="InputNik1" class="form-label">NIK</label>
                                            <input type="text" class="form-control" id="InputNik1" required name="nik" maxlength="16" placeholder="Isi Sesuai Kartu Identitas Anda." value="<?php echo $mhs['nik']; ?>">
                                        </div>
                                        <div class="col-sm mb-3">
                                            <label for="InputNama1" class="form-label">Nama Lengkap</label>
                                            <input type="text" class="form-control" id="InputNama1" required name="nama_lengkap" placeholder="Isi Sesuai Kartu Identitas Anda." value="<?php echo $mhs['nama_lengkap']; ?>">
                                        </div>
                                        <div class="col-sm mb-3">
                                            <label for="InputNim1" class="form-label">NIM</label>
                                            <input type="text" class="form-control" id="InputNim1" required name="nim" placeholder="Isi Sesuai Kartu Identitas Anda." value="<?php echo $mhs['nim']; ?>">
                                        </div>
                                        <div class="col-sm mb-3">
                                            <label for="InputTtl1" class="form-label">Tempat/Tanggal Lahir</label>
                                            <input type="text" class="form-control" id="InputTtl1" required name="ttl" placeholder="Contoh : Jakarta , 01 Desember 1990" value="<?php echo $mhs['ttl']; ?>">
                                        </div>
                                        <div class="col-sm mb-3">
                                            <label for="InputAngkes1" class="form-label">Angkatan/Semester</label>
                                            <input type="text" class="form-control" id="InputAngkes1" required name="angkes" placeholder="Contoh : 2019/6" value="<?php echo $mhs['angkes']; ?>">
                                        </div>
                                        <div class="col-sm mb-3">
                                            <label for="InputFakultas1" class="form-label">Jenjang/Prodi/Fakultas</label>
                                            <input type="text" class="form-control" id="InputFakultas1" required name="fakultas" placeholder="Contoh : S1 Sistem Informasi - FTKI" value="<?php echo $mhs['fakultas']; ?>">
                                        </div>
                                        <div class="col-sm mb-3">
                                            <label for="InputPT1" class="form-label">Perguruan Tinggi</label>
                                            <input type="text" class="form-control" id="InputPT1" required name="perguruan_tinggi" placeholder="Nama Universitas" value="<?php echo $mhs['perguruan_tinggi']; ?>">
                                        </div>
                                        <div class="col-sm mb-3">
                                            <label for="InputAngkatan1" class="form-label">Angkatan</label>
                                            <input type="text" class="form-control" id="InputAngkatan1" required name="angkatan" value="<?php echo $mhs['angkatan']; ?>">
                                        </div>
                                        <div class="col-sm mb-3">
                                            <label for="InputSemester1" class="form-label">Semester</label>
                                            <input type="text" class="form-control" id="InputSemester1" required name="semester" value="<?php echo $mhs['semester']; ?>">
                                        </div>
                                        <div class="col-sm mb-3">
                                            <label for="InputNamaOrtu1" class="form-label">Nama Orang Tua/Wali</label>
                                            <input type="text" class="form-control" id="InputNamaOrtu1" required name="nama_ortu" value="<?php echo $mhs['nama_ortu']; ?>">
                                        </div>
                                        <div class="col-sm mb-3">
                                            <label for="InputPekerjaan1" class="form-label">Pekerjaan Orang Tua/Wali</label>
                                            <input type="text" class="form-control" id="InputPekerjaan1" required name="pekerjaan_ortu" value="<?php echo $mhs['pekerjaan_ortu']; ?>">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="mb-3">
                                            <label for="formFile" class="form-label">Upload File KTP</label>
                                            <input class="form-control" type="file" id="formFile" required name="ktp">
                                        </div>
                                        <div class="mb-3">
                                            <label for="formFile" class="form-label">Upload File KTM</label>
                                            <input class="form-control" type="file" id="formFile" required name="ktm">
                                        </div>
                                        <div class="mb-3">
                                            <label for="formFile" class="form-label">Upload File KK</label>
                                            <input class="form-control" type="file" id="formFile" required name="kk">
                                        </div>
                                        <div class="mb-3">
                                            <label for="formFile" class="form-label">Upload File Sertifikat Prestasi</label>
                                            <input class="form-control" type="file" id="formFile" required name="sertifikat">
                                        </div>
                                        <div class="mb-3">
                                            <label for="formFile" class="form-label">Upload File Transkrip Nilai</label>
                                            <input class="form-control" type="file" id="formFile" required name="transkrip">
                                        </div>
                                        <div class="mb-3">
                                            <label for="formFile" class="form-label">Upload File Bukti Organisasi</label>
                                            <input class="form-control" type="file" id="formFile" required name="organisasi">
                                        </div>
                                        <div class="mb-3">
                                            <label for="formFile" class="form-label">Upload File Surat Keterangan Terdampak Covid Dari Kelurahan</label>
                                            <input class="form-control" type="file" id="formFile" required name="surat_tdc">
                                        </div>

                                    </div>
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
        <!-- -------------------------------- -->
        <!-- MODAL HAPUS TIM -->
        <div class="modal" id="modal_hapus<?php echo $mhs['id_pendaftaran']; ?>" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                        <h5 class="modal-title text-white">Konfirmasi Hapus Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="hapus_mahasiswa" method="POST">
                            <h4>Yakin akan hapus data <?php echo $mhs['nama_lengkap']; ?> ?</h4>
                    </div>
                    <div class="modal-footer">
                        <br>
                        <input type="text" hidden name="id_pendaftaran" value="<?php echo $mhs['id_pendaftaran']; ?>">
                        <button type="submit" name="btnhapus" class="btn btn-primary">Delete</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- ------------------------- -->

    </div>
</div>
<!-- /.content -->