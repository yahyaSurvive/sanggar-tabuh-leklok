@extends('admin.layouts.auth')

@section('title_auth', 'Register')

@section('content_auth')
    <div class="content d-flex justify-content-center align-items-center">

        <!-- Registration form -->
        <form class="login-form" method="POST" action="{{ route('register.post') }}">
            @csrf
            <div class="card mb-0">
                <div class="card-body">
                    <div class="text-center mb-3">
                        <div class="d-inline-flex text-success align-items-center justify-content-center mb-4 mt-2">
                            <i class="ph-user-circle-plus ph-3x"></i>
                        </div>
                        <h5 class="mb-0">Create account</h5>
                    </div>

                    <div class="text-center text-muted content-divider mb-3">
                        <span class="px-2">Your credentials</span>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <div class="form-control-feedback form-control-feedback-start">
                            <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="JohnDoe" required>
                            <div class="form-control-feedback-icon">
                                <i class="ph-user text-muted"></i>
                            </div>
                            @if ($errors->has('name'))
                                <div class="form-text text-danger"><i class="ph-x-circle me-1"></i> {{ $errors->first('name') }}</div>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Username</label>
                        <div class="form-control-feedback form-control-feedback-start">
                            <input type="text" name="username" value="{{ old('username') }}" class="form-control" placeholder="JohnDoe" required>
                            <div class="form-control-feedback-icon">
                                <i class="ph-user-circle text-muted"></i>
                            </div>
                        </div>
                        @if ($errors->has('username'))
                            <div class="form-text text-danger"><i class="ph-x-circle me-1"></i> {{ $errors->first('username') }}</div>
                        @endif
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <div class="form-control-feedback form-control-feedback-start">
                            <input type="password" name="password" value="{{ old('password') }}" class="form-control" placeholder="•••••••••••" required>
                            <div class="form-control-feedback-icon">
                                <i class="ph-lock text-muted"></i>
                            </div>
                            @if ($errors->has('password'))
                                <div class="form-text text-danger"><i class="ph-x-circle me-1"></i> {{ $errors->first('password') }}</div>
                            @endif
                        </div>
                    </div>

                    <div class="text-center text-muted content-divider mb-3">
                        <span class="px-2">Your contacts</span>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Your email</label>
                        <div class="form-control-feedback form-control-feedback-start">
                            <input type="text" name="email" value="{{ old('email') }}" class="form-control" placeholder="john@doe.com" required>
                            <div class="form-control-feedback-icon">
                                <i class="ph-at text-muted"></i>
                            </div>
                            @if ($errors->has('email'))
                                <div class="form-text text-danger"><i class="ph-x-circle me-1"></i> {{ $errors->first('email') }}</div>
                            @endif
                        </div>
                    </div>

                    <button type="submit" class="btn btn-teal w-100">Register</button>
                </div>
            </div>
        </form>
        <!-- /registration form -->

    </div>
@endsection
