<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>-</title>
    <style>
      /* header { position: fixed; top: 0px; left: 100px; right: 100px;}
      footer { position: fixed; bottom: 0px; left: 0px; right: 10px;}
      .custom-position{
        padding-top: 150px;
        padding-bottom: 100px;
        margin-right: 150px;
        margin-left: 80px;
      } */
      
      /* p { page-break-after: always; } 
      p:last-child { page-break-after: never; } */
        
        
        .header, .header-space{
            height: 150px;
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
    </style>
    <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{ asset('template/') }}/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('template/') }}/dist/css/adminlte.min.css">

    <link rel="stylesheet" href="{{ asset('template/') }}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet"
        href="{{ asset('template/') }}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('template/') }}/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('template/') }}/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
</head>
<body>
    {{-- <header>
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
    </header>
    <main class="custom-position">
        <p>page 1</p>
        <p>page2></p>
    </main>
    <footer>
        <p>
            <strong>Institut Teknologi Del</strong> 
            <br>
            Jl. Sisingamangaraja, Laguboti 22381 Toba Samosir, Sumatera Utara, Indonesia Telp. (0632) 331234, Fax.: (632) 331116
            <br>
            <a href="">info@del.ac.id</a>
            <a href="">www.del.ac.id</a>
        </p>
    </footer> --}}
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
                                    : 
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Hari/ Tanggal
                                </td>
                                <td>
                                    : 
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Waktu
                                </td>
                                <td>
                                    : 
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Tempat
                                </td>
                                <td>
                                    : 
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Pimpinan Rapat
                                </td>
                                <td>
                                    : 
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Notulen Rapat
                                </td>
                                <td>
                                    : 
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
                        </table>
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
            <a href="">www.del.ac.id</a>
        </p>
    </div>
</body>
</html>