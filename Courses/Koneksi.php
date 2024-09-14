<?php 
class Courses {
    private $host = "localhost";
	private $username = "root";
	private $password = "";
	private $database = "course";
	protected $koneksi = "";
	
	// Konstruksi untuk melakukan koneksi ke database
	public function __construct(){
		$this->koneksi = mysqli_connect($this->host, $this->username, $this->password, $this->database);
		if (mysqli_connect_errno()){
			echo "Koneksi database gagal : " . mysqli_connect_error();
		}
	}

	// Metode untuk menampilkan data dari tabel courses
    public function tampil_data()
	{
		$hasil = [];  // Inisialisasi variabel $hasil
		$data = mysqli_query($this->koneksi,"SELECT * FROM courses");
		while($row = mysqli_fetch_array($data)){
			$hasil[] = $row;
		}
		return $hasil;
	}
}

// Kelas turunan dari Courses
class Course_Classes extends Courses {

	// Gunakan koneksi dari kelas induk, tidak perlu menduplikasi constructor

	// Metode untuk menampilkan data dari tabel Course_Classes
    public function tampil_data()
	{
		$hasil = [];  // Inisialisasi variabel $hasil
		$data = mysqli_query($this->koneksi,"SELECT * FROM Course_Classes");
		while($row = mysqli_fetch_array($data)){
			$hasil[] = $row;
		}
		return $hasil;
	}
}
?>
