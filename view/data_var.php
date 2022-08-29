<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fa fa-table"></i> Data Variabel Proyek
        </h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <div class="table-responsive">
            <p>Data Ini Merupakan Data Mutlak</p>
            <table id="example1" class="table table-bordered table-striped" style="text-align: center;">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Variabel</th>
                        <th>Nama Variabel</th>
                        <th>Nilai C1</th>
                        <th>Nilai C2</th>
                        <th>Nilai C3</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $no = 1;
                    $sql = $koneksi->query("select * from variabel");
                    while ($data = $sql->fetch_assoc()) {
                    ?>

                        <tr>
                            <td>
                                <?php echo $no++; ?>
                            </td>
                            <td>
                                <?php echo $data['kode_var']; ?>
                            </td>
                            <td>
                                <?php echo $data['nama_var']; ?>
                            </td>
                            <td>
                                <?php echo $data['nilai_c1']; ?>
                            </td>
                            <td>
                                <?php echo $data['nilai_c2']; ?>
                            </td>
                            <td>
                                <?php echo $data['nilai_c3']; ?>
                            </td>
                        </tr>

                    <?php
                    }
                    ?>
                </tbody>
                </tfoot>
            </table>
        </div>
    </div>
    <!-- /.card-body -->