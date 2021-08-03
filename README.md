## Pengembangan Aplikasi Manajemen Rapat berbasis Web 
## (Studi Kasus: D3 Teknologi Informasi)

Rapat di kampus Institut Teknologi Del merupakan salah satu kegiatan formal yang dihadiri oleh Kepala Prodi dan Dosen yang akan merundingkan suatu masalah atau kepentingan bersama untuk memberikan penjelasan, serta menyelesaikan suatu masalah, dengan tujuan memperoleh suatu hasil yang disepakati bersama. Rapat di Fakultas Informatika dan Elektro terdapat 2 jenis rapat, yaitu rapat prodi dan rapat bulanan. Rapat prodi dilaksanakan setiap 1 kali dalam sebulan, dan waktu pelaksanaan rapat tidak ditentukan di awal, penetapan jadwal rapat prodi ini ditentukan secara musyawarah dengan para dosen di setiap prodi. Rapat bulanan dilaksanakan setiap hari rabu pada sore hari. Untuk waktu pelaksanaan rapat bulanan juga ditentukan secara musyawarah dengan dosen prodi, hal ini untuk memastikan dosen dapat menghadiri rapat tersebut. Rapat bulanan dilaksanakan apabila terdapat masalah pada prodi baik mahasiswa maupun akademik.

# Guideline

**Silahkan mengikuti instruksi yang tersedia untuk mencegah miskomunikasi diantara tim :)** 

## 1. Good to Follow

### a. Variable Naming Conversion
Gunakan penamaan variable atau method yang singkat & jelas, serta tidak membingungkan.

**good**:

`$user`, `$dataUser`, `$dataUjian`

**bad**:

`$aaaa`, `$data1`, `$variabelyangterlalupanjang`

### b. CamelCase
Variable atau method menggunakan format `CamelCase`

### c. CSRF Token
Semua form harus menggunakan `CSRF Protection`
Contoh:
```html
<form method="POST" action="login.php">
@csrf
</form>
```

---

## 2. Instalasi

### a. Clone
Clone repository ini dengan menjalankan perintah:
```bash
git clone https://github.com/Bonapasogit-Mengajar/bonapasogit-online-test.git
```

### b. Composer Install
Di dalam repository yang telah di clone jalankan perintah:
```bash
composer install
```

### c. Konfigurasi Database
Salin file .env.example ke file .env dengan perintah:
#### Windows
```bash
copy .env.example .env
```
#### Ubuntu
```bash
cp .env.example .env
```
> sesuaikan nilai variabel `DB_DATABASE` dengan yang ada di local.

### d. Migrasi
Migrasi dapat dilakukan dengan perintah:
```bash
php artisan migrate --seed
```

### e. Run
Jalankan projek laravel dengan menggunakan perintah:
```bash
php artisan serve
```

## 3. Penutup
Jika ada pertanyaan silakan untuk chat di grup atau mengajukan issue di repository.


## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

