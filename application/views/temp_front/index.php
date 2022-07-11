<?php
defined('BASEPATH') or exit('No direct script access allowed');
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
        <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-link" href="#beranda">Beranda </a>
                <a class="nav-link" href="#tentang">Tentang</a>
                <a class="nav-link" href="#syarat">Syarat & Ketentuan</a>
                <a class="nav-link" href="pendaftaran">Daftar</a>
                <a class="nav-link" href="login">Login</a>
            </div>
        </div>
    </nav>
    <section id="beranda">
        <img src="img/6.jpg" class="img-fluid" width="100%" alt="...">
    </section>

    <section class="bg-success" id="tentang">
        <div class="container">
            <div class=" row">
                <div class="col-lg-12 text-center">
                    <h2>Tentang</h2>
                    <hr style="width: 150px;">
                </div>
            </div>
            <div class="row justify-content-center text-white">
                <div class="col-lg-4 col-lg-offset-2" style="text-align:justify; line-height: 22px;">
                    <p> Sistem Pendukung Keputusan yang digunakan dalam website ini adalah dengan metode SMART dan SMARTER. Website ini dibuat untuk membantu biro kemahasiswaan Universitas Nasional dalam menginput mahasiswa yang ingin mendaftar sebagai penerima bantuan UKT.
                        Biro mahasiswa memberikan beberapa ketentuan untuk mengajukan penerimaan bantuan untuk mahasiswa yang ingin mengajukan seperti sertifikat prestasi, mahasiswa aktif, IPK >3.0 dan aktif dalam organisasi. Dalam kriteria tersebut terdapat bobot dan nilai yang ditentukan oleh Biro Kemahasiswaan sebagai Parameter untuk menentukan siapa saja yang berhak menerima bantuan UKT dari Universitas. Program Beasiswa ini diadakan di danai oleh Lembaga Layanan Pendidikan Tinggi Wilayah III, Kementrian Pendidikan, Kebudayaan, Riset dan Teknologi.
                    </p>
                </div>
                <div class="col-lg-4 col-lg-offset-2" style="text-align:justify; line-height: 22px;">
                    <p>SMART (Simple Multi Attribute Rating Technique) merupakan metode pengambilan keputusan yang multi-atribut yang dikembangkan oleh Edward pada tahun 1971 (Filho 2005). Pendekatan ini dirancang pada awalnya untuk memberikan cara mudah untuk menerapkan teknik MAUT (Multi-Attribute Utility Theory).
                        SMART menggunakan linier adaptif model untuk meramal nilai setiap alternatif. SMART lebih banyak digunakan karena kesederhanaannya dalam merespon kebutuhan pembuat keputusan dan caranya menganalisa respon. SMARTER ialah teknik multi atribut pada sistem pengambilan keputusan. Menghitung nilai standar SMARTER dengan rumus Rank Order Centorid (ROC) pada setiap standar dan sub.
                    </p>
                </div>

            </div>
        </div>
    </section>

    <section id="syarat" style="background: url(img/bg.png) repeat; padding: 30px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Syarat Administrasi</h2>
                    <hr style="width: 150px;">

                </div>
            </div>
            <div class="row">
                <div class="col-lg-12" style="margin-top:-10px;">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <img class="img-responsive" src="<?php echo base_url() ?>/img/syarat.png" alt="">
                    </div>
                </div>
            </div>
        </div>
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