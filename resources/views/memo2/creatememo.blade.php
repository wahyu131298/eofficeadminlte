@extends('layouts.layout')
@section('title', 'Buat Memo')
@section('memo','active')
@section('body')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Buat Memo</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Buat Memo</li>
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
               
                <form role="form" id="memoForm" method="post" action="/insert-memo" enctype="multipart/form-data">
                    @csrf
                      <div class="card-body">
                      {{-- <input type="hidden" id="pengguna" value="{{auth()->user()->Nama}}"> --}}
                      <div class="row">
                          <div class="col-md-6">
                              <div class="form-group">
                                  <label for="no_memo">No Memo</label>
                                  <input type="text" class="form-control" id="no_memo" placeholder="Nomor Memo" name="no_memo" value="{{old('no_memo')}}" required>
                                  @error('no_memo')
                                          <small style="color:red">- {{ $message}}</small>
                                  @enderror
                              </div>
                          </div>
                          <div class="col-md-6">
                              <div class="form-group">
                                  <label for="kategori">Jenis Memo</label>
                                  <select class="custom-select mr-sm-2" id="kategori" name="kategori" style="width: 100%;" required>
                                      <option value="" selected>Pilih...</option>
                                      <option value="undangan" value="{{old('kategori') == "undangan" ? 'selected' : ''}}">Undangan</option>
                                      <option value="pengajuan" value="{{old('kategori') == "pengajuan" ? 'selected' : ''}}">Pengajuan</option>
                                    </select>
                                  @error('kategori')
                                          <small style="color:red">- {{ $message}}</small>
                                  @enderror
                              </div>
                          </div>
                          
                      </div>
      
                          <div class="row">
                           <div class="col-md-6">
                              
                              <div class="form-group">
                                  <label for="sifat">Sifat</label>
                                    <select class="custom-select mr-sm-2" id="sifat" name="sifat" style="width: 100%;" required>
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
                           <div class="col-md-6">
                                  <label for="perihal">Perihal</label>
                                  <input type="text" class="form-control" id="perihal" placeholder="Perihal" name="perihal" required>
                                  @error('perihal')
                                          <small style="color:red">- {{ $message}}</small>
                                  @enderror
                           </div>
                          </div>
                         
                          <div class="row">
                           <div class="col-md-6">
                              <div class="form-group">
                                  <label for="kepada">Kepada</label>
                                      <select id="kepada" name="kepada[]" class="select2bs4" multiple="multiple" data-placeholder="Kepada"
                                      style="width: 100%;">
                                         
                                          @foreach ( $jabatan as $item )
                                               <option value="{{$item->jabatan}}">{{$item->jabatan}}</option>
                                          @endforeach
                                      </select>
                                  @error('kepada')
                                   <small style="color:red">- {{ $message}}</small>
                                  @enderror
                              </div>
                           </div>
                           <div class="col-md-6">
                              
                              <div class="form-group">
                                  <label for="cc">Tembusan</label>
                                      <select id="cc" name="cc[]" class="select2bs4" multiple="multiple" data-placeholder="Tembusan / CC"
                                      style="width: 100%;">
                                          @foreach ( $jabatan as $item )
                                              <option value="{{$item->jabatan}}" @if ($item->jabatan == '-') selected @endif>{{$item->jabatan}}</option>
                                          @endforeach
                                         
                                      </select>
                                  @error('cc')
                                   <small style="color:red">- {{ $message}}</small>
                                  @enderror
                              </div>
                           </div>
                           
                          </div>
                          <div class="row">
                              <div class="col-md-7">
                                  <div class="form-group">
                                      <label for="penerima">User yang Menerima</label>
                                      <select id="penerima" name="penerima[]" class="select2bs4" multiple="multiple" data-placeholder="Pilih Yang Di Input di Kepada dan Tembusan/CC"
                                      style="width: 100%;">
                                          @foreach ( $user as $users )
                                              <option value="{{$users->jabatan_id}}">{{$users->Nama}} ({{$users->jabatan}})</option>
                                          @endforeach
                                         
                                      </select>
                                      @error('penerima')
                                      <small style="color:red">- {{ $message}}</small>
                                      @enderror
                                  </div>
                              </div>
                          
                              <div class="col-md-5">
                                  <div class="form-group">
                                      <label for="mengetahui">Mengetahui</label>
                                      <select class="custom-select mr-sm-2 select2bs4" id="mengetahui" name="mengetahui" style="width: 100%;">
                                          <option value="" selected>Pilih...</option>
                                          {{-- @if (auth()->user()->level == 'kabag' || auth()->user()->level == 'dirut') --}}
                                               <option value="-">Tanpa Mengetahui</option>
                                          {{-- @endif --}}
                                          @foreach ($mengetahui as $item)
                                              <option value="{{$item->jabatan_id}}">{{$item->Nama}} ({{$item->jabatan}})</option>
                                          @endforeach
                                      
                                      </select>
                                      @error('mengetahui')
                                      <small style="color:red">- {{ $message}}</small>
                                      @enderror
                                  </div>
                              </div>
                          </div>
                          <div class="row">
                              <div class="col-md-12">
                                   <label for="isi">Isi Memo</label>
                                   <textarea id="mytextarea" name="isimemo" style="height: 100%"></textarea>
                               
                              </div>
                          </div>
                          <div class="row">
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label for="lampiran">Lampiran (Optional) </label>
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
                        </div>
                      <!-- /.card-body -->
                      <div class="card-footer">
                        <button type="submit" class="btn btn-danger" name="kirim">Kirim</button>
                      </div>
                  </form>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
              {{-- Visit <a href="https://select2.github.io/">Select2 documentation</a> for more examples and information about
              the plugin. --}}
            </div>
          </div>
          <!-- /.card -->
    </div><!-- /.container-fluid -->
</section>
@endsection
@push('after-script')
<script src="{{asset('/extambahan/tinymce/js/tinymce/tinymce.min.js')}}"></script>


{{-- <script src="/vendor/tinymce/js/tinymce/tinymce.min.js"></script> --}}
{{-- <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script> --}}
<script type="text/javascript">
  tinymce.init({
    selector: '#mytextarea',
    content_style: 'p {margin-bottom: 0;margin-top: 0;}'+ 'body{line-height:1;}',
    plugins: [
            'advlist','autolink',
            'lists','charmap','preview','anchor','searchreplace','visualblocks',
            'fullscreen','insertdatetime','table','help','wordcount'
            ],
            toolbar: 'undo redo | a11ycheck casechange blocks | fontfamily fontsize lineheight bold underline italic | alignleft aligncenter alignright alignjustify |' +
            'bullist numlist checklist outdent indent | removeformat | table'
  });
  </script>
<script>
     bsCustomFileInput.init();
    // $(document).ready(function() {
    //     $('.js-example-basic-multiple').select2();

    //     $(".kepada").select2({
    //         placeholder: "Kepada"
    //     });
    //     $(".cc").select2({
    //         placeholder: "CC"
    //     });
    //     $(".penerima").select2({
    //         placeholder: "Pilih Yang Di Input di Kepada dan Tembusan/CC"
    //     });
    // });
    // //Initialize Select2 Elements
    // $('.select2bs4').select2({
    //   theme: 'bootstrap4'
    // });
</script> 
<script>
   
      //Initialize Select2 Elements
      $('.select2').select2()
  
      //Initialize Select2 Elements
      $('.select2bs4').select2({
        theme: 'bootstrap4',
        
      })
  
      
  </script>

@endpush
