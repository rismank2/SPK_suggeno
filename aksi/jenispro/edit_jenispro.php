<?php

if (isset($_GET['kode'])) {
    $sql_cek = "SELECT * FROM tb_jenisproyek WHERE id_jenispro='" . $_GET['kode'] . "'";
    $query_cek = mysqli_query($koneksi, $sql_cek);
    $data_cek = mysqli_fetch_array($query_cek, MYSQLI_BOTH);
}
?>

<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fa fa-edit"></i> Edit Data Jenis Pekerjaan
        </h3>
    </div>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="card-body">
            <input type="hidden" name="id_jenispro" value="<?php echo $data_cek['id_jenispro']; ?>">
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Kode Pekerjaan</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" value="<?php echo $data_cek['kode_pro']; ?>" id="kode_pro" name="kode_pro" readonly>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Nama Pekerjaan</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" value="<?php echo $data_cek['nama_pro']; ?>" id="nama_pro" name="nama_pro" required>
                </div>
            </div>

        </div>
        <div class="card-footer">
            <input type="submit" name="Simpan" value="Update" class="btn btn-info">
            <a href="?page=jenis_pr" title="Kembali" class="btn btn-secondary">Batal</a>
        </div>
    </form>
</div>

<?php

if (isset($_POST['Simpan'])) {

    //mulai proses simpan data
    $sql_ubah = "UPDATE tb_jenisproyek SET       
        kode_pro='" . $_POST['kode_pro'] . "',
        nama_pro='" . $_POST['nama_pro'] . "'
        WHERE id_jenispro='" . $_POST['id_jenispro'] . "'";
    $query_ubah = mysqli_query($koneksi, $sql_ubah);
    mysqli_close($koneksi);

    if ($query_ubah) {
        echo "<script>
      Swal.fire({title: 'Ubah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value)
        {window.location = 'index.php?page=jenis_pr';
        }
      })</script>";
    } else {
        echo "<script>
      Swal.fire({title: 'Ubah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value)
        {window.location = 'index.php?page=jenis_pr';
        }
      })</script>";
    }
}

?>