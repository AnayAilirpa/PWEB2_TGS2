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
