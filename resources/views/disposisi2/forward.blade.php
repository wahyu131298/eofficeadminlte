@extends('layouts.layout')
@section('title', 'Forward Disposisi')
@section('main-dis-ex','menu-open')
@section('submain-dis-ex','active')
@section('masuk-dis-ex','active')
@section('body')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Forward Disposisi</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Forward Disposisi</li>
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
                <a class="btn btn-danger" href="/surat/disposisi/masuk">Kembali</a>
            </div>
            <div class="card-body">
                <!-- form start -->
              <form role="form"  method="post" action="/insert/forward">
                @csrf
                
                  <div class="card-body">
                      <input type="hidden" name="idsurat" value="{{$surat->id_surat}}">
                      <div class="row">
                          <div class="col-md-6">
                              <div class="form-group">
                                  <label for="no_surat">No Surat</label>
                                  <input type="text" class="form-control" id="no_surat" placeholder="Nomor Memo" name="no_surat" value="{{$surat->no_surat}}" readonly>
                                  @error('no_surat')
                                          <small style="color:red">- {{ $message}}</small>
                                  @enderror
                              </div>
                          </div>
                      </div>
                      
                      <div class="row">
                          <div class="col-md-8">
                              <label for="kepada">Diteruskan Kepada</label>
                              <select style="width:100%;" id="kepada" class="select2bs4" name="tujuan[]" multiple="multiple" data-placeholder="Diteruskan Kepada">
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
                          <div class="col-md-12">
                              <label for="disposisi">isi Disposisi</label>
                              <textarea class="form-control" name="isi" required></textarea>
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
            </div>
            <!-- /.card -->
        </div>
    </div><!-- /.container-fluid -->
</section>
@endsection
@push('after-script')
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
