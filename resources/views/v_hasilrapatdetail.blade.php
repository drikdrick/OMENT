@extends('layout.v_template')

@section('title', 'Detail Rapat')
@section('content')
    <!-- Default box -->
    <div class="card">
        <div class="card-header ">
            <h1 class="card-title">{{ $meetings->title }}</h1>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
                    <div class="row">
                        <div class="col-12 col-sm-4">
                            <div class="info-box bg-light">
                                <div class="info-box-content">
                                    <span class="info-box-text text-center text-muted">Tanggal</span>
                                    <span
                                        class="info-box-number text-center text-muted mb-0">{{ $meetings->tanggal }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-4">
                            <div class="info-box bg-light">
                                <div class="info-box-content">
                                    <span class="info-box-text text-center text-muted">Waktu</span>
                                    <span
                                        class="info-box-number text-center text-muted mb-0">{{ $meetings->waktu_mulai }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-4">
                            <div class="info-box bg-light">
                                <div class="info-box-content">
                                    <span class="info-box-text text-center text-muted">Tempat</span>
                                    <span
                                        class="info-box-number text-center text-muted mb-0">{{ $meetings->place }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        @foreach ($topik as $topics)
                        <div class="col-12" id="accordion">
                            <div class="card card-primary card-outline">
                                <a class="d-block w-100" data-toggle="collapse" href="#collapseOne{{ $topics->id }}">
                                    <div class="card-header">
                                        <h4 class="card-title w-100">
                                            {{ $topics->judul }}
                                        </h4>
                                    </div>
                                </a>
                                <div id="collapseOne{{ $topics->id }}" class="collapse" data-parent="#accordion">
                                    <div class="card-body">
                                        <div class="post">
                                            <h6>Tanggapan</h6>
                                        </div>
                                        <div class="post">
                                            <h6>Usulan</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>                              
                       </div>
                       @endforeach
                    </div>
                </div>

                <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
                    <div class="text-muted">
                        <p class="text-sm">Project Leader
                            <a href="/userdetail/{{ $meetings->leader }}">
                                <b class="d-block">{{ $leaders->name }}</b>
                            </a>
                        </p>
                        <p class="text-sm">Notulen
                            <a href="/userdetail/{{ $meetings->minuter }}">
                                <b class="d-block">{{ $notulen->name }}</b>
                            </a>
                        </p>
                        <p class="text-sm">
                            <a href="/meeting/anggota/{{ $meetings->id }}">
                                <b class="d-block">Anggota Rapat</b>
                            </a>
                        </p>
                    </div>

                    @if (!$lampirans->isEmpty())
                    <h5 class="mt-5 text-muted">Files</h5>
                    <ul class="list-unstyled">
                        <?php $i = 1; ?>
                        @foreach ($lampirans as $data)
                            <li>
                                <a taget="_blank" rel="noopener noreferrer" href="{{ url('files/' . $data->Path) }}"
                                    class="btn-link text-secondary"><i class="far fa-fw fa-image "></i> Lampiran
                                    {{ $i++ }}</a>
                            </li>
                        @endforeach
                    </ul>
                    @endif
                    <div>
                    <a href="#" class="btn btn-sm btn-primary">Catatan</a>
                    @if ($meetings->minuter==Auth::user()->id)
                    @endif
                    <a href="/absen/buatabsen/{{ $meetings->id }}" class="btn btn-sm btn-warning">Absensi</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
    </div>

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Tindaklanjut</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
        <div class="card-body p-0">
            <table class="table table-striped projects">
                <thead>
                    <tr>
                        <th style="width: 1%">
                            No
                        </th>
                        <th style="width: 20%">
                            Hal yang perlu
                        </th>
                        <th style="width: 30%">
                            Keterangan
                        </th>
                        <th>
                            Penanggung Jawab/PIC
                        </th>
                        <th style="width: 8%" class="text-center">
                            Status
                        </th>
                        @if (auth()->user()->role != 3)
                            <th style="width: 20%">
                            </th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            1
                        </td>
                        <td>
                            <a>
                                Sistem assessment
                            </a>
                            <br />
                            <small>
                                Created 01.01.2019
                            </small>
                        </td>
                        <td>
                            Konsultasi ke WR I
                        </td>
                        <td>
                            Kaprodi
                        </td>
                        <td class="project-state">
                            <span class="badge badge-success">Success</span>
                        </td>
                        @if (auth()->user()->role != 3)
                            <td class="project-actions text-right">
                                <a class="btn btn-info btn-sm" href="#">
                                    <i class="fas fa-pencil-alt">
                                    </i>
                                    Edit
                                </a>
                                <a class="btn btn-danger btn-sm" href="#">
                                    <i class="fas fa-trash">
                                    </i>
                                    Delete
                                </a>
                            </td>
                        @endif
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
@endsection
