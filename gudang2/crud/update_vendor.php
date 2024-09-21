<?php
include "../koneksi.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_vendor = $_POST['id_vendor'];
    $nama = $_POST['nama_vendor'];
    $kontak = $_POST['kontak_vendor'];
    $nama_barang = $_POST['nama_barang'];
    
        $sql = "UPDATE vendor SET nama_vendor='$nama', kontak_vendor='$kontak', nama_barang='$nama_barang' WHERE id_vendor='$id_vendor'";
    
        if ($kon ->query($sql) === TRUE) {
            echo "<script>alert('Sukses Mengubah Vendor Baru');location.href='inven.php';</script>";
        } else {
            echo "Error updating record: " . $kon->error;
        }
    
        $kon->close();
     } else {
        $id_vendor = $_GET['id'];
        $sql = "SELECT * FROM vendor WHERE id_vendor='$id_vendor'";
        $result = $kon->query($sql);
    
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
        } else {
            echo "Record not found!";
        }
     }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Vendor</title>
    <link href="../bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h3 class="mb-4">Edit Vendor</h3>
        <form action="update_vendor.php" method="post">
            <input type="hidden" name="id_vendor" value="<?php echo htmlspecialchars($row['id_vendor']); ?>">
            <div class="mb-3">
                <label for="nama_vendor" class="form-label">Nama Vendor:</label>
                <input type="text" class="form-control" id="nama_vendor" name="nama_vendor" value="<?php echo htmlspecialchars($row['nama_vendor']); ?>">
            </div>
            <div class="mb-3">
                <label for="kontak_vendor" class="form-label">Kontak:</label>
                <input type="text" class="form-control" id="kontak_vendor" name="kontak_vendor" value="<?php echo htmlspecialchars($row['kontak_vendor']); ?>">
            </div>
            <div class="mb-3">
                <label for="nama_barang" class="form-label">Nama Barang:</label>
                <input type="text" class="form-control" id="nama_barang" name="nama_barang" value="<?php echo htmlspecialchars($row['nama_barang']); ?>">
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Edit</button>
        </form>
    </div>
    <script src="../aset/bootstrap.bundle.min.js"></script>
</body>
</html>