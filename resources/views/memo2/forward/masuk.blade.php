@extends('layouts.layout')
@section('title', 'Forward Disposisi Masuk')
@section('main-dis','menu-open')
@section('submain-dis','active')
@section('masuk-for','active')
@section('body')

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Forward Disposisi Masuk</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Forward Disposisi Masuk</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
<section class="content">
    <div class="container-fluid">
        <div class="card card-default">
            <div class="card-body">
                <table class="table table-bordered" id="example1" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>No Memo</th>
                            <th>Diteruskan Oleh</th> 
                            <th>File Memo</th>
                            <th>Lampiran</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                   
                    @foreach ($forwardmasuk as $item)
                        <tr @if ($item->status == 1)class="table-info" style="font-weight: 700;"@endif>                         
                            <td>{{++$i}}</td>
                            <td>{{ $item->no_surat}}</td>
                            <td>{{ $item->jabatan}}</td>
                            <td>
                             <a href="/memo-disposisi/view/{{ $item->id_memo}}" class="badge badge-primary" target="_blank">View</a>
                            </td>
                            <td>
                                @if ($item->lampiran == null)
                                <span class="badge badge-dark">Tidak Ada</span>
                                @else
                                    <a href="/file/lampiran/{{$item->lampiran}}" class="badge badge-primary" target="_blank">View</a>
                                @endif
                            </td>
                            <td>
                             <button class="btn btn-outline-danger dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">Aksi</button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item view-disposisi" href="/forward/disposisi/lihat/{{$item->id_disposisi_frw}}" target="_blank">Lihat Disposisi</a>
                                    @if (auth()->user()->level == 'admin')
                                        <a class="dropdown-item hapusforward" href="/forward/disposisi/hapus/{{$item->id_forward}}">Hapus</a>
                                    @endif
                                    
                                </div>
                            </td>
                        </tr>
                    @endforeach                                       
                   </tbody>
                </table>
                
            </div>         
            <!-- /.card-body -->
            
        </div>
        <!-- /.card -->
    </div><!-- /.container-fluid -->
</section>
@endsection
@push('after-script')
<!-- DataTables  & Plugins -->
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
      "responsive": true
    });
</script>

<script>
    $(document).ready(function($){
        $('table').on('click','.hapusforward',function(){
            var getLink = $(this).attr('href');
            swal.fire({
                    title: 'Hapus Disposisi Forward',
                    text: 'Yakim Ingin Hapus Data Disposisi Forward',
                    icon: 'warning',
                    confirmButtonText: 'Hapus',
                    confirmButtonColor: '#d9534f',
                    showCancelButton: true,
                    showConfirmButton: true,
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = getLink
                    }
                });
            return false;
        });

        $('table').on('click','.view-disposisi',function(){
            $.ajax({
                // url:"/memo/view/"+id,
                url : $(this).attr('href'),
                success:function(){
                  
                    location.reload();
                }
            })
        });
    });
 
</script>
@endpush
