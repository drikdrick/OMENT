<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <p>Dear Bapak/Ibu Ketua Prodi D3 Teknologi Informasi,</p>
    <br>
    <p>Ini adalah email pemberitahuan bahwa anggota rapat dengan deskripsi sebagai berikut :</p>
    <table>
        <tr>
            <td>
                Nama
            </td>
            <td>
                : {{ $nama }}
            </td>
        </tr>
        <tr>
            <td>
                Email
            </td>
            <td>
                : {{ $email }}
            </td>
        </tr>
        <tr>
            <td>
                Pesan
            </td>
            <td>
                : {{ $pesan }}
            </td>
        </tr>
    </table>
    <br>
    <p>Tidak dapat menghadiri rapat dengan deksripsi sebagai berikut:</p>
    <table>
        <tr>
            <td>Judul</td>
            <td>: {{ $judul }}</td>
        </tr>
        <tr>
            <td>Ketua Rapat</td>
            <td>: {{ $ketua }}</td>
        </tr>
        <tr>
            <td>Notulis</td>
            <td>: {{ $notulis }}</td>
        </tr>
        <tr>
            <td>Tempat</td>
            <td>: {{ $tempat }}</td>
        </tr>
        <tr>
            <td>Hari/Tanggal</td>
            <td>: {{\Carbon\Carbon::parse($tanggal)->translatedFormat('l, d F Y')}}</td>
        </tr>
        <tr>
            <td>Waktu</td>
            <td>: {{ $waktu }}</td>
        </tr>
    </table>

    <p>Untuk informasi lebih detail tentang anggota rapat dapat dilihat di <a href="http://127.0.0.1:8000/meeting/jadwal/{{ $id }}">sini</a>. </p>
    <p>Terima kasih atas perhatian nya.</p>
</body>
</html>