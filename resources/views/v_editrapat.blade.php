@extends('layout.v_template')

@section('title', 'Edit Rapat')
@section('content')
<form action="/updateRapat" method="POST" enctype="multipart/form-data">
  @csrf
  <div class="row">
    <div class="col-md-6">
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Umum</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
          </div>
        </div>
        <div class="card-body">
          <div class="form-group">
            <label for="judul">Judul</label>
            <input type="textarea" name="judul" id="judul" class="form-control" value="{{ $meetings->title }}" required>
          </div>
          <div class="form-group">
            <label for="tanggal">Tanggal</label>
            <input type="date" name="tanggal" id="tanggal" class="form-control" value="{{ $meetings->tanggal }}" required>
          </div>
          <div class="form-group">
            <label for="mulai">Mulai</label>
            <input type="time" name="mulai" id="mulai" class="form-control" value="{{ $meetings->waktu_mulai }}"required>
          </div>
          <div class="form-group">
            <label for="berakhir">Berakhir</label>
            <input type="time" name="berakhir" id="berakhir" value="{{ $meetings->waktu_akhir }}"class="form-control">
          </div>
          <div class="form-group">
            <label for="tempat">Tempat</label>
            <input type="text" name="tempat"id="tempat" class="form-control" value="{{ $meetings->place }}"required>
          </div>
          <div class="form-group">
            <label for="notulen">Notulen</label>
            <select id="notulen" name="notulen" class="form-control" value="{{ $meetings->minuter }}">
              @foreach ($users as $item)
              @if ($item->id==$meetings->minuter)
              <option selected value="{{ $item->id }}">{{ $item->name }}</option>
              @else
              <option value="{{ $item->id }}">{{ $item->name }}</option>
              @endif
              @endforeach
            </select>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>

    <div class="col-md-6">
      <div class="card card-secondary">
        <div class="card-header">
          <h3 class="card-title">Tambahan</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
          </div>
        </div>
        <div class="card-body">
          <div class="field_wrapper form-group">
            <label for="judul">Topik</label>
            <div style=" display:flex;">
              <input type="text" id="judul1" name="field_name[]" class="form-control nn"><br>
              <a href="javascript:void(0);" class="add_button btn btn-primary" title="Add field" style="flex:1;">+</a>
            </div>
          </div>
        </div>
        <div class="card-body">
          <div class="form-group">
            <label for="exampleInputFile">Lampiran</label>
            <div class="input-group">
              <div class="custom-file">
                <input name="lampiran[]" type="file" class="custom-file-input" id="exampleInputFile" multiple>
                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
              </div>
            </div>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div>
  <div class="row">
    <div class="col-12">
      <a href="/meeting/hasil" class="btn btn-secondary btn-block">Cancel</a>
      <input type="submit" value="Update Meeting" class="btn btn-warning btn-block">
    </div>
  </div>
</form>
  @endsection