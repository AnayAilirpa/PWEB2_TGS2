# Course

## Database `Course`
Basis Data ini berisi struktur dan data untuk dua tabel: `courses` dan `course_classes`.

### Tabel `Courses`
Tabel `Courses` berisi kolom-kolom berikut.
| Nama Kolom  | Tipe Data | Deskripsi |
|--|--|--|
| id | int(100)  | Identifier unik untuk setiap mata kuliah (Primary Key, Auto Increment). |
| code | varchar(100) | Kode unik yang mewakili setiap mata kuliah. |
| name | varchar(100) | Nama mata kuliah. |
| sks | int(100) | Jumlah SKS (Satuan Kredit Semester) untuk mata kuliah. |
| hours | int(100) | Jumlah jam yang dibutuhkan untuk mata kuliah. |
| meeting | int(100) | Jumlah pertemuan yang dijadwalkan untuk mata kuliah. |
| deleted_at | timestamp | Timestamp ketika mata kuliah dihapus (soft delete). |
| created_at | timestamp | Timestamp saat mata kuliah dibuat. |
| updated_at | timestamp | Timestamp saat mata kuliah terakhir diperbarui. |

Primary Key: `id`

### Tabel `Course_Classes`
Tabel `Course_Classes` berisi kolom-kolom berikut.
| Nama Kolom  | Tipe Data | Deskripsi |
|--|--|--|
| id | int(100)  | Identifier unik untuk setiap relasi kelas-mata kuliah (Primary Key, Auto Increment). |
| student_class_id | int(100) | ID kelas siswa yang terkait. |
| course_id | int(100) | ID mata kuliah yang terkait. |
| deleted_at | timestamp | Timestamp ketika relasi ini dihapus (soft delete). |
| created_at | timestamp | Timestamp saat relasi ini dibuat. |
| updated_at | timestamp | Timestamp saat relasi ini terakhir diperbarui. |

Primary Key: `id`

Foreign Key: `course_id` merujuk ke kolom `id` pada tabel `courses`.
		
		

