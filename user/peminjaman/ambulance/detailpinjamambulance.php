<?php
$query = mysqli_query($conn,"SELECT pinjamambulance.id, pinjamambulance.id_ambulance, pinjamambulance.id_user, pinjamambulance.tgl_mulai, pinjamambulance.tgl_selesai, pinjamambulance.status, ambulance.nama_ambulance, ambulance.foto, ambulance.deskripsi, user.nama_lengkap from pinjamambulance inner join ambulance on ambulance.id=pinjamambulance.id_ambulance inner join user on user.id=pinjamambulance.id_user and pinjamambulance.id='$_GET[id]'");
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
								<a href="#">Ambulance</a>
							</li>
						</ul>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="d-flex align-items-center">
										<h4 class="card-title">Detail Pinjam Barang</h4>
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
												<td>Nama Ambulance</td>
												<td>:</td>
												<td><?php echo $d['nama_ambulance'] ?></td>
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
												<td>Deskripsi</td>
												<td>:</td>
												<td><?php echo $d['deskripsi'] ?></td>
											</tr>

											<tr>
												<td>Foto</td>
												<td>:</td>
												<td><img src="../admin/master/ambulance/Fotoambulance/<?php echo $d['foto'] ?>" width="400" height="200"></td>
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