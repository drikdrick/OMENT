@extends('layout.v_template')

@section('title', 'Dashboard')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div>
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="m-0">Undangan Rapat</h5>
                        </div>
                        <div class="card-body">
                            @if (!$undangan->isEmpty())
                                <table class="table table-sm">
                                    <thead>
                                    <tr>
                                        <th style="width: 1%">#</th>
                                        <th>Rapat</th>
                                        <th>Tanggal</th>
                                        <th>Waktu</th>
                                        <th>Tempat</th>
                                        <th style="width: 10%"></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no=1;?>
                                        @foreach ($undangan as $item)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $item->title }}</td>
                                            <td>{{ $item->tanggal }}</td>
                                            <td>{{ $item->waktu_mulai }}</td>
                                            <td>{{ $item->place }}</td>
                                            <td>
                                                <a class="btn btn-primary btn-sm" href="/meeting/hasil/{{ $item->meetings_id }}">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <a class="btn btn-success btn-sm" href="/undangan/terimaUndangan/{{ $item->meetings_id }}">
                                                    <i class="fas fa-check"></i>
                                                </a>
                                                <a class="btn btn-danger btn-sm" href="">
                                                    <i class="fas fa-ban"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        @endforeach                            
                                    </tbody>
                                </table>
                            @else
                            <h6 class="card-title">Tidak ada undangan terbaru.</h6>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
