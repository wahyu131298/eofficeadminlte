@extends('layouts.layout')
@section('title', 'Dashboard')
@section('konfirmasi','active')
@section('body')
<!-- Modal Tolak Memo -->
<div class="modal fade" id="formtolak" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Catatan</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <form id="tolak">
          
              <div class="modal-body">
              @csrf
              {{ method_field('PUT')}}
                      <input type="hidden" id="nomemo" name="nomemo">
                      <div class="form-group">
                          <label for="catatan" class="col-form-label">Alasan Memo Ditolak</label>
                          <textarea class="form-control"  name="catatan" required></textarea>
                      </div>
                      
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Tolak</button>
              </div>
          </form>
      </div>
    </div>
  </div>
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Konfrimasi Memo</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Konfrimasi Memo</li>
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
                            <th style="display:none" >ID Memo</th>
                            <th>No Memo</th>
                            <th>Dari</th> 
                            <th>Perihal</th> 
                            <th>Tanggal Memo</th> 
                            <th>Lampiran</th> 
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($konfirm as $item)
                        <tr>                         
                            <td>{{++$i}}</td>
                            <td style="display:none">{{ $item->id_memo}}</td>
                            <td>{{ $item->no_surat}}</td>
                            <td>{{ $item->jabatan}}</td>
                            <td>{{ $item->perihal}}</td>
                            <td>{{ date("d F Y", strtotime($item->tgl_surat))}}</td>
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
                                    <a class="dropdown-item" href="/konfirmasi-memo/view/{{$item->id_memo}}" target="_blank">Lihat</a>
                                    <a class="dropdown-item konfirm" href="/memo/setuju/{{$item->id_memo}}">Setuju</a>
                                    <a class="dropdown-item btntolak" href="#">Tolak</a>
                                </div>  
                            </td>
                        </tr>
                    @endforeach                                       
                   </tbody>
                </table>
               
                
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
              {{-- Visit <a href="https://select2.github.io/">Select2 documentation</a> for more examples and information about
              the plugin. --}}
            </div>
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
    $(document).ready(function(){
        $('table').on('click','.btntolak',function(){
            $('#formtolak').modal('show');
            $tr = $(this).closest('tr');
            var data = $tr.children("td").map(function(){
                return $(this).text();
            }).get();
            // console.log(data);
            $('#nomemo').val(data[1]);
        });
         //Update
        $('#tolak').on('submit', function(e){
            e.preventDefault();
            //var kode = $('#nomemo').val();
    
            $.ajax({
                type : "GET",
                url  : "/memo/tolak",
                data : $('#tolak').serialize(),
                success: function(response){
                    // console.log(response)
                    $('#formtolak').modal('hide')
                      Swal.fire({
                                icon: 'error',
                                title: 'Berhasil',
                                text: 'Memo Berhasil Ditolak',
                                confirmButtonText: 'Ok',
                                }).then((result) => {
                                /* Read more about isConfirmed, isDenied below */
                                if (result.isConfirmed) {
                                   location.reload();
                                } 
                                });
                           
                      //alert()->success('Title','Lorem Lorem Lorem');
                },
                error:function(error){
                    console.log(error)
                  
                }
            });
        });
    
        $('table').on('click','.konfirm',function(){
                    var getLink = $(this).attr('href');
                    swal.fire({
                            title: 'Meyetujui Memo ?',
                            text: 'Yakim Ingin Meyetujui Memo',
                            icon: 'warning',
                            confirmButtonText: 'Setuju',
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
