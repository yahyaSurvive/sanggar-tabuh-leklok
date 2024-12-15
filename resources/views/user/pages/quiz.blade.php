@extends('user.layouts.main')

@section('title', 'quiz')

@section('content')
    <!-- Hero Start -->
    <div class="container-fluid bg-light py-6 my-6 mt-0">
        <div class="container text-center animated bounceInDown">
            <h1 class="display-1 mb-4">Quiz</h1>
            <ol class="breadcrumb justify-content-center mb-0 animated bounceInDown">
                <li class="breadcrumb-item"><a href="{{ route('/') }}">Beranda</a></li>
                <li class="breadcrumb-item text-dark" aria-current="page">Quiz</li>
            </ol>
        </div>
    </div>

    @php
        // $last_quiz = null;
    @endphp
    <!-- Hero End -->
    <div class="container-fluid event py-4">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-7 wow bounceInUp" data-wow-delay="0.1s">
                    <div class="card shadow">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="{{ asset('assets/user/img/quiz1.jpg') }}" class="card-img-top">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h4 class="card-title">Quiz Sanggar Tabuh LekLok</h4>
                                    <p class="card-text">Klik Tombol dibawah untuk memulai quiz.</p>
                                    <hr>
                                    <button class="btn btn-primary rounded-pill px-4 py-2 shadow" id="btn-start-quiz">
                                        {{ $last_tryout ? 'Ulangi' : 'Mulai' }}
                                        Quiz</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="card shadow border-primary wow bounceInUp" data-wow-delay="0.1s">
                        <div class="card-header bg-primary text-white text-center py-3"
                            style="font-size: 1.2rem; font-weight: bold;">
                            Statistik Quiz Anda
                        </div>
                        <div class="card-body">
                            @if ($last_tryout)
                                <div class="alert alert-success rounded-1 mb-3" style="min-height: 200px">
                                    <div class="text-center fw-semibold">Perolehan Nilai Terbaru</div>
                                    <div class="text-center" style="font-size: 5rem; font-weight: 800;">
                                        {{ $last_tryout->score }}
                                    </div>
                                    <div class="text-center">Benar :
                                        <b>{{ $last_tryout->total_correct }}/{{ $last_tryout->total_questions }}
                                            Soal</b>
                                    </div>
                                </div>
                                <button class="w-100 btn btn-outline-primary" data-id="{{ $last_tryout->id_tryout }}"
                                    id="review-answers">Review</button>
                            @else
                                <div class="alert alert-secondary rounded-1 mb-3 d-flex justify-content-center align-items-center"
                                    style="min-height: 200px">
                                    <div class="text-center" style="font-size: 1.2rem; font-weight: 600;">
                                        Belum ada nilai terbaru.
                                    </div>
                                </div>
                                <button class="w-100 btn btn-outline-primary" disabled>Review</button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endpush
@push('scripts')
    <script>
        let last_tryout = @json($last_tryout);
        $('#btn-start-quiz').click(function() {
            const text = last_tryout ?
                'Kamu yakin ingin mengerjakan quiz kembali (jawaban dan nilai sebelumnya akan dihapus)?' :
                'Kerjakan quiz sekarang?'
            Swal.fire({
                title: 'Perhatian!',
                text: text,
                icon: 'info',
                showCancelButton: true,
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "{{ route('quiz.start') }}";
                }
            })

        });
        $('#review-answers').click(function() {
            const id = $(this).data('id');
            const url = "{{ route('quiz.review-answers', ':id') }}".replace(':id', id);
            window.location.href = url;
        });
    </script>
@endpush
