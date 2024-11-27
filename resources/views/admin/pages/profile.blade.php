@extends('admin.layouts.main')

@section('title_admin', 'Profile')

@section('content_admin')
    <div class="content">
        <div class="card">
            <div class="card-header text-center">
                <h5 class="mb-0">Mange Access</h5>
            </div>

            <div class="card-body border-top">
                <form action="#">
                    <div class="mb-3">
                        <label class="form-label">New Password:</label>
                        <input type="password" class="form-control" placeholder="new password">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Confirm Password:</label>
                        <input type="password" class="form-control" placeholder="confirm password">
                    </div>

                    <div class="text-end">
                        <button type="submit" class="btn btn-primary">Submit form <i class="ph-paper-plane-tilt ms-2"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
