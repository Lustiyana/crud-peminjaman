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
						<a href="#">Mobil</a>
					</li>
				</ul>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="card">
						<div class="card-header">
							<div class="card-title">Create Pinjam Mobil</div>
						</div>
						<form method="POST" action="" enctype="multipart/form-data">
							<div class="card-body">
								<div class="form-group">
									<label>Merk Mobil</label>
									<select class="form-control" id="id_mobil" onchange="changeValue(this.value)" name="id_mobil" required="">
										<option value="" hidden="">-- Pilih Mobil --</option>
										<?php
										$query       = mysqli_query($conn, 'SELECT * from mobil');
										$stok 	     = "var stok 		= new Array();\n;";
										$deskripsi   = "var deskripsi   = new Array();\n;";
										$nama_mobil = "var nama_mobil = new Array();\n;";
										while ($row = mysqli_fetch_array($query)) {
											echo '<option value="' . $row['id'] . '">' . $row['nama_mobil'] . '</option>';
											$stok .= "stok['" . $row['id'] . "'] = {stok:'" . addslashes($row['stok']) . "'};\n";
											$deskripsi .= "deskripsi['" . $row['id'] . "'] = {deskripsi:'" . addslashes($row['deskripsi']) . "'};\n";
											$nama_mobil .= "nama_mobil['" . $row['id'] . "'] = {nama_mobil:'" . addslashes($row['nama_mobil']) . "'};\n";
										}
										?>
									</select>
								</div>

								<input type="hidden" readonly="" id="nama_mobil" value="<?php echo $nama_mobil; ?>" name="nama_mobil">

								<div class="form-group">
									<label>Stok Mobil Tersedia</label>
									<input type="text" readonly="" id="stok" class="form-control" placeholder="">
								</div>

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
									<label>Jumlah Pinjam Mobil</label>
									<input min="1" step="1" value="1" type="number" name="qty" class="form-control" placeholder="Jumlah Pinjam Mobil ...">
								</div>

								<div class="form-group">
									<label>Tgl Mulai Pinjam</label>
									<input type="text" readonly="" name="tgl_mulai" class="form-control" value="<?php echo date('Y-m-d') ?>">
								</div>

								<div class="form-group">
									<label>Tgl Selesai Pinjam</label>
									<input type="date" name="tgl_selesai" class="form-control">
								</div>

								<div class="form-group">
									<label>Lokasi Mobil</label>
									<textarea class="form-control" name="lokasi_mobil" rows="5" placeholder="Lokasi Mobil ..." style="white-space: pre-line;"></textarea>
								</div>

								<input type="hidden" name="id_user" value="<?php echo $_SESSION['id'] ?>">
								<input type="hidden" name="email_admin" value="emailpenerima@gmail.com">
								<input type="hidden" name="status" value="menunggu">

							</div>
							<div class="card-action">
								<button type="submit" name="simpan" class="btn btn-success"><i class="fa fa-save"></i> Save Changes</button>
								<a href="?view=datapinjammobil" class="btn btn-danger"><i class="fa fa-undo"></i> Cancel</a>
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
	echo $stok;
	echo $deskripsi;
	echo $nama_mobil;
	?>

	function changeValue(id) {
		document.getElementById('stok').value = stok[id].stok;
		document.getElementById('deskripsi').value = deskripsi[id].deskripsi;
		document.getElementById('nama_mobil').value = nama_mobil[id].nama_mobil;
	};
</script>


<?php
if (isset($_POST['simpan'])) {

	$id_mobil = $_POST['id_mobil'];
	$qty = $_POST['qty'];
	$tgl_mulai = $_POST['tgl_mulai'];
	$tgl_selesai = $_POST['tgl_selesai'];
	$lokasi_mobil = $_POST['lokasi_mobil'];
	$id_user = $_POST['id_user'];
	$status = $_POST['status'];

	$email_user = $_POST['email_user'];
	$email_admin = $_POST['email_admin'];
	$password_user = $_POST['password_user'];
	$nama_mobil = $_POST['nama_mobil'];

	$selSto = mysqli_query($conn, "SELECT * FROM mobil WHERE id='$id_mobil'");
	$sto    = mysqli_fetch_array($selSto);
	$stok    = $sto['stok'];
	//menghitung sisa stok
	$sisa    = $stok - $qty;

	if ($stok < $qty) {
		echo "<script>alert ('Stok Kurang Dari Jumlah Pinjam') </script>";
	} else {
		mysqli_query($conn, "INSERT into pinjammobil values ('','$id_mobil', '$id_user','$qty','$tgl_mulai','$tgl_selesai','$lokasi_mobil','$status')");
		mysqli_query($conn, "UPDATE mobil SET stok='$sisa' WHERE id='$id_mobil'");
	}
}
?>