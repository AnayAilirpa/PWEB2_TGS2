# Courses

## Implementasi Prinsip OOP dalam PHP
Tugas ini bertujuan untuk mengimplementasikan berbagai prinsip Object-Oriented Programming (OOP) dan teknik pemrograman yang efisien dalam PHP. Dengan menyelesaikan tugas-tugas berikut:
1. Buatlah sebuah **tampilan berbasis OOP**, dengan mengambil data dari basis data MySQL.
2. Gunakan **metode `__construct`** sebagai penghubung ke basis data.
3. Terapkan **enkapsulasi** sesuai dengan logika studi kasus.
4. Buatlah kelas turunan menggunakan konsep **pewarisan**.
5. Terapkan **polimorfisme** untuk setidaknya dua peran sesuai dengan studi kasus.

# Penjabaran

### 1. Membuat Tampilan Berbasis OOP
Membuat tampilan berbasis OOP melibatkan penggunaan prinsip-prinsip Object-Oriented Programming (OOP) untuk merancang dan mengelola tampilan dalam aplikasi. Dalam konteks ini, tampilan merujuk pada bagian dari aplikasi yang menampilkan data kepada pengguna. Pendekatan berbasis OOP memungkinkan kita untuk menyusun kode secara lebih modular, terstruktur, dan mudah dipelihara.

Berikut adalah program dalam file Koneksi.php yang berfungsi untuk memanggil data dari database `Course`.
```php
<?php 
//membuat class Courses
class Courses {
	//membuat atribut
    	private $host = "localhost";
	private $username = "root";
	private $password = "";
	private $database = "course";
	protected $koneksi = "";
	
	//inisialisasi koneksi untuk melakukan koneksi ke database
	public function __construct(){
		$this->koneksi = mysqli_connect($this->host, $this->username, $this->password, $this->database);
		if (mysqli_connect_errno()){
			echo "Koneksi database gagal : " . mysqli_connect_error();
		}
	}

	//membuat method tampil_data untuk menampilkan data dari tabel courses
    	public function tampil_data()
	{
		$hasil = []; 
		$data = mysqli_query($this->koneksi,"SELECT * FROM courses");
		while($row = mysqli_fetch_array($data)){
			$hasil[] = $row;
		}
		return $hasil;
	}
}

//membuat class Course_Classes dari kelas Courses
class Course_Classes extends Courses {

	//tidak perlu membuat method __construct, karena class Course_Classes merupakan turunan dari class Courses

	//membuat method tampil_data untuk menampilkan data dari tabel Course_Classes
    	public function tampil_data()
	{
		$hasil = []; 
		$data = mysqli_query($this->koneksi,"SELECT * FROM Course_Classes");
		while($row = mysqli_fetch_array($data)){
			$hasil[] = $row;
		}
		return $hasil;
	}
}
?>
```

> Dalam Program di atas, terdapat method `tampil_data()` pada class `Courses` dan juga pada class `Course_Class` yang berfungsi untuk menampilkan data dari masing-masing tabel yang dipanggil pada database `Course`.

Berikut adalah program dalam file Course.php yang bertugas untuk menampilkan tabel Course 
```php
<?php 
//menambahan file koneksi.php yang berisi pengaturan koneksi database
include('koneksi.php');

//instansiasi class Courses
$db = new Courses();

//mengambil data dari tabel courses
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
        	<a class="nav-link active" id="course-tab" href="Course.php" role="tab" aria-controls="course-tab-pane" aria-selected="true">Course</a>
      		</li>
      		<li class="nav-item" role="presentation">
        	<!-- Tab untuk Course_Classes -->
        	<a class="nav-link" id="Course_Classes-tab" href="Course_Classes.php" role="tab" aria-controls="Course_Classes-tab-pane" aria-selected="false">Course Classes</a>
    	</ul>
  	</div>
</nav>

<!-- Konten Tab -->
<div class="tab-content" id="nav-tabContent">
	<!-- Konten Tab Course -->
  	<div class="tab-pane fade show active" id="nav-Course" role="tabpanel" aria-labelledby="nav-Course-tab" tabindex="0">
    	<!-- Konten untuk tab Course -->
    	<div class="container mt-4">
        <!-- Tabel dengan kelas table dan table-hover untuk tampilan tabel yang interaktif -->
        <table class="table table-hover table-bordered">
	    <!-- Judul Tabel -->
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
```
> Dalam prorgam di atas, pemanggilan method `tampil_data()` dari class `Courses` dilakukan dengan PHP. Untuk tampilannya, Saya menggunakan HTML dan Bootstrap dengan sedikit CSS untuk mengatur judul navbar.

Output dari Course.php
![image](https://github.com/user-attachments/assets/87e11ee9-31eb-445a-91fc-b42567bbe16c)

Berikut adalah program dalam file Course_Classes.php yang bertugas untuk menampilkan tabel Course 
```php
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
```
> Dalam prorgam di atas, pemanggilan method `tampil_data()` dari class `Course_Classes` dilakukan dengan PHP. Untuk tampilannya, Saya menggunakan HTML dan Bootstrap dengan sedikit CSS untuk mengatur judul navbar.

Output dari Course.php
![image](https://github.com/user-attachments/assets/84bb4233-a875-4a69-bb94-738cbda37d11)

### 2. Menggunakan _Method_ `__construct`
Metode `__construct` dalam PHP adalah konstruktor kelas yang secara otomatis dipanggil saat sebuah objek dibuat. Dalam tugas ini, metode `__construct` digunakan untuk menginisialisasi koneksi ke database MySQL untuk memastikan bahwa koneksi tersedia dan siap digunakan setiap kali objek dari kelas yang bersangkutan dibuat.

Dalam file Koneksi.php sudah terdapat method `__construct`.
```php
//membuat class Courses
class Courses {
	//membuat atribut
  private $host = "localhost";
	private $username = "root";
	private $password = "";
	private $database = "course";
	protected $koneksi = "";

	//inisialisasi koneksi untuk melakukan koneksi ke database
	public function __construct(){
		$this->koneksi = mysqli_connect($this->host, $this->username, $this->password, $this->database);
		if (mysqli_connect_errno()){
			echo "Koneksi database gagal : " . mysqli_connect_error();
		}
	}
...
}
```
> Method `__construct` dalam file ini berisi program untuk menghubungkan koneksi dengan database `Course` yang berisi tabel `Courses` dan tabel `Course_Classes`. 

### 3. Menerapkan _Encapsulation_
 _Encapsulation_ adalah prinsip dasar dalam _Object-Oriented Programming_ (OOP) yang bertujuan untuk melindungi data dan metode dalam suatu kelas dari akses langsung yang tidak diinginkan. Dengan menerapkan enkapsulasi, data dalam class hanya dapat diakses atau dimodifikasi melalui method yang telah ditentukan, sehingga meningkatkan keamanan dan integritas data.

Dalam file Koneksi.php terdapat lima _attribute_ dengan akses `private` dan `protected`.
```php
//membuat class Courses
class Courses {
	//membuat atribut
  private $host = "localhost";
	private $username = "root";
	private $password = "";
	private $database = "course";
	protected $koneksi = "";

	//inisialisasi koneksi untuk melakukan koneksi ke database
	public function __construct(){
		$this->koneksi = mysqli_connect($this->host, $this->username, $this->password, $this->database);
		if (mysqli_connect_errno()){
			echo "Koneksi database gagal : " . mysqli_connect_error();
		}
	}
...
}
```
> Attribut `host`, `username`, `password`, dan `database` dalam class `Courses` dideklarasikan sebagai private dengan tujuan agar tidak dapat diakses oleh kelas turunan maupun kelas lain. Sedangkan, attribut `koneksi` (atau bisa dikatakan property) dideklarasikan sebagai `protected` dengan tujuan agar dapat diwariskan sehingga kelas turunan tidak perlu membuat attribut dan menginisiasikan method `__construct(` lagi untuk terhubung dengan database MySQL.

### 4. Membuat Kelas Turunan dengan _Inheritance_ 
Inheritance adalah konsep dasar dalam _Object-Oriented Programming_ (OOP) yang memungkinkan Anda untuk membuat kelas baru (_class child_) yang mewarisi sifat dan perilaku dari kelas yang sudah ada (_class parent_). Dengan menggunakan pewarisan, Anda dapat mendefinisikan _class parent_ dengan properti dan metode, kemudian memperluas atau mengubah fungsionalitas di dalam kelas turunan.

Dalam file Koneksi.php terdapat satu _class parent_ yaitu class `Courses` dan _class child_ atau kelas turunan yaitu `Course_Classes`.
```php
//membuat class Courses
class Courses {
	//membuat atribut
  private $host = "localhost";
	private $username = "root";
	private $password = "";
	private $database = "course";
	protected $koneksi = "";
	
	//inisialisasi koneksi untuk melakukan koneksi ke database
	public function __construct(){
		$this->koneksi = mysqli_connect($this->host, $this->username, $this->password, $this->database);
		if (mysqli_connect_errno()){
			echo "Koneksi database gagal : " . mysqli_connect_error();
		}
	}
...
}

//membuat class Course_Classes dari kelas Courses
class Course_Classes extends Courses {
	//tidak perlu membuat method __construct, karena class Course_Classes merupakan turunan dari class Courses
...
}
```
> Dapat dilihat, pada kelas turunan `Course_Classes` tidak perlu menginisialisasikan method `__construct()` lagi untuk menghubungkan dengan database MySQL karena class `Course_Classes` merupakan kelas turunan yang pastinya mewarisi baik method maupun property, kecuali jika di-set akses `private`. Jika method atau property dideklarasikan sebagai `private` maka kelas turunan tidak bisa langsung mengaksesnya, diperlukan method yang di-set akses `public` atau `protected` untuk mengaksesnya.

### 5. Menerapkan _Polymorphism_ 
Polymorphism adalah konsep dasar dalam _Object-Oriented Programming_ (OOP) yang memungkinkan objek dari berbagai kelas untuk diakses melalui antarmuka atau kelas dasar yang sama. Konsep ini mendukung fleksibilitas dan ekspansi kode, memungkinkan Anda untuk menggunakan objek dengan cara yang konsisten meskipun mereka berasal dari kelas yang berbeda.

Dalam file Koneksi.php terdapat dua method dengan nama yang sama, yaitu `tampil_data()`.
```php
	//membuat method tampil_data untuk menampilkan data dari tabel courses
    public function tampil_data()
	{
		$hasil = []; 
		$data = mysqli_query($this->koneksi,"SELECT * FROM courses");
		while($row = mysqli_fetch_array($data)){
			$hasil[] = $row;
		}
		return $hasil;
	}

```
> Method `tampil_data()` di atas adalah method yang berada dalam class `Courses`, sedangkan Method `tampil_data()` di bawah adalah method yang berada dalam class `Course_Classes`. Keduanya merupakan method yang sama, karena method pada class `Course_Classes` merupakan hasil pewarisan dari class `Courses`. Akan tetapi, dilakukan sedikit modifikasi sehingga akan menampilkan output yang berbeda saat masing masing method dalam kelas-kelas tersebut dipanggil.
```php
	//membuat method tampil_data untuk menampilkan data dari tabel Course_Classes
    public function tampil_data()
	{
		$hasil = []; 
		$data = mysqli_query($this->koneksi,"SELECT * FROM Course_Classes");
		while($row = mysqli_fetch_array($data)){
			$hasil[] = $row;
		}
		return $hasil;
	}
```

Method `tampil_data()` dalam class `Courses` dipanggil dalam file Course.php. Dan Method `tampil_data()` dalam class `Course_Classes` dipanggil dalam file Course_Classes.php. Keduanya memiliki output yang berbeda walaupun diambil dari nama method yang sama.
```php
<?php 
//menambahan file koneksi.php yang berisi pengaturan koneksi database
include('koneksi.php');

//instansiasi class Courses
$db = new Courses();

//mengambil data dari tabel courses
$database = $db->tampil_data();
?>
```
> Kode program di atas adalah kode program php dalam file Course.php, sedangkan kode program di bawah adalah kode program php dalam file Course_Classes.php. Lihatlah, keduanya memanggil method yang sama. Yang membedakan hanya saat instansiasi, masing masing program menginisiasi class yang berbeda yang atas menginstansiasi class `Courses` sehingga output yang keluar adalah data dari tabel **Course**. Sedangkan kode program di bawah ini menginstansiasi class `Course_Classes` sehingga output yang keluar adalah data dari tabel **Course_Classes**
```php
<?php 
//menambahan file koneksi.php yang berisi pengaturan koneksi database
include('koneksi.php');

//instansiasi class Courses_Classes
$db = new Course_Classes();

//mengambil data dari tabel courses_classes
$database = $db->tampil_data();
?>
```



## Kesimpulan
Melalui tugas ini, Saya berhasil mengimplementasikan 3 prinsip dasar _Object-Oriented Programming_ (OOP) dalam PHP, yaitu Encapsulation, Inheritance, dan Polymorphism. Dengan membuat tampilan berbasis OOP, kami dapat mengelola data dari basis data MySQL secara efisien dan terstruktur. Secara keseluruhan, penerapan prinsip-prinsip ini menghasilkan desain kode yang modular, mudah dipelihara, dan siap untuk pengembangan lebih lanjut.
