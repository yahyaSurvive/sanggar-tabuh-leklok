@extends('admin.layouts.main')

@section('title_admin', 'Course')

@push('script_admin')
    <script src="{{ asset('assets/admin/assets/js/vendor/tables/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('assets/admin/assets/demo/pages/datatables_basic.js') }}"></script>

    <link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet" />
    <link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet" />
    <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
    <script src="https://unpkg.com/filepond/dist/filepond.js"></script>
@endpush
<script src="{{ asset('assets/admin/assets/js/vendor/notifications/sweet_alert.min.js') }}"></script>

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
                        <th>Course Name</th>
                        <th>Price</th>
                        <th>Day</th>
                        <th>Hour</th>
                        <th>photo</th>
                        <th>Video</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dataCourse as $index => $item)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $item->name }}</td>
                            <td>Rp. {{ number_format($item->price, 0, ',', '.') }}</td>
                            @php
                                $day = $item->end_day ? $item->start_day . '-' . $item->end_day : $item->start_day;
                            @endphp
                            <td>{{ $day }}</td>
                            <td>{{ \Carbon\Carbon::parse($item->start_hour)->format('H.i') }} -
                                {{ \Carbon\Carbon::parse($item->end_hour)->format('H.i') }}</td>
                            <td>
                                <img src="{{ asset('/course/' . $item->photo) }}" alt="thumbnail" width="150">
                            </td>
                            <td>
                                @if (!empty($item->video_link))
                                    <div class="text-center">
                                        <iframe frameborder="0" allowfullscreen src="{{ $item->video_link }}"></iframe>
                                    </div>
                                @else
                                    <p class="text-center">None</p>
                                @endif
                            </td>
                            <td class="text-center">
                                <div class="d-inline-flex">
                                    <div class="dropdown">
                                        <a href="#" class="text-body" data-bs-toggle="dropdown">
                                            <i class="ph-list"></i>
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-end">
                                            {{-- <a href="#" data-bs-toggle="modal" data-bs-target="#detail-quiz" data-id-course="{{ $item->id_course }}" class="detail-quiz dropdown-item">
                                                <i class="ph-file-search me-2"></i>
                                                Detail
                                            </a> --}}
                                            <a href="#" data-id-course="{{ $item->id_course }}"
                                                class="edit-course dropdown-item">
                                                <i class="ph-pencil-line me-2"></i>
                                                Edit
                                            </a>
                                            <a href="#" data-id-course="{{ $item->id_course }}"
                                                class="delete-course dropdown-item">
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
    <div id="modal-course" class="modal fade" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <i class="ph-list me-2"></i>
                        Add Course
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <div class="mb-3">
                        <div class="mb-3">
                            <label for="" class="form-label">Course Name</label>
                            <input id="course-name" type="text" class="form-control" placeholder="Makendang jauk manis">
                        </div>
                        <div>
                            <label for="" class="form-label">Price</label>
                            <input id="course-price" type="number" class="form-control" placeholder="Rp. 20.000">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="day-start" class="form-label">Day Start</label>
                                    <select id="day-start" class="form-select">
                                        <option value="">-- Day --</option>
                                        <option value="Senin">Senin</option>
                                        <option value="Selasa">Selasa</option>
                                        <option value="Rabu">Rabu</option>
                                        <option value="Kamis">Kamis</option>
                                        <option value="Jumat">Jumat</option>
                                        <option value="Sabtu">Sabtu</option>
                                        <option value="Minggu">Minggu</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="day-end" class="form-label">Day End</label>
                                    <select id="day-end" class="form-select">
                                        <option value="">-- Day --</option>
                                        <option value="Senin">Senin</option>
                                        <option value="Selasa">Selasa</option>
                                        <option value="Rabu">Rabu</option>
                                        <option value="Kamis">Kamis</option>
                                        <option value="Jumat">Jumat</option>
                                        <option value="Sabtu">Sabtu</option>
                                        <option value="Minggu">Minggu</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="start-hour" class="form-label">Hour Start</label>
                                    <input id="start-hour" type="time" class="form-control" placeholder="09.00">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="end-hour" class="form-label">Hour End</label>
                                    <input id="end-hour" type="time" class="form-control" placeholder="17.00">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Additional</label>
                        <textarea name="course_additional" id="course-additional" cols="30" rows="5" class="form-control"></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Thumbnail</label>
                        <input type="file" id="course-thumbnail" name="file" />
                    </div>
                    <div class="mb-3">
                        <label for="course-video" class="form-label">Video</label>
                        <input type="url" id="course-video" name="course_video" class="form-control" />
                        <div id="video-container" class="mt-3">
                            <iframe id="course-video-preview" width="560" height="315" frameborder="0"
                                allowfullscreen style="display: none"></iframe>
                        </div>
                    </div>

                    {{-- <div style="height: 1px; width: 100%; background-color: silver" class="my-2"></div> --}}

                    <!-- Hidden input to store quiz id for editing -->
                    <input type="hidden" id="course-id" value="">
                </div>

                <div class="modal-footer justify-content-end">
                    <button id="save-course" class="btn btn-primary">
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
    {{-- <div id="detail-quiz" class="modal fade" tabindex="-1">
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
	</div> --}}
@endsection

@push('script_admin')
    <script>
        $(document).ready(function() {
            FilePond.registerPlugin(FilePondPluginImagePreview);
            let thumbnail = FilePond.create(document.querySelector("#course-thumbnail"));

            function loadVideo() {
                $("#course-video").on('input', function() {
                    var url = $(this).val().trim();

                    if (url) {
                        $("#course-video-preview").attr("src", url);
                        $("#course-video-preview").show();
                    } else {
                        $("#course-video-preview").hide();
                    }
                });
            }

            loadVideo();


            $("#add-quiz").click(function(e) {
                $('#course-id').val("");
                $('#course-id').val("");
                $('#course-name').val("");
                $('#day-start').val("");
                $('#day-end').val("");
                $('#start-hour').val("");
                $('#end-hour').val("");
                $('#course-additional').val("");
                $('#course-video').val("");
                thumbnail.removeFiles();

                $('.modal-title').text('Add Course');
                $('#modal-course').modal('show');
            });

            $(document).on('click', '.edit-course', function() {
                let courseId = $(this).data('id-course');
                console.log("edit : ", courseId);

                thumbnail.removeFiles();

                // Ambil data quiz dari server menggunakan AJAX
                $.ajax({
                    type: "GET",
                    url: "{{ route('admin.course.detail', ['id' => '__id__']) }}".replace('__id__',
                        courseId),
                    success: function(response) {

                        if (response.success) {
                            $('#course-id').val(response.data.id_course);
                            $('#course-name').val(response.data.name);
                            $('#course-price').val(response.data.price);
                            $('#day-start').val(response.data.start_day);
                            $('#day-end').val(response.data.end_day);
                            $('#start-hour').val(response.data.start_hour);
                            $('#end-hour').val(response.data.end_hour);
                            $('#course-additional').val(response.data.additional);
                            $('#course-video').val(response.data.video_link);
                            loadVideo();

                            thumbnail = FilePond.create(document.querySelector(
                                "#course-thumbnail"), {
                                files: [{
                                    source: response.data.photo,
                                    options: {
                                        metadata: {
                                            type: "local",
                                            id: response.data.id_course,
                                        }
                                    }
                                }]
                            });

                            // Ubah judul modal untuk Edit
                            $('.modal-title').text('Edit Course');
                        } else {
                            alert('Failed to load quiz details');
                        }
                    }
                });

                // Buka modal
                $('#modal-course').modal('show');
            });

            $('#save-course').on('click', function() {
                const formData = new FormData();
                let courseId = $('#course-id').val();
                let courseName = $("#course-name").val();
                let price = $("#course-price").val();
                let dayStart = $("#day-start").val();
                let dayEnd = $("#day-end").val();
                let startHour = $("#start-hour").val();
                let endHour = $("#end-hour").val();
                let additional = $("#course-additional").val();
                let courseVideo = $("#course-video").val();
                let thumbnailFile = thumbnail.getFiles();

                // Validation required
                if (!courseName || !price || !dayStart || !startHour || !endHour || !thumbnailFile.length) {
                    Swal.fire({
                        title: 'Error',
                        text: 'All fields are required!',
                        icon: 'error',
                        confirmButtonText: 'OK',
                        customClass: {
                            confirmButton: 'btn btn-danger'
                        },
                        buttonsStyling: false
                    });
                    return;
                }

                if (thumbnail.getFile().getMetadata("type")) {
                    formData.append("file", "old");
                } else {
                    formData.append("file", thumbnail.getFile().file);
                }

                formData.append("name_course", $("#course-name").val());
                formData.append("price_course", $("#course-price").val());
                if (dayStart === dayEnd) {
                    formData.append("day_start", $("#day-start").val());
                } else {
                    formData.append("day_start", $("#day-start").val());
                    formData.append("day_end", $("#day-end").val());
                }
                formData.append("start_hour", $("#start-hour").val());
                formData.append("end_hour", $("#end-hour").val());
                formData.append("additional", $("#course-additional").val());
                formData.append("course_video", $("#course-video").val());

                $.ajax({
                    url: courseId ? '{{ route('admin.course.update', ['id' => '__id__']) }}'
                        .replace('__id__', courseId) : '{{ route('admin.course.store') }}',
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    },
                    success: function(response) {
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
                    error: function(xhr) {
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
            // $(document).on('click', '.detail-quiz', function() {
            //     let idQuiz = $(this).data('id-quiz');

            //     $.ajax({
            //         type: "GET",
            //         url: "{{ route('admin.quiz.detail', ['id' => '__id__']) }}".replace('__id__', idQuiz),
            //         success: function (response) {
            //             if(response.success){
            //                 $("#detail-question").text(response.data.question);
            //                 $("#detail-answer").text(`${response.data.answer}. ${JSON.parse(response.data.options)[response.data.answer]}`);

            //                 let options = $("#detail-options");
            //                 options.empty();

            //                 let parsedOptions = JSON.parse(response.data.options);

            //                 for (let key in parsedOptions) {
            //                     options.append(`<li>${key}. ${parsedOptions[key]}</li>`);
            //                 }
            //             }
            //             else{
            //                 alert("gagal")
            //             }
            //         }
            //     });
            // });

            // Delete
            $(".delete-course").click(function(e) {
                e.preventDefault();

                // Ambil ID quiz dari atribut data-id
                let courseId = $(this).data("id-course");

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
                            url: "{{ route('admin.course.destroy', ['id' => '__id__']) }}"
                                .replace('__id__', courseId),
                            type: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                                    'content') // Tambahkan CSRF token
                            },
                            success: function(response) {
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
                            error: function(xhr) {
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
