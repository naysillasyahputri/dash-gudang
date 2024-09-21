<?php
if($_POST){
    $nama_gudang = $_POST['nama_gudang'];
    $lokasi_gudang = $_POST['lokasi_gudang'];

    if(empty($nama_gudang) || empty($lokasi_gudang))
    { 
        echo "<script>
        alert('nama storage tidak boleh kosong');location.href='tambah_storag.php';</script>";
    } else {
        include '../koneksi.php';

        $insert = mysqli_query($kon,"INSERT INTO storage_unit (nama_gudang, lokasi_gudang) VALUES ('$nama_gudang','$lokasi_gudang')");
        if($insert) {
            echo "<script>
                    alert('Sukses menambahkan storage');
                    location.href='inven.php';
                  </script>";
        } else {
            echo "<script>
                    alert('Gagal menambahkan storage');
                    location.href='tambah_storag.php';
                  </script>";
        }
    }
}