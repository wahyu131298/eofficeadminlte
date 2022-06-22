@extends('layouts.layout')
@section('title', 'Edit Pengguna')
@section('master','menu-open')
@section('submaster','active')
@section('pengguna','active')
@section('body')

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Form Edit Pengguna</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Edit Pengguna</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
<section class="content">
    <div class="container-fluid">
        <div class="card card-default">
            <div class="card-header py-3">
                <a class="btn btn-danger" href="/list-user">Kembali</a>
            </div>
            <div class="card-body">
               <!-- form start -->
              <form role="form" action="/user/update" method="post" >
                @csrf
                  <div class="card-body">
                  <input type="hidden" id="cid" name="cid" value="{{$user->id_user}}">
                    <div class="form-group">
                      <label for="nama">NIP</label>
                      <input type="text" class="form-control" id="nip" placeholder="Nomor Induk Pegawai" name="nip" value="{{$user->nip}}" required>
                      @error('nip')
                               <small style="color:red">- {{ $message}}</small>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="nama">Nama Lengkap</label>
                      <input type="text" class="form-control" id="nama" placeholder="Nama Lengkap" name="nama" value="{{$user->Nama}}" required>
                      @error('nama')
                               <small style="color:red">- {{ $message}}</small>
                      @enderror
                    </div>
                      <div class="row">
                       <div class="col-md-6">
                          <div class="form-group">
                              <label for="usernama">Username</label>
                              <input type="text" class="form-control" id="usernama" placeholder="Username" name="username" value="{{$user->username}}" required >
                              @error('username')
                               <small style="color:red">- {{ $message}}</small>
                              @enderror
                          </div>
                       </div>
                       <div class="col-md-6">
                          <div class="form-group">
                              <label for="psw">Password</label>
                              <input type="password" class="form-control" id="psw" placeholder="Password" name="psw">
                              <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="customSwitch1" onclick="myFunction()" >
                                <label class="custom-control-label" for="customSwitch1">Show / Hide Password</label>
                              </div>
                              @error('psw')
                               <small style="color:red">- {{ $message}}</small>
                              @enderror
                          </div>
                       </div>
                      </div>
                      <div class="row">
                       <div class="col-md-6">
                          <div class="form-group">
                              <label for="jk">Jenis Kelamin</label>
                                <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="jk"  required>
                                  <option value="" selected>Choose...</option>
                                  <option value="laki"  @if ($user->jk =='laki') selected @endif>Laki-Laki</option>
                                  <option value="perempuan"  @if ($user->jk =='perempuan') selected @endif>Perempuan</option>
                                 
                                </select>
                              @error('jk')
                               <small style="color:red">- {{ $message}}</small>
                              @enderror
                          </div>
                       </div>
                       <div class="col-md-6">
                          
                       </div>
                      </div>
                      <div class="row">
                       <div class="col-md-6">
                          <div class="form-group">
                              <label for="level">Level</label>
                                <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="level"  required>
                                  <option value="" selected>Choose...</option>
                                  <option value="dirut"  @if ($user->level =='dirut') selected @endif>Direktur</option>
                                  <option value="kabag"  @if ($user->level =='kabag') selected @endif>Kepala Bagian</option>
                                  <option value="karu"  @if ($user->level =='karu') selected @endif>Kepala Ruangan</option>
                                  <option value="admin"  @if ($user->level =='admin') selected @endif>Administator</option>
                                 
                                </select>
                              @error('level')
                               <small style="color:red">- {{ $message}}</small>
                              @enderror
                          </div>
                       </div>
                       <div class="col-md-6">
                          <div class="form-group">
                              <label for="jabatan">Jabatan</label>
                                <select class="custom-select mr-sm-2 select2bs4" id="inlineFormCustomSelect" name="jabatan"  required>
                                  @foreach ( $getjabatan as $list )
                                       <option value="{{$list->id}}" @if ($user->jabatan_id ==$list->id) selected @endif>{{$list->jabatan}}</option>
                                  @endforeach
                                  
                                </select>
                              @error('jabatan')
                               <small style="color:red">- {{ $message}}</small>
                              @enderror
                          </div>
                       </div>
                      </div>
                     
                    </div>
                  <!-- /.card-body -->
                  <div class="card-footer">
                    <button type="submit" class="btn btn-danger" name="simpan">Ubah</button>
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
    function myFunction() {
        var x = document.getElementById("psw");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
</script>
<script>
    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
</script>
@endpush
