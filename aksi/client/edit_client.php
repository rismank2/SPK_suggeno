<?php

if (isset($_GET['kode'])) {
    $sql_cek = "SELECT * FROM tb_klien WHERE id_client='" . $_GET['kode'] . "'";
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
                <label class="col-sm-2 col-form-label">Nomor Client</label>
                <div class="col-sm-4">
                    <input type="hidden" class="form-control" name="id_client" value="<?php echo $data_cek['id_client']; ?>">
                    <input type="text" class="form-control" id="no_client" name="no_client" value="<?php echo $data_cek['no_client']; ?>" readonly>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Nama Client</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" id="nm_client" name="nm_client" value="<?php echo $data_cek['nm_client']; ?>" required>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Kontak</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" id="kontak" name="kontak" value="<?php echo $data_cek['kontak']; ?>" required>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Alamat</label>
                <div class="col-sm-4">
                    <textarea class="form-control" name="alamat" id="alamat" cols="30" rows="5" required><?php echo $data_cek['alamat']; ?></textarea>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Kota</label>
                <div class="col-sm-4">
                    <select class="form-control" name="kota" id="kota">
                        <option value="<?php echo $data_cek['kota']; ?>" required=""><?php echo $data_cek['kota']; ?></option>
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
            <input type="submit" name="Simpan" value="Update" class="btn btn-info">
            <a href="?page=data_client" title="Kembali" class="btn btn-secondary">Batal</a>
        </div>
    </form>
</div>

<?php

if (isset($_POST['Simpan'])) {

    //mulai proses simpan data
    $sql_ubah = "UPDATE tb_klien SET
        no_client='" . $_POST['no_client'] . "',
        nm_client='" . $_POST['nm_client'] . "',
        alamat='" . $_POST['alamat'] . "',
        kota='" . $_POST['kota'] . "',
        kontak='" . $_POST['kontak'] . "'
        WHERE id_client ='" . $_POST['id_client'] . "'";
    $query_ubah = mysqli_query($koneksi, $sql_ubah);
    mysqli_close($koneksi);

    if ($query_ubah) {
        echo "<script>
      Swal.fire({title: 'Ubah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value)
        {window.location = 'index.php?page=data_client';
        }
      })</script>";
    } else {
        echo "<script>
      Swal.fire({title: 'Ubah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value)
        {window.location = 'index.php?page=data_client';
        }
      })</script>";
    }
}

?>