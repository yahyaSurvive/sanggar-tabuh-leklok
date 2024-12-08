@extends('admin.layouts.main')

@section('title_admin', 'Profile')

@section('content_admin')
    <div class="content">
        @if (session('success'))
            <div class="alert alert-success alert-icon-start alert-dismissible fade show">
                <span class="alert-icon bg-success text-white">
                    <i class="ph-check-circle"></i>
                </span>
                <span class="fw-semibold">Well done!</span> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif
        <div class="card">
            <div class="card-header text-center">
                <h5 class="mb-0">Mange Access</h5>
            </div>

            <div class="card-body border-top">
                <form method="POST" action="{{ route('admin.profile.store') }}">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">New Password:</label>
                        <input type="password" name="password" value="{{ old('password') }}" class="form-control" placeholder="new password" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Confirm Password:</label>
                        <input type="password" name="password_confirmation" value="{{ old('password_confirmation') }}" class="form-control" placeholder="confirm password" required>
                    </div>
                    @if ($errors->has('password'))
                        <div class="form-text text-danger"><i class="ph-x-circle me-1"></i> {{ $errors->first('password') }}</div>
                    @endif

                    <div class="text-end">
                        <button type="submit" class="btn btn-primary">Submit <i class="ph-paper-plane-tilt ms-2"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
