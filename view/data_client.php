<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-table"></i> Data Client
		</h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="table-responsive">
			<div>
				<a href="?page=add_client" class="btn btn-primary">
					<i class="fa fa-edit"></i> Tambah Data</a>
			</div>
			<br>
			<table id="example1" class="table table-bordered table-striped">
				<thead style="text-align: center;">
					<tr>
						<th>No</th>
						<th>No Client</th>
						<th>Nama Client</th>
						<th>Kontak</th>
						<th>Alamat</th>
						<th>Kota</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody style="text-align: center;">

					<?php
					$no = 1;
					$sql = $koneksi->query("SELECT * FROM tb_klien ORDER BY no_client DESC ");
					while ($data = $sql->fetch_assoc()) {
					?>

						<tr>
							<td>
								<?php echo $no++; ?>
							</td>
							<td>
								<?php echo $data['no_client']; ?>
							</td>
							<td>
								<?php echo $data['nm_client']; ?>
							</td>
							<td>
								<?php echo $data['kontak']; ?>
							</td>
							<td>
								<?php echo $data['alamat']; ?>
							</td>
							<td>
								<?php echo $data['kota']; ?>
							</td>
							<td>
								<a href="?page=edit_client&kode=<?php echo $data['id_client']; ?>" title="Ubah" class="btn btn-success btn-sm">
									<i class="fa fa-edit"></i>
								</a>
								<a href="?page=del_client&kode=<?php echo $data['id_client']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')" title="Hapus" class="btn btn-danger btn-sm">
									<i class="fa fa-trash"></i>
									</>
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