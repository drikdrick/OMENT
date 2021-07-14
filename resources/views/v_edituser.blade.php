@extends('layout.v_template')
@section('title', 'Edit Profile')

@section('content')
<div class="card card-primary card-outline">
    <div class="card-header d-flex p-0">
        <h3 class="card-title p-3">My Profile</h5>
        <ul class="nav nav-pills ml-auto p-2">
            <li class="nav-item"><a class="nav-link active" href="#tab_1" data-toggle="tab">Edit Profile</a></li>
            <li class="nav-item"><a class="nav-link" href="#tab_2" data-toggle="tab">Edit Password</a></li>
        </ul>
    </div>

    <div class="card-body">
        <div class="row">
            <div class="col-4 text-center">
                <img src="{{ url('foto/'.$user->foto) }}" alt="{{ $user->name }}" style="max-width: 65%">
            </div>
            <div class="col-8">
                <div class="tab-content">
                    <div class="tab-pane active" id="tab_1">
                        <form action="update">
                            @csrf
                            <div class="form-group">
                                <label for="name">Nama</label>
                                <input type="textarea" name="name" id="name" class="form-control" value="{{ $user->name }}" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" name="email" id="email" class="form-control" value="{{ $user->email }}" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Foto</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input name="lampiran[]" type="file" class="custom-file-input" id="exampleInputFile"
                                            multiple>
                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Update My Profile" class="btn btn-primary float-right">
                            </div>
                        </form>
                        <a href="/home"><button class="btn btn-outline-danger float-right mr-2">Cancel</button></a>
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="tab_2">
                        <form action="update">
                            @csrf
                            <div class="form-group">
                                <label for="password">Password Lama</label>
                                <input type="password" name="password" id="password" class="form-control" required>
                            </div>
                            @csrf
                            <div class="form-group">
                                <label for="password">Password Baru</label>
                                <input type="password" name="password" id="password" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="konfirmPassword">Konfirmasi Password</label>
                                <input type="password" name="konfirmPassword" id="konfirmPassword" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Change Password" class="btn btn-primary float-right">
                            </div>
                        </form>
                        <a href="/home"><button class="btn btn-outline-danger float-right mr-2">Cancel</button></a>
                    </div>
                    <!-- /.tab-pane -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection