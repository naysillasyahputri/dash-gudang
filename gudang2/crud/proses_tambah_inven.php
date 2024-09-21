<?php
if($_POST) {
    $nama_barang = $_POST['nama_barang'];
    $jenis_barang = $_POST['jenis_barang'];
    $harga = $_POST['harga'];
    $kuantitas_stok = $_POST['kuantitas_stok'];
    $no_seri = $_POST['no_seri'];
    $lokasi_gudang = $_POST['id_gudang'];
    $nama_vendor = $_POST['id_vendor'];

    
    // Validasi input
    if(empty($nama_barang) || empty($jenis_barang) || empty($harga) ||empty($kuantitas_stok) || empty($no_seri) || empty($lokasi_gudang) || empty($nama_vendor) ) {
        echo "<script>
                alert('Nama inven tidak boleh kosong');
                location.href='tambah_inven.php';
              </script>";
    } else {
        // Include koneksi ke database
        include '../koneksi.php';
      
        $insert = mysqli_query($kon,"INSERT INTO inventory (nama_barang, jenis_barang, harga, kuantitas_stok, no_seri, id_gudang, id_vendor)
        VALUES ('$nama_barang', '$jenis_barang', '$harga', '$kuantitas_stok', '$no_seri', '$lokasi_gudang', '$nama_vendor')");
        if($insert) {
            echo "<script>
                    alert('Sukses menambahkan inventory');
                    location.href='inven.php';
                  </script>";
        } else {
            echo "<script>
                    alert('Gagal menambahkan inventory');
                    location.href='tambah_inven.php';
                  </script>";
        }
    }
}
?>
