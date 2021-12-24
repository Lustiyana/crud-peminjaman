<div class="main-panel">
	<div class="content">
		<div class="page-inner">
			<div class="page-header">
				<h4 class="page-title">Data</h4>
				<ul class="breadcrumbs">
					<li class="nav-home">
						<a href="#">
							<i class="flaticon-home"></i>
						</a>
					</li>
					<li class="separator">
						<i class="flaticon-right-arrow"></i>
					</li>
					<li class="nav-item">
						<a href="#">Pinjam</a>
					</li>
					<li class="separator">
						<i class="flaticon-right-arrow"></i>
					</li>
					<li class="nav-item">
						<a href="#">Lapangan</a>
					</li>
				</ul>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-header">
							<div class="d-flex align-items-center">
								<h4 class="card-title">Data Pinjam Lapangan</h4>

							</div>
						</div>
						<div class="card-body">
							<div class="table-responsive">
								<table id="add-row" class="display table table-striped table-hover">
									<thead>
										<tr>
											<th>No</th>
											<th>Nama Lapangan</th>
											<th>Tgl Mulai</th>
											<th>Tgl Selesai</th>
											<th>Status</th>
											<th>Action</th>
										</tr>
									</thead>

									<tbody>
										<?php
										$no = 1;
										$query = mysqli_query($conn, 'SELECT pinjamlapangan.id, pinjamlapangan.id_lapangan, pinjamlapangan.id_user, pinjamlapangan.tgl_mulai, pinjamlapangan.tgl_selesai, pinjamlapangan.status, lapangan.nama_lapangan from pinjamlapangan inner join lapangan on lapangan.id=pinjamlapangan.id_lapangan inner join user on user.id=pinjamlapangan.id_user');
										while ($pinjamlapangan = mysqli_fetch_array($query)) {
										?>
											<tr>
												<td><?php echo $no++ ?></td>
												<td><?php echo $pinjamlapangan['nama_lapangan'] ?></td>
												<td><?php echo $pinjamlapangan['tgl_mulai'] ?></td>
												<td><?php echo $pinjamlapangan['tgl_selesai'] ?></td>
												<td>
													<?php if ($pinjamlapangan['status'] == 'menunggu') { ?>
														<div class="badge badge-danger"><?php echo $pinjamlapangan['status'] ?></div>
													<?php } else { ?>
														<div class="badge badge-success"><?php echo $pinjamlapangan['status'] ?></div>
													<?php } ?>
												</td>
												<td>
													<?php if ($pinjamlapangan['status'] == 'menunggu') { ?>
														<a href="?view=detailpinjamlapangan&id=<?php echo $pinjamlapangan['id'] ?>" title="Detail" class="btn btn-xs btn-success"><i class="fa fa-eye"></i></a>
														<a href="#modalApprovePinjamLapangan<?php echo $pinjamlapangan['id'] ?>" data-toggle="modal" title="Batal Pinjam" class="btn btn-xs btn-success"><i class="fa fa-check-circle"></i> Approve</a>
													<?php } else { ?>
														<a href="?view=detailpinjamlapangan&id=<?php echo $pinjamlapangan['id'] ?>" title="Detail" class="btn btn-xs btn-success"><i class="fa fa-eye"></i></a>
														<div class="badge badge-success"><?php echo $pinjamlapangan['status'] ?></div>
													<?php } ?>
												</td>
											</tr>
										<?php } ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<?php
$c = mysqli_query($conn, 'SELECT pinjamlapangan.id, pinjamlapangan.id_lapangan, pinjamlapangan.id_user, pinjamlapangan.tgl_mulai, pinjamlapangan.tgl_selesai, pinjamlapangan.status, lapangan.nama_lapangan, user.email from pinjamlapangan inner join lapangan on lapangan.id=pinjamlapangan.id_lapangan inner join user on user.id=pinjamlapangan.id_user');
while ($row = mysqli_fetch_array($c)) {
?>

	<div class="modal fade" id="modalApprovePinjamLapangan<?php echo $row['id'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header no-bd">
					<h5 class="modal-title">
						<span class="fw-mediumbold">
							Approve</span>
						<span class="fw-light">
							Pinjaman
						</span>
					</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form method="POST" enctype="multipart/form-data" action="">
					<div class="modal-body">
						<input type="hidden" name="id" value="<?php echo $row['id'] ?>">
						<input type="hidden" name="id_lapangan" value="<?php echo $row['id_lapangan'] ?>">
						<input type="hidden" name="tgl_mulai" value="<?php echo $row['tgl_mulai'] ?>">
						<input type="hidden" name="tgl_selesai" value="<?php echo $row['tgl_selesai'] ?>">
						<div class="form-group">
							<label>Email Pengirim</label>
							<input type="email" name="email_pengirim" class="form-control" placeholder="Email Pengirim ...">
						</div>
						<div class="form-group">
							<label>Password Pengirim</label>
							<input type="password" name="password_penerima" class="form-control" placeholder="Password Pengirim ...">
						</div>
						<input type="hidden" name="status" value="approve">
						<input type="hidden" name="email_penerima" value="<?php echo $row['email'] ?>">
						<input type="hidden" name="nama_lapangan" value="<?php echo $row['nama_lapangan'] ?>">
					</div>
					<div class="modal-footer no-bd">
						<button type="submit" name="ubah" class="btn btn-danger"><i class="fa fa-check-circle"></i> Approve</button>
						<button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-undo"></i> Close</button>
					</div>
				</form>
			</div>
		</div>
	</div>

<?php } ?>

<?php
if (isset($_POST['ubah'])) {
	$id = $_POST['id'];
	$id_lapangan = $_POST['id_lapangan'];
	$email_pengirim = $_POST['email_pengirim'];
	$password_pengirim = $_POST['password_pengirim'];
	$email_penerima = $_POST['email_penerima'];
	$status = $_POST['status'];
	$stat = 'dipinjam';
	$nama_lapangan = $_POST['nama_lapangan'];

	$selSto = mysqli_query($conn, "SELECT * FROM lapangan WHERE id='$id_lapangann'");
	$sto    = mysqli_fetch_array($selSto);
	$stok   = $sto['status'];
	$sisa    = 'free';

	mysqli_query($conn, "UPDATE lapangan SET status='$stat' WHERE id='$id_lapangan'");
	mysqli_query($conn, "UPDATE pinjamlapangan SET status='$status' WHERE id='$id'");
}
?>