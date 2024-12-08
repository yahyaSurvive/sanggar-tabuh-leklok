@extends('admin.layouts.main')

@section('title_admin', 'Gallery')

@push('style_admin')

    <link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet"/>
    <link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet"/>

    <!-- Custom CSS for grid -->
    <style>
        .filepond--item {
            width: calc(50% - 0.5em);
        }

        @media (min-width: 30em) {
            .filepond--item {
                width: calc(50% - 0.5em);
            }
        }

        @media (min-width: 50em) {
            .filepond--item {
                width: calc(33.33% - 0.5em);
            }
        }
    </style>

    <script src="{{ asset('assets/admin/assets/js/vendor/notifications/sweet_alert.min.js') }}"></script>
    <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
    <script src="https://unpkg.com/filepond/dist/filepond.js"></script>
@endpush

@section('content_admin')
    <div class="content">
        <div class="card">
            <div class="card-header d-flex justify-content-end">
            </div>

            <div class="card-body">
                <input type="file" id="gallery" name="file[]" multiple />
            </div>

            <div class="card-footer">
                <button id="save-gallery" class="btn btn-primary">Save</button>
            </div>

        </div>
    </div>
@endsection

@push('script_admin')
<script>

$(document).ready(function () {

    // FilePond.registerPlugin(FilePondPluginImagePreview);

    // // Ambil file lama dari server
    // $.ajax({
    //     url: '{{ route('admin.gallery.get') }}', // Route untuk mengambil data file lama
    //     method: 'GET',
    //     success: function (photos) {
    //         console.log(photos)
    //         // Mapping data dari server ke dalam format FilePond
    //         const existingFiles = photos.map((photo) => ({
    //             // Server file reference (contohnya URL file)
    //             source: photo.source,

    //             // Set type ke 'local' untuk file yang sudah diunggah
    //             options: {
    //                 metadata: {
    //                     type: 'local',
    //                     id: photo.options.metadata.id, // Metadata tambahan
    //                 },
    //             },
    //         }));

    //         console.log("bang : ", existingFiles)

    //         // Inisialisasi FilePond dengan file lama
    //         const pond = FilePond.create(document.querySelector("#gallery"), {
    //             files: existingFiles, // Masukkan file lama di sini
    //         });

    //         // Contoh akses metadata dari file yang sudah dimuat
    //         pond.getFiles().forEach((file) => {
    //             console.log("Metadata file:", file.getMetadata());
    //         });
    //     },
    //     error: function (error) {
    //         console.error("Error loading photos:", error);
    //     },
    // });


    // FilePond.registerPlugin(FilePondPluginImagePreview);

    // const pond = FilePond.create(document.querySelector("#gallery"));

    // // Ambil file lama dari server
    // $.ajax({
    //     url: '{{ route('admin.gallery.get') }}', // Route untuk mengambil data file lama
    //     method: 'GET',
    //     success: function (photos) {
    //         // const existingFiles = photos.map((photo) => ({
    //         //     source: photo.source,
    //         //     options: {
    //         //         tipe: 1
    //         //         // type: 'local',
    //         //         // metadata: { id: photo.options.metadata.id },
    //         //     },
    //         // }));

    //         // pond.setOptions({ files: existingFiles });
    //         photos.forEach((photo) => {
    //             // Cek apakah photo.source adalah URL yang valid
    //             // console.log(photo.source); // Pastikan URL yang diberikan valid
    //             // console.log(photo.options); // Pastikan 'type' ada dan valid

    //             pond.addFile(photo.source, {
    //                 options : {
    //                     type: photo.options.type, // Jenis file: bisa 'image/png', 'image/jpeg', atau 'local'
    //                     metadata: {
    //                         name_file: "yahya"
    //                         // id: photo.options.metadata.id // ID untuk metadata file
    //                     }
    //                 }
    //             }).then((file) => {
    //                 // Tindakan setelah file berhasil ditambahkan
    //                 console.log("File added:", file.getMetadata().name_file);
    //             }).catch((error) => {
    //                 // Tangani error jika addFile gagal
    //                 console.error("File addition failed:", error);
    //             });
    //         });
    //     },
    //     error: function (error) {
    //         console.error("Error loading photos:", error);
    //     }
    // });

    // $.ajax({
    //     url: '{{ route('admin.gallery.get') }}', // Route untuk mengambil data file lama
    //     method: 'GET',
    //     success: function (photos) {
    //         photos.forEach((photo) => {
    //             console.log(photo.options.type);

    //             pond.addFile(photo.source, {
    //                 type: photo.options.type
    //             });
    //         });

    //         // console.log(photos[0].options.type)
    //         // const existingFiles = photos.map((photo) => ({
    //         //     source: photo.source,
    //         //     options: {
    //         //         type: "local",
    //         //         // metadata: {
    //         //         //     id: photo.options.metadata.id, // Kirim ID atau nama file sebagai metadata
    //         //         // },
    //         //     },
    //         // }));
    //         // pond.setOptions({ files: existingFiles });

    //     },
    //     error: function (xhr, status, error) {
    //         console.error("Error fetching gallery:", error);
    //     },
    // });

    // Saat tombol Save diklik
    // $("#save-gallery").on("click", function () {
    //     const formData = new FormData();

    //     // console.log(pond.getFiles())
    //     pond.getFiles().forEach((item) => {
    //         console.log(item)
    //         if (item.getMetadata('type') === 'local') {
    //             console.log("lama : ", item.getMetadata())
    //             // Jika file sudah ada di server, kirim metadata-nya
    //             formData.append('existingFiles[]', item.getMetadata().id);
    //         } else {
    //             console.log("baru")
    //             // Jika file baru, kirim file-nya
    //             formData.append('files[]', item.file);
    //         }
    //     });

    //     // Kirim data ke server
    //     $.ajax({
    //         url: '{{ route('admin.gallery.store') }}',
    //         method: 'POST',
    //         data: formData,
    //         processData: false,
    //         contentType: false,
    //         headers: {
    //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
    //         },
    //         success: function (response) {
    //             console.log("Gallery saved successfully:", response);
    //             alert("Gallery saved!");
    //         },
    //         error: function (xhr, status, error) {
    //             console.error("Error saving gallery:", error);
    //             alert("Failed to save gallery.");
    //         },
    //     });
    // });


    FilePond.registerPlugin(FilePondPluginImagePreview);

    // Ambil file lama dari server
    $.ajax({
        url: '{{ route('admin.gallery.get') }}', // Route untuk mengambil data file lama
        method: 'GET',
        success: function (photos) {

            // Mapping data dari server ke dalam format FilePond
            const existingFiles = photos.map((photo) => ({
                // Server file reference (contohnya URL file)
                source: photo.source,

                // Set type ke 'local' untuk file yang sudah diunggah
                options: {
                    metadata: {
                        type: 'local',
                        id: photo.options.metadata.id, // ID file dari server
                    },
                },
            }));


            // Inisialisasi FilePond dengan file lama
            const pond = FilePond.create(document.querySelector("#gallery"), {
                files: existingFiles, // Masukkan file lama di sini
            });

            // Contoh akses metadata dari file yang sudah dimuat
            pond.getFiles().forEach((file) => {
                console.log("Metadata file:", file.getMetadata());
            });

            // Menyimpan file ketika tombol save diklik
            $("#save-gallery").on("click", function () {
                const formData = new FormData();

                // Proses semua file di FilePond
                pond.getFiles().forEach((item) => {
                    console.log(item);

                    if (item.getMetadata('type') === 'local') {
                        // Jika file sudah ada di server, kirim metadata-nya
                        formData.append('existingFiles[]', item.getMetadata('id')); // Mengirim id file lama
                    } else {
                        // Jika file baru, kirim file-nya
                        formData.append('files[]', item.file); // Mengirim file baru
                    }
                });

                // Kirim data ke server
                $.ajax({
                    url: '{{ route('admin.gallery.store') }}',
                    method: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    },
                    success: function (response) {
                        Swal.fire({
                            title: 'Success',
                            text: 'Gallery saved.',
                            icon: 'success',
                            confirmButtonText: 'OK',
                            customClass: {
                                confirmButton: 'btn btn-success'
                            },
                            buttonsStyling: false
                        });
                    },
                    error: function (xhr, status, error) {
                        Swal.fire({
                            title: 'Success',
                            text: 'Failed to save gallery.',
                            icon: 'success',
                            confirmButtonText: 'OK',
                            customClass: {
                                confirmButton: 'btn btn-success'
                            },
                            buttonsStyling: false
                        });
                    },
                });
            });
        },
        error: function (error) {
            console.error("Error loading photos:", error);
        },
    });



});



    // $(document).ready(function () {
    //     // Daftarkan plugin FilePond
    //     FilePond.registerPlugin(FilePondPluginImagePreview);

    //     const pond = FilePond.create(document.querySelector("#gallery"));

    //     // Mengatur FilePond
    //     FilePond.setOptions({
    //         allowReorder: true,
    //         allowImagePreview: true,
    //         imagePreviewHeight: 150,
    //         imagePreviewMaxFileSize: 5 * 1024 * 1024,
    //         allowImageResize: true,
    //         imageResizeTargetWidth: 500,
    //         imageResizeTargetHeight: 500,
    //     });

    //     // Saat tombol Save diklik
    //     $("#save-gallery").on("click", function () {
    //         const formData = new FormData();

    //         // Tambahkan semua file ke FormData
    //         pond.getFiles().forEach(item => {
    //             console.log("Adding to FormData:", item.file);
    //             formData.append('files[]', item.file); // Pastikan file yang dikirim adalah file asli (bukan Blob)
    //         });

    //         // Kirim data ke server via AJAX
    //         $.ajax({
    //             url: '{{ route('admin.gallery.store') }}', // Endpoint API
    //             method: 'POST',
    //             data: formData,
    //             processData: false,
    //             contentType: false,
    //             headers: {
    //                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //             },
    //             success: function (response) {
    //                 console.log("Gallery saved successfully:", response);
    //                 alert("Gallery saved!");
    //             },
    //             error: function (xhr, status, error) {
    //                 console.error("Error saving gallery:", error);
    //                 alert("Failed to save gallery.");
    //             }
    //         });
    //     });
    // });


    // $(document).ready(function () {
    //     FilePond.registerPlugin(FilePondPluginImagePreview);
    //     const pond = FilePond.create(document.querySelector("#gallery"));

    //     FilePond.setOptions({
    //       allowReorder: true,
    //       allowImagePreview: true,
    //       imagePreviewHeight: 150,
    //       imagePreviewMaxFileSize: 5 * 1024 * 1024,
    //       allowImageResize: true,
    //       imageResizeTargetWidth: 500,
    //       imageResizeTargetHeight: 500,
    //       onreorder: (files, origin, target) => {
    //         console.log(`File moved from index ${origin} to ${target}`);
    //         console.log(
    //           "Current order:",
    //           files.map((file) => file.filename)
    //         );
    //       },
    //     });
    // });

</script>
@endpush
