<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">Data Mobil</h4>
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
								<a href="#">Data</a>
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
										<h4 class="card-title">Data Mobil</h4>
										<button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#modalAddMobil">
											<i class="fa fa-plus"></i>
											Tambah Data
										</button>
									</div>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table id="add-row" class="display table table-striped table-hover" >
											<thead>
												<tr>
													<th>No</th>
													<th>Nama Mobil</th>
													<th>Stok</th>
													<th>Action</th>
												</tr>
											</thead>
											
											<tbody>
												<?php
													$no = 1;
													$query = mysqli_query($conn,'SELECT * from mobil');
													while ($mobil = mysqli_fetch_array($query)) {
												?>
												<tr>
													<td><?php echo $no++ ?></td>
													<td><?php echo $mobil['nama_mobil'] ?></td>
													<td><?php echo $mobil['stok'] ?></td>
													<td>
														<a href="#modalDetailMobil<?php echo $mobil['id'] ?>"  data-toggle="modal" title="Detail" class="btn btn-xs btn-success"><i class="fa fa-eye"></i></a>
														<a href="#modalEditMobil<?php echo $mobil['id'] ?>"  data-toggle="modal" title="Edit" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a>
														<a href="#modalHapusMobil<?php echo $mobil['id'] ?>"  data-toggle="modal" title="Hapus" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
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

		<div class="modal fade" id="modalAddMobil" tabindex="-1" role="dialog" aria-hidden="true">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header no-bd">
													<h5 class="modal-title">
														<span class="fw-mediumbold">
														New</span> 
														<span class="fw-light">
															Mobil
														</span>
													</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<form method="POST" enctype="multipart/form-data" action="">
												<div class="modal-body">
													<div class="form-group">
														<label>Nama Mobil</label>
														<input type="text" name="nama_mobil" class="form-control" placeholder="Nama Mobil ..." required="">
													</div>
													<div class="form-group">
														<label>Stok</label>
														<input type="number" name="stok" class="form-control" placeholder="Stok ..." required="">
													</div>
													<div class="form-group">
														<label>Deskripsi</label>
														<textarea placeholder="Deskripsi ..." class="form-control" rows="5" name="deskripsi" style="white-space: pre-line;" required=""></textarea>
													</div>
													<div class="form-group">
														<label>Foto</label>
														<input type="file" name="foto" class="form-control" placeholder required="">
													</div>
												</div>
												<div class="modal-footer no-bd">
													<button type="submit" name="simpan" class="btn btn-primary"><i class="fa fa-save"></i> Save Changes</button>
													<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-undo"></i> Close</button>
												</div>
												</form>
											</div>
										</div>
									</div>

									<?php 
										$p = mysqli_query($conn,'SELECT * from mobil');
										while($d = mysqli_fetch_array($p)) {
									?>

									<div class="modal fade" id="modalEditMobil<?php echo $d['id'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header no-bd">
													<h5 class="modal-title">
														<span class="fw-mediumbold">
														Edit</span> 
														<span class="fw-light">
															Mobil
														</span>
													</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<form method="POST" enctype="multipart/form-data" action="">
												<div class="modal-body">
													<input type="hidden" name="id" value="<?php echo $d['id'] ?>">
													<div class="form-group">
														<label>Nama Mobil</label>
														<input value="<?php echo $d['nama_mobil'] ?>" type="text" name="nama_mobil" class="form-control" placeholder="Nama Mobil ..." required="">
													</div>
													<div class="form-group">
														<label>Stok</label>
														<input value="<?php echo $d['stok'] ?>" type="number" name="stok" class="form-control" placeholder="Stok ..." required="">
													</div>
													<div class="form-group">
														<label>Deskripsi</label>
														<textarea class="form-control" placeholder="Deskripsi ..." rows="5" name="deskripsi" style="white-space: pre-line;" required=""><?php echo $d['deskripsi'] ?></textarea>
													</div>
													<div class="form-group">
														<label>Foto</label>
														<input type="file" name="foto" class="form-control" placeholder required="">
													</div>
												</div>
												<div class="modal-footer no-bd">
													<button type="submit" name="ubah" class="btn btn-primary"><i class="fa fa-save"></i> Save Changes</button>
													<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-undo"></i> Close</button>
												</div>
												</form>
											</div>
										</div>
									</div>

									<?php } ?>

									<?php 
										$c = mysqli_query($conn,'SELECT * from mobil');
										while($row = mysqli_fetch_array($c)) {
									?>

									<div class="modal fade" id="modalHapusMobil<?php echo $row['id'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header no-bd">
													<h5 class="modal-title">
														<span class="fw-mediumbold">
														Hapus</span> 
														<span class="fw-light">
															Mobil
														</span>
													</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<form method="POST" enctype="multipart/form-data" action="">
												<div class="modal-body">
													<input type="hidden" name="id" value="<?php echo $row['id'] ?>">
													<h4>Apakah Anda Ingin Menghapus Data Ini ?</h4>
												</div>
												<div class="modal-footer no-bd">
													<button type="submit" name="hapus" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</button>
													<button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-undo"></i> Close</button>
												</div>
												</form>
											</div>
										</div>
									</div>

									<?php } ?>

									<?php 
										$q = mysqli_query($conn,'SELECT * from mobil');
										while($k = mysqli_fetch_array($q)) {
									?>

									<div class="modal fade" id="modalDetailMobil<?php echo $k['id'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header no-bd">
													<h5 class="modal-title">
														<span class="fw-mediumbold">
														Detail</span> 
														<span class="fw-light">
															Mobil
														</span>
													</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<form method="POST" enctype="multipart/form-data" action="">
												<div class="modal-body">
													<input type="hidden" name="id" value="<?php echo $k['id'] ?>">
													<div class="form-group">
														<label>Nama Mobil</label>
														<input readonly value="<?php echo $k['nama_mobil'] ?>" type="text" name="nama_mobil" class="form-control" placeholder="Nama Mobil ..." required="">
													</div>
													<div class="form-group">
														<label>Stok</label>
														<input readonly value="<?php echo $k['stok'] ?>" type="number" name="stok" class="form-control" placeholder="Stok ..." required="">
													</div>
													<div class="form-group">
														<label>Deskripsi</label>
														<textarea readonly class="form-control" rows="5" name="deskripsi" style="white-space: pre-line;" required=""><?php echo $k['deskripsi'] ?></textarea>
													</div>
													<div class="form-group">
														<img src="master/mobil/Fotomobil/<?php echo $k['foto'] ?>" width="100%" height="200">
													</div>
												</div>
												<div class="modal-footer no-bd">
													<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-undo"></i> Close</button>
												</div>
												</form>
											</div>
										</div>
									</div>

								<?php } ?>

		<?php
            if(isset($_POST['simpan']))
                {
                    $nama_mobil = $_POST['nama_mobil'];
                    $stok = $_POST['stok'];
                    $deskripsi = $_POST['deskripsi'];
                    $foto = $_FILES['foto']['name'];
                    $file_tmp = $_FILES['foto']['tmp_name'];
                    
                        move_uploaded_file($file_tmp, 'master/mobil/Fotomobil/' . $foto);
                        
                    mysqli_query($conn,"INSERT into mobil values ('','$nama_mobil', '$stok','$deskripsi','$foto')");
                    echo "<script>alert ('Data Berhasil Disimpan') </script>";
                    echo"<meta http-equiv='refresh' content=0; URL=?view=datamobil>";
                }

                elseif(isset($_POST['ubah']))
                {
                	$id = $_POST['id'];
                	$nama_mobil = $_POST['nama_mobil'];
                    $stok = $_POST['stok'];
                    $deskripsi = $_POST['deskripsi'];
                    $foto = $_FILES['foto']['name'];
                    $file_tmp = $_FILES['foto']['tmp_name'];
                    
                        move_uploaded_file($file_tmp, 'master/mobil/Fotomobil/' . $foto);
                        
                    mysqli_query($conn,"UPDATE mobil set id='$id', nama_mobil='$nama_mobil', stok='$stok', deskripsi='$deskripsi', foto='$foto' where id='$id'");
                    echo "<script>alert ('Data Berhasil Diubah') </script>";
                    echo"<meta http-equiv='refresh' content=0; URL=?view=datamobil>";
                }

                elseif(isset($_POST['hapus']))
                {
                	$id = $_POST['id'];
                	mysqli_query($conn,"DELETE from mobil where id='$id'");
                    echo "<script>alert ('Data Berhasil Dihapus') </script>";
                    echo"<meta http-equiv='refresh' content=0; URL=?view=datamobil>";
                }
                ?>