@extends('layouts.layout')
@section('title', 'Memo Keluar')
@section('main','menu-open')
@section('submain','active')
@section('keluar','active')
@section('body')
<!-- Modal Insert Notulen  Data -->
<div class="modal fade" id="formnotulen" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Notulen</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <!--Modal Notulen-->
            <form id="notulen" action="/notulen/create" method="POST">
                @csrf
                <div class="modal-body">
                    <!--Body Notulen => memo2.keluar.modal-notulen--> 
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary btn-simpan">Simpan</button>
                </div>
            </form>
      </div>
    </div>
  </div>


<!-- Modal Edit Notulen -->
<div class="modal fade" id="formeditnotulen" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Edit Notulen</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <!--Edit Notulen-->
          <form id="editnotulen" action="/notulen/update" method="POST">
            @csrf
              <div class="modal-body">
                     
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary btn-ganti">Ganti</button>
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
          <h1 class="m-0">Memo Keluar</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Memo Keluar</li>
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
                            <th>Perihal</th> 
                            <th>Tanggal Memo</th>
                            {{-- <th>Kepada</th>
                            <th>CC</th> --}}
                           
                            <th>Lampiran</th>
                            <th>Status</th> 
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                   
                    @foreach ($memokeluar as $item)
                        <tr>
                            {{-- <input type="hidden" id="id_memo" value="{{$item->id_memo}}" >                                            
                            <input type="hidden" id="no_memo" value="{{$item->no_surat}}" >                                            
                            <input type="hidden" id="isi" name="isi" value="{{$item->isi}}" >                         
                             --}}
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
                            <td>{{ $item->perihal}}</td>
                            <td>{{ date("d F Y", strtotime($item->tgl_surat))}}</td>
                            {{-- <td>{{ $item->kepada}}</td>
                            <td>{{ $item->cc}}</td> --}}
                            <td>
                                @if ($item->lampiran == null)
                                <span class="badge badge-dark">Tidak Ada</span>
                                @else
                                
                                    <a data-id="{{$item->id_memo}}" href="#" class="badge badge-primary btn-lampiran">Lihat</a>
                                @endif
                            </td>
                            <td>
                                @if ($item->status_konfirm == '2' && $item->mengetahui != '-')
                                    <span class="badge badge-success">Disetujui oleh <br>
                                        {{$item->jabatan}} <br>
                                         pada {{ date("d F Y", strtotime($item->tgl_konfirm))}}</span>
                                @endif
                                @if ($item->status_konfirm == '2' && $item->mengetahui == '-')
                                     <span class="badge badge-success">Tidak Membutuhkan Konfirmasi</span>
                                
                                @elseif($item->status_konfirm == '1' && $item->mengetahui != '-')
                                    <span class="badge badge-dark">Belum Dikonfirmasi oleh <br>
                                        {{$item->jabatan}}</span>
                                    
                                @endif

                                @if ($item->status_konfirm == '3')
                                    {{-- <span class="badge badge-danger">Memo Ditolak</span><br> --}}
                                    <a class="badge badge-warning" data-toggle="collapse" href="#collapseExample-{{$item->id_memo}}" aria-expanded="false" aria-controls="collapseExample">
                                       Memo Ditolak
                                    </a>
                                    <div class="collapse" id="collapseExample-{{$item->id_memo}}">
                                        <div class="card card-body">
                                            {{$item->catatan}}
                                        </div>
                                    </div>
                                @endif                             
                            </td>
                           
                            <td>  
                                <button class="btn btn-outline-danger dropdown-toggle " type="button" data-toggle="dropdown" aria-expanded="false">Aksi</button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="/memo-keluar/view/{{$item->id_memo}}" target="_blank">Lihat Memo</a>
                                    <a class="dropdown-item" href="/memo/detail/{{$item->id_memo}}">Detail Memo</a>
                                    {{-- @if ($item->id_disposisi != null) --}}
                                          {{-- <a class="dropdown-item" href="/memo/tracking/{{$item->id_disposisi}}">Tindakan Memo</a> --}}
                                          <a class="dropdown-item" href="/memo/tracking/{{$item->id_memo}}">Tindakan Memo</a>
                                    {{-- @endif --}}
                                  
                                    @if ($item->id_memo_not == null && $item->jns_memo == 'undangan')
                                        <a data-id="{{$item->id_memo}}" class="dropdown-item btn-notulen" href="#">Tambah Notulen</a>
                                    @endif
                                    @if($item->id_memo_not != null)
                                        <a data-id="{{$item->id_memo}}" class="dropdown-item btn-edit-notulen" href="#">Edit Notulen</a>
                                        <a class="dropdown-item btn-hapus-notulen" href="/notulen/hapus/{{$item->id_memo}}">Hapus Notulen</a>
                                    @endif
                                    {{-- @if (auth()->user()->level == 'admin') --}}
                                    <a class="dropdown-item hapusmemo" href="/memo/hapus/{{$item->id_memo}}">Hapus Memo</a>
                                    {{-- @endif --}}
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
      "responsive": true, 
    });
</script>
<!--Hapus Memo-->
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

<!--View Notulen-->
<script>
$(document).ready(function(){
    //View Modal Notulen
    $('table').on('click','.btn-notulen',function(){
        let id = $(this).data('id')
        $.ajax({
            url : `/notulen/view/${id}`,
            method : 'GET',
            success : function (data) {
                //console.log(data)
                $('#formnotulen').find('.modal-body').html(data)    
                $('#formnotulen').modal('show');
            },
            error : function (error) {
                console.log(error)    
            }
        })
    });
     //insert Notulen
    $('#notulen').on('submit', function(e){
        e.preventDefault();
        $.ajax({
            type : "POST",
            url  : "/notulen/create",
            data : $('#notulen').serialize(),
            success: function(response){
                console.log(response)
                $('#formnotulen').modal('hide');
                  Swal.fire({
                            icon: 'success',
                            title: 'Berhasil',
                            text: 'Notulen Berhasil Ditambahkan',
                            confirmButtonText: 'Ok',
                            }).then((result) => {
                            /* Read more about isConfirmed, isDenied below */
                            if (result.isConfirmed) {
                            location.reload();
                             //$("#example1").DataTable().ajax.reload();
                            } 
                            });
            },
            error:function(error){
                console.log(error)
              
            }
        });
    });
    //view edit Notulen
    $('table').on('click','.btn-edit-notulen',function(){
        let id = $(this).data('id')
        $.ajax({
            url : `/notulen/edit/${id}`,
            method : 'GET',
            success : function (data) {
                //console.log(data)
                $('#formeditnotulen').find('.modal-body').html(data)    
                $('#formeditnotulen').modal('show');
            },
            error : function (error) {
                console.log(error)    
            }
        })
    });
     //Update Notulen
    $('#editnotulen').on('submit', function(e){
        e.preventDefault();
        $.ajax({
            type : "POST",
            url  : "/notulen/update",
            data : $('#editnotulen').serialize(),
            success: function(response){
                //console.log(response)
                $('#formeditnotulen').modal('hide');
                  Swal.fire({
                            icon: 'success',
                            title: 'Berhasil',
                            text: 'Notulen Berhasil Diubah',
                            confirmButtonText: 'Ok',
                            }).then((result) => {
                            /* Read more about isConfirmed, isDenied below */
                            if (result.isConfirmed) {
                                location.reload();
                                //$("#example1").DataTable().ajax.reload();
                            } 
                            });
            },
            error:function(error){
                console.log(error)
              
            }
        });
    });

    //Hapus Notulen
    $('table').on('click','.btn-hapus-notulen',function(){
        var getLink = $(this).attr('href');
        swal.fire({
            title: 'Hapus Notulen',
            text: 'Yakim Ingin Hapus Notulen',
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
