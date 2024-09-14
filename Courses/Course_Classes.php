<?php 
//menambahan file koneksi.php yang berisi pengaturan koneksi database
include('koneksi.php');

//instansiasi class Courses_Classes
$db = new Course_Classes();

//mengambil data dari tabel courses_classes
$database = $db->tampil_data();
?>

<!-- Membuat tampilan HTML -->
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
        	<!-- Tab untuk Course -->
        	<a class="nav-link" id="course-tab" href="Course.php" role="tab" aria-controls="course-tab-pane" aria-selected="true">Course</a>
      		</li>
      		<li class="nav-item" role="presentation">
        	<!-- Tab untuk Course_Classes -->
        	<a class="nav-link active" id="Course_Classes-tab" href="Course_Classes.php" role="tab" aria-controls="Course_Classes-tab-pane" aria-selected="false">Course Classes</a>
    	</ul>
  	</div>
</nav>

<!-- Konten Tab -->
<div class="tab-content" id="nav-tabContent">
	<!-- Konten Tab Course_Classes -->
  	<div class="tab-pane fade show active" id="nav-Course" role="tabpanel" aria-labelledby="nav-Course_Classes-tab" tabindex="0">
    	<!-- Konten untuk tab Course_Classes -->
    	<div class="container mt-4">
        <!-- Tabel dengan kelas table dan table-hover untuk tampilan tabel yang interaktif -->
        <table class="table table-hover table-bordered">
			<!-- Judul Tabel -->
            <thead>
                <tr>
                    <th>No</th> 
                    <th>ID</th>
                    <th>Class Student</th>
                    <th>Course ID</th> 
                    <th>Deleted_at</th> 
                    <th>Created_at</th> 
                    <th>Updated_at</th> 
                </tr>
            </thead>
			<!-- Isi Tabel -->
            <tbody>
            <?php 
            //inisialisasi nomor urut untuk tabel
            $no = 1;
            //memanggil fungsi tampil_data dan menampilkannya dalam tabel
            foreach($database as $row){ ?>
                <tr>
                    <td><?php echo $no++; ?></td> 
                    <td><?php echo $row['id']; ?></td> 
                    <td><?php echo $row['student_class_id']; ?></td> 
                    <td><?php echo $row['course_id']; ?></td> 
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
