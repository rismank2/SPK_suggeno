<?php

if (isset($_GET['kode'])) {
    $sql_cek = "SELECT * FROM tb_rules WHERE id_rules='" . $_GET['kode'] . "'";
    $query_cek = mysqli_query($koneksi, $sql_cek);
    $data_cek = mysqli_fetch_array($query_cek, MYSQLI_BOTH);
}
?>


<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fa fa-edit"></i> Ubah Data Rules
        </h3>
    </div>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="card-body">
            <?php
            $bm = array('Rendah', 'Sedang', 'Tinggi');
            $utk = array('Sedikit', 'Sedang', 'Banyak');
            $wp = array('Sebentar', 'Sedang', 'Lama');
            $jr = array('Sempit', 'Sedang', 'Lebar');
            $jp = array('Sedikit', 'Sedang', 'Banyak');
            $out = array('Murah', 'Mahal');
            ?>

            <div class="form-group row">
                <input type='hidden' class="form-control" name="id_rules" value="<?php echo $data_cek['id_rules']; ?>" readonly />
                <label class="col-sm-2 col-form-label">Kode Rules</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" id="kode_rules" name="kode_rules" value="<?php echo $data_cek['kode_rules']; ?>" readonly>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Biaya Material (BM)</label>
                <div class="col-sm-4">
                    <select name="biaya" id="biaya" class="form-control" required="required">
                        <option value='0' selected>--Pilih Biaya Material--</option>
                        <?php
                        foreach ($bm as $row) {
                            if ($biaya = $data_cek['bm']) {
                                if ($biaya == $row) {
                                    echo "<option value='" . $row . "' selected>" . $row . "</option>";
                                } else {
                                    echo "<option value='" . $row . "' >$row</option>";
                                    $row = '';
                                }
                            } else {
                                echo "<option value='" . $row . "' >$row</option>";
                            }
                        }
                        ?>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Upah Tenaga Kerja (UTK)</label>
                <div class="col-sm-4">
                    <select name="upah" id="upah" class="form-control" required="required">
                        <option value='0' selected>--Pilih Upah Tenaga kerja--</option>
                        <?php
                        foreach ($utk as $row) {
                            if ($upah = $data_cek['utk']) {
                                if ($upah == $row) {
                                    echo "<option value='" . $row . "' selected>" . $row . "</option>";
                                } else {
                                    echo "<option value='" . $row . "' >$row</option>";
                                    $row = '';
                                }
                            } else {
                                echo "<option value='" . $row . "' >$row</option>";
                            }
                        }
                        ?>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Waktu Pengerjaan (WP)</label>
                <div class="col-sm-4">
                    <select name="waktu" id="waktu" class="form-control" required="required">
                        <option value='0' selected>--Pilih Waktu Pengerjaan--</option>
                        <?php
                        foreach ($wp as $row) {
                            if ($waktu = $data_cek['wp']) {
                                if ($waktu == $row) {
                                    echo "<option value='" . $row . "' selected>" . $row . "</option>";
                                } else {
                                    echo "<option value='" . $row . "' >$row</option>";
                                    $row = '';
                                }
                            } else {
                                echo "<option value='" . $row . "' >$row</option>";
                            }
                        }
                        ?>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Jenis Rumah (JR)</label>
                <div class="col-sm-4">
                    <select name="jenis" id="jenis" class="form-control" required="required">
                        <option value='0' selected>--Pilih Jenis Rumah--</option>
                        <?php
                        foreach ($jr as $row) {
                            if ($jenis = $data_cek['jr']) {
                                if ($jenis == $row) {
                                    echo "<option value='" . $row . "' selected>" . $row . "</option>";
                                } else {
                                    echo "<option value='" . $row . "' >$row</option>";
                                    $row = '';
                                }
                            } else {
                                echo "<option value='" . $row . "' >$row</option>";
                            }
                        }
                        ?>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Jumlah Pekerja</label>
                <div class="col-sm-4">
                    <select name="jumlah" id="jumlah" class="form-control" required="required">
                        <option value='0' selected>--Pilih Jumlah Pekerja--</option>
                        <?php
                        foreach ($jp as $row) {
                            if ($jumlah = $data_cek['jp']) {
                                if ($jumlah == $row) {
                                    echo "<option value='" . $row . "' selected>" . $row . "</option>";
                                } else {
                                    echo "<option value='" . $row . "' >$row</option>";
                                    $row = '';
                                }
                            } else {
                                echo "<option value='" . $row . "' >$row</option>";
                            }
                        }
                        ?>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Fuzzy Output</label>
                <div class="col-sm-4">
                    <select name="output" id="output" class="form-control" required="required">
                        <option value='0' selected>--Pilih Output--</option>
                        <?php
                        foreach ($out as $row) {
                            if ($output = $data_cek['out_put']) {
                                if ($output == $row) {
                                    echo "<option value='" . $row . "' selected>" . $row . "</option>";
                                } else {
                                    echo "<option value='" . $row . "' >$row</option>";
                                    $row = '';
                                }
                            } else {
                                echo "<option value='" . $row . "' >$row</option>";
                            }
                        }
                        ?>
                    </select>
                </div>
            </div>

        </div>
        <div class="card-footer">
            <input type="submit" name="Simpan" value="Update" class="btn btn-info">
            <a href="?page=data_rules" title="Kembali" class="btn btn-secondary">Batal</a>
        </div>
    </form>
</div>

<?php

if (isset($_POST['Simpan'])) {

    //mulai proses simpan data
    $sql_ubah = "UPDATE tb_rules SET
        kode_rules='" . $_POST['kode_rules'] . "',
        bm='" . $_POST['biaya'] . "',
        utk='" . $_POST['upah'] . "',
        wp='" . $_POST['waktu'] . "',
        jr='" . $_POST['jenis'] . "',
        out_put='" . $_POST['output'] . "'
        WHERE id_rules='" . $_POST['id_rules'] . "'";
    $query_ubah = mysqli_query($koneksi, $sql_ubah);
    mysqli_close($koneksi);

    if ($query_ubah) {
        echo "<script>
      Swal.fire({title: 'Ubah Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
      }).then((result) => {if (result.value)
        {window.location = 'index.php?page=data_rules';
        }
      })</script>";
    } else {
        echo "<script>
      Swal.fire({title: 'Ubah Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
      }).then((result) => {if (result.value)
        {window.location = 'index.php?page=data_rules';
        }
      })</script>";
    }
}

?>