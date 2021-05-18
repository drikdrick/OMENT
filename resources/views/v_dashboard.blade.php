@extends('layout.v_template')

@section('title', 'Dashboard')
@section('content')
    <div class="content">
        {{-- {{ dd($id) }} --}}
        <div class="container-fluid">
            <div>
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="m-0">Undangan Rapat</h5>
                        </div>
                        @if (!$undangan)
                            <h6 class="card-title text-center">Tidak ada undangan terbaru.</h6>
                        @else
                        <div class="card-body">
                            <h6 class="card-title">Special title treatment</h6>

                            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                            
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
