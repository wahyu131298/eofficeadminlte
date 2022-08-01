<div class="user-panel mt-3 pb-3 mb-3 d-flex">
    <div class="image">
        @if( auth()->user()->jk == 'laki')
        <img src="{{asset('/img/undraw_profile.svg')}}" class="img-circle elevation-2" alt="User Image">
        @endif
        @if( auth()->user()->jk == 'perempuan')
        <img src="{{asset('/img/undraw_profile_1.svg')}}" class="img-circle elevation-2" alt="User Image">
        @endif
      
    </div>
    <div class="info">
      <a href="/profile" class="d-block">{{ auth()->user()->Nama }}</a>
    </div>
  </div>

  {{-- <!-- SidebarSearch Form -->
  <div class="form-inline">
    <div class="input-group" data-widget="sidebar-search">
      <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
      <div class="input-group-append">
        <button class="btn btn-sidebar">
          <i class="fas fa-search fa-fw"></i>
        </button>
      </div>
    </div>
  </div> --}}

  <!-- Sidebar Menu -->
  <nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->
      {{-- <li class="nav-item menu-open">
        <a href="#" class="nav-link active">
          <i class="nav-icon fas fa-tachometer-alt"></i>
          <p>
            Dashboard
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="./index.html" class="nav-link active">
              <i class="far fa-circle nav-icon"></i>
              <p>Dashboard v1</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="./index2.html" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Dashboard v2</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="./index3.html" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Dashboard v3</p>
            </a>
          </li>
        </ul>
      </li> --}}
      <li class="nav-item">
        <a href="/" class="nav-link @yield('main')">
            <i class="nav-icon fas fa-tachometer-alt"></i>
          <p>
            Dashboard
          </p>
        </a>
      </li>
      <li class="nav-header">Memo Internal</li>
      <li class="nav-item">
        <a href="/buat-memo" class="nav-link @yield('memo')">
          <i class="nav-icon fas  fa-solid fa-file-circle-plus"></i>
          <p>
            Buat Memo
          </p>
        </a>
      </li>
      @if (auth()->user()->level == 'kabag' || auth()->user()->level == 'dirut')
      <li class="nav-item">
        <a href="/konfir-memo" class="nav-link @yield('konfirmasi')">
          <i class="nav-icon fas fa-solid fa-file-circle-check"></i>
          <p>
           Konfirmasi Memo
          </p>
        </a>
      </li>
      @endif
      <li class="nav-item @yield('main')">
        <a href="#" class="nav-link @yield('submain')">
          <i class="nav-icon fas fa-copy"></i>
          <p>
           Memo
            <i class="fas fa-angle-left right"></i>
            {{-- <span class="badge badge-info right">6</span> --}}
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a  href="/memo-masuk" class="nav-link @yield('masuk')" ">
              <i class="far fa-circle nav-icon"></i>
              <p>Memo Masuk</p>
            </a>
          </li>
          <li class="nav-item">
            <a  href="/memo-keluar" class="nav-link @yield('keluar')">
              <i class="far fa-circle nav-icon"></i>
              <p>Memo Keluar</p>
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-item @yield('main-dis')">
        <a href="#" class="nav-link @yield('submain-dis')">
          <i class="nav-icon fas fa-fw fa-reply-all"></i>
          <p>
           Disposisi Memo
            <i class="fas fa-angle-left right"></i>
            {{-- <span class="badge badge-info right">6</span> --}}
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a  href="/disposisi-masuk" class="nav-link @yield('masuk-dis')" ">
              <i class="far fa-circle nav-icon"></i>
              <p>Disposisi Masuk</p>
            </a>
          </li>
          <li class="nav-item">
            <a  href="/disposisi-keluar" class="nav-link @yield('keluar-dis')">
              <i class="far fa-circle nav-icon"></i>
              <p>Disposisi Keluar</p>
            </a>
          </li>
          <li class="nav-item">
            <a  href="/forward/masuk" class="nav-link @yield('masuk-for')">
              <i class="far fa-circle nav-icon"></i>
              <p>Forward Masuk</p>
            </a>
          </li>
          <li class="nav-item">
            <a  href="/forward/keluar" class="nav-link @yield('keluar-for')">
              <i class="far fa-circle nav-icon"></i>
              <p>Forward Keluar</p>
            </a>
          </li>
        </ul>
      </li>
      
      
      <li class="nav-header">Surat External</li>
      <li class="nav-item @yield('main-dis-ex')">
        <a href="#" class="nav-link @yield('submain-dis-ex')">
          <i class="nav-icon fas fa-fw fa-reply-all"></i>
          <p>
           Disposisi Surat
            <i class="fas fa-angle-left right"></i>
            {{-- <span class="badge badge-info right">6</span> --}}
          </p>
        </a>
        <ul class="nav nav-treeview">
          @if (auth()->user()->level == 'dirut')
          <li class="nav-item">
            <a  href="/surat/disposisi" class="nav-link @yield('buat-dis-ex')" ">
              <i class="far fa-circle nav-icon"></i>
              <p>Buat Disposisi</p>
            </a>
          </li>
          @endif
          @if (auth()->user()->level == 'admin' || auth()->user()->level == 'kabag'||auth()->user()->level == 'karu')
          <li class="nav-item">
            <a  href="/surat/disposisi/masuk" class="nav-link @yield('masuk-dis-ex')">
              <i class="far fa-circle nav-icon"></i>
              <p>Disposisi Masuk</p>
            </a>
          </li>
          @endif
          @if (auth()->user()->level == 'dirut' || auth()->user()->level == 'admin')
          <li class="nav-item">
            <a  href="/surat/disposisi/terkirim" class="nav-link @yield('keluar-dis-ex')">
              <i class="far fa-circle nav-icon"></i>
              <p>Disposisi Terkirim</p>
            </a>
          </li>
          @endif
         
          @if (auth()->user()->level == 'admin')
          <li class="nav-item">
            <a  href="/forward/terkirim" class="nav-link @yield('terkirirm-for-ex')">
              <i class="far fa-circle nav-icon"></i>
              <p>Forward Terkirim</p>
            </a>
          </li>
          @endif
          @if (auth()->user()->level == 'admin' || auth()->user()->level == 'kabag'||auth()->user()->level == 'karu')
          <li class="nav-item">
            <a  href="/forward/disposisi/surat/masuk" class="nav-link @yield('masuk-for-ex')">
              <i class="far fa-circle nav-icon"></i>
              <p>Forward Masuk</p>
            </a>
          </li>
          <li class="nav-item">
            <a  href="/forward/disposisi/surat/keluar" class="nav-link @yield('keluar-for-ex')">
              <i class="far fa-circle nav-icon"></i>
              <p>Forward Keluar</p>
            </a>
          </li>
          @endif
        </ul>
      </li>
      @if (auth()->user()->level == 'admin')
      <li class="nav-header">Data Master</li>
      <li class="nav-item @yield('master')">
        <a href="#" class="nav-link @yield('submaster')">
          <i class="nav-icon fas fa-fw fa-folder"></i>
         
          <p>
           Master
            <i class="fas fa-angle-left right"></i>
            {{-- <span class="badge badge-info right">6</span> --}}
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a  href="/list-jabatan" class="nav-link @yield('jabatan')" ">
              <i class="far fa-circle nav-icon"></i>
              <p>Jabatan</p>
            </a>
          </li>
          <li class="nav-item">
            <a  href="/list-user" class="nav-link @yield('pengguna')">
              <i class="far fa-circle nav-icon"></i>
              <p>Pengguna</p>
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-item">
        <a href="/setting" class="nav-link @yield('setting')">
          <i class="nav-icon fas fa-cog"></i>
          <p>
           Setting
          </p>
        </a>
      </li>
      <li class="nav-item">
        <a href="/lihat/log" class="nav-link @yield('log')">
         
          <i class="nav-icon fas fa-random"></i>
          <p>
            Log Aktivitas
          </p>
        </a>
      </li>
      @endif
      
      {{-- <li class="nav-item">
        <a href="pages/calendar.html" class="nav-link">
          <i class="nav-icon far fa-calendar-alt"></i>
          <p>
            Calendar
            <span class="badge badge-info right">2</span>
          </p>
        </a>
      </li>
      <li class="nav-item">
        <a href="pages/gallery.html" class="nav-link">
          <i class="nav-icon far fa-image"></i>
          <p>
            Gallery
          </p>
        </a>
      </li>
      <li class="nav-item">
        <a href="pages/kanban.html" class="nav-link">
          <i class="nav-icon fas fa-columns"></i>
          <p>
            Kanban Board
          </p>
        </a>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link">
          <i class="nav-icon far fa-envelope"></i>
          <p>
            Mailbox
            <i class="fas fa-angle-left right"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="pages/mailbox/mailbox.html" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Inbox</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="pages/mailbox/compose.html" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Compose</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="pages/mailbox/read-mail.html" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Read</p>
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-book"></i>
          <p>
            Pages
            <i class="fas fa-angle-left right"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="pages/examples/invoice.html" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Invoice</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="pages/examples/profile.html" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Profile</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="pages/examples/e-commerce.html" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>E-commerce</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="pages/examples/projects.html" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Projects</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="pages/examples/project-add.html" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Project Add</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="pages/examples/project-edit.html" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Project Edit</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="pages/examples/project-detail.html" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Project Detail</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="pages/examples/contacts.html" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Contacts</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="pages/examples/faq.html" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>FAQ</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="pages/examples/contact-us.html" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Contact us</p>
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link">
          <i class="nav-icon far fa-plus-square"></i>
          <p>
            Extras
            <i class="fas fa-angle-left right"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>
                Login & Register v1
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/examples/login.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Login v1</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/register.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Register v1</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/forgot-password.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Forgot Password v1</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/recover-password.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Recover Password v1</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>
                Login & Register v2
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/examples/login-v2.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Login v2</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/register-v2.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Register v2</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/forgot-password-v2.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Forgot Password v2</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/recover-password-v2.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Recover Password v2</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="pages/examples/lockscreen.html" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Lockscreen</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="pages/examples/legacy-user-menu.html" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Legacy User Menu</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="pages/examples/language-menu.html" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Language Menu</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="pages/examples/404.html" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Error 404</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="pages/examples/500.html" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Error 500</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="pages/examples/pace.html" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Pace</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="pages/examples/blank.html" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Blank Page</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="starter.html" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Starter Page</p>
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-search"></i>
          <p>
            Search
            <i class="fas fa-angle-left right"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="pages/search/simple.html" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Simple Search</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="pages/search/enhanced.html" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Enhanced</p>
            </a>
          </li>
        </ul>
      </li> --}}
      
    </ul>
  </nav>