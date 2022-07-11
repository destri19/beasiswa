<?php
defined('BASEPATH') or exit('No direct script access allowed');
$cek    = $user;
$mhs = $mahasiswa;
$sts = $status->keterangan;
$pengumuman    = $data_periode->pengumuman;
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
                <div class="col">
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <td style="width: 200px;">NIM </td>
                                    <td><?= $mhs->nim; ?></td>

                                </tr>
                                <tr>
                                    <td>NAMA </td>
                                    <td><?= $mhs->nama_lengkap; ?></td>

                                </tr>
                                <tr>
                                    <td>NIK </td>
                                    <td><?= $mhs->nik; ?></td>

                                </tr>
                                <tr>
                                    <td>PROGRAM STUDI </td>
                                    <td><?= $mhs->fakultas; ?></td>

                                </tr>
                                <tr>
                                    <td>PERIODE </td>
                                    <td><?= $mhs->periode; ?></td>

                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                    <?php if ($mhs->status == 'belum dinilai') : ?>
                        <p class="lead">
                            <strong>STATUS PENGAJUAN BEASISWA : </strong> Data dan berkas anda sedang dalam<strong class="text-info"> proses verifikasi</strong>, Mohon tunggu informasi selanjutnya.
                        </p>
                    <?php endif ?>
                    <?php if ($sts == 'Lolos') : ?>
                        <p class="lead">
                            <strong>STATUS PENGAJUAN BEASISWA : </strong> Data dan berkas anda sudah <strong class="text-success"> selesai diproses</strong>.
                        </p>
                        <p class="lead">Jumlah beasiswa yang akan diterima sebesar <strong>Rp.2.000.000 (Dua Juta Rupiah)</strong>.</p>
                        <p class="lead">Jadwal untuk proses beasiswa pada tanggal <strong> <?= $pengumuman ?></strong>.</p>
                    <?php endif ?>
                    <?php if ($sts == 'Tidak Lolos') : ?>
                        <p class="lead">
                            <strong>STATUS PENGAJUAN BEASISWA : </strong> Data dan berkas anda sudah <strong class="text-success"> selesai diproses</strong>.
                        </p>
                        <p class="lead">Maaf, anda belum memenuhi kriteria untuk menerima beasiswa.</p>
                    <?php endif ?>
                </div>
                <!-- /.card -->
            </div>
            <!-- col -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->