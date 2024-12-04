@extends('user.layouts.main')

@section('title', 'Quis')

@section('content')
    @php
        // dd($data);
        // $data = [
        //     [
        //         'id' => 1,
        //         'question' => 'Apa tujuan utama dari Sanggar Tabuh Leklok?',
        //         'options' => [
        //             'A' => 'Mengajarkan seni tari Bali',
        //             'B' => 'Melestarikan seni tabuh tradisional Bali',
        //             'C' => 'Membuat alat musik tradisional',
        //             'D' => 'Menyelenggarakan festival internasional',
        //         ],
        //         'answer' => 'A',
        //         'corect_answer' => 'A',
        //     ],
        //     [
        //         'id' => 2,
        //         'question' => 'Apa tujuan utama dari Sanggar Tabuh Leklok? ',
        //         'options' => [
        //             'A' => 'Mengajarkan seni tari Bali',
        //             'B' => 'Melestarikan seni tabuh tradisional Bali',
        //             'C' => 'Membuat alat musik tradisional',
        //             'D' => 'Menyelenggarakan festival internasional',
        //         ],
        //         'answer' => 'A',
        //     ],
        // ];
    @endphp

    <div class="container-fluid event py-4">
        <div class="container">
            <a href="{{ route('quis') }}" class="btn btn-link btn-lg mb-4"><i class="fas fa-chevron-left"></i>
                Kembali</a>
        </div>
        <div class="container py-5 shadow bg-light rounded contact-form rounded-4 border-primary border"
            style="overflow:hidden;">
            <div id="question-box" class="container-fluid">
                <div class="mb-5 d-flex justify-content-center"><span class=" card__skeleton col-lg-8 card__title"></span>
                </div>
                <div class="row">
                    @for ($i = 1; $i < 5; $i++)
                        <div class="col-lg-6 text-center animated">
                            <div class="btn btn-lg btn-option rounded-pill py-4 card__skeleton">
                            </div>
                        </div>
                    @endfor
                </div>
            </div>
            <div class="container-fluid d-flex justify-content-between mt-4">
                <button id="prev-btn" class="btn btn-link btn-lg" disabled><i class="fas fa-arrow-circle-left"></i>
                    Previous </button>
                <button id="next-btn" class="btn btn-link btn-lg">Next <i class="fas fa-arrow-circle-right"></i></button>
                <button id="submit-btn" class="btn btn-primary d-none btn-lg"><i class="fas fa-save"></i> Submit</button>
            </div>
        </div>
    </div>
@endsection
@push('css')
    <style>
        .btn-option {
            min-height: 100px !important;
            width: 100% !important;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 2rem;
        }

        h1,
        h2,
        h3 {
            font-family: Arial, Helvetica, sans-serif !important;
            font-weight: 800 !important;
        }

        .animated {
            animation-duration: 0.9s !important;
        }

        .card__skeleton {
            background-image: linear-gradient(90deg,
                    #f7daad 0px,
                    rgb(229 229 229 / 90%) 40px,
                    #f7daad 80px);
            background-size: 300%;
            background-position: 100% 0;
            border-radius: inherit;
            animation: shimmer 1.5s infinite;
        }

        .card__title {
            height: 30px;
        }

        @keyframes shimmer {
            to {
                background-position: -100% 0;
            }
        }
    </style>
@endpush
@push('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endpush
@push('scripts')
    <script>
        let questions = @json($data);
        let currentQuestion = 0; // Indeks soal yang sedang ditampilkan
        let userAnswers = {}; // Object untuk menyimpan jawaban pengguna

        $(document).ready(function() {
            renderQuestion();

        });

        renderQuestion = (params = null) => {
            let question = questions[currentQuestion];
            let optionsHTML = "";
            const bounceIn = params == 1 ? 'bounceInLeft' : 'bounceInRight';
            const bounceOut = params == 1 ? 'bounceOutRight' : 'bounceOutLeft';

            $("#question-box").addClass(`animated ${bounceOut}`).on("animationend", function() {

                $(this).removeClass(`animated ${bounceOut}`).off("animationend");
                let options = JSON.parse(question.options)
                Object.entries(options).forEach(([key, option]) => {
                    optionsHTML += `
                <div class="col-lg-6 text-center animated ${bounceIn}" id="answer-box">
                    <input class="btn-check" type="radio" name="answer" id="option-${key}" value="${key}" 
                        ${userAnswers[question.id] == key ? "checked" : ""}>
                    <label class="btn btn-outline-primary btn-lg rounded-pill py-4 btn-option" for="option-${key}">
                        ${key}.${option}
                    </label>
                </div>
            `;
                });

                $("#question-box").html(`
                    <h3 class="text-center fw-bold mb-5 animated ${bounceIn}">${currentQuestion + 1}. ${question.question}</h3>
                    <div class="row">
                    ${optionsHTML} </div>`);
                updateButtons(); // Update tombol navigasi
            });
        }

        updateButtons = () => {
            $("#prev-btn").prop("disabled", currentQuestion === 0);
            $("#next-btn").toggleClass("d-none", currentQuestion === questions.length - 1);
            $("#submit-btn").toggleClass("d-none", currentQuestion !== questions.length - 1);
        }

        $("#next-btn").click(function() {
            saveAnswer(); // Simpan jawaban sebelum pindah soal
            currentQuestion++;
            renderQuestion(2);
        });

        $("#prev-btn").click(function() {
            saveAnswer(); // Simpan jawaban sebelum pindah soal
            currentQuestion--;
            renderQuestion(1);
        });

        // Fungsi untuk menyimpan jawaban pengguna
        saveAnswer = () => {
            let selectedOption = $("input[name='answer']:checked").val();
            if (selectedOption !== undefined) {
                let questionId = questions[currentQuestion].id;
                userAnswers[questionId] = selectedOption;
            }
        }

        $('#submit-btn').on('click', function() {
            saveAnswer();
            if (Object.keys(userAnswers).length == questions.length) {
                Swal.fire({
                    title: 'Perhatian',
                    text: 'Selesaikan quis sekarang?',
                    icon: 'info',
                    showCancelButton: true,
                    cancelButtonText: 'Batal',
                    confirmButtonText: 'Iya'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            method: 'POST',
                            url: '{{ route('quis.submit') }}',
                            data: {
                                _token: '{{ csrf_token() }}',
                                answers: userAnswers
                            },
                            success: function(response) {
                                if (response.success) {
                                    Swal.fire({
                                        title: 'Sukses',
                                        text: 'Berhasil menyelesaikan kuis',
                                        icon: 'success',
                                        timer: 1500,
                                        showConfirmButton: false,
                                    }).then((result) => {
                                        window.location.href = '{{ route('quis') }}';
                                    });
                                }
                            },
                            error: function(error) {
                                console.log(error);
                            }
                        })
                    }
                });
            } else {
                Swal.fire({
                    title: 'Warning',
                    text: 'Pastikan semua soal sudah dijawab.',
                    icon: 'info',
                })
            }
        });

        window.addEventListener('beforeunload', function(event) {
            // Tampilkan pesan konfirmasi
            event.preventDefault(); // Beberapa browser memerlukan ini untuk menampilkan dialog
            event.returnValue = ''; // Pesan khusus tidak didukung di sebagian besar browser modern
        });
    </script>
@endpush
