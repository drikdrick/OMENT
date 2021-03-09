@extends('layout.v_template')

@section('title', 'Detail Rapat')
@section('content')
    <!-- Default box -->
    <div class="card">
        <div class="card-header text-center">
          <h1 class="card-title text-center">{{ $meetings->title }}</h1>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
              <div class="row">
                <div class="col-12 col-sm-4">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted">Tanggal</span>
                      <span class="info-box-number text-center text-muted mb-0">{{ $meetings->tanggal }}</span>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-sm-4">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted">Waktu</span>
                      <span class="info-box-number text-center text-muted mb-0">{{ $meetings->waktu_mulai }}</span>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-sm-4">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted">Tempat</span>
                      <span class="info-box-number text-center text-muted mb-0">{{ $meetings->place }}</span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                  <h4>1.	Membicarakan strategi Pembelajaran PJJ Ganjil 2020/2021 (Terlampir draft strategi dalam bentuk PPT dari WR 1) - IFY</h4>
                    <div class="post">
                      <h4>Tanggapan</h4>
                      <!-- /.user-block -->
                      <p>
                        HER : Mata Kuliah mana yang akan di blok? Satu MK sulit tidak di combine dengan yang sulit jg-> dirumuskan MK apa yang cocok digabungkan
                        IFY  : Rencana mahasiswa baru akan melalukan perkuliahan di kampus sehingga pendidikan karakter
                        TNT : Diploma sistem paket, ada pre-requisite, kurikulum 2019 tidak mengakomodir pergeseran MK, kecuali transisi sudah di akomodir. Setuju untuk sistem blok, apakah 2 minggu cukup untuk 2 minggu, misalnya?
                        Slide bertentangan, di minta video ajar tapi berbasis teks -> kita tidak bisa mengandalkan hanya video saja, jika ada yang berbasis teks untuk mengakomodir forum diskusi atau pertanyaan
                        TMP  : Sistem blok hanya tugas dan ujian nya saja yang digabungkan?-> Ya, terkait simplifikasi tugas misalnya Daspro dan Matdis, namun ini juga terkait penjadwalan MK. 1 minggu hanya 2 MK tertentu yang running dan minggu berikutnya MK lain
                        MK Daspro padat, jadi selama 2 minggu mahasiswa harus mencerna semua materi,bukannya ini semakin terbebani?
                        TNT   : MK yang tidak ada korelasi, seperti apa penggabungannya? Penjadwalan juga membutuhkan dukungan BAAK -> 3 hari ini diminta di prodi untuk dibahas strateginya.
                        Memang sistem blok membuat fokus, hanya harusnya ada dukungan dari WR I, apakah langsung UTS?
                        MK PAM dan PAP, mahasiswa mendesign UI kemudian aplikasi mobile nya, RPS yang berubah hanya Minggu I – Minggu 16, jika sistem blok maka di buat menjadi Hari I dan seterusnya
                        TMP   : Pelaksanaan sistem blok ini hanya parsial,PBO bisa dikompatibel kan dengan MK lain, tapi hanya beberapa bagian saja
                        MPR  : Untuk Bahasa Inggris, pembelajaran dipadatkan ke sistem blok akan menyulitkan karena pembelajaran bahasa efektif dilakukan continuous. Pelaksanaan MK Bahasa Inggris akan dilaksanakan secara regular-> mereka hanya memikirkan 1 atau 2 minggu ko
                      </p>
                    </div>
                    <div class="post">
                      <h4>Usulan</h4>
                      <!-- /.user-block -->
                      <p>
                        HER : Mata Kuliah mana yang akan di blok? Satu MK sulit tidak di combine dengan yang sulit jg-> dirumuskan MK apa yang cocok digabungkan
                        IFY  : Rencana mahasiswa baru akan melalukan perkuliahan di kampus sehingga pendidikan karakter
                        TNT : Diploma sistem paket, ada pre-requisite, kurikulum 2019 tidak mengakomodir pergeseran MK, kecuali transisi sudah di akomodir. Setuju untuk sistem blok, apakah 2 minggu cukup untuk 2 minggu, misalnya?
                        Slide bertentangan, di minta video ajar tapi berbasis teks -> kita tidak bisa mengandalkan hanya video saja, jika ada yang berbasis teks untuk mengakomodir forum diskusi atau pertanyaan
                        TMP  : Sistem blok hanya tugas dan ujian nya saja yang digabungkan?-> Ya, terkait simplifikasi tugas misalnya Daspro dan Matdis, namun ini juga terkait penjadwalan MK. 1 minggu hanya 2 MK tertentu yang running dan minggu berikutnya MK lain
                        MK Daspro padat, jadi selama 2 minggu mahasiswa harus mencerna semua materi,bukannya ini semakin terbebani?
                        TNT   : MK yang tidak ada korelasi, seperti apa penggabungannya? Penjadwalan juga membutuhkan dukungan BAAK -> 3 hari ini diminta di prodi untuk dibahas strateginya.
                        Memang sistem blok membuat fokus, hanya harusnya ada dukungan dari WR I, apakah langsung UTS?
                        MK PAM dan PAP, mahasiswa mendesign UI kemudian aplikasi mobile nya, RPS yang berubah hanya Minggu I – Minggu 16, jika sistem blok maka di buat menjadi Hari I dan seterusnya
                        TMP   : Pelaksanaan sistem blok ini hanya parsial,PBO bisa dikompatibel kan dengan MK lain, tapi hanya beberapa bagian saja
                        MPR  : Untuk Bahasa Inggris, pembelajaran dipadatkan ke sistem blok akan menyulitkan karena pembelajaran bahasa efektif dilakukan continuous. Pelaksanaan MK Bahasa Inggris akan dilaksanakan secara regular-> mereka hanya memikirkan 1 atau 2 minggu ko
                      </p>
                    </div>
                </div>
              </div>              
            </div>
            
            <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
              <div class="text-muted">
                <p class="text-sm">Project Leader
                  <b class="d-block">{{ $meetings->leader }}</b>
                </p>
                <p class="text-sm">Notulen
                  <b class="d-block">{{ $meetings->minuter }}</b>
                </p>
              </div>

              <h5 class="mt-5 text-muted">Files</h5>
              <ul class="list-unstyled">
                <li>
                  <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-image "></i> Absensi.png</a>
                </li>
                <li>
                  <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-image "></i> Absensi.png</a>
                </li>
                <li>
                  <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-image "></i> Absensi.png</a>
                </li>
              </ul>
              <div class="text-center mt-5 mb-3">
                <a href="#" class="btn btn-sm btn-primary">Add files</a>
                <a href="#" class="btn btn-sm btn-warning">Report contact</a>
              </div>
            </div>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
@endsection