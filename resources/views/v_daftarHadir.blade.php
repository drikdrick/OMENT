@extends('layout.v_template2')

@section('title', 'Daftar Hadir')
@section('content')
    <div class="card">
        <div class="card-body p-0">
            <table id="example1" class="table table-striped projects">
                <thead>
                    <tr>
                        <th style="width: 1%">
                            No
                        </th>
                        <th >
                            Title
                        </th>
                        <th>
                            Tanggal
                        </th>
                        <th>
                            Waktu
                        </th>
                        <th>
                            Tempat
                        </th>
                        <th class="text-center">
                            Notulen
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    @foreach ($meetings as $item)
                        <tr>
                            <td>
                                {{ $no++ }}
                            </td>
                            <td>
                                {{ $item->title }}
                            </td>
                            <td>
                                {{ $item->tanggal }}
                            </td>
                            <td>
                                {{ $item->waktu_mulai }}
                            </td>
                            <td>
                                {{ $item->place }}
                            </td>
                            <td class="text-center">
                                {{ $item->name }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
