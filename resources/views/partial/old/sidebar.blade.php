<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
    <img width="50" height="50" class="d-inline-block" src="{{asset('image/setting/1652259000879-cropped-logo-300x300.png')}}" >
    <div class="sidebar-brand-text mx-3">E-Office</div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item @yield('main')">
    <a class="nav-link" href="/">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
</li>
<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">
<!-- Disposisi Surat External -->
<div class="sidebar-heading">
  Memo Intern
</div> 
{{-- <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages5"
        aria-expanded="true" aria-controls="collapsePages">
         <i class="fas fa-fw fa-folder-plus"></i>
        <span>Buat Memo</span>
    </a>
    <div id="collapsePages5" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            {{-- <h6 class="collapse-header">Login Screens:</h6> --}}
            {{-- <a class="collapse-item" href="/memo-pengajuan">Buat Memo</a> --}}
            {{-- <a class="collapse-item" href="#">Memo Undangan</a> --}}
        {{-- </div>
    </div>
</li> --}}
<li class="nav-item @yield('memo')">
    <a class="nav-link" href="/buat-memo">
        <i class="fas fa-fw fa-folder-plus"></i>
    <span>Buat Memo</span></a>
</li>
@if (auth()->user()->level == 'kabag')
    <li class="nav-item @yield('konfirmasi')">
        <a class="nav-link" href="/konfir-memo">
        <i class="fas fa-fw fa-mail-bulk"></i>
        <span>Konfirmasi Memo</span></a>
    </li>
@endif

{{-- 
<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
    Interface
</div> --}}


<!-- Nav Item - Pages Collapse Menu -->

<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages0"
        aria-expanded="true" aria-controls="collapsePages">
        <i class="fas fa-fw fa-envelope"></i>
        <span>Memo</span>
    </a>
    <div id="collapsePages0" class="collapse @yield('main')" aria-labelledby="headingPages" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            {{-- <h6 class="collapse-header">Login Screens:</h6> --}}
            <a class="collapse-item  @yield('masuk')" href="/memo-masuk">Memo Masuk</a>
            <a class="collapse-item  @yield('keluar')" href="/memo-keluar">Memo Keluar</a>
        </div>
    </div>
</li>
<!--Disposisi-->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages1"
        aria-expanded="true" aria-controls="collapsePages">
        <i class="fas fa-fw fa-reply-all"></i>
        <span>Disposisi Memo Intern</span>
    </a>
    <div id="collapsePages1" class="collapse @yield('main2')" aria-labelledby="headingPages" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Disposisi:</h6>
            <a class="collapse-item @yield('dismasuk')" href="/disposisi-masuk">Disposisi Masuk</a>
            <a class="collapse-item @yield('diskeluar')" href="/disposisi-keluar">Disposisi Keluar</a>
            <h6 class="collapse-header">Forward Disposisi:</h6>
            
            <a class="collapse-item @yield('fordismasuk')" href="/forward/masuk">Forward Disposisi Masuk</a>
            <a class="collapse-item @yield('fordiskeluar')" href="/forward/keluar">Forward Disposisi Keluar</a>
           
        </div>
    </div>
</li>

<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">
<!-- Disposisi Surat External -->
<div class="sidebar-heading">
    Disposisi Surat Eksternal
</div> 
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages6"
        aria-expanded="true" aria-controls="collapsePages">
        <i class="fas fa-fw fa-reply-all"></i>
        <span>Disposisi Surat</span>
    </a>
    <div id="collapsePages6" class="collapse @yield('main3')" aria-labelledby="headingPages" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
           
            @if (auth()->user()->level == 'dirut' || auth()->user()->level == 'admin')
            <h6 class="collapse-header">Disposisi Surat Luar:</h6>
            @if (auth()->user()->level == 'dirut')
            <a class="collapse-item @yield('dissurat')" href="/surat/disposisi">Disposisi Surat</a>
            @endif
            <a class="collapse-item @yield('terkirim')" href="/surat/disposisi/terkirim">Disposisi Terkirim</a>
            @endif
            @if (auth()->user()->level == 'admin' || auth()->user()->level == 'kabag'||auth()->user()->level == 'karu')
            
            <a class="collapse-item @yield('dispomasuk')" href="/surat/disposisi/masuk">Disposisi Masuk</a>
           
            <h6 class="collapse-header">Forward Disposisi:</h6>
            @if (auth()->user()->level == 'admin')
            <a class="collapse-item @yield('fordisterkirim')" href="/forward/terkirim">Forward Terkirim</a>
            @endif
            <a class="collapse-item @yield('formasuk')" href="/forward/disposisi/surat/masuk">Forward Disposisi Masuk</a>
            <a class="collapse-item @yield('forkeluar')" href="/forward/disposisi/surat/keluar">Forward Disposisi Keluar</a>
             @endif
           
        </div>
    </div>
</li>

@if (auth()->user()->level == 'admin')
<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">
<!-- Disposisi Surat External -->
<div class="sidebar-heading">
  Data Master
</div> 
    <!-- master-->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages2"
        aria-expanded="true" aria-controls="collapsePages">
        <i class="fas fa-fw fa-folder"></i>
        <span>Data Master</span>
    </a>
    <div id="collapsePages2" class="collapse @yield('main4')" aria-labelledby="headingPages" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            {{-- <h6 class="collapse-header">Login Screens:</h6> --}}
            <a class="collapse-item @yield('jabatan')" href="/list-jabatan">Master Jabatan</a>
            <a class="collapse-item @yield('user')" href="/list-user">Master Pengguna</a>
            <a class="collapse-item @yield('seting')" href="/setting">Setting</a>
        </div>
    </div>
</li>
@endif
<!-- Divider -->
<hr class="sidebar-divider d-md-block">
@if (auth()->user()->level == 'admin')
    <li class="nav-item @yield('log')">
    <a class="nav-link" href="/lihat/log">
        <i class="fas fa-fw fa-cog"></i>
        <span>Log Aktivitas</span></a>
    </li>
@endif
@if (auth()->user()->level == 'admin')
<!-- Divider -->
<hr class="sidebar-divider d-md-block">
@endif


<!-- Nav Item - Tables -->
{{--<li class="nav-item">
    <a class="nav-link" href="/admin">
        <i class="fas fa-fw fa-user"></i>
        <span>Administrator</span></a>
</li> --}}



<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>
</ul>
<!-- End of Sidebar -->