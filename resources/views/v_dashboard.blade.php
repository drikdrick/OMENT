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
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>1.</td>
                                        <td>Update software</td>
                                        <td>
                                        <div class="progress progress-xs">
                                            <div class="progress-bar progress-bar-danger" style="width: 55%"></div>
                                        </div>
                                        </td>
                                        <td><span class="badge bg-danger">55%</span></td>
                                    </tr>
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
