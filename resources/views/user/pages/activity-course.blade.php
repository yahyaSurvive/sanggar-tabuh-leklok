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
                    <div class="row g-4">
                        @forelse ($data as $row)
                            <div class="col-lg-6 wow bounceInUp" data-wow-delay="0.1s">
                                <div class="menu-item d-flex flex-column gap-2 flex-lg-row mb-3 align-items-center">
                                    <div class="col-12 col-lg-4 mb-2" style="height: 8rem;">
                                        <img class="flex-shrink-0 img-fluid img-cover"
                                            style="width: 100%; height: 100%; object-fit: cover;"
                                            src="{{ asset('course/' . $row->photo) }}" alt="">
                                    </div>
                                    <div class="col-12 col-lg-8 d-flex flex-column text-start">
                                        <div class="border-bottom border-primary pb-2 mb-2">
                                            <h4 class="text-primary">{{ $row->start_day }}
                                                {{ $row->end_day ? " - {$row->end_day}" : '' }}</h4>
                                        </div>
                                        <h5>- {{ $row->name }} -</h5>
                                        <p class="mb-0">Waktu :
                                            {{ \Carbon\Carbon::parse($row->start_hour)->format('H:i') }} -
                                            {{ \Carbon\Carbon::parse($row->end_hour)->format('H:i') }}</p>
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
