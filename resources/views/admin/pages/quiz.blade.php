@extends('admin.layouts.main')

@section('title_admin', 'Quiz')

@push('script_admin')
    <script src="{{ asset('assets/admin/assets/js/vendor/tables/datatables/datatables.min.js') }}"></script>

    <script src="{{ asset('assets/admin/assets/demo/pages/datatables_basic.js') }}"></script>
@endpush

@section('content_admin')
    <div class="content">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0 text-center">Quiz</h5>
                <button data-bs-toggle="modal" data-bs-target="#modal_iconified" class="btn btn-primary">+</button>
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
                    <tr>
                        <td>1</td>
                        <td>Alat musik apa yang biasanya digunakan dalam latihan hari Senin di Sanggar Tabuh Leklok?</td>
                        <td>B. Gender</td>
                        <td>28 Nov 2024 20.23</td>
                        <td>28 Nov 2024 20.23</td>
                        <td class="text-center">
                            <div class="d-inline-flex">
                                <div class="dropdown">
                                    <a href="#" class="text-body" data-bs-toggle="dropdown">
                                        <i class="ph-list"></i>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a href="#" class="dropdown-item">
                                            <i class="ph-file-search me-2"></i>
                                            Detail
                                        </a>
                                        <a href="#" class="dropdown-item">
                                            <i class="ph-pencil-line me-2"></i>
                                            Edit
                                        </a>
                                        <a href="#" class="dropdown-item">
                                            <i class="ph-trash me-2"></i>
                                            Delete
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

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
		            {{-- <div class="alert alert-info alert-icon-start alert-dismissible">
						<span class="alert-icon bg-info text-white">
							<i class="ph-info"></i>
						</span>
						<span class="fw-semibold">Here we go!</span> Example of an alert inside modal.
						<button type="button" class="btn-close" data-bs-dismiss="alert"></button>
				    </div> --}}

                    {{-- <div class="mb-3">
                        <label for="" class="form-label">Total Questions</label>
                        <input type="number" min="1" class="form-control" value="1">
                    </div> --}}

                    <div id="add-total-options" class="mb-3">
                        <label for="" class="form-label">Total Options</label>
                        <input id="total-options" type="number" min="4" class="form-control" value="4">
                    </div>

                    <div style="height: 1px; width: 100%; background-color: silver" class="my-2"></div>

                    <div id="options-container" class="mb-3"></div>

                    {{-- <div id="" class="mb-3">
                        <label for="" class="form-label">Question</label>
                        <input type="text" class="form-control">
                    </div> --}}


                    {{-- <div id="" class="mb-3 d-flex justify-content-around align-items-center gap-3">
                        <label for="">A.</label>
                        <input type="text" class="form-control">
                        <input type="checkbox" name="" id="">
                    </div> --}}

				</div>

				<div class="modal-footer justify-content-end">
					{{-- <button class="btn btn-flat-danger btn-icon">
						<i class="ph-trash"></i>
					</button> --}}
                    <div>
                        <button class="btn btn-secondary">
                            <i class="ph-arrow-counter-clockwise me-1"></i>
                            Reset
                        </button>
                        <button id="save-quiz" class="btn btn-primary">
                            <i class="ph-check me-1"></i>
                            Save
                        </button>
                    </div>
				</div>
			</div>
		</div>
	</div>
@endsection

@push('script_admin')
<script>
    $(document).ready(function () {
        function generateOptions(totalOptions) {
            let container = $('#options-container');
            container.empty(); // Hapus opsi lama

            container.append(`
                <div id="" class="mb-3">
                    <label for="" class="form-label">Question</label>
                    <input type="text" class="form-control">
                </div>
            `);

            for (let i = 0; i < totalOptions; i++) {
                let optionLabel = String.fromCharCode(65 + i); // A, B, C, dst.

                // Tambahkan input baru untuk setiap opsi
                container.append(`
                    <div class="mb-3 d-flex align-items-center gap-3">
                        <label>${optionLabel}.</label>
                        <input type="text" class="form-control" name="options[${optionLabel}]" placeholder="Option ${optionLabel}">
                        <input type="radio" name="answer" value="${optionLabel}"> Correct
                    </div>
                `);
            }
        }

        // Jalankan saat halaman pertama kali dimuat
        generateOptions($('#total-options').val());

        // Jalankan saat nilai Total Options diubah
        $('#total-options').on('input', function () {
            let totalOptions = parseInt($(this).val());

            if (isNaN(totalOptions) || totalOptions < 4) {
                alert("Total options must be at least 4.");
                return;
            }

            generateOptions(totalOptions);
        });


        $('#save-quiz').on('click', function () {
            // Ambil data dari form
            let totalOptions = $('#total-options').val();
            let question = $('#options-container input[type="text"]').first().val(); // Pertanyaan
            let options = {};
            let correctAnswer = $('input[name="answer"]:checked').val(); // Jawaban benar
            let allOptionsFilled = true;

            // Loop melalui semua opsi
            $('#options-container input[type="text"]').each(function (index) {
                if (index > 0) { // Skip pertanyaan (input pertama)
                    let optionLabel = $(this).prev('label').text().trim(); // A., B., C., dll.
                    options[optionLabel.replace('.', '')] = $(this).val(); // Simpan tanpa titik
                }
            });

            console.log("jawaban : ", Object.keys(options).length)
            console.log("options : ", totalOptions)
            console.log("cek : ", Object.keys(options).length > totalOptions)
            console.log("res : ", options)


            // Periksa apakah setiap opsi memiliki nilai
            Object.values(options).forEach(value => {
                if (!value || value.trim() === '') {
                    allOptionsFilled = false;
                }
            });

            if (!question || Object.keys(options).length < 4 || !correctAnswer || !allOptionsFilled) {
                alert("Please complete the question, all options, and select the correct answer.");
                return;
            }

            // Kirim data ke server menggunakan AJAX
            $.ajax({
                url: '{{ route('admin.quiz.store') }}', // URL ke controller Laravel
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}', // Token CSRF untuk keamanan
                    question: question,
                    options: options,
                    correct_answer: correctAnswer
                },
                success: function (response) {
                    alert(response.message); // Tampilkan pesan sukses
                    location.reload(); // Reload halaman (opsional)
                },
                error: function (xhr) {
                    alert("An error occurred: " + xhr.responseText); // Tampilkan pesan error
                }
            });
        });
    });

</script>
@endpush
