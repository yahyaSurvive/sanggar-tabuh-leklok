 <!-- Navbar start -->
 <div class="container-fluid nav-bar">
     <div class="container">
         <nav class="navbar navbar-light navbar-expand-lg py-3">
             <a href="index.html" class="navbar-brand">
                 <img src="{{ asset('assets/user/img/logo-sanggar.png') }}" alt="Logo Sanggar Tabuh Leklok" width="50">
             </a>
             <button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse"
                 data-bs-target="#navbarCollapse">
                 <span class="fa fa-bars text-primary"></span>
             </button>
             <div class="collapse navbar-collapse" id="navbarCollapse">
                 <div class="navbar-nav mx-auto">
                     <a href="{{ route('/') }}"
                         class="nav-item nav-link {{ Route::currentRouteName() === '/' ? 'active' : '' }}">Beranda</a>
                     <div class="nav-item dropdown">
                         <a href="#"
                             class="nav-link dropdown-toggle {{ Route::currentRouteName() === 'about-us.history' || Route::currentRouteName() === 'about-us.meaning' ? 'active' : '' }}"
                             data-bs-toggle="dropdown">Tentang Kami</a>
                         <div class="dropdown-menu bg-light">
                             <a href="{{ route('about-us.history') }}"
                                 class="dropdown-item {{ Route::currentRouteName() === 'about-us.history' ? 'active' : '' }}">Sejarah
                                 Sanggar</a>
                             <a href="{{ route('about-us.meaning') }}"
                                 class="dropdown-item {{ Route::currentRouteName() === 'about-us.meaning' ? 'active' : '' }}">Makna
                                 Sanggar</a>
                         </div>
                     </div>
                     <div class="nav-item dropdown">
                         <a href="#"
                             class="nav-link dropdown-toggle {{ Route::currentRouteName() === 'about-us.history' || Route::currentRouteName() === 'about-us.meaning' ? 'active' : '' }}"
                             data-bs-toggle="dropdown">Kegiatan</a>
                         <div class="dropdown-menu bg-light">
                             <a href="{{ route('about-us.history') }}"
                                 class="dropdown-item {{ Route::currentRouteName() === 'about-us.history' ? 'active' : '' }}">Sejarah
                                 Galeri</a>
                             <a href="{{ route('about-us.meaning') }}"
                                 class="dropdown-item {{ Route::currentRouteName() === 'about-us.meaning' ? 'active' : '' }}">Makna
                                 Pilihan Les</a>
                         </div>
                     </div>
                     <a href="{{ route('activity') }}"
                         class="nav-item nav-link {{ Route::currentRouteName() === 'activity' ? 'active' : '' }}">Kegiatan</a>
                     <a href="{{ route('contact-person') }}"
                         class="nav-item nav-link {{ Route::currentRouteName() === 'contact-person' ? 'active' : '' }}">Kontak</a>
                     <a href="{{ route('quis') }}"
                         class="nav-item nav-link {{ Route::currentRouteName() === 'contact-person' ? 'active' : '' }}">Quis</a>
                     <a href="{{ route('help') }}"
                         class="nav-item nav-link {{ Route::currentRouteName() === 'help' ? 'active' : '' }}">Bantuan</a>
                 </div>
                 <a href="#"
                     class="btn-search btn btn-primary btn-md-square me-4 rounded-circle d-none d-lg-inline-flex"><i
                         class="fas fa-sign-in-alt"></i></a>
                 {{-- <a href="" class="btn btn-primary py-2 px-4 d-none d-xl-inline-block rounded-pill">Book
                     Now</a> --}}
             </div>
         </nav>
     </div>
 </div>
 <!-- Navbar End -->
