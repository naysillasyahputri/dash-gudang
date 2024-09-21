<?php
include "../koneksi.php";
    $id_gudang = $_GET['id'];

    $sql = "DELETE FROM storage_unit WHERE id_gudang='$id_gudang'";
    
    if ($kon ->query($sql) === TRUE) {
        echo "Data Berhasil Dihapus";
        header("Location: inven.php");
    } else {
        echo "Error updating record: " . $kon->error;
    }

    $kon->close();
?>
