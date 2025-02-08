@extends('user.layouts.main')

@section('title', 'Tentang Kami - Makna Sanggar')

@section('content')
    <!-- Hero Start -->
    <div class="container-fluid bg-light py-6 my-6 mt-0">
        <div class="container text-center animated bounceInDown">
            <h1 class="display-1 mb-4">Profil Pelatih</h1>
            <ol class="breadcrumb justify-content-center mb-0 animated bounceInDown">
                <li class="breadcrumb-item"><a href="{{ route('/') }}">Beranda</a></li>
                <li class="breadcrumb-item"><a href="#">Tentang Kami</a></li>
                <li class="breadcrumb-item text-dark" aria-current="page">Profil Pelatih</li>
            </ol>
        </div>
    </div>
    <!-- Hero End -->

    <!-- About Satrt -->
    <div class="container-fluid py-4">
        <div class="container">
            <div class="d-flex gap-4 flex-column flex-lg-row">
                <div class="col-12 col-lg-5 wow bounceInUp" data-wow-delay="0.1s">
                    <img src="{{ asset('assets/user/img/pelatih.jpeg') }}" class="img-fluid rounded" alt="logo Sanggar">
                </div>
                <div class="col-12 col-lg-7 wow bounceInUp" data-wow-delay="0.3s">
                    <h1 class="display-5 mb-4">Profil Pelatih Sanggar Leklok</h1>

                    <div style="text-align: justify">
                        <p><span class="me-5"></span><b>I Wayan Sujana</b>, seorang pria berusia 60 tahun, dikenal sebagai
                            sosok yang penuh kesabaran
                            dan
                            dedikasi dalam mendidik murid-muridnya. Dengan pengalaman hidup yang kaya dan kepribadian yang
                            hangat, ia telah menjadi panutan bagi banyak orang, baik dalam kehidupan sehari-hari maupun
                            dalam proses pembelajaran.</p>
                        <p><span class="me-5"></span>Sebagai anak pertama dari lima bersaudara, I Wayan Sujana tumbuh
                            dengan rasa tanggung jawab yang
                            besar terhadap keluarga dan lingkungan sekitarnya. Nilai-nilai kebersamaan, kerja keras, dan
                            kesederhanaan yang ditanamkan sejak kecil tercermin dalam cara ia berinteraksi dengan
                            murid-muridnya. Ia percaya bahwa setiap individu memiliki potensi unik yang perlu dikembangkan
                            dengan penuh kesabaran dan perhatian.</p>
                        <p><span class="me-5"></span>Keseharian I Wayan Sujana diisi dengan kegiatan yang mencerminkan
                            kecintaannya pada seni dan
                            alam. Ia aktif dalam berbagai kegiatan berkesenian, baik sebagai pelaku maupun penikmat seni.
                            Kecintaannya pada seni tidak hanya menjadi hobi, tetapi juga menjadi sarana baginya untuk
                            mengajarkan nilai-nilai keindahan, kreativitas, dan ketekunan kepada murid-muridnya.</p>
                        <p><span class="me-5"></span>Selain berkesenian, I Wayan Sujana juga menikmati kegiatan
                            bersih-bersih dan berkebun. Kegiatan
                            ini tidak hanya menjadi cara baginya untuk menjaga lingkungan sekitar, tetapi juga sebagai
                            bentuk meditasi dan refleksi diri. Ia sering kali mengajak murid-muridnya untuk terlibat dalam
                            kegiatan ini, mengajarkan pentingnya menjaga kebersihan, menghargai alam, dan menumbuhkan rasa
                            tanggung jawab.</p>
                        <p><span class="me-5"></span>Dengan kombinasi antara kesabaran, kecintaan pada seni, dan
                            kepedulian terhadap lingkungan, I
                            Wayan Sujana telah menciptakan lingkungan belajar yang menyenangkan dan inspiratif bagi
                            murid-muridnya. Ia tidak hanya mengajarkan pengetahuan, tetapi juga nilai-nilai kehidupan yang
                            akan membentuk karakter mereka menjadi pribadi yang lebih baik.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->
@endsection
