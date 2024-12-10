@extends('layouts.app')

<style>
    body {
        background-color: #f7f9fc;
    }

    .card-header {
        background-color: #3490dc; /* Biru lebih cerah */
        color: #ffffff;
        font-weight: bold;
        text-align: center;
    }

    .form-control {
        border: 1px solid #ced4da;
    }

    .form-control:focus {
        border-color: #3490dc; /* Warna biru untuk fokus */
        box-shadow: 0 0 5px rgba(52, 144, 220, 0.3);
    }

    .btn-primary {
        background-color: #3490dc;
        border-color: #3490dc;
        color: #ffffff;
    }

    .btn-primary:hover {
        background-color: #2779bd;
        border-color: #2779bd;
    }

    .invalid-feedback {
        color: #e3342f; /* Warna merah untuk pesan error */
    }

    .form-check-label {
        color: #6c757d;
    }

    .btn-link {
        color: #3490dc;
    }

    .btn-link:hover {
        color: #2779bd;
    }
</style>

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="min-height: 80vh;">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card shadow-lg">
                <div class="card-header text-center bg-primary text-white">{{ __('Verifikasi Email Kamu') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Kode verifikasi baru telah dikirim ke alamat email Anda.') }}
                        </div>
                    @endif

                    <p class="text-center">{{ __('Silakan masukkan kode verifikasi yang dikirimkan ke email Anda.') }}</p>

                    <form method="POST" action="{{ route('verification.verify') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="verification_code" class="form-label">{{ __('Verification Code') }}</label>
                            <input id="verification_code" type="text" class="form-control @error('verification_code') is-invalid @enderror" name="verification_code" required autofocus>
                            @error('verification_code')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Verify') }}
                            </button>
                        </div>
                    </form>

                    <div class="text-center mt-3">
                        <form method="POST" action="{{ route('verification.resend') }}">
                            @csrf
                            <button type="submit" class="btn btn-link">{{ __('Kirim Ulang Kode Verifikasi') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
