@extends('layouts.layout')
@section('title', 'Disposisi Terkirim')
@section('main-dis-ex','menu-open')
@section('submain-dis-ex','active')
@section('keluar-dis-ex','active')
@section('body')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Disposisi Terkirim</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Disposisi Terkirim</li>
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
                            <th>Perihal</th> 
                            <th>Tanggal Disposisi</th> 
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                   
                    @foreach ($terkirim as $item)
                        <tr>                         
                            <td>{{++$i}}</td>
                            <td>{{ $item->no_surat}}</td>
                            <td>{{ $item->pengirim}}</td>
                            <td>{{ $item->perihal}}</td>
                            <td>{{ date("d-F-Y", strtotime($item->tgl)) }}</td>
                            <td> 
                             <button class="btn btn-outline-danger dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">Aksi</button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="/surat/detail/{{$item->id_surat}}" title="Detail Surat">Detail Perjalanan Surat</a>
                                    <a class="dropdown-item" href="{{asset('/file/surat')}}/{{$item->file}}" title="Lihat Surat" target="_blank">Lihat Surat</a>
                                    <a class="dropdown-item" href="/lihat/surat/disposisi/terkirim/{{$item->id_surat}}" title="Lihat Disposisi" target="_blank">Lihat Disposisi</a>
                                    @if (auth()->user()->level == 'admin')
                                        <a class="dropdown-item hapusdisposisi" href="/hapus/surat/disposisi/terkirim/{{$item->id_surat}}" title="Hapus Disposisi" target="_blank">Hapus Disposisi</a>
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
        $('table').on('click','.hapusdisposisi', function(){
            var getLink = $(this).attr('href');
            swal.fire({
                    title: 'Hapus Disposisi',
                    text: 'Yakin Ingin Hapus Data Disposisi',
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
