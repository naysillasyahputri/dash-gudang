<?php include '../koneksi.php';
$cek = "SELECT * FROM inventory WHERE kuantitas_stok <= 0";
$hasil = mysqli_query($kon, $cek);
$tampilkanAlert = (mysqli_num_rows($hasil) > 0);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NAY</title>
    <link href="../bootstrap.min.css" rel="stylesheet">
    <style>
        .sidebar{
            background-color: purple;
        }
        .nav-link.active {
            background-color: pink; 
        }
        .th , td, tr{
            text-align: center;
        }

       
        .nav-link:hover {
            background-color: pink;
        }

        .tab-content {
            padding-top: 20px;
        }

        footer {
            background-color: #f8f9fa;
            padding: 20px 0;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block sidebar" style="height: 575px;">
                <div class="position-sticky pt-3">
                    <h3 class="text-center text-white py-3 ">Dashboard</h3> 
                    
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active text-white" aria-current="page" href="#inventory" data-bs-toggle="tab">
                                Inventory
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="#storage" data-bs-toggle="tab">
                                Storage
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="#vendor" data-bs-toggle="tab">
                                Vendor
                            </a>
                        </li>
                        <li class="nav-item mt-4">
                            <a class="nav-link text-white" href="../login.php">
                                Logout
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2 text-primary">Dashboard</h1>
                    <form method="get" class="d-flex w-20">
                        <input type="text" class="form-control me-2" name="search" placeholder="Search" value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">
                        <button class="btn btn-sm btn-outline-secondary" type="submit">Search</button>
                    </form>
                </div>

                <div class="tab-content">
                    <div class="tab-pane fade show active" id="inventory">
                        <h2 class="text-secondary">Inventory</h2>
                        <button class="btn btn-sm btn-primary" type="button"><a style="color: #f1f1f1;" href="tambah_inven.php">Tambah</a></button>
                        
                        <br> 
                        <table class="table table-striped table-hover table-bordered">
                            <thead class="table-primary">
                                <tr>
                                    <th>No. </th>
                                    <th>nama barang</th>
                                    <th>jenis barang</th>
                                    <th>harga</th>
                                    <th>kuantitas stok</th>
                                    <th>No. seri</th>
                                    <th>lokasi gudang</th>
                                    <th>nama vendor</th>
                                    <th>opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $search = isset($_GET['search']) ? mysqli_real_escape_string($kon, $_GET['search']) : '';
                                $qry = "SELECT * FROM inventory 
                                        INNER JOIN vendor ON inventory.id_vendor = vendor.id_vendor
                                        INNER JOIN storage_unit ON inventory.id_gudang = storage_unit.id_gudang
                                        WHERE inventory.nama_barang LIKE '%$search%' OR
                                              inventory.jenis_barang LIKE '%$search%' OR
                                              vendor.nama_vendor LIKE '%$search%'";
                                $hsl = mysqli_query($kon,$qry);

                                if(!$hsl){
                                    die("gagal".mysqli_connect_errno($kon).mysqli_connect_error($kon));
                                }
                                while($dt = mysqli_fetch_assoc($hsl)){
                                    echo"<tr>";
                                    echo"<td>$dt[id_barang]</td>";
                                    echo"<td>$dt[nama_barang]</td>";
                                    echo"<td>$dt[jenis_barang]</td>";
                                    echo"<td>$dt[harga]</td>";
                                    echo"<td>$dt[kuantitas_stok]</td>";
                                    echo"<td>$dt[no_seri]</td>";
                                    echo"<td>$dt[lokasi_gudang]</td>";
                                    echo"<td>$dt[nama_vendor]</td>";
                                    echo"<td><button class='btn btn-success'><a style='color:#f1f1f1;'href='update_inven.php?id={$dt['id_barang']}'>Update</a></button>
                                    <button class='btn btn-danger'><a style='color:#f1f1f1;'href='hapus_inven.php?id={$dt['id_barang']}'>Delete</a></button></td>";
                                    echo"</tr>";
                                }
                               ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="storage">
                        <h2 class="text-secondary">Storage</h2> 
                        <button class="btn btn-sm btn-primary" type="button"><a style="color: #f1f1f1;" href="tambah_storag.php">Tambah</a></button>
                        <table class="table table-striped table-hover table-bordered">
                            <thead class="table-warning">
                                <tr>
                                    <th>No. </th>
                                    <th>nama gudang</th>
                                    <th>Lokasi gudang</th>
                                    <th>opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                               <?php
                               $search = isset($_GET['search']) ? mysqli_real_escape_string($kon, $_GET['search']) : '';
                               $qry = "SELECT * FROM storage_unit 
                                       WHERE nama_gudang LIKE '%$search%' OR
                                             lokasi_gudang LIKE '%$search%'";

                               $hsl=mysqli_query($kon,$qry);
                               if(!$hsl){
                                die ("gagal".mysqli_connect_errno($hsl).mysqli_connect_error($hsl));
                               }
                               while($dt = mysqli_fetch_assoc($hsl)){
                                echo "<tr>";
                                echo "<td>$dt[id_gudang]</td>";
                                echo "<td>$dt[nama_gudang]</td>";
                                echo "<td>$dt[lokasi_gudang]</td>";
                                echo"<td><button class='btn btn-success'><a style='color:#f1f1f1;'href='update_storage.php?id={$dt['id_gudang']}'>Update</a></button>
                                <button class='btn btn-danger'><a style='color:#f1f1f1;'href='hapus_storage.php?id={$dt['id_gudang']}'>Delete</a></button></td>";
                               }
                               ?>
                            </tbody>
                        </table>
                    </div>

                    <div class="tab-pane fade" id="vendor">
                        <h2 class="text-secondary">Vendor</h2>
                        <button class="btn btn-sm btn-primary" type="button"><a style="color: #f1f1f1;" href="tambah_vendor.php">Tambah</a></button>
                        <table class="table table-striped table-hover table-bordered">
                            <thead class="table-success"> 
                                <tr>
                                <th>No. </th>
                                <th>nama vendor</th>
                                <th>kontak</th>
                                <th>nama barang</th>
                                <th>opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $search = isset($_GET['search']) ? mysqli_real_escape_string($kon, $_GET['search']) : '';
                                $qry = "SELECT * FROM vendor 
                                        WHERE nama_vendor LIKE '%$search%' OR
                                              kontak_vendor LIKE '%$search%'";
                                $hsl = mysqli_query($kon, $qry);

                                if(!$hsl){
                                    die ("gagal".mysqli_connect_error($kon));
                                }
                                while($dt = mysqli_fetch_assoc($hsl)){
                                    echo"<tr>";
                                    echo"<td>$dt[id_vendor]</td>";
                                    echo"<td>$dt[nama_vendor]</td>";
                                    echo"<td>$dt[kontak_vendor]</td>";
                                    echo"<td>$dt[nama_barang]</td>";
                                    echo"<td><button class='btn btn-success'><a style='color:#f1f1f1;'href='update_vendor.php?id={$dt['id_vendor']}'>Update</a></button>
                                    <button class='btn btn-danger'><a style='color:#f1f1f1;'href='hapus_vendor.php?id={$dt['id_vendor']}'>Delete</a></button></td>";
                                    echo"</tr>";
                                    }
                                    ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </main>
        </div>
    </div>

 <!-- <footer class="text-center text-muted">
        <div class="container">
            <p>&copy; 2024  Company. All Rights Reserved.</p>
        </div>
    </footer> -->
    <!-- Bootstrap JS -->
    <script src="../bootstrap.min.js"></script>
    <?php if ($tampilkanAlert): ?>
        <script>
            alert("Stok Barang Kosong. Harap periksa!");
        </script>
    <?php endif; ?>
</body>
</html>