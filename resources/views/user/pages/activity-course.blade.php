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
                            <div class="col-lg-12 py-4 wow bounceInUp shadow" data-wow-delay="0.1s">
                                <div class="menu-item d-flex flex-column gap-2 flex-lg-row mb-3 align-items-center">
                                    <div class="col-12 col-lg-5">
                                        <div class="videocourse"
                                            style="background: linear-gradient(rgba(254, 218, 154, 0.1), rgba(254, 218, 154, 0.1)), url('{{ asset('course/' . $row->photo) }}')">
                                            <button type="button" class="btn btn-play" data-bs-toggle="modal"
                                                data-src="{{ $row->video_link }}" data-bs-target="#videoModal">
                                                <span></span>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-7 d-flex flex-column text-start">
                                        <div class="border-bottom border-primary pb-2 mb-2">
                                            <h4 class="text-primary">{{ $row->start_day }}
                                                {{ $row->end_day ? " - {$row->end_day}" : '' }}</h4>
                                        </div>
                                        <h5>{{ $row->name }}</h5>
                                        <p><b>Waktu :</b>
                                            {{ \Carbon\Carbon::parse($row->start_hour)->format('H:i') }} -
                                            {{ \Carbon\Carbon::parse($row->end_hour)->format('H:i') }}</p>
                                        <p> {{ $row->additional }}</p>
                                        <p class="mb-0 text-end"><b>Rp
                                                {{ number_format($row->price, 0, ',', '.') }}</b> /pertemuan
                                        </p>
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

    <!-- Modal Video -->
    <div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content rounded-0">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Youtube Video</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- 16:9 aspect ratio -->
                    <div class="ratio ratio-16x9">
                        <iframe class="embed-responsive-item" src="" id="video" allowfullscreen
                            allowscriptaccess="always" allow="autoplay"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Fact End -->
@endsection

@push('css')
    <style>
        .videocourse {
            position: relative;
            height: 100%;
            min-height: 250px;
            background-position: center center;
            background-repeat: no-repeat;
            background-size: cover;
        }

        .videocourse .btn-play {
            position: absolute;
            z-index: 3;
            top: 50%;
            left: 50%;
            transform: translateX(-50%) translateY(-50%);
            box-sizing: content-box;
            display: block;
            width: 32px;
            height: 42px;
            border-radius: 50%;
            border: none;
            outline: none;
            padding: 18px 20px 18px 28px;
        }

        .videocourse .btn-play:before {
            content: "";
            position: absolute;
            z-index: 0;
            left: 50%;
            top: 50%;
            transform: translateX(-50%) translateY(-50%);
            display: block;
            width: 100px;
            height: 100px;
            background: var(--bs-primary);
            border-radius: 50%;
            animation: pulse-border 1500ms ease-out infinite;
        }

        .videocourse .btn-play:after {
            content: "";
            position: absolute;
            z-index: 1;
            left: 50%;
            top: 50%;
            transform: translateX(-50%) translateY(-50%);
            display: block;
            width: 100px;
            height: 100px;
            background: var(--bs-white);
            border-radius: 50%;
            transition: all 200ms;
        }

        .videocourse .btn-play img {
            position: relative;
            z-index: 3;
            max-width: 100%;
            width: auto;
            height: auto;
        }

        .videocourse .btn-play span {
            display: block;
            position: relative;
            z-index: 3;
            width: 0;
            height: 0;
            border-left: 32px solid var(--bs-dark);
            border-top: 22px solid transparent;
            border-bottom: 22px solid transparent;
        }

        @keyframes pulse-border {
            0% {
                transform: translateX(-50%) translateY(-50%) translateZ(0) scale(1);
                opacity: 1;
            }

            100% {
                transform: translateX(-50%) translateY(-50%) translateZ(0) scale(1.5);
                opacity: 0;
            }
        }
    </style>
@endpush
