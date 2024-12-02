@extends('user.layouts.main')

@section('title', 'Tentang Kami - Sejarah Sanggar')

@section('content')
    <!-- Book Us Start -->
    <div class="container-fluid contact py-6 wow bounceInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="d-flex justify-content-center">
                <div class="col-lg-5">
                    <div class="border border-primary bg-light py-5 px-4">
                        <div class="text-center">
                            <small
                                class="d-inline-block fw-bold text-dark text-uppercase bg-light border border-primary rounded-pill px-4 py-1 mb-3">GANTI
                                PASSWORD</small>
                        </div>
                        <form class="row g-4 form" method="POST" action="{{ route('user.update-password') }}">
                            @csrf
                            <div class="col-lg-12">
                                <label for="form-name" class="form-label fw-bold">Password Baru</label>
                                <input type="password" name="new-password"
                                    class="form-control p-2 border-primary @error('new-password') is-invalid border-danger @enderror"
                                    placeholder="Masukan password baru" value="{{ old('new-password') }}">
                                @error('new-password')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-lg-12">
                                <label for="form-name" class="form-label fw-bold">Konfirmasi Password</label>
                                <input type="password" name="password-confirmation"
                                    class="form-control p-2 border-primary @error('password-confirmation') is-invalid border-danger @enderror"
                                    placeholder="Masukan konfirmasi password">
                                @error('password-confirmation')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-12 text-center">
                                <button type="submit" class="btn btn-primary px-3 py-2"> <i class="fas fa-save"></i>
                                    Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Book Us End -->
@endsection
