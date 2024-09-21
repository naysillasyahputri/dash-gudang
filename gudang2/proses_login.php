<?php
include 'koneksi.php';
if (isset($_POST['login'])){
$username = htmlentities(trim($_POST['username']));
$password = htmlentities(trim($_POST['password']));
$data =  mysqli_query($con, "SELECT * FROM where username ='$username' and password = '$password'");
$hitung =  mysqli_num_rows($data);

if ($hitung > 0){
    //jika data ada
    $ambildata = mysqli_fetch_array($data);
    $role = $ambildata['level'];

    if($role =='admin'){
        //jika admin
        $_SESSION['log'] = 'Logged';
        $_SESSION['level'] = 'admin';
        header('location:admin');
    } else{
    //jika user
    $_SESSION['log'] = 'Logged';
    $_SESSION['level'] = 'user';
    header('location:user');
}
}
}
?>