@extends('layout.v_template2')

@section('title', 'Absen')
@section('content')
<div class="row">
    <div class="card card-default col-12">
        <form action="/absen/input/{{$meeting->id}}" method="POST">
        @csrf
        <div class="card-header"> Absensi {{ $meeting->title }}
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <div class="row">
            <div class="col-12">
                <table id="example1" class="table table-striped projects">
                    <thead>
                        <tr>
                            <th style="width: 1%">
                                No
                            </th>
                            <th>
                                Nama
                            </th>
                            <th class="text-center">
                                Hadir
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                            @foreach ($datas as $item)
                                <tr>
                                    <td class="text-center">
                                        {{ $no++ }}
                                    </td>
                                    <td>
                                        {{ $item->name }}
                                    </td>
                                    <td class="text-center">
                                        <input class="form-check-input" type="checkbox" name="dataAbsen[]" value="{{ $item->users_id }}" id="flexCheckChecked" @if ($item->respon==2)
                                            checked
                                        @endif>
                                    </td>
                                </tr>
                            @endforeach                
                    </tbody>
                </table>
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <div class="card-footer">
            <div class="col-12">
                <hr>
                <input type='submit' value='Submit' class="btn btn-success btn-block">     
            </div>
          *Harap cek kembali data absen sebeulum submit
        </div>
        </form>   
    </div>
</div>
@endsection
@push('scripts')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.2/dist/sweetalert2.min.css">
@endpush

@push('jquery')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.all.min.js"></script>
@endpush

@push('custom-scripts')
<script>
    document.getElementById('submitBtn').addEventListener('click', function(){
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
                )
            }
        })
    })
</script>
@endpush
