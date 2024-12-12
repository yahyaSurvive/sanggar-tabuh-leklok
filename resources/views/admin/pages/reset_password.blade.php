@extends('admin.layouts.auth')

@section('title_auth', 'Forgot Password')

@section('content_auth')
    <div class="content d-flex justify-content-center align-items-center">
        <form class="login-form" method="POST" action="{{ route('submitResetPassword.post') }}">
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                <div class="alert alert-danger alert-dismissible fade show">
                    <i class="ph-x-circle me-2"></i>
                    <span>{{ $error }}</span>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
                @endforeach
            @endif
            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show">
                    <i class="ph-x-circle me-2"></i>
                    <span>{{ session('error') }}</span>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif
            @csrf
            <div class="card mb-0">
                <input type="hidden" value="{{ $token }}" name="reset_token">
                <div class="card-body">
                    <div class="text-center mb-3">
                        <div class="d-inline-flex bg-primary bg-opacity-10 text-primary lh-1 rounded-pill p-3 mb-3 mt-1">
                            <i class="ph-arrows-counter-clockwise ph-2x"></i>
                        </div>
                        <h5 class="mb-0">Reset Password</h5>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <div class="form-control-feedback form-control-feedback-start">
                            <input type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="john@doe.com" required>
                            <div class="form-control-feedback-icon">
                                <i class="ph-at text-muted"></i>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <div class="form-control-feedback form-control-feedback-start">
                            <input type="password" name="password" value="{{ old('password') }}" class="form-control" placeholder="******" required>
                            <div class="form-control-feedback-icon">
                                <i class="ph-lock text-muted"></i>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Confirm Password</label>
                        <div class="form-control-feedback form-control-feedback-start">
                            <input type="password" name="password_confirmation" value="{{ old('password_confirmation') }}" class="form-control" placeholder="******">
                            <div class="form-control-feedback-icon">
                                <i class="ph-lock text-muted"></i>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">
                        <i class="ph-arrow-counter-clockwise me-2"></i>
                        Reset password
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
