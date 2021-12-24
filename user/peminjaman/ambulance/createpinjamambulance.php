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
						<a href="#">Ambulance</a>
					</li>
				</ul>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="card">
						<div class="card-header">
							<div class="card-title">Create Pinjam Ambulance</div>
						</div>
						<form method="POST" action="" enctype="multipart/form-data">
							<div class="card-body">
								<div class="form-group">
									<label>Nama Ambulance</label>
									<select class="form-control" id="id_ambulance" onchange="change(this.value)" name="id_ambulance" required="">
										<option value="" hidden="">-- Pilih Ambulance --</option>
										<?php
										$query       = mysqli_query($conn, 'SELECT * from ambulance');
										$deskripsi 	 = "var deskripsi 		= new Array();\n;";
										$nama_ambulance = "var nama_ambulance= new Array();\n;";
										while ($row = mysqli_fetch_array($query)) {
											if ($row['status'] == 'free') {
												echo '<option value="' . $row['id'] . '">' . $row['nama_ambulance'] . '</option>';
											}
											$deskripsi .= "deskripsi['" . $row['id'] . "'] = {deskripsi:'" . addslashes($row['deskripsi']) . "'};\n";
											$nama_ambulance .= "nama_ambulance['" . $row['id'] . "'] = {nama_ambulance:'" . addslashes($row['nama_ambulance']) . "'};\n";
										}
										?>
									</select>
								</div>

								<input type="hidden" readonly="" id="nama_ambulance" name="nama_ambulance">

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
								<a href="?view=datapinjamambulance" class="btn btn-danger"><i class="fa fa-undo"></i> Cancel</a>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<center>
		<h6><b>&copy; Copyright@2020|GPIB CINERE|</b></h6>
	</center>
</div>

<script type="text/javascript">
	<?php
	echo $nama_ambulance;
	echo $deskripsi;
	?>

	function change(id_ambulance) {
		document.getElementById('nama_ambulance').value = nama_ambulance[id_ambulance].nama_ambulance;
		document.getElementById('deskripsi').value = deskripsi[id_ambulance].deskripsi;
	};
</script>

<?php
if (isset($_POST['simpan'])) {

	$id_ambulance = $_POST['id_ambulance'];
	$tgl_mulai = $_POST['tgl_mulai'];
	$tgl_selesai = $_POST['tgl_selesai'];
	$id_user = $_POST['id_user'];
	$status = $_POST['status'];

	$email_user = $_POST['email_user'];
	$email_admin = $_POST['email_admin'];
	$password_user = $_POST['password_user'];
	$nama_ambulance = $_POST['nama_ambulance'];

	$selSto = mysqli_query($conn, "SELECT * FROM ambulance WHERE id='$id_ambulance'");
	$sto    = mysqli_fetch_array($selSto);
	$stok    = $sto['status'];
	//menghitung sisa stok
	$sisa    = 'dipinjam';

	mysqli_query($conn, "INSERT into pinjamambulance values ('','$id_ambulance', '$id_user','$tgl_mulai','$tgl_selesai','$status')");
	mysqli_query($conn, "UPDATE ambulance SET status='$sisa' WHERE id='$id_ambulance'");
}
?>