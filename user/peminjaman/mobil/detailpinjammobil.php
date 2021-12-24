<?php
$query = mysqli_query($conn,"SELECT pinjammobil.id, pinjammobil.id_mobil, pinjammobil.id_user, pinjammobil.tgl_mulai, pinjammobil.tgl_selesai, pinjammobil.qty, pinjammobil.lokasi_mobil, pinjammobil.status, mobil.nama_mobil, mobil.foto, mobil.deskripsi, user.nama_lengkap from pinjammobil inner join mobil on mobil.id=pinjammobil.id_mobil inner join user on user.id=pinjammobil.id_user and pinjammobil.id='$_GET[id]'");
$d = mysqli_fetch_array($query);
?>

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
										<h4 class="card-title">Detail Pinjam Mobil</h4>
									</div>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table class="table">											
											<tr>
												<td>Nama Peminjam</td>
												<td>:</td>
												<td><?php echo $d['nama_lengkap'] ?></td>
											</tr>
											<tr>
												<td>Nama Mobil</td>
												<td>:</td>
												<td><?php echo $d['nama_mobil'] ?></td>
											</tr>
											<tr>
												<td>Jumlah Pinjam</td>
												<td>:</td>
												<td><?php echo $d['qty'] ?></td>
											</tr>
											<tr>
												<td>Tgl Mulai</td>
												<td>:</td>
												<td><?php echo $d['tgl_mulai'] ?></td>
											</tr>
											<tr>
												<td>Tgl Selesai</td>
												<td>:</td>
												<td><?php echo $d['tgl_selesai'] ?></td>
											</tr>
											<tr>
												<td>Status</td>
												<td>:</td>
												<td><?php echo $d['status'] ?></td>
											</tr>
											<tr>
												<td>Lokasi Mobil</td>
												<td>:</td>
												<td><?php echo $d['lokasi_mobil'] ?></td>
											</tr>

											<tr>
												<td>Deskripsi</td>
												<td>:</td>
												<td><?php echo $d['deskripsi'] ?></td>
											</tr>

											<tr>
												<td>Foto</td>
												<td>:</td>
												<td><img src="../admin/master/mobil/Fotomobil/<?php echo $d['foto'] ?>" width="400" height="200"></td>
											</tr>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>