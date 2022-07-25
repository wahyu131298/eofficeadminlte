<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-md-none d-lg-none d-xl-none mt-1">
        <a  href="/">
          <img src="{{asset('image/setting')}}/{{$logo->logo}}" alt="Logo" class="img-circle" width="30px" height="30px">
         
        </a>
        <span class="brand-text font-weight">E-Office RSMS</span>
        
      </li>
     
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      {{-- <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li> --}}

      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-envelope"></i>
          @if ($countnotif > 0)
            <span class="badge badge-danger navbar-badge">{{$countnotif}}</span>
          @endif
          
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          @if ($countnotif > 0)
            @foreach ($notif as $item)
              <a href="#" class="dropdown-item">
                    <!-- Message Start -->
                    <div class="media">
                      {{-- @if ($item->jk == 'laki')
                      <img src="{{asset('/img/undraw_profile.svg')}}" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                      @endif
                      @if ($item->jk == 'perempuan')
                      <img src="{{asset('/img/undraw_profile_1.svg')}}" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                      @endif
                      --}}
                      <div class="media-body">
                        <h3 class="dropdown-item-title">
                        {{$item->jabatan}}
                          {{-- <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span> --}}
                        </h3>
                        <p class="text-sm">Mengirim Memo Intern ({{$item->jns_memo}}) {{$item->no_surat}}</p>
                        <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> {{ Carbon\Carbon::parse($item->created_at)->diffForHumans() }}</p>
                      </div>
                    </div>
                    
                    <!-- Message End -->
              </a>
              <div class="dropdown-divider"></div>
            @endforeach
            <div class="dropdown-divider"></div>
            <a href="/memo-masuk" class="dropdown-item dropdown-footer">See All Messages</a>
          @else
            <p class="dropdown-item dropdown-footer">Tidak Ada Memo yang Masuk</p>
          @endif
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
      {{-- <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li> --}}
      {{-- <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li> --}}
      {{-- <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li> --}}
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fas fa-cog"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="min-width: 181px!important">
          
          <div class="dropdown-divider"></div>
          <a href="/ganti/pasword" class="dropdown-item">
            <i class="fas fa-key mr-2"></i>Ubah Password
          
          </a>
          <div class="dropdown-divider"></div>
          <a href="/logout" class="dropdown-item">
            {{-- <i class="fa-solid fa-right-from-bracket"></i> --}}
            <i class="fas fa-sign-out-alt mr-2"></i>Keluar
           
          </a>
          
        </div>
      </li>

      
    </ul>
  </nav>