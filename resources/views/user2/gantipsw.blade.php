@extends('layouts.layout')
@section('title', 'Ubah Password')
@section('body')

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Ubah Password</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Ubah Password</li>
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
                <form role="form" action="/password/update" method="post" >
                    @csrf
                      <div class="card-body">
                            <input type="hidden" id="cid" name="cid" value="{{auth()->user()->id_user}}">
                          <div class="row">
                           <div class="col-md-6">
                              <div class="form-group">
                                  <label for="psw">Password</label>
                                  <input type="password" class="form-control" id="psw" placeholder="Password" name="password1" required>
                                  
                                  @error('psw')
                                   <small style="color:red">- {{ $message}}</small>
                                  @enderror
                              </div>
                           </div>
                          </div>
                          <div class="row">
                           <div class="col-md-6">
                              <div class="form-group">
                                  <label for="psw">Ketik Ulang Password</label>
                                  <input type="password" class="form-control" id="psw" placeholder="Ketik Ulang Password" name="password2" required>
                                  
                                  @error('psw')
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

@endpush
