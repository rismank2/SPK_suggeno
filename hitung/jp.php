<div class="card" style="margin: 5px;">
    <div class="card-body">
        <h5 class="card-title">Jumlah Pekerja</h5><br>
        <div class="row">
            <div class="col">
                <img src="dist/img/jp.png" width="200px" height="170px">
            </div>

            <?php
            $jp1 = '';
            $jp2 = '';
            $jp3 = '';
            $jp4 = '';
            $jp5 = '';
            $jp6 = '';
            $jp7 = '';
            $sql = $koneksi->query($sql_cek);
            while ($data = $sql->fetch_assoc()) {
                $hitjp =  $data['nilai_jp'];
                $fuz1 = 1;
                $fuz2 = (12 - $hitjp) / (12 - 8);
                $fuz3 = ($hitjp - 8) / (12 - 8);
                $fuz4 = (16 - $hitjp) / (16 - 12);
                $fuz5 = ($hitjp - 12) / (16 - 12);
            ?>
                <div class="col">
                    <p class="card-text">
                        <?php

                        if ($hitjp <= 8) {
                            echo "<br>";
                            echo "<a href='#informasi' class='btn btn-sm btn-block btn-success block' data-toggle='collapse' data-parent='#accordion'>
                            𝜇 sedikit [$hitjp] = $fuz1</a>";
                            if ($hitjp == true) {
                                $jp1 = "Sedikit";
                            }
                            $sql_simpan = "INSERT INTO query_jp (id,id_pro,nama_jp,nilai_jp) VALUES 
                                ('','" . $_GET['kode'] . "','Sedikit','$fuz1'),
                                ('','" . $_GET['kode'] . "','Sedang','0'),
                                ('','" . $_GET['kode'] . "','Banyak','0')
                                ";
                            $query_simpan = mysqli_query($koneksi, $sql_simpan);
                        }
                        if ($hitjp > 8 && $hitjp < 16) {
                            if ($hitjp > 8 && $hitjp < 12) {
                                echo "<br>";
                                echo "<a href='#informasi' class='btn btn-sm btn-block btn-success block' data-toggle='collapse' data-parent='#accordion'>
                                𝜇 sedikit [$hitjp] = 12-$hitjp / 12-8 = $fuz2</a>";
                                echo "<br>";
                                if ($hitjp == true) {
                                    $jp2 = "Sedikit";
                                }
                                echo "<a href='#informasi' class='btn btn-sm btn-block btn-warning block' data-toggle='collapse' data-parent='#accordion'>
                                𝜇 sedang [$hitjp] = $hitjp-8 / 12-8 = $fuz3</a>";
                                if ($hitjp == true) {
                                    $jp3 = "Sedang";
                                }
                                $sql_simpan = "INSERT INTO query_jp (id,id_pro,nama_jp,nilai_jp) VALUES 
                                ('','" . $_GET['kode'] . "','Sedikit','$fuz2'),
                                ('','" . $_GET['kode'] . "','Sedang','$fuz3'),
                                ('','" . $_GET['kode'] . "','Banyak','0')
                                ";
                                $query_simpan = mysqli_query($koneksi, $sql_simpan);
                            }
                            if ($hitjp == 12) {
                                echo "<br>";
                                echo "<a href='#informasi' class='btn btn-sm btn-block btn-warning block' data-toggle='collapse' data-parent='#accordion'>
                                𝜇 sedang [$hitjp] = $fuz1</a>";
                                if ($hitjp == true) {
                                    $jp4 = "Sedang";
                                }
                                $sql_simpan = "INSERT INTO query_jp (id,id_pro,nama_jp,nilai_jp) VALUES 
                                ('','" . $_GET['kode'] . "','Sedikit','0'),
                                ('','" . $_GET['kode'] . "','Sedang','$fuz1'),
                                ('','" . $_GET['kode'] . "','Banyak','0')
                                ";
                                $query_simpan = mysqli_query($koneksi, $sql_simpan);
                            }
                            if ($hitjp > 12) {
                                echo "<br>";
                                echo "<a href='#informasi' class='btn btn-sm btn-block btn-warning block' data-toggle='collapse' data-parent='#accordion'>
                                𝜇 sedang [$hitjp] = 12-$hitjp / 16-12 = $fuz4</a>";
                                echo "<br>";
                                if ($hitjp == true) {
                                    $jp5 = "Sedang";
                                }
                                echo "<a href='#informasi' class='btn btn-sm btn-block btn-danger block' data-toggle='collapse' data-parent='#accordion'>
                                𝜇 banyak [$hitjp] = $hitjp-8 / 16-12 = $fuz5</a>";
                                if ($hitjp == true) {
                                    $jp6 = "Banyak";
                                }
                                $sql_simpan = "INSERT INTO query_jp (id,id_pro,nama_jp,nilai_jp) VALUES 
                                ('','" . $_GET['kode'] . "','Sedikit','0'),
                                ('','" . $_GET['kode'] . "','Sedang','$fuz4'),
                                ('','" . $_GET['kode'] . "','Banyak','$fuz5')
                                ";
                                $query_simpan = mysqli_query($koneksi, $sql_simpan);
                            }
                        }
                        if ($hitjp >= 16) {
                            echo "<br>";
                            echo "<a href='#informasi' class='btn btn-sm btn-block btn-danger block' data-toggle='collapse' data-parent='#accordion'>
                            𝜇 banyak [$hitjp] = $fuz1</a>";
                            if ($hitjp == true) {
                                $jp7 = "Banyak";
                            }
                            $sql_simpan = "INSERT INTO query_jp (id,id_pro,nama_jp,nilai_jp) VALUES 
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