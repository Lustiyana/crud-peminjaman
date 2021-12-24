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
						<a href="#">Mobil</a>
					</li>
				</ul>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-header">
							<div class="d-flex align-items-center">
								<h4 class="card-title">Data Pinjam Mobil</h4>

							</div>
						</div>
						<div class="card-body">
							<div class="table-responsive">
								<table id="add-row" class="display table table-striped table-hover">
									<thead>
										<tr>
											<th>No</th>
											<th>Nama Mobil</th>
											<th>Tgl Mulai</th>
											<th>Tgl Selesai</th>
											<th>Jumlah Pinjam</th>
											<th>Status</th>
											<th>Action</th>
										</tr>
									</thead>

									<tbody>
										<?php
										$no = 1;
										$query = mysqli_query($conn, 'SELECT pinjammobil.id, pinjammobil.id_mobil, pinjammobil.id_user, pinjammobil.tgl_mulai, pinjammobil.tgl_selesai, pinjammobil.qty, pinjammobil.lokasi_mobil, pinjammobil.status, mobil.nama_mobil from pinjammobil inner join mobil on mobil.id=pinjammobil.id_mobil inner join user on user.id=pinjammobil.id_user');
										while ($pinjammobil = mysqli_fetch_array($query)) {
										?>
											<tr>
												<td><?php echo $no++ ?></td>
												<td><?php echo $pinjammobil['nama_mobil'] ?></td>
												<td><?php echo $pinjammobil['tgl_mulai'] ?></td>
												<td><?php echo $pinjammobil['tgl_selesai'] ?></td>
												<td><?php echo $pinjammobil['qty'] ?></td>
												<td>
													<?php if ($pinjammobil['status'] == 'menunggu') { ?>
														<div class="badge badge-danger"><?php echo $pinjammobil['status'] ?></div>
													<?php } else { ?>
														<div class="badge badge-success"><?php echo $pinjammobil['status'] ?></div>
													<?php } ?>
												</td>
												<td>
													<?php if ($pinjammobil['status'] == 'menunggu') { ?>
														<a href="?view=detailpinjammobil&id=<?php echo $pinjammobil['id'] ?>" title="Detail" class="btn btn-xs btn-success"><i class="fa fa-eye"></i></a>
														<a href="#modalApprovePinjamMobil<?php echo $pinjammobil['id'] ?>" data-toggle="modal" title="Batal Pinjam" class="btn btn-xs btn-success"><i class="fa fa-check-circle"></i> Aprrove</a>
													<?php } else { ?>
														<div class="badge badge-success"><?php echo $pinjammobil['status'] ?></div>
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
$c = mysqli_query($conn, 'SELECT pinjammobil.id, pinjammobil.id_mobil, pinjammobil.id_user, pinjammobil.tgl_mulai, pinjammobil.tgl_selesai, pinjammobil.qty, pinjammobil.lokasi_mobil, pinjammobil.status, mobil.nama_mobil, user.email from pinjammobil inner join mobil on mobil.id=pinjammobil.id_mobil inner join user on user.id=pinjammobil.id_user');
while ($row = mysqli_fetch_array($c)) {
?>

	<div class="modal fade" id="modalApprovePinjamMobil<?php echo $row['id'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
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
						<input type="hidden" name="tgl_mulai" value="<?php echo $row['tgl_mulai'] ?>">
						<input type="hidden" name="tgl_selesai" value="<?php echo $row['tgl_selesai'] ?>">
						<input type="hidden" name="qty" value="<?php echo $row['qty'] ?>">
						<div class="form-group">
							<label>Email Pengirim</label>
							<input type="email" name="email_pengirim" class="form-control">
						</div>
						<div class="form-group">
							<label>Password Pengirim</label>
							<input type="password" name="password_pengirim" class="form-control">
						</div>
						<input type="hidden" name="status" value="approve">
						<input type="hidden" name="email_penerima" value="<?php echo $row['email'] ?>">
						<input type="hidden" name="nama_mobil" value="<?php echo $row['nama_mobil'] ?>">
					</div>
					<div class="modal-footer no-bd">
						<button type="submit" name="ubah" class="btn btn-success"><i class="fa fa-check-circle"></i> Approve</button>
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
	$email_pengirim = $_POST['email_pengirim'];
	$password_pengirim = $_POST['password_pengirim'];
	$email_penerima = $_POST['email_penerima'];
	$status = $_POST['status'];
	$tgl_selesai = $_POST['tgl_selesai'];
	$tgl_mulai = $_POST['tgl_mulai'];
	$qty = $_POST['qty'];
	$nama_mobil = $_POST['nama_mobil'];

	mysqli_query($conn, "UPDATE pinjammobil SET status='$status' WHERE id='$id'");
}
?>