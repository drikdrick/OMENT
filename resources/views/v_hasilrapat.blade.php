@extends('layout.v_template')

@section('title', 'Hasil Rapat')
@section('content')
    <div class="card">
        <div class="card-body p-0">
            <table id="example1" class="table table-striped projects">
                <thead>
                    <tr>
                        <th style="width: 1%">
                            No
                        </th>
                        <th style="width: 30%">
                            Title
                        </th>
                        <th style="width: 10%" class="text-center">
                            Tanggal
                        </th>
                        <th style="width: 10%" class="text-center">
                            Waktu
                        </th>
                        <th>
                            Tempat
                        </th>
                        <th style="width: 20%" class="text-center">
                            Notulen
                        </th>
                        <th style="width: 20%">
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    @foreach ($meetings as $item)
                        <tr>
                            <td class="text-center">
                                {{ $no++ }}
                            </td>
                            <td>
                                {{ $item->title }}
                            </td>
                            <td class="text-center">
                                {{ $item->tanggal }}
                            </td>
                            <td class="text-center">
                                {{ $item->waktu_mulai }}
                            </td>
                            <td class="text-center">
                                {{ $item->place }}
                            </td>
                            <td class="text-center">
                                {{ $item->name }}
                            </td>
                            <td class="project-actions text-right">
                                <a class="btn btn-primary btn-sm" href="/meeting/hasil/{{ $item->id }}" data-placement="left" title="Lihat Data Hasil Rapat">
                                    <i class="fas fa-folder">
                                    </i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
