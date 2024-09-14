<?php 
// Menyertakan file koneksi.php yang berisi pengaturan koneksi database
include('koneksi.php');

// Membuat objek dari kelas Courses
// Mengambil data kursus dari metode tampil_data() di dalam kelas Courses
$db = new Course_Classes();
$database = $db->tampil_data();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Data</title>
    <!-- Memuat CSS Bootstrap dari CDN untuk styling halaman -->
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
    
    <!-- Tab Navigasi dengan link ke halaman-halaman terkait -->
    <ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
      <li class="nav-item" role="presentation">
        <!-- Tab untuk halaman Kursus -->
        <a class="nav-link" id="course-tab" href="Course.php" role="tab" aria-controls="course-tab-pane" aria-selected="true">Course</a>
      </li>
      <li class="nav-item" role="presentation">
        <!-- Tab untuk halaman Kelas Kursus -->
        <a class="nav-link active" id="Course_Classes-tab" href="Course_Classes.php" role="tab" aria-controls="Course_Classes-tab-pane" aria-selected="false">Course Classes</a>
    </ul>
  </div>
</nav>

<!-- Konten Tab -->
<div class="tab-content" id="nav-tabContent">
  <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab" tabindex="0">
    <!-- Konten untuk tab Home yang berisi tabel data kursus -->
    <div class="container mt-4">
        <!-- Tabel dengan kelas table dan table-hover untuk tampilan tabel yang interaktif -->
        <table class="table table-hover table-bordered">
            <thead>
                <tr>
                    <th>No</th> <!-- Kolom nomor urut -->
                    <th>ID</th> <!-- Kolom ID kursus -->
                    <th>Class Student</th> <!-- Kolom ID kelas siswa -->
                    <th>Course ID</th> <!-- Kolom ID kursus -->
                    <th>Deleted_at</th> <!-- Kolom waktu penghapusan -->
                    <th>Created_at</th> <!-- Kolom waktu pembuatan -->
                    <th>Updated_at</th> <!-- Kolom waktu pembaruan -->
                </tr>
            </thead>
            <tbody>
            <?php 
            // Menginisialisasi nomor urut untuk tabel
            $no = 1;
            // Melakukan iterasi pada setiap baris data kursus dan menampilkannya dalam tabel
            foreach($database as $row){ ?>
                <tr>
                    <td><?php echo $no++; ?></td> <!-- Menampilkan nomor urut baris -->
                    <td><?php echo $row['id']; ?></td> <!-- Menampilkan ID kursus -->
                    <td><?php echo $row['student_class_id']; ?></td> <!-- Menampilkan ID kelas siswa -->
                    <td><?php echo $row['course_id']; ?></td> <!-- Menampilkan ID kursus -->
                    <td><?php echo $row['deleted_at']; ?></td> <!-- Menampilkan waktu penghapusan -->
                    <td><?php echo $row['created_at']; ?></td> <!-- Menampilkan waktu pembuatan -->
                    <td><?php echo $row['updated_at']; ?></td> <!-- Menampilkan waktu pembaruan -->
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
  </div>
</div>

<!-- Memuat JS Bootstrap dari CDN untuk fungsionalitas interaktif -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
