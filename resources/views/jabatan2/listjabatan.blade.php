@extends('layouts.layout')
@section('title', 'Master Jabatan')
@section('master','menu-open')
@section('submaster','active')
@section('jabatan','active')
@section('body')
<!-- Modal Tambah Data -->
<div class="modal fade" id="addJabatanmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
       
          <h5 class="modal-title" id="exampleModalLabel">Tambah Jabatan</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
          <form id="addjabatan">
              @csrf
              <div class="modal-body">
                <!--Modal Body-->    
                <div class="form-group">
                    <label for="kode" class="col-form-label">Kode Jabatan</label>
                    <input type="text" class="form-control" name="kode" value="{{$kode}}" readonly>
                </div>
                <div class="form-group">
                    <label for="jabatan" class="col-form-label">Jabatan</label>
                    <input type="text" class="form-control"  name="jabatan" required>
                </div>      
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Save</button>
              </div>
          </form>
      </div>
    </div>
  </div>
  
  <!-- Modal Edit Data -->
  <div class="modal fade" id="editJabatanmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
       
          <h5 class="modal-title" id="exampleModalLabel">Edit Data Jabatan</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
          <form id="editjabatan" method="POST" action="">
          @csrf
              <div class="modal-body">
                <!--Modal Body-->
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Ganti</button>
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
          <h1 class="m-0">Master Jabatan</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Master Jabatan</li>
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
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addJabatanmodal">
                    Tambah Data
                </button>     
            </div>  
            <div class="card-body">
                <table id="example1" class="table table-bordered"  width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Jabatan</th>
                            <th>Nama Jabatan</th> 
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($jabatan as $jab)
                        <tr>                         
                            <td>{{ ++$i }}</td>
                            <td>{{ $jab->id}}</td>
                            <td>{{ $jab->jabatan}}</td>
                            <td>  
                                <a data-id="{{ $jab->id}}" class="btn btn-success editbtn" href="#">
                                    <i class="fas fa-pen"></i>
                                </a>     
                                <a class="btn btn-danger hapusbtn" href="/jabatan/hapus/{{$jab->id}}">
                                    <i class="fas fa-trash"></i>
                                </a>     
                                        
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
    //ADD Jabatan
    $(document).ready(function(){
        $('#addjabatan').on('submit', function(e){
            e.preventDefault();
            $.ajax({
                type : "POST",
                url: "/insert-jabatan",
                data : $('#addjabatan').serialize(),
                success: function(response){
                    console.log(response)
                    $('#addJabatanmodal').modal('hide')
                     Swal.fire({
                                icon: 'success',
                                title: 'Berhasil',
                                text: 'Jabatan Berhasil Disimpan',
                                confirmButtonText: 'Ok',
                                }).then((result) => {
                                /* Read more about isConfirmed, isDenied below */
                                if (result.isConfirmed) {
                                   location.reload();
                                } 
                                });
                       
                },
                error:function(error){
                    console.log(error)
                    Swal.fire(
                            'Gagal',
                            'Data Gagal Disimpan',
                            'error'
                            );
                            location.reload(); 
                }
            });
        }); 
    //edit
        $('table').on('click','.editbtn',function(){
            //console.log($(this).data('id'))

            let idjabatan = $(this).data('id')
            $.ajax({
                url : `/form/jabatan/${idjabatan}`,
                method : 'GET',
                success : function (data) {
                    $('#editJabatanmodal').find('.modal-body').html(data);
                    $('#editJabatanmodal').modal('show');
                },
                error : function (error) { 
                    console.log(error)
                }    
            })
        });
    
        //Update
        $('#editjabatan').on('submit', function(e){
            e.preventDefault();
            var kode = $('#kode').val();
    
            $.ajax({
                type : "PUT",
                url  : "/update-jabatan/"+kode,
                data : $('#editjabatan').serialize(),
                success: function(response){
                    console.log(response)
                    $('#editJabatanmodal').modal('hide')
                      location.reload();
                      Swal.fire({
                                icon: 'success',
                                title: 'Berhasil',
                                text: 'Jabatan Berhasil Diubah',
                                confirmButtonText: 'Ok',
                                })
                },
                error:function(error){
                    console.log(error)
                    alert("Data Gagal Diganti");
                }
            });
        });
    
    
    
    //Hapus Jabatan
           $('table').on('click','.hapusbtn',function(){
                    var getLink = $(this).attr('href');
                    swal.fire({
                            title: 'Hapus Jabtan',
                            text: 'Yakim Ingin Hapus Data Jabatan',
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
