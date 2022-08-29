<div class="card card-primary">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Tambah Data Rules
		</h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="card-body">
			<?php
			$bm = array('Rendah', 'Sedang', 'Tinggi');
			$utk = array('Sedikit', 'Sedang', 'Banyak');
			$wp = array('Sebentar', 'Sedang', 'Lama');
			$jr = array('Sempit', 'Sedang', 'Lebar');
			$jp = array('Sedikit', 'Sedang', 'Banyak');
			$out = array('Murah', 'Mahal');
			?>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Kode Rules</label>
				<div class="col-sm-4">
					<input type="text" class="form-control" id="kode_rules" name="kode_rules" placeholder="Kode Rules" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Biaya Material (BM)</label>
				<div class="col-sm-4">
					<select name="biaya" id="biaya" class="form-control" required="required">
						<option value='0' selected>--Pilih BM--</option>
						<?php
						foreach ($bm as $row) {
							if (!empty($biaya)) {
								if ($biaya == $row) {
									echo "<option value='" . $row . "' selected>" . $row . "</option>";
								} else {
									echo "<option value='" . $row . "' >$row</option>";
									$row = '';
								}
							} else {
								echo "<option value='" . $row . "' >$row</option>";
							}
						}
						?>
					</select>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Upah Tenaga Kerja (UTK)</label>
				<div class="col-sm-4">
					<select name="upah" id="upah" class="form-control" required="required">
						<option value='0' selected>--Pilih UTK--</option>
						<?php
						foreach ($utk as $row) {
							if (!empty($upah)) {
								if ($upah == $row) {
									echo "<option value='" . $row . "' selected>" . $row . "</option>";
								} else {
									echo "<option value='" . $row . "' >$row</option>";
									$row = '';
								}
							} else {
								echo "<option value='" . $row . "' >$row</option>";
							}
						}
						?>
					</select>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Waktu Pengerjaan (WP)</label>
				<div class="col-sm-4">
					<select name="waktu" id="waktu" class="form-control" required="required">
						<option value='0' selected>--Pilih WP--</option>
						<?php
						foreach ($wp as $row) {
							if (!empty($waktu)) {
								if ($waktu == $row) {
									echo "<option value='" . $row . "' selected>" . $row . "</option>";
								} else {
									echo "<option value='" . $row . "' >$row</option>";
									$row = '';
								}
							} else {
								echo "<option value='" . $row . "' >$row</option>";
							}
						}
						?>
					</select>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Jenis Rumah (JR)</label>
				<div class="col-sm-4">
					<select name="jenis" id="jenis" class="form-control" required="required">
						<option value='0' selected>--Pilih JR--</option>
						<?php
						foreach ($jr as $row) {
							if (!empty($jenis)) {
								if ($jenis == $row) {
									echo "<option value='" . $row . "' selected>" . $row . "</option>";
								} else {
									echo "<option value='" . $row . "' >$row</option>";
									$row = '';
								}
							} else {
								echo "<option value='" . $row . "' >$row</option>";
							}
						}
						?>
					</select>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Jumlah Pekerja (JP)</label>
				<div class="col-sm-4">
					<select name="jumlah" id="jumlah" class="form-control" required="required">
						<option value='0' selected>--Pilih JP--</option>
						<?php
						foreach ($jp as $row) {
							if (!empty($jumlah)) {
								if ($jumlah == $row) {
									echo "<option value='" . $row . "' selected>" . $row . "</option>";
								} else {
									echo "<option value='" . $row . "' >$row</option>";
									$row = '';
								}
							} else {
								echo "<option value='" . $row . "' >$row</option>";
							}
						}
						?>
					</select>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Fuzzy Output</label>
				<div class="col-sm-4">
					<select name="output" id="output" class="form-control" required="required">
						<option value='0' selected>--Pilih Output--</option>
						<?php
						foreach ($out as $row) {
							if (!empty($output)) {
								if ($output == $row) {
									echo "<option value='" . $row . "' selected>" . $row . "</option>";
								} else {
									echo "<option value='" . $row . "' >$row</option>";
									$row = '';
								}
							} else {
								echo "<option value='" . $row . "' >$row</option>";
							}
						}
						?>
					</select>
				</div>
			</div>

		</div>
		<div class="card-footer">
			<input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
			<a href="?page=data_rules" title="Kembali" class="btn btn-secondary">Batal</a>
		</div>
	</form>
</div>

<?php

if (isset($_POST['Simpan'])) {

	//mulai proses simpan data
	$sql_simpan = "INSERT INTO tb_rules (id_rules,kode_rules,bm,utk,wp,jr,jp,out_put) VALUES (
        '',
		'" . $_POST['kode_rules'] . "',
		'" . $_POST['biaya'] . "',
		'" . $_POST['upah'] . "',
		'" . $_POST['waktu'] . "',
        '" . $_POST['jenis'] . "',
		'" . $_POST['jumlah'] . "',
		'" . $_POST['output'] . "'
		)";
	$query_simpan = mysqli_query($koneksi, $sql_simpan);
	mysqli_close($koneksi);
	if ($query_simpan) {
		echo "<script>
      Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=data_rules';
          }
      })</script>";
	} else {
		echo "<script>
      Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=add_rules';
          }
      })</script>";
	}
}
//selesai proses simpan data
?>