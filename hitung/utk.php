<div class="card" style="margin: 5px;">
    <div class="card-body">
        <h5 class="card-title">Upah Tenaga Kerja</h5><br>
        <div class="row">
            <div class="col">
                <img src="dist/img/utk.png" width="200px" height="170px">
            </div>

            <?php
            $utk1 = '';
            $utk2 = '';
            $utk3 = '';
            $utk4 = '';
            $utk5 = '';
            $utk6 = '';
            $utk7 = '';
            $sql = $koneksi->query($sql_cek);
            while ($data = $sql->fetch_assoc()) {
                $hitutk =  $data['nilai_utk'];
                $fuz1 = 1;
                $fuz2 = (20 - $hitutk) / (20 - 10);
                $fuz3 = ($hitutk - 10) / (20 - 10);
                $fuz4 = (30 - $hitutk) / (30 - 20);
                $fuz5 = ($hitutk - 20) / (30 - 20);
            ?>
                <div class="col">
                    <p class="card-text">
                        <?php

                        if ($hitutk <= 10) {
                            echo "<br>";
                            echo "<a href='#informasi' class='btn btn-sm btn-block btn-success block' data-toggle='collapse' data-parent='#accordion'>
                            𝜇 sedikit [$hitutk] = $fuz1</a>";
                            if ($hitutk == true) {
                                $utk1 = "Sedikit";
                            }
                            $sql_simpan = "INSERT INTO query_utk (id,id_pro,nama_utk,nilai_utk) VALUES 
                                ('','" . $_GET['kode'] . "','Sedikit','$fuz1'),
                                ('','" . $_GET['kode'] . "','Sedang','0'),
                                ('','" . $_GET['kode'] . "','Banyak','0')
                                ";
                            $query_simpan = mysqli_query($koneksi, $sql_simpan);
                        }
                        if ($hitutk > 10 && $hitutk < 30) {
                            if ($hitutk > 10 && $hitutk < 20) {
                                echo "<br>";
                                echo "<a href='#informasi' class='btn btn-sm btn-block btn-success block' data-toggle='collapse' data-parent='#accordion'>
                                𝜇 sedikit [$hitutk] = 20-$hitutk / 20-10 = $fuz2</a>";
                                echo "<br>";
                                if ($hitutk == true) {
                                    $utk2 = "Sedikit";
                                }
                                echo "<a href='#informasi' class='btn btn-sm btn-block btn-warning block' data-toggle='collapse' data-parent='#accordion'>
                                𝜇 sedang [$hitutk] = $hitutk-10 / 20-10 = $fuz3</a>";
                                if ($hitutk == true) {
                                    $utk3 = "Sedang";
                                }
                                $sql_simpan = "INSERT INTO query_utk (id,id_pro,nama_utk,nilai_utk) VALUES 
                                ('','" . $_GET['kode'] . "','Sedikit','$fuz2'),
                                ('','" . $_GET['kode'] . "','Sedang','$fuz3'),
                                ('','" . $_GET['kode'] . "','Banyak','0')
                                ";
                                $query_simpan = mysqli_query($koneksi, $sql_simpan);
                            }
                            if ($hitutk == 20) {
                                echo "<br>";
                                echo "<a href='#informasi' class='btn btn-sm btn-block btn-warning block' data-toggle='collapse' data-parent='#accordion'>
                                𝜇 sedang [$hitutk] = $fuz1</a>";
                                if ($hitutk == true) {
                                    $utk4 = "Sedang";
                                }
                                $sql_simpan = "INSERT INTO query_utk (id,id_pro,nama_utk,nilai_utk) VALUES 
                                ('','" . $_GET['kode'] . "','Sedikit','0'),
                                ('','" . $_GET['kode'] . "','Sedang','$fuz1'),
                                ('','" . $_GET['kode'] . "','Banyak','0')
                                ";
                                $query_simpan = mysqli_query($koneksi, $sql_simpan);
                            }
                            if ($hitutk > 20) {
                                echo "<br>";
                                echo "<a href='#informasi' class='btn btn-sm btn-block btn-warning block' data-toggle='collapse' data-parent='#accordion'>
                                𝜇 sedang [$hitutk] = 20-$hitutk / 30-20 = $fuz4</a>";
                                echo "<br>";
                                if ($hitutk == true) {
                                    $utk5 = "Sedang";
                                }
                                echo "<a href='#informasi' class='btn btn-sm btn-block btn-danger block' data-toggle='collapse' data-parent='#accordion'>
                                𝜇 banyak [$hitutk] = $hitutk-10 / 30-20 = $fuz5</a>";
                                if ($hitutk == true) {
                                    $utk6 = "Banyak";
                                }
                                $sql_simpan = "INSERT INTO query_utk (id,id_pro,nama_utk,nilai_utk) VALUES 
                                ('','" . $_GET['kode'] . "','Sedikit','0'),
                                ('','" . $_GET['kode'] . "','Sedang','$fuz4'),
                                ('','" . $_GET['kode'] . "','Banyak','$fuz5')
                                ";
                                $query_simpan = mysqli_query($koneksi, $sql_simpan);
                            }
                        }
                        if ($hitutk >= 30) {
                            echo "<br>";
                            echo "<a href='#informasi' class='btn btn-sm btn-block btn-danger block' data-toggle='collapse' data-parent='#accordion'>
                            𝜇 banyak [$hitutk] = $fuz1</a>";
                            if ($hitutk == true) {
                                $utk7 = "Banyak";
                            }
                            $sql_simpan = "INSERT INTO query_utk (id,id_pro,nama_utk,nilai_utk) VALUES 
                                ('','" . $_GET['kode'] . "','Sedikit','0'),
                                ('','" . $_GET['kode'] . "','Sedang','0'),
                                ('','" . $_GET['kode'] . "','Banyak','$fuz1')
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