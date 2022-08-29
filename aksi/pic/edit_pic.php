<?php

if (isset($_GET['kode'])) {
    $sql_cek = "SELECT * FROM tb_pic WHERE id_pic='" . $_GET['kode'] . "'";
    $query_cek = mysqli_query($koneksi, $sql_cek);
    $data_cek = mysqli_fetch_array($query_cek, MYSQLI_BOTH);
}
?>

<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fa fa-edit"></i> Edit Data Client
        </h3>
    </div>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="card-body">

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">NIP</label>
                <div class="col-sm-4">
                    <input type="hidden" name="id_pic" id="id_pic" value="<?php echo $data_cek['id_pic'] ?>">
                    <input type="text" class="form-control" id="nip" name="nip" value="<?php echo $data_cek['nip'] ?>" readonly>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Nama PIC</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" id="nama_pic" name="nama_pic" value="<?php echo $data_cek['nama_pic'] ?>" required>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Jabatan</label>
                <div class="col-sm-4">
                    <select name="jabatan" id="jabatan" class="form-control">
                        <option value="<?php echo $data_cek['jabatan'] ?>"><?php echo $data_cek['jabatan'] ?></option>
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
                    <input type="number" class="form-control" id="pengalaman" name="pengalaman" value="<?php echo $data_cek['pengalaman'] ?>" required>
                </div>
                <div class="col-sm-2">
                    <input type="text" value="Tahun" class="form-control" readonly>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Kontak</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" id="kontak" name="kontak" value="<?php echo $data_cek['kontak'] ?>" required>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Alamat</label>
                <div class="col-sm-4">
                    <textarea class="form-control" name="alamat" id="alamat" cols="30" rows="5"><?php echo $data_cek['alamat'] ?></textarea>
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
    $sql_ubah = "UPDATE tb_pic SET
        nip='" . $_POST['nip'] . "',
        nama_pic='" . $_POST['nama_pic'] . "',
        jabatan='" . $_POST['jabatan'] . "',
        pengalaman='" . $_POST['pengalaman'] . "',
        kontak='" . $_POST['kontak'] . "',
        alamat='" . $_POST['alamat'] . "'       
        WHERE id_pic ='" . $_POST['id_pic'] . "'";
    $query_ubah = mysqli_query($koneksi, $sql_ubah);
    mysqli_close($koneksi);

    if ($query_ubah) {
        echo "<script>
      Swal.fire({title: 'Ubah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value)
        {window.location = 'index.php?page=data_pic';
        }
      })</script>";
    } else {
        echo "<script>
      Swal.fire({title: 'Ubah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value)
        {window.location = 'index.php?page=data_pic';
        }
      })</script>";
    }
}

?>