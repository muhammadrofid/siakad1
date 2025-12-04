<?php
require_once "../config.php";

// Inisialisasi variabel pencarian
$keyword = isset($_POST['keyword']) ? $_POST['keyword'] : '';
$category = isset($_POST['category']) ? $_POST['category'] : 'nim';
$nomor = 0;

// Query dasar
$sql = "SELECT * FROM mhs";

// Proses pencarian jika tombol cari ditekan
if (isset($_POST["tombolcari"])) {
    if (!empty($keyword) && !empty($category)) {
        if ($category == "prodi") {
            // Konversi kode prodi ke angka
            if (strtoupper($keyword) == "INF") {
                $prodi = 1;
            } elseif (strtoupper($keyword) == "ARS") {
                $prodi = 2;
            } elseif (strtoupper($keyword) == "ILK") {
                $prodi = 3;
            } else {
                $prodi = 0; // Jika tidak ditemukan
            }
            $sql = "SELECT * FROM mhs WHERE $category = '$prodi'";
        } else {
            $sql = "SELECT * FROM mhs WHERE $category LIKE '%$keyword%'";
        }
    }
}

// Eksekusi query
$hasil = $db->query($sql);
?>

<main class="app-main">
    <!-- Header -->
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Data Mahasiswa</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Data Mahasiswa</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <!-- Konten -->
    <div class="app-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card mt-4">
                        <div class="card-header">
                            <h3 class="card-title">Data Mahasiswa</h3>
                        </div>
                        
                        <div class="card-body">
                            <!-- Form Pencarian -->
                            <div class="col-lg-12 col-md-12 col-sm-12 mb-4">
                                <div class="table-responsive">
                                    <form method="post" action="#">
                                        <table>
                                            <tr>
                                                <td>
                                                    <a href="./?p=add-mhs" class="btn btn-primary" style="width: 80px">+ Add</a>
                                                </td>
                                                <td width="10"></td>
                                                <td>
                                                    <input type="text" name="keyword" class="form-control" 
                                                           placeholder="Masukkan kata kunci..." 
                                                           style="width: 200px" 
                                                           value="<?php echo htmlspecialchars($keyword); ?>">
                                                </td>
                                                <td>
                                                    <select name="category" class="form-control" style="width: 150px">
                                                        <option value="nim" <?php if($category=="nim") echo "selected"; ?>>NIM</option>
                                                        <option value="nama" <?php if($category=="nama") echo "selected"; ?>>Nama</option>
                                                        <option value="gender" <?php if($category=="gender") echo "selected"; ?>>Jenis Kelamin</option>
                                                        <option value="prodi" <?php if($category=="prodi") echo "selected"; ?>>Prodi</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <input type="submit" class="btn btn-secondary" value="Cari" name="tombolcari">
                                                </td>
                                            </tr>
                                        </table>
                                    </form>
                                </div>
                            </div>

                            <!-- Tabel Data Mahasiswa -->
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>NIM</th>
                                        <th>Nama Mahasiswa</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Prodi</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if ($hasil->num_rows > 0) {
                                        while ($d = $hasil->fetch_assoc()) {
                                            $nomor++;
                                            
                                            // Konversi kode prodi ke string
                                            if ($d['prodi'] == 1) {
                                                $prodi = "INF";
                                            } elseif ($d['prodi'] == 2) {
                                                $prodi = "ARS";
                                            } elseif ($d['prodi'] == 3) {
                                                $prodi = "ILK";
                                            } else {
                                                $prodi = "Unknown";
                                            }
                                            
                                            echo "<tr>
                                                    <td>$nomor</td>
                                                    <td>" . htmlspecialchars($d['nim']) . "</td>
                                                    <td>" . htmlspecialchars($d['nama']) . "</td>
                                                    <td>" . htmlspecialchars($d['gender']) . "</td>
                                                    <td>$prodi</td>
                                                    <td>
                                                        <a href='./?p=detail-mhs&id=" . $d['id'] . "' class='btn btn-xs btn-info'>Detail</a>
                                                        <a href='./?p=edit-mhs&id=" . $d['id'] . "' class='btn btn-xs btn-warning'>Edit</a>
                                                        <a href='./?p=hapus-mhs&id=" . $d['id'] . "' 
                                                           class='btn btn-xs btn-danger'
                                                           onclick=\"return confirm('Apakah data akan dihapus?')\">Hapus</a>
                                                    </td>
                                                  </tr>";
                                        }
                                    } else {
                                        echo "<tr><td colspan='6' class='text-center'>Tidak ada data mahasiswa</td></tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div> <!-- end card-body -->
                    </div> <!-- end card -->
                </div> <!-- end col -->
            </div> <!-- end row -->
        </div> <!-- end container-fluid -->
    </div> <!-- end app-content -->
</main>