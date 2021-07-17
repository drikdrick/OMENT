@extends('layout.v_template')

@section('title', 'Detail Rapat')
@section('content')
    <!-- Default box -->
    <div class="card card-primary">
        <div class="card-header ">
            <h1 class="card-title">Nama Rapat : {{ $meetings->title }}</h1>
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
                        <div class="col-12">
                            <div class="card card-primary card-outline">
                                    <div class="card-header">
                                        <h4 class="card-title w-100">
                                            Agenda Rapat
                                        </h4>
                                    </div>
                                <div class="card-body">
                                    @foreach ($topik as $topics)
                                        {{ $topics->judul }}
                                    @endforeach
                                </div>
                            </div>                              
                       </div>
                    </div>
                </div>

                <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
                    <div class="text-muted">
                        <p class="text-sm">Ketua Rapat
                            <a href="/userdetail/{{ $meetings->leader }}">
                                <b class="d-block">{{ $leaders->name }}</b>
                            </a>
                        </p>
                        <p class="text-sm">Notulis
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
                    <h5 class="mt-5 text-muted">Lampiran</h5>
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
                    
                    @if ($meetings->minuter==Auth::user()->id)
                    <a href="/meeting/notulensi/{{ $meetings->id }}" class="btn btn-sm btn-primary">Catatan</a>
                    
                    <a href="/absen/buatabsen/{{ $meetings->id }}" class="btn btn-sm btn-warning">Absensi</a>
                    @endif
                </div>
            </div>
        </div>
        <!-- /.card-body -->
    </div>

    <div class="card card-primary card-outline">
        <div class="card-header">
            <h3 class="card-title">Hasil Rapat</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse"><i class="fas fa-minus"></i></button>
            </div>
        </div>

        <div class="card-body">
            {!! $result->isi !!}
        </div>
    </div>

    <div class="card card-primary card-outline">
        <div class="card-header">
            <h3 class="card-title">Dokumentasi Rapat</h3>
        </div>
        

    </div>
@endsection
