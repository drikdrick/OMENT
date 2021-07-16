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
                        Status
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
                            @if (is_null($item->respon))
                                <span class="badge badge-warning">Pending</span>
                            @elseif ($item->respon==1)
                                <span class="badge badge-primary">Akan hadir</span>
                            @elseif ($item->respon==2)
                                <span class="badge badge-success">Hadir</span>
                            @else
                                <span class="badge badge-danger">Berhalangan</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection