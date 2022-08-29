<?php
$sql = mysqli_query($koneksi, "SELECT MAX(kode_pro) as kode_bs FROM tb_jenisproyek");
$data = mysqli_fetch_array($sql);
$kode_pro = $data['kode_bs'];
$kode_pro++;
// var_dump($kode_pro);
// die();




?>

<div class="card card-primary">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Tambah Data Jenis Pekerjaan
		</h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="card-body">

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Kode Pekerjaan</label>
				<div class="col-sm-4">
					<input type="text" class="form-control" id="kode_pro" name="kode_pro" required value="<?php echo $kode_pro; ?>" readonly>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama Pekerjaan</label>
				<div class="col-sm-4">
					<input type="text" class="form-control" id="nama_pro" name="nama_pro" placeholder="Masukan Nama Pekerjaan" required>
				</div>
			</div>

		</div>
		<div class="card-footer">
			<input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
			<a href="?page=jenis_pr" title="Kembali" class="btn btn-secondary">Batal</a>
		</div>
	</form>
</div>

<?php

if (isset($_POST['Simpan'])) {

	//mulai proses simpan data
	$sql_simpan = "INSERT INTO tb_jenisproyek (id_jenispro,kode_pro,nama_pro) VALUES (
        '',
		'" . $_POST['kode_pro'] . "',
		'" . $_POST['nama_pro'] . "'
		)";
	$query_simpan = mysqli_query($koneksi, $sql_simpan);
	mysqli_close($koneksi);
	if ($query_simpan) {
		echo "<script>
      Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=jenis_pr';
          }
      })</script>";
	} else {
		echo "<script>
      Swal.fire({title: 'Tambah Data Gagal Kode Proyek Sudah Ada',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=jenis_pr';
          }
      })</script>";
	}
}
//selesai proses simpan data
?>