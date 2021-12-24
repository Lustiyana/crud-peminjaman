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
						<a href="#">Ambulance</a>
					</li>
				</ul>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-header">
							<div class="d-flex align-items-center">
								<h4 class="card-title">Data Pinjam Ambulance</h4>

							</div>
						</div>
						<div class="card-body">
							<div class="table-responsive">
								<table id="add-row" class="display table table-striped table-hover">
									<thead>
										<tr>
											<th>No</th>
											<th>Nama Ambulance</th>
											<th>Tgl Mulai</th>
											<th>Tgl Selesai</th>
											<th>Status</th>
											<th>Action</th>
										</tr>
									</thead>

									<tbody>
										<?php
										$no = 1;
										$query = mysqli_query($conn, 'SELECT pinjamambulance.id, pinjamambulance.id_ambulance, pinjamambulance.id_user, pinjamambulance.tgl_mulai, pinjamambulance.tgl_selesai, pinjamambulance.status, ambulance.nama_ambulance from pinjamambulance inner join ambulance on ambulance.id=pinjamambulance.id_ambulance inner join user on user.id=pinjamambulance.id_user');
										while ($pinjamambulance = mysqli_fetch_array($query)) {
										?>
											<tr>
												<td><?php echo $no++ ?></td>
												<td><?php echo $pinjamambulance['nama_ambulance'] ?></td>
												<td><?php echo $pinjamambulance['tgl_mulai'] ?></td>
												<td><?php echo $pinjamambulance['tgl_selesai'] ?></td>
												<td>
													<?php if ($pinjamambulance['status'] == 'menunggu') { ?>
														<div class="badge badge-danger"><?php echo $pinjamambulance['status'] ?></div>
													<?php } else { ?>
														<div class="badge badge-success"><?php echo $pinjamambulance['status'] ?></div>
													<?php } ?>
												</td>
												<td>
													<?php if ($pinjamambulance['status'] == 'menunggu') { ?>
														<a href="?view=detailpinjamambulance&id=<?php echo $pinjamambulance['id'] ?>" title="Detail" class="btn btn-xs btn-success"><i class="fa fa-eye"></i></a>
														<a href="#modalApprovePinjamAmbulance<?php echo $pinjamambulance['id'] ?>" data-toggle="modal" title="Batal Pinjam" class="btn btn-xs btn-success"><i class="fa fa-check-circle"></i> Approve</a>
													<?php } else { ?>
														<a href="?view=detailpinjamambulance&id=<?php echo $pinjamambulance['id'] ?>" title="Detail" class="btn btn-xs btn-success"><i class="fa fa-eye"></i></a>
														<div class="badge badge-success"><?php echo $pinjamambulance['status'] ?></div>
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
$c = mysqli_query($conn, 'SELECT pinjamambulance.id, pinjamambulance.id_ambulance, pinjamambulance.id_user, pinjamambulance.tgl_mulai, pinjamambulance.tgl_selesai, pinjamambulance.status, ambulance.nama_ambulance, user.email from pinjamambulance inner join ambulance on ambulance.id=pinjamambulance.id_ambulance inner join user on user.id=pinjamambulance.id_user');
while ($row = mysqli_fetch_array($c)) {
?>

	<div class="modal fade" id="modalApprovePinjamAmbulance<?php echo $row['id'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
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
						<input type="hidden" name="id_ambulance" value="<?php echo $row['id_ambulance'] ?>">
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
						<input type="hidden" name="nama_ambulance" value="<?php echo $row['nama_ambulance'] ?>">
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
	$id_ambulance = $_POST['id_ambulance'];
	$email_pengirim = $_POST['email_pengirim'];
	$password_pengirim = $_POST['password_pengirim'];
	$email_penerima = $_POST['email_penerima'];
	$status = $_POST['status'];
	$stat = 'dipinjam';
	$nama_ambulancce = $_POST['nama_ambulance'];

	$selSto = mysqli_query($conn, "SELECT * FROM ambulance WHERE id='$id_ambulance'");
	$sto    = mysqli_fetch_array($selSto);
	$stok   = $sto['status'];
	$sisa    = 'free';

	mysqli_query($conn, "UPDATE ambulance SET status='$stat' WHERE id='$id_ambulance'");
	mysqli_query($conn, "UPDATE pinjamambulance SET status='$status' WHERE id='$id'");
}
?>