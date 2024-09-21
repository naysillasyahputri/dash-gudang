<?php
include "../koneksi.php";

if(isset($_GET['id'])){
    $id_barang = $_GET['id'];

    $sql = "DELETE FROM inventory WHERE id_barang = '$id_barang'";
    $hsl = mysqli_query($kon, $sql);

    if($hsl){
        echo "<script>
        alert('Data berhasil dihapus');
        location.href = 'inven.php';
        </script>";
    } else {
        echo "<script>
        alert('Gagal menghapus data: " . mysqli_error($kon) . "');
        location.href = 'inven.php';
        </script>";
    }
} else {
    echo "<script>
    alert('ID tidak ditemukan');
    location.href = 'inven.php';
    </script>";
}
?>
