@extends('layout.v_template')

@section('title', 'Detail Rapat')
@section('content')
    <!-- Default box -->
    <div class="card">
        <div class="card-header text-center">
          <h1 class="card-title text-center">{{ $meetings->title }}</h1>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
              <div class="row">
                <div class="col-12 col-sm-4">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted">Tanggal</span>
                      <span class="info-box-number text-center text-muted mb-0">{{ $meetings->tanggal }}</span>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-sm-4">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted">Waktu</span>
                      <span class="info-box-number text-center text-muted mb-0">{{ $meetings->waktu_mulai }}</span>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-sm-4">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted">Tempat</span>
                      <span class="info-box-number text-center text-muted mb-0">{{ $meetings->place }}</span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                  <h4>Agenda 1</h4>
                    <div class="post">
                      <div class="user-block">
                        <img class="img-circle img-bordered-sm" src="{{ asset('template/') }}/dist/img/user1-128x128.jpg" alt="user image">
                        <span class="username">
                          <a href="#">Jonathan Burke Jr.</a>
                        </span>
                        <span class="description">Shared publicly - 7:45 PM today</span>
                      </div>
                      <!-- /.user-block -->
                      <p>
                        Lorem ipsum represents a long-held tradition for designers,
                        typographers and the like. Some people hate it and argue for
                        its demise, but others ignore.
                      </p>

                      <p>
                        <a href="#" class="link-black text-sm"><i class="fas fa-link mr-1"></i> Demo File 1 v2</a>
                      </p>
                    </div>
                    <div class="post">
                      <div class="user-block">
                        <img class="img-circle img-bordered-sm" src="{{ asset('template/') }}/dist/img/user1-128x128.jpg" alt="user image">
                        <span class="username">
                          <a href="#">Jonathan Burke Jr.</a>
                        </span>
                        <span class="description">Shared publicly - 7:45 PM today</span>
                      </div>
                      <!-- /.user-block -->
                      <p>
                        Lorem ipsum represents a long-held tradition for designers,
                        typographers and the like. Some people hate it and argue for
                        its demise, but others ignore.
                      </p>

                      <p>
                        <a href="#" class="link-black text-sm"><i class="fas fa-link mr-1"></i> Demo File 1 v2</a>
                      </p>
                    </div>
                    <div class="post clearfix">
                      <div class="user-block">
                        <img class="img-circle img-bordered-sm" src="{{ asset('template/') }}/dist/img/user7-128x128.jpg" alt="User Image">
                        <span class="username">
                          <a href="#">Sarah Ross</a>
                        </span>
                        <span class="description">Sent you a message - 3 days ago</span>
                      </div>
                      <!-- /.user-block -->
                      <p>
                        Lorem ipsum represents a long-held tradition for designers,
                        typographers and the like. Some people hate it and argue for
                        its demise, but others ignore.
                      </p>
                      <p>
                        <a href="#" class="link-black text-sm"><i class="fas fa-link mr-1"></i> Demo File 2</a>
                      </p>
                    </div>

                    <div class="post">
                      <div class="user-block">
                        <img class="img-circle img-bordered-sm" src="{{ asset('template/') }}/dist/img/user1-128x128.jpg" alt="user image">
                        <span class="username">
                          <a href="#">Jonathan Burke Jr.</a>
                        </span>
                        <span class="description">Shared publicly - 5 days ago</span>
                      </div>
                      <!-- /.user-block -->
                      <p>
                        Lorem ipsum represents a long-held tradition for designers,
                        typographers and the like. Some people hate it and argue for
                        its demise, but others ignore.
                      </p>

                      <p>
                        <a href="#" class="link-black text-sm"><i class="fas fa-link mr-1"></i> Demo File 1 v1</a>
                      </p>
                    </div>
                </div>
              </div>
            </div>
            <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
              <div class="text-muted">
                <p class="text-sm">Project Leader
                  <b class="d-block">{{ $meetings->leader }}</b>
                </p>
                <p class="text-sm">Notulen
                  <b class="d-block">{{ $meetings->minuter }}</b>
                </p>
              </div>

              <h5 class="mt-5 text-muted">Files</h5>
              <ul class="list-unstyled">
                <li>
                  <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-image "></i> Absensi.png</a>
                </li>
                <li>
                  <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-image "></i> Absensi.png</a>
                </li>
                <li>
                  <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-image "></i> Absensi.png</a>
                </li>
              </ul>
              <div class="text-center mt-5 mb-3">
                <a href="#" class="btn btn-sm btn-primary">Add files</a>
                <a href="#" class="btn btn-sm btn-warning">Report contact</a>
              </div>
            </div>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
@endsection