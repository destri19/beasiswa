<?php
defined('BASEPATH') or exit('No direct script access allowed');

$cek    = $user;
$id_user = $cek->id;
$username    = $cek->username;
$level   = $cek->level_akses;
$judul  = $judul_web;


$menu     = strtolower($this->uri->segment(1));
$sub_menu = strtolower($this->uri->segment(2));
$sub_menu3 = strtolower($this->uri->segment(3));
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SIBEA SMART | <?php echo $judul ?></title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/admin/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/admin/dist/css/adminlte.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

    <!-- Toastr -->
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/admin/plugins/toastr/toastr.min.css">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">

                <!-- Profile Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <?php echo $level ?>
                        <i class="fas fa-user-alt"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-header">Profil</span>
                        <div class="dropdown-divider"></div>
                        <a href="ubah_pass" class="dropdown-item">
                            <i class="fas fa-unlock-alt mr-2"></i> Ubah Password

                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="logout" class="dropdown-item">
                            <i class="fas fa-sign-out-alt mr-2"></i> Logout

                        </a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="index3.html" class="brand-link text-center">
                <i class="fab fa-speakap"></i>
                <span class="brand-text font-weight-light">SIBEA SMART</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="<?php echo base_url() ?>/img/default.jpg" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block"><?php echo $username ?></a>
                    </div>
                </div>
                <div class="dropdown-divider"></div>
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item">
                            <a href="index" class="nav-link <?php if ($menu == 'ctrl_admin' and $sub_menu == 'index') {
                                                                echo 'active';
                                                            } ?>">
                                <i class="fas fa-home mr-2"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item">
                            <a href="data_kriteria" class="nav-link <?php if ($menu == 'ctrl_admin' and $sub_menu == 'data_kriteria') {
                                                                        echo 'active';
                                                                    } ?>">
                                <i class="fas fa-folder-plus mr-2"></i>
                                <p>Data Kriteria</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item">
                            <a href="sub_kriteria" class="nav-link <?php if ($menu == 'ctrl_admin' and $sub_menu == 'sub_kriteria') {
                                                                        echo 'active';
                                                                    } ?>">
                                <i class="fas fa-sitemap mr-2"></i>
                                <p>Data Sub Kriteria</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item">
                            <a href="data_mahasiswa" class="nav-link <?php if ($menu == 'ctrl_admin' and $sub_menu == 'data_mahasiswa') {
                                                                            echo 'active';
                                                                        } ?>">
                                <i class="fas fa-user-graduate mr-2"></i>
                                <p>
                                    Data Mahasiswa
                                </p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item">
                            <a href="form_penilaian" class="nav-link">
                                <i class="fab fa-wpforms mr-2"></i>
                                <p>Form Penilaian</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item">
                            <a href="hasil_penilaian" class="nav-link">
                                <i class="fas fa-archive mr-2"></i>
                                <p>Hasil Penilaian</p>
                            </a>
                        </li>
                    </ul>
                    <?php if ($level == 'ADMIN') : ?>
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                            <li class="nav-item">
                                <a href="data_user" class="nav-link <?php if ($menu == 'ctrl_admin' and $sub_menu == 'data_user') {
                                                                        echo 'active';
                                                                    } ?>">
                                    <i class="fas fa-user-friends mr-2"></i>
                                    <p>Manajemen User</p>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                            <li class="nav-item">
                                <a href="data_periode" class="nav-link <?php if ($menu == 'ctrl_admin' and $sub_menu == 'data_periode') {
                                                                            echo 'active';
                                                                        } ?>">
                                    <i class="far fa-calendar-check mr-2"></i>
                                    <p>Periode</p>
                                </a>
                            </li>
                        </ul>
                    <?php endif ?>
                    <?php if ($level == 'BIRO') : ?>
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                            <li class="nav-item">
                                <a href="data_periode" class="nav-link <?php if ($menu == 'ctrl_admin' and $sub_menu == 'data_periode') {
                                                                            echo 'active';
                                                                        } ?>">
                                    <i class="far fa-calendar-check mr-2"></i>
                                    <p>Periode</p>
                                </a>
                            </li>
                        </ul>
                    <?php endif ?>
                    <div class="dropdown-divider"></div>
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item">
                            <a href="ubah_pass" class="nav-link <?php if ($menu == 'ctrl_admin' and $sub_menu == 'ubah_pass') {
                                                                    echo 'active';
                                                                } ?>">
                                <i class="fas fa-unlock-alt mr-2"></i>
                                <p>Ubah Password</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item">
                            <a href="logout" class="nav-link">
                                <i class="fas fa-sign-out-alt mr-2"></i>
                                <p>Log Out</p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->