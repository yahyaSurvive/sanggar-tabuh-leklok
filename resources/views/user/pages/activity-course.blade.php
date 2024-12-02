@extends('user.layouts.main')

@section('title', 'Kegiatan - Pilihan Les')

@section('content')
    <!-- Hero Start -->
    <div class="container-fluid bg-light py-6 my-6 mt-0">
        <div class="container text-center animated bounceInDown">
            <h1 class="display-1 mb-4">Pilihan Les</h1>
            <ol class="breadcrumb justify-content-center mb-0 animated bounceInDown">
                <li class="breadcrumb-item"><a href="{{ route('/') }}">Beranda</a></li>
                <li class="breadcrumb-item"><a href="#">Kegiatan</a></li>
                <li class="breadcrumb-item text-dark" aria-current="page">Pilihan Les</li>
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
                                'id_class' => 1,
                                'day_1' => 'SENIN',
                                'day_2' => 'KAMIS',
                                'start_time' => '15:00',
                                'end_time' => '17:00',
                                'course_type' => 'GENDER',
                            ],
                            [
                                'id_class' => 1,
                                'day_1' => 'JUMAT',
                                'day_2' => null,
                                'start_time' => '15:00',
                                'end_time' => '17:00',
                                'course_type' => 'KENDANG TUNGGAL',
                            ],
                        ]);
                    @endphp
                    <div class="row g-4">
                        @forelse ($data as $row)
                            <div class="col-lg-6 wow bounceInUp" data-wow-delay="0.1s">
                                <div class="menu-item d-flex align-items-center">
                                    <img class="flex-shrink-0 img-fluid "
                                        src="{{ asset('assets/user/img/logo-sanggar-satin.png') }}" width="120"
                                        alt="">
                                    <div class="w-100 d-flex flex-column text-start ps-4">
                                        <div class="border-bottom border-primary pb-2 mb-2">
                                            <h4 class="text-primary">{{ $row->day_1 }}
                                                {{ $row->day_2 ? " - {$row->day_2}" : '' }}</h4>
                                        </div>
                                        <h5>- {{ $row->course_type }} -</h5>
                                        <p class="mb-0">Waktu : {{ $row->start_time }} - {{ $row->end_time }}</p>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-lg-12 wow bounceInUp" data-wow-delay="0.1s">
                                <div class="menu-item">
                                    <div class="border-bottom border-primary pb-2 mb-2">
                                        <p class="text-center">Tidak ada pilihan les.</p>
                                    </div>
                                </div>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
