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
                     
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
          </form>
      </div>
    </div>
  </div>
<!-- Modal View Lampiran -->
<div class="modal fade" id="formlampiran" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Lampiran Memo</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <form id="viewlampiran">
              <div class="modal-body">
                     
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
                            <th>Jenis Memo</th>
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
                            <td>{{++$i}}</td>
                            <td>{{ $item->no_surat}}</td>
                            <td>
                                @if ($item->jns_memo == 'undangan')
                                    Undangan
                                @elseif($item->jns_memo == 'pengajuan')
                                    Pengajuan
                                @elseif($item->jns_memo == 'laporan')
                                    Laporan
                                @elseif($item->jns_memo == 'lain')
                                    Lain-Lain
                                @endif
                            </td>
                            <td>{{ $item->jabatan}}</td>
                            <td>{{ $item->perihal}}</td>
                            <td>{{ date("d F Y", strtotime($item->tgl_surat))}}</td>
                            <td>
                                @if ($item->lampiran == null)
                                    <span class="badge badge-dark">Tidak Ada</span>
                                @else           
                                    <a data-id="{{$item->id_memo}}" href="#" class="badge badge-primary btn-lampiran">Lihat</a>
                                @endif
                            </td>
                            <td>  
                                <button class="btn btn-outline-danger dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">Aksi</button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item view-memo" href="/memo/view/{{$item->id_memo}}" target="_blank" >Lihat Memo</a>
                                    <a class="dropdown-item" href="/memo-masuk/disposisi/{{$item->id_memo}}">Disposisi</a>
                                    @if ($item->jns_memo == 'undangan' && $item->id_memo_not != null)
                                    <a data-id="{{$item->id_memo}}" class="dropdown-item btn-view-notulen" href="#">Lihat Notulen</a>
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
        //Lihat Notulen
        $('table').on('click','.btn-view-notulen',function(){
        //console.log($(this).data('id'))
        let id = $(this).data('id')
        $.ajax({
            url : `/notulen/lihat/${id}`,
            method : 'GET',
            success : function (data) {
                //console.log(data)
                $('#formviewnotulen').find('.modal-body').html(data)    
                $('#formviewnotulen').modal('show');
            },
            error : function (error) {
                console.log(error)    
            }
        })
        });

        //View Modal Lampiran
        $('table').on('click','.btn-lampiran',function(){
            console.log($(this).data('id'))
            let id = $(this).data('id')
            
            $.ajax({
                url : `/lampiran/view/${id}`,
                method : 'GET',
                success : function (data) {
                    console.log(data)
                    $('#formlampiran').find('.modal-body').html(data)    
                    $('#formlampiran').modal('show');
                },
                error : function (error) {
                    console.log(error)    
                }
            })
        });
    });    
</script>
@endpush
