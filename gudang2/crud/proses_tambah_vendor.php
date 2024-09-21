<?php
if($_POST) {
    $nama_vendor = $_POST['nama_vendor'];
    $kontak_vendor = $_POST['kontak_vendor'];
    $nama_barang = $_POST['nama_barang_vendor'];

    
    // Validasi input
    if(empty($nama_vendor) || empty($kontak_vendor) || empty($nama_barang)) {
        echo "<script>
                alert('Nama vendor tidak boleh kosong');
                location.href='tambah_vendor.php';
              </script>";
    } else {
        // Include koneksi ke database
        include '../koneksi.php';
      
        $insert = mysqli_query($kon,"INSERT INTO vendor (nama_vendor, kontak_vendor, nama_barang_vendor) VALUES ('$nama_vendor', '$kontak_vendor', '$nama_barang')");
        if($insert) {
            echo "<script>
                    alert('Sukses menambahkan vendor');
                    location.href='inven.php';
                  </script>";
        } else {
            echo "<script>
                    alert('Gagal menambahkan inventory');
                    location.href='tambah_vendor.php';
                  </script>";
        }
    }
}
?>
