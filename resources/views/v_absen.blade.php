@extends('layout.v_template')

@section('title', 'Absen')
@section('content')
    <div class="card card-default">
        <div class="card-header"> Absensi {{ $meeting->title }}
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <div class="row">
            <div class="col-12">
                <form action="" method="post">
                    @csrf
                    @foreach ($datas as $data)
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                        <label class="form-check-label" for="flexCheckChecked">
                          {{ $data->name }}
                        </label>
                    </div>
                    @endforeach
                </form>
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          Visit <a href="https://github.com/istvan-ujjmeszaros/bootstrap-duallistbox#readme">Bootstrap Duallistbox</a> for more examples and information about
          the plugin.
        </div>
      </div>
@endsection
