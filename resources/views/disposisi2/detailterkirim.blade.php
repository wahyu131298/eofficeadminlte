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
          <h1 class="m-0">Detail Disposisi Terkirim</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Detail Disposisi Terkirim</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
<section class="content">
    <div class="container-fluid">
        <div class="card card-default">
            <div class="card-header">
                <a class="btn btn-danger" href="/surat/disposisi/terkirim">Kembali</a>
            </div>
            <div class="card-body">
                <table class="table table-bordered example1" width="100%" cellspacing="0">
                    <thead>
                        <tr class="table-info">
                            <th colspan="4">Disampaikan Kepada</th>
                        </tr>
                        <tr>
                            <th>No Surat</th>
                            <th>Nama Penerima</th>
                            <th>Jabatan</th> 
                            <th>Status</th> 
                        </tr>
                    </thead>
                    <tbody>
                   
                    @foreach ($disampaikan as $item)
                        <tr>                         
                            <td>{{ $item->no_surat}}</td>
                            <td>{{ $item->Nama}}</td>
                            <td>{{ $item->jabatan}}</td>
                            <td>
                                @if ($item->tgl_dilihat == null)
                                    <span class="badge badge-dark">Belum Dilihat</span>
                                @else
                                    <span class="badge badge-success">Sudah Dilihat {{ date("d-F-Y", strtotime($item->tgl_dilihat))}}</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach                                       
                   </tbody>
                </table>

                <table  class="table table-bordered example1" width="100%" cellspacing="0">
                    <thead>
                     `  <tr class="table-warning">
                            <th colspan="4">Diteruskan Kepada</th>
                        </tr>
                        <tr>
                            <th>No Surat</th>
                            <th>Nama</th> 
                            <th>Jabatan</th> 
                            <th>Status</th> 
                        </tr>
                    </thead>
                    <tbody>
                   
                    @foreach ($forward as $item)
                        <tr>                         
                            <td>{{ $item->no_surat}}</td>
                            <td>{{ $item->Nama}}</td>
                            <td>{{ $item->jabatan}}</td>
                            <td>
                                @if ($item->tgl_dibaca == null)
                                    <span class="badge badge-dark">Belum Dilihat</span>
                                @else
                                    <span class="badge badge-success">Sudah Dilihat {{date("d-F-Y", strtotime($item->tgl_dibaca))}}</span>
                                @endif
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
    $(".example1").DataTable({
        responsive: true,
        paging: false,
        ordering: false,
        info: false,
        bFilter  : false
      
    });
</script>


@endpush
