<?php

if (isset($_GET['kode'])) {
    $sql_cek = "SELECT * FROM tb_estimasipro JOIN
	tb_kontrak ON tb_estimasipro.id_kontrak = tb_kontrak.id_kontrak
     
    WHERE id_proyek='" . $_GET['kode'] . "'";

    $query_cek = mysqli_query($koneksi, $sql_cek);
    $data_cek = mysqli_fetch_array($query_cek, MYSQLI_BOTH);
}
?>

<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fa fa-edit"></i> Edit Data Estimasi Proyek
        </h3>
    </div>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="card-body">

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">No Proyek</label>
                <div class="col-sm-5">
                    <input type="hidden" name="id_proyek" value="<?php echo $data_cek['id_proyek'] ?>">
                    <input type="text" class="form-control" id="no_proyek" name="no_proyek" value="<?php echo $data_cek['no_proyek'] ?>" readonly>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Nomor Kontrak</label>
                <div class="col-sm-5">
                    <select class="form-control" name="id_kontrak" id="id_kontrak">
                        <option value="<?php echo $data_cek['no_kontrak'] ?>"><?php echo $data_cek['no_kontrak'] ?> | <?php echo $data_cek['nm_client'] ?></option>
                        <?php
                        $sql = $koneksi->query("SELECT * FROM tb_kontrak");
                        while ($data = $sql->fetch_assoc()) {

                        ?>
                            <option value="<?php echo $data['id_kontrak'] ?>"><?php echo $data['no_kontrak'] . " | " ?><?php echo $data['nm_client'] ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Tgl Pelaksanaan</label>
                <div class="col-sm-5">
                    <input type="date" class="form-control" id="date" name="waktu_pelak" value="<?php echo $data_cek['waktu_pelak'] ?>" required>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Lokasi</label>
                <div class="col-sm-5">
                    <select class="form-control" name="lokasi" id="lokasi">
                        <option value="<?php echo $data_cek['lokasi'] ?>"><?php echo $data_cek['lokasi'] ?></option>
                        <?php
                        $sql = $koneksi->query("SELECT * FROM kota");
                        while ($data = $sql->fetch_assoc()) {

                        ?>
                            <option value="<?php echo $data['nama'] ?>"><?php echo $data['nama'] ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">PIC</label>
                <div class="col-sm-5">
                    <select class="form-control" name="id_pic" id="id_pic">
                        <?php
                        $sql = $koneksi->query("SELECT * FROM tb_pic ");
                        while ($data = $sql->fetch_assoc()) {

                        ?>
                            <option value="<?php echo $data['id_pic'] ?>"><?php echo $data['nip'] . " | " ?><?php echo $data['nama_pic'] ?></option>

                            <option value="<?php echo $data['id_pic'] ?>"><?php echo $data['nip'] . " | " ?><?php echo $data['nama_pic'] ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>

            <div class="card-footer">
                <input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
                <a href="?page=data_pr" title="Kembali" class="btn btn-secondary">Batal</a>
            </div>
    </form>
</div>

<?php


if (isset($_POST['Simpan'])) {

    //mulai proses simpan data
    $sql_ubah = "UPDATE tb_estimasipro SET 
        no_proyek='" . $_POST['no_proyek'] . "',
        id_kontrak='" . $_POST['id_kontrak'] . "',
        waktu_pelak='" . $_POST['waktu_pelak'] . "',
        lokasi ='" . $_POST['lokasi'] . "',
        nama_pic='" . $_POST['id_pic'] . "'
        WHERE id_proyek ='" . $_POST['id_proyek'] . "'";

    $query_ubah = mysqli_query($koneksi, $sql_ubah);
    mysqli_close($koneksi);

    if ($query_ubah) {
        echo "<script>
      Swal.fire({title: 'Ubah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value)
        {window.location = 'index.php?page=data_pr';
        }
      })</script>";
    } else {
        echo "<script>
      Swal.fire({title: 'Ubah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value)
        {window.location = 'index.php?page=data_pr';
        }
      })</script>";
    }
}

?>