@extends('layouts.layout')
@section('title', 'Memo Masuk')
@section('main','menu-open')
@section('submain','active')
@section('masuk','active')
@section('body')
<!-- Modal View Notulen -->
<div class="modal fade" id="formviewnotulen" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Notulen</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <form id="viewnotulen">
          
              <div class="modal-body">
              @csrf
              {{ method_field('PUT')}}
                      <input type="hidden" id="idmemo3" name="idmemo3">
                      <input type="hidden" id="nomemo3" name="nomemo3">
                      <div class="form-group">
                          <label for="catatan3" class="col-form-label">Catatan</label>
                          <textarea class="form-control" id="catatan3" name="catatan3" required></textarea>
                      </div>
                      
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
          <h1 class="m-0">Memo Masuk</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Memo Masuk</li>
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
                            <th>Dari</th> 
                            <th>Perihal</th> 
                            <th>Tanggal Memo</th> 
                            <th>Lampiran</th> 
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($memomasuk as $item)
                        <tr @if ($item->status == 'belum')class="table-info" style="font-weight: 700;"@endif>  

                            <input type="hidden" id="id_memo" value="{{$item->id_memo}}" >                                            
                            <input type="hidden" id="no_memo" value="{{$item->no_surat}}" >                                            
                            <input type="hidden" id="isi" name="isi" value="{{$item->isi}}" > 

                            <td>{{++$i}}</td>
                            <td>{{ $item->no_surat}}</td>
                            <td>{{ $item->jabatan}}</td>
                            <td>{{ $item->perihal}}</td>
                            <td>{{ date("d F Y", strtotime($item->tgl_surat))}}</td>
                            <td>
                                @if ($item->lampiran == null)
                                <span class="badge badge-dark">Tidak Ada</span>
                             
                                @else
                                {{-- <span class="badge badge-primary">Primary</span> --}}
                                    <a href="/file/lampiran/{{$item->lampiran}}"  class="badge badge-primary" target="_blank">View</a>
                                @endif
                            </td>
                            <td>  
                                <button class="btn btn-outline-danger dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">Aksi</button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item view-memo" href="/memo/view/{{$item->id_memo}}" target="_blank" >Lihat Memo</a>
                                    <a class="dropdown-item" href="/memo-masuk/disposisi/{{$item->id_memo}}">Disposisi</a>
                                    @if ($item->jns_memo == 'undangan')
                                         <a class="dropdown-item btn-view-notulen" href="#">Lihat Notulen</a>
                                    @endif
                                   
                                    @if (auth()->user()->level == 'admin')
                                    <a class="dropdown-item hapusmemo" href="/memo/hapus/{{$item->id_memo}}">Hapus</a>
                                    @endif
                                    
                                </div>  
                                
                            </td>
                        </tr>
                    @endforeach                                       
                   </tbody>
                </table>
                    
                 
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
      $('table').on('click','.hapusmemo',function(){
          var getLink = $(this).attr('href');
          swal.fire({
                  title: 'Hapus Memo',
                  text: 'Yakim Ingin Hapus Data Memo',
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

      $('table').on('click','.view-memo',function(){
          
          // var getLink = $(this).attr('href');
          // window.location.href = getLink
          // var newtabs = $(this).attr('target');
          // var id = $('#id_memo').val();
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
<script>
    $(document).ready(function(){
        //edit
        $('table').on('click','.btn-view-notulen',function(){
                $('#formviewnotulen').modal('show');
                $tr = $(this).closest('tr');
                var data = $tr.children("input").map(function(){
                    return $(this).val();
                }).get();
                console.log(data);

                $('#idmemo3').val(data[0]);
                $('#nomemo3').val(data[1]);
                $('#catatan3').val(data[2]);
            });
    });
</script>
@endpush
