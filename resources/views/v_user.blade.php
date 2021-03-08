@extends('layout.v_template')

@section('title', 'User')
@section('content')
<div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">List User</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>No</th>
                <th>Name</th>
                <th>Email</th>
                <th>Foto</th>
                <th></th>
              </tr>
              </thead>
              <tbody>
                <?php $no=1; ?>
              @foreach ($users as $data)
                  <tr>
                    <td>
                      {{ $no++ }}
                    </td>
                    <td>
                      {{ $data->name }}
                    </td>
                    <td>
                      {{ $data->email }}
                    </td>
                    <td class="text-center">
                      <img src="{{ url('foto/'.$data->foto) }}" width="50px" class="table-avatar">
                    </td>
                    <td class="text-center">
                      <a class="btn btn-primary btn-sm" href="#">
                        <i class="fas fa-folder">
                        </i>
                        View
                      </a>
                      <a class="btn btn-info btn-sm" href="#">
                        <i class="fas fa-pencil-alt">
                        </i>
                        Edit
                      </a>
                      <a class="btn btn-danger btn-sm" href="#">
                        <i class="fas fa-trash">
                        </i>
                        Delete
                      </a>
                    </td>
                  </tr>
              @endforeach
              </tbody>
              <tfoot>
              <tr>
                <th>No</th>
                <th>Name</th>
                <th>Email</th>
                <th>Foto</th>
                <th></th>
              </tr>
              </tfoot>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container-fluid -->
@endsection