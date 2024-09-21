<?php
include "../koneksi.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_barang = $_POST['id_barang'];
    $nama_barang = $_POST['nama_barang'];
    $jenis_barang = $_POST['jenis_barang'];
    $harga = $_POST['harga'];
    $kuantitas_stok = $_POST['kuantitas_stok'];
    $no_seri = $_POST['no_seri'];
    $lokasi_gudang = $_POST['id_gudang'];
    $nama_vendor = $_POST['id_vendor'];

    $sql = "UPDATE inventory SET
    nama_barang = '$nama_barang',
    jenis_barang = '$jenis_barang',
    harga = '$harga',
    kuantitas_stok = '$kuantitas_stok',
    no_seri = '$no_seri',
    id_gudang = '$lokasi_gudang',
    id_vendor = '$nama_vendor'
    WHERE id_barang = '$id_barang'";

if ($kon->query($sql) === TRUE) {
    echo "<script>alert('Sukses Mengubah Barang Baru');location.href='inven.php';</script>";
    exit(); 
} else {
    echo "Error updating record: " . $con->error;
}

$con->close();
} else {
// Fetch the existing data
$id_barang = $_GET['id'];
$sql = "SELECT * FROM inventory WHERE id_barang='$id_barang'";
$result = $kon->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
} else {
    echo "Record not found!";
    exit(); // Ensure no further code is executed if record is not found
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Inventory</title>
    <link href="../bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h3 class="mb-4">Edit Inventory</h3>
        <form action="update_inven.php" method="post">
            <input type="hidden" name="id_barang" value="<?php echo htmlspecialchars($row['id_barang']); ?>">

            <div class="mb-3">
                <label for="nama_barang" class="form-label">Nama Barang:</label>
                <input type="text" class="form-control" id="nama_barang" name="nama_barang"
                 value="<?php echo htmlspecialchars($row['nama_barang']); ?>">
            </div>

            <div class="mb-3">
                <label for="jenis_barang" class="form-label">Nama Jenis:</label>
                <input type="text" class="form-control" id="jenis_barang" name="jenis_barang"
                 value="<?php echo htmlspecialchars($row['jenis_barang']); ?>">
            </div>

            <div class="mb-3">
                <label for="harga" class="form-label">Harga Barang:</label>
                <input type="text" class="form-control" id="harga" name="harga"
                 value="<?php echo htmlspecialchars($row['harga']); ?>">
            </div>

            <div class="mb-3">
                <label for="kuantitas_stok" class="form-label">Jumlah Stok:</label>
                <input type="text" class="form-control" id="kuantitas_stok" name="kuantitas_stok"
                 value="<?php echo htmlspecialchars($row['kuantitas_stok']); ?>">
            </div>

            <div class="mb-3">
                <label for="no_seri" class="form-label">Barcode:</label>
                <input type="text" class="form-control" id="no_seri" name="no_seri"
                 value="<?php echo htmlspecialchars($row['no_seri']); ?>">
            </div>

            <div class="mb-3">
                <label for="id_gudang" class="form-label">Lokasi Gudang:</label>
                <?php
                include "../koneksi.php";
                
                // Ambil nilai id_gudang yang sudah ada sebelumnya
                $id_gudang_terpilih = htmlspecialchars($row['id_gudang']);
                
                // Ambil data dari tabel storage
                $query = mysqli_query($kon, "SELECT * FROM storage_unit");
                ?>
                <select name="id_gudang" class="form-select">
                    <option value="" disabled>Pilih Lokasi Gudang</option>
                    <?php
                    while ($data = mysqli_fetch_array($query)) {
                        // Tentukan apakah opsi ini seharusnya dipilih
                        $selected = ($data['id_gudang'] == $id_gudang_terpilih) ? 'selected' : '';
                        echo '<option value="'.$data['id_gudang'].'" '.$selected.'>'.$data['lokasi_gudang'].'</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="id_vendor" class="form-label">Nama Vendor:</label>
                <?php
                // Ambil nilai id_vendor yang sudah ada sebelumnya
                $id_vendor_terpilih = htmlspecialchars($row['id_vendor']);
                
                // Ambil data dari tabel vendor
                $query = mysqli_query($kon, "SELECT * FROM vendor");
                ?>
                <select name="id_vendor" class="form-select">
                    <option value="" disabled>Pilih Nama Vendor</option>
                    <?php
                    while ($data = mysqli_fetch_array($query)) {
                        // Tentukan apakah opsi ini seharusnya dipilih
                        $selected = ($data['id_vendor'] == $id_vendor_terpilih) ? 'selected' : '';
                        echo '<option value="'.$data['id_vendor'].'" '.$selected.'>'.$data['nama_vendor'].'</option>';
                    }
                    ?>
                </select>
            </div>

            <button type="submit" class="btn btn-primary" name="submit">Edit</button>
        </form>
    </div>
    <script src="../bootstrap.bundle.min.js"></script>
</body>
</html>
