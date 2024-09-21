<?php
include "../koneksi.php";
    $id_vendor = $_GET['id'];

    $sql = "DELETE FROM vendor WHERE id_vendor='$id_vendor'";
    
    if ($kon ->query($sql) === TRUE) {
        echo "Data Berhasil Dihapus";
        header("Location: inven.php");
    } else {
        echo "Error updating record: " . $kon->error;
    }

    $kon->close();
?>
