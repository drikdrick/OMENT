@extends('layout.v_template2')

@section('title', 'User Detail')
@section('content')
<a href="/user" class="btn btn-sm btn-primary mb-1">Back</a>
@if ($users->id==Auth::user()->id)
<a href="/user.updateProfile" class="btn btn-sm btn-warning mb-1">Edit</a>
@endif
<div>
    <!-- Widget: user widget style 1 -->
    <div class="card card-widget widget-user">
      <!-- Add the bg color to the header using any of the bg-* classes -->
      <div class="widget-user-header bg-info">
        <h3 class="widget-user-username">{{ $users->name }}</h3>
        <h5 class="widget-user-desc">{{ $users->email }}</h5>
      </div>
      <div class="widget-user-image">
        <img class="img-circle elevation-2" src="{{ url('foto/'.$users->foto) }}" alt="User Avatar">
      </div>
      <div class="card-footer">
        <div class="row">
          <div class="col-sm-4 border-right">
            <div class="description-block">
            </div>
            <!-- /.description-block -->
          </div>
          <!-- /.col -->
          <div class="col-sm-4 border-right">
            <div class="description-block">
              <h5 class="description-header">Jabatan</h5>
              <span>{{ $roles->nama }}</span>
            </div>
            <!-- /.description-block -->
          </div>
          <!-- /.col -->
          <div class="col-sm-4">
            <div class="description-block">
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
              <th colspan="5" class="text-center"> Jadwal Notulen</th>
            </tr>
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