@extends('admin.layouts.main')

@section('title_admin', 'Quiz')

@push('script_admin')
    <script src="{{ asset('assets/admin/assets/js/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/admin/assets/js/vendor/tables/datatables/datatables.min.js') }}"></script>

    <script src="{{ asset('assets/admin/assets/demo/pages/datatables_basic.js') }}"></script>
@endpush

@section('content_admin')
    <div class="content">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0 text-center">Quiz</h5>
            </div>

            <table class="table datatable-pagination">
                <thead>
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Job Title</th>
                        <th>DOB</th>
                        <th>Status</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Marth</td>
                        <td><a href="#">Enright</a></td>
                        <td>Traffic Court Referee</td>
                        <td>22 Jun 1972</td>
                        <td><span class="badge bg-success bg-opacity-10 text-success">Active</span></td>
                        <td class="text-center">
                            <div class="d-inline-flex">
                                <div class="dropdown">
                                    <a href="#" class="text-body" data-bs-toggle="dropdown">
                                        <i class="ph-list"></i>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a href="#" class="dropdown-item">
                                            <i class="ph-file-pdf me-2"></i>
                                            Export to .pdf
                                        </a>
                                        <a href="#" class="dropdown-item">
                                            <i class="ph-file-xls me-2"></i>
                                            Export to .csv
                                        </a>
                                        <a href="#" class="dropdown-item">
                                            <i class="ph-file-doc me-2"></i>
                                            Export to .doc
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
@endsection
