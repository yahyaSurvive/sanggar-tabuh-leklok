@extends('admin.layouts.auth')

@section('title_auth', 'Login')

@section('content_auth')
    <!-- Content area -->
    <div class="content d-flex justify-content-center align-items-center">

        <!-- Login form -->
        <form class="login-form" action="index.html">
            <div class="card mb-0">
                <div class="card-body">
                    <div class="text-center mb-3">
                        <div class="d-inline-flex text-primary align-items-center justify-content-center mb-4 mt-2">
                            <i class="ph-user-circle ph-3x"></i>
                        </div>
                        <h5 class="mb-0">Login to your account</h5>
                        <span class="d-block text-muted">Enter your credentials below</span>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Username</label>
                        <div class="form-control-feedback form-control-feedback-start">
                            <input type="text" class="form-control" placeholder="john@doe.com">
                            <div class="form-control-feedback-icon">
                                <i class="ph-user-circle text-muted"></i>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <div class="form-control-feedback form-control-feedback-start">
                            <input type="password" class="form-control" placeholder="•••••••••••">
                            <div class="form-control-feedback-icon">
                                <i class="ph-lock text-muted"></i>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary w-100">Sign in</button>
                    </div>

                    <div class="text-center">
                        <a href="{{ route('forgot_password') }}">Forgot password?</a>
                    </div>
                </div>
            </div>
        </form>
        <!-- /login form -->

    </div>
    <!-- /content area -->
@endsection