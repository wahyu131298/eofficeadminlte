@extends('layouts.layout')
@section('title', 'Setting Sistem')
@section('log','active')
@section('body')

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Log Aktivitas Sistem</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Log Aktivitas</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
<section class="content">
    <div class="container-fluid">
        <div class="card card-default">
            {{-- <div class="card-header">
                <a class="btn btn-danger" href="/setting">Kembali</a>
            </div> --}}
            <div class="card-body">
              <div class="table-responsive">
                <table id="example1" class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                          
                            <th>Tindakan</th> 
                            <th>Ip Addres</th> 
                            <th>Url</th> 
                            <th>Waktu</th> 
                        </tr>
                    </thead>
                    <tbody>
                   
                    @foreach ($log as $item)
                        <tr>                         
                            <td>{{ $item->tindakan}}</b></td>
                            <td><i>{{ $item->ip}}</i></td>
                            <td>{{ $item->url}}</td>
                            <td>{{ $item->created_at}}</td>
                        </tr>
                    @endforeach                                       
                   </tbody>
                </table>
              </div>
            </div>
            <!-- /.card -->
            {{-- <div class="card-footer">
                    <button type="submit" class="btn btn-primary" name="update">Update</button>
            </div> --}}
        </div>
    </div>
    <!-- /.container-fluid -->
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

@endpush
