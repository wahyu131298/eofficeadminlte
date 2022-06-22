@extends('layouts.layout')
@section('title', 'Dashboard')
@section('main-dis-ex','menu-open')
@section('submain-dis-ex','active')
@section('buat-dis-ex','active')
@section('body')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Buat Disposisi Surat</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Buat Disposisi Surat</li>
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
                 <!-- form start -->
            <form role="form"  method="post" action="/insert/surat" enctype="multipart/form-data">
                @csrf
              <div class="card-body">
                 
                  <div class="row">
                      <div class="col-md-6">
                          <div class="form-group">
                              <label for="no_surat">No Surat</label>
                              <input type="text" class="form-control" id="no_surat" placeholder="Nomor Surat" name="no_surat" value="{{old('no_surat')}}" required>
                              @error('no_surat')
                                      <small style="color:red">- {{ $message}}</small>
                              @enderror
                          </div>
                      </div>
                      <div class="col-md-6">
                           <div class="form-group">
                              <label for="sifat">Sifat</label>
                                <select class="custom-select mr-sm-2" id="sifat" name="sifat"  required>
                                  <option value="" selected>Pilih...</option>
                                  <option value="biasa" value="{{old('sifat') == "biasa" ? 'selected' : ''}}">Biasa</option>
                                  <option value="rahasia" value="{{old('sifat') == "rahasia" ? 'selected' : ''}}">Rahasia</option>
                                  <option value="terbatas" value="{{old('sifat') == "terbatas" ? 'selected' : ''}}">Terbatas</option>
                                 
                                </select>
                              @error('sifat')
                               <small style="color:red">- {{ $message}}</small>
                              @enderror
                          </div>
                      </div>   
                  </div>
                  <!--End Row-->
                  <div class="row">
                      <div class="col-md-6">
                          <div class="form-group">
                              <label for="pengirim">Nama Pengirim</label>
                              <input type="text" class="form-control" id="pengirim" placeholder="Pengirim" name="pengirim" value="{{old('pengirim')}}" required>
                              @error('pengirim')
                                      <small style="color:red">- {{ $message}}</small>
                              @enderror
                          </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-group">
                              <label for="alamat">Alamat Pengirim</label>
                              <input type="text" class="form-control" id="alamat" placeholder="Alamat Pengirim" name="alamat" value="{{old('alamat')}}" required>
                              @error('alamat')
                                      <small style="color:red">- {{ $message}}</small>
                              @enderror
                          </div>
                      </div>   
                  </div>
                  <!--End Row-->
                  <div class="row">
                      <div class="col-md-6">
                          <div class="form-group">
                              <label for="tgl">Tanggal Penerimaan Surat</label>
                              <input type="date" class="form-control" id="tgl" name="tgl" value="{{old('tgl')}}" required>
                              @error('tgl')
                                      <small style="color:red">- {{ $message}}</small>
                              @enderror
                          </div>
                      </div>
                      <div class="col-md-6">
                              <label for="perihal">Perihal</label>
                              <input type="text" class="form-control" id="perihal" placeholder="Perihal" name="perihal" value="{{old('perihal')}}" required>
                              @error('perihal')
                                      <small style="color:red">- {{ $message}}</small>
                              @enderror
                       </div>
                  </div>
                  <!--End Row-->
                      
                      <div class="row">
                          <div class="col-md-7">
                              <div class="form-group">
                                  <label for="kepada">Disposisi Kepada</label>
                                  <select style="width:100%;" id="kepada" class="select2bs4" name="kepada[]" multiple="multiple" data-placeholder="Disposisi Kepada">
                                      @foreach ( $user as $users )
                                          <option value="{{$users->jabatan_id}}">{{$users->Nama}} ({{$users->jabatan}})</option>
                                      @endforeach
                                     
                                  </select>
                                  @error('kepada')
                                  <small style="color:red">- {{ $message}}</small>
                                  @enderror
                              </div>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                                <label for="lampiran">Lampiran</label>
                                <div class="input-group">
                                  <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="exampleInputFile" name="lampiran">
                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                  </div>
                                  
                                </div>
                                {{-- <input type="file" class="custom-file-input" id="exampleInputFile" > --}}
                                
                                @error('lampiran')
                                        <small style="color:red">- {{ $message}}</small>
                                @enderror
                              </div>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-md-12">
                              <label for="lampiran">Isi Disposisi</label>
                               <textarea class="form-control" name="isi_disposisi"></textarea>
                              @error('lampiran')
                                      <small style="color:red">- {{ $message}}</small>
                              @enderror
                          </div>
                      </div>
                  <!-- /.card-body -->
                  <div class="card-footer mt-3">
                    <button type="submit" class="btn btn-danger" name="kirim">Kirim</button>
                  </div>
              </div>
              </form>
               
                
            </div>
            <!-- /.card -->
        </div>
    </div><!-- /.container-fluid -->
</section>
@endsection
@push('after-script')
<script>
     bsCustomFileInput.init();
    
</script> 
<script>
  $(document).ready(function() {
     //Initialize Select2 Elements
     $('.select2bs4').select2({
      theme: 'bootstrap4',
      maximumSelectionLength: 1
    })
  
    });
      
</script>

@endpush
