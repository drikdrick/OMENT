@extends('layout.v_template')

@section('title', 'Buat Rapat')
@section('content')
<div class="row">
    <div class="col-md-12">
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">General</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
          </div>
        </div>
        <div class="card-body">
          <div class="form-group">
            <label for="judul">Judul</label>
            <input type="text" id="judul" class="form-control">
          </div>
          <div class="form-group">
            <label for="tanggal">Tanggal</label>
            <input type="date" id="tanggal" class="form-control">
          </div>
          <div class="form-group">
            <label for="mulai">Mulai</label>
            <input type="time" id="mulai" class="form-control">
          </div>
          <div class="form-group">
            <label for="berakhir">Berakhir</label>
            <input type="time" id="berakhir" class="form-control">
          </div>
          <div class="form-group">
            <label for="tempat">Tempat</label>
            <input type="text" id="tempat" class="form-control">
          </div>
          <div class="form-group">
            <label for="notulen">Notulen</label>
            <input type="text" id="notulen" class="form-control">
          </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div>
  <div class="row">
    <div class="col-12">
      <a href="#" class="btn btn-secondary btn-block">Cancel</a>
      <input type="submit" value="Create Meeting" class="btn btn-success btn-block">
    </div>
  </div>
@endsection