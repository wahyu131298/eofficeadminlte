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
                                      <option value="" selected>Pilih Jenis Memo</option>
                                      <option value="undangan" @if (old('kategori') == 'undangan')  ? selected @endif>Undangan</option>
                                      <option value="pengajuan" @if (old('kategori') == 'pengajuan')  ? selected @endif>Pengajuan</option>
                                      <option value="laporan" @if (old('kategori') == 'laporan')  ? selected @endif>Laporan</option>
                                      <option value="lain" @if (old('kategori') == 'lain')  ? selected @endif>Lain-lain</option>
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
                                      <option value="biasa" @if (old('sifat') == 'biasa')  ? selected @endif>Biasa</option>
                                      <option value="rahasia" @if (old('sifat') == 'rahasia')  ? selected @endif>Rahasia</option>
                                      <option value="terbatas" @if (old('sifat') == 'terbatas')  ? selected @endif>Terbatas</option>
                                    </select>
                                  @error('sifat')
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
                         
                          <div class="row">
                           <div class="col-md-6">
                              <div class="form-group">
                                  <label for="kepada">Kepada</label>
                                      <select id="kepada" name="kepada[]" class="select2bs4" multiple="multiple" data-placeholder="Kepada"
                                      style="width: 100%;">
                                         
                                          @foreach ( $jabatan as $item )
                                               <option data-id="{{$item->id}}" value="{{$item->jabatan}}">{{$item->jabatan}}</option>
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
                                      <option value="-">-</option>
                                          @foreach ( $jabatan as $item )
                                              <option data-id="{{$item->id}}" value="{{$item->jabatan}}">{{$item->jabatan}}</option>
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
                                   <label for="mytextarea">Isi Memo</label>
                                   <textarea id="mytextarea" name="isimemo" style="height: 100%">{{old('isimemo')}}</textarea>
                               
                              </div>
                          </div>
                          <div class="row">
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label for="lampiran">Lampiran (Optional) </label>
                                  <div class="input-group">
                                    <div class="custom-file">
                                      <input type="file" class="custom-file-input" id="exampleInputFile" name="lampiran[]" multiple>
                                      <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    </div>
                                    
                                  </div>
                                  {{-- <input type="file" class="form-control" name="lampiran[]"  multiple="multiple"> --}}
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
  
  //Initialize Select2 Elements
  $('.select2').select2()

  //Initialize Select2 Elements
  $('.select2bs4').select2({
    theme: 'bootstrap4',
    
  })

  // $('#kepada').select2({
  //   theme: 'bootstrap4',
  //   insertTag: function (data, tag) {
  //     // Insert the tag at the end of the results
  //     data.push(tag);
  //   }
  // });
  
      
  // $(document).ready(function () {
  //   const tampung_array = [];
  //   $('#kepada').on('change', function(){
  //     const data = $("#kepada option:selected").attr('data-id')
   
  //     tampung_array.push(data)
  //     const dat = $("#penerima").val(tampung_array);

  //     // const tes = []
  //     // tes.push(dat)

  //     // console.log(data)

  //   })
     
      
  // })  

  
</script>

@endpush
