<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-table"></i> Data Rules Fuzzy Sugeno
		</h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="table-responsive">
			<!-- <div>
				<a href="?page=add_rules" class="btn btn-primary">
					<i class="fa fa-edit"></i> Tambah Rules</a>
			</div> -->
			<br>
			<table id="example1" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>No</th>
						<th>Kode Rules</th>
						<th>BM</th>
						<th>UTK</th>
						<th>WP</th>
						<th>JR</th>
						<th>JP</th>
						<th>Output</th>
						<!-- <th>Aksi</th> -->
					</tr>
				</thead>
				<tbody>

					<?php
					$no = 1;
					$sql = $koneksi->query("select * from tb_rules");
					while ($data = $sql->fetch_assoc()) {
					?>

						<tr>
							<td>
								<?php echo $no++; ?>
							</td>
							<td>
								<?php echo $data['kode_rules']; ?>
							</td>
							<td>
								<?php echo $data['bm']; ?>
							</td>
							<td>
								<?php echo $data['utk']; ?>
							</td>
							<td>
								<?php echo $data['wp']; ?>
							</td>
							<td>
								<?php echo $data['jr']; ?>
							</td>
							<td>
								<?php echo $data['jp']; ?>
							</td>
							<td>
								<?php echo $data['out_put']; ?>
							</td>
							<!-- <td>
								<a href="?page=edit_rules&kode=<?php echo $data['id_rules']; ?>" title="Ubah" class="btn btn-success btn-sm">
									<i class="fa fa-edit"></i>
								</a>
								<a href="?page=del_rules&kode=<?php echo $data['id_rules']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')" title="Hapus" class="btn btn-danger btn-sm">
									<i class="fa fa-trash"></i>
									</>
							</td> -->
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