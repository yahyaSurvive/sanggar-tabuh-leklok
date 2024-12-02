@extends('user.layouts.main')

@section('title', 'Quis')

@section('content')
    <!-- Hero Start -->
    <div class="container-fluid bg-light py-6 my-6 mt-0">
        <div class="container text-center animated bounceInDown">
            <h1 class="display-1 mb-4">Quis</h1>
            <ol class="breadcrumb justify-content-center mb-0 animated bounceInDown">
                <li class="breadcrumb-item"><a href="{{ route('/') }}">Beranda</a></li>
                <li class="breadcrumb-item text-dark" aria-current="page">Quis</li>
            </ol>
        </div>
    </div>
    <!-- Hero End -->

    <div class="container-fluid event py-4">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-8">
                    <h2>Quis Tes Sanggar LekLok</h2>
                    <button class="btn btn-primary" id="btn-start-quis"> Mulai Kuis</button>
                </div>
                <div class="col-lg-4">
                    <div class="card shadow border-primary">
                        <div class="card-body">
                            <div class="bg-secondary rounded-1 mb-3" style="height: 200px"></div>
                            <button class="w-100 btn btn-outline-primary">Pembahasan</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $('#btn-start-quis').click(function() {
            window.location.href = "{{ route('quis.start') }}"
        });
    </script>
@endpush
