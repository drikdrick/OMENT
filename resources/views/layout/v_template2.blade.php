<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>OMENT | @yield('title')</title>

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{ asset('template/') }}/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('template/') }}/dist/css/adminlte.min.css">

    <link rel="stylesheet" href="{{ asset('template/') }}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet"
        href="{{ asset('template/') }}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('template/') }}/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('template/') }}/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <link rel="stylesheet" href="{{ asset('template/') }}/plugins/summernote/summernote-bs4.min.css">
    @stack('scripts')
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css"> 
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>

            <ul class="navbar-nav ml-auto">
                {{-- <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-bell"></i>
                        <span class="badge badge-warning navbar-badge">3</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-item dropdown-header">3 Notifications</span>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-file mr-2"></i> 3 new reports
                            <span class="float-right text-muted text-sm">2 days</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                    </div>
                </li> --}}
                <li class="nav-item dropdown user-menu">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                        <img src="{{ url('foto/' . Auth::user()->foto) }}" class="user-image img-circle elevation-2"
                            alt="User Image">
                        <span class="d-none d-md-inline">{{ Auth::user()->name }}</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <li class="user-header bg-primary">
                            <img src="{{ url('foto/' . Auth::user()->foto) }}" class="img-circle elevation-2"
                                alt="User Image">

                            <p>
                                {{ Auth::user()->name }}
                                <small>{{ Auth::user()->email }}</small>
                            </p>
                        </li>
                        <li class="user-footer">
                            <a href="/user/{{ Auth::user()->id }}"
                                class="btn btn-default btn-flat float-left">Profile</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-default btn-flat float-right">Log out</button>
                            </form>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                        <i class="fas fa-th-large"></i>
                    </a>
                </li>
            </ul>
        </nav>

        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <a href="/" class="brand-link">
                <img src="{{ asset('foto/') }}/nav.png" alt="OMENT" class="brand-image img-circle elevation-3"
                    style="opacity: .8">
                <span class="brand-text font-weight-light">OMENT</span>
            </a>

            <div class="sidebar">

                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">

                        <li class="nav-header">MAIN NAVIGATION</li>
                        <li class="nav-item">
                            <a href="/" class="nav-link {{ request()->is('/') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        @if (auth()->user()->role == 1)
                            <li class="nav-item">
                                <a href="/user" class="nav-link {{ request()->is('user') || request()->is('user/*') ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-users"></i>
                                    <p>
                                        Users
                                    </p>
                                </a>
                            </li>
                        @endif
                        @if (auth()->user()->role <= 2)
                            <li class="nav-item">
                                <a href="/meeting/buatrapat"
                                    class="nav-link {{ request()->is('meeting/buatrapat') ? 'active' : '' }}">
                                    <i class="far fa-plus-square nav-icon"></i>
                                    <p>Buat Rapat</p>
                                </a>
                            </li>
                        @endif
                        <li class="nav-item">
                            <a href="/meeting/jadwal" class="nav-link {{ request()->is('meeting/jadwal') || request()->is('meeting/jadwal/*')  ? 'active' : '' }}">
                                <i class="nav-icon far fa-calendar-alt"></i>
                                <p>
                                    Jadwal
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/meeting/hasil"
                                class="nav-link {{ request()->is('meeting/hasil') || request()->is('meeting/hasil/*') ? 'active' : '' }}">
                                <i class="far fas fa-search nav-icon"></i>
                                <p>Hasil Rapat</p>
                            </a>
                        </li>
                        {{-- <li class="nav-item">
                            <a href="/absen" class="nav-link">
                                <i class="far fas fa-book nav-icon"></i>
                                <p>Absensi</p>
                            </a>
                        </li> --}}
                    </ul>
                </nav>
            </div>
        </aside>

        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>@yield('title')</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="/">Home</a></li>
                                <li class="breadcrumb-item active">@yield('title')</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>

            <section class="content">
                @include('sweetalert::alert')
                @yield('content')

            </section>
        </div>

        <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
            </div>
            <strong>Copyright &copy; TA 33TI Kelompok 10</strong> All rights reserved.
        </footer>

        <aside class="control-sidebar control-sidebar-dark">
        </aside>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="{{ asset('template/') }}/plugins/jquery/jquery.min.js"></script>
    <script src="{{ asset('template/') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('template/') }}/dist/js/adminlte.min.js"></script>
    <script src="{{ asset('template/') }}/dist/js/demo.js"></script>
    <script src="{{ asset('template/') }}/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ asset('template/') }}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('template/') }}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="{{ asset('template/') }}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="{{ asset('template/') }}/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="{{ asset('template/') }}/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="{{ asset('template/') }}/plugins/jszip/jszip.min.js"></script>
    <script src="{{ asset('template/') }}/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="{{ asset('template/') }}/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="{{ asset('template/') }}/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="{{ asset('template/') }}/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="{{ asset('template/') }}/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <script src="{{ asset('template/') }}/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
    <script src="{{ asset('template/') }}/plugins/sweetalert2/sweetalert2.min.js"></script>
    <script src="{{ asset('template/') }}/plugins/summernote/summernote-bs4.min.js"></script>
    @stack('jquery')
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });

        $(function() {
            bsCustomFileInput.init();
        });

        $(document).ready(function() {
            var maxField = 8; //Input fields increment limitation
            var addButton = $('.add_button'); //Add button selector
            var wrapper = $('.field_wrapper'); //Input field wrapper
            var fieldHTML =
                '<div style="padding-top:5px; display:flex;"><input type="text" id="judul1" name="field_name[]" class="form-control nn" style="flex:1;"><a href="javascript:void(0);" class="remove_button btn btn-danger">X</a></div>';
            var x = 1; //Initial field counter is 1

            $(addButton).click(function() {
                if (x < maxField) {
                    x++; //Increment field counter
                    $(wrapper).append(fieldHTML); //Add field html
                }
            });

            $(wrapper).on('click', '.remove_button', function(e) {
                e.preventDefault();
                $(this).parent('div').remove(); //Remove field html
                x--; //Decrement field counter
            });
        });

        function getData() {
            var l = $('.nn').length;
            var result = [];
            for (i = 0; i < l; i++) {
                result.push($('.nn').eq(i).val());
            }
            return result;
        }

        function saveData() {
            var judul = document.getElementById("judul").value;
            var tanggal = document.getElementById("tanggal").value;
            var mulai = document.getElementById("mulai").value;
            var berakhir = document.getElementById("berakhir").value;
            var tempat = document.getElementById("tempat").value;
            var notulen = document.getElementById("notulen").value;
            var topik = getData();
            $.ajax({
                type: "POST",
                url: '/storeresearch',
                data: {
                    selectedMembers: arr
                },
                success: function(msg) {
                    console.log(msg);
                }
            });
        }
        $(function () {
            $('#summernote').summernote({'height' : 225,})

            CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
            mode: "htmlmixed",
            theme: "monokai",
            });
        })
    </script>
    @stack('custom-scripts')
    <script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
    <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
    {!! Toastr::message() !!}    
</body>

</html>
