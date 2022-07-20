@extends('layouts.layout')
@section('title', 'Memo Keluar')
@section('main','menu-open')
@section('submain','active')
@section('keluar','active')
@section('body')

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Detail Memo Keluar</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Detail Memo</li>
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
                <a class="btn btn-danger" href="/memo-keluar">Kembali</a>
    
                {{-- <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div> --}}
              </div>
              <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>No Memo</th>
                      <th>Penerima</th> 
                      <th>Jabatan</th> 
                      <th>Tanggal Memo</th>
                      <th>Status Dilihat</th> 
                    </tr>
                  </thead>
                  <tbody>
                  @foreach ($detailMemo as $val)
                    <tr>                         
                      <td>{{++$i}}</td>
                      <td>{{ $val->no_surat}}</td>
                      <td>{{ $val->Nama}}</td>
                      <td>{{ $val->jabatan}}</td>
                      <td>{{ date("d F Y", strtotime($val->tgl_surat))}}</td>
                      <td>
                        @if ($val->status == 'sudah')
                            <span class="badge badge-success">Sudah Dilihat pada {{ date("d F Y", strtotime($val->tgl_lihat))}}</span>
                        @else
                            <span class="badge badge-danger">Belum Dilihat</span>
                        @endif                             
                      </td>
                    </tr>
                  @endforeach                                       
                  </tbody>
                </table>
            <!-- /.card-body -->
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
        responsive: true,
        paging: false,
        ordering: false,
        info: false,
        bFilter : false
      
    });
</script>
@endpush 
