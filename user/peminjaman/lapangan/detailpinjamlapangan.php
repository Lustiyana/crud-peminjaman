<?php
$query = mysqli_query($conn,"SELECT pinjamlapangan.id, pinjamlapangan.id_lapangan, pinjamlapangan.id_user, pinjamlapangan.tgl_mulai, pinjamlapangan.tgl_selesai, pinjamlapangan.status, lapangan.nama_lapangan, lapangan.foto, lapangan.deskripsi, user.nama_lengkap from pinjamlapangan inner join lapangan on lapangan.id=pinjamlapangan.id_lapangan inner join user on user.id=pinjamlapangan.id_user and pinjamlapangan.id='$_GET[id]'");
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
								<a href="#">Lapangan</a>
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
												<td>Nama Lapangan</td>
												<td>:</td>
												<td><?php echo $d['nama_lapangan'] ?></td>
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
												<td><img src="../admin/master/lapangan/Fotolapangan/<?php echo $d['foto'] ?>" width="400" height="200"></td>
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