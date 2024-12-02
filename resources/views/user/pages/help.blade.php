@extends('user.layouts.main')

@section('title', 'Bantuan')

@section('content')
    <div class="container-fluid contact py-6 wow bounceInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="p-5 bg-light rounded contact-form">
                <div class="row g-4">
                    <div class="col-12">
                        <small
                            class="d-inline-block fw-bold text-dark text-uppercase bg-light border border-primary rounded-pill px-4 py-1 mb-3">Kontak
                            Person</small>
                        <h1 class="display-5 mb-0">Contact Us For Any Queries!</h1>
                    </div>
                    <div class="col-md-12 col-lg-5">
                        <div>
                            <div class="d-inline-flex w-100 border border-primary p-4 rounded mb-4">
                                <i class="fas fa-whatsapp fa-2x text-primary me-4"></i>
                                <div class="">
                                    <h4>Whatsapp</h4>
                                    <p>123 Street, New York, USA</p>
                                </div>
                            </div>
                            <div class="d-inline-flex w-100 border border-primary p-4 rounded mb-4">
                                <i class="fas fa-envelope fa-2x text-primary me-4"></i>
                                <div class="">
                                    <h4>Mail Us</h4>
                                    <p class="mb-2">info@example.com</p>
                                    <p class="mb-0">support@example.com</p>
                                </div>
                            </div>
                            <div class="d-inline-flex w-100 border border-primary p-4 rounded">
                                <i class="fa fa-phone-alt fa-2x text-primary me-4"></i>
                                <div class="">
                                    <h4>Telephone</h4>
                                    <p class="mb-2">(+012) 3456 7890 123</p>
                                    <p class="mb-0">(+704) 5555 0127 296</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-7">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3945.7004973408743!2d115.12614847517024!3d-8.528430386405223!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd23ba021652b33%3A0xeb36bbd3abac11f9!2sSanggar%20LeKLOK!5e0!3m2!1sid!2sid!4v1732808452830!5m2!1sid!2sid"
                            width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
