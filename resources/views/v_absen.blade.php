@extends('layout.v_template2')

@section('title', 'Absen')
@section('content')
<div class="row">
    <div class="card card-default col-12">
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
                                    <form action="/absen/input/{{$meeting->id}}" method="POST">
                                        @csrf
                                        <input class="form-check-input" type="checkbox" name="dataAbsen[]" value="{{ $item->users_id }}" id="flexCheckChecked">
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
