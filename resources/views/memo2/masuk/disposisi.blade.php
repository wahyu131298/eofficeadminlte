@extends('layouts.layout')
@section('title', 'Memo Masuk')
@section('main','menu-open')
@section('submain','active')
@section('masuk','active')
@section('body')

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Disposisi Memo {{$nomor}}</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Disposisi Memo</li>
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
                <a class="btn btn-danger" href="/memo-masuk">Kembali</a>
    
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
                <!-- form start -->
              <form role="form"  method="post" action="/insert-disposisi">
                @csrf
                  <div class="card-body">
                  <input type="hidden" name="idmemo" value="{{$disposisi->id_memo}}">
                      <div class="row">
                          <div class="col-md-6">
                              <div class="form-group">
                                  <label for="no_memo">No Memo</label>
                                  <input type="text" class="form-control" id="no_memo" placeholder="Nomor Memo" name="no_memo" value="{{$disposisi->no_surat}}" required readonly>
                                  @error('no_memo')
                                          <small style="color:red">- {{ $message}}</small>
                                  @enderror
                              </div>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-md-6">
                              <div class="form-group">
                                  <label for="sifat">Sifat</label>
                                  <select class="custom-select mr-sm-2 " id="sifat" name="sifat"  required>
                                      <option value="" selected>Choose...</option>
                                      <option value="Sangat Segera" value="{{old('Sangat Segera') == "biasa" ? 'selected' : ''}}">Sangat Segera</option>
                                      <option value="Segera" value="{{old('Segera') == "rahasia" ? 'selected' : ''}}">Segera</option>
                                      <option value="Rahasia" value="{{old('Rahasia') == "terbatas" ? 'selected' : ''}}">Rahasia</option>
                                      
                                  </select>
                                  @error('sifat')
                                  <small style="color:red">- {{ $message}}</small>
                                  @enderror
                              </div>
                          </div>
                          <div class="col-md-6">
                              <label for="perihal">Perihal</label>
                              <input type="text" class="form-control" id="perihal" placeholder="Perihal" name="perihal" value="{{$disposisi->perihal}}" required readonly>
                              @error('perihal')
                                      <small style="color:red">- {{ $message}}</small>
                              @enderror
                          </div>
                      </div>
                      <div class="row">                   
                          <div class="col-md-6">
                              <label for="pengirim">Pengirim</label>
                              <input type="hidden" value="{{$disposisi->jabatan_pengirim}}" name="jabatan_pengirim">
                              <input type="text" class="form-control" id="pengirim" placeholder="pengirim" name="pengirim" value="{{$disposisi->Nama}}" required readonly>
                              @error('pengirim')
                                      <small style="color:red">- {{ $message}}</small>
                              @enderror
                          </div>
                          <div class="col-md-6 ">
                              <label for="jabatan">Jabatan</label>
                              <input type="text" class="form-control" id="jabatan" placeholder="jabatan" name="jabatan" value="{{$disposisi->jabatan}}" required readonly>
                              @error('jabatan')
                                      <small style="color:red">- {{ $message}}</small>
                              @enderror
                          </div>
                      </div>
                      
                      <div class="row">
                          <div class="col-md-6 mt-3">
                              <label for="tgl_memo">Tanggal Memo</label>
                              <input type="text" class="form-control" id="tgl_memo" placeholder="Tanggal Memo" name="tgl_memo" value="{{ $disposisi->tgl_surat}}" required readonly>
                              @error('tgl_memo')
                                  <small style="color:red">- {{ $message}}</small>
                              @enderror
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-md-8 mt-3">
                              <label for="kepada">Kirim Kepada</label>
                              {{-- <select  id="kepada"  name="kepada[]" class="select2bs4" multiple="multiple" data-placeholder="Select a State"
                              style="width: 100%;">
                                  @foreach ( $user as $users )
                                      <option value="{{$users->jabatan_id}}">{{$users->Nama}} ({{$users->jabatan}})</option>
                                  @endforeach
                                     
                              </select> --}}

                            <select class="custom-select mr-sm-2 select2bs4" id="kepada" name="kepada" style="width: 100%;">
                                @foreach ( $user as $users )
                                      <option value="{{$users->jabatan_id}}">{{$users->Nama}} ({{$users->jabatan}})</option>
                                @endforeach
                            </select>
                              @error('kepada')
                              <small style="color:red">- {{ $message}}</small>
                              @enderror
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-md-12 mt-3">
                              <label for="disposisi">isi Disposisi</label>
                              <textarea class="form-control" name="isi_disposisi"></textarea>
                              @error('disposisi')
                                  <div class="invalid-tooltip">
                                       {{$message}}
                                  </div>                        
                              @enderror
                          </div>
                      </div>
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer">
                    <button type="submit" class="btn btn-danger" name="kirim">Kirim</button>
                  </div>
              </form>
                 
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
    $(document).ready(function() {
     //Initialize Select2 Elements
     $('.select2bs4').select2({
      theme: 'bootstrap4',
    //   maximumSelectionLength: 1
    })
  
    });
    
</script>
@endpush
