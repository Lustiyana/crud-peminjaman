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
										<a href="?view=createpinjamlapangan" class="btn btn-primary btn-round ml-auto">
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
													$query = mysqli_query($conn,'SELECT pinjamlapangan.id, pinjamlapangan.id_lapangan, pinjamlapangan.id_user, pinjamlapangan.tgl_mulai, pinjamlapangan.tgl_selesai, pinjamlapangan.status, lapangan.nama_lapangan from pinjamlapangan inner join lapangan on lapangan.id=pinjamlapangan.id_lapangan inner join user on user.id=pinjamlapangan.id_user');
													while ($pinjamlapangan = mysqli_fetch_array($query)) {
												?>
												<?php if($_SESSION['id'] == $pinjamlapangan['id_user']) { ?>
												<tr>
													<td><?php echo $no++ ?></td>
													<td><?php echo $pinjamlapangan['nama_lapangan'] ?></td>
													<td><?php echo $pinjamlapangan['tgl_mulai'] ?></td>
													<td><?php echo $pinjamlapangan['tgl_selesai'] ?></td>
													<td>
														<?php if($pinjamlapangan['status'] == 'menunggu') { ?>
														<div class="badge badge-danger"><?php echo $pinjamlapangan['status'] ?></div>
														<?php }else { ?>
															<div class="badge badge-success"><?php echo $pinjamlapangan['status'] ?></div>
														<?php } ?>
													</td>
													<td>
														<?php if($pinjamlapangan['status'] == 'menunggu') { ?>
														<a href="?view=detailpinjamlapangan&id=<?php echo $pinjamlapangan['id'] ?>" title="Detail" class="btn btn-xs btn-success"><i class="fa fa-eye"></i></a>
														<a href="#modalHapusPinjamLapangan<?php echo $pinjamlapangan['id'] ?>" data-toggle="modal" title="Batal Pinjam" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Batal</a>
													<?php }elseif($pinjamlapangan['status'] == 'approve') { ?>
														<a href="?view=detailpinjamlapangan&id=<?php echo $pinjamlapangan['id'] ?>" title="Detail" class="btn btn-xs btn-success"><i class="fa fa-eye"></i></a>
														<a href="#modalKembalikanPinjamLapangan<?php echo $pinjamlapangan['id'] ?>" data-toggle="modal" title="Batal Pinjam" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Kembalikan</a>
													<?php }else { ?>
														<a href="?view=detailpinjamlapangan&id=<?php echo $pinjamlapangan['id'] ?>" title="Detail" class="btn btn-xs btn-success"><i class="fa fa-eye"></i></a>
														<div class="badge badge-success"><?php echo $pinjamlapangan['status'] ?></div>
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
										$c = mysqli_query($conn,'SELECT pinjamlapangan.id, pinjamlapangan.id_lapangan, pinjamlapangan.id_user, pinjamlapangan.tgl_mulai, pinjamlapangan.tgl_selesai, pinjamlapangan.status, lapangan.nama_lapangan from pinjamlapangan inner join lapangan on lapangan.id=pinjamlapangan.id_lapangan inner join user on user.id=pinjamlapangan.id_user');
										while ($row = mysqli_fetch_array($query)) {
									?>

									<div class="modal fade" id="modalHapusPinjamLapangan<?php echo $row['id'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
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
													<input type="hidden" name="id_lapangan" value="<?php echo $row['id_lapangan'] ?>">
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
										$c = mysqli_query($conn,'SELECT pinjamlapangan.id, pinjamlapangan.id_lapangan, pinjamlapangan.id_user, pinjamlapangan.tgl_mulai, pinjamlapangan.tgl_selesai, pinjamlapangan.status, lapangan.nama_lapangan from pinjamlapangan inner join lapangan on lapangan.id=pinjamlapangan.id_lapangan inner join user on user.id=pinjamlapangan.id_user');
										while ($row = mysqli_fetch_array($query)) {
									?>

									<div class="modal fade" id="modalKembalikanPinjamLapangan<?php echo $row['id'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header no-bd">
													<h5 class="modal-title">
														<span class="fw-mediumbold">
														Kembalikan</span> 
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
													<h4>Apakah Anda Ingin Mengembalikan Pinjamanan Ini ?</h4>
												</div>
												<div class="modal-footer no-bd">
													<button type="submit" name="ubah" class="btn btn-danger"><i class="fa fa-trash"></i> Batal Pinjam</button>
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
				$id_lapangan = $_POST['id_lapangan'];

				$selSto = mysqli_query($conn, "SELECT * FROM lapangan WHERE id='$id_lapangan'");
			    $sto    = mysqli_fetch_array($selSto);
			    $sisa    = 'free';

		        mysqli_query($conn, "UPDATE lapangan SET status='$sisa' WHERE id='$id_lapangan'");
		        mysqli_query($conn,"DELETE from pinjamlapangan where id='$id'");
		        echo "<script>alert ('Data Berhasil Dihapus') </script>";
                echo"<meta http-equiv='refresh' content=0; URL=?view=datapinjamlapangan>";
			
			}elseif (isset($_POST['ubah'])) {
				$id = $_POST['id'];
				$id_lapangan = $_POST['id_lapangan'];

				$selSto = mysqli_query($conn, "SELECT * FROM lapangan WHERE id='$id_lapangan'");
			    $sto    = mysqli_fetch_array($selSto);
			    $sisa   = 'free';
			    $status = 'selesai';

		        mysqli_query($conn, "UPDATE lapangan SET status='$sisa' WHERE id='$id_lapangan'");
		        mysqli_query($conn,"UPDATE pinjamlapangan SET status='$status' where id='$id'");
		        echo "<script>alert ('Data Berhasil Dihapus') </script>";
                echo"<meta http-equiv='refresh' content=0; URL=?view=datapinjamlapangan>";
			}
		?>