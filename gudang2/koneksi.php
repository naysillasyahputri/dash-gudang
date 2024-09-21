<?php
$kon = mysqli_connect("localhost","root","","gudang");

if(!$kon){
    die ("koneksi gagal". mysqli_connect_error(). mysqli_connect_error());
}

?>