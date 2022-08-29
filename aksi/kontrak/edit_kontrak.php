<?php

if (isset($_GET['kode'])) {
    $sql_cek = "SELECT * FROM tb_kontrak
    WHERE id_kontrak='" . $_GET['kode'] . "'";
    $query_cek = mysqli_query($koneksi, $sql_cek);
    $data_cek = mysqli_fetch_array($query_cek, MYSQLI_BOTH);
}
?>

<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fa fa-edit"></i> Edit Data Kontrak
        </h3>
    </div>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="card-body">
            <input type="hidden" name="id_kontrak" value="<?php echo $data_cek['id_kontrak']; ?>">
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">No Kontrak</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" id="no_kontrak" name="no_kontrak" value="<?php echo $data_cek['no_kontrak']; ?>" readonly>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Nama Client</label>
                <div class="col-sm-4">
                    <select class="form-control" name="nm_client" id="nm_client" required>
                        <option value="" selected disabled> No : * * * * * | <?php echo $data_cek['nm_client']; ?> ---

                        </option>

                        <?php
                        $sql = $koneksi->query("SELECT * FROM tb_klien");
                        while ($data = $sql->fetch_assoc()) {
                        ?>
                            <option value="<?php echo $data['nm_client'] ?>"><?php echo $data['no_client'] . " | " ?><?php echo $data['nm_client'] ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Nilai Kontrak</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" id="rupiah" name="nilai_kontrak" value="<?php echo $data_cek['nilai_kontrak'] ?>" required>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Jenis Pekerjaan</label>
                <div class="col-sm-4">
                    <select class="form-control" name="nama_pro" id="nama_pro" required>
                        <option value="" selected disabled> Kode : * * * * *| <?php echo $data_cek['nama_pro']; ?> ---

                        </option>
                        <?php
                        $sql = $koneksi->query("SELECT * FROM tb_jenisproyek");
                        while ($data = $sql->fetch_assoc()) {

                        ?>
                            <option value="<?php echo $data['nama_pro'] ?>"><?php echo $data['kode_pro'] . " | " ?><?php echo $data['nama_pro'] ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Jenis Pembayaran</label>
                <div class="col-sm-4" style="margin-top: 7px;">
                    <div class="form-check" style="font-size: 18px; margin-bottom: 5px;">
                        <input class=" form-check-input" type="radio" name="jenis_pembayaran" id="exampleRadios1" value="Termin Progress Payment" <?php if ($data_cek['jenis_pembayaran'] == 'Termin Progress Payment') echo 'checked' ?>>
                        <label class="form-check-label" for="exampleRadios1" style="font-size: 20px;">
                            Termin Progress Payment
                        </label>
                    </div>
                    <div class="form-check" style="font-size: 18px; margin-bottom: 5px;">
                        <input class=" form-check-input" type="radio" name="jenis_pembayaran" id="exampleRadios1" value="Turn Key Payment" <?php if ($data_cek['jenis_pembayaran'] == 'Turn Key Payment') echo 'checked' ?>>
                        <label class="form-check-label" for="exampleRadios2" style="font-size: 20px;">
                            Turn Key Payment
                        </label>
                    </div>
                    <div class="form-check" style="font-size: 18px; margin-bottom: 5px;">
                        <input class=" form-check-input" type="radio" name="jenis_pembayaran" id="exampleRadios1" value="Full Payment" <?php if ($data_cek['jenis_pembayaran'] == 'Full Payment') echo 'checked' ?>>
                        <label class="form-check-label" for="exampleRadios1" style="font-size: 20px;">
                            Full Payment
                        </label>
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Tanggal Kontrak</label>
                <div class="col-sm-4">
                    <input type="date" class="form-control" id="date" name="tgl_kontrak" required value="<?php echo $data_cek['tgl_kontrak']; ?>">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Lama Kontrak</label>
                <div class="col-sm-2">
                    <input type="number" class="form-control" name="lama_kontrak" value="<?php echo $data_cek['lama_kontrak']; ?>" required>

                </div>
                <div class="col-sm-2">
                    <input class="form-control" value="Bulan" readonly>
                </div>


            </div>
            <div class="card-footer">
                <input type="submit" name="Simpan" value="Simpan" class="btn btn-info">
                <a href="?page=data_kontrak" title="Kembali" class="btn btn-secondary">Batal</a>
            </div>
    </form>
</div>

<?php

if (isset($_POST['Simpan'])) {

    //mulai proses simpan data
    $sql_ubah = "UPDATE tb_kontrak SET 
        no_kontrak='" . $_POST['no_kontrak'] . "',
        nm_client='" . $_POST['nm_client'] . "',
        nama_pro='" . $_POST['nama_pro'] . "',
        nilai_kontrak='" . $_POST['nilai_kontrak'] . "',
        jenis_pembayaran='" . $_POST['jenis_pembayaran'] . "',
        tgl_kontrak ='" . $_POST['tgl_kontrak'] . "',
        lama_kontrak='" . $_POST['lama_kontrak'] . "'
        WHERE id_kontrak ='" . $_POST['id_kontrak'] . "'";

    $query_ubah = mysqli_query($koneksi, $sql_ubah);
    mysqli_close($koneksi);

    if ($query_ubah) {
        echo "<script>
      Swal.fire({title: 'Ubah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value)
        {window.location = 'index.php?page=data_kontrak';
        }
      })</script>";
    } else {
        echo "<script>
      Swal.fire({title: 'Ubah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value)
        {window.location = 'index.php?page=data_kontrak';
        }
      })</script>";
    }
}

?>

<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script type="text/javascript">
    var rupiah = document.getElementById("rupiah");
    rupiah.addEventListener("keyup", function(e) {
        // tambahkan 'Rp.' pada saat form di ketik
        // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
        rupiah.value = formatRupiah(this.value, "Rp. ");
    });

    /* Fungsi formatRupiah */
    function formatRupiah(angka, prefix) {
        var number_string = angka.replace(/[^,\d]/g, "").toString(),
            split = number_string.split(","),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        // tambahkan titik jika yang di input sudah menjadi angka ribuan
        if (ribuan) {
            separator = sisa ? "." : "";
            rupiah += separator + ribuan.join(".");
        }

        rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
        return prefix == undefined ? rupiah : rupiah ? "Rp" + rupiah : "";
    }
</script>