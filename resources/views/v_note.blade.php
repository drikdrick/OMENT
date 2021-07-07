@extends('layout.v_template')

@section('title', 'Notulensi')
@section('content')
    <div class="row">
        <form action="/meeting/buatNotulensi/{{ $meetings_id }}" method="post">
            @csrf
    <div class="col-md-12">
        <div class="card card-outline card-info">
            <div class="card-header">
                <h3 class="card-title">
                    Notulensi Rapat Rutin
                </h3>
            </div>
            <div class="card-body">
                <textarea id="summernote" name="isi">
                    
                </textarea>
            </div>
            <div class="card-footer">
                <input type="submit" value="Buat" class="btn btn-block btn-primary">
                *Mohon cek kembali hasil notulensi sebelum submit.
            </div>
        </div>
    </div>
        </form>
</div>
@endsection
