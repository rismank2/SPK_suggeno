<?php

if (isset($_GET['kode'])) {
    $sql_cek = "SELECT * FROM tb_estimasi WHERE id_esti='" . $_GET['kode'] . "' ";
    $query_cek = mysqli_query($koneksi, $sql_cek);
    $data_cek = mysqli_fetch_array($query_cek, MYSQLI_BOTH);
    $id = $_GET['kode'];
}
?>
<style>
    .table1 {
        font-family: sans-serif;
        color: #232323;
        border-collapse: collapse;
    }


    .table1,
    th,
    td {
        border: 2px solid #999;
        padding: 3px 20px;
        margin: 10px;
    }
</style>

<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fa fa-edit"></i> Detail Perhitungan Estimasi
        </h3>
    </div>

    <div>
        <div class="row">
            <div class="col-4" style="margin: 10px;">
                <table class="table2">
                    <thead>
                        <tr style="text-align: center;">
                            <th>No Proyek</th>
                            <th>HM</th>
                            <th>UTK</th>
                            <th>WP</th>
                            <th>JR</th>
                            <th>JP</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php

                        $sql = $koneksi->query($sql_cek);

                        while ($data = $sql->fetch_assoc()) {
                            $nopol = $data['no_proyek'];
                        ?>
                            <tr style="text-align: center;">

                                <td>
                                    <?php echo $data['no_proyek']; ?>
                                </td>
                                <td>
                                    <?php echo $data['nilai_bm']; ?>
                                </td>
                                <td>
                                    <?php echo $data['nilai_utk']; ?>
                                </td>
                                <td>
                                    <?php echo $data['nilai_wp']; ?>
                                </td>
                                <td>
                                    <?php echo $data['nilai_jr']; ?>
                                </td>
                                <td>
                                    <?php echo $data['nilai_jp']; ?>
                                </td>
                            </tr>
                            <?php
                            $nop = $data['no_proyek'];
                            ?>
                        <?php
                        }
                        ?>
                    </tbody>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

    <div style="margin: 10px;">
        <b>
            <h5 style="margin: 10px;">Pembentukan Himpunan Fuzzy : </h5>
        </b>
        <div class="card-group">

            <!-- awal hitung HM -->
            <?php
            include "hitung/hm.php";
            ?>
            <!-- akhir hitung HM -->

            <!-- awal hitung UTK -->
            <?php
            include "hitung/utk.php";
            ?>
            <!-- akhir hitung UTK -->
        </div>

        <div class="card-group">
            <!-- awal hitung WP -->
            <?php
            include "hitung/wp.php";
            ?>
            <!-- akhir hitung WP -->

            <!-- awal hitung JR -->
            <?php
            include "hitung/jn.php";
            ?>
            <!-- akhir hitung JR -->
        </div>

        <div class="card-group">
            <!-- awal hitung JP -->
            <?php
            include "hitung/jp.php";
            ?>
            <!-- akhir hitung JR -->
        </div>
        <?php
        include "inc/combine.php";
        ?>

        <div class="card-group">
            <div class="card" style="margin: 5px;">
                <div class="card-body">
                    <h5 style="margin: 3px; margin-bottom: 15px;">Fungsi Implikasi : </h5>
                    <?php
                    $no = 1;
                    $nama = $koneksi->query("SELECT nama FROM combine WHERE id_pro = '" . $_GET['kode'] . "' ");
                    while ($data = $nama->fetch_assoc()) {
                        $c = $data['nama'];
                        $tam_ules = $koneksi->query("SELECT * FROM rule_combine WHERE 
								nama = '$c'
								");
                        $ketemu = mysqli_num_rows($tam_ules);
                        $kep = mysqli_fetch_array($tam_ules);
                        if ($ketemu > 0) {
                            // echo "<br>";
                            // echo $kep['kode_rule'];
                            $vi = $kep['kode_rule'];
                            $keputusan = $koneksi->query("SELECT * FROM tb_rules WHERE
				            kode_rules = '$vi' 
				            ");
                            $ketemu = mysqli_num_rows($keputusan);
                            $kep = mysqli_fetch_array($keputusan);
                            // echo $kep['kode_rules'];

                        }
                    ?>

                        <div>

                            <?php
                            if ($kep['out_put'] == "Murah") {
                                echo "<button style='margin: 3px;' class='btn btn-sm btn-success'>[" . $kep['kode_rules'] . "]</button>";
                            } else {
                                echo "<button style='margin: 3px;' class='btn btn-sm btn-danger'>[" . $kep['kode_rules'] . "]</button>";
                            }
                            ?>
                            if (HM) <b><?php echo $kep['bm'] ?></b>
                            and (UTK) <b><?php echo $kep['utk'] ?></b>
                            and (WP) <b><?php echo $kep['wp'] ?></b>
                            and (JR) <b><?php echo $kep['jr'] ?></b>
                            and (JP) <b><?php echo $kep['jp'] ?></b>
                            than estimasi besaran biaya <i><b><?php echo $kep['out_put'] ?></b></i>
                        </div>
                        <div style="margin-left: 60px;">
                            α predikat <?php echo $kep['kode_rules'] ?> =
                            𝜇 HM <?php echo $kep['bm'] ?> ⋂
                            𝜇 UTK <?php echo $kep['utk'] ?> ⋂
                            𝜇 WP <?php echo $kep['wp'] ?> ⋂
                            𝜇 JR <?php echo $kep['jr'] ?> ⋂
                            𝜇 JP <?php echo $kep['jp'] ?>
                        </div>
                        <div style="margin-left: 160px;">
                            <?php
                            //ambil nilai hm bedasakan nama
                            $n = $kep['bm'];
                            $que = $koneksi->query("SELECT * FROM query_hm WHERE 
								nama_hm = '$n'
								");
                            $ketemu = mysqli_num_rows($que);
                            $nilaique = mysqli_fetch_array($que);

                            //ambil nilai utk bedasakan nama
                            $n2 = $kep['utk'];
                            $que2 = $koneksi->query("SELECT * FROM query_utk WHERE 
                                    nama_utk = '$n2'
                                    ");
                            $ketemu2 = mysqli_num_rows($que2);
                            $nilaique2 = mysqli_fetch_array($que2);

                            //ambil nilai wp bedasakan nama
                            $n3 = $kep['wp'];
                            $que3 = $koneksi->query("SELECT * FROM query_wp WHERE 
                                    nama_wp = '$n3'
                                    ");
                            $ketemu3 = mysqli_num_rows($que3);
                            $nilaique3 = mysqli_fetch_array($que3);

                            //ambil nilai jr bedasakan nama
                            $n4 = $kep['jr'];
                            $que4 = $koneksi->query("SELECT * FROM query_jr WHERE 
                                    nama_jr = '$n4'
                                    ");
                            $ketemu4 = mysqli_num_rows($que4);
                            $nilaique4 = mysqli_fetch_array($que4);

                            //ambil nilai jp bedasakan nama
                            $n5 = $kep['jp'];
                            $que5 = $koneksi->query("SELECT * FROM query_jp WHERE 
                                    nama_jp = '$n5'
                                    ");
                            $ketemu5 = mysqli_num_rows($que5);
                            $nilaique5 = mysqli_fetch_array($que5);

                            //mencai nilai Min
                            $nilaiMIN = MIN(
                                $nilaique['nilai_hm'],
                                $nilaique2['nilai_utk'],
                                $nilaique3['nilai_wp'],
                                $nilaique4['nilai_jr'],
                                $nilaique5['nilai_jp']
                            );

                            ?>
                            = min (
                            <?php echo $nilaique['nilai_hm'] ?> ⋂
                            <?php echo $nilaique2['nilai_utk'] ?> ⋂
                            <?php echo $nilaique3['nilai_wp'] ?> ⋂
                            <?php echo $nilaique4['nilai_jr'] ?> ⋂
                            <?php echo $nilaique5['nilai_jp'] ?> )
                        </div>
                        <div style="margin-left: 160px;">
                            = <?php echo $nilaiMIN;
                                $a = $kep['nilai_output'];
                                $nilai_akhir = ($nilaiMIN * $a);
                                $waktu = date("h:i:s");
                                $sql_simpan = "INSERT INTO nilai_min (id,kode_rules,nilai_min,nilai_kep,nilai_akhir,waktu) VALUES 
                                ('" . $_GET['kode'] . "',
                                '" . $kep['kode_rules'] . "',
                                '$nilaiMIN',
                                '$a',
                                '$nilai_akhir',
                                '$waktu')
                                ";

                                $query_simpan = mysqli_query($koneksi, $sql_simpan);

                                ?>
                        </div>
                        <div style="margin-left: 60px;">
                            Hasil keputusan variabel <b><?php echo $kep['out_put'] ?></b> =
                            <?php
                            $f = $kep['out_put'];
                            if ($f == "Murah") {
                                $nf = 0;
                                echo 0;
                            } else {
                                $nf = 1;
                                echo 1;
                            }

                            ?>

                            (Z<?php echo $no++ ?>)
                        </div>
                        <br>

                    <?php
                    }
                    ?>
                    <!-- defuzyfikasi -->

                </div>
            </div>
        </div>

        <!-- defuzyfikasi -->
        <div class="card-group">
            <div class="card" style="margin: 5px;">
                <div class="card-body">
                    <h5>Defuzzifikasi (weight average) : </h5>
                    <table style="text-align: center;">
                        <thead>
                            <tr style="height : 20px">
                                <th>Kode Rules</th>
                                <th>Nilai MIN</th>
                                <th>Nilai Keputusan</th>
                                <th>(MIN * Keputusan)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = $koneksi->query("SELECT * FROM nilai_min ORDER BY kode_rules DESC");
                            while ($min = $sql->fetch_assoc()) {
                            ?>
                                <tr>
                                    <td> <?php echo $min['kode_rules'] ?></td>
                                    <td><?php echo $min['nilai_min'] ?></td>
                                    <td><?php echo $min['nilai_kep'] ?></td>
                                    <td><?php echo $min['nilai_akhir'] ?></td>
                                </tr>

                            <?php
                            }
                            ?>
                            <tr>
                                <?php
                                $sql = $koneksi->query("SELECT SUM(nilai_min),SUM(nilai_kep),SUM(nilai_akhir) FROM nilai_min ");
                                while ($min2 = $sql->fetch_assoc()) {
                                    $mina = $min2['SUM(nilai_akhir)'];
                                    $minb = $min2['SUM(nilai_min)'];
                                    $aa = ($min2['SUM(nilai_akhir)'] / $min2['SUM(nilai_min)']);
                                ?>
                                    <th>Total Nilai</th>
                                    <th><?php echo $min2['SUM(nilai_min)'] ?></th>
                                    <th><?php echo $min2['SUM(nilai_kep)'] ?></th>
                                    <th><?php echo $min2['SUM(nilai_akhir)'] ?></th>

                                <?php
                                }
                                ?>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card" style="margin: 5px;">
                <div class="card-body">
                    <div class="card mb-4 box-shadow">
                        <div class="card-header">
                            <h4 class="my-0 font-weight-normal" style="text-align: center;">
                                No Proyek :
                                <?php
                                echo $nopol;
                                ?>
                            </h4>
                        </div>
                        <div class="card-body">
                            <ul class="list-unstyled mt-3 mb-4">
                                <li><b>
                                        NILAI RATA-RATA :
                                <li>
                                    <?php
                                    echo $mina;
                                    echo " / ";
                                    echo $minb;
                                    ?>
                                </li>
                                <h1>
                                    <?php
                                    if ($aa < 1) {
                                        echo round($aa, 4);
                                    } else {
                                        echo number_format(1, 4);
                                    }
                                    ?>
                                </h1>
                                </b>
                                </li>
                            </ul>
                            <?php
                            if ($aa < 1) {
                                echo "<button type='button' class='btn btn-lg btn-block btn-outline-success'>Hasil Fuzzy Sugeno MURAH</button>";
                            } else {
                                echo "<button type='button' class='btn btn-lg btn-block btn-outline-danger'>Hasil Fuzzy Sugeno MAHAL</button>";
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- defuzyfikasi akhi -->

        <!-- button kembali + hapus -->
        <div>
            <form action="" method="post">
                <a href="?page=proses_esti">
                    <input style="margin-left: 10px; margin-top: 10px;" type="submit" name="Simpan" value="Kembali" class="btn btn-info">
                </a>
            </form>
        </div>
        <?php
        if (isset($_POST['Simpan'])) {
            $sql_hapus = "DELETE FROM combine WHERE id_pro = '" . $_GET['kode'] . "' ";
            $query_hapus = mysqli_query($koneksi, $sql_hapus);

            $sql_hapushm = "DELETE FROM query_hm WHERE id_pro = '" . $_GET['kode'] . "' ";
            $query_hapus = mysqli_query($koneksi, $sql_hapushm);

            $sql_hapusutk = "DELETE FROM query_utk WHERE id_pro = '" . $_GET['kode'] . "' ";
            $query_hapus = mysqli_query($koneksi, $sql_hapusutk);

            $sql_hapuswp = "DELETE FROM query_wp WHERE id_pro = '" . $_GET['kode'] . "' ";
            $query_hapus = mysqli_query($koneksi, $sql_hapuswp);

            $sql_hapusjr = "DELETE FROM query_jr WHERE id_pro = '" . $_GET['kode'] . "' ";
            $query_hapus = mysqli_query($koneksi, $sql_hapusjr);

            $sql_hapusjp = "DELETE FROM query_jp WHERE id_pro = '" . $_GET['kode'] . "' ";
            $query_hapus = mysqli_query($koneksi, $sql_hapusjp);

            $sql_hapusmin = "DELETE FROM nilai_min WHERE id = '" . $_GET['kode'] . "' ";
            $query_hapus = mysqli_query($koneksi, $sql_hapusmin);
            $s = 1;
            $sql_hapusmin2 = "DELETE FROM nilai_min WHERE DATEDIFF(CURDATE(),waktu) > $s ";
            $query_hapus = mysqli_query($koneksi, $sql_hapusmin2);

            if ($query_hapus = true) {
                echo "<script>
                        window.location = 'index.php?page=proses_esti';
                   </script>";
            }
        }
        ?>
    </div>