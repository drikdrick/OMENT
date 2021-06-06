@extends('layout.v_template')

@section('title', 'Absen')
@section('content')
    <div class="row">
    <div class="col-md-12">
        <div class="card card-outline card-info">
            <div class="card-header">
                <h3 class="card-title">
                    Summernote
                </h3>
            </div>
            <div class="card-body">
                <textarea id="summernote">
                    Place <em>some</em> <u>text</u> <strong>here</strong>
            </textarea>
            </div>
            <div class="card-footer">
                Visit <a href="https://github.com/summernote/summernote/">Summernote</a> documentation for more examples and information about the plugin.
            </div>
        </div>
    </div>
</div>
@endsection
