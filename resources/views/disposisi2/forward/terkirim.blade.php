@extends('layouts.layout')
@section('title', 'Forward Terkirim (Admin)')
@section('main-dis-ex','menu-open')
@section('submain-dis-ex','active')
@section('terkirirm-for-ex','active')
@section('body')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Forward Terkirim (Admin)</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Forward Disposisi Terkirim</li>
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
                            <th>No Surat</th>
                            <th>Pengirim</th>
                            <th>Penerima</th>
                            <th>Tanggal Forward</th> 
                            <th>Status</th> 
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                   
                    @foreach ($terkirim as $item)
                        <tr>                         
                            <td>{{++$i}}</td>
                            <td>{{ $item->no_surat}}</td>
                            <td>{{ $item->pengirim}}</td>
                            <td>{{ $item->penerima}}</td>
                            <td>{{ date("d-F-Y", strtotime($item->tgl_forward))}}</td>
                            <td>
                            @if ($item->tgl_dibaca == null)
                               <span class="badge badge-dark">Belum Dilihat</span>
                            @else
                              <span class="badge badge-success">Sudah Dilihat pada {{date("d-F-Y", strtotime($item->tgl_dibaca))}}</span>
                            @endif
                            
                            </td>
                            <td> 
                             <button class="btn btn-outline-danger dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">Aksi</button>
                                <div class="dropdown-menu">
                                    
                                    <a class="dropdown-item" href="{{asset('/file/surat')}}/{{$item->file}}" title="Lihat Surat" target="_blank">Lihat Surat</a>
                                    <a class="dropdown-item" href="/lihat/disposisi/keluar/{{$item->id_surat}}" title="Lihat Disposisi" target="_blank">Lihat Disposisi</a>
                                   
                                    @if (auth()->user()->level == 'admin')
                                    <a class="dropdown-item hapusforward" href="/hapus/forward/disposisi/surat/{{$item->id_forward}}" title="Hapus Forward" target="_blank">Hapus Forward Disposisi</a>
                                    @endif
                                </div>   
                               
                            </td>
                        </tr>
                    @endforeach                                       
                   </tbody>
                </table>
            </div>
            <!-- /.card -->
        </div>
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
        $('.hapusforward').on('click',function(){
            var getLink = $(this).attr('href');
            swal.fire({
                    title: 'Hapus Forward Disposisi',
                    text: 'Yakim Ingin Hapus Data Forward Disposisi',
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
    });
 
</script>

@endpush
