<?php
include '../koneksi.php'
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tambah Vendor</title>
</head>
<body>
    <form action="proses_tambah_vendor.php" method="post">
        <label for="nama_vendor">nama vendor</label>
        <input type="text" id="nama_vendor" name="nama_vendor" required>
        <br>
        <label for="kontak_vendor">kontak vendor</label>
        <input type="text" id="kontak_vendor" name="kontak_vendor" required>
        <br>
        <label for="nama_barang_vendor">nama barang</label>
        <select id="nama_barang_vendor" name="nama_barang_vendor" required>
            <option></option>
            <?php
            include "../koneksi.php";
            $qry = mysqli_query($kon, "SELECT * FROM inventory");
            while ($data = mysqli_fetch_array($qry)) {
                echo '<option value="'.$data['nama_barang'].'">'.$data['nama_barang'].'</option>';
            }
            ?>
        </select>
        <button type="submit">Tambah vendor</button>
</body>
</html>