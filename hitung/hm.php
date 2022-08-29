<div class="card" style="margin: 5px;">
    <div class="card-body">
        <h5 class="card-title">Harga Material</h5><br>
        <div class="row">
            <div class="col">
                <img src="dist/img/hm.png" width="200px" height="170px">
            </div>
            <?php

            $hm1 = '';
            $hm2 = '';
            $hm3 = '';
            $hm4 = '';
            $hm5 = '';
            $hm6 = '';
            $hm7 = '';
            $sql = $koneksi->query($sql_cek);
            while ($data = $sql->fetch_assoc()) {

                $hitbm =  $data['nilai_bm'];
                $fuz1 = 1;
                $fuz2 = (10 - $hitbm) / (10 - 5);
                $fuz3 = ($hitbm - 5) / (10 - 5);
                $fuz4 = (15 - $hitbm) / (15 - 10);
                $fuz5 = ($hitbm - 10) / (15 - 10);
            ?>
                <div class="col">
                    <p class="card-text">
                        <?php
                        if ($hitbm <= 5) {
                            echo "<br>";
                            echo "<a href='#informasi' class='btn btn-sm btn-block btn-succsess block' data-toggle='collapse' data-parent='#accordion'>
                            𝜇 rendah [$hitbm] = $fuz1</a>";
                            if ($hitbm == true) {
                                $hm1 = "Rendah";
                            }
                            $sql_simpan = "INSERT INTO query_hm (id,id_pro,nama_hm,nilai_hm) VALUES 
                                ('','" . $_GET['kode'] . "','Rendah','$fuz1'),
                                ('','" . $_GET['kode'] . "','Sedang','0'),
                                ('','" . $_GET['kode'] . "','Tinggi','0')
                                ";
                            $query_simpan = mysqli_query($koneksi, $sql_simpan);
                        }
                        if ($hitbm > 5 && $hitbm < 15) {
                            if ($hitbm > 5 && $hitbm < 10) {
                                echo "<br>";
                                echo "<a href='#informasi' class='btn btn-sm btn-block btn-succsess block' data-toggle='collapse' data-parent='#accordion'>
                                            𝜇 rendah [$hitbm] = 10-$hitbm / 15-10 = $fuz2</a>";
                                echo "<br>";
                                if ($hitbm == true) {
                                    $hm2 = "Rendah";
                                }
                                echo "<a href='#informasi' class='btn btn-sm btn-block btn-warning block' data-toggle='collapse' data-parent='#accordion'>
                                            𝜇 sedang [$hitbm] = $hitbm-5 / 15-10 = $fuz3</a>";
                                if ($hitbm == true) {
                                    $hm3 = "Sedang";
                                }
                                $sql_simpan = "INSERT INTO query_hm (id,id_pro,nama_hm,nilai_hm) VALUES 
                                ('','" . $_GET['kode'] . "','Rendah','$fuz2'),
                                ('','" . $_GET['kode'] . "','Sedang','$fuz3'),
                                ('','" . $_GET['kode'] . "','Tinggi','0')
                                ";
                                $query_simpan = mysqli_query($koneksi, $sql_simpan);
                            }
                            if ($hitbm == 10) {
                                echo "<br>";
                                echo "<a href='#informasi' class='btn btn-sm btn-block btn-warning block' data-toggle='collapse' data-parent='#accordion'>
                                            𝜇 sedang [$hitbm] = $fuz1</a>";
                                if ($hitbm == true) {
                                    $hm4 = "Sedang";
                                }
                                $sql_simpan = "INSERT INTO query_hm (id,id_pro,nama_hm,nilai_hm) VALUES 
                                ('','" . $_GET['kode'] . "','Rendah','0'),
                                ('','" . $_GET['kode'] . "','Sedang','$fuz1'),
                                ('','" . $_GET['kode'] . "','Tinggi','0')
                                ";
                                $query_simpan = mysqli_query($koneksi, $sql_simpan);
                            }
                            if ($hitbm > 10) {
                                echo "<br>";
                                echo "<a href='#informasi' class='btn btn-sm btn-block btn-warning block' data-toggle='collapse' data-parent='#accordion'>
                                            𝜇 sedang [$hitbm] = 15-$hitbm / 15-10 = $fuz4</a>";
                                echo "<br>";
                                if ($hitbm == true) {
                                    $hm5 = "Sedang";
                                }
                                echo "<a href='#informasi' class='btn btn-sm btn-block btn-danger block' data-toggle='collapse' data-parent='#accordion'>
                                            𝜇 tinggi [$hitbm] = $hitbm-10 / 15-10 = $fuz5</a>";
                                if ($hitbm == true) {
                                    $hm6 = "Tinggi";
                                }
                                $sql_simpan = "INSERT INTO query_hm (id,id_pro,nama_hm,nilai_hm) VALUES 
                                ('','" . $_GET['kode'] . "','Rendah','0'),
                                ('','" . $_GET['kode'] . "','Sedang','$fuz4'),
                                ('','" . $_GET['kode'] . "','Tinggi','$fuz5')
                                ";
                                $query_simpan = mysqli_query($koneksi, $sql_simpan);
                            }
                        }
                        if ($hitbm >= 15) {
                            echo "<br>";
                            echo "<a href='#informasi' class='btn btn-sm btn-block btn-danger block' data-toggle='collapse' data-parent='#accordion'>
                                            𝜇 tinggi [$hitbm] = $fuz1</a>";
                            if ($hitbm == true) {
                                $hm7 = "Tinggi";
                            }
                            $sql_simpan = "INSERT INTO query_hm (id,id_pro,nama_hm,nilai_hm) VALUES 
                                ('','" . $_GET['kode'] . "','Rendah','0'),
                                ('','" . $_GET['kode'] . "','Sedang','0'),
                                ('','" . $_GET['kode'] . "','Tinggi','$fuz1')
                                ";
                            $query_simpan = mysqli_query($koneksi, $sql_simpan);
                        }
                        ?>
                    </p>
                </div>
        </div>
    <?php } ?>
    </div>
</div>