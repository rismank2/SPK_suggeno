<?php
$sql = $koneksi->query("SELECT MAX(no_client) as no_c FROM tb_klien");
$data = $sql->fetch_assoc();
// var_dump($data);
// die();

$kodes = $data['no_c'];
$kodes++;
$nouut = substr($kodes, 3, 3);


?>


<div class="card card-primary">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Tambah Data Client
		</h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="card-body">

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nomor Client</label>
				<div class="col-sm-4">
					<input type="number" class="form-control" id="no_client" name="no_client" value="<?php echo $kodes; ?>" readonly>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama Client</label>
				<div class="col-sm-4">
					<input type="text" class="form-control" id="nm_client" name="nm_client" placeholder="Masukan Nama Client" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Kontak</label>
				<div class="col-sm-4">
					<input type="text" class="form-control" id="kontak" name="kontak" placeholder="ex. cnth@gmail.com / 0812..." required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Alamat</label>
				<div class="col-sm-4">
					<textarea class="form-control" name="alamat" id="alamat" cols="30" rows="5" placeholder="Masukan Alamat Lengkap" required></textarea>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Kota</label>
				<div class="col-sm-4">
					<select class="form-control" name="kota" id="kota" required>
						<option value="" selected disabled>--Pilih Kota--</option>
						<?php
						$sql = $koneksi->query("SELECT * FROM kota");
						while ($data = $sql->fetch_assoc()) {

						?>
							<option value="<?php echo $data['nama'] ?>"><?php echo $data['nama'] ?></option>
						<?php } ?>
					</select>
				</div>
			</div>

		</div>
		<div class="card-footer">
			<input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
			<a href="?page=data_client" title="Kembali" class="btn btn-secondary">Batal</a>
		</div>
	</form>
</div>

<?php

if (isset($_POST['Simpan'])) {

	//mulai proses simpan data
	$sql_simpan = "INSERT INTO tb_klien (id_client,no_client,nm_client,kontak,alamat,kota) VALUES (
        '',
		'" . $_POST['no_client'] . "',
		'" . $_POST['nm_client'] . "',
		'" . $_POST['kontak'] . "',
		'" . $_POST['alamat'] . "',
		'" . $_POST['kota'] . "'
		)";
	$query_simpan = mysqli_query($koneksi, $sql_simpan);
	mysqli_close($koneksi);
	if ($query_simpan) {
		echo "<script>
      Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=data_client';
          }
      })</script>";
	} else {
		echo "<script>
      Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=data_client';
          }
      })</script>";
	}
}
//selesai proses simpan data
?>