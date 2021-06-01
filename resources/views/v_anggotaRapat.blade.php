@extends('layout.v_template2')

@section('title', 'Anggota Rapat')
@section('content')
{{-- <h1>{{ $anggota->tanggal }}</h1> --}}
<div class="card">
    <div class="card-body p-0">
        <table id="example1" class="table table-striped projects">
            <thead>
                <tr>
                    <th style="width: 1%">
                        No
                    </th>
                    <th>
                        Nama
                    </th>
                    <th>
                        Respon
                    </th>
                    <th class="text-center">
                        Waktu
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                @foreach ($anggota as $item)
                    <tr>
                        <td class="text-center">
                            {{ $no++ }}
                        </td>
                        <td>
                            {{ $item->name }}
                        </td>
                        <td>
                            @if (!$item->respon=0)
                                <span class="badge badge-warning">Pending</span>
                            @elseif ($item->respon===1)
                                <span class="badge badge-success">Akan hadir</span>
                            @else
                                <span class="badge badge-danger">Berhalangan</span>
                            @endif
                        </td>
                        <td class="text-center">
                            {{ $item->updated_at }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection