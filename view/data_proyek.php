<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-table"></i> Data Estimasi Proyek
		</h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="table-responsive">
			<div>
				<a href="?page=add_pro" class="btn btn-primary">
					<i class="fa fa-edit"></i> Tambah Data</a>
			</div>
			<br>
			<table id="example1" class="table table-bordered table-striped" style="text-align: center;">
				<thead>
					<tr>
						<th>No</th>
						<th>No Proyek</th>
						<th>No Kontrak</th>
						<th>Nama Client</th>
						<th>Nilai Kontrak</th>
						<th>Tgl Pelaksanaan</th>
						<th>Lokasi</th>
						<th>PIC</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>

					<?php
					$no = 1;
					$sql = $koneksi->query("SELECT * From tb_estimasipro
							JOIN tb_kontrak ON tb_estimasipro.id_kontrak = tb_kontrak.id_kontrak
							");
					while ($data = $sql->fetch_assoc()) {
					?>

						<tr>
							<td>
								<?php echo $no++; ?>
							</td>
							<td>
								<?php echo $data['no_proyek'] ?>
							</td>
							<td>
								<?php echo $data['no_kontrak'] ?>
							</td>
							<td>
								<?php echo $data['nm_client'] ?>
							</td>
							<td>
								<?php echo $data['nilai_kontrak'] ?>
							</td>
							<td>
								<?php echo $data['waktu_pelak'] ?>
							</td>
							<td>
								<?php echo $data['lokasi'] ?>
							</td>
							<td>
								<?php echo $data['nama_pic'] ?>
							</td>
							<td>
								<a href="?page=edit_pro&kode=<?php echo $data['id_proyek']; ?>" title="Ubah" class="btn btn-success btn-sm">
									<i class="fa fa-edit"></i>
								</a>
								<br>
								<br>
								<a href="?page=del_pro&kode=<?php echo $data['id_proyek']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')" title="Hapus" class="btn btn-danger btn-sm">
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