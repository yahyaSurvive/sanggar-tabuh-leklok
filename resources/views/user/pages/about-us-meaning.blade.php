@extends('user.layouts.main')

@section('title', 'Tentang Kami - Makna Sanggar')

@section('content')
    <!-- Hero Start -->
    <div class="container-fluid bg-light py-6 my-6 mt-0">
        <div class="container text-center animated bounceInDown">
            <h1 class="display-1 mb-4">Makna</h1>
            <ol class="breadcrumb justify-content-center mb-0 animated bounceInDown">
                <li class="breadcrumb-item"><a href="{{ route('/') }}">Beranda</a></li>
                <li class="breadcrumb-item"><a href="#">Tentang Kami</a></li>
                <li class="breadcrumb-item text-dark" aria-current="page">Makna</li>
            </ol>
        </div>
    </div>
    <!-- Hero End -->

    <!-- About Satrt -->
    <div class="container-fluid py-4">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-7 wow bounceInUp" data-wow-delay="0.3s">
                    <h1 class="display-5 mb-4">Arti Logo</h1>
                    <div style="text-align: justify">
                        <p class="mb-3"><span class="me-5"></span>Sanggar Leklok memiliki Logo TERATAI dengan 7 (Tujuh)
                            Bilah daun. Dari
                            sumber mengatakan tumbuhan teratai bisa hidup dimana saja, baik dalam air maupun
                            tidak ada air. Jika dikaitkan dengam kehidupan sosial, sanggar kami memiliki harapan
                            agar Sanggar Leklok ini tetap hidup dengan apapun yang terjadi. Oleh karena itu teratai
                            pilihan kami sebagai Logo pada Sanggar Leklok, kenapa pada logo miliki 7(tujuh) bilah
                            daun? Karena maksud kami yaitu daun instrumen Gangsa Pada Gong Semar Pegulingan,
                            yang memiliki 7 Bilah daun. Sehingga jelas jika dikaitkan dengan maksud Logo kami
                            “Teratai Dengan 7 Bilah Daun”.</p>
                        <h1 class="display-5 mb-4">Arti Leklok</h1>
                        <p><span class="me-5"></span>Lana, eling, kariinan, lestariang, oneng-onengan, katamiang
                            artinya : selalu ingat leluhur dan melestarikan bakat seni yang di wariskan</p>
                    </div>
                </div>
                <div class="col-lg-5 wow bounceInUp" data-wow-delay="0.1s">
                    <img src="{{ asset('assets/user/img/logo-sanggar-satin.png') }}" class="img-fluid rounded"
                        alt="logo Sanggar">
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->
@endsection
