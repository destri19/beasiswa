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
							<a href="" data-toggle="modal" data-target="#modal_tambah" class="btn btn-success"><b>TAMBAH USER</b></a>
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
										<th>Username</th>
										<th>Password</th>
										<th>Level Akses</th>
										<th class="text-center" width="180">Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$no = 1;
									foreach ($data_user as $sub) { ?>
										<tr>
											<td><?php echo $no++; ?></td>
											<td><?php echo $sub['username']; ?></td>
											<td><?php echo $sub['password']; ?></td>
											<td><?php echo $sub['level_akses']; ?></td>
											<td align="center">
												<a href="" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modal_edit<?php echo $sub['id']; ?>" title="Edit"><i class="far fa-edit"></i> </a>
												<a href="" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal_hapus<?php echo $sub['id']; ?>" title="Hapus"><i class="far fa-trash-alt"></i></a>
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
		<!-- MODAL TAMBAH TIM -->
		<div class="modal" id="modal_tambah" tabindex="-1" role="dialog">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header bg-primary">
						<h5 class="modal-title text-white">Tambah Data</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">

						<form action="tambah_user" method="POST">
							<div class="form-group">
								<label for="exampleInputnoktp">Username</label>
								<input type="text" name="username" class="form-control" id="exampleInputnoktp" aria-describedby="emailHelp" placeholder="Masukan Username" value="">
							</div>
							<div class="form-group">
								<label for="exampleInputnoktp">Password</label>
								<input type="password" name="password" class="form-control" id="exampleInputnama" aria-describedby="emailHelp" placeholder="Masukan Password" value="">
							</div>
							<div class="form-group">
								<label for="exampleSelectRounded0">Level Akses<code></code></label>
								<select class="custom-select rounded-0" name="level_akses" id="exampleSelectRounded0">
									<option>ADMIN</option>
									<option>BIRO</option>
								</select>
							</div>
					</div>
					<div class="modal-footer">
						<br>
						<button type="submit" name="btnTambah" class="btn btn-primary">Save Data</button>
						<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
					</div>
					</form>
				</div>
			</div>
		</div>
		<!-- ------------------------- -->

		<!-- MODAL EDIT TIM -->
		<?php $no = 0;
		foreach ($data_user as $baris) : $no++; ?>
			<div class="modal" id="modal_edit<?php echo $baris['id']; ?>" tabindex="-1" id="" role="dialog">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header bg-primary">
							<h5 class="modal-title text-white">Edit Data</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">

							<form action="edit_user" method="POST">
								<div class="form-group">
									<label for="exampleInputnoktp">Username</label>
									<input type="text" name="username" class="form-control" id="exampleInputnoktp" aria-describedby="emailHelp" placeholder="Masukan No KTP" value="<?php echo $baris['username']; ?>">
								</div>
								<div class="form-group">
									<label for="exampleInputnoktp">Password</label>
									<input type="password" name="password" class="form-control" id="exampleInputnama" aria-describedby="emailHelp" placeholder="Masukan Nama" value="<?php echo $baris['password']; ?>">
								</div>
								<input type="text" hidden name="id" value="<?php echo $baris['id']; ?>">

								<div class="form-group">
									<label for="exampleSelectRounded0">Level Akses<code></code></label>
									<select class="custom-select rounded-0" name="level_akses" id="exampleSelectRounded0">
										<option>ADMIN</option>
										<option>BIRO</option>
									</select>
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
		<div class="modal" id="modal_hapus<?php echo $baris['id']; ?>" tabindex="-1" role="dialog">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header bg-primary">
						<h5 class="modal-title text-white">Konfirmasi Hapus Data</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form action="hapus_user" method="POST">
							<h4>Yakin akan hapus data <?php echo $baris['username']; ?> ?</h4>
					</div>
					<div class="modal-footer">
						<br>
						<input type="text" hidden name="id" value="<?php echo $baris['id']; ?>">
						<button type="submit" name="btnHapus" class="btn btn-primary">Delete</button>
						<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
					</div>
					</form>
				</div>
			</div>
		</div>
		<!-- ------------------------- -->

	</div>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->