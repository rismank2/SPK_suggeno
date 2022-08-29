<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-table"></i> Data Estimasi
		</h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="table-responsive">
			<div>
				<a href="?page=add_esti" class="btn btn-primary">
					<i class="fa fa-edit"></i> Tambah Data Estimasi</a>
			</div>
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
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>

					<?php
					$no = 1;
					$sql = $koneksi->query("select * from tb_estimasi");
					while ($data = $sql->fetch_assoc()) {
					?>

						<tr style="text-align: center;">
							<td>
								<?php echo $no++; ?>
							</td>
							<td>
								<?php echo $data['no_proyek']; ?>
							</td>
							<td>
								<?php echo $data['nilai_bm']; ?>
							</td>
							<td>
								<?php echo $data['nilai_utk']; ?>
							</td>
							<td>
								<?php echo $data['nilai_wp']; ?>
							</td>
							<td>
								<?php echo $data['nilai_jr']; ?>
							</td>
							<td>
								<?php echo $data['nilai_jp']; ?>
							</td>
							<td>
								<a href="?page=edit_esti&kode=<?php echo $data['id_esti']; ?>" title="Ubah" class="btn btn-success btn-sm">
									<i class="fa fa-edit"></i>
								</a>
								<a href="?page=del_esti&kode=<?php echo $data['id_esti']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')" title="Hapus" class="btn btn-danger btn-sm">
									<i class="fa fa-trash"></i>
							</td>
						</tr>

					<?php
					}
					?>
				</tbody>
				</tfoot>
				</a>

			</table>

		</div>
	</div>
	<!-- /.card-body -->