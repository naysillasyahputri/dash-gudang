<?php
include '../koneksi.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href=".../bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="login_container">
      <form action="proses_tambah_inven.php" method="post">
        <h1>Form Tambah Inventory</h1>
        <div class="mb-3">
                <label for="id_vendor" class="form-label">Nama Vendor:</label>
                <select name="id_vendor" class="form-select" id="id_vendor">
                    <option value="" disabled selected>Pilih Nama Vendor</option>
                    <?php
                    include "koneksi.php";
                    $query = mysqli_query($kon, "SELECT * FROM vendor");
                    while ($data = mysqli_fetch_array($query)) {
                        echo '<option value="' . $data['id_vendor'] . '">' . $data['nama_vendor'] . '</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="nama_barang" class="form-label">Nama Barang Vendor:</label>
                <input type="text" class="form-control" id="nama_barang" name="nama_barang" readonly>
            </div>
        <label class="inven">Jenis Barang</label><br>
        <input type="text" name="jenis_barang" placeholder="Jenis_barang" required>
        <br><br>
        <label class="inven">harga Barang</label><br>
        <input type="text" name="harga" placeholder="harga" required>
        <br><br>
        <label class="inven">Kuantitas stok</label><br>
        <input type="text" name="kuantitas_stok" placeholder="Kuantitas_stok" required>
        <br><br>
        <label class="inven">Serial Number</label><br>
        <input type="number" name="no_seri" placeholder=no_seri" required>
        <br><br>
        <label class="inven">Lokasi Gudang</label><br>
        <select name="id_gudang">
            <option value=""></option>
            <?php 
            include "../koneksi.php";
            $sql = "SELECT * FROM storage_unit";
            $hsl = mysqli_query($kon, $sql);

            if($hsl -> num_rows > 0 ){
                while($data = mysqli_fetch_assoc($hsl)){
                    echo "<option value='{$data['id_gudang']}'>{$data['lokasi_gudang']}</option>";
                }
            }
            ?>
        </select><br><br>
        
       
        <button>Tambah Data</button>
      </form>
    </div>
    <script src="../bootstrap.min.js"></script>
    <script>
        document.getElementById('id_vendor').addEventListener('change', function() {
            var id_vendor = this.value;
            var xhr = new XMLHttpRequest();
            xhr.open('GET', 'get_barang.php?id_vendor=' + id_vendor, true);
            xhr.onload = function() {
                if (this.status == 200) {
                    var response = JSON.parse(this.responseText);
                    document.getElementById('nama_barang').value = response.nama_barang; // Mengisi input nama_barang
                }
            };
            xhr.send();
        });
    </script>
</body>
</html>