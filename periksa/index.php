<?php
require_once 'header.php';
require_once 'sidebar.php';
?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Dashboard Website</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Tabel Periksa</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <h2 class="text-center">Data Periksa</h2>
                            <a href="../periksa/add.php"><button class="btn btn-primary mb-1">Tambah Data</button></a>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal</th>
                                        <th>Berat Badan</th>
                                        <th>Tinggi Badan</th>
                                        <th>Tensi</th>
                                        <th>Keterangan</th>
                                        <th>Id Pasien</th>
                                        <th>Id Dokter</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    require '../dbkoneksi.php';
                                    $query = $dbh->query("SELECT * FROM periksa");
                                    $nomor = 1;
                                    foreach ($query as $row) {
                                        echo "<tr>";
                                        echo "<td>" . $nomor++ . "</td>";
                                        echo "<td>" . $row['tanggal'] . "</td>";
                                        echo "<td>" . $row['berat'] . "</td>";
                                        echo "<td>" . $row['tinggi'] . "</td>";
                                        echo "<td>" . $row['tensi'] . "</td>";
                                        echo "<td>" . $row['keterangan'] . "</td>";
                                        echo "<td>" . $row['pasien_id'] . "</td>";
                                        echo "<td>" . $row['dokter_id'] . "</td>";
                                        echo "<td>";
                                        echo "<a href='edit.php?id=" . $row['id'] . "'><button class='btn btn-primary'>Edit</button></a>";
                                        echo "<span class='mx-1'></span>";
                                        echo "<a href='delete.php?id=" . $row['id'] . "' onclick='return confirm(\"Yakin Hapus Data?\")'><button class='btn btn-danger'>Delete</button></a>";
                                        echo "</td>";
                                        echo "</tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer">
                            Projek 1
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php
require_once 'footer.php';
?>
