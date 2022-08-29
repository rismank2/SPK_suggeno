<div class="card" style="margin: 5px;">
    <div class="card-body">
        <h5 class="card-title">Jenis Rumah</h5><br>
        <div class="row">
            <div class="col">
                <img src="dist/img/jr.png" width="200px" height="170px">
            </div>

            <?php
            $jn1 = '';
            $jn2 = '';
            $jn3 = '';
            $jn4 = '';
            $jn5 = '';
            $jn6 = '';
            $jn7 = '';

            $sql = $koneksi->query($sql_cek);
            while ($data = $sql->fetch_assoc()) {
                $hitjr =  $data['nilai_jr'];
                $fuz1 = 1;
                $fuz2 = (36 - $hitjr) / (36 - 21);
                $fuz3 = ($hitjr - 21) / (36 - 21);
                $fuz4 = (45 - $hitjr) / (45 - 36);
                $fuz5 = ($hitjr - 36) / (45 - 36);
            ?>
                <div class="col">
                    <p class="card-text">
                        <?php

                        if ($hitjr <= 21) {
                            echo "<br>";
                            echo "<a href='#informasi' class='btn btn-sm btn-block btn-success block' data-toggle='collapse' data-parent='#accordion'>
                            𝜇 sempit [$hitjr] = $fuz1</a>";
                            if ($hitjr == true) {
                                $jn1 = "Sempit";
                            }
                            $sql_simpan = "INSERT INTO query_jr (id,id_pro,nama_jr,nilai_jr) VALUES 
                                ('','" . $_GET['kode'] . "','Sempit','$fuz1'),
                                ('','" . $_GET['kode'] . "','Sedang','0'),
                                ('','" . $_GET['kode'] . "','Lebar','0')
                                ";
                            $query_simpan = mysqli_query($koneksi, $sql_simpan);
                        }
                        if ($hitjr > 21 && $hitjr < 45) {
                            if ($hitjr > 21 && $hitjr < 36) {
                                echo "<br>";
                                echo "<a href='#informasi' class='btn btn-sm btn-block btn-success block' data-toggle='collapse' data-parent='#accordion'>
                                𝜇 sempit [$hitjr] = 36-$hitjr / 36-21 = $fuz2</a>";
                                echo "<br>";
                                if ($hitjr == true) {
                                    $jn2 = "Sempit";
                                }
                                echo "<a href='#informasi' class='btn btn-sm btn-block btn-warning block' data-toggle='collapse' data-parent='#accordion'>
                                𝜇 sedang [$hitjr] = $hitjr-21 / 36-21 = $fuz3</a>";
                                if ($hitjr == true) {
                                    $jn3 = "Sedang";
                                }
                                $sql_simpan = "INSERT INTO query_jr (id,id_pro,nama_jr,nilai_jr) VALUES 
                                ('','" . $_GET['kode'] . "','Sempit','$fuz2'),
                                ('','" . $_GET['kode'] . "','Sedang','$fuz3'),
                                ('','" . $_GET['kode'] . "','Lebar','0')
                                ";
                                $query_simpan = mysqli_query($koneksi, $sql_simpan);
                            }
                            if ($hitjr == 36) {
                                echo "<br>";
                                echo "<a href='#informasi' class='btn btn-sm btn-block btn-warning block' data-toggle='collapse' data-parent='#accordion'>
                                𝜇 sedang [$hitjr] = $fuz1</a>";
                                if ($hitjr == true) {
                                    $jn4 = "Sedang";
                                }
                                $sql_simpan = "INSERT INTO query_jr (id,id_pro,nama_jr,nilai_jr) VALUES 
                                ('','" . $_GET['kode'] . "','Sempit','0'),
                                ('','" . $_GET['kode'] . "','Sedang','$fuz1'),
                                ('','" . $_GET['kode'] . "','Lebar','0')
                                ";
                                $query_simpan = mysqli_query($koneksi, $sql_simpan);
                            }
                            if ($hitjr > 36) {
                                echo "<br>";
                                echo "<a href='#informasi' class='btn btn-sm btn-block btn-warning block' data-toggle='collapse' data-parent='#accordion'>
                                𝜇 sedang [$hitjr] = 36-$hitjr / 45-36 = $fuz4</a>";
                                echo "<br>";
                                if ($hitjr == true) {
                                    $jn5 = "Sedang";
                                }
                                echo "<a href='#informasi' class='btn btn-sm btn-block btn-danger block' data-toggle='collapse' data-parent='#accordion'>
                                𝜇 lebar [$hitjr] = $hitjr-21 / 45-36 = $fuz5</a>";
                                if ($hitjr == true) {
                                    $jn6 = "Lebar";
                                }
                                $sql_simpan = "INSERT INTO query_jr (id,id_pro,nama_jr,nilai_jr) VALUES 
                                ('','" . $_GET['kode'] . "','Sempit','0'),
                                ('','" . $_GET['kode'] . "','Sedang','$fuz4'),
                                ('','" . $_GET['kode'] . "','Lebar','$fuz5')
                                ";
                                $query_simpan = mysqli_query($koneksi, $sql_simpan);
                            }
                        }
                        if ($hitjr >= 45) {
                            echo "<br>";
                            echo "<a href='#informasi' class='btn btn-sm btn-block btn-danger block' data-toggle='collapse' data-parent='#accordion'>
                            𝜇 lebar [$hitjr] = $fuz1</a>";
                            if ($hitjr == true) {
                                $jn7 = "Lebar";
                            }
                            $sql_simpan = "INSERT INTO query_jr (id,id_pro,nama_jr,nilai_jr) VALUES 
                                ('','" . $_GET['kode'] . "','Sempit','0'),
                                ('','" . $_GET['kode'] . "','Sedang','0'),
                                ('','" . $_GET['kode'] . "','Lebar','$fuz1')
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