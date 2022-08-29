<div class="card card-primary">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Tambah Data Hitung Estimasi
		</h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="card-body">
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">No RAB</label>
				<div class="col-sm-4">
					<select class="form-control" name="no_proyek" id="no_proyek" required>
						<option value="">--Pilih Data Estimasi No Proyek--</option>
						<?php
						$sql = $koneksi->query("SELECT * from tb_estimasipro
						JOIN tb_kontrak ON tb_estimasipro.id_kontrak = tb_kontrak.id_kontrak");
						while ($data = $sql->fetch_assoc()) {

						?>
							<option value="<?php echo $data['no_proyek'] ?>"><?php echo $data['no_proyek'] ?> | <?php echo $data['nm_client'] ?> </option>

						<?php } ?>
					</select>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Harga Material</label>
				<div class="col-sm-4">
					<input type="number" class="form-control" id="nilai_bm" name="nilai_bm" placeholder="Masukan Selisih Harga Material" required>
				</div>
				<div class="col-sm-4">
					<input type="submit" value="notes : 5K = Rendah | 10K = Sedang | 15K = Tinggi" class="btn btn-warning">
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Upah Tenaga Kerja</label>
				<div class="col-sm-4">
					<input type="number" class="form-control" id="nilai_utk" name="nilai_utk" placeholder="Masukan Selih Upah Tenaga Kerja" required>
				</div>
				<div class="col-sm-4">
					<input type="submit" value="notes : 10K = Sedikit | 20K = Sedang | 30K = Banyak" class="btn btn-warning">
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Waktu Pengerjaan</label>
				<div class="col-sm-4">
					<input type="number" class="form-control" id="nilai_wp" name="nilai_wp" placeholder="Masukan Waktu Pengerjaan (...bulan)" required>
				</div>
				<div class="col-sm-4">
					<input type="submit" value="notes : 6bln = Sebentar | 12bln = Sedang | 18bln = Lama" class="btn btn-warning">
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Jenis Rumah</label>
				<div class="col-sm-4">
					<input type="number" class="form-control" id="nilai_jr" name="nilai_jr" placeholder="Masukan Tipe Rumah" required>
				</div>
				<div class="col-sm-4">
					<input type="submit" value="notes : T21 = Sempit | T36 = Sedang | T45 = Lebar" class="btn btn-warning">
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Jumlah Pekerja</label>
				<div class="col-sm-4">
					<input type="number" class="form-control" id="nilai_jp" name="nilai_jp" placeholder="Masukan Jumlah Pekerja" required>
				</div>
				<div class="col-sm-4">
					<input type="submit" value="notes : 8org = Sedikit | 12org = Sedang | 16org = Banyak" class="btn btn-warning">
				</div>
			</div>
		</div>
		<div class="card-footer">
			<input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
			<a href="?page=data_esti" title="Kembali" class="btn btn-secondary">Batal</a>
		</div>
	</form>
</div>

<?php



if (isset($_POST['Simpan'])) {

	//mulai proses simpan data
	$sql_simpan = "INSERT INTO tb_estimasi (id_esti,no_proyek,nilai_bm,nilai_utk,nilai_wp,nilai_jr,nilai_jp) VALUES (
        '',
		'" . $_POST['no_proyek'] . "',
		'" . $_POST['nilai_bm'] . "',
		'" . $_POST['nilai_utk'] . "',
		'" . $_POST['nilai_wp'] . "',
        '" . $_POST['nilai_jr'] . "',
		'" . $_POST['nilai_jp'] . "'
		)";
	$query_simpan = mysqli_query($koneksi, $sql_simpan);
	mysqli_close($koneksi);
	if ($query_simpan) {
		echo "<script>
      Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=proses_esti';
          }
      })</script>";
	} else {
		echo "<script>
      Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=add_esti';
          }
      })</script>";
	}
}
//selesai proses simpan data
?>