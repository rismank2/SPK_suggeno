<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-table"></i> Data PIC (person in charge)
		</h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="table-responsive">
			<div>
				<a href="?page=add_pic" class="btn btn-primary">
					<i class="fa fa-edit"></i> Tambah Data PIC</a>
			</div>
			<br>
			<table id="example1" class="table table-bordered table-striped">
				<thead style="text-align: center;">
					<tr>
						<th>No</th>
						<th>NIP</th>
						<th>Nama</th>
						<th>Jabatan</th>
						<th>Pengalaman</th>
						<th>Kontak</th>
						<th>Alamat</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody style="text-align: center;">

					<?php
					$no = 1;
					$sql = $koneksi->query("SELECT * FROM tb_pic ORDER BY id_pic DESC ");
					while ($data = $sql->fetch_assoc()) {
					?>

						<tr>
							<td>
								<?php echo $no++; ?>
							</td>
							<td>
								<?php echo $data['nip']; ?>
							</td>
							<td>
								<?php echo $data['nama_pic']; ?>
							</td>
							<td>
								<?php echo $data['jabatan']; ?>
							</td>
							<td>
								<?php echo $data['pengalaman'];
								echo " tahun" ?>
							</td>
							<td>
								<?php echo $data['kontak']; ?>
							</td>
							<td>
								<?php echo $data['alamat']; ?>
							</td>
							<td>
								<a href="?page=edit_pic&kode=<?php echo $data['id_pic']; ?>" title="Ubah" class="btn btn-success btn-sm">
									<i class="fa fa-edit"></i>
								</a>
								<a href="?page=del_pic&kode=<?php echo $data['id_pic']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')" title="Hapus" class="btn btn-danger btn-sm">
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