@extends('user.layouts.main')

@section('content')
    <!-- Hero Start -->
    <div class="container-fluid bg-light py-6 my-6 mt-0">
        <div class="container text-center animated bounceInDown">
            <h1 class="display-1 mb-4">Bantuan</h1>
            <ol class="breadcrumb justify-content-center mb-0 animated bounceInDown">
                <li class="breadcrumb-item"><a href="{{ route('/') }}">Beranda</a></li>
                <li class="breadcrumb-item text-dark" aria-current="page">Bantuan</li>
            </ol>
        </div>
    </div>


    <div class="container py-5">
        <div class="row g-5">
            <!-- Panduan Berdasarkan Halaman -->
            <div class="col-lg-6">
                <div class="card shadow border-0 wow bounceInUp" data-wow-delay="0.1s">
                    <div class="card-header bg-info text-white text-center">
                        <h5>Panduan Berdasarkan Halaman</h5>
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            <li class="list-group-item"><strong>Beranda:</strong> Halaman awal, dan lihat video mengenai
                                sanggar.</li>
                            <li class="list-group-item"><strong>Sejarah:</strong> Jelajahi cerita perjalanan kami.</li>
                            <li class="list-group-item"><strong>Makna:</strong> Mengetahui arti logo kami.</li>
                            <li class="list-group-item"><strong>Prestasi:</strong> Beberapa prestasi yang ditorehkan sanggar
                            </li>
                            <li class="list-group-item"><strong>Profil Pelatih:</strong> Profil singkat dari pelatih sanggar
                            </li>
                            <li class="list-group-item"><strong>Quiz:</strong> Mulai kuis, lihat hasil, atau ulangi kuis.
                            </li>
                            <li class="list-group-item"><strong>Gallery:</strong> Nikmati koleksi foto dan video kami.</li>
                            <li class="list-group-item"><strong>Pilihan Les:</strong> Pilih kursus dan daftar dengan mudah.
                            </li>
                            <li class="list-group-item"><strong>Kontak:</strong> Kontak, alamat dean semua sosial media
                                kami.
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- FAQ -->
            <div class="col-lg-6">
                <div class="card shadow border-0 wow bounceInUp" data-wow-delay="0.2s">
                    <div class="card-header bg-warning text-dark text-center">
                        <h5>Masalah Umum</h5>
                    </div>
                    <div class="card-body">
                        <p><strong>Kuis tidak bisa dimulai:</strong><br>Refresh halaman atau pastikan Anda sudah login.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Kontak Bantuan -->
        <div class="row mt-5 wow bounceInUp" data-wow-delay="0.2s">
            <div class="col-12 text-center">
                <p class="lead">Masih membutuhkan bantuan? Hubungi kami melalui tombol berikut:</p>
                <a href="https://wa.me/628124698275?text=Halo%20Saya%20ingin%20menanyakan..." target="_blank"
                    class="btn btn-primary rounded-pill px-4 py-2 shadow">Hubungi Kami</a>
            </div>
        </div>
    </div>
@endsection
