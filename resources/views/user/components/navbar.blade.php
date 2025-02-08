 <!-- Navbar start -->
 <div class="container-fluid nav-bar"
     @if (Route::currentRouteName() === '/') style="background-color : transparent !important;" @endif>
     <div class="container">
         <nav class="navbar navbar-light navbar-expand-lg py-3">
             <a href="{{ route('/') }}" class="navbar-brand">
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
                             class="nav-link dropdown-toggle {{ in_array(Route::currentRouteName() , ['about-us.history', 'about-us.meaning', 'about-us.achievement', 'about-us.trainer-profile']) ? 'active' : '' }}"
                             data-bs-toggle="dropdown">Tentang Kami</a>
                         <div class="dropdown-menu bg-light">
                             <a href="{{ route('about-us.history') }}"
                                 class="dropdown-item {{ Route::currentRouteName() === 'about-us.history' ? 'active' : '' }}">Sejarah
                             </a>
                             <a href="{{ route('about-us.meaning') }}"
                                 class="dropdown-item {{ Route::currentRouteName() === 'about-us.meaning' ? 'active' : '' }}">Makna
                             </a>
                             <a href="{{ route('about-us.achievement') }}"
                                 class="dropdown-item {{ Route::currentRouteName() === 'about-us.achievement' ? 'active' : '' }}">Prestasi
                             </a>
                             <a href="{{ route('about-us.trainer-profile') }}"
                                 class="dropdown-item {{ Route::currentRouteName() === 'about-us.trainer-profile' ? 'active' : '' }}">Profil Pelatih
                             </a>
                         </div>
                     </div>
                     <div class="nav-item dropdown">
                         <a href="#"
                             class="nav-link dropdown-toggle {{ Route::currentRouteName() === 'activity.gallery' || Route::currentRouteName() === 'activity.course' ? 'active' : '' }}"
                             data-bs-toggle="dropdown">Kegiatan</a>
                         <div class="dropdown-menu bg-light">
                             <a href="{{ route('activity.gallery') }}"
                                 class="dropdown-item {{ Route::currentRouteName() === 'activity.gallery' ? 'active' : '' }}">
                                 Galeri</a>
                             <a href="{{ route('activity.course') }}"
                                 class="dropdown-item {{ Route::currentRouteName() === 'activity.course' ? 'active' : '' }}">
                                 Pilihan Les</a>
                         </div>
                     </div>

                     <a href="{{ route('quiz') }}"
                         class="nav-item nav-link {{ in_array(Route::currentRouteName(), ['quiz', 'quiz.start', 'quiz.review-answers']) ? 'active' : '' }}">Quiz</a>
                     <a href="{{ route('contact-person') }}"
                         class="nav-item nav-link {{ Route::currentRouteName() === 'contact-person' ? 'active' : '' }}">Kontak</a>
                     <a href="{{ route('help') }}"
                         class="nav-item nav-link {{ Route::currentRouteName() === 'help' ? 'active' : '' }}">Bantuan</a>
                 </div>

                 @if (Auth::user())
                     <div class="nav-item dropdown">
                         <a href="#"
                             class="btn-search btn btn-primary btn-md-square me-1 rounded-circle d-inline-flex"
                             data-bs-toggle="dropdown"><i class="fas fa-user"></i></a> {{ Auth::user()->username }}
                         <div class="dropdown-menu bg-light">
                             <a href="{{ route('user.profile') }}"
                                 class="dropdown-item {{ Route::currentRouteName() === 'user.profile' ? 'active' : '' }}">
                                 Profil</a>
                             <a href="{{ route('user.change-password') }}"
                                 class="dropdown-item {{ Route::currentRouteName() === 'user.change-password' ? 'active' : '' }}">
                                 Ganti Password</a>
                             <a href="{{ route('logout') }}" class="dropdown-item">
                                 Logout </a>
                         </div>
                     </div>
                 @else
                     <a href="{{ route('login') }}"
                         class="btn-search btn btn-primary btn-md-square me-4 rounded-circle  d-lg-inline-flex"><i
                             class="fas fa-sign-in-alt"></i>
                     </a>
                 @endif
             </div>
         </nav>
     </div>
 </div>
 <!-- Navbar End -->
