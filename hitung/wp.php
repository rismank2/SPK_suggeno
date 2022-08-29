<div class="card" style="margin: 5px;">
    <div class="card-body">
        <h5 class="card-title">Waktu Pengerjaan</h5><br>
        <div class="row">
            <div class="col">
                <img src="dist/img/wp.png" width="200px" height="170px">
            </div>
            <?php
            $wp1 = '';
            $wp2 = '';
            $wp3 = '';
            $wp4 = '';
            $wp5 = '';
            $wp6 = '';
            $wp7 = '';
            $sql = $koneksi->query($sql_cek);
            while ($data = $sql->fetch_assoc()) {
                $hitwp =  $data['nilai_wp'];
                $fuz1 = 1;
                //kiri
                $fuz2 = (12 - $hitwp) / (12 - 6);
                $fuz3 = ($hitwp - 6) / (12 - 6);
                // kanan
                $fuz4 = (18 - $hitwp) / (18 - 12);
                $fuz5 = ($hitwp - 12) / (18 - 12);
            ?>
                <div class="col">
                    <p class="card-text">
                        <?php
                        if ($hitwp <= 6) {
                            echo "<br>";
                            echo "<a href='#informasi' class='btn btn-sm btn-block btn-success block' data-toggle='collapse' data-parent='#accordion'>
                            𝜇 sebentar [$hitwp] = $fuz1</a>";
                            if ($hitwp == true) {
                                $wp1 = "Sebentar";
                            }
                            $sql_simpan = "INSERT INTO query_wp (id,id_pro,nama_wp,nilai_wp) VALUES 
                                ('','" . $_GET['kode'] . "','Sebentar','$fuz1'),
                                ('','" . $_GET['kode'] . "','Sedang','0'),
                                ('','" . $_GET['kode'] . "','Lama','0')
                                ";
                            $query_simpan = mysqli_query($koneksi, $sql_simpan);
                        }
                        if ($hitwp > 6 && $hitwp < 18) {
                            if ($hitwp > 6 && $hitwp < 12) {
                                echo "<br>";
                                echo "<a href='#informasi' class='btn btn-sm btn-block btn-success block' data-toggle='collapse' data-parent='#accordion'>
                                𝜇 sebentar [$hitwp] = 12-$hitwp / 18-12 = $fuz2</a>";
                                echo "<br>";
                                if ($hitwp == true) {
                                    $wp2 = "Sebentar";
                                }
                                echo "<a href='#informasi' class='btn btn-sm btn-block btn-warning block' data-toggle='collapse' data-parent='#accordion'>
                                𝜇 sedang [$hitwp] = $hitwp-6 / 18-12 = $fuz3</a>";
                                if ($hitwp == true) {
                                    $wp3 = "Sedang";
                                }
                                $sql_simpan = "INSERT INTO query_wp (id,id_pro,nama_wp,nilai_wp) VALUES 
                                ('','" . $_GET['kode'] . "','Sebentar','$fuz2'),
                                ('','" . $_GET['kode'] . "','Sedang','$fuz3'),
                                ('','" . $_GET['kode'] . "','Lama','0')
                                ";
                                $query_simpan = mysqli_query($koneksi, $sql_simpan);
                            }
                            if ($hitwp == 12) {
                                echo "<br>";
                                echo "<a href='#informasi' class='btn btn-sm btn-block btn-warning block' data-toggle='collapse' data-parent='#accordion'>
                                𝜇 sedang [$hitwp] = $fuz1</a>";
                                if ($hitwp == true) {
                                    $wp4 = "Sedang";
                                }
                                $sql_simpan = "INSERT INTO query_wp (id,id_pro,nama_wp,nilai_wp) VALUES 
                                ('','" . $_GET['kode'] . "','Sebentar','0'),
                                ('','" . $_GET['kode'] . "','Sedang','$fuz1'),
                                ('','" . $_GET['kode'] . "','Lama','0')
                                ";
                                $query_simpan = mysqli_query($koneksi, $sql_simpan);
                            }
                            if ($hitwp > 12) {
                                echo "<br>";
                                echo "<a href='#informasi' class='btn btn-sm btn-block btn-warning block' data-toggle='collapse' data-parent='#accordion'>
                                𝜇 sedang [$hitwp] = 18-$hitwp / 18-12 = $fuz4</a>";
                                echo "<br>";
                                if ($hitwp == true) {
                                    $wp5 = "Sedang";
                                }
                                echo "<a href='#informasi' class='btn btn-sm btn-block btn-danger block' data-toggle='collapse' data-parent='#accordion'>
                                𝜇 lama [$hitwp] = $hitwp-12 / 18-12 = $fuz5</a>";
                                if ($hitwp == true) {
                                    $wp6 = "Lama";
                                }
                                $sql_simpan = "INSERT INTO query_wp (id,id_pro,nama_wp,nilai_wp) VALUES 
                                ('','" . $_GET['kode'] . "','Sebentar','0'),
                                ('','" . $_GET['kode'] . "','Sedang','$fuz4'),
                                ('','" . $_GET['kode'] . "','Lama','$fuz5')
                                ";
                                $query_simpan = mysqli_query($koneksi, $sql_simpan);
                            }
                        }
                        if ($hitwp >= 18) {
                            echo "<br>";
                            echo "<a href='#informasi' class='btn btn-sm btn-block btn-danger block' data-toggle='collapse' data-parent='#accordion'>
                            𝜇 lama [$hitwp] = $fuz1</a>";
                            if ($hitwp == true) {
                                $wp7 = "Lama";
                            }
                            $sql_simpan = "INSERT INTO query_wp (id,id_pro,nama_wp,nilai_wp) VALUES 
                                ('','" . $_GET['kode'] . "','Sebentar','0'),
                                ('','" . $_GET['kode'] . "','Sedang','0'),
                                ('','" . $_GET['kode'] . "','Lama','$fuz1')
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