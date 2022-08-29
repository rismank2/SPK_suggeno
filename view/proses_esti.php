<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-table"></i> Hasil Estimasi
		</h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="table-responsive">
			<br>
			<table id="example1" class="table table-bordered table-striped">
				<thead>
					<tr style="text-align: center;">
						<th>No</th>
						<th>No Proyek</th>
						<th>BM</th>
						<th>UTK</th>
						<th>WP</th>
						<th>JR</th>
						<th>JP</th>
						<th>Keputusan</th>
						<th>Detail</th>
					</tr>
				</thead>
				<tbody>

					<?php
					//vardat

					$no = 1;
					$sql = $koneksi->query("select * from tb_estimasi");
					while ($data = $sql->fetch_assoc()) {
						$nilai_bm = $data['nilai_bm'];
						$nilai_utk = $data['nilai_utk'];
						$nilai_wp = $data['nilai_wp'];
						$nilai_jr = $data['nilai_jr'];
						$nilai_jp = $data['nilai_jp'];
					?>



						<tr style="text-align: center;">
							<td>
								<?php echo $no++; ?>
							</td>
							<td>
								<?php echo $data['no_proyek']; ?>
							</td>
							<td>
								<?php
								$c1bm = 7;
								$c2bm = 13;
								if ($nilai_bm <= $c1bm) {
									$hasil_bm = "Rendah";
								} else if (($nilai_bm > $c1bm) && ($nilai_bm <= $c2bm)) {
									$hasil_bm = "Sedang";
								} else if ($nilai_bm > $c2bm) {
									$hasil_bm = "Tinggi";
								}
								echo $hasil_bm;
								?>
							</td>
							<td>
								<?php
								$c1utk = 15;
								$c2utk = 25;
								if ($nilai_utk <= $c1utk) {
									$hasil_utk = "Sedikit";
								} else if (($nilai_utk > $c1utk) && ($nilai_utk < $c2utk)) {
									$hasil_utk = "Sedang";
								} else if ($nilai_utk >= $c2utk) {
									$hasil_utk = "Banyak";
								}
								echo $hasil_utk;
								?>
							</td>
							<td>
								<?php
								$c1wp = 9;
								$c2wp = 15;
								if ($nilai_wp <= $c1wp) {
									$hasil_wp = "Sebentar";
								} else if (($nilai_wp >= $c1wp) && ($nilai_wp < $c2wp)) {
									$hasil_wp = "Sedang";
								} else if ($nilai_wp >= $c2wp) {
									$hasil_wp = "Lama";
								}
								echo $hasil_wp;
								?>
							</td>
							<td>
								<?php
								$c1jr = 21;
								$c2jr = 45;
								if ($nilai_jr <= $c1jr) {
									$hasil_jr = "Sempit";
								} else if (($nilai_jr > $c1jr) && ($nilai_jr < $c2jr)) {
									$hasil_jr = "Sedang";
								} else if ($nilai_jr >= $c2jr) {
									$hasil_jr = "Lebar";
								}
								echo $hasil_jr;
								?>
							</td>
							<td>
								<?php
								$c1jp = 10;
								$c2jp = 14;
								if ($nilai_jp <= $c1jp) {
									$hasil_jp = "Sedikit";
								} else if (($nilai_jp > $c1jp) && ($nilai_jp < $c2jp)) {
									$hasil_jp = "Sedang";
								} else if ($nilai_jp >= $c2jp) {
									$hasil_jp = "Banyak";
								}
								echo $hasil_jp;
								?>
							</td>
							<td>
								<b>
									<?php

									$keputusan = $koneksi->query("SELECT * FROM tb_rules WHERE 
								bm	= '$hasil_bm' AND 
								utk = '$hasil_utk' AND
								wp = '$hasil_wp' AND
								jr = '$hasil_jr'
								");
									$ketemu = mysqli_num_rows($keputusan);
									$kep = mysqli_fetch_array($keputusan);

									if ($ketemu > 0) {
										echo $kep['out_put'];
									} else {
										echo "<p style='color:red;'>Data Tidak Ditemukan</p>";
									}
									?>
								</b>
							</td>

							<td>
								<a href="?page=data_detail&kode=<?php echo $data['id_esti']; ?>" title="Detail" class="btn btn-success btn-sm">
									<i class="fa fa-id-card"></i>
								</a>
							</td>
						</tr>

					<?php
					}
					?>
				</tbody>
				</tfoot>
			</table>
		</div>
	</div>
	<!-- /.card-body -->