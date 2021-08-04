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
                                        @if (!$undangan->isEmpty())
                                            <?php $no=1;?>
                                            @foreach ($undangan as $item)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $item->title }}</td>
                                                <td>{{ $item->tanggal }}</td>
                                                <td>{{ $item->waktu_mulai }}</td>
                                                <td>{{ $item->place }}</td>
                                                <td>
                                                    <a class="btn btn-primary btn-sm" href="/meeting/jadwal/{{ $item->meetings_id }}" data-toggle="tooltip" data-placement="left" title="Lihat Data Rapat">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                    <a class="btn btn-success btn-sm" href="/undangan/terimaUndangan/{{ $item->meetings_id }}" data-toggle="tooltip" data-placement="left" title="Terima Undangan Rapat">
                                                        <i class="fas fa-check"></i>
                                                    </a>
                                                    {{-- <a class="btn btn-danger btn-sm" href="/undangan/tolakUndangan/{{ $item->meetings_id }}">
                                                        <i class="fas fa-ban"></i>
                                                    </a> --}}
                                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-default" data-id="{{ $item->meetings_id }}" data-toggle="tooltip" data-placement="left" title="Tolak Undangan Rapat">
                                                        <i class="fas fa-ban"></i>
                                                    </button>

                                                    <div class="modal fade" id="modal-default">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header bg-primary">
                                                                    <h4 class="modal-title">Pesan Izin</h4>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <form method="POST" action="/undangan/tolakUndangan">
                                                                @csrf
                                                                <div class="modal-body">
                                                                    <input type="text" value="{{ $item->meetings_id }}" name="id" hidden>
                                                                    <textarea name="pesan" id="pesan" cols="65" rows="5" required></textarea>
                                                                </div>
                                                                <div class="modal-footer justify-content-between">
                                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                                                                    <button type="submit" class="btn btn-primary">
                                                                        Kirim
                                                                    </button>
                                                                </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                        @else
                                        <tr>
                                            <td colspan="6" class="text-center">
                                                <h6>Tidak ada undangan terbaru.</h6>
                                            </td>                                            
                                        </tr>
                                        @endif                            
                                    </tbody>
                                </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
