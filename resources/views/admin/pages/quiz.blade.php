@extends('admin.layouts.main')

@section('title_admin', 'Quiz')

@push('script_admin')
    <script src="{{ asset('assets/admin/assets/js/vendor/tables/datatables/datatables.min.js') }}"></script>

    <script src="{{ asset('assets/admin/assets/demo/pages/datatables_basic.js') }}"></script>
    <script src="{{ asset('assets/admin/assets/js/vendor/notifications/sweet_alert.min.js') }}"></script>
@endpush

@section('content_admin')
    <div class="content">
        <div class="card">
            <div class="card-header d-flex justify-content-end">
                <button id="add-quiz" class="btn btn-primary">+</button>
            </div>

            <table class="table datatable-pagination">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Question</th>
                        <th>Answer</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dataQuiz as $index => $item)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $item->question }}</td>
                            <td>{{ $item->answer }}</td>
                            <td>{{ $item->created_at->format('d M Y H.i') }}</td>
                            <td>{{ $item->updated_at->format('d M Y H.i') }}</td>
                            <td class="text-center">
                                <div class="d-inline-flex">
                                    <div class="dropdown">
                                        <a href="#" class="text-body" data-bs-toggle="dropdown">
                                            <i class="ph-list"></i>
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#detail-quiz" data-id-quiz="{{ $item->id_quiz }}" class="detail-quiz dropdown-item">
                                                <i class="ph-file-search me-2"></i>
                                                Detail
                                            </a>
                                            <a href="#" data-id-quiz="{{ $item->id_quiz }}" class="edit-quiz dropdown-item">
                                                <i class="ph-pencil-line me-2"></i>
                                                Edit
                                            </a>
                                            <a href="#" data-id-quiz="{{ $item->id_quiz }}" class="delete-quiz dropdown-item">
                                                <i class="ph-trash me-2"></i>
                                                Delete
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{-- Modal Add/Edit Quiz --}}
    <div id="modal_iconified" class="modal fade" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <i class="ph-list me-2"></i>
                        Add Question
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <div id="add-total-options" class="mb-3">
                        <label for="" class="form-label">Total Options</label>
                        <input id="total-options" type="number" min="4" class="form-control" value="4">
                    </div>

                    <div style="height: 1px; width: 100%; background-color: silver" class="my-2"></div>

                    <div id="options-container" class="mb-3"></div>

                    <!-- Hidden input to store quiz id for editing -->
                    <input type="hidden" id="quiz-id" value="">
                </div>

                <div class="modal-footer justify-content-end">
                    <button id="save-quiz" class="btn btn-primary">
                        <i class="ph-check me-1"></i>
                        Save
                    </button>
                </div>
            </div>
        </div>
    </div>


    {{-- <div id="modal_iconified" class="modal fade" tabindex="-1">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">
						<i class="ph-list me-2"></i>
						Add Question
					</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
				</div>

				<div class="modal-body">

                    <div id="add-total-options" class="mb-3">
                        <label for="" class="form-label">Total Options</label>
                        <input id="total-options" type="number" min="4" class="form-control" value="4">
                    </div>

                    <div style="height: 1px; width: 100%; background-color: silver" class="my-2"></div>

                    <div id="options-container" class="mb-3"></div>

				</div>

				<div class="modal-footer justify-content-end">
                    <div>
                        <button id="save-quiz" class="btn btn-primary">
                            <i class="ph-check me-1"></i>
                            Save
                        </button>
                    </div>
				</div>
			</div>
		</div>
	</div> --}}

    {{-- Modal Detail Question --}}
    <div id="detail-quiz" class="modal fade" tabindex="-1">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">
						<i class="ph-newspaper me-2"></i>
						Detail Question
					</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
				</div>

				<div class="modal-body">
                    <div>
                        <p id="detail-question"><b>Daun kelapa berwarna apa?</b></p>

                        <ul id="detail-options" class="list-unstyled">
                            <li>Merah</li>
                            <li>Kuning</li>
                            <li>Hijau</li>
                            <li>Biru</li>
                        </ul>

                        <p>
                            <b>Jawaban : </b>
                            <span id="detail-answer">C. Hijau</span>
                        </p>
                    </div>
				</div>

				<div class="modal-footer justify-content-end">
                    <button data-bs-dismiss="modal" class="btn btn-secondary">
                        <i class="ph-x me-1"></i>
                        Close
                    </button>
				</div>
			</div>
		</div>
	</div>
@endsection

@push('script_admin')
<script>
    $(document).ready(function () {
        function generateOptions(totalOptions, options = {}, correctAnswer = '', question) {
            console.log("kiriman : ", options);
            let container = $('#options-container');
            container.empty(); // Hapus opsi lama

            // Tambahkan input untuk pertanyaan
            container.append(`
                <div id="" class="mb-3">
                    <label for="" class="form-label">Question</label>
                    <input type="text" id="question" class="form-control" value="${question || ''}">
                </div>
            `);

            // Tambahkan input untuk setiap opsi (A, B, C, D)
            for (let i = 0; i < totalOptions; i++) {
                let optionLabel = String.fromCharCode(65 + i); // A, B, C, dst.
                let optionValue = options[optionLabel] || ''; // Ambil nilai opsi jika ada
                let isChecked = correctAnswer === optionLabel ? 'checked' : ''; // Cek jawaban yang benar

                container.append(`
                    <div class="mb-3 d-flex align-items-center gap-3">
                        <label>${optionLabel}.</label>
                        <input type="text" class="form-control" name="options[${optionLabel}]" value="${optionValue}" placeholder="Option ${optionLabel}">
                        <input type="radio" name="answer" value="${optionLabel}" ${isChecked}> Correct
                    </div>
                `);
            }
        }

        // Jalankan saat halaman pertama kali dimuat
        generateOptions($('#total-options').val());


        $('#total-options').on('input', function () {
            let totalOptions = parseInt($(this).val());
            if (isNaN(totalOptions) || totalOptions < 4) {
                alert("Total options must be at least 4.");
                return;
            }
            generateOptions(totalOptions);
        });

        $("#add-quiz").click(function (e) {
            $('#quiz-id').val("");
            generateOptions($('#total-options').val());
            $('.modal-title').text('Add Question');
            $('#modal_iconified').modal('show');
        });

        $(document).on('click', '.edit-quiz', function () {
            let quizId = $(this).data('id-quiz');
            console.log("edit : ", quizId);


            // Ambil data quiz dari server menggunakan AJAX
            $.ajax({
                type: "GET",
                url: "{{ route('admin.quiz.detail', ['id' => '__id__']) }}".replace('__id__', quizId),
                success: function (response) {
                    if (response.success) {
                        let answerEdit = response.data.answer; // Jawaban yang benar
                        let options = JSON.parse(response.data.options); // Parse opsi dari JSON
                        let totalOptions = Object.keys(options).length; // Hitung jumlah opsi
                        let question = response.data.question;

                        $('#quiz-id').val(response.data.id_quiz);
                        generateOptions(totalOptions, options, answerEdit, question);

                        // Ubah judul modal untuk Edit
                        $('.modal-title').text('Edit Question');
                        $('#total-options').val(totalOptions);
                    } else {
                        alert('Failed to load quiz details');
                    }
                }
            });

            // Buka modal
            $('#modal_iconified').modal('show');
        });

        $('#save-quiz').on('click', function () {
            let quizId = $('#quiz-id').val(); // Ambil id quiz jika ada
            let question = $('#question').val();
            let options = {};
            let correctAnswer = $('input[name="answer"]:checked').val();
            let totalOptions = $('#total-options').val();
            let isValid = true;


            // Ambil nilai dari setiap opsi
            $('#options-container input[type="text"]').each(function (index) {
                if (index > 0) { // Skip pertanyaan input pertama
                    let optionLabel = $(this).prev('label').text().trim(); // A., B., C., dll.
                    options[optionLabel.replace('.', '')] = $(this).val(); // Simpan tanpa titik
                }
            });

            // Validasi soal (question)
            if (!question || question.trim() === '') {
                Swal.fire({
                    title: 'Error!',
                    text: 'Question cannot be empty.',
                    icon: 'error',
                    confirmButtonText: 'OK',
                    customClass: {
                        confirmButton: 'btn btn-danger'
                    },
                    buttonsStyling: false
                });
                isValid = false;
                return; // Stop proses jika tidak valid
            }

            // Validasi opsi (options)
            $('#options-container input[type="text"]').each(function (index) {
                if (index > 0) { // Skip pertanyaan input pertama
                    let optionLabel = $(this).prev('label').text().trim(); // A., B., C., dll.
                    let optionValue = $(this).val();
                    if (!optionValue || optionValue.trim() === '') {
                        Swal.fire({
                            title: 'Error!',
                            text: `Option ${optionLabel} cannot be empty.`,
                            icon: 'error',
                            confirmButtonText: 'OK',
                            customClass: {
                                confirmButton: 'btn btn-danger'
                            },
                            buttonsStyling: false
                        });
                        isValid = false;
                        return false; // Break dari loop
                    }
                    options[optionLabel.replace('.', '')] = optionValue; // Simpan tanpa titik
                }
            });

            if (!isValid) return; // Stop jika ada opsi yang kosong

            // Validasi jawaban yang benar (correct answer)
            if (!correctAnswer) {
                Swal.fire({
                    title: 'Error!',
                    text: 'You must select the correct answer.',
                    icon: 'error',
                    confirmButtonText: 'OK',
                    customClass: {
                        confirmButton: 'btn btn-danger'
                    },
                    buttonsStyling: false
                });
                return;
            }

            $.ajax({
                url: quizId ? '{{ route('admin.quiz.update', ['id' => '__id__']) }}'.replace('__id__', quizId) : '{{ route('admin.quiz.store') }}',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    id: quizId,
                    question: question,
                    options: options,
                    correct_answer: correctAnswer
                },
                success: function (response) {
                    Swal.fire({
                        title: 'Success',
                        text: response.message,
                        icon: 'success',
                        confirmButtonText: 'OK',
                        customClass: {
                            confirmButton: 'btn btn-success'
                        },
                        buttonsStyling: false
                    }).then(() => {
                        location.reload();
                    });
                },
                error: function (xhr) {
                    Swal.fire({
                        title: 'Error!',
                        text: xhr.responseText,
                        icon: 'error',
                        confirmButtonText: 'OK',
                        customClass: {
                            confirmButton: 'btn btn-danger'
                        },
                        buttonsStyling: false
                    })
                }
            });
        });

        // Detail Modal
        $(document).on('click', '.detail-quiz', function() {
            let idQuiz = $(this).data('id-quiz');

            $.ajax({
                type: "GET",
                url: "{{ route('admin.quiz.detail', ['id' => '__id__']) }}".replace('__id__', idQuiz),
                success: function (response) {
                    if(response.success){
                        $("#detail-question").text(response.data.question);
                        $("#detail-answer").text(`${response.data.answer}. ${JSON.parse(response.data.options)[response.data.answer]}`);

                        let options = $("#detail-options");
                        options.empty();

                        let parsedOptions = JSON.parse(response.data.options);

                        for (let key in parsedOptions) {
                            options.append(`<li>${key}. ${parsedOptions[key]}</li>`);
                        }
                    }
                    else{
                        alert("gagal")
                    }
                }
            });
        });

        // Delete
        $(".delete-quiz").click(function (e) {
            e.preventDefault();

            // Ambil ID quiz dari atribut data-id
            let quizId = $(this).data("id-quiz");

            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'Cancel',
                customClass: {
                    confirmButton: 'btn btn-primary',
                    cancelButton: 'btn btn-danger ms-2'
                },
                buttonsStyling: false
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "{{ route('admin.quiz.destroy', ['id' => '__id__']) }}".replace('__id__', quizId),
                        type: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // Tambahkan CSRF token
                        },
                        success: function (response) {
                            Swal.fire({
                                title: 'Deleted!',
                                text: response.message,
                                icon: 'success',
                                confirmButtonText: 'OK',
                                customClass: {
                                    confirmButton: 'btn btn-success'
                                },
                                buttonsStyling: false
                            }).then(() => {
                                location.reload();
                            });
                        },
                        error: function (xhr) {
                            Swal.fire({
                                title: 'Error!',
                                text: 'Failed to delete quiz.',
                                icon: 'error',
                                confirmButtonText: 'OK',
                                customClass: {
                                    confirmButton: 'btn btn-danger'
                                },
                                buttonsStyling: false
                            });
                        }
                    });
                }
            });
        });


    });

</script>
@endpush
