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

    @php
        // $last_quiz = null;
    @endphp
    <!-- Hero End -->
    <div class="container-fluid event py-4">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-7 wow bounceInUp" data-wow-delay="0.1s">
                    <img src="{{ asset('assets/user/img/quiz.png') }}" class="img-fluid rounded" alt="logo Sanggar"
                        width="150">
                    <h4 class="mb-4" style="font-size: 2rem; font-weight: 800;">Quis Sanggar Tabuh LekLok</h4>
                    <button class="btn btn-primary rounded-pill px-4 py-3 shadow" id="btn-start-quis">
                        {{ $last_quiz ? 'Ulangi' : 'Mulai' }}
                        Quiz</button>
                </div>
                <div class="col-lg-5">
                    <div class="card shadow border-primary wow bounceInUp" data-wow-delay="0.1s">
                        <div class="card-body">
                            @if ($last_quiz)
                                <div class="alert alert-success rounded-1 mb-3" style="min-height: 200px">
                                    <div class="text-center fw-semibold">Perolehan Nilai Terbaru</div>
                                    <div class="text-center" style="font-size: 5rem; font-weight: 800;">
                                        {{ $last_quiz['score'] }}
                                    </div>
                                    <div class="text-center">Benar :
                                        <b>{{ $last_quiz['total_correct'] }}/{{ $last_quiz['total_questions'] }}
                                            Soal</b>
                                    </div>
                                </div>
                                <button class="w-100 btn btn-outline-primary" data-id="1"
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
        let last_quiz = @json($last_quiz);
        $('#btn-start-quis').click(function() {
            const text = last_quiz ?
                'Kamu yakin ingin mengerjakan quiz kembali (jawaban dan nilai sebelumnya akan dihapus)?' :
                'Kerjakan quiz sekarang?'
            Swal.fire({
                title: 'Perhatian!',
                text: text,
                icon: 'info',
                showCancelButton: true,
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "{{ route('quis.start') }}";
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
