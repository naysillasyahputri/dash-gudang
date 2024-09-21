<?php
include '../koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>storage unit</title>
</head>
<body>
    <form action="proses_tambah_storag.php"  method="post">
    <label for="nama_gudang">nama gudang</label>
        <input type="text" id="nama_gudang" name="nama_gudang" required>
        <br>
    <label for="lokasi_gudang">lokasi gudang</label>
        <input type="text" id="lokasi_gudang" name="lokasi_gudang" required>
        <br>
        <button type="submit">tambah gudang</button>
    </form>

    
</body>
</html>