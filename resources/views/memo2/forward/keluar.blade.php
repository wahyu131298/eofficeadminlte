@extends('layouts.layout')
@section('title', 'Forward Disposisi Masuk')
@section('main-dis','menu-open')
@section('submain-dis','active')
@section('keluar-for','active')
@section('body')

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
          <h1 class="m-0">Forward Disposisi Keluar</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Forward Disposisi Keluar</li>
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
                            <th>Disposisi Dari</th> 
                            <th>Diteruskan Kpd</th> 
                            <th>File Memo</th>
                            <th>Lampiran</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                   
                    @foreach ($forwardkeluar as $item)
                        <tr>                         
                            <td>{{++$i}}</td>
                            <td>{{ $item->no_surat}}</td>
                            <td>{{ $item->jabatan}}</td>
                            <td>{{ $item->jabatan_penerima}}</td>
                           
                            <td>
                             <a href="/memo-disposisi/view/{{ $item->id_memo}}" class="badge badge-primary" target="_blank">Lihat</a>
                            </td>
                            <td>
                                @if ($item->lampiran == null)
                                <span class="badge badge-dark">Tidak Ada</span>
                                @else
                                    <a data-id="{{$item->id_memo}}" href="#" class="badge badge-primary btn-lampiran">Lihat</a>
                                @endif
                            </td>
                            <td>
                                @if ($item->status == 1)
                                    <span class="badge badge-danger">Belum Dilihat</span>
                                @else
                                    <span class="badge badge-success">Sudah Dilihat {{ $item->tgl_dibaca }}</span>
                                 @endif
                            </td>
                          
                            <td>
                             <button class="btn btn-outline-danger dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">Aksi</button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="/forward/disposisi/view/{{$item->id_disposisi_frw}}" target="_blank">Lihat Disposisi</a>
                                    <a class="dropdown-item hapusfrw" href="/forward/disposisi/hapus/{{$item->id_forward}}">Hapus Forward</a>
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
        $('table').on('click','.hapusfrw',function(){
            var getLink = $(this).attr('href');
            swal.fire({
                    title: 'Hapus Forward Disposisi',
                    text: 'Yakim Ingin Hapus Forward Disposisi',
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

        //View Modal Lampiran
        $('table').on('click','.btn-lampiran',function(){
            // console.log($(this).data('id'))
            let id = $(this).data('id')
            
            $.ajax({
                url : `/lampiran/view/${id}`,
                method : 'GET',
                success : function (data) {
                    // console.log(data)
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
