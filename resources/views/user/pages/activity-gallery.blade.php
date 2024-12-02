@extends('user.layouts.main')

@section('title', 'Kegiatan - Galeri')

@section('content')
    <!-- Hero Start -->
    <div class="container-fluid bg-light py-6 my-6 mt-0">
        <div class="container text-center animated bounceInDown">
            <h1 class="display-1 mb-4">Galeri</h1>
            <ol class="breadcrumb justify-content-center mb-0 animated bounceInDown">
                <li class="breadcrumb-item"><a href="{{ route('/') }}">Beranda</a></li>
                <li class="breadcrumb-item"><a href="#">Kegiatan</a></li>
                <li class="breadcrumb-item text-dark" aria-current="page">Galeri</li>
            </ol>
        </div>
    </div>
    <!-- Hero End -->

    <div class="container-fluid event py-4">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-12">
                    @php
                        $data = array_map(fn($item) => (object) $item, [
                            [
                                'id' => 1,
                                'name' => '',
                                'description' => '',
                                'path' => '',
                            ],
                            [
                                'id' => 1,
                                'name' => '',
                                'description' => '',
                                'path' => '',
                            ],
                            [
                                'id' => 1,
                                'name' => '',
                                'description' => '',
                                'path' => '',
                            ],
                            [
                                'id' => 1,
                                'name' => '',
                                'description' => '',
                                'path' => '',
                            ],
                        ]);
                    @endphp
                    <div class="row g-4">
                        @forelse ($data as $row)
                            <div class="col-md-6 col-lg-3 wow bounceInUp" data-wow-delay="0.1s">
                                <div class="event-img position-relative">
                                    <img class="img-fluid rounded w-100" src="{{ asset('assets/user/img/sanggar.jpg') }}"
                                        alt="">
                                    <div class="event-overlay d-flex flex-column p-4">
                                        <h4 class="me-auto">{{ $row->name }}</h4>
                                        <a href="{{ asset('assets/user/img/sanggar.jpg') }}" data-lightbox="event-1"
                                            class="my-auto"><i class="fas fa-search-plus text-dark fa-2x"></i></a>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-12 wow bounceInUp" data-wow-delay="0.1s">
                                <p class="text-center">Tidak ada gambar.</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
