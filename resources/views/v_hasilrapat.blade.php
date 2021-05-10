@extends('layout.v_template')

@section('title', 'Hasil Rapat')
@section('content')
    <!-- Default box -->
    <div class="card">
        <div class="card-body p-0">
            <table id="example1" class="table table-striped projects">
                <thead>
                    <tr>
                        <th style="width: 1%">
                            No
                        </th>
                        <th style="width: 40%">
                            Title
                        </th>
                        <th style="width: 10%">
                            Tanggal
                        </th>
                        <th style="width: 10%">
                            Waktu
                        </th>
                        <th>
                            Tempat
                        </th>
                        <th style="width: 10%" class="text-center">
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
                            <td>
                                {{ $item->tanggal }}
                            </td>
                            <td>
                                {{ $item->waktu_mulai }}
                            </td>
                            <td>
                                {{ $item->place }}
                            </td>
                            <td class="project-state">
                                {{ $item->minuter }}
                            </td>
                            <td class="project-actions text-right">
                                <a class="btn btn-primary btn-sm" href="/meeting/hasil/{{ $item->id }}">
                                    <i class="fas fa-folder">
                                    </i>
                                    View
                                </a>
                                @if (auth()->user()->role <= 2)
                                    <a class="btn btn-info btn-sm" href="/meeting/edit/{{ $item->id }}">
                                        <i class="fas fa-pencil-alt">
                                        </i>
                                        Edit
                                    </a>
                                    <a class="btn btn-danger btn-sm swalDefaultSuccess"
                                        href="/meeting/deleteRapat/{{ $item->id }}">
                                        <i class="fas fa-trash">
                                        </i>
                                        Delete
                                    </a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
@endsection
