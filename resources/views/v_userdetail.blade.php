@extends('layout.v_template')

@section('title', 'User Detail')
@section('content')
<a href="/user" class="btn btn-sm">Back</a>
<div>
    <!-- Widget: user widget style 1 -->
    <div class="card card-widget widget-user">
      <!-- Add the bg color to the header using any of the bg-* classes -->
      <div class="widget-user-header bg-info">
        <h3 class="widget-user-username">{{ $users->name }}</h3>
        <h5 class="widget-user-desc">{{ $users->email }} Password</h5>
      </div>
      <div class="widget-user-image">
        <img class="img-circle elevation-2" src="{{ url('foto/'.$users->foto) }}" alt="User Avatar">
      </div>
      <div class="card-footer">
        <div class="row">
          <div class="col-sm-4 border-right">
            <div class="description-block">
              <h5 class="description-header">Roles</h5>
              <span class="description-text">{{ $roles->nama }}</span>
            </div>
            <!-- /.description-block -->
          </div>
          <!-- /.col -->
          <div class="col-sm-4 border-right">
            <div class="description-block">
              <h5 class="description-header">Created</h5>
              <span class="description-text">{{ $users->created_at }}</span>
            </div>
            <!-- /.description-block -->
          </div>
          <!-- /.col -->
          <div class="col-sm-4">
            <div class="description-block">
              <h5 class="description-header">Updated</h5>
              <span class="description-text">{{ $users->updated_at  }}</span>
            </div>
            <!-- /.description-block -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
    </div>
    <!-- /.widget-user -->
  </div>
  <div class="card">
    <div class="card-body p-0">
      <table id="example1" class="table table-striped">
          <thead>
              <tr>
                  <th style="width: 1%" >
                      No
                  </th>
                  <th>
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
              </tr>
          </thead>
          <tbody>
            <?php $no=1; ?>
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
            </tr>
            @endforeach
          </tbody>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
@endsection