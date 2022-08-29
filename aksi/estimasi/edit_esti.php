<?php

if (isset($_GET['kode'])) {
    $sql_cek = "SELECT * FROM tb_estimasi WHERE id_esti='" . $_GET['kode'] . "'";
    $query_cek = mysqli_query($koneksi, $sql_cek);
    $data_cek = mysqli_fetch_array($query_cek, MYSQLI_BOTH);
}
?>


<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fa fa-edit"></i> Ubah Data Estimasi
        </h3>
    </div>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="card-body">
            <input type='hidden' class="form-control" name="id_esti" value="<?php echo $data_cek['id_esti']; ?>" readonly />

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">No RAB</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" id="no_proyek" name="no_proyek" value="<?php echo $data_cek['no_proyek']; ?>" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Harga Material</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" id="nilai_bm" name="nilai_bm" value="<?php echo $data_cek['nilai_bm']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Upah Tenaga Kerja</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" id="nilai_utk" name="nilai_utk" value="<?php echo $data_cek['nilai_utk']; ?>" required>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Waktu Pengerjaan</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" id="nilai_wp" name="nilai_wp" value="<?php echo $data_cek['nilai_wp']; ?>" required>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Jenis Rumah</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" id="nilai_jr" name="nilai_jr" value="<?php echo $data_cek['nilai_jr']; ?>" required>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Jumlah Pekerja</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" id="nilai_jp" name="nilai_jp" value="<?php echo $data_cek['nilai_jp']; ?>" required>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <input type="submit" name="Simpan" value="Update" class="btn btn-info">
            <a href="?page=data_esti" title="Kembali" class="btn btn-secondary">Batal</a>
        </div>
    </form>
</div>

<?php

if (isset($_POST['Simpan'])) {

    //mulai proses simpan data
    $sql_ubah = "UPDATE tb_estimasi SET
        no_proyek='" . $_POST['no_proyek'] . "',
        nilai_bm='" . $_POST['nilai_bm'] . "',
        nilai_utk='" . $_POST['nilai_utk'] . "',
        nilai_wp='" . $_POST['nilai_wp'] . "',
        nilai_jr='" . $_POST['nilai_jr'] . "',
        nilai_jp='" . $_POST['nilai_jp'] . "'
        WHERE id_esti='" . $_POST['id_esti'] . "'";
    $query_ubah = mysqli_query($koneksi, $sql_ubah);
    mysqli_close($koneksi);

    if ($query_ubah) {
        echo "<script>
      Swal.fire({title: 'Ubah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value)
        {window.location = 'index.php?page=data_esti';
        }
      })</script>";
    } else {
        echo "<script>
      Swal.fire({title: 'Ubah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value)
        {window.location = 'index.php?page=data_esti';
        }
      })</script>";
    }
}

?>