<div class="form-group">
    <table id="example1" class="table table-bordered" width="100%" cellspacing="0">
        
        <tbody>
          @foreach ($lampiran as $val)
            @if ($val->id_memo === null)
              <tr>                         
                <td colspan="2">Tidak ada Lampiran</td>
              </tr>
            @else
             <tr>                         
                <td>{{ $val->filename}}</td>
                <td><a href="{{ asset('/file/lampiran/')}}/{{$val->filename}}" class="badge badge-primary" target="_blank">Download</a></td>
              </tr>
            @endif
          @endforeach                                       
        </tbody>
      </table>
</div>
