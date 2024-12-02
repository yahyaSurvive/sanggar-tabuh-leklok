@extends('user.layouts.main')

@section('title', 'Ganti Password')

@section('content')
    @php
        $user = (object) [
            'name' => 'Kagura',
            'gender' => 1,
            'email' => 'kagura@gmail.com',
            'no_hp' => '0812323123123',
        ];
    @endphp
    <!-- Book Us Start -->
    <div class="container-fluid contact py-6 wow bounceInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="d-flex justify-content-center">
                <div class="col-lg-5">
                    <div class="border border-primary bg-light py-5 px-4">
                        <div class="text-center">
                            <small
                                class="d-inline-block fw-bold text-dark text-uppercase bg-light border border-primary rounded-pill px-4 py-1 mb-3">Ubah
                                Profil</small>
                        </div>
                        <form class="row g-4 form" method="POST" action="{{ route('user.profile.update') }}">
                            @csrf
                            <div class="col-lg-12">
                                <label for="form-name" class="form-label fw-bold">Nama</label>
                                <input type="text"
                                    class="form-control p-2 border-primary @error('name') is-invalid border-danger @enderror"
                                    id="form-name" name="name" value="{{ old('name', $user->name) }}"
                                    placeholder="Masukan Nama">
                                @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-lg-12">
                                <label for="form-phone" id="form-gender1" class="form-label fw-bold">Jenis Kelamin</label>
                                <div class="d-flex gap-4">
                                    <div class="form-group">
                                        <input type="radio" class="form-check-input p-2" id="form-gender1" value="1"
                                            name="gender" @checked(old('gender', $user->gender) == 1)>
                                        <label for="form-gender1" class="form-label">Laki - Laki</label>
                                    </div>
                                    <div class="form-group">
                                        <input type="radio" class="form-check-input p-2" id="form-gender2" value="0"
                                            name="gender" @checked(old('gender', $user->gender) == 0)>
                                        <label for="form-gender2" class="form-label">Perempuan</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <label for="form-email" class="form-label fw-bold">Email</label>
                                <input type="email"
                                    class="form-control border-primary p-2 @error('email') is-invalid border-danger @enderror"
                                    id="form-email" name="email" value="{{ old('email', $user->email) }}"
                                    placeholder="Masukan Email">
                                @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-lg-12">
                                <label for="form-no_hp" class="form-label fw-bold">No Hp</label>
                                <input type="mobile"
                                    class="form-control border-primary p-2 @error('no_hp') is-invalid border-danger @enderror"
                                    id="form-no_hp" name="no_hp" value="{{ old('no_hp', $user->no_hp) }}"
                                    placeholder="Masukan no hp">
                                @error('no_hp')
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
