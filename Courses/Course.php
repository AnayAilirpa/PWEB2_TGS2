<?php 
// Menyertakan file koneksi.php yang berisi pengaturan koneksi database
include('koneksi.php');

// Membuat objek dari kelas Courses dan mengambil data kursus
$db = new Courses();
$database = $db->tampil_data();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Data</title>
    <!-- Memuat CSS Bootstrap dari CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .navbar-title {
            font-size: 1.5rem; /* Mengatur ukuran font judul navbar */
            font-weight: bold; /* Mengatur ketebalan font judul navbar */
            text-align: center; /* Mengatur agar teks berada di tengah */
            padding: 1rem; /* Menambahkan padding untuk jarak */
            border-bottom: 2px solid #bbb; /* Menambahkan border bawah untuk judul navbar */
        }
    </style>
</head>
<body>

<!-- Navigasi Tab -->
<nav class="navbar">
  <div class="container">
    <!-- Judul Navbar -->
    <div class="navbar-title">Courses Management</div>
    
    <!-- Tab Navigasi -->
    <ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
      <li class="nav-item" role="presentation">
        <!-- Tab untuk Kursus -->
        <a class="nav-link active" id="course-tab" href="Course.php" role="tab" aria-controls="course-tab-pane" aria-selected="true">Course</a>
      </li>
      <li class="nav-item" role="presentation">
        <!-- Tab untuk Kelas Kursus -->
        <a class="nav-link" id="Course_Classes-tab" href="Course_Classes.php" role="tab" aria-controls="Course_Classes-tab-pane" aria-selected="false">Course Classes</a>
    </ul>
  </div>
</nav>

<!-- Konten Tab -->
<div class="tab-content" id="nav-tabContent">
  <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab" tabindex="0">
    <!-- Konten untuk tab Home -->
    <div class="container mt-4">
        <!-- Tabel dengan kelas table dan table-hover untuk tampilan tabel yang interaktif -->
        <table class="table table-hover table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>ID</th>
                    <th>Code</th>
                    <th>Name</th>
                    <th>SKS</th>
                    <th>Hours</th>
                    <th>Meeting</th>
                    <th>Deleted_at</th>
                    <th>Created_at</th>
                    <th>Updated_at</th>
                </tr>
            </thead>
            <tbody>
            <?php 
            // Menginisialisasi nomor urut untuk tabel
            $no = 1;
            // Melakukan iterasi pada setiap baris data kursus dan menampilkannya dalam tabel
            foreach($database as $row){ ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['code']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['sks']; ?></td>
                    <td><?php echo $row['hours']; ?></td>
                    <td><?php echo $row['meeting']; ?></td>
                    <td><?php echo $row['deleted_at']; ?></td>
                    <td><?php echo $row['created_at']; ?></td>
                    <td><?php echo $row['updated_at']; ?></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
  </div>
</div>
</body>
</html>
