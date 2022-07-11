<?php
defined('BASEPATH') or exit('No direct script access allowed');
$periode    = $data_periode->periode;
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

    <style>
        html {
            scroll-behavior: smooth;
        }
    </style>
    <title>SIBEA SPK</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <a class="navbar-brand text-primary" href="">SPK</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse  justify-content-end" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-link" href="<?php echo base_url(); ?>">Beranda </a>
                <a class="nav-link" href="index">Tentang</a>
                <a class="nav-link" href="index">Syarat & Ketentuan</a>
                <a class="nav-link" href="#">Pengajuan Beasiswa</a>
                <a class="nav-link" href="login">Login</a>
            </div>
        </div>
    </nav>
    <section id="beranda" style="background: url(<?php echo base_url() ?>/img/bg.png) repeat; padding: 30px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <br><br>
                    <div class="text-center">
                        <span class="" style="font-size:35px; line-height: 35px;">
                            FORM PENGAJUAN <br> BEASISWA
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="forms" style="background: url(<?php echo base_url() ?>/img/bg.png) repeat; padding: 30px;">
        <div class="container">
            <?php if ($this->session->flashdata('success')) : ?>
                <div class="alert-success" role="alert">
                    <?php echo $this->session->flashdata('success'); ?>
                </div>
            <?php endif; ?>
            <?php if ($this->session->flashdata('error')) : ?>
                <div class="alert-danger" role="alert">
                    <?php echo $this->session->flashdata('error'); ?>
                </div>
            <?php endif; ?>
            <form action="submit_pendaftaran" method="POST" enctype="multipart/form-data">
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
                        <div class="col-sm mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1" required>
                            <label class="form-check-label" for="exampleCheck1">Saya bertanggung jawab atas data yang diberikan dan dipastikan diisi dengan benar.</label>
                        </div>
                        <input type="text" class="form-control" id="InputPekerjaan1" value="<?= $periode ?>" name="periode" hidden>
                        <button type="submit" name="btnsimpan" class="btn btn-primary">Submit Data</button>
                        <button type="reset" class="btn btn-danger">Cancel</button>
                    </div>
                </div>
            </form>
    </section>



    <!-- Footer -->
    <footer class="text-center bg-dark text-white">
        <div class="footer-below">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        SIBEA SMART &copy;<?php echo date('Y'); ?>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- SCRIPT  -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
    <!-- ------- -->
</body>

</html>