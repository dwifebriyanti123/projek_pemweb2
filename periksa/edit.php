<?php
require_once 'header.php';
require_once 'sidebar.php';

require '../dbkoneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    // Query untuk mengambil data pasien berdasarkan id
    $sql = "SELECT * FROM periksa WHERE id = ?";
    $stmt = $dbh->prepare($sql);
    $stmt->execute([$id]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
}

if (isset($_POST['submit'])) {
    $_tanggal = $_POST['tanggal'];
    $_berat_bdn = $_POST['berat'];
    $_tinggi_bdn = $_POST['tinggi'];
    $_tensi = $_POST['tensi'];
    $_keterangan = $_POST['keterangan'];
    $_id_pasien = $_POST['pasien'];
    $_id_dokter = $_POST['dokter'];
    $data = [$_tanggal, $_berat_bdn, $_tinggi_bdn, $_tensi, $_keterangan, $_id_pasien, $_id_dokter, $id];
    // Query SQL untuk update data pasien berdasarkan id
    $sql = "UPDATE periksa SET tanggal = ?, berat = ?, tinggi = ?, tensi = ?, keterangan = ?, pasien = ?, dokter = ? WHERE id = ?";
    $stmt = $dbh->prepare($sql);
    $stmt->execute($data);
    echo "<script>window.location.href = 'index.php';</script>";
}
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Dashboard Website</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- Default box -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Form Periksa</h3>

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
                            <h2 class="text-center">Form Periksa</h2>
                            <form action="edit.php?id=<?= $row['id'] ?>" method="POST">
                                <div class="form-group row">
                                    <label for="tanggal" class="col-4 col-form-label">tanggal</label>
                                    <div class="col-8">
                                        <input id="name" name="name" type="date" class="form-control" value="<?= $row['tanggal'] ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="berat" class="col-4 col-form-label">Berat Badan</label>
                                    <div class="col-8">
                                    <input id="nama" name="nama" type="text" class="form-control" value="<?= $row['berat'] ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="tinggi" class="col-4 col-form-label">Tinggi Badan</label>
                                    <div class="col-8">
                                        <input id="tinggi" name="tinggi" type="text" class="form-control" value="<?= $row['tinggi'] ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="tensi" class="col-4 col-form-label">Tensi</label>
                                    <div class="col-8">
                                        <input id="tensi" name="tensi" type="text" class="form-control" value="<?= $row['tensi'] ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="keterangan" class="col-4 col-form-label">Keterangan</label>
                                    <div class="col-8">
                                        <textarea id="keterangan" name="keterangan" type="textarea" cols="40" class="form-control" value="<?= $row['keterangan'] ?>"></textarea>
                                    </div>
                                </div>  
                                <div class="form-group row">
                                    <label for="id_pasien" class="col-4 col-form-label">id Pasien</label>
                                    <div class="col-8">
                                        <select id="id_pasien" name="id_pasien" class="custom-select">
                                            <?php
                                            $sqljenis = "SELECT * FROM pasien";
                                            $rsjenis = $dbh->query($sqljenis);
                                            foreach ($rsjenis as $rowjenis) {
                                                $selected = ($row['id_pasien'] == $rowjenis['id']) ? 'selected' : '';
                                                echo "<option value='" . $rowjenis['id'] . "' $selected>" . $rowjenis['pasien'] . "</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="id_dokter" class="col-4 col-form-label">id dokter</label>
                                    <div class="col-8">
                                        <select id="id_dokter" name="id_dokter" class="custom-select">
                                            <?php
                                            $sqljenis = "SELECT * FROM paramedik";
                                            $rsjenis = $dbh->query($sqljenis);
                                            foreach ($rsjenis as $rowjenis) {
                                                $selected = ($row['id_dokter'] == $rowjenis['id']) ? 'selected' : '';
                                                echo "<option value='" . $rowjenis['id'] . "' $selected>" . $rowjenis['dokter'] . "</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>          
                                <div class="form-group row">
                                    <div class="offset-4 col-8">
                                        <button name="submit" type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            Projek 1 
                        <!-- /.card-footer-->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php
require_once 'footer.php';
?>