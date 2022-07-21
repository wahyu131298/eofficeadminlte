<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="{{ asset('image/setting/logo.ico') }}">
  <title>E-Office | Log in</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{asset('/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('/dist/css/adminlte.min.css')}}">
   <!--Sweet alert-->
  <script src="{{asset('/extambahan/sweetalert/sweetalert.all.js')}}"></script>
</head>
<body class="hold-transition login-page" style="background:linear-gradient(#6eaae9, #ffffff)">
  @include('sweetalert::alert')
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      
            <img class="logo mb-1" src="{{asset('image/setting')}}/{{$login->logo}}" style="width: 27%" ><br>
            <a href="#" class="h3"><b>E-</b>Office RSMS</a>
    </div>
    <div class="card-body">
        
        <form class="user" method="post" action="/authentication">
            @csrf
        <div class="input-group mb-3">
            <input type="text" class="form-control"   placeholder="Username" name="username" required>
            @error('username')
                <small style="color:red">- {{ $message}}</small>
            @enderror
          
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="Password" name="password" required>
            @error('password')
             <small style="color:red">- {{ $message}}</small>
            @enderror
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <button type="submit" class="btn btn-primary btn-block">Masuk</button>
        {{-- <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div> --}}
      </form>

      {{-- <div class="social-auth-links text-center mt-2 mb-3">
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
        </a>
      </div> --}}
      <!-- /.social-auth-links -->

      {{-- <p class="mb-1">
        <a href="forgot-password.html">I forgot my password</a>
      </p> --}}
      <p class="mt-3 text-center">
        <a href="#" class="text-center btn-alert">Lupa Password ? / Butuh Bantuan ?</a>
      </p>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{asset('/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('/dist/js/adminlte.min.js')}}"></script>

<script>
  $(document).ready(function($){
      $('.btn-alert').on('click',function(){
          swal.fire({
            icon: 'info',
            title: 'Butuh Bantun ?',
            text: 'Apabila Ada Kendala atau Belum Faham Tentang E-Office RSMS Silahkan Hubungi IT RS',
            // footer: '<a href="">Why do I have this issue?</a>'
          })
      }); 
  });

</script>
</body>
</html>
