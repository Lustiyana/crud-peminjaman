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
										<a href="?view=createpinjammobil" class="btn btn-primary btn-round ml-auto">
											<i class="fa fa-plus"></i>
											Tambah Data
										</a>
									</div>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table id="add-row" class="display table table-striped table-hover" >
											<thead>
												<tr>
													<th>No</th>
													<th>Merk Mobil</th>
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
													$query = mysqli_query($conn,'SELECT pinjammobil.id, pinjammobil.id_mobil, pinjammobil.id_user, pinjammobil.tgl_mulai, pinjammobil.tgl_selesai, pinjammobil.qty, pinjammobil.lokasi_mobil, pinjammobil.status, mobil.nama_mobil from pinjammobil inner join mobil on mobil.id=pinjammobil.id_mobil inner join user on user.id=pinjammobil.id_user');
													while ($pinjammobil = mysqli_fetch_array($query)) {
												?>
												<?php if($_SESSION['id'] == $pinjammobil['id_user']) { ?>
												<tr>
													<td><?php echo $no++ ?></td>
													<td><?php echo $pinjammobil['nama_mobil'] ?></td>
													<td><?php echo $pinjammobil['tgl_mulai'] ?></td>
													<td><?php echo $pinjammobil['tgl_selesai'] ?></td>
													<td><?php echo $pinjammobil['qty'] ?></td>
													<td>
														<?php if($pinjammobil['status'] == 'menunggu') { ?>
														<div class="badge badge-danger"><?php echo $pinjammobil['status'] ?></div>
														<?php }else { ?>
															<div class="badge badge-success"><?php echo $pinjammobil['status'] ?></div>
														<?php } ?>
													</td>
													<td>
														<?php if($pinjammobil['status'] == 'menunggu') { ?>
														<a href="?view=detailpinjammobil&id=<?php echo $pinjammobil['id'] ?>" title="Detail" class="btn btn-xs btn-success"><i class="fa fa-eye"></i></a>
														<a href="#modalHapusPinjamMobil<?php echo $pinjammobil['id'] ?>" data-toggle="modal" title="Batal Pinjam" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Batal</a>
													<?php }elseif($pinjammobil['status'] == 'approve') { ?>
														<a href="?view=detailpinjammobil&id=<?php echo $pinjammobil['id'] ?>" title="Detail" class="btn btn-xs btn-success"><i class="fa fa-eye"></i></a>
														<a href="#modalKembalikanPinjammobil<?php echo $pinjammobil['id'] ?>" data-toggle="modal" title="Kembalikan" class="btn btn-xs btn-warning"><i class="fa fa-warning"></i> Kembalikan</a>
													<?php }else { ?>
														<a href="?view=detailpinjammobil&id=<?php echo $pinjammobil['id'] ?>" title="Detail" class="btn btn-xs btn-success"><i class="fa fa-eye"></i></a>
														<div class="badge badge-success"><?php echo $pinjammobil['status'] ?></div>
													<?php } ?>
													</td>
												</tr>
											<?php } ?>
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
										$c = mysqli_query($conn,'SELECT pinjammobil.id, pinjammobil.id_mobil, pinjammobil.id_user, pinjammobil.tgl_mulai, pinjammobil.tgl_selesai, pinjammobil.qty, pinjammobil.lokasi_mobil, pinjammobil.status, mobil.nama_mobil from pinjammobil inner join mobil on mobil.id=pinjammobil.id_mobil inner join user on user.id=pinjammobil.id_user');
										while($row = mysqli_fetch_array($c)) {
									?>

									<div class="modal fade" id="modalHapusPinjammobil<?php echo $row['id'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header no-bd">
													<h5 class="modal-title">
														<span class="fw-mediumbold">
														Batalkan</span> 
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
													<input type="hidden" name="id_mobil" value="<?php echo $row['id_mobil'] ?>">
													<input type="hidden" name="qty" value="<?php echo $row['qty'] ?>">
													<h4>Apakah Anda Ingin Membatalkan Pinjamanan Ini ?</h4>
												</div>
												<div class="modal-footer no-bd">
													<button type="submit" name="hapus" class="btn btn-danger"><i class="fa fa-trash"></i> Batal Pinjam</button>
													<button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-undo"></i> Close</button>
												</div>
												</form>
											</div>
										</div>
									</div>

									<?php } ?>

									<?php 
										$c = mysqli_query($conn,'SELECT pinjammobil.id, pinjammobil.id_mobil, pinjammobil.id_user, pinjammobil.tgl_mulai, pinjammobil.tgl_selesai, pinjammobil.qty, pinjammobil.lokasi_mobil, pinjammobil.status, mobil.nama_mobil from pinjammobil inner join mobil on mobil.id=pinjammobil.id_mobil inner join user on user.id=pinjammobil.id_user');
										while($row = mysqli_fetch_array($c)) {
									?>

									<div class="modal fade" id="modalKembalikanPinjamMobil<?php echo $row['id'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header no-bd">
													<h5 class="modal-title">
														<span class="fw-mediumbold">
														Batalkan</span> 
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
													<input type="hidden" name="id_mobil" value="<?php echo $row['id_mobil'] ?>">
													<input type="hidden" name="qty" value="<?php echo $row['qty'] ?>">
													<input type="hidden" name="status" value="selesai">
													<h4>Apakah Anda Ingin Mengembalikan Pinjamanan Ini ?</h4>
												</div>
												<div class="modal-footer no-bd">
													<button type="submit" name="ubah" class="btn btn-warning"><i class="fa fa-warning"></i> Kembalikan Pinjaman</button>
													<button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-undo"></i> Close</button>
												</div>
												</form>
											</div>
										</div>
									</div>

									<?php } ?>

		<?php 
			if(isset($_POST['hapus']))
			{
				$id = $_POST['id'];
				$id_mobil = $_POST['id_mobil'];
				$qty = $_POST['qty'];

				$selSto = mysqli_query($conn, "SELECT * FROM mobil WHERE id='$id_mobil'");
			    $sto    = mysqli_fetch_array($selSto);
			    $stok   = $sto['stok'];
			    $sisa    =$stok+$qty;

		        mysqli_query($conn, "UPDATE mobil SET stok='$sisa' WHERE id='$id_mobil'");
		        mysqli_query($conn,"DELETE from pinjammobil where id='$id'");
		        echo "<script>alert ('Data Berhasil Dihapus') </script>";
                echo"<meta http-equiv='refresh' content=0; URL=?view=datapinjammobil>";
			
			}elseif(isset($_POST['ubah']))
			{
				$id = $_POST['id'];
				$id_mobil = $_POST['id_mobil'];
				$qty = $_POST['qty'];
				$status = $_POST['status'];

				$selSto = mysqli_query($conn, "SELECT * FROM mobil WHERE id='$id_mobil'");
			    $sto    = mysqli_fetch_array($selSto);
			    $stok   = $sto['stok'];
			    $sisa    =$stok+$qty;

		        mysqli_query($conn, "UPDATE mobil SET stok='$sisa' WHERE id='$id_mobil'");
		        mysqli_query($conn,"UPDATE pinjammobil set status='$status' where id='$id'");
		        echo "<script>alert ('Data Berhasil Dihapus') </script>";
                echo"<meta http-equiv='refresh' content=0; URL=?view=datapinjammobil>";
			}
		?>

