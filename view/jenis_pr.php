<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-table"></i> Data Jenis Proyek
		</h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="table-responsive">
			<div>
				<a href="?page=add_jenispro" class="btn btn-primary">
					<i class="fa fa-edit"></i> Tambah Data</a>
			</div>
			<br>
			<table id="example1" class="table table-bordered table-striped">
				<thead style="text-align: center;">
					<tr>
						<th>No</th>
						<th>Kode Pekerjaan</th>
						<th>Nama Pekerjaan</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody style="text-align: center;">

					<?php
					$no = 1;
					$sql = $koneksi->query("SELECT * FROM tb_jenisproyek");
					while ($data = $sql->fetch_assoc()) {
					?>

						<tr>
							<td>
								<?php echo $no++; ?>
							</td>
							<td>
								<?php echo $data['kode_pro']; ?>
							</td>
							<td>
								<?php echo $data['nama_pro']; ?>
							</td>
							<td>
								<a href="?page=edit_jenispro&kode=<?php echo $data['id_jenispro']; ?>" title="Ubah" class="btn btn-success btn-sm">
									<i class="fa fa-edit"></i>
								</a>
								<a href="?page=del_jenispro&kode=<?php echo $data['id_jenispro']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')" title="Hapus" class="btn btn-danger btn-sm">
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