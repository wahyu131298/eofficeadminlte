@extends('layouts.layout')
@section('title', 'Disposisi Masuk')
@section('main-dis','menu-open')
@section('submain-dis','active')
@section('masuk-dis','active')
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
          <h1 class="m-0">Disposisi Masuk</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Disposisi Masuk</li>
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
                            <th>Perihal</th> 
                            <th>Pengirim</th> 
                            <th>Tanggal Disposisi</th> 
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                   
                    @foreach ($dismasuk as $item)
                        <tr @if ($item->tgl_disposisi_dilihat == null)class="table-info" style="font-weight: 700;"@endif>                         
                            <td>{{++$i}}</td>
                            <td>{{ $item->no_surat}}</td>
                            <td>{{ $item->perihal}}</td>
                            <td>{{ $item->jabatan}}</td>
                            <td>{{ date("d-F-Y", strtotime($item->tgl_disposisi))}}</td>
                            <td> 
                             <button class="btn btn-outline-danger dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">Aksi</button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item " href="/memo-disposisi/view/{{$item->id_memo_disposisi}}" title="Lihat Memo" target="_blank">Lihat Memo</a>
                                    @if ($item->lampiran != null)
                                        <a data-id="{{$item->id_memo}}" class="dropdown-item btn-lampiran" href="#" title="Lihat Lampiran">Lihat Lampiran</a>
                                    @endif
                                    <a class="dropdown-item view-disposisi" href="/disposisi/view/{{$item->id_disposisi}}" target="_blank">Lihat Disposisi</a>
                                    <a class="dropdown-item" href="/disposisi/forward/{{$item->id_disposisi}}">Forward Disposisi</a>
                                    @if (auth()->user()->level == 'admin')
                                    <a class="dropdown-item hapusdisposisi" href="/disposisi/hapus/{{$item->id_disposisi}}">Hapus Disposisi</a>
                                    @endif
                                    {{-- /disposisi/hapus/{{$item->id_disposisi}} --}}
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
        $('table').on('click','.hapusdisposisi',function(){
            var getLink = $(this).attr('href');
            swal.fire({
                    title: 'Hapus Disposisi',
                    text: 'Yakim Ingin Hapus Data Disposisi',
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
