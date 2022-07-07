@extends('layouts.layout')
@section('title', 'Dashboard')
@section('main','active')
@section('body')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Dashboard</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
<section class="content">
<div class="container-fluid">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
          <div class="inner">
            <h3>  {{$memomasuk}}</h3>

            <p>Memo Masuk</p>
          </div>
          <div class="icon">
            <i class="fas fa-solid fa-envelope-circle-check"></i>
          </div>
          <a href="/memo-masuk" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
          <div class="inner">
            <h3>{{$memokeluar}}</h3>

            <p>Memo Keluar</p>
          </div>
          <div class="icon">
            <i class="fas fa-solid fa-paper-plane"></i>
          </div>
          <a href="/memo-keluar" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
          <div class="inner">
            <h3>{{$dismasuk}}</h3>

            <p>Disposisi Masuk</p>
          </div>
          <div class="icon">
            <i class="fas fa-solid fa-file-arrow-down"></i>
          </div>
          <a href="/disposisi-masuk" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
          <div class="inner">
            <h3>{{$diskeluar}}</h3>

            <p>Disposisi Keluar</p>
          </div>
          <div class="icon">
            <i class="fas fa-solid fa-file-arrow-up"></i>
          </div>
          <a href="/disposisi-keluar" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
          <div class="inner">
            <h3>{{$forwardmemomasuk}}</h3>

            <p> Forward Disposisi Masuk</p>
          </div>
          <div class="icon">
            <i class="fas fa-solid fa-share arrow-turn-right"></i>
           
          </div>
          <a href="/forward/masuk" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
          <div class="inner">
            <h3>{{$forwardmemokeluar}}</h3>

            <p> Forward Disposisi Keluar</p>
          </div>
          <div class="icon">
            <i class="fas fa-solid fa-share"></i>
          </div>
          <a href="/forward/keluar" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      @if (auth()->user()->level == 'kabag' || auth()->user()->level == 'admin' )
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
          <div class="inner">
            <h3>{{$konfirm}}</h3>

            <p>Konfirmasi Memo</p>
          </div>
          <div class="icon">
            <i class="fas fa-solid fa-file-circle-check"></i>
          </div>
          <a href="/konfir-memo" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      @endif
      @if (auth()->user()->level == 'admin')
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-warning">
          <div class="inner">
            <h3>{{$user}}</h3>

            <p>Pengguna</p>
          </div>
          <div class="icon">
            <i class="fas fa-solid fa-users"></i>
          </div>
          <a href="/list-user" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-warning">
          <div class="inner">
            <h3>{{$jabatan}}</h3>

            <p>Jabatan</p>
          </div>
          <div class="icon">
            <i class="fas fa-solid fa-user-tag"></i>
          </div>
          <a href="/list-jabatan" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      @endif
      @if (auth()->user()->level == 'dirut' || auth()->user()->level == 'admin')
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-light">
          <div class="inner">
            <h3>{{$surat}}</h3>

            <p>Disposisi Surat Keluar</p>
          </div>
          <div class="icon">
            <i class="fas fa-regular fa-envelope"></i>
          </div>
          <a href="/surat/disposisi/terkirim" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      @endif
      @if (auth()->user()->level != 'dirut' || auth()->user()->level == 'admin')
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-light">
          <div class="inner">
            <h3>{{$suratmasuk}}</h3>

            <p> Disposisi Surat Masuk</p>
          </div>
          <div class="icon">
            <i class="fas fa-solid fa-envelope-open"></i>
          </div>
          <a href="/surat/disposisi/masuk" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-light">
          <div class="inner">
            <h3>{{$forwardterkirim}}</h3>

            <p>Forward Disposisi Surat Keluar</p>
          </div>
          <div class="icon">
            <i class="fas fa-solid fa-reply-all"></i>
          </div>
          <a href="/forward/disposisi/surat/keluar" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-light">
          <div class="inner">
            <h3>{{$forwardmasuk}}</h3>

            <p> Forward Disposisi Surat Masuk</p>
          </div>
          <div class="icon">
            <i class="fas fa-solid fa-reply-all"></i>
          </div>
          <a href="/forward/disposisi/surat/masuk" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      @endif
    </div>


    {{-- <!-- /.row -->
    <div class="row">
      <!-- Content Column -->
      <div class="col-lg-10 mb-10">
          <!-- Project Card Example -->
          <div class="card shadow mb-4">
              <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Pengguna</h6>
              </div>
              <div class="card-body">
  
                <div class="card-body table-responsive p-0" style="height: 300px;"> 
                  <table class="table table-head-fixed text-nowrap" id="example1" >
                          <thead>
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Terakhir Dilihat</th>
                                <th scope="col">Status</th>
                              
                              </tr>
                          </thead>
                          <tbody>
                              @foreach ($online as $useronline)
                                  <tr>
                                      <td> 
                                          @if( $useronline->jk == 'laki')
                                          <img class="img-profile rounded-circle" src="{{asset('/img/undraw_profile.svg')}}">
                                          @endif
                                          @if( $useronline->jk == 'perempuan')
                                          <img class="img-profile rounded-circle" src="{{asset('/img/undraw_profile_1.svg')}}">
                                          @endif
                                      </td>
                                      <td>
                                          {{$useronline->Nama}}
                                      </td>
                                      <td><span class="badge badge-pill badge-light">{{ Carbon\Carbon::parse($useronline->last_seen)->diffForHumans() }}</span></td>
                                      <td>
                                          @if(Cache::has('user-is-online-' . $useronline->id_user))
                                          <span class="badge badge-pill badge-success">Online</span>
                                              
                                          @else
                                          <span class="badge badge-pill badge-dark">Offline</span>
                                          @endif
                                      </td>
                                  </tr>
                              @endforeach
                          </tbody>
                    </table>
                  </div>
              </div>
          </div>
      </div>
    </div> --}}

    <div class="row">
      <div class="col-lg-10 mb-10">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Pengguna</h3>

            {{-- <div class="card-tools">
              <div class="input-group input-group-sm" style="width: 150px;">
                <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                <div class="input-group-append">
                  <button type="submit" class="btn btn-default">
                    <i class="fas fa-search"></i>
                  </button>
                </div>
              </div>
            </div> --}}
          </div>
          <!-- /.card-header -->
          <div class="card-body table-responsive p-0" style="height: 500px;">
            <table class="table table-head-fixed text-nowrap">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Nama</th>
                  <th scope="col">Terakhir Dilihat</th>
                  <th scope="col">Status</th>
                
                </tr>
            </thead>
            <tbody>
                @foreach ($online as $useronline)
                    <tr>
                        <td> 
                            @if( $useronline->jk == 'laki')
                            <img class="img-profile rounded-circle" src="{{asset('/img/undraw_profile.svg')}}">
                            @endif
                            @if( $useronline->jk == 'perempuan')
                            <img class="img-profile rounded-circle" src="{{asset('/img/undraw_profile_1.svg')}}">
                            @endif
                        </td>
                        <td>
                            {{$useronline->Nama}}
                        </td>
                        <td><span class="badge badge-pill badge-light">{{ Carbon\Carbon::parse($useronline->last_seen)->diffForHumans() }}</span></td>
                        <td>
                            @if(Cache::has('user-is-online-' . $useronline->id_user))
                            <span class="badge badge-pill badge-success">Online</span>
                                
                            @else
                            <span class="badge badge-pill badge-dark">Offline</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
    </div>
  
    <!-- Main row -->
    <div class="row">
      
    </div>
    <!-- /.row (main row) -->
  </div><!-- /.container-fluid -->
</section>
@endsection
@push('after-script')

<script src="https://www.gstatic.com/firebasejs/7.23.0/firebase.js"></script>
<script>
    $(document).ready(function(){
        initFirebaseMessagingRegistration();
    });
    var firebaseConfig = {
        apiKey: "AIzaSyDPPINivcM9Sj9SkabCNfnXd82q3bjdpac",
        authDomain: "laravelapp-e0d31.firebaseapp.com",
        projectId: "laravelapp-e0d31",
        storageBucket: "laravelapp-e0d31.appspot.com",
        messagingSenderId: "325458778784",
        appId: "1:325458778784:web:199341e428c0bd9556c7c5"
    };
      
    firebase.initializeApp(firebaseConfig);
    const messaging = firebase.messaging();
  
    function initFirebaseMessagingRegistration() {
            messaging
            .requestPermission()
            .then(function () {
                return messaging.getToken()
            })
            .then(function(token) {
                console.log(token);
   
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
  
                $.ajax({
                    url: '{{ route("save-token") }}',
                    type: 'POST',
                    dataType: 'JSON',
                    data: {
                        token: token
                    },
                    success: function (response) {
                        console.log('Token saved successfully.');
                    },
                    error: function (err) {
                        console.log('User Chat Token Error'+ err);
                    },
                });
  
            }).catch(function (err) {
                console.log('User Chat Token Error'+ err);
            });
     }  
      
    messaging.onMessage(function(payload) {
        const noteTitle = payload.notification.title;
        const noteOptions = {
            body: payload.notification.body,
            icon: payload.notification.icon,
        };
        new Notification(noteTitle, noteOptions);
    });
   
   
</script>

{{-- <!-- DataTables  & Plugins -->
<script src="{{asset('/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('/plugins/jszip/jszip.min.js')}}"></script>
<script src="{{asset('/plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset('/plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{asset('/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>

<script>
    $("#example1").DataTable({
        responsive: true,
        ordering: false,
        info: false,
        bFilter : false
    });
</script> --}}
@endpush
