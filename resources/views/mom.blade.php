<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>&nbsp;</title>
    <style>
        .header, .header-space{
            height: 175px;
        }
        .footer, .footer-space {
        height: 100px;
        }
        .header {
            position: fixed; top: 0px; left: 100px; right: 100px;
        }
        .footer {
        position: fixed;
        bottom: 0;
        left: 0px; 
        right: 0px;
        }
        .content{
            margin-left: 100px;
            margin-right: 100px;
        }
    </style>
    <link rel="stylesheet" href="{{ asset('template/') }}/dist/css/adminlte.min.css">
</head>
<body onload="window.print();">
    <table>
        <thead>
            <tr>
                <td>
                    <div class="header-space">&nbsp;</div>
                </td>
            </tr>
        </thead>
        <tbody>
            <br>
            <br>
            <tr>
                <td>
                    <div class="content">
                        <table>
                            <tr>
                                <td>
                                    Nama Rapat
                                </td>
                                <td>
                                    : {{ $meeting->title }}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Hari/ Tanggal
                                </td>
                                <td>
                                    {{-- : {{ $meeting->tanggal->format('d') }} --}}
                                    : {{\Carbon\Carbon::parse($meeting->tanggal)->translatedFormat('l, d F Y')}}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Waktu
                                </td>
                                <td>
                                    : {{ $meeting->waktu_mulai }} WIB
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Tempat
                                </td>
                                <td>
                                    : {{ $meeting->place }}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Pimpinan Rapat
                                </td>
                                <td>
                                    : {{ $leader->name }}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Notulen Rapat
                                </td>
                                <td>
                                    : {{ $notulen->name }}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Peserta Rapat
                                </td>
                                <td>
                                    :
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                    <?php $no = 1; ?>
                                    @foreach ($anggota as $item)
                                        {{ $no++ }}. {{ $item->name }}<br>
                                    @endforeach                                     
                                </td>
                            </tr>
                        </table>
                        <br>
                        <p><strong>Agenda Rapat</strong></p>
                        <?php $no = 1; ?>
                        @foreach ($topik as $item)
                            {{ $no++ }}. {{ $item->judul }}<br>
                         @endforeach 
                        <br>
                        <p><strong>Notulen Rapat</strong></p>
                        {!! $result->isi !!}
                        <br>
                        <div>
                            <p><strong>Dokumentasi Rapat</strong></p>
                            @foreach ($dokumentasi as $item)
                                <img src="{{ url('dokumentasi/' . $item->Path) }}" class="img-fluid mb-2" alt="Dokuemntasi Rapat" width="50%"/>
                            @endforeach
                        </div>
                    </div>
                </td>
            </tr>
        </tbody>
        <tfoot>
            <tr>
                <td>
                    <div class="footer-space">&nbsp;</div>
                </td>
            </tr>
        </tfoot>
    </table>

    <div class="header">
        <div class="row">
            <div class="col-3">
                <div class="row">
                    <div class="col text-center">
                        <img src="{{ url('foto/logodel.png') }}" alt="logo" width="100px" class="text-center">
                        <h4>SPMI IT DEL</h4>
                    </div>
                </div>
            </div>
            <div class="col-9">
                <div class="row">
                    <div class="col text-center">
                        <h1>Notulen Rapat</h1>
                        <h2>Institut Teknologi Del</h2>
                    </div>
                </div>
            </div>
        </div>
        <hr>
    </div>
    <div class="footer">
        <hr>
        <p>
            <strong>Institut Teknologi Del</strong> 
            <br>
            Jl. Sisingamangaraja, Laguboti 22381 Toba Samosir, Sumatera Utara, Indonesia Telp. (0632) 331234, Fax.: (632) 331116
            <br>
            <a href="">info@del.ac.id</a>
            <a href="www.del.ac.id">www.del.ac.id</a>
        </p>
    </div>
</body>
<script type="text/javascript">
    window.onafterprint = window.close;
    window.print();
 </script>
</html>