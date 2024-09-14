# Course

## Penjelasan Database `Course`
Tabel courses menyimpan informasi mengenai berbagai mata kuliah yang ditawarkan dalam sistem.

### Tabel `Courses`
Tabel `courses` berisi kolom-kolom berikut.
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

	
		
		

