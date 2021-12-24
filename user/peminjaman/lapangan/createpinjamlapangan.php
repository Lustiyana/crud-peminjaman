<div class="main-panel">
	<div class="content">
		<div class="page-inner">
			<div class="page-header">
				<h4 class="page-title">Create</h4>
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
				<div class="col-md-6">
					<div class="card">
						<div class="card-header">
							<div class="card-title">Create Pinjam Lapangan</div>
						</div>
						<form method="POST" action="" enctype="multipart/form-data">
							<div class="card-body">
								<div class="form-group">
									<label>Nama Lapangan</label>
									<select class="form-control" id="id_lapangan" onchange="change(this.value)" name="id_lapangan" required="">
										<option value="" hidden="">-- Pilih Lapangan --</option>
										<?php
										$query       = mysqli_query($conn, 'SELECT * from lapangan');
										$deskripsi 	 = "var deskripsi 		= new Array();\n;";
										$nama_lapangan = "var nama_lapangan= new Array();\n;";
										while ($row = mysqli_fetch_array($query)) {
											if ($row['status'] == 'free') {
												echo '<option value="' . $row['id'] . '">' . $row['nama_lapangan'] . '</option>';
											}
											$deskripsi .= "deskripsi['" . $row['id'] . "'] = {deskripsi:'" . addslashes($row['deskripsi']) . "'};\n";
											$nama_lapangan .= "nama_lapangan['" . $row['id'] . "'] = {nama_lapangan:'" . addslashes($row['nama_lapangan']) . "'};\n";
										}
										?>
									</select>
								</div>

								<input type="hidden" readonly="" id="nama_lapangan" name="nama_lapangan">

								<div class="form-group">
									<label>Deskripsi</label>
									<textarea readonly="" style="white-space: pre-line;" id="deskripsi" rows="5" class="form-control"></textarea>
								</div>

							</div>

					</div>
				</div>

				<div class="col-md-6">
					<div class="card">
						<div class="card-header">
							<div class="card-title">Data Peminjam</div>
						</div>
						<form method="POST" action="" enctype="multipart/form-data">
							<div class="card-body">
								<div class="form-group">
									<label>Email Pengirim</label>
									<input type="email" name="email_user" placeholder="Email Pengirim ..." class="form-control" required="">
								</div>
								<div class="form-group">
									<label>Password Pengirim</label>
									<input type="password" name="password_user" placeholder="Password Pengirim ..." class="form-control" required="">
								</div>

								<div class="form-group">
									<label>Tgl Mulai Pinjam</label>
									<input type="text" readonly="" name="tgl_mulai" class="form-control" value="<?php echo date('Y-m-d') ?>">
								</div>

								<div class="form-group">
									<label>Tgl Selesai Pinjam</label>
									<input type="date" name="tgl_selesai" class="form-control">
								</div>

								<input type="hidden" name="id_user" value="<?php echo $_SESSION['id'] ?>">
								<input type="hidden" name="email_admin" value="emailpenerima@gmail.com">
								<input type="hidden" name="status" value="menunggu">

							</div>
							<div class="card-action">
								<button type="submit" name="simpan" class="btn btn-success"><i class="fa fa-save"></i> Save Changes</button>
								<a href="?view=datapinjamlapangan" class="btn btn-danger"><i class="fa fa-undo"></i> Cancel</a>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	<?php
	echo $nama_lapangan;
	echo $deskripsi;
	?>

	function change(id_lapangan) {
		document.getElementById('nama_lapangan').value = nama_lapangan[id_lapangan].nama_lapangan;
		document.getElementById('deskripsi').value = deskripsi[id_lapangan].deskripsi;
	};
</script>

<?php
if (isset($_POST['simpan'])) {

	$id_lapangan = $_POST['id_lapangan'];
	$tgl_mulai = $_POST['tgl_mulai'];
	$tgl_selesai = $_POST['tgl_selesai'];
	$id_user = $_POST['id_user'];
	$status = $_POST['status'];

	$email_user = $_POST['email_user'];
	$email_admin = $_POST['email_admin'];
	$password_user = $_POST['password_user'];
	$nama_lapangan = $_POST['nama_lapangan'];

	$selSto = mysqli_query($conn, "SELECT * FROM lapangan WHERE id='$id_lapangan'");
	$sto    = mysqli_fetch_array($selSto);
	$stok    = $sto['status'];
	//menghitung sisa stok
	$sisa    = 'dipinjam';

	mysqli_query($conn, "INSERT into pinjamlapangan values ('','$id_lapangan', '$id_user','$tgl_mulai','$tgl_selesai','$status')");
	mysqli_query($conn, "UPDATE lapangan SET status='$sisa' WHERE id='$id_lapangan'");
}
?>