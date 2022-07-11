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
                                                <?php if ($mhs['status'] == 'belum dinilai') : ?>
                                                    <a href="" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modal_innilai<?php echo $mhs['id_pendaftaran']; ?>" title="Edit"><i class="far fa-edit"></i> INPUT NILAI</a>
                                                <?php endif ?>
                                                <?php if ($mhs['status'] == 'sudah dinilai') : ?>
                                                    <a href="" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal_ubnilai<?php echo $mhs['id_pendaftaran']; ?>" title="Edit"><i class="fas fa-list-ol"></i> UBAH NILAI</a>
                                                <?php endif ?>
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
        <!-- MODAL EDIT mhs-->
        <?php $no = 0;
        foreach ($mahasiswa as $mhs) : $no++; ?>
            <div class="modal" id="modal_innilai<?php echo $mhs['id_pendaftaran']; ?>" tabindex="-1" id="" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-primary">
                            <h5 class="modal-title text-white">Input Nilai</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="input_nilai" method="POST" enctype="multipart/form-data">
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
                                            <label for="InputFakultas1" class="form-label">Jenjang/Prodi/Fakultas</label>
                                            <input type="text" class="form-control" id="InputFakultas1" required name="fakultas" placeholder="Contoh : S1 Sistem Informasi - FTKI" value="<?php echo $mhs['fakultas']; ?>">
                                        </div>
                                        <div class="col-sm mb-3">
                                            <label for="InputPT1" class="form-label">Perguruan Tinggi</label>
                                            <input type="text" class="form-control" id="InputPT1" required name="perguruan_tinggi" placeholder="Nama Universitas" value="<?php echo $mhs['perguruan_tinggi']; ?>">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="mb-3">
                                            <div class="form-group">
                                                <label>BUKTI KTM : </label>
                                                <a href="" class="btn btn-info btn-xs" data-toggle="modal" data-target="#modal_ktm<?php echo $mhs['id_pendaftaran']; ?>" title="Lihat Gambar">Lihat Bukti KTM</a>
                                                <br>
                                                <label for="exampleInputnoktp">Input Status Kemahasiswaan</label>
                                                <select class="form-select form-select-lg mb-3" name="parameter_mahasiswa" aria-label=".form-select-lg example">
                                                    <?php $no = 0;
                                                    foreach ($sub_k1 as $pilihan) : $no++; ?>
                                                        <option value="<?php echo $pilihan['id_sub']; ?>"><?php echo $pilihan['keterangan']; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <div class="form-group">
                                                <label>BUKTI PRESTASI : </label>
                                                <a href="" class="btn btn-info btn-xs" data-toggle="modal" data-target="#modal_pres<?php echo $mhs['id_pendaftaran']; ?>" title="Lihat Gambar">Lihat Sertifikat</a>
                                                <br>
                                                <label for="exampleInputnoktp">Input Prestasi</label>
                                                <select class="form-select form-select-lg mb-3" name="parameter_prestasi" aria-label=".form-select-lg example">
                                                    <?php $no = 0;
                                                    foreach ($sub_k2 as $pilihan) : $no++; ?>
                                                        <option value="<?php echo $pilihan['id_sub']; ?>"><?php echo $pilihan['keterangan']; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <div class="form-group">
                                                <label>BUKTI IPK : </label>
                                                <a href="" class="btn btn-info btn-xs" data-toggle="modal" data-target="#modal_ipk<?php echo $mhs['id_pendaftaran']; ?>" title="Lihat Gambar">Lihat Transkrip</a>
                                                <br>
                                                <label for="exampleInputnoktp">Input IPK</label>
                                                <select class="form-select form-select-lg mb-3" name="parameter_ipk" aria-label=".form-select-lg example">
                                                    <?php $no = 0;
                                                    foreach ($sub_k3 as $pilihan) : $no++; ?>
                                                        <option value="<?php echo $pilihan['id_sub']; ?>"><?php echo $pilihan['keterangan']; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <div class="form-group">
                                                <label>BUKTI ORGANISASI : </label>
                                                <a href="" class="btn btn-info btn-xs" data-toggle="modal" data-target="#modal_org<?php echo $mhs['id_pendaftaran']; ?>" title="Lihat Gambar">Lihat Organisasi</a>
                                                <br>
                                                <label for="exampleInputnoktp">Input Organisasi</label>
                                                <select class="form-select form-select-lg mb-3" name="parameter_organisasi" aria-label=".form-select-lg example">
                                                    <?php $no = 0;
                                                    foreach ($sub_k4 as $pilihan) : $no++; ?>
                                                        <option value="<?php echo $pilihan['id_sub']; ?>"><?php echo $pilihan['keterangan']; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <br>
                            <input type="text" hidden class="form-control" id="InputPer" name="periode" value="<?php echo $mhs['periode']; ?>">
                            <button type="submit" name="btninnilai" class="btn btn-primary">Save changes</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>

        <!-- MODAL EDIT mhs-->
        <?php $no = 0;
        foreach ($mahasiswa as $mhs) : $no++; ?>
            <div class="modal" id="modal_ubnilai<?php echo $mhs['id_pendaftaran']; ?>" tabindex="-1" id="" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-primary">
                            <h5 class="modal-title text-white">Input Nilai</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="ubah_nilai" method="POST" enctype="multipart/form-data">
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
                                            <label for="InputFakultas1" class="form-label">Jenjang/Prodi/Fakultas</label>
                                            <input type="text" class="form-control" id="InputFakultas1" required name="fakultas" placeholder="Contoh : S1 Sistem Informasi - FTKI" value="<?php echo $mhs['fakultas']; ?>">
                                        </div>
                                        <div class="col-sm mb-3">
                                            <label for="InputPT1" class="form-label">Perguruan Tinggi</label>
                                            <input type="text" class="form-control" id="InputPT1" required name="perguruan_tinggi" placeholder="Nama Universitas" value="<?php echo $mhs['perguruan_tinggi']; ?>">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="mb-3">
                                            <div class="form-group">
                                                <label>BUKTI KTM : </label>
                                                <a href="" class="btn btn-info btn-xs" data-toggle="modal" data-target="#modal_ktm<?php echo $mhs['id_pendaftaran']; ?>" title="Lihat Gambar">Lihat Bukti KTM</a>
                                                <br>
                                                <label for="exampleInputnoktp">Input Status Kemahasiswaan</label>
                                                <select class="form-select form-select-lg mb-3" name="parameter_mahasiswa" aria-label=".form-select-lg example">
                                                    <?php $no = 0;
                                                    foreach ($sub_k1 as $pilihan) : $no++; ?>
                                                        <option value="<?php echo $pilihan['id_sub']; ?>"><?php echo $pilihan['keterangan']; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <div class="form-group">
                                                <label>BUKTI PRESTASI : </label>
                                                <a href="" class="btn btn-info btn-xs" data-toggle="modal" data-target="#modal_pres<?php echo $mhs['id_pendaftaran']; ?>" title="Lihat Gambar">Lihat Sertifikat</a>
                                                <br>
                                                <label for="exampleInputnoktp">Input Prestasi</label>
                                                <select class="form-select form-select-lg mb-3" name="parameter_prestasi" aria-label=".form-select-lg example">
                                                    <?php $no = 0;
                                                    foreach ($sub_k2 as $pilihan) : $no++; ?>
                                                        <option value="<?php echo $pilihan['id_sub']; ?>"><?php echo $pilihan['keterangan']; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <div class="form-group">
                                                <label>BUKTI IPK : </label>
                                                <a href="" class="btn btn-info btn-xs" data-toggle="modal" data-target="#modal_ipk<?php echo $mhs['id_pendaftaran']; ?>" title="Lihat Gambar">Lihat Transkrip</a>
                                                <br>
                                                <label for="exampleInputnoktp">Input IPK</label>
                                                <select class="form-select form-select-lg mb-3" name="parameter_ipk" aria-label=".form-select-lg example">
                                                    <?php $no = 0;
                                                    foreach ($sub_k3 as $pilihan) : $no++; ?>
                                                        <option value="<?php echo $pilihan['id_sub']; ?>"><?php echo $pilihan['keterangan']; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <div class="form-group">
                                                <label>BUKTI ORGANISASI : </label>
                                                <a href="" class="btn btn-info btn-xs" data-toggle="modal" data-target="#modal_org<?php echo $mhs['id_pendaftaran']; ?>" title="Lihat Gambar">Lihat Organisasi</a>
                                                <br>
                                                <label for="exampleInputnoktp">Input Organisasi</label>
                                                <select class="form-select form-select-lg mb-3" name="parameter_organisasi" aria-label=".form-select-lg example">
                                                    <?php $no = 0;
                                                    foreach ($sub_k4 as $pilihan) : $no++; ?>
                                                        <option value="<?php echo $pilihan['id_sub']; ?>"><?php echo $pilihan['keterangan']; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <br>
                            <button type="submit" name="btnubnilai" class="btn btn-primary">Save changes</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        <!-- -------------------------------- -->
        <?php foreach ($mahasiswa as $baris) {
            $baris = (array)$baris; ?>
            <!-- MODAL VIEW KTM -->
            <div class="modal fade bs-example-modal-lg" id="modal_ktm<?php echo $baris['id_pendaftaran']; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" style="margin-top:5px;">
                    <div class="modal-content">
                        <div class="modal-body">
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                            <img src="<?php echo base_url() . "files/uploads/" . $baris['ktm']; ?>" alt="foto ktp" width="700px" height="450px">
                        </div>
                    </div>
                </div>
            </div>
            <!-- MODAL VIEW PRESTASI -->
            <div class="modal fade bs-example-modal-lg" id="modal_pres<?php echo $baris['id_pendaftaran']; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" style="margin-top:5px;">
                    <div class="modal-content">
                        <div class="modal-body">
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                            <img src="<?php echo base_url() . "files/uploads/" . $baris['sertifikat']; ?>" alt="foto kk" width="700px" height="550px">
                        </div>
                    </div>
                </div>
            </div>
            <!-- MODAL VIEW TRANSKRIP -->
            <div class="modal fade bs-example-modal-lg" id="modal_ipk<?php echo $baris['id_pendaftaran']; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" style="margin-top:5px;">
                    <div class="modal-content">
                        <div class="modal-body">
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                            <img src="<?php echo base_url() . "files/uploads/" . $baris['transkrip']; ?>" alt="foto pernyataan" width="720px" height="800px">
                        </div>
                    </div>
                </div>
            </div>
            <!-- MODAL VIEW ORGANISASI -->
            <div class="modal fade bs-example-modal-lg" id="modal_org<?php echo $baris['id_pendaftaran']; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" style="margin-top:5px;">
                    <div class="modal-content">
                        <div class="modal-body">
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                            <img src="<?php echo base_url() . "files/uploads/" . $baris['organisasi']; ?>" alt="foto pernyataan" width="720px" height="800px">
                        </div>
                    </div>
                </div>
            </div>
        <?php
        } ?>

        <!-- -------------------------- -->

    </div>
</div>
<!-- /.content -->