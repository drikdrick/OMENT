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
          <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#modal-default">
            <i class="far fa-plus-square nav-icon"></i> Add User
          </button>
          <div class="card-body">
            <table id="example1" class="table table-striped">
              <thead>
              <tr>
                <th>No</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Foto</th>
                <th style="width: 20%" class="text-center">
                  Action
                </th>
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
                    <td>
                      {{ $data->nama }}
                    </td>
                    <td class="text-center">
                      <img src="{{ url('foto/'.$data->foto) }}" width="50px" class="table-avatar">
                    </td>
                    <td class="text-center ">
                      <a class="btn btn-primary btn-sm" href="/user/{{ $data->id }}" data-toggle="tooltip" data-placement="left" title="Lihat Data User">
                        <i class="fas fa-eye">
                        </i>
                      </a>
                      <a class="btn btn-info btn-sm" href="/user/edit/{{ $data->id }} data-toggle="tooltip" data-placement="left" title="Edit Data User"">
                        <i class="fas fa-pencil-alt">
                        </i>
                      </a>
                      {{-- <a class="btn btn-danger btn-sm" href="/delete/{{ $data->id }}" onclick="return confirm('Are you sure?')">
                        <i class="fas fa-trash">
                        </i>
                      </a> --}}
                    </td>
                  </tr>
              @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="modal-default">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <h4 class="modal-title">Add User</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                <div class="col-md-6">
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                <div class="col-md-6">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                <div class="col-md-6">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                <div class="col-md-6">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                </div>
            </div>
            <div class="form-group row">
              <label for="role" class="col-md-4 col-form-label text-md-right">{{ __('Role') }}</label>

              <div class="col-md-6">
                  <select id="role" name="role" class="form-control">
                    <option value="1">Admin</option>
                    <option value="2">Ketua Prodi</option>
                    <option value="3">Dosen</option>
                  </select>
              </div>
          </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">
            {{ __('Register') }}
          </button>
        </div>
      </form>
      </div>
    </div>
  </div>
@endsection