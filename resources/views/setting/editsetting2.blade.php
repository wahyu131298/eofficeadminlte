@extends('layouts.layout')
@section('title', 'Edit Setting Sistem')
@section('setting','active')
@section('body')

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Edit Setting</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Edit Setting</li>
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
                <a class="btn btn-danger" href="/setting">Kembali</a>
            </div>
            <div class="card-body">
               <!-- form start -->
              <form role="form"  method="post" action="/update-setting" enctype="multipart/form-data">
                @csrf
                  <div class="card-body">
                  <input type="hidden" name="id" value="{{$settingedit->id_setting}}">
                      <div class="row">
                          <div class="col-md-3">
                          <div class="form-group">
                              <label for="logo">Logo Instansi</label>
                              <input type="file" class="form-control" id="logo"  name="logo">
                              @error('logo')
                                      <small style="color:red">- {{ $message}}</small>
                              @enderror
                              <img src="/image/setting/{{$settingedit->logo}}" title="logo" style="width: 70%;margin-top:20px" >
                          </div>
                          </div>
                              <div class="col-md-9">
                                  <div class="row">
                                      <div class="col-md-12">
                                          <div class="form-group">
                                              <label for="instansi">Nama Instansi</label>
                                              <input type="text" class="form-control" id="instansi" placeholder="Nama Instansi" name="instansi" value="{{$settingedit->nama_instansi}}" required>
                                              @error('instansi')
                                                      <small style="color:red">- {{ $message}}</small>
                                              @enderror
                                          </div>
                                      </div>    
                                      
                                  </div>
                                  <div class="row">
                                      <div class="col-md-6">
                                          <div class="form-group">
                                              <label for="moto">Motto</label>
                                              <input type="text" class="form-control" id="moto" placeholder="Motto Instansi" name="moto" value="{{$settingedit->motto}}" required>
                                              @error('moto')
                                                      <small style="color:red">- {{ $message}}</small>
                                              @enderror
                                          </div>
                                      </div>    
                                      <div class="col-md-6">
                                          <div class="form-group">
                                              <label for="alamat">Alamat</label>
                                              <input type="text" class="form-control" id="alamat" placeholder="Alamat Instansi" name="alamat" value="{{$settingedit->alamat}}" required >
                                              @error('alamat')
                                                      <small style="color:red">- {{ $message}}</small>
                                              @enderror
                                          </div>
                                      </div>    
                                  </div>
                                  <div class="row">
                                      <div class="col-md-6">
                                          <div class="form-group">
                                              <label for="telp">Telepon Instansi</label>
                                              <input type="text" class="form-control" id="telp" placeholder="Telepon Instansi" name="telp" value="{{$settingedit->telepon}}" required >
                                              @error('telp')
                                                      <small style="color:red">- {{ $message}}</small>
                                              @enderror
                                          </div>
                                      </div>    
                                      <div class="col-md-6">
                                          <div class="form-group">
                                              <label for="fax">FAX Instansi</label>
                                              <input type="text" class="form-control" id="fax" placeholder="FAX Instansi" name="fax" value="{{$settingedit->fax}}" required >
                                              @error('fax')
                                                      <small style="color:red">- {{ $message}}</small>
                                              @enderror
                                          </div>
                                      </div>    
                                  </div>
                              </div>
                                      
                  
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary" name="update">Update</button>
                  </div>
              </form>
            </div>
            <!-- /.card -->
        </div>
    </div>
    <!-- /.container-fluid -->
</section>
@endsection
@push('after-script')


@endpush
