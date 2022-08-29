<script>
	$('#form').validate({
		rules: {
			nip: {
				digits: true,
				minlength: 12,
				maxlength: 12
			}
		}
	});
</script>
<div class="card card-primary">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-edit"></i> Tambah Data PIC
		</h3>
	</div>
	<form action="" method="post" enctype="multipart/form-data">
		<div class="card-body">

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">NIP</label>
				<div class="col-sm-4">
					<input type="number" class="form-control" maxlength="12" id="nip" name="nip" placeholder="ex : 181011401" pattern="^[\\d{12}]$" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama PIC</label>
				<div class="col-sm-4">
					<input type="text" class="form-control" id="nama" name="nama_pic" placeholder="Masukan Nama PIC" pattern="^[a-zA-Z\s'-]{1,100}$" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Jabatan</label>
				<div class="col-sm-4">
					<select name="jabatan" id="jabatan" class="form-control" required>
						<option selected disabled>---Pilih Jabatan PIC---</option>
						<option value="Peroject Manager (PM)">Peroject Manager (PM)</option>
						<option value="Site Manager (SM)">Managmen Konstruksi (MK)</option>
						<option value="Site Enginer (SE)">Site Enginer (SE)</option>
						<option value="Quality Control (QC)">Quality Control (QC)</option>
						<option value="Quality Surveyor (QS)">Quality Surveyor (QS)</option>
						<option value="Supervisor (SPV)">Supervisor (SPV)</option>
					</select>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Pengalaman</label>
				<div class="col-sm-2">
					<input type="number" max="50" class="form-control" id="pengalaman" name="pengalaman" required>
				</div>
				<div class="col-sm-2">
					<input type="text" value="Tahun" class="form-control" readonly>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Kontak</label>
				<div class="col-sm-4">
					<input type="email" class="form-control" id="kontak" name="kontak" placeholder="Masukan Alamat Email" required>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Alamat</label>
				<div class="col-sm-4">
					<textarea class="form-control" name="alamat" id="alamat" cols="30" rows="5" required></textarea>
				</div>
			</div>

		</div>
		<div class="card-footer">
			<input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
			<a href="?page=data_pic" title="Kembali" class="btn btn-secondary">Batal</a>
		</div>
	</form>
</div>

<?php

if (isset($_POST['Simpan'])) {

	//mulai proses simpan data
	$sql_simpan = "INSERT INTO tb_pic (id_pic,nip,nama_pic,jabatan,pengalaman,kontak,alamat) VALUES (
        '',
		'" . $_POST['nip'] . "',
		'" . $_POST['nama_pic'] . "',
		'" . $_POST['jabatan'] . "',
		'" . $_POST['pengalaman'] . "',
		'" . $_POST['kontak'] . "',
		'" . $_POST['alamat'] . "'		
		)";
	$query_simpan = mysqli_query($koneksi, $sql_simpan);
	mysqli_close($koneksi);
	if ($query_simpan) {
		echo "<script>
      Swal.fire({title: 'Tambah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=data_pic';
          }
      })</script>";
	} else {
		echo "<script>
      Swal.fire({title: 'Tambah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value){
          window.location = 'index.php?page=data_pic';
          }
      })</script>";
	}
}
//selesai proses simpan data
?>