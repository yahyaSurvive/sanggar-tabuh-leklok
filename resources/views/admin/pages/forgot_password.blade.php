@extends('admin.layouts.auth')

@section('title_auth', 'Forgot Password')

@section('content_auth')
    <div class="content d-flex justify-content-center align-items-center">
        <form class="login-form" method="POST" action="{{ route('forgot-password.post') }}">
            @csrf
            @if (Session::has('message'))
                <div class="alert alert-success alert-icon-start alert-dismissible fade show">
                    <span class="alert-icon bg-success text-white">
                        <i class="ph-check-circle"></i>
                    </span>
                    <span class="fw-semibold">Well done!</span> {{ Session::get('message') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif
            @if (Session::has('not_found'))
                <div class="alert alert-warning alert-icon-start alert-dismissible fade show">
                    <span class="alert-icon bg-warning text-white">
                        <i class="ph-warning-circle"></i>
                    </span>
                    <span class="fw-semibold">Warning!</span> {{ Session::get('not_found') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif
            <div class="card mb-0">
                <div class="card-body">
                    <div class="text-center mb-3">
                        <div class="d-inline-flex bg-primary bg-opacity-10 text-primary lh-1 rounded-pill p-3 mb-3 mt-1">
                            <i class="ph-arrows-counter-clockwise ph-2x"></i>
                        </div>
                        <h5 class="mb-0">Password recovery</h5>
                        <span class="d-block text-muted">We'll send you instructions in email</span>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Your email</label>
                        <div class="form-control-feedback form-control-feedback-start">
                            <input type="email" name="email" class="form-control" placeholder="john@doe.com">
                            <div class="form-control-feedback-icon">
                                <i class="ph-at text-muted"></i>
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
