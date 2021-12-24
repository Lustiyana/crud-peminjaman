<?php
$query = mysqli_query($conn, 'SELECT count(*) as barang from barang');
$row = mysqli_fetch_array($query);
?>

<?php
$p = mysqli_query($conn, 'SELECT count(*) as ruangan from ruangan');
$q = mysqli_fetch_array($p);
?>

<?php
$m = mysqli_query($conn, 'SELECT count(*) as ambulance from ambulance');
$n = mysqli_fetch_array($m);
?>

<?php
$c = mysqli_query($conn, 'SELECT count(*) as mobil from mobil');
$l = mysqli_fetch_array($c);
?>

<?php
$r = mysqli_query($conn, 'SELECT count(*) as lapangan from lapangan');
$h = mysqli_fetch_array($r);
?>

<?php
$key = mysqli_query($conn, 'SELECT count(*) as user from user');
$b = mysqli_fetch_array($key);
?>

<?php
$r = mysqli_query($conn, 'SELECT count(*) as pinjambarang from pinjambarang');
$d = mysqli_fetch_array($r);
?>

<?php
$t = mysqli_query($conn, 'SELECT count(*) as pinjamruangan from pinjamruangan');
$z = mysqli_fetch_array($t);
?>

<?php
$x = mysqli_query($conn, 'SELECT count(*) as pinjamambulance from pinjamambulance');
$y = mysqli_fetch_array($x);
?>

<?php
$v = mysqli_query($conn, 'SELECT count(*) as pinjammobil from pinjammobil');
$w = mysqli_fetch_array($v);
?>

<?php
$j = mysqli_query($conn, 'SELECT count(*) as pinjamlapangan from pinjamlapangan');
$k = mysqli_fetch_array($j);
?>



<div class="main-panel">
	<div class="content">
		<div class="page-inner">
			<div class="row">
				<div class="col-sm-6 col-md-3">
					<div class="card card-stats card-round">
						<div class="card-body ">
							<div class="row align-items-center">
								<div class="col-icon">
									<div class="icon-big text-center icon-primary bubble-shadow-small">
										<i class="fas fa-newspaper"></i>
									</div>
								</div>
								<div class="col col-stats ml-3 ml-sm-0">
									<div class="numbers">
										<p class="card-category">Data Barang</p>
										<h4 class="card-title"><?php echo $row['barang'] ?></h4>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="col-sm-6 col-md-3">
					<div class="card card-stats card-round">
						<div class="card-body ">
							<div class="row align-items-center">
								<div class="col-icon">
									<div class="icon-big text-center icon-primary bubble-shadow-small">
										<i class="fas fa-newspaper"></i>
									</div>
								</div>
								<div class="col col-stats ml-3 ml-sm-0">
									<div class="numbers">
										<p class="card-category">Data Ruangan</p>
										<h4 class="card-title"><?php echo $q['ruangan'] ?></h4>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="col-sm-6 col-md-3">
					<div class="card card-stats card-round">
						<div class="card-body ">
							<div class="row align-items-center">
								<div class="col-icon">
									<div class="icon-big text-center icon-primary bubble-shadow-small">
										<i class="fas fa-newspaper"></i>
									</div>
								</div>
								<div class="col col-stats ml-3 ml-sm-0">
									<div class="numbers">
										<p class="card-category">Data Ambulance</p>
										<h4 class="card-title"><?php echo $n['ambulance'] ?></h4>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="col-sm-6 col-md-3">
					<div class="card card-stats card-round">
						<div class="card-body ">
							<div class="row align-items-center">
								<div class="col-icon">
									<div class="icon-big text-center icon-primary bubble-shadow-small">
										<i class="fas fa-newspaper"></i>
									</div>
								</div>
								<div class="col col-stats ml-3 ml-sm-0">
									<div class="numbers">
										<p class="card-category">Data Mobil</p>
										<h4 class="card-title"><?php echo $l['mobil'] ?></h4>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="col-sm-6 col-md-3">
					<div class="card card-stats card-round">
						<div class="card-body ">
							<div class="row align-items-center">
								<div class="col-icon">
									<div class="icon-big text-center icon-primary bubble-shadow-small">
										<i class="fas fa-newspaper"></i>
									</div>
								</div>
								<div class="col col-stats ml-3 ml-sm-0">
									<div class="numbers">
										<p class="card-category">Data Lapangan</p>
										<h4 class="card-title"><?php echo $h['lapangan'] ?></h4>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="col-sm-6 col-md-3">
					<div class="card card-stats card-round">
						<div class="card-body ">
							<div class="row align-items-center">
								<div class="col-icon">
									<div class="icon-big text-center icon-primary bubble-shadow-small">
										<i class="fas fa-chart-bar"></i>
									</div>
								</div>
								<div class="col col-stats ml-3 ml-sm-0">
									<div class="numbers">
										<p class="card-category">Data User</p>
										<h4 class="card-title"><?php echo $b['user'] ?></h4>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="col-sm-6 col-md-3">
					<div class="card card-stats card-round">
						<div class="card-body ">
							<div class="row align-items-center">
								<div class="col-icon">
									<div class="icon-big text-center icon-primary bubble-shadow-small">
										<i class="fas fa-check-circle"></i>
									</div>
								</div>
								<div class="col col-stats ml-3 ml-sm-0">
									<div class="numbers">
										<p class="card-category">Pinjam Barang</p>
										<h4 class="card-title"><?php echo $d['pinjambarang'] ?></h4>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="col-sm-6 col-md-3">
					<div class="card card-stats card-round">
						<div class="card-body ">
							<div class="row align-items-center">
								<div class="col-icon">
									<div class="icon-big text-center icon-primary bubble-shadow-small">
										<i class="fas fa-check-circle"></i>
									</div>
								</div>
								<div class="col col-stats ml-3 ml-sm-0">
									<div class="numbers">
										<p class="card-category">Pinjam Ruangan</p>
										<h4 class="card-title"><?php echo $z['pinjamruangan'] ?></h4>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="col-sm-6 col-md-3">
					<div class="card card-stats card-round">
						<div class="card-body ">
							<div class="row align-items-center">
								<div class="col-icon">
									<div class="icon-big text-center icon-primary bubble-shadow-small">
										<i class="fas fa-check-circle"></i>
									</div>
								</div>
								<div class="col col-stats ml-3 ml-sm-0">
									<div class="numbers">
										<p class="card-category">Pinjam Ambulance</p>
										<h4 class="card-title"><?php echo $y['pinjamambulance'] ?></h4>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="col-sm-6 col-md-3">
					<div class="card card-stats card-round">
						<div class="card-body ">
							<div class="row align-items-center">
								<div class="col-icon">
									<div class="icon-big text-center icon-primary bubble-shadow-small">
										<i class="fas fa-check-circle"></i>
									</div>
								</div>
								<div class="col col-stats ml-3 ml-sm-0">
									<div class="numbers">
										<p class="card-category">Pinjam Mobil</p>
										<h4 class="card-title"><?php echo $w['pinjammobil'] ?></h4>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="col-sm-6 col-md-3">
					<div class="card card-stats card-round">
						<div class="card-body ">
							<div class="row align-items-center">
								<div class="col-icon">
									<div class="icon-big text-center icon-primary bubble-shadow-small">
										<i class="fas fa-check-circle"></i>
									</div>
								</div>
								<div class="col col-stats ml-3 ml-sm-0">
									<div class="numbers">
										<p class="card-category">Pinjam Lapangan</p>
										<h4 class="card-title"><?php echo $k['pinjamlapangan'] ?></h4>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
</div>