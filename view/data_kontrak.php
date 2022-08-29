<?php
include "inc/rupiah.php";
?>
<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-table"></i> Data Kontrak
		</h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="table-responsive">
			<div>
				<a href="?page=add_kontrak" class="btn btn-primary">
					<i class="fa fa-edit"></i> Tambah Data Kontrak</a>
			</div>
			<br>
			<table id="example1" class="table table-bordered table-striped">
				<thead style="text-align: center;">
					<tr>
						<th>No</th>
						<th>No Kontrak</th>
						<th>Nama Client</th>
						<th>Jenis Pekerjaan</th>
						<th>Nilai Kontrak</th>
						<th>Jenis Pembayaran</th>
						<th>Tanggal Kontrak</th>
						<th>Lama Kontrak</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody style="text-align: center;">

					<?php
					$no = 1;
					$sql = $koneksi->query("SELECT * FROM tb_kontrak");

					while ($data = $sql->fetch_assoc()) {
					?>

						<tr>
							<td>
								<?php echo $no++; ?>
							</td>
							<td>
								<?php echo $data['no_kontrak']; ?>
							</td>
							<td>
								<?php echo $data['nm_client']; ?>
							</td>
							<td>
								<?php echo $data['nama_pro']; ?>
							</td>
							<td>
								<?php echo $data['nilai_kontrak']; ?>
							</td>
							<td>
								<?php echo $data['jenis_pembayaran']; ?>
							</td>
							<td>
								<?php echo (date('d F Y', strtotime($data['tgl_kontrak']))) ?>
							</td>
							<td>
								<?php echo $data['lama_kontrak'] ?>
								<?php echo " Bulan" ?>
							</td>
							<td>
								<a href="?page=edit_kontrak&kode=<?php echo $data['id_kontrak']; ?>" title="Ubah" class="btn btn-success btn-sm">
									<i class="fa fa-edit"></i>
								</a>
								<br>
								<br>
								<a href="?page=del_kontrak&kode=<?php echo $data['id_kontrak']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')" title="Hapus" class="btn btn-danger btn-sm">
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